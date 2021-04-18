<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer as DB;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\Validator;

class Customer extends Controller
{
    /**
     * @return DB[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all() {

        return DB::paginate(10);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCustomer(Request $request) {
        $response = [];

        //define rules
        $rules = [
            'customer_id'   => 'required|unique:customers',
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

            //insert data into Database
            $customer = new DB;
            $customer->customer_id = $request->customer_id;
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->user_id = $GLOBALS['userInfo']->id;
            $save = $customer->save();

            if ($save) {
                return response()->json(['status' => 'New Customer has been successfuly added to database']);
            } else {
                return response()->json(['status' => 'Something went wrong, try again later'], 400);
            }

        }

        $code = $response['code'];
        unset($response['code']);

        return FacadeResponse::json($response,$code);

    }

    public function editCustomer(Request $request) {

        # validate request
        $validator = Validator::make($request->json()->all(),[
             'customer_id' => 'required|exists:customers,customer_id',
        ]);
        if($validator->fails()){
            $response['status'] = "Fail";
            $response['code'] = "400";
            $response['messages'] = array();

            foreach ($validator->errors()->getMessages() as $item) {
                 array_push($response['messages'], $item);
            }

        } else {
            $customer = DB::find($request->customer_id);

            foreach ($request->json()->all() as $key => $value) {

                if(in_array($key,['first_name', 'last_name','email'])) {
                    $customer->$key = $value;
                }

            }

            $update = $customer->save();
            if ($update) {
                return response()->json(['status' => 'Customer data has been successfuly update on database']);
            } else {
                return response()->json(['status' => 'Something went wrong, try again later'], 400);
            }
            }

        $code = $response['code'];
        unset($response['code']);

        return FacadeResponse::json($response,$code);
    }


}
