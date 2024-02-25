<?php

namespace App\Services;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface LinkServiceInterface
{
    /** Converts 10 base number to 62 bas number.
     * @param int $number
     * @return string
     */
    public function convertToBase62(int $number): string;

    /** Finds original link value in DB using short link value in the condition.
     * @param string $shortLink
     * @return string|null
     */
    public function getOriginalLinkByShortLink(string $shortLink): ?string;

    /** Returns view with form for the new short link adding.
     * @return View
     */
    public function getAddingLinkFormView(): View;

    /** Creates a short link and redirects to link show route.
     * @param string $link
     * @return RedirectResponse
     */
    public function createLink(string $link): RedirectResponse;

    /** Finds original link in DB and returns the view with original link and short link. if original link
     * has not been found returns not found view.
     * @param string $shortLink
     * @return View
     */
    public function showLink(string $shortLink): View;
}
