<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // contact form
    public function form(){
        return view("user.contact.contactForm");
    }
    // user send message to admin
    public function sendMessage(Request $request){
        $data = $this->requetsSendMessage($request);
        Contact::create($data);
        return redirect()->route("user#homePage")->with(['success' => 'Send Message Successful.....']);
    }
    //admin read user message page
    public function getReview(){
        $userMessage = Contact::select('contacts.*','users.name as account_name')
            ->leftJoin('users', 'users.id', 'contacts.user_id')
            ->orderBy('created_at', 'desc')
            ->get();


        return view('admin.user.contact',compact('userMessage'));
    }
    // contact details
    public function contactDetails(Request $request, $id){
        $contactDetails = Contact::select('contacts.*','users.name as account_name', 'users.address as account_address')
        ->leftJoin('users', 'users.id', 'contacts.user_id')
        ->where('contacts.id',$id)->first();
        // dd($contactDetails->toArray());
        return view('admin.user.contactDetails',compact('contactDetails'));
    }

    // reply admin to customer
    public function replyPage(Request $request, $id){
        $replyMessage = Contact::where('id', $id)->first();
        return view('admin.user.replyPage',compact('replyMessage'));
    }
    public function delete($id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->route('customer#getReview')->with(['deleteSuccess' => 'Delete Successful....']);
    }
    private function requetsSendMessage(Request $request){
        return[
            'user_id' => $request->userId,
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'message'=> $request->message
        ];
    }
}
