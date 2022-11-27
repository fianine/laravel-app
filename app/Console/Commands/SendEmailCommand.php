<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\EmailPost;
use Illuminate\Support\Str;
use App\Mail\SubscriptionEmail;
use Illuminate\Console\Command;
use App\Models\UserSubscription;
use App\Services\PostService;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to subscriber';

    public $post;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostService $post)
    {
        parent::__construct();
        $this->post = $post;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = $this->post->getPosts();
        $bar = $this->output->createProgressBar($posts->count());
        $bar->start();
        foreach ($posts as $post) {
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
            $bar->advance();
        }
        $bar->finish();
    }
}
