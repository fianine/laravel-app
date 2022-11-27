<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserSubscriptionService;
use Exception;
use Illuminate\Support\Facades\Validator;

class UserSubscriptionController extends Controller
{
    private $userSubscriptionService;

    public function __construct(UserSubscriptionService $userSubscriptionService)
    {
        $this->sub = $userSubscriptionService;
    }

    public function sub(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => [
                'required',
                'exists:users,id'
            ],
            'websiteId' => [
                'required',
                'exists:websites,id'
            ]
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $this->sub->userSubToWeb($request);

            return response()->json([
                'error' => false,
                'message' => 'Successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
