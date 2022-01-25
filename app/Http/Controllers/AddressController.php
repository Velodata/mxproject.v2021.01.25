<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use App\Models\Address;
use View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Session;

class AddressController extends Controller
{
    protected $rulesAdd = [
        'address1' => 'required|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u|max:60',
        'address2' => 'nullable|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u|max:60',
        'suburb' => 'required|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u',
        'state' =>
            'required_if:country,Australia|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u',
        'postcode' => 'numeric|required',
        'country' => 'required|regex:/^[a-z A-Z 0-9]+$/u',
        // 'mobile' => 'numeric|required|digits:10',
    ];

    public function addNewAddress(Request $request)
    {
        $data = $request::input();
        if ($data['country'] == 'New Zealand') {
            $ruleState = 'nullable|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u';
        } else {
            $ruleState = 'required|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u';
        }
        $validator = Validator::make(Request::all(), [
            'address1' => 'required|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u|max:60',
            'address2' => 'nullable|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u|max:60',
            'suburb' => 'required|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u',
            'state' => $ruleState,
            'postcode' => 'numeric|required',
            'country' => 'required|regex:/^[a-z A-Z 0-9]+$/u',
        ]);
        if ($validator->fails()) {
            $errorArray = $validator->getMessageBag()->toArray();
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        } else {
            $address = new Address();

            $address->user_id = $data['user_id'];
            $address->address1 = $data['address1'];
            $address->address2 = $data['address2'];
            $address->state = $data['state'];
            $address->suburb = $data['suburb'];
            $address->postcode = $data['postcode'];
            $address->country = $data['country'];
            $address->save();
            return Response::json($address);
        }
    }

    public function updateAddress(Request $req)
    {
        if (!Session::get('user_id')) {
            //  Please Note:  You must have the Session namespace loaded at the top of this controller.
            return view('user_login');
        }

        // Dear User:  Please be aware this version of Login informs the client via AJAX JSON responses.
        //             If the client receives a successful 200 HTTP response (without errors) the CLIENT
        //             redirects the browser to the Client's account page.  We do it there,  not here.
        $data = $req::input();
        if ($data['country'] == 'New Zealand') {
            $ruleState = 'nullable|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u';
        } else {
            $ruleState = 'required|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u';
        }
        $validator = Validator::make(Request::all(), [
            'address1' => 'required|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u|max:60',
            'suburb' => 'required|regex:/^[a-z A-Z 0-9 \, \- \.]+$/u',
            'state' => $ruleState,
            'postcode' => 'numeric|required',
            'country' => 'required|regex:/^[a-z A-Z 0-9]+$/u',
        ]);
        // $validator = Validator::make(Request::all(), $this->rulesAdd);
        if ($validator->fails()) {
            $errorArray = $validator->getMessageBag()->toArray();
            return Response::json([
                'errors' => $errorArray,
            ]);
        }

        $result = DB::table('user_addresses')
            ->where('id', Request::input('id'))
            ->get();

        $res = json_decode($result, true);
        if (sizeof($result) == 0) {
            //  Dear User:  This means the address doesn't exist in the system,  hence,  we cannot proceed.
            $errorArray = [
                'errorEditMessage' =>
                    'Sorry,  this Address is no longer on our records.  Perhaps it has been deleted?',
            ];
            return Response::json([
                'errorEditMessage' => $errorArray,
            ]);
        }
        if (sizeof($res) != 0) {
            $address = Address::findOrFail(Request::input('id'));

            $address->user_id = $data['user_id'];
            $address->address1 = $data['address1'];
            $address->address2 = $data['address2'];
            $address->suburb = $data['suburb'];
            $address->state = $data['state'];
            $address->postcode = $data['postcode'];
            $address->country = $data['country'];
            $address->save();
            $address->just_now = date('Y-m-d h:i:s', time());

            // Dear User:  Please be aware this version of Login informs the client via AJAX JSON responses.
            //             If the client receives a successful 200 HTTP response (without errors) the CLIENT
            //             redirects the browser to the Client's account page.  We do it there,  not here.
            return Response::json($address);

            // $req::session()->flash('register_status', 'Successfully updated.');
            // $addresses = Address::all();
            // $user = User::findOrFail(Session::get('user_id'));
            // // self::console_log('variable $ addresses = ' . $addresses);
            // return view('user_account', [
            //     'addresses' => $addresses,
            //     'user' => $user,
            // ]);
            // return redirect('/account');
            // return;
        } else {
            $req
                ::session()
                ->flash(
                    'errorEditMessage',
                    'Unsuccessful.  User Record not found.'
                );
            // return view('user_account', ['addresses' => $addresses]);
            return redirect('/account');
            // return;
        }
    }

    public function deleteAddress()
    {
        if (!Session::get('user_id')) {
            //  Please Note:  You must have the Session namespace loaded at the top of this controller.
            die();
        }

        $address = Address::findOrFail(Request::input('id'));
        $address->delete();
        return Response::json($address);
    }
}
