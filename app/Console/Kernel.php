<?php

namespace App\Console;

//use App\Events\Login;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
//        $schedule->call(function () {
//            event(new Login());
//        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
        Artisan::command('test', function () {
            $users = \App\Model\User::all();

            $bar = $this->output->createProgressBar(count($users));
            foreach ($users as $user) {
                //$this->performTask($user);
                sleep(3); // 模拟任务执行
                $bar->advance();
            }

            $bar->finish();
            $this->info('task finished!');
        });
    }
}
