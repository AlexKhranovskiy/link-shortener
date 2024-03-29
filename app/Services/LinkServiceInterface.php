<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface LinkServiceInterface
{
    /** Converts 10 base number to 62 bas number.
     * @param int $number
     * @return string
     */
    public function convertToBase62(int $number): string;

    /** Return the link model from DB record using short link value in the condition.
     * if record in DB not found returns null.
     * @param string $shortLink
     * @return Link|null
     */
    public function getLinkModelByShortLink(string $shortLink): ?Link;

    /** Returns view with form for the new short link adding.
     * @return View
     */
    public function getAddingLinkFormView(): View;

    /** Creates a short link and redirects to link show route.
     * @param string $link
     * @return RedirectResponse|View
     */
    public function createLink(string $link): RedirectResponse|View;

    /** Finds original link in DB and returns the view with original link and short link. if original link
     * has not been found returns not found view.
     * @param string $shortLink
     * @return View
     */
    public function showLink(string $shortLink): View;

    /** Redirects request to url which is given short link value.
     *  Increments the count field of successfully redirections.
     * @param string $shortLink
     * @return RedirectResponse
     */
    public function redirectByShortLink(string $shortLink): RedirectResponse;

    /** Gets last id in the link table, checks if it's valid and returns. If it's invalid returns false.
     * @return false|int
     */
    public function getValidLastId(): false|int;
}
