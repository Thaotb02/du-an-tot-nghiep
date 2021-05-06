<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pt;
use App\Model\Subject;
use App\Model\Post;
use App\Model\TypePackage;
class HomepageController extends Controller
{
    public function homepage()
	{
		$subjects =Subject::all();
		$bloghome =Post::orderBy('created_at' ,'DESC')->paginate(6);
		return view('client.layout.index',compact('subjects' ,'bloghome'));
	}
	public function listPt()
	{   
		$query_strings = request()->query();
		$pts =Pt::query();
		$subject = Subject::all();
		if (isset($query_strings['s'])) {
			$pts = $pts->where('pts.subject_id',$query_strings['s']);
		}
		 $pts = $pts->paginate(15);
		return view('client.subpage.listPt',compact('pts','subject'));
	}
	public function detailPt($id)
	{	
		$detailpt = Pt::find($id);
		return view('client.subpage.detail-pt',compact('detailpt'));
	}
	public function listSubject()
	{
		$subs =Subject::all();
		return view('client.subpage.subject',compact('subs'));
	}
	public function detailSubject($id)
	{	$detailSubject = Subject::find($id);
	
		$blogConnection = Post::where('subject_id',$detailSubject->id)->get();
		return view('client.subpage.detailSubject',compact('detailSubject','blogConnection'));
	}
	public function listBlog(Request $request)
	{   
		$query_strings = request()->query();
		$subject = Subject::all();
		$blog =Post::where('status', '=', 1);
		if (isset($query_strings['s'])) {
			$blog = $blog->where('posts.subject_id',$query_strings['s']);
		 }
		$blog = $blog->paginate(25);
		return view('client.subpage.blog',compact('blog','subject'));
	}
	public function detailBlog($id)
	{	$detailBlog = Post::find($id);
		$blog =Post::all();
		$bloghome =Post::orderBy('created_at' ,'DESC')->paginate(6);
		return view('client.subpage.detail-blog',compact('detailBlog','blog','bloghome'));
	}

	public function listPackage(Request $request)
	{
		
		$query_strings = request()->query();
		$typepackages = TypePackage::query();
		if (isset($query_strings['s'])) {
			$typepackages = $typepackages->where('typepackages.subject_id',$query_strings['s']);
		 }
		$subject = Subject::all();
		$typepackages = $typepackages->paginate(25);
		return view('client.subpage.package',compact('subject','typepackages'));
	}
}