<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class controllerRegister extends Controller
{
    public function handlerRegister(Request $request){
        $request->validate([
            'email' => 'required | email | unique:users',
            'password' => 'required | min : 8 | max : 32',
            'passwordAgain' => 'required | same:password',
            'name' => 'required | min : 3 | max : 32',
            'level' => 'required | numeric'
        ], [
            'email.required' => 'You must enter an email',
            'email.email' => 'Email invalidate',
            'email.unique' => 'This email is already taken',
            'password.required' => 'You must enter a password',
            'password.min' => 'Password must be more than 8 characters',
            'password.max' => 'Password must be less than 32 characters',
            'passwordAgain.required' => 'You must enter your password again',
            'passwordAgain.same' => 'The password again and the password must be the same',
            'name.required' => 'You must enter your name',
            'name.min' => 'Name must be more than 8 characters',
            'name.max' => 'Name must be less than 32 characters',
            'level.numeric' => 'You must select position',
            'level.required' => 'You must select position'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();
 
            return redirect('/admin/login')->with('status', 'Congratulations on your successful registration');
        
            

    }
}
