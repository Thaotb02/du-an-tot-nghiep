<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TypePackageRequest;
use App\Model\Package;
use App\Model\TypePackage;
use App\Model\PT;
use App\Model\Subject;

class TypePackageController extends Controller
{
    public function index(Request $request) 
    {
        $typePackAge = TypePackage::all();
        $subjects = Subject::all();
        $pt = PT::all();
        return view('admin.typePackage.typepackage' , compact('typePackAge','subjects','pt'));
    }
    
    public function createTypePackage() 
    {
      $subjects = Subject::all();
      $pt = PT::all();
      return view('admin.typePackage.create-typepackage' , compact('subjects','pt'));
    }

    public function addTypePackage(TypePackageRequest $request)
    {   
      $price = $request->price;
      $request->validate([
        'price_sale' => "nullable|numeric|min:0|max:$price",
        ],
        [
          'price_sale.max' => 'giá sale không được vượt quá giá gốc',
          'price_sale.numeric' => 'giá sale phải là số',
          'price_sale.min' => 'giá sale không được nhỏ hơn 0',
        ]
      );
        $typePackAge = new TypePackage();
        $typePackAge->fill($request->all());
        $typePackAge->status = 1 ;
         $typePackAge->save();
         return redirect()->route('typepackage.list')->with('success', 'Thêm gói tập thành công');
    }

    public function deleteTypePackage($id) 
    {
        $typePackAge = TypePackage::destroy($id);
        return redirect()->back();  
    }

    public function editTypePackage($id) 
    {
        $typePackAge = TypePackage::find($id);
        $subjects = Subject::all();
        $pt = Pt::all();
        return view('admin.typePackage.edit-typepackage',compact('typePackAge','pt','subjects'));
    }

    public function updateTypePackage($id, TypePackageRequest $request) 
    {   
        $price = $request->price;
        $request->validate([
          'price_sale' => "nullable|numeric|min:0|max:$price",
          ],
          [
            'price_sale.max' => 'giá sale không được vượt quá giá gốc',
            'price_sale.numeric' => 'giá sale phải là số',
            'price_sale.min' => 'giá sale không được nhỏ hơn 0',
          ]
         );
        $typePackAge = TypePackage::find($id);
        $typePackAge->fill($request->all());
         $typePackAge->save();
         return redirect()->route('typepackage.list')->with('success', 'Cập nhập loại gói tập thành công');
    }
    public function deletestype(Request $request)
    {
        $request = $request->all();
        $arr = $request['arr'];
        foreach($arr as $item){
           
            TypePackage::find($item)->delete();
       
         
        }
    }
}