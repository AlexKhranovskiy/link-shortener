<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\Link1Request;
use App\Http\Requests\LinkRequest;
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

    public function createLink(CreateLinkRequest $request)
    {
        return $this->linkService->createLink($request->get('link'));
    }

    public function showLink(LinkRequest $request)
    {
        return $this->linkService->showLink($request->get('shortLink'));
    }

    public function redirectByShortLink(LinkRequest $request)
    {
        $originalLink = $this->linkService->getOriginalLinkByShortLink($request->get('shortLink'));
        return redirect($originalLink);
    }
}
