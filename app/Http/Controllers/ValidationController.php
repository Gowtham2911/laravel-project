<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class ValidationController extends Controller
{
    //
    public function _construct(User $user)
    {
        $this->user = $user;
    }

    public function registerValidation()
    {
        return view('register');
    }

    public function loginpage(){
        return view('login');
    }

    public function validateRegister(Request $request){
        $user= $this->validate($request,array(
                                      'name' => 'required|max:255',
                                      'email' => 'required|email|max:255',
                                      'password' => 'required|min:6',
                                      'confirm_password' => 'required|min:6'
              )
                              );
              
              
          
              
                User::create(array(
                              'name' => $request->name, 
                              'email' => $request->email,
                              'password' => bcrypt($request->password),
                              'confirm_password'=>bcrypt($request->password)
              ));

              $user = User::where('email',$request->email)->first();
              if(isset($user)){
                $details = new SendEmailJob($request->all());
            
                dispatch($details);
              return redirect('/login')->with('success','Registered Successfully');
            }
        }

        public function loginForm(Request $request){
                     
                     $var= $this->validate($request,[
                     'name' => 'required|max:30',
         
                     'password' => 'required|min:5'
                     ]);
         
                    $user = User::where('name',$request->name)->first();
                    if($user && Hash::check($request->password,$user->password)){
                        return redirect()->route('user.list')->with('success','Login Successfully' );
                    }
                     else{
                         return back()->with('error','Invalid Login Credentials');
                     }
         }
}
