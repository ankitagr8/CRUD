<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
class UserController extends Controller
{
    public function index()
    {
        $data=DB::table('students')->get();
        return view('signup',compact('data'));
    }

    public function demo(Request $request)
    {
        $validator=Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required',
        'gender'=>'required',
        'qualification'=>'required',

        ]);

        if(!$validator->passes()){
            return response()->json(["status"=>0,"error"=>$validator->errors()->toArray()]);
        }

        $name=$request->input('name');
        $email=$request->input('email');
        $gender=$request->input('gender');
        $qualification=implode(",",$request->input('qualification'));

        if($file=$request->file('pic'))
        {
            $pic=time().'-'.$file->getClientOriginalName();
            $file->move(public_path().'/image/',$pic);
        }
        DB::table('students')->insert([
        "name"=>$name,
        "email"=>$email,
        "gender"=>$gender,
        "qualification"=>$qualification,
        "pic"=>$pic,
        ]);

        return "success";
        
    }

    public function edit($id)
    {
        $data=DB::table('students')->where('id',$id)->first();
        return view('edit',compact('data'));
    }

    public function update(Request $request)
    {

            
        
        $name=$request->input('name');
        $email=$request->input('email');
        $gender=$request->input('gender');
        $qualification=implode(",", $request->input('qualification'));
        $id=$request->input('id');

        DB::table('students')->where('id',$id)->update([
         "name"=>$name,
         "email"=>$email,
         "gender"=>$gender,
         "qualification"=>$qualification,
        ]);

        return "update successfully";

    }
}
