<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('completed_at')
            ->orderBy('id', 'desc')
            ->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create(){
        return view('tasks.create');
    }


    public function store(StoreRequest $request){
        $data = $request->validated();
        $data['url'] = Storage::disk('public')->put('', $data['url']);
        Task::create($data);
        $reviewPath = Image::make('storage/' . $data['url'])->fit(150, 150);
        $data['url'] = $reviewPath->save('storage/pre_' . $data['url']);


        return redirect()->route('tasks.index');
    }

    public function update(UpdateRequest $request, Task $task){
        $data = $request->validated();

      $data['completed_at'] = '123';
      $task->update($data);
        return redirect()->route('tasks.index');
        }

        public function delete($id){
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index');
        }

    }
