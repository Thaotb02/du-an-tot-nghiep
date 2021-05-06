<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DiscountRequest;
use App\Model\Member;
use App\Model\Discount;
use Carbon\Carbon;


class DiscountController extends Controller
{
    public function index(Request $request) 
    {   
        $date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $discount = Discount::get();
        $Member = Member::all();
        return view('admin.discount.discount' , compact('discount','Member','date'));
    }
    
    public  function generateRandomString($length = 20) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    public function createDiscount() 
    {
        $discount = Discount::all();
        $Member = Member::all();
        return view('admin.discount.create-discount' , compact('discount','Member'));
    }

    public function addDiscount(DiscountRequest $request) 
    {
        $discount = new Discount();
        $discount->fill($request->all());
        $discount->status =1;
        $discount->code =  $this->generateRandomString(6);
        $discount->save();
        return redirect()->route('discount.list')->with('success', 'thêm mới voucher thành công');
    }

    public function deleteDiscount($id)
    {
       $discount = Discount::destroy($id);
        return  redirect()->back()->with('success', 'Xoá voucher thành công');   
    } 

    public function editDiscount($id) 
    {
        $discount = Discount::find($id);
        $Member = Member::all();
        return view('admin.discount.edit-discount', compact('discount','Member'));     
    }

    public function updateDiscount($id, DiscountRequest $request) 
    {
      $discount = Discount::find($id);
      $discount->fill($request->all());
      $discount->save();
       return redirect()->route('discount.list')->with('success', 'cập nhật voucher thành công');
    }

    public function changeStatus(Request $request)
    {
		$discount = Discount::find($request->discount_id);
        $discount->status = $request->status;
        $discount->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function deletesDiscount(Request $request)
    {
        $request = $request->all();
        $arr = $request['arr'];
        foreach($arr as $item){
            Discount::find($item)->delete();
        }
    }
    
}
