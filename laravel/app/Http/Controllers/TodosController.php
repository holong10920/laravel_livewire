<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos;
use App\Http\Requests\TodoRequest;

class TodosController extends Controller
{
    public $todo;

    public function __construct(){
        $this->todo = new Todos;
    }

    public function home(){
        $allTodos = $this->todo->allTodo();

        return view('layouts')->with('todos', $allTodos);
    }

    public function add_todo(TodoRequest $request){
        $this->todo->addTodo($request->info_todo);
        $new_todo = $this->todo->newTodo();

        return response()->json(['info_todo' => $new_todo]);
    }

    public function remove_todo(Request $request){
        $this->todo->removeTodo($request->id);
    }

    public function complete_todo(Request $request){
        $this->todo->completeTodo($request->id);
    }

    public function canceled_todo(Request $request){
        $this->todo->canceledTodo($request->id);
    }

    public function edit_todo(TodoRequest $request){
        $this->todo->editTodo($request->info_todo, $request->id);
        $todoEdited = $this->todo->getTodoById($request->id);

        return response()->json(['todo' => $todoEdited]);
    }

    public function index_todos() {
        $post = '123';
        return view('contacts')->with('post', $post);
    }
}
