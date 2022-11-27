<?php

namespace App\Services;

use App\Models\Website;

class WebsiteService
{
    /**
     * @return Website
     */
    public function getWebsites()
    {
        return Website::paginate(10);
    }

    /**
     * @param $websiteId
     * @return Website
     */
    public function getWebsite($websiteId)
    {
        return Website::find($websiteId);
    }
}
