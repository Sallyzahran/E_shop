<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function store(){
        $data = $this->validate(\request(),[
            'name'  =>  'required',
            'email'  =>  'required|email',
            'subject'  =>  'required',
            'message'  =>  'required',
        ]);
        Contact::query()->create($data);
        return back()->withSuccess('The Message Has Sent Successfully ');
    }
}
