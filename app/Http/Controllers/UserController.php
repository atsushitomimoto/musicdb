<?php

namespace App\Http\Controllers;

//Eloquent
use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    // 新規登録ページ
    public function getRegister(){
        return view('user.register');
    }

    // 新規登録処理
    public function postRegister(Request $request){
        // TODO バリデーションのメッセージが英語だしリクエスト用意すんのもあり
        // TODO メール認証にしたい

        // バリデーション
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        session()->flash('alert_info','会員登録が完了しました。');

        return redirect()->route('home');
    }

    // ログイン画面
    public function getLogin(Request $request){
        // 元のページへリダイレクト
        if (isset($_SERVER['HTTP_REFERER'])) {
            session(['url.intended' => $_SERVER['HTTP_REFERER']]);
        }

        return view('user.login');
    }

    // ログイン処理
    public function postLogin(Request $request){
        $this->validate($request,[
            'email' => 'email|required',
            'password' => 'required|min:6',
        ]);
        
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            // ログイン完了
            return redirect()->intended('/');
        }
        return redirect()->back();
    }

    // ログアウト
    public function getLogout(){
        // 元のページへリダイレクト
        if (isset($_SERVER['HTTP_REFERER'])) {
            session(['url.intended' => $_SERVER['HTTP_REFERER']]);
        }

        Auth::logout();
        return redirect()->intended('/');
    }

    // プロフィールの表示
    public function getProfile(){
        return view('user.profile');
    }

    // 設定の表示
    public function getSetting(){
        session()->flash('alert_danger','設定ページは作成中です。');
        return redirect()->route('user.profile');
    }
}