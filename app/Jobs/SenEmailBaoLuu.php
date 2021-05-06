<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class SenEmailBaoLuu implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $guiEmailHetHan;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($guiEmailHetHan)
    {
       
        $this->guiEmailHetHan = $guiEmailHetHan;
        // dd($guiEmailHetHan);
    }

   
    public function handle()
    {
        // dd($this->guiEmailHetHan);
        // dd($this->guiEmailHetHan);
        foreach($this->guiEmailHetHan as $item){
            $email = $item->order->member->infor->email;
            // echo $email;
            $data = [
                'name' => $item->order->member->infor->name,
                'finish_day' =>$item->finish_day,
            ];
            Mail::send('email.mailconfirm-reserve',$data, function($message) use ($email){
                $message->to($email,' ĐIỀN EMAIL CỦA BẠN MUỐN NHẬN MAIL VÀO ĐÂY', 'Visitor')->subject('Thông báo hết hạn bảo lưu gói tập');
            });
        }
    }
    }

