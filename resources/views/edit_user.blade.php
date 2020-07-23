@extends('layouts.master')
@section('title','Yönetim Paneli | '.$user->name.' Güncelle' )
@section('topbar','Kullanıcı Güncelleme')
@section('content')

    <div class="content">
        <form method="POST" action="{{route('admin.editSelectedUser')}}">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
                <h4>Kullanıcı Adı</h4>
                <input id="userName" value="{{$user->name}}" type="text" name="name" required class="form-control">
            </div>
            <div class="form-group">
                <h4>Kullanıcı Mail Adresi</h4>
                <input id="userMail" value="{{$user->email}}" type="email" name="mail" required class="form-control">
            </div>
            <div class="form-group">
                <h4>Kullanıcı Kategorisi</h4>
                <select class="form-control" name="categoryName">
                    @foreach($categories as $category)
                        @if($category->id == $user->getCategoryName[0]->id)
                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="float: right">
                <button class="btn btn-primary" type="submit">Kaydet</button>
            </div>
        </form>
    </div>

@endsection
