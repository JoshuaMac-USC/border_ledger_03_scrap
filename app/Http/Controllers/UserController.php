<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    public function index(){
        $person = User::paginate(20);
        return view('usermanage',['users' => $person]);
}
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/usermanage');
    }

    public function edit(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
            return view('profilesetting')->withUser($user);
            } else {
            return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request) {
        $user = User::find(Auth::user()->id);

        if($user){
            if(Auth::user()->email===$request['email']) {
                $validate = $request->validate([
                    'fname' => ['required', 'string', 'max:255'],
                    'lname' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'dob' => ['required', ],
                ]);
    
            } else {
                $validate = $request->validate([
                    'fname' => ['required', 'string', 'max:255'],
                    'lname' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'dob' => ['required'],
                ]);
    
            }
            
            $user->fname =$request['fname'];
            $user->lname =$request['lname'];
            $user->email =$request['email'];
            $user->dob =$request['dob'];
            $user->password = bcrypt($request->get('password'));

            $user->save();

            return redirect('/profilesetting');
         }else {
            return redirect()->back();
        }
    }
} 