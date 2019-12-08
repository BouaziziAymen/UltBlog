<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostEditFormRequest extends Request
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
public function rules()
{
return [
'title' => 'required',
'content'=> 'required',
'categories' => 'required',
];
}
}
