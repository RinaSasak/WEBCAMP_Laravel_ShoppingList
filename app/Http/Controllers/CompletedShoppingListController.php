<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CompletedShoppingList as CompletedShoppingListModel;

class CompletedShoppingListController extends Controller
{
    /**
     * 購入済み「買う物」一覧ページ　を表示する
     *
     * @return \Illuminate\View\View
     */
     public function list()
     {
         // 1Pageあたりの表示アイテム数を設定
         $per_page = 3;

        // 一覧の取得
        $list = CompletedShoppingListModel::where('user_id', Auth::id())
                         ->orderBy('name')
                         ->orderBy('created_at')
                         ->paginate($per_page);
                         
        return view('completed_shopping_list.list', ['list' => $list]);
     }
}