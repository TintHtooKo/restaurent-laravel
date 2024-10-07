<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function contact(Request $request){
        $this->contactValidate($request);
        $data = $this->contactData($request);
        Contact::create($data);
        Alert::success('Success', 'Message sent successfully');
        return back();
    }

    public function contactDelete($id){
        Contact::find($id)->delete();
        Alert::success('Success', 'Message deleted successfully');
        return back();
    }

    public function contactDetail($id){
        $contact = Contact::find($id);
        return view('admin.dashboard.contactDetail',compact('contact'));
    }

    private function contactValidate($request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
    }

    private function contactData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];
    }
}
