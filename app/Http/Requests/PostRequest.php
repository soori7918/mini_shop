<?php

/*
 *
 * (c) Farshad Ghanbari <eng.ghanbari2025@gmail.com>
 *
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                        'category_id' => 'required',
                        'author_id' => 'required',
                        'title' => 'required|max:191',
                        'slug' => 'required|unique:posts|max:191',
                        'body' => 'required',
                        'keywords' => 'required|max:191',
                        'description' => 'required|max:191'
                    ];
                }
            case 'PATCH':
                {
                    return [
                        'category_id' => 'required',
                        'author_id' => 'required',
                        'title' => 'required|max:191',
                        'slug' => 'required|max:191|unique:posts,id,' . $this->get('id'),
                        'body' => 'required',
                        'keywords' => 'required|max:191',
                        'description' => 'required|max:191'
                    ];
                }
            default:
                break;
        }
    }
}
