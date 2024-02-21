<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return response()->json(User::all());
    }

    public function show($id){
        return response()->json(User::find($id));
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission =$request->permission;
        $user->balance = $request->balance;
                
        $user->save();
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission =$request->permission;
        $user->balance = $request->balance;
       
        $user->save();
    }

    public function destroy($id){
        User::find($id)->delete();
    }

    public function bejelentkezettKosara(){
        $user =Auth::user();
        $baskets=User::with('baskets')
        ->where('user_id','=',$user->id)
        ->get();
        return $baskets;
    }

    public function bejelentkezettTipusTermek($id, $type_id){
        $user =Auth::user();
        $list =DB::table('users as u')
        ->join('baskets as b','u.id','=','b.user_id')
        ->join('products as p','b.item_id','=','p.item_id')
        ->join('product_types as t','p.type_id','=','t.type_id')
        ->where('u.id',$id)
        ->where( 't.type_id',$type_id)
        ->get();
    }
}
