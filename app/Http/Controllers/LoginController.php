<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use App\Models\User;
use App\Models\Address;
use Validator;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Session;

class LoginController extends Controller
{
    protected $rules = [
        'firstname' => 'required|regex:/^[a-z A-Z \-]+$/u',
        'secondname' => 'required|regex:/^[a-z A-Z \-]+$/u',
        'email' => 'required|email',
        'password' => 'required|min:6|max:12',
        'confirm_password' => 'required|same:password',
        // 'mobile' => 'numeric|required|digits:10',
    ];
    protected $rulesLogin = [
        'email' => 'required|email',
        'password' => 'required|min:6|max:12',
    ];
    protected $rules_Update = [
        'firstname' => 'required|regex:/^[a-z A-Z \-]+$/u',
        'secondname' => 'required|regex:/^[a-z A-Z \-]+$/u',
        'mobile' => 'numeric|required|digits:10',
    ];

    public function account()
    {
        if (!Session::get('user')) {
            return view('user_login');
        }
        $addresses = DB::table('user_addresses')
            ->where('user_id', '=', Session::get('user_id'))
            ->get();
        $user = User::findOrFail(Session::get('user_id'));
        // self::console_log('variable $ addresses = ' . $addresses);
        return view('user_account', [
            'addresses' => $addresses,
            'user' => $user,
        ]);
        // return view('welcome', ['posts' => $posts]);
    }

    public function addNewUser(Request $request)
    {
        //  Dear User:  This is the Register process which gives feedback via Ajax
        $validator = Validator::make(Request::all(), $this->rules);
        if ($validator->fails()) {
            $errorArray = $validator->getMessageBag()->toArray();
            return Response::json([
                'errors' => $errorArray,
            ]);
        }
        $result = DB::table('users')
            ->where('email', $request::input('email'))
            ->get();
        if (sizeof($result) != 0) {
            //  Dear User:  This means the email address has already been added to the system,  hence,  we cannot proceed.
            $errorArray = [
                'email' =>
                    'Sorry,  but this email address is already Registered...',
            ];
            return Response::json([
                'errors' => $errorArray,
            ]);
        } else {
            $data = $request::input();
            $user = new User();
            $user->firstname = $data['firstname'];
            $user->secondname = $data['secondname'];

            $user->name = $data['firstname'] . ' ' . $data['secondname'];
            $user->email = $data['email'];
            $encrypted_password = Crypt::encrypt($data['password']);
            $user->password = $encrypted_password;
            // $user->mobile = $data['mobile'];
            $user->mobile = ' ';
            $user->save();
            return Response::json($user);
            // return redirect('/account');
        }
    }

    public function loginUser(Request $request)
    {
        //  Dear User:  This is the Login process which gives feedback via Ajax
        $validator = Validator::make(Request::all(), $this->rulesLogin);
        if ($validator->fails()) {
            $errorArray = $validator->getMessageBag()->toArray();
            return Response::json([
                'errors' => $errorArray,
            ]);
        }
        $result = DB::table('users')
            ->where('email', $request::input('email'))
            ->get();
        if (sizeof($result) == 0) {
            //  Dear User:  This means the email address doesn't exist the system,  hence,  we cannot proceed.
            $errorArray = [
                'email' =>
                    'This Email is not on our records. Please register yourself first.',
            ];
            return Response::json([
                'errors' => $errorArray,
            ]);
        } else {
            $encrypted_password = $result[0]->password;
            $decrypted_password = Crypt::decrypt($encrypted_password);
            if ($decrypted_password == $request::input('password')) {
                // Dear User:  Please be aware this version of Login informs the client via AJAX JSON responses.
                $request::session()->put('user', $result[0]->name);
                $request::session()->put('user_id', $result[0]->id);
                // $req::session()->put('firstname', $result[0]->firstname);
                // $req::session()->put('secondname', $result[0]->secondname);
                // $req::session()->put('name', $result[0]->name);
                // $req::session()->put('email', $result[0]->email);
                // $req::session()->put('mobile', $result[0]->mobile);
                $user = new User();
                $user->id = $result[0]->id;
                $user->firstname = $result[0]->firstname;
                $user->secondname = $result[0]->secondname;
                $user->name = $result[0]->name;
                $user->email = $result[0]->email;
                $user->mobile = $result[0]->mobile;
                // Dear User:  Please be aware this version of Login informs the client via AJAX JSON responses.
                //             If the client receives a successful 200 HTTP response (without errors) the CLIENT
                //             redirects the browser to the Client's account page.  We do it there,  not here.
                return Response::json($user);
                // return redirect('/account');
            } else {
                //  Dear User:  This means the email address doesn't exist the system,  hence,  we cannot proceed.
                $errorArray = [
                    'password' =>
                        "Sorry,  but you've quoted an incorrect Password.",
                ];
                return Response::json([
                    'errors' => $errorArray,
                ]);
            }
        }
    }

    public function updateUser(Request $req)
    {
        if (!Session::get('user_id')) {
            return view('user_login');
        }
        //  Dear User:  This process gives validation feedback via fully rendered HTML pages
        $data = $req::input();
        $validator = Validator::make(Request::all(), $this->rules_Update);
        if ($validator->fails()) {
            $errorArray = $validator->getMessageBag()->toArray();
            return Response::json([
                'errors' => $errorArray,
            ]);
        }
        $result = DB::table('users')
            ->where('id', Session::get('user_id'))
            ->get();

        $res = json_decode($result, true);
        if (sizeof($res) != 0) {
            $user = User::findOrFail($result[0]->id);

            $user->firstname = $data['firstname'];
            $user->secondname = $data['secondname'];
            $user->name = $data['firstname'] . ' ' . $data['secondname'];
            $user->mobile = $data['mobile'];
            $user->save();
            $user->just_now = date('Y-m-d h:i:s', time());

            $req::session()->put('user', $user->name);
            // Dear User:  Please be aware this version of Login informs the client via AJAX JSON responses.
            //             If the client receives a successful 200 HTTP response (without errors) the CLIENT
            //             redirects the browser to the Client's account page.  We do it there,  not here.
            return Response::json($user);

            $req::session()->flash('register_status', 'Successfully updated.');
            $addresses = Address::all();
            $user = User::findOrFail(Session::get('user_id'));
            // self::console_log('variable $ addresses = ' . $addresses);
            return view('user_account', [
                'addresses' => $addresses,
                'user' => $user,
            ]);
            // return redirect('/account');
            // return;
        } else {
            $req
                ::session()
                ->flash(
                    'register_status',
                    'Unsuccessful.  User Record not found.'
                );
            // return view('user_account', ['addresses' => $addresses]);
            return redirect('/account');
            // return;
        }
    }

    public function login()
    {
        return view('user_login');
    }

    public function logout(Request $request)
    {
        $request::session()->flush();
        //  Auth::logout();
        return Redirect('/');
    }
}
