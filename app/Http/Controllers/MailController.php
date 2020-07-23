<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Jobs\SendGroupMailJob;
use App\Models\Categories;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendCustomEmail($id){
        $user = Users::find($id);
        return view('mail',compact('user'));
    }

    public function sendCustomEmailPost(Request $request){
        $user = Users::find($request->user_id);

        $senderMail=$request->sender_mail;
        $senderTitle=$request->sender_title;
        $userMail=$user->email;
        $title=$request->title;
        $data=$request->data;

        $job= (new SendEmailJob($senderMail,$senderTitle,$userMail,$title,$data))->delay(Carbon::now()->addSeconds(5));
        dispatch($job);

        toastr()->success($userMail.' kişisine e-mail başarıyla gönderildi. Bu işlem birkaç saniye alabilir!');
        return redirect()->route('admin.allUsers');
    }

    public function mailGroup(){
        $adminId = Auth::user()->id;
        $categories = Categories::where('admin_id',$adminId)->get();
        return view('group_mail',compact('categories'));
    }

    public function sendGroupMail(Request $request){
        $categoryId=$request->category_id;
        $users=Users::where('mail_table',$categoryId)->get();
        $senderMail=$request->sender_mail;
        $senderTitle=$request->sender_title;
        //$userMail=$user->email;
        $title=$request->title;
        $data=$request->data;
        foreach ($users as $user){
            $job= (new SendGroupMailJob($senderMail,$senderTitle,$user->email,$title,$data))->delay(Carbon::now()->addSeconds(5));
            dispatch($job);
        }

        toastr()->success('E-mail başarıyla gönderildi. Bu işlemin tamamlanması biraz zaman alabilir!');
        return redirect()->route('admin.mailGroup');
    }

    public function timedMail(){
        return view('timed_mail');
    }
}
