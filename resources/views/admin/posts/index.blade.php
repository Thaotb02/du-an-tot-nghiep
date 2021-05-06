@extends('layout-admin')
@section('content')
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
                                    <h3 style="font-weight: 600">Danh sách bài viết </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý bài viết
                                    </li>
                                    <li class="breadcrumb-item">Danh sách bài viết
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="page-body">
                    @if (\Session::has('success'))
                    <div class="alert background-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">

                                <div class="card-block">
                                    <a href="{{route('post.add')}}" class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span> Thêm mới bài viết</a>
                                        <div class="export">
                                                <a href ="{{route('export-post') }}" class="btn btn-info export" id="export-button"> Export file </a>
                                        </div>
                           <!-- <button type="button" id="addRow" class="btn btn-primary m-b-20">+ Add Row</button> -->
                           <div class="dt-responsive table-responsive">
                              <table id="footer-select" class="table table-striped table-bordered nowrap">
                                 <thead>
                                    <tr>
                                       <th><button class="btn btn-danger" id="delete" onclick="xoa()" style="display: none">Xoá</button></th>
                                       <th>Stt</th>
                                       <th>Bài viết</th>
                                       <th>Hành động</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($posts as $no => $post)
                                    <tr>
                                       <td> <input type="checkbox" id="value_check{{$post->id}}" aria-label="Checkbox for following text input" onclick="Check({{$post->id}})" name="check"></td>
                                       <td>{{$no+1}}</td>
                                       <td>
                                          <div class="media">
                                             <div class="media-left" style="width:160px">
                                                <img class="media-object card-list-img" src="/{{$post->featured_image}}"  width="100%">
                                             </div>
                                             <div class="media-body">
                                                <div class="col-xs-12">
                                                   <h6 class="d-inline-block">
                                                      {{$post->title}}
                                                   </h6>
                                                  
                                                </div>
                                                <div class="f-13 text-muted m-b-15">
                                                   {{isset($post->subject) ? $post->subject->subject_name : ''}}
                                                </div>
                                                <div class="f-13 text-muted m-b-15">
                                                    Người đăng :
                                                     {{$post->infor->name}}
                                                 </div>
                                               
                                                <p>Cập nhật mới nhất : {{$post->updated_at}}</p>
                                                <div class="m-t-15">
                                                <input data-id="{{$post->id}}" class="toggle-class-post" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $post->status ? 'checked' : '' }}>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td class="dropdown">
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="feather icon-settings"></i>
                                         </button>
                                         <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                           <a class="dropdown-item" href="{{route('post.edit',['id'=>$post->id])}}"><i class="icofont icofont-edit"></i>Sửa</a>
                                           <a class="dropdown-item" href="{{route('post.remove',['post'=>$post->id])}}" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này')"><i class="icofont icofont-ui-delete"></i>Xóa</a>
                                         </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
   var url_getSP = "{{route('post.deletePost')}}";
   var arr = [];
   function Check(id){
       var x = document.getElementById("value_check"+id);
       
       if(x.checked == true){
           console
       arr.unshift(id);
       $("#delete").css('display', 'block');
       
       }
       if(x.checked == false){
           var index = arr.indexOf(id);
           if (index > -1) {
           arr.splice(index, 1);
           }
           if(arr.length == 0){
               $("#delete").css('display', 'none');
           }
       }
   }
  function xoa(){
      axios.post(url_getSP, {
          arr:arr
      });
      window.location.href = "{{route('post.list')}}";
  }
</script>
