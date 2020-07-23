@extends('layouts.master')
@section('title','Auto Mailer | Kullanıcılar')
@section('topbar','Tüm Kullanıcılar')
@section('content')

    <div class="card-body">
        <div class="form-group" style="float: right">
            <a href="#addUserPopup" class="btn btn-primary">Yeni Kullanıcı Ekle</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th>Adı</th>
                    <th>Email Adresi</th>
                    <th>Email Kategorisi</th>
                    <th>Güncellenme Tarihi</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->getCategoryName[0]->name}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <a href="{{route('admin.editUser',$user->id)}}" title="Düzenle"
                               class="btn btn-sm btn-primary"> <i
                                    class="fa fa-pen edit-click"></i></a>
                            <a href="#deleteUserPopup" data-id="{{$user->id}}" title="Sil"
                               class="btn btn-sm btn-danger delete-click"> <i class="fa fa-times text-white"></i></a>
                            <a href="{{route('admin.sendCustomEmail',$user->id)}}" title="Mail Gönder"
                               class="btn btn-sm btn-primary"> <i
                                    class="fa fa-share"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <div id="addUserPopup" class="editOverlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form method="POST" action="{{route('admin.addUser')}}">
                    @csrf
                    <div class="form-group">
                        <h4>Kullanıcı Adı</h4>
                        <input id="userName" type="text" name="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <h4>Kullanıcı Mail Adresi</h4>
                        <input id="userMail" type="email" name="mail" required class="form-control">
                    </div>
                    <div class="form-group">
                        <h4>Kullanıcı Kategorisi</h4>
                        <select class="form-control" name="categoryName" >
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="float: right">
                        <button class="btn btn-primary" type="submit">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="deleteUserPopup" class="editOverlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <h3 id="message">Kullanıcıyı silmek <br> istediğinize emin misiniz?</h3>
                <form method="POST" action="{{route('admin.deleteUser')}}">
                    @csrf
                    <input type="hidden" name="id" id="deleteCategoryId">

                    <div class="form-group" style="float: right">
                        <button class="btn btn-danger" type="submit">Sil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(function () {
            $('.delete-click').click(function () {
                id = $(this)[0].getAttribute('data-id');
                $('#deleteCategoryId').val(id);
            });

        });
    </script>
@endsection

@section('css')
    <link href="{{asset('css')}}/custom.css" rel="stylesheet" type="text/css">
@endsection
