@extends('main.main')
@section('content')

    <h2 class="p-5 border-bottom">Task list</h2>
    <div class="row p-5 g-4 py-5 row-cols-1 row-cols-lg-2">
        @foreach($tasks as $task)
            <div  class="card col" style="margin-bottom: 10px; margin-left: 10px;">
                <div class="card-body">
                    @if($task->isCompleted())
                        <form action="{{ route('tasks.delete', $task) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-close" style="float: right" aria-label="Закрыть"></button>
                        </form>
                        <span class="badge bg-success" style="float: right;">выполнено</span>
                    @endif
                    <div><img src="{{url('storage/pre_'.$task->url)}}"></div>
                    <h5 class="card-title">{{$task->name}}</h5>
                    <p class="card-text">{{ $task->desc }}</p>

                    <form action="{{ route('tasks.update', $task->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        @if($task->isCompleted() == null)
                            <input type="submit" class="btn btn-primary" value="выполнил">
                        @endif
                    </form>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
