<?php

/*
 *
 * (c) Farshad Ghanbari <eng.ghanbari2025@gmail.com>
 *
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                        'name' => 'required|max:191',
                        'slug' => 'required|unique:categories|max:191'
                    ];
                }
            case 'PATCH':
                {
                    return [
                        'name' => 'required|max:191',
                        'slug' => 'required|max:191|unique:categories,id,' . $this->get('id')
                    ];
                }
            default:
                break;
        }
    }
}
