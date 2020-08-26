<?php

namespace App\Http\Controllers;

use App\Release;    //Eloquent
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // searchを表示
    public function __invoke(Request $request)
    {
        //キーワードを取得
        $keyword = $request->input('keyword');
        $query = Release::query();

        if(!empty($keyword)){
            //全角スペースを半角スペースに
            $search = mb_convert_kana($keyword,'s');
            //キーワードを分割して配列化
            $search = explode(" ",$search);

            //TODO ""を使った検索
            //TODO 検索対象の絞り込み(タイトル検索/アーティスト検索など)

            foreach ($search as $value){
                // 括弧を使うSQLは無名関数を使用する:参考 https://www.jaga.biz/laravel/eloquent-complex-sql/
                $query->where(function($query) use($value){
                    $query->where('title','like','%'.$value.'%')
                        ->orWhere('artist','like','%'.$value.'%');
                });
            }
        }

        //検索総数を保持
        $totalcount = $query->count();
        //ページネーション
        $items = $query->paginate(12);

        return view('search.show',compact('items','keyword','totalcount'));
    }
}
