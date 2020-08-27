<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReleaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:500',
            'artist' => 'max:300',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必ず入力して下さい。',
            'title.max' => 'タイトルは500文字以内で入力して下さい。',
            'artist.max' => 'アーティストは300文字以内で入力して下さい。',
            'image.image' => '画像ファイルは.jpgと.pngのみ対応しています。',
        ];
    }
}
