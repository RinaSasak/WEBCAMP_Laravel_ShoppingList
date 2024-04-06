<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterPost;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 会員登録ページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('user.register');
    }

    /**
     * ユーザ登録処理
     * 
     */
    public function register(UserRegisterPost $request)
    {
        // validate済データの取得
        $datum = $request->validated();

        // パスワードをハッシュ化
        $datum['password'] = Hash::make($datum['password']);

        // データベースに保存
        \App\Models\User::create($datum);

        // 登録完了メッセージとリダイレクト
        $request->session()->flash('user_register_success', true);
        
        return redirect('/');
    }
}
