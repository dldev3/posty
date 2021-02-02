<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
      //if user is in guest session only show the login route
  		$this->middleware(['guest']);
  	}

    public function index() {
      return view('auth.login');
    }

    public function store(Request $request) {

      $remember = $request->has('remember');

      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
      ]);

      if(!auth()->attempt($request->only('email', 'password'), $remember)){
        return back()->with('status', 'Invalid Login details');
      }

      return redirect()->route('dashboard');


    }

}
