@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новая статья</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Новая статья</h3>
                        </div>
                        <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название">
                                </div>
                                <div class="form-group">
                                    <label for="description">Цитата</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Цитата"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Контент"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option>Выберите категорию</option>
                                        @foreach($categories as $id=>$title)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Теги</label>
                                    <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Выберите теги"
                                            style="width: 100%;">
                                        @foreach($tags as $id=>$title)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                        <!-- /.content -->
                    </div>
                    </div>
                </div>
            </div>
    </section>

@endsection

