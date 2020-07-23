<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Users;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $adminId = Auth::user()->id;
        $categories = Categories::where('admin_id', $adminId)->get();
        return view('user_methods', compact('categories'));
    }

    public function addTxtFile(Request $request)
    {
        if ($request->txtFile->getClientOriginalExtension() != 'txt') {
            return redirect()->back()->withErrors('Yüklemeye çalıştığınız format bu alanda desteklenmemektedir.
Lütfen belirtilen bir formatta dosya yüklemeyi deneyiniz!');
        }
        $adminId = Auth::user()->id;
        $allUsers = Users::where('admin_id', $adminId)->where('mail_table', $request->category_id)->get();
        $random = rand(1000, 999999999);
        $content = Str::slug($request->txtFile) . '-txt-file' . $random . '.' . $request->txtFile->getClientOriginalExtension();
        $request->txtFile->move(public_path('uploads'), $content);
        $uploadedFile = 'uploads/' . $content;
        $addedMailCount = 0;
        $mailList = array();
        foreach ($allUsers as $userMails) {
            array_push($mailList, trim($userMails->email));
        }
        try {
            foreach (file($uploadedFile) as $text) {
                $expText = explode(" ", $text);
                if (strpos(trim($expText[0]), '@')) {
                    if (!in_array(trim($expText[0]), $mailList)) {
                        $user = new Users();
                        $addedMailCount++;
                        $user->email = trim($expText[0]);
                        $userName = explode('@', $expText[0]);
                        $user->name = $userName[0];
                        $user->mail_table = $request->category_id;
                        $user->admin_id = $adminId;
                        $user->save();
                    }
                }
            }
            if ($addedMailCount > 0) {
                toastr()->success($addedMailCount . ' adet kullanıcı başarıyla kaydedildi!');
            } else {
                toastr()->info('Listedeki kullanıcılar zaten kayıtlı!');
            }


        } catch (FileNotFoundException $exception) {
            die("The file doesn't exist");
        }
        File::delete($uploadedFile);
        return redirect()->back();
    }

    public function addCSVFile(Request $request)
    {
        if ($request->csvFile->getClientOriginalExtension() != 'csv') {
            return redirect()->back()->withErrors('Yüklemeye çalıştığınız format bu alanda desteklenmemektedir.
                Lütfen belirtilen bir formatta dosya yüklemeyi deneyiniz!');
        }
        $adminId = Auth::user()->id;
        $allUsers = Users::where('admin_id', $adminId)->where('mail_table', $request->categoryId)->get();
        $random = rand(1000, 999999999);
        $content = Str::slug($request->csvFile) . '-csv-file' . $random . '.' . $request->csvFile->getClientOriginalExtension();
        $request->csvFile->move(public_path('uploads'), $content);
        $uploadedFile = 'uploads/' . $content;
        $addedMailCount = 0;
        $mailList = array();
        foreach ($allUsers as $userMails) {
            array_push($mailList, trim($userMails->email));
        }
        try {
            foreach (file($uploadedFile) as $text) {
                $expText = explode(";", $text);
                if (strpos(trim($expText[0]), '@')) {
                    if (!in_array(trim($expText[0]), $mailList)) {
                        $user = new Users();
                        $addedMailCount++;
                        $user->email = trim($expText[0]);
                        $userName = explode('@', $expText[0]);
                        $user->name = $userName[0];
                        $user->mail_table = $request->categoryId;
                        $user->admin_id = $adminId;
                        $user->save();
                    }
                }
            }
            if ($addedMailCount > 0) {
                toastr()->success($addedMailCount . ' adet kullanıcı başarıyla kaydedildi!');
            } else {
                toastr()->info('Listedeki kullanıcılar zaten kayıtlı!');
            }


        } catch (FileNotFoundException $exception) {
            die("The file doesn't exist");
        }
        File::delete($uploadedFile);
        return redirect()->back();
    }
}
