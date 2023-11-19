<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequets extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        //Lấy ra tên phương thức cần xử lí
        // $currentAction = $this->route()->getActionMethod();

        switch ($this->method()):
            case "POST":
                $rules = [
                    "email"=>"required|unique:users",
                ];
            break;
        endswitch;
        return $rules;

    }
}
