<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExcelExport;
use App\Exports\ExcelExportOrder;
use App\Http\Controllers\Controller;
use Illuminate\Console\Scheduling\Schedule;
use App\Http\Requests\Admin\OrderNewRequest;
use App\Http\Requests\Admin\OrderOldRequest;
use App\Http\Requests\Admin\OrderReupRequest;
use App\Http\Requests\Admin\ReserveRequest;
use App\Http\Requests\Admin\EditOrderRequest;
use App\Http\Requests\Admin\NewMemberPass; 
use App\Http\Requests\Admin\OldMemberPass;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Model\Member;
use App\Model\Discount;
use App\Model\Pt;
use App\Model\Reserve;
use App\Model\Infor;
use App\Model\TypePackage;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request as Psr7Request;

class OrderController extends Controller
{
    public function listOrder(){
        $orders = Order::all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); 
        $pts = Pt::all();
      
        return view('admin.order.index',compact('orders','pts','today'));
 }
    
    public function addOrderRegister($id){
        $members =Member::all();
        $pts = Pt::all();
        $typePackages = TypePackage::find($id);

        return view('admin.order.create-order',compact('typePackages','members','pts'));
    }

    public function saveAddOrderRegister( OrderNewRequest $request){
        // dd($request->pt_id1);
        $data = new Infor();
        $data->fill($request->all());
        if(isset($request->coupon_code)) 
        {
            $coupon = Discount::where('code',request()->coupon_code)->first();
            $coupon->quantity = $coupon->quantity - 1;
            $coupon->save();
        }
           $data->password = bcrypt(123456) ;
           $data->role = 1;
           $data->source = request()->source;
        //    dd($data);
            $data->save();
            if(($data->source) == 1){
            $member = new Member;
            $member->status = 1;
            $member->infor_id = $data->id;
            $member->save();
            }else{
                $member = new Member;
                $member->status = 1;
                $member->infor_id = $data->id;
                $member->pt_id =request()->pt_id1;
                // dd($member);
                $member->save();
            }
            $order = New Order;
            $order->member_id =$member->id;
            $order->typePackage_id = $request->typePackage_id;
            $order->start_date = request()->start_date;
            $order->finish_date = request()->finish_date;
            $order->discount_id = request()->discount_id;
            $order->pt_id = request()->pt_id;
            if(isset($request->sub_total)){
             $order->total_money = request()->sub_total;
            }else{
              $order->total_money = request()->total_money;
            }
            $order->status = 1;
            $order->payment_method = request()->payment_method;
            
            $order->save();
            if($order->pt_id == 0){
                $email = $order->member->infor->email;
                $data=[
                   'name'=> $order->member->infor->name,
                   'bo_mon' => $order->typepackage->subject->subject_name,
                   'loai_goi_tap' => $order->typepackage->TypePackage_name,
                   'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
                   'start_date' =>$order->start_date,
                   'finish_date' =>$order->finish_date,
                   'total' => $order->total_money,
                   'tai_khoan' => $order->member->infor->email,
                   'password' => 123456,
        
                ];
                Mail::send('email.mailfb',$data, function($message) use ($email){
                    $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o ????ng k?? g??i t???p');
                });
            }else{
                $email = $order->member->infor->email;
                $data=[
               'name'=> $order->member->infor->name,
               'bo_mon' => $order->typepackage->subject->subject_name,
               'loai_goi_tap' => $order->typepackage->TypePackage_name,
               'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
               'start_date' =>$order->start_date,
               'finish_date' =>$order->finish_date,
               'total' => $order->total_money,
               'tai_khoan' => $order->member->infor->email,
               'password' => 123456,
    
            ];
            Mail::send('email.mailfb',$data, function($message) use ($email){
                $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o ????ng k?? g??i t???p');
            });

                $email_pt = $order->pt->infor->email;
                $content = [
                    'name' => $order->pt->infor->name,
                    'namemember' => $order->member->infor->name,
                    'phone' =>$order->member->infor->phone,
                    'address' =>$order->member->infor->address,
                    'birth_date' => $order->member->infor->birth_date,
                    'gender' => $order->member->infor->gender,
                ];
           Mail::send('email.mailpt',$content, function($message) use ($email_pt){
                    $message->to($email_pt,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o ????ng k?? g??i t???p');
                });
            
            }
            return  redirect()->route('order.listorder')->with('success', 'Th??m th??nh c??ng');
        
       
    }
    public function addMember($id){
        $members =Member::all();
        $pts = Pt::all();
        $typePackages = TypePackage::find($id);
        return view('admin.order.creat-order-member',compact('typePackages','members','pts'));
    }
    public function saveAddMember(OrderOldRequest $request){
        $input = $request->all();
        if(isset($request->coupon_code)) 
        {
            $coupon = Discount::where('code',request()->coupon_code)->first();
            $coupon->quantity = $coupon->quantity - 1;
            $coupon->save();
        }
        $order = New Order;
        $order->member_id = request()->member_id;
        $order->payment_method = request()->payment_method;
        $order->typePackage_id = request()->typePackage_id;
        $order->start_date = request()->start_date;
        $order->finish_date = request()->finish_date;
        $order->discount_id = request()->discount_id;
        if(isset($request->sub_total)){
            $order->total_money = request()->sub_total;
           }else{
             $order->total_money = request()->total_money;
           }
        $order->status_reserves = 1;
        $order->status = 1;
        $order->pass = 0;
        // dd($order);
        $order->save();
        if($order->pt_id == 0){
            $email = $order->member->infor->email;
            $data=[
               'name'=> $order->member->infor->name,
               'bo_mon' => $order->typepackage->subject->subject_name,
               'loai_goi_tap' => $order->typepackage->TypePackage_name,
               'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
               'start_date' =>$order->start_date,
               'finish_date' =>$order->finish_date,
               'total' => $order->total_money,
               'tai_khoan' => $order->member->infor->email,
               'password' => 123456,
    
            ];
            Mail::send('email.mailfb',$data, function($message) use ($email){
                $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o ????ng k?? g??i t???p');
            });
        }else{
            $email = $order->member->infor->email;
            $data=[
           'name'=> $order->member->infor->name,
           'bo_mon' => $order->typepackage->subject->subject_name,
           'loai_goi_tap' => $order->typepackage->TypePackage_name,
           'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
           'start_date' =>$order->start_date,
           'finish_date' =>$order->finish_date,
           'total' => $order->total_money,
           'tai_khoan' => $order->member->infor->email,
           'password' => 123456,

        ];
        Mail::send('email.mailfb',$data, function($message) use ($email){
            $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o ????ng k?? g??i t???p');
        });

            $email_pt = $order->pt->infor->email;
            $content = [
                'name' => $order->pt->infor->name,
                'namemember' => $order->member->infor->name,
                'phone' =>$order->member->infor->phone,
                'address' =>$order->member->infor->address,
                'birth_date' => $order->member->infor->birth_date,
                'gender' => $order->member->infor->gender,
            ];
       Mail::send('email.mailpt',$content, function($message) use ($email_pt){
                $message->to($email_pt,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o ????ng k?? g??i t???p');
            });
        
        }
      
        return  redirect()->route('order.listorder')->with('success', 'Th??m th??nh c??ng');
    }
    public function deleteOrder($id){
      $order =   Order::where('id',$id)->delete();
      Reserve::where('order_id',$id)->delete();
        return  redirect()->route('order.listorder')->with('success', 'Xo?? th??nh c??ng');
    }
     public function repeat($id){
         $order = Order::find($id);
            $data = $order->typePackage_id;
            $pts = Pt::all();
            $typePackages = TypePackage::find($data); 
         return view('admin.order.repeat-order',compact('order','pts','typePackages')); 
     }
     public function saveRepeat(OrderReupRequest $request ){
    




         $orders = new Order;
        $paragam = $request->all();
        if(isset($request->coupon_code)) 
        {
            $coupon = Discount::where('code',request()->coupon_code)->first();
            $coupon->quantity = $coupon->quantity - 1;
            $coupon->save();
        }
        $paragam = [];
        $paragam['member_id'] = request()->get('member_id');
        $paragam['typePackage_id'] = request()->get('typePackage_id');
        if(isset($request->sub_total)){
            $paragam['total_money'] = request()->get('sub_total');
           }else{
            $paragam['total_money'] = request()->get('total_money');
           }
        //    dd($request->total_money);
        $paragam['pt_id'] = request()->get('pt_id');
        $paragam['start_date'] = request()->get('start_date');
        $paragam['finish_date'] = request()->get('finish_date');
        $paragam['status'] = 1;
        $paragam['payment_method'] = request()->get('payment_method');
        $orders->insert($paragam);
        //thong tin email
        // dd($paragam['member_id']);
        $order =Order::where('member_id',$paragam['member_id'])->latest()->paginate(1)->first();
        // dd($order->member);
        $email = $order->member->infor->email;
        $data=[
           'name'=> $order->member->infor->name,
           'bo_mon' => $order->typepackage->subject->subject_name,
           'loai_goi_tap' => $order->typepackage->TypePackage_name,
           'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
           'start_date' =>$order->start_date,
           'finish_date' =>$order->finish_date,
           'total' => $order->total_money,
           'tai_khoan' => $order->member->infor->email,
           'password' => 123456,

        ];
        //g???i email
        if($order->pt_id === 0){
            Mail::send('email.mailfb',$data, function($message) use ($email){
                $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o gia h???n l???i g??i t???p');
            });
        }else{
        Mail::send('email.mailfb',$data, function($message) use ($email){
            $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o gia h???n l???i g??i t???p');
        });
            $email_pt = $order->pt->infor->email;
            $content = [
                'name' => $order->pt->infor->name,
                'namemember' => $order->member->infor->name,
                'phone' =>$order->member->infor->phone,
                'address' =>$order->member->infor->address,
                'birth_date' => $order->member->infor->birth_date,
                'gender' => $order->member->infor->gender,
            ];
       Mail::send('email.mailpt',$content, function($message) use ($email_pt){
                $message->to($email_pt,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o gia h???n l???i g??i t???p');
            });
        
        }
        return  redirect()->route('order.listorder')->with('success', 'Gia H???n th??nh c??ng');
     }

     public function checkCoupon(Request $request) 
     { 
       $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'); 
       $data = $request->all();
       $coupon = Discount::where('code', $data['coupon'])->where('status',1)->where('finish_day','>=',$today)->where('quantity','>=',1)->first();
       if($coupon) {
           $count_coupon = $coupon->count();
           if($count_coupon>0) {
               $count_session = Session::get('coupon');
               if($count_session==true){
                   $is_avaiable = 0;
                   if($is_avaiable==0) {
                       $cou[] = array(
                           'code' => $coupon->code,
                           'price' => $coupon->price,
                       );
                    Session::put('coupon', $cou);
                   }
               } else {
                $cou[] = array(
                    'code' => $coupon->code,
                    'price' => $coupon->price,
                );
             Session::put('coupon', $cou);
               }
               Session::save();
               session()->flash('status', 'th??m m?? gi???m gi?? th??nh c??ng!');
               return redirect()->back();
           }
       }else{
        session()->flash('status', 'm?? gi???m gi?? kh??ng h???p l???!');
        return redirect()->back();
       }
     }

     public function unsetCoupon() 
     {
      $coupon = Session::get('coupon');
      if($coupon==true) {
          Session::forget('coupon');
          session()->flash('status', 'x??a m?? gi???m gi?? th??nh c??ng!');
          return redirect()->back();
      }
     }

     public function export($id){
         $pt = Pt::find($id);
        $name = $pt->infor->name;
         $file = Excel::download(new ExcelExportOrder($id),"Danh S??ch Member ???? Book PT $name.xlsx");
         return $file;
     }
     public function exportcheckbook(Request $request){
        $request = $request->all();
        $arr = $request['arr'];
        foreach($arr as $id){
            $order = Order::find($id);
            $pt = Pt::find($order->pt_id);
       $name = $pt->infor->name;
       
        $file = Excel::download(new Test($id),"Danh S??ch Member ???? Book PT $name.xlsx");
        return $file;
        }
        
    }
    
     public function deletesOrder(Request $request)
     {
         $request = $request->all();
         $arr = $request['arr'];
         foreach($arr as $item){
            
             Order::find($item)->delete();
         }
     }
     
     public function listReserve(){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
         $reserves = Reserve::all();
         return view('admin.order.reseveres.listreserves',compact('reserves','today'));
     }
     public function detailMemberReserve($id){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $reserves = Reserve::where('order_id',$id)->get();
         return view('admin.order.reseveres.detail-member-reserves',compact('reserves','today'));
     }
     // b???o l??u
     public function reserve($id){
         $order = Order::find($id);
         return view('admin.order.reseveres.creat-reserve',compact('order'));
     }
     public function saveReserve(ReserveRequest $request,$id){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
         $orders = Order::find($id);
         $x = [];
         $x['status'] = 3;
         $orders->update($x);
        $reserve =  new Reserve;
        $data = [];
        $data = $request->all();
        // dd($request->payment_method);
        $a = (strtotime($request->finish_day)- strtotime($request->start_day))/(60*60*24);
            $price = $a * 8000;
            $data['price']=$price;
            $data['status'] = 1;
            $data['payment_method'] = $request->payment_method;
            unset($data['_token']);
            unset($data['time']);
            if($a >=29 && $a<60){
              
                $reserve->create($data);
 
                //gui mail
                $email = $orders->member->infor->email;
                $data=[
                   'name'=> $orders->member->infor->name,
                   'bo_mon' => $orders->typepackage->subject->subject_name,
                   'loai_goi_tap' => $orders->typepackage->TypePackage_name,
                   'hlv' => isset($orders->pt->infor) ? $orders->pt->infor->name : 'Kh??ng C??' ,
                   'start_day' =>$request->start_day,
                   'finish_day' =>$request->finish_day,
                   'total' => $request->price,
                ];
                //khi g??i t???p kh??ng c?? PT
               if($orders->typepackage->catetoryPackage == 1){
                Mail::send('email.mail-reserve',$data, function($message) use ($email){
                    $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o b???o l??u g??i t???p');
                });
               }else{
                $email_pt = $orders->pt->infor->email;
                $data2= [
                    'name_pt' => $orders->pt->infor->name,
                    'name_member' => $orders->pt->infor->name,
                    'goitap' => $orders->typepackage->TypePackage_name,
                    'start_day' =>$request->start_day,
                    'finish_day' =>$request->finish_day,
                ];
                Mail::send('email.reserve-pt',$data2, function($message) use ($email_pt){
                    $message->to($email_pt,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o b???o l??u g??i t???p');
                });
                Mail::send('email.mail-reserve',$data, function($message) use ($email){
                    $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o b???o l??u g??i t???p');
                });
                return  redirect()->route('order.listReserve')->with('success', 'B???o l??u th??nh c??ng');
            }
            // dd($data);
            return  redirect()->route('order.listReserve')->with('success', 'B???o l??u th??nh c??ng');
     }else{
        return  redirect()->route('order.reserve',['id'=>$orders->id])->with('success', 'S??? ng??y b???o l??u ph???i l???n 30 v?? nh??? h??n 60 ng??y');
    }
    
    
    }
     public function changeStatusReserve($id)
     {
        $reserve = Reserve::find($id);
        if($reserve->status_pay ==1){
           $reserve->status_pay = 2;
           $reserve->update();
        }else{
           $reserve->status_pay = 1;
           $reserve->update();
        }
       //  dd($order);
        return  redirect()->route('order.listReserve')->with('success', 'Chuy???n tr???ng th??i th??nh c??ng');
     }
     public function deleteReserve($id){
         $reserve = Reserve::find($id);
         $reserve->delete();
         return  redirect()->route('order.listReserve')->with('success', 'Xo?? th??nh c??ng');
     }
     //detail
     public function detailReserve($id){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); 
         $reserves= Reserve::find($id);
         $order  = Order::where('id',$reserves->order_id)->first();
         return view('admin.order.reseveres.detail-reserves',compact('order','today'));
     }


//chuy???n nh?????ng ho?? ????n

    public function addNewMemberPass($id){
        $members = Member::all();
        $orders = Order::find($id);
        $data = $orders->typePackage_id;
        $typePackage = TypePackage::find($data); 
        $pts = Pt::all();
        return view('admin.order.pass.creat-pass',compact('members','orders','typePackage','pts'));
        }
    public function saveNewMemberPass(NewMemberPass $request,$id){
        $end_date = request()->finish_date;
        $request->validate([
            'start_date' => "before:$end_date",
            ],
            [    
                'start_date.before' => 'Ng??y b???t ?????u chuy???n nh?????ng kh??ng ???????c sau ng??y k???t th??c',
            ]
         );
        $data = new Infor();
        $data->fill($request->all());
        if(isset($request->coupon_code)) 
        {
            $coupon = Discount::where('code',request()->coupon_code)->first();
            $coupon->quantity = $coupon->quantity - 1;
            $coupon->save();
        }
           $data->password = bcrypt(123456) ;
           $data->role = 1;
           $data->source = request()->source;
            $data->save();
            if(($data->source) == 1){
            $member = new Member;
            $member->status = 1;
            $member->infor_id = $data->id;
            $member->pt_id = 1;
            $member->save();
            }else{
                $member = new Member;
                $member->status = 1;
                $member->infor_id = $data->id;
                $member->pt_id =request()->pt_id;
                $member->save();
            }
            $orders = Order::find($id);
            $orders->status = 4;
            $pass = $orders->member_id;
            $orders->update();
            $orderr = new Order;
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); 
            $paragam = [];
            $paragam['member_id'] = $member->id;
            $paragam['typePackage_id'] = request()->get('typePackage_id');
            if(isset($request->sub_total)){
                $paragam['total_money'] = request()->get('sub_total');
               }else{
                $paragam['total_money'] = 1000000;
               }
            $paragam['pt_id'] = request()->get('pt_id');
            $paragam['start_date'] = request()->get('start_date');
            $paragam['finish_date'] = request()->get('finish_date');
            $paragam['status'] = 1;
            $paragam['status_pass'] = 2;
            $paragam['status_reserves'] = 1;
            $paragam['pass'] = $pass;
            $paragam['payment_method'] = request()->get('payment_method');
            $a = (strtotime($orders->finish_date)- strtotime($request->start_date))/(60*60*24);
            // dd($order->create($paragam));
            if($a>30){
                $orderr->create($paragam);
                $order =Order::where('member_id',$paragam['member_id'])->latest()->paginate(1)->first();
            
               //gui mail
               $email_hoi_vien_moi = $data->infor->email;
               $email_hoi_vien_cu = $orders->member->infor->email;
               $email_pt = $orders->pt->infor->email;
               if($order->pt_id ==0){
                $data=[
                    'name_member2'=> $order->member->infor->name,
                    'name_member1' =>$orders->member->infor->name,
                    'bo_mon' => $order->typepackage->subject->subject_name,
                    'loai_goi_tap' => $order->typepackage->TypePackage_name,
                    'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
                    'total' => 1000000,
                    'phone' =>$order->member->infor->phone,
                    'address' =>$order->member->infor->address,
                    'birth_date' =>$order->member->infor->birth_date,
                    'gender' =>$order->member->infor->gender,
                    'finish_date' => $order->finish_date,
                    'name_pt' => 'Kh??ng c??',
                    
                 ];
               }else{
                   $data=[
                'name_member2'=> $order->member->infor->name,
                'name_member1' =>$orders->member->infor->name,
                'bo_mon' => $order->typepackage->subject->subject_name,
                'loai_goi_tap' => $order->typepackage->TypePackage_name,
                'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
                'total' => 1000000,
                'phone' =>$order->member->infor->phone,
                'address' =>$order->member->infor->address,
                'birth_date' =>$order->member->infor->birth_date,
                'gender' =>$order->member->infor->gender,
                'name_pt' => $orders->pt->infor->name,
                'finish_date' => $order->finish_date,
             ];
            }
            //    //khi g??i t???p kh??ng c?? PT
            if($orders->typepackage->catetoryPackage == 1){
                Mail::send('email.pass-member',$data, function($message) use ($email_hoi_vien_cu){
                    $message->to($email_hoi_vien_cu,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
                });
                Mail::send('email.confirm-pass-member',$data, function($message) use ($email_hoi_vien_moi){
                 $message->to($email_hoi_vien_moi,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
             });
             }else{
                 //th??ng b??o cho h???i vi??n c??
                 Mail::send('email.pass-member',$data, function($message) use ($email_hoi_vien_cu){
                     $message->to($email_hoi_vien_cu,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
                 });
                 //th??ng b??o cho h???i vi??n m???i
                 Mail::send('email.confirm-pass-member',$data, function($message) use ($email_hoi_vien_moi){
                     $message->to($email_hoi_vien_moi,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
                 });
                 //g???i email pt
                   
                    Mail::send('email.pass-pt',$data, function($message) use ($email_pt){
                     $message->to($email_pt,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
                 });
                }
                return  redirect()->route('order.listorder')->with('success', 'Chuy???n nh?????ng  th??nh c??ng');
            }else{
                return  redirect()->route('order.addNewMemberPass',['id'=>$id])->with('success', 'Th???i gian chuy???n nh?????ng ph???i l???n h??n 30 ng??y');
            }
           
    }

     public function listPassOrder($id){
        //  dd($id);
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); 
        $pts = Pt::all();
            $orders = Order::find($id);
            if($orders->pass ==0){
                $members= Order::where('pass',$id)->first();
                return view('admin.order.pass.listpass-order',compact('orders','members','today','pts'));
            //    dd('thang22');
            }elseif($orders->status==4 && $orders->status_pass==2){
                $thang1 = Order::where('id',$orders->pass)->first();
                $thang3 = Order::where('pass',$id)->first();
            //  dd($thang1,$thang3);
            return view('admin.order.pass.listpass-order',compact('orders','thang1','today','thang3','pts'));
            }elseif($orders->status ==1 && $orders->status_pass==2){
                $thanggiua = Order::where('id',$orders->pass)->first();
                return view('admin.order.pass.listpass-order',compact('orders','thanggiua','today','pts'));
            }
       
     }
      //member-d?? pass
      public function profileMemberPass($id){
    
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); 
        $pts = Pt::all();
        $order = Order::find($id);
          
        return view('admin.order.pass.member-pass',compact('pts','today','order'));
    }
     public function passOrder($id){
         $members = Member::all();
         $order = Order::find($id);
        $data = $order->typePackage_id;
        $typePackages = TypePackage::find($data); 
        return view('admin.order.pass.passorder',compact('members','order','typePackages'));
     }
     
     public function savePassOrder(OldMemberPass $request,$id){
         $today = Carbon::now();
        $end_date = request()->finish_date;
        $request->validate([
            'start_date' => "before:$end_date",
            ],
            [    
                'start_date.before' => 'Ng??y b???t ?????u chuy???n nh?????ng kh??ng ???????c sau ng??y k???t th??c',
            ]
         );
        $orders = Order::find($id);
        $orders->status = 4;
        $pass = $orders->id;
        $orders->update();
        $pt=$orders->pt_id;
        $orderr = new Order;
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); 
        if((strtotime($request->start_date)- strtotime($today)) < 0){
            return  redirect()->route('order.pass',['id'=>$id])->with('success', 'Ng??y b???t ?????u pass ph???i l???n h??n ng??y hi???n t???i');
        }
        $paragam = [];
        $paragam['member_id'] = request()->get('member_id');
        $paragam['typePackage_id'] = request()->get('typePackage_id');
        if(isset($request->sub_total)){
            $paragam['total_money'] = request()->get('sub_total');
           }else{
            $paragam['total_money'] = 1000000;
           }
        $paragam['pt_id'] = $pt;
        $paragam['start_date'] = request()->get('start_date');
        $paragam['finish_date'] = request()->get('finish_date');
        $paragam['status'] = 1;
        $paragam['status_pass'] = 2;
        $paragam['status_reserves'] = 1;
        $paragam['pass'] = $pass;
        $paragam['payment_method'] = request()->get('payment_method');
        // dd($request->start_date);
        $a = (strtotime($orders->finish_date)- strtotime($request->start_date))/(60*60*24);
        // dd($a);
        if($a>30){

            $orderr->create($paragam);
            $order =Order::where('member_id',$paragam['member_id'])->latest()->paginate(1)->first();
          
               //gui mail
               $email_hoi_vien_moi = $order->member->infor->email;
               $email_pt = $orders->pt->infor->email;
               $email_hoi_vien_cu = $orders->member->infor->email;
               if($order->pt_id ==0){
                $data=[
                    'name_member2'=> $order->member->infor->name,
                    'name_member1' =>$orders->member->infor->name,
                    'bo_mon' => $order->typepackage->subject->subject_name,
                    'loai_goi_tap' => $order->typepackage->TypePackage_name,
                    'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
                    'total' => 1000000,
                    'phone' =>$order->member->infor->phone,
                    'address' =>$order->member->infor->address,
                    'birth_date' =>$order->member->infor->birth_date,
                    'gender' =>$order->member->infor->gender,
                    'finish_date' => $order->finish_date,
                    'name_pt' => 'Kh??ng c??',
                    
                 ];
               }else{
                   $data=[
                'name_member2'=> $order->member->infor->name,
                'name_member1' =>$orders->member->infor->name,
                'bo_mon' => $order->typepackage->subject->subject_name,
                'loai_goi_tap' => $order->typepackage->TypePackage_name,
                'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
                'total' => 1000000,
                'phone' =>$order->member->infor->phone,
                'address' =>$order->member->infor->address,
                'birth_date' =>$order->member->infor->birth_date,
                'gender' =>$order->member->infor->gender,
                'name_pt' => $order->pt->infor->name,
                'finish_date' => $order->finish_date,
             ];
            }
            //    //khi g??i t???p kh??ng c?? PT
              if($orders->typepackage->catetoryPackage == 1){
               Mail::send('email.pass-member',$data, function($message) use ($email_hoi_vien_cu){
                   $message->to($email_hoi_vien_cu,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
               });
               Mail::send('email.confirm-pass-member',$data, function($message) use ($email_hoi_vien_moi){
                $message->to($email_hoi_vien_moi,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
            });
            }else{
                //th??ng b??o cho h???i vi??n c??
                Mail::send('email.pass-member',$data, function($message) use ($email_hoi_vien_cu){
                    $message->to($email_hoi_vien_cu,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
                });
                //th??ng b??o cho h???i vi??n m???i
                Mail::send('email.confirm-pass-member',$data, function($message) use ($email_hoi_vien_moi){
                    $message->to($email_hoi_vien_moi,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
                });
                //g???i email pt
                  
                   Mail::send('email.pass-pt',$data, function($message) use ($email_pt){
                    $message->to($email_pt,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o chuy???n nh?????ng g??i t???p');
                });
               }
         
    
            return  redirect()->route('order.listorder')->with('success', 'Chuy???n nh?????ng  th??nh c??ng');
        }else{
            return  redirect()->route('order.pass',['id'=>$id])->with('success', 'Th???i gian chuy???n nh?????ng ph???i l???n h??n 30 ng??y');
        }
      
     }
     //edit order
     public function editOrder($id){
        $members = Member::all();
        $order = Order::find($id);
           $data = $order->typePackage_id;
           $pts = Pt::all();
           $typePackages = TypePackage::find($data); 
           return view('admin.order.reseveres.edit-order',compact('members','pts','order','typePackages'));
     }
     public function saveEditOrder(EditOrderRequest $request,$id){
         $order = Order::find($id);
         $order->finish_date = $request->finish_date;
         $order->status = 1;
         $order->status_reserves =2;
        //  dd($order);
         $order->update();
         $email = $order->member->infor->email;
         $data=[
            'name_member'=> $order->member->infor->name,
            'bo_mon' => $order->typepackage->subject->subject_name,
            'loai_goi_tap' => $order->typepackage->TypePackage_name,
            'hlv' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
            'total' => 1000000,
            'phone' =>$order->member->infor->phone,
            'address' =>$order->member->infor->address,
            'birth_date' =>$order->member->infor->birth_date,
            'finish_date' =>$order->finish_date,
            'name_pt' => isset($order->pt->infor) ? $order->pt->infor->name : 'Kh??ng C??' ,
         ];
         Mail::send('email.add-date-reserve',$data, function($message) use ($email){
            $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Th??ng b??o k???t th??c b???o l??u');
        });
        return  redirect()->route('order.listorder')->with('success', 'S???a  ho?? ????n th??nh c??ng');
     }

     public function downloadPDF($id) {
        $data =  Order::find($id);
        view()->share('admin.order.pdf', compact('data'));
        $pdf = PDF::loadView('admin.order.pdf', compact('data'));
        return $pdf->download('disney.pdf');
        // return view('admin.order.pdf', compact('data'));
    }
    
  
}