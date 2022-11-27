<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\EmailPost;
use Illuminate\Support\Str;
use App\Mail\SubscriptionEmail;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToSubscriber implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $post = $event->post;
        $userSub = UserSubscription::where('website_id', $post->website_id)
            ->get();

        foreach ($userSub as $data) {
            $emailPost = EmailPost::where('post_id', $post->id)
                ->where('user_id', $data->user_id)
                ->where('status', 1)
                ->first();

            $user = User::find($data->user_id);

            if (empty($emailPost)) {
                $emailPost = new EmailPost();
                $emailPost->id = Str::uuid();
                $emailPost->post_id = $post->id;
                $emailPost->user_id = $user->id;
                $emailPost->status = 1;
                $emailPost->save();

                Mail::to($user->email)->send(new SubscriptionEmail($post));
            }
        }
    }
}
