
$(document).ready(function(){

    //get base URL *********************
    var url = $('#url').val();


    //display modal form for creating new product *********************
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmPackage').trigger("reset");
        $('#editModal').modal('show');;
        console.log($('#btn-save').val("add"))
    });



    //display modal form for product EDIT ***************************
    $(document).on('click','.open_modal',function(){
        var id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/' + id,
            success: function (data) {
                console.log(data);
                $('#id').val(data.id);
                $('#package_name').val(data.package_name);
                $('#image').val(data.image);
                $('#description').val(data.description);
                $('#subject_id').val(data.subject_id);
                $('#btn-save').val("update");
                $('#myModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new product / update existing product ***************************
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 
        var formData = {
            package_name: $('#package_name').val(),
            image: $('#image').val(),
            description: $('#description').val(),
            subject_id: $('#subject_id').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var id = $('#id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                // var items = '<tr class="active" id="item' + data.id + '"> <th><input type="checkbox" class="individual" /></th><th scope="row">1</th><td><a class=" btn btn-primary" href="javascript:;" data-toggle="modal"data-target="#createpackage"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><button class=" btn btn-success btn-detail open_modal" href="javascript:;" value="' + data.id + '" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-edit"></i></button><button class=" btn btn-danger delete-product"  value="' + data.id + '"href="javascript:;"><i class="fa fa-trash-o"></i></button></td>  <td>' + data.package_name + '</td><td>' + data.subject_id + '</td><td><button class="btn-primary pushme2 with-color">Đang hoạtđộng</button></td>';
                var items = '<tr class="active" id="item' + data.id + '"> <th><input type="checkbox" class="individual" /></th><th scope="row">1</th><td><a class=" btn btn-primary" href="javascript:;" data-toggle="modal"data-target="#createpackage"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><button class=" btn btn-success btn-detail open_modal" href="javascript:;" value="' + data.id + '" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-edit"></i></button><button class=" btn btn-danger delete-product"  value="' + data.id + '"href="javascript:;"><i class="fa fa-trash-o"></i></button></td>  <td>' + data.image + '</td><td>' + data.package_name + '</td><td>' + data.description + '</td><td>' + data.subject_id + '</td><td><button class="btn-primary pushme2 with-color">Đang hoạtđộng</button></td>';
                if (state == "add"){ //if user added a new record
                    $('#package-list').append(items);
                }else{ //if user updated an existing record
                    $("#items" + id).replaceWith( items );
                }
                $('#frmPackage').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete product and remove it from TABLE list ***************************
    $(document).on('click', '.delete-product', function () {
        var id = $(this).val();
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        swal({
            title: "Delete?",
            text: "Are you sure want to delete this row",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            confirmButtonColor: "#33a4d8",
            cancelButtonColor: "#fc7070",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false

        }).then(function () {
            $.ajax({
                type: "DELETE",
                url: url + '/' + id,
                success: function (data) {
                    console.log(data);
                    $("#item" + id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
    
});