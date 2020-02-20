<?php

namespace App\Http\Requests\Frontend\Post;

use Illuminate\Foundation\Http\FormRequest;

class ManagePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->post ? $this->post->user_id == $this->user()->id : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
