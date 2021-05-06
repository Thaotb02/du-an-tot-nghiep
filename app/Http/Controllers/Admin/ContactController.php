<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;
use App\Http\Requests\Admin\ContactRequest;



class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index', compact('contact'));
    }
     
    public function createContact() 
    {
        $contact = Contact::all();
        return view('admin.contact.create-contact', compact('contact'));
    }

    public function storeContact(ContactRequest $request) 
    {
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->save();
        return redirect()->route('contact.index')->with('success', 'Thêm liên hệ  thành công');
    }

    public function deleteContact($id) 
    {
        $contact = Contact::destroy($id);
        return  redirect()->back();   
    }
    
    public function editContact($id) 
    {
      $contact = Contact::find($id);
      return view('admin.contact.edit-contact' , compact('contact'));
    }
    
    public function updateContact($id,ContactRequest $request) 
    {
      $contact = Contact::find($id);
      $contact->fill($request->all());
      $contact->save();
       return redirect()->route('contact.index');
    }
    public function deletesContact(Request $request)
    {
        $request = $request->all();
        $arr = $request['arr'];
        foreach($arr as $item){
           
            Contact::find($item)->delete();
       
         
        }
    }
   
}