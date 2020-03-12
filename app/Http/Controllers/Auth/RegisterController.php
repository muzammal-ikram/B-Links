<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
// use Datatables;
use Hash as PassHash;
use DB;
use App\DataTables\UsersDataTable;
// use DataTables;
// use Yajra\DataTables\Contracts\DataTable;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except('registerUser');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'user_type'=>['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'is_admin' => $data['user_type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function registerUser(Request $request)
    {
        $this->validator($request->all())->validate();

        $create = User::create([
            'is_admin' => $request->user_type,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($create){
            return redirect()->back()->with('success', 'User Register Successfully!');
        }else{
            return redirect()->back()->with('error', 'User Register Failed!');
        }
    }
    public function allUsers(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.all_users');
        if($request->ajax()){

            $users = User::where('id', '!=', auth()->user()->id)->get();
            return \Datatables::of($users)
            ->addColumn('action', function($user) {
                return view('_partials.user_datatable',['user'=>$user]);
            })
            ->addColumn('created_at', function ($user) {
                    $created_at = $user->created_at->format('M-d-Y');
                return $created_at;
            })
            ->rawColumns(['action' => 'action', 'created_at'=>'created_at'])
                ->make(true);
        }
        return view('users.all_users');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $userDelete = $user->delete();
        if($userDelete){
            return redirect()->back()->with('success', 'User Deleted Successfully!');
        }else{
            return redirect()->back()->with('error', 'User Deleted Failed!');
        }

    }
    public function editUser($id)
    {
        $data['user'] = User::findOrFail($id);
        if($data['user']){
            return view('auth.register', $data);
        }
        return redirect()->back()->with('error', 'Something Went Wrong!');
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->user_type;
        $user->save();
        if($user){
            return redirect()->back()->with('success', 'User Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'User Updated Failed!');
        }
    }
    public function changePassword()
    {
        return view('users.change_password');
    }
    public function userPasswordChange(Request $request)
    {
        
        $validatedData = $request->validate([
            'current_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ]);
        if (!(PassHash::check($request->get('current_password'), \Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        //Change Password
        $user = \Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
