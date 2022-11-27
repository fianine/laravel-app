<?php

namespace App\Http\Controllers;

use App\Http\Resources\WebsiteResource;
use Illuminate\Http\Request;
use App\Services\WebsiteService;

class WebsiteController extends Controller
{
    private $websiteService;

    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    public function index()
    {
        return WebsiteResource::collection(
            $this->websiteService->getWebsites()
        );
    }

    public function show(Request $request)
    {
        return new WebsiteResource(
            $this->websiteService->getWebsite($request->websiteId)
        );
    }
}
