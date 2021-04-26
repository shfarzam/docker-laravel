<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserDB;
use App\Models\Customer as CustomerDB;

class MainController extends Controller
{
    private $columns;
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function login() {
        return view('auth.login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function register() {
        return view('auth.register');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function save(Request $request) {

        # validate request
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users',
            'pswd'  => 'required|min:6|max:20'
        ]);

        #insert user into databse
        $user = new User;
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->pswd);
        $save = $user->save();

        if($save){
            return back()->with('success','New User has been successfuly added to database');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function checkLogin(Request $request) {

        # validate request
        $request->validate([
            'uname' => 'required|email',
            'pswd'  => 'required|min:6|max:20'
        ]);

        #insert user into databse
        $user = User::where('email','=',$request->uname)->first();

        if(!$user){
            return back()->with('fail','We could not find your email address in our Customer List.');
        }else{
            //check password
            if(Hash::check($request->pswd, $user->password)){
                $request->session()->put('UserID', $user->id);
                if(strcmp($request->uname, env('ADMIN_USER','sh.farzam@hotmail.com')) == 0) {
                    return redirect('admin/dashboard');
                } else {
                    return redirect('shop/products');
                }


            }else{
                return back()->with('fail','Your password is not correct.');
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function logout(){
        if(session()->has('UserID')){
            session()->pull('UserID');
            return redirect('/auth/login');
        }
    }

    /**
     * @param string $table
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function dashboard($table = 'users'){
        $data = [
            'UserInfo' => User::where('id','=', session('UserID'))->first(),
            'Result'   => $this->getTableData($table),
            'columns'  => $this->columns
        ];

        return view('admin.dashboard', $data);
    }

    function settings(){
        $data = ['UserInfo'=>User::where('id','=', session('UserID'))->first()];
        return view('admin.settings', $data);
    }

    /**
     * @param $table
     */
    function setColumnList($table){
        $table = $table->getTable();
        $this->columns = \DB::getSchemaBuilder()->getColumnListing($table);
    }

    /**
     * @param $table
     * @return mixed
     */
    function getTableData($table){
        $table_map = [
            'users' => 'User',
            'customers' => 'Customer',
            'orders' => 'Order',
            'products' => 'Product'

        ];
        $class_name = 'App\\Models\\'.$table_map[$table];
        $db = new $class_name;
        $this->setColumnList($db);

        return $db->paginate(15);
    }

}
