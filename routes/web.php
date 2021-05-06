<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;

// Guest
Route::get('/', 'Client\HomepageController@homepage' )->name('client.homepage');
Route::get('/tin-tuc', 'Client\HomepageController@listBlog' )->name('client.blog');
Route::get('/chi-tiet-tin-tuc/{id}', 'Client\HomepageController@detailBlog' )->name('client.detailblog');
Route::get('/danh-sach-huan-luyen-vien', 'Client\HomepageController@listPt' )->name('client.listpt');
Route::get('/bo-mon', 'Client\HomepageController@listSubject' )->name('client.list-subject');
Route::get('/chi-tiet-bo-mon/{id}', 'Client\HomepageController@detailSubject' )->name('client.detail-subject');
Route::get('/chinh-sach-gia', 'Client\HomepageController@listPackage' )->name('client.list-package');
Route::get('/lien-he', 'Client\ContactController@index' )->name('client.contact');
Route::post('/lien-he', 'Client\ContactController@createContact' )->name('client.create-contact');
Route::post('/modal-lienhe', 'Client\ContactController@Contact' )->name('client.contactt');
Route::get('/dang-nhap','Auth\AuthController@loginForm')->name('client.loginForm');
Route::get('/dang-xuat','Auth\AuthController@logout')->name('client.logout');
Route::post('/dang-nhap','Auth\AuthController@chanelogin')->name('client.chaneloginForm');
Route::get('/chi-tiet-huan-luyen-vien/{id}', 'Client\HomepageController@detailPt' )->name('client.detailpt');

// Quên mật khẩu
Route::get('/quen-mat-khau','Client\ForgotPasswordController@resetPasswordForm')->name('client.reset-password-form');
Route::post('/quen-mat-khau','Client\ForgotPasswordController@sendCodeResetPassword')->name('client.sendCodeResetPassword');
Route::get('/lay-lai-mat-khau','Client\ForgotPasswordController@resetPassword')->name('client.reset-password');
Route::post('/lay-lai-mat-khau','Client\ForgotPasswordController@saveChangePassword')->name('client.saveChangePassword');


// HỘi viên
Route::group(['prefix' => 'hoi-vien','middleware' => ['Checkmember','auth']],function() { 
Route::get('/', 'Client\HomepageController@homepage' )->name('client.homepagess');
Route::get('/thong-tin-ca-nhan/{id}','Client\MemberController@getprofileMember')->name('client.profileMember');
Route::get('/chi-tiet-bao-luu','Client\MemberController@detailReserve')->name('client.detailReserve');
Route::get('/chi-tiet-chuyen-nhuong','Client\MemberController@detailTransfer')->name('client.detailTransfer');
Route::get('/sua-thong-tin-ca-nhan/{id}','Client\MemberController@editprofileMember')->name('client.editProfile');
Route::post('/thong-tin-ca-nhan/{id}','Client\MemberController@updateProfileMember')->name('client.updateProfile');
Route::get('/chi-tiet-bao-luu/{id}','Client\MemberController@detailReserve')->name('client.detailReserve');
Route::get('/chi-tiet-chuyen-nhuong/{id}','Client\MemberController@detailTransfer')->name('client.detailTransfer');
Route::get('/doi-mat-khau','Client\MemberController@changePassword')->name('client.memberchangePassword');
Route::post('/updatepassword','Client\MemberController@updateChangePassword')->name('client.memberupdatepassword');
});


//Huấn luyện viên
Route::group(['prefix' => 'huan-luyen-vien','middleware' => ['CheckHlv','auth']],function(){
Route::get('/', 'Client\HomepageController@homepage' )->name('client.homepages');
Route::get('/thong-tin-huan-luyen-vien', 'Client\PtController@profilePt' )->name('client.pt-profile');
Route::get('/chinh-sua-huan-luyen-vien','Client\PtController@editProfilePt')->name('client.edit-pt-profile');
Route::post('/chinh-sua-huan-luyen-vien/{id}','Client\PtController@updateProfilePt')->name('client.update-pt-profile');
Route::get('/thong-tin-khach-hang/{id}','Client\PtController@showProfile')->name('client.member-detail');
Route::get('/doi-mat-khau','Client\PtController@changePassword')->name('client.changePassword');
Route::post('/updatepassword','Client\PtController@updateChangePassword')->name('client.updatepassword');
});

