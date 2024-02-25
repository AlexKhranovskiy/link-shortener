<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LinkService implements LinkServiceInterface
{
    /** Converts 10 base number to 62 bas number.
     * @param int $number
     * @return string
     */
    public function convertToBase62(int $number): string
    {
        $index = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';
        do {
            $result = $index[$number % 62] . $result;
            $number = intval($number / 62);
        } while ($number);
        return $result;
    }

    /** Finds original link value in DB using short link value in the condition.
     * @param string $shortLink
     * @return string|null
     */
    public function getOriginalLinkByShortLink(string $shortLink): ?string
    {
        return Link::where('short', $shortLink)->first()?->original;
    }

    /** Returns view with form for the new short link adding.
     * @return View
     */
    public function getAddingLinkFormView(): View
    {
        return view('link.addingForm');
    }

    /** Creates a short link and redirects to link show route.
     * @param string $link
     * @return RedirectResponse
     */
    public function createLink(string $link): RedirectResponse
    {
        $lastId = Link::latest()->first()?->id ?? 0;

        $shortLink = $this->convertToBase62($lastId);

        $linkModel = Link::where('original', $link)->first();

        if (is_null($linkModel)) {
            $linkModel = Link::Create([
                'original' => $link,
                'short' => $shortLink
            ]);
        }

        return redirect()->route('link.show', ['shortLink' => $linkModel->short]);
    }

    /** Finds original link in DB and returns the view with original link and short link. if original link
     * has not been found returns not found view.
     * @param string $shortLink
     * @return View
     */
    public function showLink(string $shortLink): View
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

    /** Redirects request to url which is given short link value.
     * @param string $shortLink
     * @return RedirectResponse
     */
    public function redirectByShortLink(string $shortLink): RedirectResponse
    {
        $originalLink = $this->getOriginalLinkByShortLink($shortLink);
        return redirect($originalLink);
    }
}
