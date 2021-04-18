<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\Response;
use \Illuminate\Support\Facades\Response as FacadeResponse;
use \Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;

class UserController extends Controller
{
    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all() {
        $user = $GLOBALS['userInfo'];
        if(strcmp($user->email, $_ENV['ADMIN_USER']) == 0 ) {
            return User::all();
        }

        return User::where('id',$user->id)->first();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addUser(Request $request) {

        $response = [];

        //define rules
        $rules = [
            'first_name' => 'required',
            'last_name'=> 'required',
            'email'=>'required|email|unique:users',
            'password'=> 'required|min:6|max:20'
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
        $code = $response['code'];
        unset($response['code']);

        return FacadeResponse::json($response,$code);
    }
}
