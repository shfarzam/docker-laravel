<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Helper extends Controller
{
    private $rules;

    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    /**
     * @param $request
     * @return array
     */
    public function validator($request) {

        $response = [];

        # validate request
        $validator = Validator::make($request, $this->rules);

        if($validator->fails()){

            $response = [
                'Status'   => 'Fail',
                'messages' => array()
            ];

            foreach ($validator->errors()->getMessages() as $item) {
                array_push($response['messages'], $item);
            }
        }

        return $response;
    }
}
