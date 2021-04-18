<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as DB;
use Illuminate\Support\Facades\Validator;

class Product extends Controller
{
    public function all() {

        return DB::paginate(15);
    }

    public function addProduct(Request $request) {
        $response = [];

        //define rules
        $rules = [
            'product_id'   => 'required|unique:customers',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:customers'
        ];

        # validate request
        $validator = Validator::make($request->json()->all(), $rules);

        if($validator->fails()){

            $response = [
                'Status'   => 'Fail',
                'code'     => '400',
                'messages' => array()
            ];

            foreach ($validator->errors()->getMessages() as $item) {
                array_push($response['messages'], $item);
            }
        } else {

        }
    }
}
