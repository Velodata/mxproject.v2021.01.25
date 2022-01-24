<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Validator;
use Response;
use App\Models\Address;
use View;

class AddressController extends Controller
{
    protected $rulesAdd = [
        'address1' => 'required|regex:/^[a-z A-Z 0-9]+$/u',
        'suburb' => 'required|regex:/^[a-z A-Z 0-9]+$/u',
        'state' => 'required|regex:/^[a-z A-Z 0-9]+$/u',
        'postcode' => 'numeric|required',
        'country' => 'required|regex:/^[a-z A-Z 0-9]+$/u',
        // 'mobile' => 'numeric|required|digits:10',
    ];
    public function addNewAddress(Request $request)
    {
        $data = $request::input();
        $validator = Validator::make(Request::all(), $this->rulesAdd);
        if ($validator->fails()) {
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
}
