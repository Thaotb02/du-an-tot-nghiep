<?php

namespace App\Console;

use App\Model\Order;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Jobs\SenEmailDangKi;
use App\Jobs\SenEmailBaoLuu;
use App\Model\Reserve;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
       
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {   
        $schedule->call(function () {
            DB::table('orders')->whereDate('finish_date', '<=', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'))->update(['status' => '2']);
            DB::table('reserves')->whereDate('finish_day', '=', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'))->update(['status' => '2']);
          
           
        })->everyMinute();

        $schedule->call(function () {
            $now = Carbon::now();
            $thoi_gian_gui_email = $now->addDays(2);
            $data = [];
            $data = Order::whereDate('finish_date', $thoi_gian_gui_email)->get();
            SenEmailDangKi::dispatch($data);
            $reserve = [];
            $reserve = Reserve::whereDate('finish_day', $thoi_gian_gui_email)->get();
            SenEmailBaoLuu::dispatch($reserve);
        })->everyMinute();
     
       
        // ->weeklyOn(1, '8:00');
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
    }
}
