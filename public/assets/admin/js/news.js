
$('#select_box').change(function () {
    var select = $(this).find(':selected').val();
    console.log(select);
    $('.hide').hide(500);
    $('#' + select).show(500);
}).change();
$('#summernote').summernote({
    placeholder: 'Vui lòng nhầm thông tin.',
    tabsize: 2,
    height: 100
});
//change-status-post
  $(function() {
    $('.toggle-class-post').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var post_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/change-post',
            data: {'status': status, 'post_id': post_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  });
//change-status-discount
$(function() {
  $('.toggle-class-discount').change(function() {
      var status = $(this).prop('checked') == true ? 1 : 0; 
      var discount_id = $(this).data('id');
      $.ajax({
          type: "GET",
          dataType: "json",
          url: '/change-discount',
          data: {'status': status, 'discount_id': discount_id},
          success: function(data){
            console.log(data.success)
          }
      });
  })
});



