<?php

/*
 *
 * (c) Farshad Ghanbari <eng.ghanbari2025@gmail.com>
 *
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * (c) Farshad Ghanbari <eng.ghanbari2025@gmail.com>
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            case 'PUT':
                {
                    return [];
                }
            case 'PATCH':
                {
                    return [
                        'title' => 'required|max:191',
                        'keywords' => 'required|max:191',
                        'description' => 'required|max:191',
                        'paginate' => 'required|max:191'
                    ];
                }
            default:
                break;
        }
    }
}
