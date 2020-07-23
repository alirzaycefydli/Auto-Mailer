@extends('layouts.master')
@section('title','Auto Mailer | '.$user->name.' Mail Gönder')
@section('topbar','Mail Gönder')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('admin.sendCustomEmailPost')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
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
                <div  class="form-group">
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
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Mesaj İçeriği',
                height: 200
            });
        });
    </script>
@endsection
