<?php

/*
 *
 * (c) Farshad Ghanbari <eng.ghanbari2025@gmail.com>
 *
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed account_status
 * @property mixed mobile_status
 */
class UserRequest extends FormRequest
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
                        'first_name' => 'required|max:191',
                        'last_name' => 'required|max:191',
                        'email' => 'required|email|unique:users',
                        'mobile' => 'required|unique:users',
                        'password' => 'required|min:6|confirmed'
                    ];
                }
            case 'PATCH':
                {
                    return [
                        'first_name' => 'required|max:191',
                        'last_name' => 'required|max:191',
                        'email' => 'required|email|unique:users,id,' . $this->get('id'),
                        'mobile' => 'required|unique:users,id,' . $this->get('id')
                    ];
                }
            default:
                break;
        }
    }
}
