<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App;
use App\Task;

use App\Http\Requests\CreateTaskRequest; //バリデーションを使う
use Carbon\Carbon; //現在時刻取得用

class TasksController extends Controller
{
    //マイページ表示
    public function mypage()
    {
        //ユーザー情報を取得
        $user = Auth::user();
        //自分のリストを取得
        $tasks = Auth::user()->tasks()->get()->where('is_finished', '0');
        //ビュー表示
        return view('/mypage', ['user' => $user, 'tasks' => $tasks]);
    }

    //新規作成画面表示
    public function new()
    {
        //ユーザー情報を取得
        $user = Auth::user();
        //今登録しているリストの数を取得
        $totalList = Task::where('user_id', $user['id'])->where('is_finished', '0')->count();
        Log::debug('現在のリスト数：'.$totalList);

        //リスト数が５個未満なら新規リスト登録画面へ
        if ($totalList < 5) {
            return view('tasks.new', ['user' => $user]);
        } else {
            //5個以上の場合、エラーメッセージ＋マイページ遷移
            return redirect('/mypage')->with('err_message', __(('Max List is 5')));
        }
    }

    //タスク作成
    public function create(CreateTaskRequest $request)
    {
        Log::debug('バリデーションOK');
        //モデルのインスタンス作成
        $task = new Task;

        //登録
        //user_idはusersテーブルから取得
        Auth::user()->tasks()->save($task->fill($request->all()));
        Log::debug('登録成功');

        //マイページへ遷移＋メッセージ
        return redirect('/mypage')->with('flash_message', __(('Registered!')));
    }

    //リスト削除
    public function delete($id)
    {
        //idが数字かどうかのチェック
        if (!ctype_digit($id)) {
            //不正な場合はエラーメッセージつけてマイページへ
            return redirect('/mypage')->with('err_message', 'Invalid operation');
        }

        Task::find($id)->delete($id);
        return redirect('/mypage')->with('flash_message', __(('Deleted')));
    }

    //タスク編集
    public function edit($id)
    {
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __(('Invalid opration was performed.')));
        }

        $task = Auth::user()->tasks()->find($id);
        return view('tasks.edit', ['task' => $task]);
    }

    //タスク更新
    public function update($id, CreateTaskRequest $request)
    {
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __(('Invalid opration was performed.')));
        }

        Task::find($id)->fill($request->all())->save();
        return redirect('/mypage')->with('flash_message', __(('Changed!')));
    }

    //タスク実行前の確認
    public function prepare($id)
    {
        //idが数字かどうかチェックする
        if (!ctype_digit($id)) {
            //不正な場合はエラーメッセつけてマイページへ
            return redirect('/mypage')->with('err_message', __(('Invalid operation')));
        }
        //ユーザー情報を取得
        $user = Auth::user();
        //自分のリストを取得
        $task = Auth::user($id)->tasks()->find($id);
        //ビュー表示
        return view('tasks.prepare', ['user' => $user, 'task' => $task]);
    }

    //タスク実行開始
    public function start(Request $request, $id)
    {
        log::debug('タスク開始');
        log::debug($request);
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('err_message', __(('Invalid operation')));
        }
        //受け取ったデータの加工
        for ($i=0; $i<=4; $i++) {
            if ($request[$i]) {
                $request['task'.$i] = $request[$i];
            } else {
                continue;
            }
        }
        //今回変更するタスクのデータ取得
        $task = Auth::user()->tasks->find($id);
        log::debug($task);

        //更新
        Auth::user()->tasks()->save($task->fill($request->all()));
        log::debug('DBの値更新');
    }

    //実行中
    public function doing($id)
    {
        log::debug('doingスタート');

        //idが数字かどうかチェックする
        if (!ctype_digit($id)) {
            //不正な場合はエラーメッセつけてマイページへ
            log::debug('数字チェック');
            return redirect('/mypage')->with('err_message', __(('Invalid operation')));
        }

        $task = Auth::user()->tasks->find($id);

        //完了しているタスクならマイページへ遷移
        if ((int)$task['is_finished'] === 1) {
            log::debug('完了しています');
            return redirect('/mypage')->with('err_message', __(('Invalid operation')));
        } else {
            log::debug('doing表示');
            return view('tasks.doing', ['task' => $task]);
        }
    }

    //完了フラグを立てる
    public function finishFlg($id)
    {
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __(('Invalid opration was performed.')));
        }

        Task::find($id)->update(['is_finished' => 1]);
        log::debug('更新しました');
    }


    //タスク終了ページへ
    public function complete($id)
    {
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __(('Invalid opration was performed.')));
        }

        return view('/tasks/complete');
    }

    public function history()
    {
        //自分のリストを取得
        $tasks = Auth::user()->tasks()->latest('updated_at')->where('is_finished', '1')->paginate(10);

        // 自分以外のユーザーを作って違いを確認
        // $tasks = Task::latest('updated_at')->where('is_finished', '1')->paginate(5);

        $totalBigtask = Auth::user()->tasks('title')->where('is_finished', '1')->count();
        $totalSmalltask0 = Auth::user()->tasks('task0')->whereNotNull('task0')->where('is_finished', '1')->count();
        $totalSmalltask1 = Auth::user()->tasks('task1')->whereNotNull('task1')->where('is_finished', '1')->count();
        $totalSmalltask2 = Auth::user()->tasks('task2')->whereNotNull('task2')->where('is_finished', '1')->count();
        $totalSmalltask3 = Auth::user()->tasks('task3')->whereNotNull('task3')->where('is_finished', '1')->count();
        $totalSmalltask4 = Auth::user()->tasks('task4')->whereNotNull('task4')->where('is_finished', '1')->count();
        $totalSmalltask = (int)($totalSmalltask0 + $totalSmalltask1 + $totalSmalltask2 + $totalSmalltask3 + $totalSmalltask4);

        return view('tasks.history', ['tasks' => $tasks, 'totalBigtask' => $totalBigtask, 'totalSmalltask' => $totalSmalltask]);
    }
}
