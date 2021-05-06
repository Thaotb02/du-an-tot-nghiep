<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendemails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $data = Order::all();
        \Illuminate\Support\Facades\Storage::append('test_approved_07122020.log', $data);
        foreach($data as $order){
            $email = $order->member->infor->email;
            Order::whereDate($order->finish_day, '=', $today)-> Mail::send('email.mairemind',$order, function($message) use ($email){
                    $message->to($email,' ĐIỀN EMAIL CỦA BẠN MUỐN NHẬN MAIL VÀO ĐÂY', 'Visitor')->subject('Visitor Feedback!');
                });
        }
    }
}
