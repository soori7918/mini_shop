<?php

/*
 *
 * (c) Farshad Ghanbari <eng.ghanbari2025@gmail.com>
 *
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed category_id
 * @property mixed name
 * @property mixed slug
 * @property mixed location_id
 * @property mixed villa_place
 * @property mixed number_of_servants
 * @property mixed body
 * @property mixed prices
 * @property mixed status
 * @property mixed nearest
 * @property mixed properties_in
 * @property mixed properties_out
 * @property mixed latitude
 * @property mixed longitude
 * @property mixed some_description
 * @property mixed some_passenger
 * @property mixed some_price
 * @property mixed some_price_type
 * @property mixed some_discount
 * @property mixed district
 * @property mixed max_passenger
 * @property mixed number_of_rooms
 * @property mixed price
 * @property mixed price_type
 * @property mixed discount
 * @property mixed some_room
 * @property mixed services
 * @property mixed information
 * @property mixed last_discount
 * @property mixed number_of_wc
 * @property mixed pool_space
 * @property mixed space
 * @property mixed price_desc
 * @property mixed search
 *
 */
class VillaRequest extends FormRequest
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
//                        'category_id' => 'required',
                        'name' => 'required|max:191',
                        'slug' => 'required|unique:posts|max:191',
//                        'title' => 'required',
                        'location_id' => 'required',
//                        'properties_in' => 'required',
//                        'properties_out' => 'required',
//                        'villa_place' => 'required|max:191',
//                        'max_passenger' => 'required|int',
//                        'number_of_rooms' => 'required|int',
//                        'number_of_servants' => 'required|int',
//                        'body' => 'required',
//                        'latitude' => 'required',
//                        'longitude' => 'required'
                    ];
                }
            case 'PATCH':
                {
                    return [
//                        'category_id' => 'required',
                        'name' => 'required|max:191',
                        'slug' => 'required|max:191|unique:villas,id,' . $this->get('id'),
                        'location_id' => 'required',
//                        'properties_in' => 'required',
//                        'properties_out' => 'required',
//                        'villa_place' => 'required|max:191',
//                        'max_passenger' => 'required|int',
//                        'number_of_rooms' => 'required|int',
//                        'number_of_servants' => 'required|int',
//                        'body' => 'required',
//                        'latitude' => 'required',
//                        'longitude' => 'required'
                    ];
                }
            default:
                break;
        }
    }
}
