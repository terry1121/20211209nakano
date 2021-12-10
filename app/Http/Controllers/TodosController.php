<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    //追加

  public function index(Request $request) {
      $todos = Todo::all();
      return view('index',["todos"=>$todos]);
    }

    public function create(Request $request) {
      $todo = new Todo();
      $todo->body = $request->body;
      $todo->save();
      return redirect('/');
    }

    public function update(Request $request) {
      $todo = Todo::find($request->id);
      $todo->body = $request->body;
      $todo->save();
      return redirect('/');
    }

     public function delete(Request $request) {
      $todo = Todo::find($request->id);
      $todo->body = $request->body;
      $todo->delete();
      return redirect('/');
    }
    

}
