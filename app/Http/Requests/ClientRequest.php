<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientRequest extends Request {

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
	 * @return array
	 */
	public function rules()
	{
		return [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'company' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'numeric|min:8',
            'vat_number' => 'required|numeric|min:8',
            'zipcode' => 'required|digits:4',
            'city' => 'required',
            'street' => 'required',
		];
	}

}
