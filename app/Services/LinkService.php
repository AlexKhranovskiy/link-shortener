<?php

namespace App\Services;

use App\Models\Link;

class LinkService
{
    protected function convertToBase62(int $number)
    {
        $index = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';
        do {
            $result = $index[$number % 62] . $result;
            $number = intval($number / 62);
        } while ($number);
        return $result;
    }

    public function createLink(string $link)
    {
        $lastId = Link::latest()->first()?->id ?? 0;

        $shortLink = $this->convertToBase62($lastId);

        $linkModel = Link::where('original', $link)->first();

        if(is_null($linkModel)){
            $linkModel = Link::Create([
                'original' => $link,
                'short' => $shortLink
            ]);
        }

        return redirect()->route('link.show', ['shortLink' => $linkModel->short]);
    }

    public function showLink(string $shortLink)
    {
        $originalLink = $this->getOriginalLinkByShortLink($shortLink);

        if (!is_null($originalLink)) {
            return view('link.result', [
                'originalLink' => $originalLink,
                'shortLink' => '/' . $shortLink
            ]);
        } else {
            return view('link.notFound', ['shortLink' => '/' . $shortLink]);
        }
    }

    public function getOriginalLinkByShortLink(string $shortLink): ?string
    {
        return Link::where('short', $shortLink)->first()?->original;
    }
}
