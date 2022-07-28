<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LockScreenRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockScreenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lockscreen()
    {
        session(['locked' => 'true']);
        return view('admin.lockprofile');
    }

    public function unlock(LockScreenRequest $request)
    {

        $password = $request->password;

        if(Hash::check($password, Auth::user()->password)){
            $request->session()->forget('locked');
            return redirect()->route("main.index");
        }

        return redirect()->back()->with('fail',__('alerts.Password does not match. Please try again.'));
    }
}
