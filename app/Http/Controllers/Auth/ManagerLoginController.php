<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerLoginController extends Controller {
    public function login() {
        return view('manager.login');
    }

    public function processLogin(Request $request) {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8', // confirmed will check for xxx_confirmation, So your request should have password_confirmation for this to pass
        ]);

        $credentials = $request->except(['_token']);
        if(Auth::guard('manager')->attempt($credentials)) {
            return redirect(RouteServiceProvider::MANAGER);
        }
        return redirect()->action([
            ManagerLoginController::class,
            'login'
        ])->with('message', 'Credentials not found in our records!');
    }
}
