@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование статьи</h1>
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
                            <h3 class="card-title">Статья №{{ $post->title }}</h3>
                        </div>
                        <form role="form" method="post" action="{{ route('posts.update', ['post'=>$post->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Цитата</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="5">{{ $post->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option>Выберите категорию</option>
                                        @foreach($categories as $id=>$title)
                                            <option value="{{ $id }}" @if($id == $post->category_id) selected @endif>{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Теги</label>
                                    <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Выберите теги"
                                            style="width: 100%;">
                                        @foreach($tags as $id=>$title)
                                            <option value="{{ $id }}" @if(in_array($id, $post->tags->pluck('id')->all())) selected @endif>{{ $title }}</option>
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
                                    <div class="img-thumbnail mt-2"><img src="{{ $post->getImage() }}" style="width: 200px;" alt=""></div>
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

