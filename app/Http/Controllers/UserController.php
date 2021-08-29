<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use App\HTTP\Requests\UserAddValidation;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;

    }
    public function show($id){
        $user=User::find($id);
        return $user;
    }
    public function delete(User $id){
        $id->delete();
        $messasge='Deleted Successfully';
        return $messasge;

    }
    public function update(UserAddValidation $request, $id){

        //dd($request);
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();
        return $user;

    }
    public function deleteAll(Request $request)
    {

        $ids = $request->ids;
        $id=DB::table("users")->whereIn('id',explode(",",$ids));
        $id->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }

}
