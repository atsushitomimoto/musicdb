<?php

namespace app\Libraries;

use Illuminate\Support\Facades\Storage;

class Common {
    public static function saveImage($request, $release){
        // TODO サムネイル用の圧縮したジャケットを実装
        if ($release->image) {
            // 既に画像が存在していた場合、その画像を削除。
            // 画像が複数登録できるようになるまでは、この仕様を継続する
            $release = deleteimage($release);
        }
        //画像の保存
        $path = $request->image->store('public/img');
        //画像パスの登録
        $release->image = str_replace('public/', 'storage/', $path);
        return $release;
    }

    public static function deleteImage($release){
        if ($release->image) {
            $delete_path = str_replace('storage/', 'public/', $release->image);
            Storage::delete($delete_path);
            $release->image = NULL;
        }
        return $release;
    }
}