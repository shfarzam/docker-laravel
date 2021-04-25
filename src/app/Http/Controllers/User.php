<?php

namespace App\Http\Controllers;

use App\Models\User as UserDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Response as FacadeResponse;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Helper;

class User extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all() {
        $user = $GLOBALS['userInfo'];
        if(strcmp($user->email, $_ENV['ADMIN_USER']) == 0 ) {
            return UserDB::all();
        }

        return response()->json(['status' => 'You do not have Permission.']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addUser(Request $request) {

        $user = $GLOBALS['userInfo'];
        if(strcmp($user->email, $_ENV['ADMIN_USER']) == 0 ) {

            //define rules
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|max:20'
            ];

            # validate request
            $validator = new Helper($rules);
            $result = $validator->validator($request->json()->all());

            if (count($result) > 0) {
                return FacadeResponse::json($result, 400);

            } else {
                #insert user into databse
                $user = new UserDB;
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
        }

        return response()->json(['status' => 'You do not have Permission.']);

    }
}
