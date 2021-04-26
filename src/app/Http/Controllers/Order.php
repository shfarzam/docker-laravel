<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Order as OrderDB;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Helper;

class Order extends Controller
{
    /**
     * @return mixed
     */
    public function all() {
            $order = new OrderDB();
            $order->setHidden(['deleted_at','updated_at']);

           return $order->paginate(10);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addOrder(Request $request) {


        //define rules
        $rules = [
            'order_id'      => 'required|numeric',
            'customer_id'   => 'required|numeric|exists:customers,customer_id',
            'product_id'    => 'required|numeric|exists:products,product_id',
        ];

        # validate request
        $validator = new Helper($rules);
        $result = $validator->validator($request->json()->all());

        if(count($result) > 0){
            return FacadeResponse::json($result,400);
        } else {
            try {
                $order = new OrderDB;
                $order->order_id = $request->order_id;
                $order->customer_id = $request->customer_id;
                $order->product_id = $request->product_id;
                $order->user_id = $GLOBALS['userInfo']->id;
                $save = $order->save();

                if ($save) {
                    return response()->json(['status' => 'New Order has been successfuly added to database']);
                } else {
                    return response()->json(['status' => 'Something went wrong, try again later'], 400);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => 'Insert Data have an error, Please check your Data.'], 500);
            }
        }


    }
}
