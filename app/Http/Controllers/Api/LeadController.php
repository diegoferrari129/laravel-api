<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controller\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;
use App\Mail\NewContact;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $from_data = $request->all();

        $validator = Validator::make($form_data,[
            'name'=> ['required', 'max:25'],
            'surnamename'=> ['required', 'max:25'],
            'email'=> ['required', 'max:50'],
            'phone'=> ['required', 'max:15', 'min:10'],
            'content'=> ['required'],
        ],
        $errors = [
            'name.required' => 'Name is required',
            'name.max' => 'Max chacters: 25',

            'surame.required' => 'Surname is required',
            'surname.max' => 'Max chacters: 25',

            'email.required' => 'Email is required',
            'email.max' => 'Max chacters: 50',

            'phone.required' => 'Name is required',
            'phone.max' => 'Max numbers: 15',
            'phone.min' => 'Number length must be at least 10',

            'content.required' => 'Content is required',
        ]);

        if($validator->fails()){
            return response()->json([
                'succes' => false,
                'errors' =>$validator->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($from_data);

        $new_lead_>save();

        Mail::to('info@boolfolio.com')->send(new NewContact($new_lead));
        return response()->json([
            'succes' => true
        ]);
    }
}
