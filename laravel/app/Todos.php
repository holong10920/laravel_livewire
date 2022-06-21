<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Todos extends Model
{
    use SoftDeletes;
    protected $fillable = ['todo_info', 'todo_complete'];
    protected $primaryKey = 'id';
    protected $table = 'tbl_todos';

    public function addTodo($todo_info){
        $todo = new Todos;
        $todo->todo_info = $todo_info;
        $todo->todo_complete = 0;
        $todo->save();
    }

    public function newTodo(){
        return Todos::orderBy('id', 'DESC')->first();
    }

    public function allTodo(){
        return Todos::orderBy('id', 'DESC')->paginate(5);
    }

    public function removeTodo($id){
        return Todos::where('id', $id)->delete();
    }

    public function completeTodo($id){
        return Todos::where('id', $id)->update(['todo_complete' => 1]);
    }

    public function canceledTodo($id){
        return Todos::where('id', $id)->update(['todo_complete' => 0]);
    }

    public function getTodoById($id){
        return Todos::where('id', $id)->first();
    } 

    public function editTodo($todo_info, $id){
        return Todos::where('id', $id)->update(['todo_info' => $todo_info]);
    } 
}
