<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;       //Todoモデルを呼び出す（モデルを継承したファイル？）
use Auth;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $instanceClass)    //Todoクラスのインスタンスを引数で受け取る
    {
        $this->middleware('auth');
        $this->todo = $instanceClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return "Hello world!!";
        // return view('layouts.app'); //layoutsディレクトリのapp.blade.phpを返す
        // dd($this->todo->all());
        $todos = $this->todo->getByUserId(Auth::id());    //SELECT * FROM todos;
        // dd(compact('todos'));
        return view('todo.index', compact('todos'));//['todos' => $todos]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(view('todo.create'));
        return view('todo.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        // dd($this->todo->fill($input));
        $this->todo->fill($input)->save();
        // dd(redirect());
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)       //URL のパラメータの取得
    {
        // dd($this->todo->find($id));
        $todo = $this->todo->find($id);
        // dd(compact('todo'));
        return view('todo.edit', compact('todo'));  //['todo' => $todo]
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  
    {
        $input = $request->all();//
        // dd($this->todo->find($id));
        $this->todo->find($id)->fill($input)->save(); //fill:設定の検証
        // dd(redirect()->to('todo'));
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->find($id)->delete();//
        return redirect()->route('todo.index');
    }
}
