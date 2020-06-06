<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //使わない場合はtrueを返す(エラー403が出る)
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
            'title' => 'required|string|max:25',
            'task0' => 'required|string|max:25',
            'task1' => 'string|nullable|max:25',
            'task2' => 'string|nullable|max:25',
            'task3' => 'string|nullable|max:25',
            'task4' => 'string|nullable|max:25',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '「達成すること」は必須です',
            'task0.required' => '「分割タスク1」は必須です',
            'title.max' => '「達成すること」は25文字以内で記入して下さい',
            'task0.max' => '「分割タスク1」は25文字以内で記入して下さい',
            'task1.max' => '「分割タスク2」は25文字以内で記入して下さい',
            'task2.max' => '「分割タスク3」は25文字以内で記入して下さい',
            'task3.max' => '「分割タスク4」は25文字以内で記入して下さい',
            'task4.max' => '「分割タスク5」は25文字以内で記入して下さい',
        ];
    }
}
