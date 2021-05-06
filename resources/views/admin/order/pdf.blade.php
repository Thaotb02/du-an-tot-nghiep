<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" />
    <style>
            body{
               font-family: DejaVu Sans, sans-serif;  
            }
            h3{
               text-align: center;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>
    <title>Document</title>
</head>
<body>
<div class="page-body">
               <div class="row justify-content-center">
                  <div class="col-sm-6">
                     <div class="card">
                        <div class="card-header">
                           <h3>Hóa Đơn</h3>
                        </div>
                        <div class="card-block">
                              <div class="form-group row">
                                 <div class="col-sm-12">
                                    <label >Tên hội viên :</label>
                                    <strong> {{$data->member->infor->name}}</strong>
                                 </div>
                              </div>
                              <div class="form-group row mt-4">
                                 <div class="col-sm-6" >
                                    <label for=""> Bộ môn : <strong>{{$data->typepackage->subject->subject_name}}</strong></label>
                                 </div>
                                 <div class="col-sm-6">
                                    <label for="">Loại gói tập: <strong>{{$data->typepackage->TypePackage_name}}</strong></label>
                                 </div>
                              </div>
                              <div class="form-group row">
                               
                                 <div class="col-sm-6">
                                    <label class="">Ngày bắt đầu :</label>
                                    <strong> {{$data->start_date->format('d-m-Y')}}</strong>
                                 </div>
                                 <div class="col-sm-6">
                                    <label >Ngày kết thúc :</label>
                                    <strong> {{$data->finish_date->format('d-m-Y')}}</strong>
                                 </div>
                              </div>
                              <div class="form-group row mt-4">
                                 <div class="col-sm-12" >
                                    <label >Người hướng dẫn :</label>
                                    <strong>{{isset($data->pt->infor) ? $data->pt->infor->name : 'Không Có' }}</strong>
                                 </div>
                              </div>
                              <div class="form-group row mt-9">
                                 <div class="col-sm-7" >
                                    <label >Tổng tiền :</label>
                                    <strong> {{number_format($data->total_money,0,'','.')}} VNĐ</strong>
                                 </div>
                                 <hr>
                                <p>Cảm ơn quý khách đã sử dụng dịch vụ !</p>
                        </div>
</body>
</html>