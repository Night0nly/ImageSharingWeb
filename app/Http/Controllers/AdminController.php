<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userInfo()
    {
        $users = User::orderBy('created_at','desc')->paginate(10);
//        $j = $users->take(10);
        return view('admin.userinfo')->with(['users'=>$users,'requestSave'=> null]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request)
    {
        $user = User::find((int)$request->input('userid'));
        $user->delete();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upRank(Request $request){
        $user = User::find((int)$request->input('userid'));
        $user->rank = 1;
        $user->save();
    }
    public function downRank(Request $request){
        $user = User::find((int)$request->input('userid'));
        $user->rank = 0;
        $user->save();
    }

    public function searchUser(Request $request)
    {
        Session::forget('message');
        $search = $request->input('searchUser');
        $n = User::whereNotIN('id',[Auth::user()->id])
            ->where('username', 'like', "%".$search."%")
            ->count();
        if($n < 1)
        {
            Session::flash('message', 'Not Found');
            return view('admin.userinfo');
        }
        else
        {
            $users = User::where('username', 'like', "%".$search."%")
                ->whereNotIN('id',[Auth::user()->id])
                ->paginate(10);
            $users->setPath('/searchuser');
            return view('admin.userinfo')->with(['users'=>$users,'requestSave'=>$search]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
