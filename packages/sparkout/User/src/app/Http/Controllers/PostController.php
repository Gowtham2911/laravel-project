<?php

namespace Sparkout\User\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sparkout\User\App\Models\UserPost;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    //create user
    public function index(){
        return view('user::create');
    }
    //store user
    public function store(Request $request){
      $request->validate([
          'name' => 'required',
          'email' => 'required|email'
      ]);

      UserPost::create([
          'name' => $request->name,
          'email' => $request->email
      ]);
      return redirect()->route('user.list')->with('success','User has been created');
    }

    public function list(){
         $users = UserPost::all();
         return view('user::list',compact('users'));
    }
    //edit user
    public function edit($id){
        $user = UserPost::find($id);
        return view('user::edit',compact('user'));
    }
    //update user
    public function update(Request $request,$id){
        $request->validate([
            'name'=> 'required',
            'email' => 'required|email'
            
        ]);
        $user = UserPost::find($id);
        $user->update([
         'name' => $request->name,
         'email' => $request->email
        ]);
        return redirect()->route('user.list')->with('success','User has been updated');
    }
       //delete user
    public function destroy($id){
        $user = UserPost::find($id);
        $user->delete();
        return redirect()->route('user.list')->with('success','User has been deleted');
    }

    public function file(){
        return view('user::file');
    }

    public function fileUpload(Request $request){
        $request->validate([
            'file' => 'required'
        ]);
        if ($files = $request->file('file')){
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
    
    
            return response()->json(['body'=>$fileName]);
  
        }
      
    }

    public function calculate($name){
         $response = Http::get('https://api.agify.io/',[
               'name' => $name 
         ]);
         return response()->json([
             'message' => $response->json()
         ]);
    }
}
