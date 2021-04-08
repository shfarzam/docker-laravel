<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuth extends Controller
{
    //
    function userLogin(Request $req)
    {
        return$req->input();
    }

}
