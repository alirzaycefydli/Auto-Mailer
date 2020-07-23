<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function allUsers()
    {
        $adminId = Auth::user()->id;
        $categories = Categories::where('admin_id', $adminId)->get();
        $users = Users::where('admin_id', $adminId)->get();
        return view('users', compact('users', 'categories'));
    }

    public function addUser(Request $request)
    {
        $adminId = Auth::user()->id;
        $user = new Users();
        $user->admin_id = $adminId;
        $user->name = $request->name;
        $user->email = $request->mail;
        $user->mail_table = $request->categoryName;

        if ($user->save()) {
            toastr()->success($request->name . ' adlı kullanıcı başarıyla eklendi!');
        }

        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        $user = Users::find($request->id);
        if ($user->delete()) {
            toastr()->success($user->name . ' adlı kullanıcı başarıyla silindi!');
        } else {
            toastr()->error('Silme işlemi sırasında bir hata meydana geldi!');
        }
        return redirect()->back();
    }

    public function editUser($id)
    {
        $adminId = Auth::user()->id;
        $categories = Categories::where('admin_id', $adminId)->get();
        $user = Users::findOrFail($id);
        return view('edit_user', compact('user', 'categories'));
    }

    public function editSelectedUser(Request $request)
    {
        $user = Users::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->mail;
        $user->mail_table = $request->categoryName;
        if ($user->save()) {
            toastr()->success($request->name . ' adlı kullanıcı başarıyla güncellendi!');
        } else {
            toastr()->error('Silme işlemi sırasında bir hata meydana geldi!');
        }
        return redirect()->route('admin.allUsers');
    }
}
