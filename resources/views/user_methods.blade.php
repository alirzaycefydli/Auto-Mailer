@extends('layouts.master')
@section('title','Yönetim Paneli | Kullanıcı Ekleme Yöntemleri')
@section('topbar','Kullanıcı Ekleme Yöntemleri')
@section('content')


    <div class="content">
        <div class="alert-danger">
            @if($errors->any())<br>
            <div class="uk-text-contrast">
                {!!'&nbsp &nbsp'.$errors->first()!!}
            </div><br>
            @endif
        </div>
        <div class="col-md-6 form-group">
            <div>
                <h3 class="text-dark">Text Dosyası Yükleme Alanı</h3>
                <h6>* Her satırda 1 adet kullanıcı bilgisi bulunmalıdır.</h6>
                <h6>* Sadece text dosyası (.txt) formatı kabul edilmektedir.</h6>
            </div>

            <form method="POST" action="{{route('admin.addTxtFile')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><br>
                    <label>Kullanıcı Kategorisi</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input required type="file" accept=".txt" name="txtFile"/>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Kaydet</button>
                </div>

            </form>
        </div>


        <div class="col-md-6 form-group"><br><br>
            <hr>
            <div>
                <h3 class="text-dark">CSV Dosyası Yükleme Alanı</h3>
                <h6>* Her satırda 1 adet kullanıcı bilgisi bulunmalıdır.</h6>
                <h6>* Sadece CSV dosyası (.csv) formatı kabul edilmektedir.</h6>
            </div>

            <form method="POST" action="{{route('admin.addCSVFile')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><br>
                    <label>Kullanıcı Kategorisi</label>
                    <select class="form-control" name="categoryId">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <input class="" required type="file" accept=".csv" name="csvFile"/>
                </div>

                <div class="form-group" style="float: right">
                    <button class="btn btn-primary" type="submit">Kaydet</button>
                </div>
            </form>
        </div>
    </div>


@endsection
