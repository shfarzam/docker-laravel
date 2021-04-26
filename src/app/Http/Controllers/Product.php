<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ProductDB;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\Validator;

class Product extends Controller
{
    public function all() {

        return ProductDB::where('deleted_at',null)->paginate(15);
    }

    public function addProduct(Request $request) {

        //define rules
        $rules = [
            'product_id'   => 'required|numeric|unique:products',
            'p_name'    => 'required|string|max:150',
            ];

        $validator = new Helper($rules);
        $result = $validator->validator($request->json()->all());

        if(count($result) > 0) {
            return FacadeResponse::json($result,400);
        } else {
            //insert in Databse
            $product = new ProductDB;
            $product->product_id = $request->product_id;
            $product->p_name = $request->p_name;
            $product->user_id = $GLOBALS['userInfo']->id;
            $save = $product->save();

            if ($save) {
                return response()->json(['status' => 'New User has been successfuly added to database']);
            } else {
                return response()->json(['status' => 'Something went wrong, try again later'], 400);
            }

        }
    }
}
