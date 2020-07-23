<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categories;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $adminId=Auth::user()->id;
        $categories = Categories::where('admin_id',$adminId)->get();
        return view('categories', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $adminId=Auth::user()->id;
        $category = new Categories();
        $category->name = $request->name;
        $category->admin_id=$adminId;
        $category->save();

        return redirect()->back();
    }

    public function editCategory(Request $request){
        $category = Categories::findOrFail($request->categoryId);
        $category->name = $request->name;
        if ($category->save()){
            toastr()->success('Kategori başarıyla güncellendi!');
        }else{
            toastr()->error('Kategori güncellenirken bir hata meydana geldi!');
        }
        return redirect()->back();
    }

    public function deleteCategory(Request $request)
    {
        $category = Categories::findOrFail($request->_id);
        $users = Users::where('mail_table', $request->_id)->get();
        $count = $users->count();
        if ($count > 0) {
            foreach ($users as $user){
                if (!$user->delete()){
                    toastr()->error('Silme işlemi sırasında bir hata meydana geldi!');
                    return redirect()->back();
                }
            }
        }

        if ($category->delete()) {
            toastr()->success('Silme işlemi başarıyla eklendi!');
        } else {
            toastr()->error('Silme işlemi sırasında bir hata meydana geldi!');
        }
        return redirect()->back();
    }

    public function removeCategory(Request $request)
    {
        $category = Categories::findOrFail($request->id);
        $users = Users::where('mail_table', $request->id)->get();
        $count = $users->count();
        if ($count > 0) {
            foreach ($users as $user){
                $user->mail_table = 1;
                if (! $user->save()){
                    toastr()->error('Silme işlemi sırasında bir hata meydana geldi!');
                    return redirect()->back();
                }
            }
        }

        if ($category->delete()) {
            toastr()->success('Silme işlemi başarıyla eklendi!');
        } else {
            toastr()->error('Silme işlemi sırasında bir hata meydana geldi!');
        }
        return redirect()->back();
    }
}
