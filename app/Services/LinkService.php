<?php

namespace App\Services;

use App\Models\Link;

class LinkService
{
    protected function toBase62(int $num) {
        $index = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $res = '';
        do {
            $res = $index[$num % 62] . $res;
            $num = intval($num / 62);
        } while ($num);
        return $res;
    }

    public function createLink(string $link)
    {
        $lastId = Link::latest()->first()?->id ?? 0;

        $shortLink = $this->toBase62($lastId);

        Link::create([
            'original' => $link,
            'short' => $shortLink
        ]);

        return redirect()->route('root');
    }
}
