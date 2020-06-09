<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\User;



use App\Http\Requests\CreateTaskRequest; //バリデーションを使う

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('index');
    }

    public function profile()
    {
        return view('profile');
    }

    //メールアドレス変更ページ表示
    public function editEmail()
    {
        //ユーザー情報を取得
        $user = Auth::user();
        return view('edit-email', ['user' => $user]);
    }

    //メールアドレス変更
    public function changeEmail(Request $request)
    {
        //ユーザー情報を取得
        Auth::user()->update(['email' => $request['email']]);
        return redirect('/mypage')->with('flash_message', __(('Changed Email')));
    }

    //パスワード変更ページ表示
    public function editPass()
    {
        return view('edit-pass');
    }

    //パスワード変更
    //http://ryota01.com/archives/22

    public function changePassword(Request $request)
    {
        //現在のパスワードが正しいか確認
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが異なっているか確認
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //新しいパスワードのバリデーション
        Log::debug('新しいパスのバリデーション開始');

        $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        Log::debug('新しいパスのバリデーション完了');


        //パスワード変更
        Log::debug('バリデーション完了');
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        Log::debug('パスワードを変更しました');

        return redirect('/mypage')->with('flash_message', __(('Changed Password')));
    }
}
