<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\User;
use Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send drip e-mails to a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user_name = $this->argument('user');
        $email = User::where('name',$user_name)->value('email');
        if($email){
            Mail::raw('你好，我是PHP程序！', function ($message)use ($email) {
                $message ->to($email)->subject('纯文本信息邮件命令测试');
            });
        }
    }
}
