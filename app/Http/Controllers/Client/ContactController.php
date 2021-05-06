<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ContactRequest;
use App\Model\Contact;
class ContactController extends Controller
{
    public function index()
	{
		return view('client.subpage.contact');
    }
    public function createContact(ContactRequest $request)
	{
        $data =request()->all();
        Contact::create($data);
        // return view('client.subpage.contact');
        return redirect()->route('client.contact')->with('success', 'Đăng kí thành công');
    }
    public function Contact(ContactRequest $request)
	{
        $data =request()->all();
       Contact::create($data);
       return redirect()->route('client.contact')->with('success', 'Đăng kí thành công');
    }
}
