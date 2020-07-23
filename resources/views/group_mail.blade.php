@extends('layouts.master')
@section('title','Yönetim Paneli | Toplu Mail Gönderimi')
@section('topbar','Toplu Mail Gönderimi')
@section('content')


    <div class="content">
        <div class="alert-danger">
            @if($errors->any())<br>
            <div class="uk-text-contrast">
                {!!'&nbsp &nbsp'.$errors->first()!!}
            </div><br>
            @endif
        </div>
        <div class="col-md-10 form-group">
            <form method="POST" action="{{route('admin.sendGroupMail')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><br>
                    <label title="E-mail öndermek istediğiniz grup*">Kullanıcı Kategorisi</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Gönderen Başlığı</label>
                    <input type="text" name="sender_title" class="form-control" required> </input>
                </div>
                <div class="form-group">
                    <label>Gönderen E-mail Adresi</label>
                    <input type="email" name="sender_mail" class="form-control" required> </input>
                </div>
                <div class="form-group">
                    <label>Konu Başlığı</label>
                    <input type="text" name="title" class="form-control" required> </input>
                </div>
                <div class="form-group">
                    <textarea id="summernote" name="data"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Gönder</button>
                </div>

            </form>
        </div>

    </div>

@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: 'Mesaj İçeriği',
                height: 200
            });
        });
    </script>
@endsection
