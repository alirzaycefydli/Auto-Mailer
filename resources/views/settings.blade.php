@extends('layouts.master')
@section('title','Yönetim Paneli | Ayarlar')
@section('topbar','Ayarlar')
@section('content')
    <div class="col-md-8">
        <form method="POST" action="{{route('admin.resetPass')}}">
          @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">*Yeni Şifre</label>
                <input type="password" class="form-control" name="newPassword" id="exampleInputPassword1" required placeholder="Şifreniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">*Şifre Onayı</label>
                <input type="password" class="form-control" name="confirmPassword" id="exampleInputPassword2" required placeholder="Yeni Şifre">
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
@endsection
