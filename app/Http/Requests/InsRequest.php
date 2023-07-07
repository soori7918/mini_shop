<?php

/*
 *
 * (c) Farshad Ghanbari <eng.ghanbari2025@gmail.com>
 *
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsRequest extends FormRequest
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
            {
                return [];
            }
            case 'PUT':
            {
                return [
                    'title' => 'required|max:191',
                    'slug' => 'required|unique:posts|max:191',
                    'text' => 'required',
                    'photo' => 'required',
                ];
            }
            case 'PATCH':
            {
                return [
                    'title' => 'required|max:191',
                    'slug' => 'required|max:191|unique:posts,id,' . $this->get('id'),
                    'text' => 'required',
                ];
            }
            default:
                break;
        }
    }
}
