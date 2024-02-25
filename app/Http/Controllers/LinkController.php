<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    private LinkService $linkService;
    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

    public function showAddingLinkForm()
    {
        return view('link.addingForm');
    }

    public function createLink(Request $request)
    {
        return $this->linkService->createLink($request->link);
    }

    public function showLink(Request $request)
    {
        return $this->linkService->showLink($request->shortLink);
    }

    public function redirectByShortLink(Request $request)
    {
        $originalLink = $this->linkService->getOriginalLinkByShortLink($request->shortLink);
        return redirect($originalLink);
    }
}
