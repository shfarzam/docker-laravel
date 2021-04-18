<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\Response;
use \Illuminate\Support\Facades\Response as FacadeResponse;
use \Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function all() {
        return User::all();
    }
    public function addUser(Request $request) {

        $response = [];
        # validate request
        $validator = Validator::make($request->json()->all(),[
            'first_name' => 'required',
            'last_name'=> 'required',
            'email'=>'required|email|unique:users',
            'password'=> 'required|min:6|max:20'
        ]);
        if($validator->fails()){
            $response['status'] = "Fail";
            $response['code'] = "400";
            $response['messages'] = array();
            foreach ($validator->errors()->getMessages() as $item) {
                array_push($response['messages'], $item);
            }
        } else {
            #insert user into databse
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $save = $user->save();

            if ($save) {
                return response()->json(['status' => 'New User has been successfuly added to database']);
            } else {
                return response()->json(['status' => 'Something went wrong, try again later'], 400);
            }
        }

        return FacadeResponse::json($response);
    }
}
