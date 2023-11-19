<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorsRequests extends FormRequest
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
        $currentAction = $this->route()->getActionMethod();
        // dd($currentAction);
        switch($this->method()):
            case "POST":
                $rules = match ($currentAction) {
                  "add" => [
                            "name" => "required",
                            "email" =>"required|email|unique:authors",
                            "image" => "image"
                        ],
                  "edit" => [
                            "name" => "required",
                            "email" =>"required",
                            "image" => "image"
                        ],
                };
            break;
        endswitch;
        return $rules;
    }
}
