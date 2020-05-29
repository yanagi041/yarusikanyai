<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function new()
    {
        return view('tasks.new');
    }

    public function history()
    {
        return view('tasks.history');
    }

    //あとで確認
    public function create(CreateTasksRequest $request)
    {
        //バリデーションはフォームリクエスト側で行う
        Log::debug('バリデーションOK');
        //モデルのインスタンス作成
        $tasks = new App\Tasks;

        //登録
        //user_idはusersテーブルから取得
        Auth::user()->tasks()->save($tasks->fill($tasks->all()));
        Log::debug('登録成功');

        //マイページへ遷移＋メッセージ
        return redirect('/mypage')->with('scc_message', __(('Registered!')));
    }
}
