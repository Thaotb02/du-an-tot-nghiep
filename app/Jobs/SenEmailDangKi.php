<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class SenEmailDangKi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $guiEmailHetHanGoiTap;
    // protected $user;
    /**
     * Create a new job instance.
     * 
     *
     * @return void
     */
    public function __construct(
        $guiEmailHetHanGoiTap
        // User $user,    
    )
    {
        $this->guiEmailHetHanGoiTap = $guiEmailHetHanGoiTap;
        // $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->guiEmailHetHanGoiTap);
        foreach($this->guiEmailHetHanGoiTap as $item){
            $email = $item->member->infor->email;
            // echo $email;
            $data = [
                'name' => $item->member->infor->name,
                'date' =>$item->finish_date,
            ];
            Mail::send('email.mairemind',$data, function($message) use ($email){
                $message->to($email,' ĐIỀN EMAIL CỦA BẠN MUỐN NHẬN MAIL VÀO ĐÂY', 'Visitor')->subject('Thông báo hết hạn gói tập');
            });
        }
    }
}
