@extends('layouts.master')
@section('title','Auto Mailer | Kategoriler')
@section('topbar','Kategoriler')
@section('css')
    <link href="{{asset('css')}}/custom.css" rel="stylesheet" type="text/css">
@endsection
@section('content')

    <div class="card-body">
        <div class="form-group" style="float: right">
            <a href="#addpopup" class="btn btn-primary text-white">Yeni Kategori Ekle</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th>Kategori Adı</th>
                    <th>Güncellenme Tarihi</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>
                            <a href="#editpopup" data-text="{{$category->name}}" data-id="{{$category->id}}" title="Düzenle"
                               class="btn btn-primary edit-click"> <i
                                    class="fa fa-pen"></i></a>
                            <a id="deleteCategory" data-id="{{$category->id}}" class="btn btn-danger delete-click"
                               href="" data-toggle="modal" data-target="#deleteModal">
                                <i class="fa fa-times text-white"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!-- Delete Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Kategoriyi Sil</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div id="message" class="alert-danger">Bu kategoriyi silmek istediğinize emin misiniz?</div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>
                    <form method="post" action="{{route('admin.removeCategory')}}">
                        @csrf
                        <input type="hidden" name="id" id="removeCategoryId">
                        <button id="removeButton" title="Bu kategoriyi siler ve kategoriye ait kullanıcıları genel kategoriye ekler!"
                                type="submit" class="btn btn-danger">Kategoriyi Sil</button>
                    </form>
                    <form method="post" action="{{route('admin.deleteCategory')}}">
                        @csrf
                        <input type="hidden" name="_id" id="deleteCategoryId">
                        <button id="deleteButton" title="Bu kategoriye ait kullanıcıları ve kategoriyi tamamen siler!"
                                type="submit" class="btn btn-danger">Tamamen Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal End -->
    <div id="addpopup" class="editOverlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form method="POST" action="{{route('admin.addCategory')}}">
                    @csrf
                    <input type="hidden" name="dataid">
                    <div class="form-group">
                        <h2>Kategori Başlığı</h2>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="form-group" style="float: right">
                        <button class="btn btn-primary" type="submit">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editpopup" class="editOverlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form method="POST" action="{{route('admin.editCategory')}}">
                    @csrf
                    <input type="hidden" id="categoryId" name="categoryId">
                    <div class="form-group">
                        <h2>Kategori Başlığı</h2>
                        <input id="editText" type="text" name="name" required class="form-control">
                    </div>
                    <div class="form-group" style="float: right">
                        <button class="btn btn-primary" type="submit">Kaydet</button>
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
                $('#removeCategoryId').val(id);
                $('#message').html('Bu kategoriyi silmek istediğinize emin misiniz? Sildiğinizde bu kategoriye ' +
                    'ait tüm e-mail kayıtları da silinecektir!');
                if(id==1){
                    $('#deleteButton').hide();
                    $('#removeButton').hide();
                    $('#message').html('Bu kategori silinemez!');
                }
            });
            $('.edit-click').click(function () {
                id = $(this)[0].getAttribute('data-id');
                text = $(this)[0].getAttribute('data-text');
                $('#categoryId').val(id);
                $('#editText').val(text);
            });
        });



      /*  $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            //id = button.data('id') // Extract info from data-* attributes
        });

        $('#deleteAll').click(function () {
            id = $(this)[0].getAttribute('data-id');
            alert(id);
        });
        $('#removeAll').click(function () {

        }); */

    </script>
@endsection
