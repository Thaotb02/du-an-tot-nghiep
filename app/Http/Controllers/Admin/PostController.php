<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Subject;
use App\Model\Admin;
use App\Model\Infor;
use Auth;
use App\Imports\ExcelImport;
use App\Exports\ExcelExport;
use Maatwebsite\Excel\Excel;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Requests\Admin\updatePost;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index()
	{
		$posts=Post::get();
		return view('admin.posts.index',compact('posts'));
	}
	public function createPost(){
		$subjects = Subject::all();
		$author = Infor::where('role','=',3)->get();
		return view('admin.posts.create-post',compact('subjects','author'));
	}
	public function storePost(PostRequest $request){
		$data = new Post();
		$data->fill($request->all());
        if($request->hasFile('featured_image')){
            $extension = $request->featured_image->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->featured_image->storeAs(
              'post', $filename, 'public'
            );
            $data->featured_image = "storage/".$path;  
		   }
        $data->save();
		return redirect()->route('post.list')->with('success','Bạn đã thêm bài viết thành công!');
	}
	public function editPost($id){ 
		$post=Post::find($id);
		$subjects = Subject::all();
		$author = Infor::where('role','=',3)->get();
		return view('admin.posts.edit-post',compact('post','subjects','author'));
	}
	public function updatePost(updatePost $request,$id){
		$post=Post::find($id);
		$post->title = $request->title;
		$post->content = $request->content;
		$post->subject_id = $request->subject_id;
		$post->status = $request->status;
		if($request->hasFile('featured_image')){
				if ($post->featured_image != null) {
					if (file_exists($post->featured_image)) {
						unlink($post->featured_image);
					}
				}
            $extension = $request->featured_image->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->featured_image->storeAs(
              'post', $filename, 'public'
            );
            $post->featured_image = "storage/".$path;  
		   } 
		$post->save();
		return redirect()->route('post.list')->with('success','Bạn đã sửa thành công!');
	}

	public function destroyPost(Post $post){
		$post ->delete();
		return redirect()->route('post.list')->with('success','Bạn đã xóa thành công!');
	}
	public function onPost($id){
		Post::where('id',$id)->update(['status'=> 2]);
		return redirect()->route('post.list');
	}
	public function offPost($id){
		Post::where('id',$id)->update(['status'=> 1]);
		return redirect()->route('post.list');
	}
	public function exportPost(){
		return Excel::download(new ExcelExport , 'post.xlsx');
	}
	public function importPost(Request $request){
		$path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();
	}
    public function changeStatus(Request $request)
    {
		$post = Post::find($request->post_id);
        $post->status = $request->status;
        $post->save();
        return response()->json(['success'=>'Status change successfully.']);
	}
	public function deletePost(Request $request)
        {
            $request = $request->all();
            $arr = $request['arr'];
            foreach($arr as $item){
                $data = Post::find($item);
              
                $data->delete();
             
            }
        }
	
}