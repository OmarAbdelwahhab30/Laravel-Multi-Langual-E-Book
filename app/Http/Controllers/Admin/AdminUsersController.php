<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewUser;
use App\Http\Requests\Admin\UpdateMyProfile;
use App\Models\Role_User;
use App\Models\User;
use App\Traits\FileUploaderTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{

    use FileUploaderTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //$users = User::where("id","!=",Auth::id())->paginate(3);

        //there is conflict between ids columns name  when joining so we alias
        $users = DB::table('users')->join('roles_users', function ($join)
        {
            $join->on('users.id', '=', 'roles_users.user_id')->where("users.id",'<>',Auth::id())->select("users.id as user_id");
        })->paginate(3);

        return view("admin.users")->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("admin.addnewuser");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNewUser $request)
    {
        $Image = !empty($request->img)? $this->ValidateFile($request->img,'UsersImages'):"user.png";
        $User = User::Insert([
           'username'   => $request->username ,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
            'img'      => $Image,
        ]);
        if ($User){
            $user = User::where('username',$request->username)->first();
            Role_User::create([
                'user_id'  => $user->id,
                'role_id'   => 2
            ]);
            return redirect()->back()->with("success",__('alerts.The User Has been Added Successfully'));
        }
        return redirect()->back()->with("fail",__('alerts.SomeThing Went Wrong ,try again later'));
    }

    /**
     * Display the specified resource.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * This is the function of Admin Edit profile
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view("admin.editprofile");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMyProfile $request, $id)
    {
        $user = User::find($id);

        $user->username = $request->input("username");

        $user->email = $request->input("email");

        $user->phone = $request->input("phone");

        if ($user->save()){
            return redirect()->back()->with('success', __('alerts.Your Data has been Updated successfully'));

        }else{
            return redirect()->back()->with("fail",__('alerts.SomeThing Went Wrong ,try again later'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->input('userid'));
        if ($user) {
            if ($user->delete()) {
                $this->DeleteFile($user->img,'UsersImages/');
                return redirect()->back()->with('success', __('alerts.The user has been deleted successfully'));
            }
        }
        return redirect()->back()->with("fail",__('alerts.SomeThing Went Wrong ,try again later'));
    }

    public function ChangeBanStatus($userid)
    {
        $user = User::find($userid);
        if ($user) {
            if ($user->ban == 0) {
                User::where("id",$userid)->update(
                    [
                        'ban' => 1,
                    ]);
            } elseif ($user->ban == 1) {
                User::where("id",$userid)->update(
                    [
                        'ban' => 0,
                    ]);
            }
        }
        return redirect()->back();
    }

    public function ChangeRole($userid)
    {
        $user = User::find($userid);
        if ($user){
            if ($user->role()->where(['user_id'=>$userid,'role_id'=>1])->exists()){
                $user->role()->detach(1);
            }else{

                $user->role()->attach(1);
            }
        }
        return redirect()->back()->with("success",__('alerts.The User Role has been changed Successfully'));
    }

}
