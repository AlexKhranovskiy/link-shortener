<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\LinkRequest;
use App\Services\LinkService;
use App\Services\LinkServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    private LinkService $linkService;

    public function __construct(LinkServiceInterface $linkService)
    {
        $this->linkService = $linkService;
    }

    public function showAddingLinkForm(): View
    {
        return $this->linkService->getAddingLinkFormView();
    }

    public function createLink(CreateLinkRequest $request): RedirectResponse
    {
        return $this->linkService->createLink($request->get('link'));
    }

    public function showLink(LinkRequest $request): View
    {
        return $this->linkService->showLink($request->get('shortLink'));
    }

    public function redirectByShortLink(LinkRequest $request): RedirectResponse
    {
        return $this->linkService->redirectByShortLink($request->get('shortLink'));
    }
}
