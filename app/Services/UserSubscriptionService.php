<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserSubscription;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class UserSubscriptionService
{
    /**
     * @param Request $request
     * @return UserSubscription
     */
    public function userSubToWeb(Request $request): UserSubscription
    {
        $checkUserHasSub = UserSubscription::where('user_id', $request->userId)
            ->where('website_id', $request->websiteId)
            ->first();

        if (!empty($checkUserHasSub)) {
            throw new BadRequestHttpException('User has subscribed');
        }

        return UserSubscription::create([
            'id' => Str::uuid(),
            'user_id' => $request->userId,
            'website_id' => $request->websiteId
        ]);
    }
}
