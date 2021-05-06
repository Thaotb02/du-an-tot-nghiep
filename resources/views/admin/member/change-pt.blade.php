@extends('layout-admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/component.css')}}" />
<base href="{{asset('')}}">
<div class="pcoded-content">
<div class="pcoded-inner-content">
   <div class="main-body">
      <div class="page-wrapper">
         <div class="page-header">
            <div class="row align-items-end">
               <div class="col-lg-8">
                  <div class="page-header-title">
                     <div class="d-inline">
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="page-header-breadcrumb">
                     <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                       
                           <i class="feather icon-home"></i>
                      
                        </li>
                        <li class="breadcrumb-item">
                          Quản lý hội viên
                        </li>
                        <li class="breadcrumb-item">
                           Thông tin chi tiết
                        </li>
                        <li class="breadcrumb-item">
                           Thay đổi huấn luyện viên
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="page-body">
            <div class="row justify-content-center">
               <div class="col-sm-6">
                  <div class="card">
                     <div class="card-header">
                        <h3 style="font-weight: 600">Thay đổi huấn luyện viên</h3>
                     </div>
                     <div class="card-block">
                        <form id="main" method="post"action="{{route('member.savechangept',['id'=>$order->id])}}" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group row">
                              <div class="col-sm-12">
                                 <label >Huấn luyện viên</label>
                                 <select class="form-control select2" id="select_box" name="pt_id">
                                    @foreach($pts as $pt)
                                    @if($pt->subject_id == $typePackages->subject->id)
                                    <option selected value="{{$pt->id}}">{{ $pt->infor->name }}</option>
                                    @endif
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                          
                           <div class="form-group row d-flex justify-content-center">
                              <button id="btn-save" value="add" class="btn btn-primary mr-1 waves-effect waves-light">
                              Hoàn Thành</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
<script>
    function test() {
        var b = [];
        var year = [];
        var dateSelect = parseInt($('#select-date').val());
        var params = new Date($('#dateup').val());
        var date = params.getDate();
        var fullyear = params.getFullYear();
    
        var month = params.getMonth() + 1;
        var a = parseInt(month + dateSelect);
    
        if (a > 12) {
            year = fullyear + 1;
    
            b = a % 12;
            var fullDate = date + "-" + b + "-" + year;
        } else {
            var fullDate = date + "-" + a + "-" + fullyear;
            
        }
        var input = document.getElementById('done');
         var abc = fullDate
         console.log(abc);
         input.value = fullDate;
    
         var myFunction = function (e) {
             console.log(e.target.value);
         }
    
        return;
    }
    
 </script>