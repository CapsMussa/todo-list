@extends('main.main')

@section('content')


<div class="album py-5 bg-body-tertiary">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($tasks as $task)
            <div class="col">
                @if($task->isCompleted())
                    <form action="{{ route('tasks.delete', $task) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-close" style="float: right" aria-label="Закрыть"></button>
                    </form>
                    @endif
                <div class="card shadow-sm">
                    <div class="p-3" style="text-align: center;">
                        <img src="{{url('storage/pre_'.$task->url)}}" style="border-radius: 90px;">
                        <h3 class="fw-light"> {{ $task->name }}</h3>
                    </div>

                    <div class="card-body">
                        <p class="card-text">{{ $task->desc }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action="{{ route('tasks.update', $task->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    @if($task->isCompleted() == null)
                                        <input type="submit" class="btn btn-sm btn-outline-secondary" value="Готово">
                                    @endif
                                </form>
                            </div>
                            @if($task->isCompleted())
                                <span class="badge bg-success"> Выполнено: {{ $task->completed_at }}</span>
                                @endif
                            <small class="text-body-secondary">{{ $task->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
