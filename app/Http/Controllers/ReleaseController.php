<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// Library
use Helper;
use App\Libraries\Common;
use Carbon\Carbon;
// Validate
use App\Http\Requests\ReleaseRequest;
// Eloquent
use App\Release;
use App\Position;

class ReleaseController extends Controller
{
    public function show($id){
        // releaseの存在確認
        if (Release::where('id',$id)->exists()) {
            $item = Release::find($id);
        } else {
            return redirect('/');
        }

        // 曲順の取得
        $positions = Position::where('release_id',$item->id)->orderBy('order')->get();
        
        if ($positions->count() > 0){
            $show_positions = true;
        } else {
            $show_positions = false;
        }

        // アルバムアーティストと異なるアーティストが存在する場合、アーティスト欄を表示
        $positions_artist = Position::where('release_id',$item->id)->whereNotNull('artist')->get();
        if ($positions_artist->whereNotIn('artist',$item->artist)->count() > 0) {
            $show_artist = true;
        } else {
            $show_artist = false;
        }

        // lengthが存在する場合、再生時間欄を表示
        $positions_length = Position::where('release_id',$item->id)->whereNotNull('length')->get();
        if ($item->length || $positions_length->count() > 0) {
            $show_length = true;
        } else {
            $show_length = false;
        }

        // 総再生時間を算出
        if ($item->length) {
            $total_length = $item->length;
        } else {
            $total_length = $this->calcTotalLength($positions);
        }
        
        // releaseの表示
        return view('release.show',compact('item','positions','total_length','show_positions','show_artist','show_length'));
    }

    public function add(){
        $msg = 'Releaseを新規登録します。';
        return view('release.add',compact('msg'));
    }

    public function create(ReleaseRequest $request){
        $release = new Release;

        $release->title = $request->title;
        $release->artist = $request->artist;

        $release = Common::saveImage($request, $release);

        $release->save();
        
        session()->flash('alert_success',$request->title.' を追加しました。');

        return redirect()->route('release.show',['id' => $release->id]);
    }

    public function edit($id,Request $request){
        // releaseの存在確認
        if (Release::where('id',$id)->exists()) {
            $item = Release::find($id);
        } else {
            return redirect('/');
        }
        $msg = 'Releaseを編集します。';
        return view('release.edit',compact('item','msg'));
    }

    // 編集したreleaseのDB更新
    public function update(ReleaseRequest $request){
        $release = Release::findOrFail($request->id);

        $release->title = $request->title;
        $release->artist = $request->artist;

        if ($request->image_delete) {
            $release = Common::deleteImage($release);
        }

        if ($request->image) {
            if ($request->file('image')->isValid([])) {
                $release = Common::saveImage($request, $release);
            }
        }
        
        $release->save();

        session()->flash('alert_success',$request->title.' を更新しました。');
        
        return redirect()->route('release.show',['id' => $release->id]);
    }

    public function del($id,Request $request){
        // releaseの存在確認
        if (Release::where('id',$id)->exists()) {
            $item = Release::find($id);
        } else {
            return redirect('/');
        }
        $msg = 'を削除します。';
        return view('release.delete',compact('item','msg'));
    }

    public function remove(Request $request){
        $release = Common::deleteImage($release);
        Release::destroy($request->id);

        if ($request->artist) {
            $delete_name = $request->title.' '.$request->artist;
        } else {
            $delete_name = $request->title;
        }

        session()->flash('alert_success',$request->title.' を削除しました。');

        return redirect()->route('search.show');
    }

    // 合計時間の計算
    static function calcTotalLength($positions){
        $total_time = Carbon::createFromTime(0,0,0);
        foreach ($positions as $position) {
            // 分数の加算
            $minute = Str::before($position->length,':');
            $total_time->addMinutes($minute);
            // 秒数の加算
            $second = Str::after($position->length,':');
            $total_time->addSeconds($second);
        }
        
        // 時間差から合計秒数を算出（再生時間の1日超え対策）
        $base_time = Carbon::createFromTime(0,0,0);
        $total_second = $base_time->diffInSeconds($total_time);

        // 合計秒数から分数と秒数に分ける
        $minute = floor($total_second / 60);
        $second = $total_second % 60;

        // 秒数の桁調整
        if (strlen($second) < 2) {
            $second = '0'.$second;
        }

        // "分数:秒数"のフォーマットに変換
        $total_length = $minute.':'.$second;

        return $total_length;
    }
}