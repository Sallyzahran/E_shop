<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){

        $items = Tag::all();
         return view('admin.tag.index',compact('items'));

     }

     public function create(){

         return view('admin.tag.create');
     }

     public function store(Request  $request){

        $this->validate($request,[
             'title_en' => 'required',
             'title_ar' => 'required',


        ]);


        $data = $request->only('title_en','title_ar');

        Tag::query()->create($data);
        return redirect()->route('tags.index');

     }

     public function edit($id){

         $item = Tag::query()->find($id);
          return view('admin.tag.edit',compact('item'));

      }

      public function update(Request  $request,$id){

         $this->validate($request,[
            'title_en' => 'required',
            'title_ar' => 'required',


         ]);


         $data = $request->only('title_en','title_ar');

         Tag::query()->find($id)->update($data);
         return redirect()->route('tags.index');

      }

      public function destroy($id){
        Tag::query()->find($id)->delete();
          return redirect()->route('tags.index');
         }
}