// Đăng nhập
Route::get('/admin','Auth\AdminController@loginForm')->name('admin.loginForm');
Route::post('dang-nhap-admin','Auth\AdminController@login')->name('admin.changelogin');
Route::get('dang-xuat-admin','Auth\AdminController@logout')->name('admin.logout');
Auth::routes();
// Quên mật khẩu Admin 
Route::get('/admin/quen-mat-khau','Auth\AdminController@ressetPasswordForm')->name('admin.reset-password-form');
Route::post('/admin/quen-mat-khau','Auth\AdminController@sendCodeResetPassword')->name('admin.sendCodeResetPassword');
Route::get('/admin/lay-lai-mat-khau','Auth\AdminController@ressetPassword')->name('admin.reset-password');
Route::post('/admin/lay-lai-mat-khau','Auth\AdminController@saveChangeResetPassword')->name('admin.saveChangePassword');
// Admin
Route::group(['prefix' => 'admin','middleware' => ['checkadmin','auth']],function() {
// Dashboad
Route::get('/dashboard', 'Admin\DashboardController@listmembernew' )->name('admin.home');
//Đổi mật khẩu
Route::get('/doi-mat-khau','Admin\LoginController@updatePassword')->name('login.password');
Route::post('/cap-nhat-mat-khau','Admin\LoginController@changePassword')->name('login.change');

//Loại gói tập
Route::get('/loai-goi-tap','Admin\TypePackageController@index')->name('typepackage.list');
Route::post('/them-loai-goi-tap','Admin\TypePackageController@addTypePackage')->name('typepackage.add');
Route::post('/xoa-loai-goi-tap','Admin\TypePackageController@deletestype')->name('typepackage.deletestype');
Route::get('/them-loai-goi-tap','Admin\TypePackageController@createTypePackage')->name('typepackage.create');
Route::get('/sua-loai-goi-tap/{id}/edit','Admin\TypePackageController@editTypePackage')->name('typepackage.edit');
Route::post('/cap-nhat-loai-goi-tap/{id}/cap-nhat','Admin\TypePackageController@updateTypePackage')->name('typepackage.update');
Route::get('/xoa-loai-goi-tap/{id}/xoa','Admin\TypePackageController@deleteTypePackage')->name('typepackage.remove');

//Bộ môn
Route::get('/bo-mon','Admin\SubjectController@index')->name('subject.list');
Route::get('/them-bo-mon','Admin\SubjectController@createSubject')->name('subject.create');
Route::post('/them-bo-mon','Admin\SubjectController@addSubject')->name('subject.add');
Route::get('/sua-bo-mon/{id}/sua','Admin\SubjectController@editSubject')->name('subject.edit');
Route::post('/cap-nhat-bo-mon/{id}/cap-nhat','Admin\SubjectController@updateSubject')->name('subject.update');
Route::get('/xoa-bo-mon/{id}/xoa','Admin\SubjectController@deleteSubject')->name('subject.remove');
Route::post('/xoa-bo-mon','Admin\SubjectController@deletesSubject')->name('subject.deletesSubject');

//Feedback
Route::get('/danh-sach-feedback','Admin\FeedbackController@index')->name('feedback.list');
Route::get('/them-feedback','Admin\FeedbackController@createFeedback')->name('feedback.create');
Route::post('/them-feedback','Admin\FeedbackController@storeFeedback')->name('feedback.store');
Route::get('/sua-feedback/{id}/sua','Admin\FeedbackController@editFeedback')->name('feedback.edit');
Route::post('/cap-nhat-feedback/{id}/cap-nhat','Admin\FeedbackController@updateFeedback')->name('feedback.update');
Route::get('/xoa-feedback/{id}/xoa','Admin\FeedbackController@deleteFeedback')->name('feedback.remove');
Route::post('/xoa-feedback','Admin\FeedbackController@deletesFeedback')->name('feedback.deletesFeedback');

//Lịch làm
Route::get('/lich-lam-viec','Admin\ScheduleController@index')->name('schedule.list');
Route::get('/them-lich-lam-viec', 'Admin\ScheduleController@createSchedule' )->name('schedule.create');
Route::post('/them-lich-lam-viec','Admin\ScheduleController@addSchedule')->name('schedule.add');
Route::get('/sua-lich-lam-viec/{id}/sua','Admin\ScheduleController@editSchedule')->name('schedule.edit');
Route::post('/cap-nhat-lich-lam-viec/{id}/edit','Admin\ScheduleController@updateSchedule')->name('schedule.update');
Route::get('/xoa-lich-lam-viec/{id}/xoa','Admin\ScheduleController@deleteSchedule')->name('schedule.remove');
Route::post('/xoa-lich-lam-viec','Admin\ScheduleController@deletesSchedele')->name('schedule.deletesSchedele');

//Member
Route::get('/danh-sach-hoi-vien', 'Admin\MemberController@listmember' )->name('member.list');
Route::post('/them-hoi-vien', 'Admin\MemberController@saveMember' )->name('member.saveadd');
Route::get('/sua-thong-tin-hoi-vien/{id}/sua', 'Admin\MemberController@editMember')->name('member.edit');
Route::post('/cap-nhat-thong-tin-hoi-vien/{id}/cap-nhat', 'Admin\MemberController@updateMember')->name('member.update');
Route::get('/them-hoi-vien', 'Admin\MemberController@addMember' )->name('member.add');
Route::get('/thong-tin-ca-nhan-hoi-vien/{id}', 'Admin\MemberController@profileMember' )->name('member.profile');
Route::get('/xoa-hoi-vien/{id}', 'Admin\MemberController@delete' )->name('member.delete');
Route::get('/doi-huan-luyen-vien/{id}', 'Admin\MemberController@changePt' )->name('member.changept');
Route::post('/doi-huan-luyen-vien/{id}', 'Admin\MemberController@saveChangePt')->name('member.savechangept');
Route::get('/block-hoi-vien/{id}', 'Admin\MemberController@changeStatus' )->name('member.changeStatus');
Route::post('/xoa-hoi-vien', 'Admin\MemberController@deleteMember')->name('member.deleteMember');

//Huấn luyện viên
Route::get('/danh-sach-huan-luyen-vien', 'Admin\PtController@listPt' )->name('pt.list');
Route::get('/them-huan-luyen-vien', 'Admin\PtController@addPt' )->name('pt.add');
Route::post('/them-huan-luyen-vien', 'Admin\PtController@savePt' )->name('pt.save');
Route::get('/thong-tin-ca-nhan-huan-luyen-vien/{id}', 'Admin\PtController@profilePt' )->name('pt.profile');
Route::get('/xoa-huan-luyen-vien/{id}', 'Admin\PtController@delete' )->name('pt.delete');
Route::get('/sua-thong-tin-huan-luyen-vien/{id}', 'Admin\PtController@editPt' )->name('pt.edit');
Route::get('/block-huan-luyen-vien/{id}', 'Admin\PtController@changeStatus' )->name('pt.changeStatus');
Route::post('/cap-nhat-thong-tin-huan-luyen-vien/{id}', 'Admin\PtController@saveEditPt' )->name('pt.saveedit');
Route::post('/xoa-huan-luyen-vien', 'Admin\PtController@deletePt' )->name('pt.deletePt');

//Admin
Route::get('/thong-tin-ca-nhan-quan-tri-vien/{id}', 'Admin\AdminController@editAdmin' )->name('admin.edit');
Route::post('/cap-nhat-thong-tin-quan-tri-vien/{id}', 'Admin\AdminController@saveEditAdmin' )->name('admin.saveedit');
Route::get('/thong-tin-ca-nhan','Admin\MemberController@profileAdmin')->name('member.profileadmin');

//Bài viết
Route::get('/danh-sach-bai-viet','Admin\PostController@index')->name('post.list');
Route::get('/them-bai-viet','Admin\PostController@createPost')->name('post.add');
Route::post('/them-bai-viet','Admin\PostController@storePost')->name('post.store');
Route::get('/sua-bai-viet/{id}','Admin\PostController@editPost')->name('post.edit');
Route::post('/cap-nhat-bai-viet/{id}','Admin\PostController@updatePost')->name('post.update');
Route::post('/xoa-bai-viet','Admin\PostController@deletePost')->name('post.deletePost');
Route::get('xoa-bai-viet/{post}','Admin\PostController@destroyPost')->name('post.remove');

//Ca làm
Route::get('/danh-sach-ca-lam', 'Admin\TimeController@index')->name('time.index');
Route::get('/them-ca-lam', 'Admin\TimeController@createTime')->name('admin.time.create');
Route::post('/them-ca-lam', 'Admin\TimeController@storeTime')->name('admin.time.store');
Route::get('/time-edit/{id}','Admin\TimeController@editTime')->name('admin.time.edit');
Route::post('/time-update/{id}', 'Admin\TimeController@updateTime')->name('admin.time.update');
Route::get('/time-destroy/{time}','Admin\TimeController@destroyTime')->name('admin.time.destroy');

//Lien-he 
Route::get('/danh-sach-lien-he', 'Admin\ContactController@index')->name('contact.index');
Route::get('/them-lien-he', 'Admin\ContactController@createContact')->name('contact.create');
Route::post('/them-lien-he','Admin\ContactController@storeContact')->name('contact.store');
Route::get('/xoa-lien-he/{id}/remove','Admin\ContactController@deleteContact')->name('contact.remove');
Route::get('/sua-lien-he/{id}/sua','Admin\ContactController@editContact')->name('contact.edit');
Route::post('/cap-nhat-lien-he/{id}/cap-nhat','Admin\ContactController@updateContact')->name('contact.update');
Route::post('/xoa-lien-he','Admin\ContactController@deletesContact')->name('contact.deletesContact');

//Mã giảm giá
Route::get('/danh-sach-ma-giam-gia','Admin\DiscountController@index')->name('discount.list');
Route::get('/them-ma-giam-gia','Admin\DiscountController@createDiscount')->name('discount.create');
Route::post('/them-ma-giam-gia','Admin\DiscountController@addDiscount')->name('discount.add');
Route::get('/sua-ma-giam-gia/{id}/sua','Admin\DiscountController@editDiscount')->name('discount.edit');
Route::post('/cap-nhat-ma-giam-gia/{id}/cap-nhat','Admin\DiscountController@updateDiscount')->name('discount.update');
Route::get('/xoa-ma-giam-gia/{id}/xoa','Admin\DiscountController@deleteDiscount')->name('discount.remove');
Route::post('/xoa-ma-giam-gia','Admin\DiscountController@deletesDiscount')->name('discount.deletesDiscount');

//Hóa đơn 
Route::get('/danh-sach-hoa-don','Admin\OrderController@listOrder')->name('order.listorder');
Route::get('/them-hoa-don-hoi-vien/{id}','Admin\OrderController@addMember')->name('order.addmember');
Route::get('/them-hoa-don-hoi-vien-moi/{id}','Admin\OrderController@addOrderRegister')->name('order.addregister');
Route::post('/them-hoa-don-hoi-vien-moi','Admin\OrderController@saveAddOrderRegister')->name('order.saveregister');
Route::post('/them-hoa-don-hoi-vien','Admin\OrderController@saveAddMember')->name('order.saveaddmembe');
Route::get('/gia-han-lai-hoa-don/{id}','Admin\OrderController@repeat')->name('order.repeat');
Route::post('/gia-han-lai-hoa-don','Admin\OrderController@saveRepeat')->name('order.saverepeat');
Route::get('/export-hoa-don/{id}','Admin\OrderController@export')->name('order.export');

//Hóa đơn bảo lưu
Route::get('/bao-luu-hoa-don/{id}','Admin\OrderController@reserve')->name('order.reserve');
Route::post('/bao-luu-hoa-don/{id}','Admin\OrderController@saveReserve')->name('order.savereserve');
Route::get('/danh-sach-hoa-don-bao-luu/','Admin\OrderController@listReserve')->name('order.listReserve');
Route::get('/chi-tiet-hoa-don-bao-luu/{id}','Admin\OrderController@detailReserve')->name('order.detailReserve');
Route::get('/chi-tiet-hoa-don/{id}','Admin\OrderController@detailMemberReserve')->name('order.detailMemberReserve');
Route::get('/change-status-reserve/{id}','Admin\OrderController@changeStatusReserve')->name('order.changeStatusReserve');

//Chuyển nhượng
Route::get('/chuyen-nhuong-hoi-vien-moi/{id}','Admin\OrderController@addNewMemberPass')->name('order.addNewMemberPass');
Route::post('/chuyen-nhuong-hoi-vien-moi/{id}','Admin\OrderController@saveNewMemberPass')->name('order.saveNewMemberPass');
Route::get('/chi-tiet-hoa-don-chuyen-nhuong/{id}','Admin\OrderController@listPassOrder')->name('order.listpass');
Route::get('/chuyen-nhuong-hoi-vien/{id}','Admin\OrderController@passOrder')->name('order.pass');
Route::post('/chuyen-nhuong-hoi-vien/{id}','Admin\OrderController@savePassOrder')->name('order.savePassOrder');

//Thay đổi ngày khi kết thúc bảo lưu
Route::get('/cap-nhat-ngay/{id}','Admin\OrderController@editOrder')->name('order.editOrder');
Route::post('/cap-nhat-ngay/{id}','Admin\OrderController@saveEditOrder')->name('order.saveEditOrder');
Route::get('/profileMemberPass/{id}','Admin\OrderController@profileMemberPass')->name('order.profileMemberPass');

//export
Route::get('export-subject', 'ExportController@export')->name('export-subject');
Route::get('export-time', 'Export\TimeController@export')->name('export-time');
Route::get('export-schedule', 'Export\ScheduleController@export')->name('export-schedule');
Route::get('export-order', 'Export\OrderController@export')->name('export-order');
Route::get('export-typepackage', 'Export\TypepackageController@export')->name('export-typepackage');
Route::get('export-pt', 'Export\PtController@export')->name('export-pt');
Route::get('export-member', 'Export\MemberController@export')->name('export-member');
Route::get('export-discount', 'Export\DiscountController@export')->name('export-discount');
Route::get('export-feedback', 'Export\FeedbackController@export')->name('export-feedback');
Route::get('export-contact', 'Export\ContactController@export')->name('export-contact');
Route::get('export-post', 'Export\PostController@export')->name('export-post');
Route::get('export-reserve', 'Export\ReserveController@export')->name('export-reserve');

//PDF
Route::get('/downloadPDF/{id}','Admin\OrderController@downloadPDF')->name('export-pdf');
Route::post('/deletes','Admin\OrderController@deletesOrder')->name('order.deletesOrder');
Route::post('/exportfile','Admin\OrderController@exportcheckbook')->name('order.exportcheckbook');

});

//coupon 
Route::post('/check_coupon','Admin\OrderController@checkCoupon');
Route::get('/unset-coupon','Admin\OrderController@unsetCoupon');
Route::get('/change-post', 'Admin\PostController@changeStatus');
Route::get('/change-discount', 'Admin\DiscountController@changeStatus');
Route::post('ckeditor/image_upload', 'Admin\CKEditorController@upload')->name('upload');

