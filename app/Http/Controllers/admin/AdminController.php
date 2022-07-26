<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;


class AdminController extends Controller
{

    public function show(){

        return view('admin.index');

    }
    public function index(){

       $items = Admin::all();
        return view('admin.admin.index',compact('items'));

    }

    public function create(){

        return view('admin.admin.create');
    }

    public function store(Request  $request){

       $this->validate($request,[
            'name' => 'required',
            'code' => 'required|unique:admins,code',
            'password' => 'required',

       ]);


       $data = $request->only('name','code');
       $data['password'] = Hash::make($request->get('password'));
       Admin::query()->create($data);
       return redirect()->route('admins.index');

    }

    public function edit($id){

        $item = Admin::query()->find($id);
         return view('admin.admin.edit',compact('item'));

     }

     public function update(Request  $request,$id){

        $this->validate($request,[
             'name' => 'required',
             'code' => 'required|unique:admins,code',


        ]);


        $data = $request->only('name','code');
        if($request->has('password') and $request->get('password'))
        $data['password'] = Hash::make($request->get('password'));
        Admin::query()->find($id)->update($data);
        return redirect()->route('admins.index');

     }

     public function destroy($id){
         Admin::query()->find($id)->delete();
       return redirect()->route('admins.index');
     }



}
