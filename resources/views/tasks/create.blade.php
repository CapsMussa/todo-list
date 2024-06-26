@extends('main.main')

@section('content')
    <h1>create page</h1>
    <div class="w-25">
        <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input class="form-control" type="text" name="name" placeholder="Название"><br><br>
            <textarea name="desc" class="form-control" placeholder="Описание задачи"></textarea><br>
            <input style="margin-top: 5px;" type="file" name="url" class="upload form-control" id="photo-upload"/><br>
            <input class="btn btn-primary d-grid " type="submit" value="Создать">
        </form>
    </div>
@endsection
