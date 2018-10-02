<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Http\Middleware\CheckUserPermission;

class UsersController extends Controller
{
    public function __construct(){

        $this->middleware('permisson',['only'=>['edit','update']]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        // return $user;
     //return view('users.show',['user'=>$user]);

    return view('users.show',compact('user'));
       // return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


       // if( intval($id) !== Auth::id()){
       //  abort(403,'brak dostępu');
       // }
       $user=Auth::user();
        return view('users.edit',compact('user'));
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
         // if( intval($id) !== Auth::id()){
         // abort(403,'brak dostępu');
         // }

        // $validator=Validator::make($request->all(),[
        //     'name'=>'required',
        // ]);

        // if($validator->fails()){
        //     return back()->withErrors($validator)->withInput();
        // }
        $this->validate($request, [
            'name'=>'required|min:3',
            'email'=>[
                'required',
                'email',
                'min:5',
                Rule::unique('users')->ignore($id),
            ],
         ],[
            'required'=>'Pole jest wymagane',
            'email'=>'Adres email jest niepoprawny',
            'unique'=>'Inny uzytkownik ma juz taki adres email',
         ]);

         $user=User::findOrFail($id);
         $user->name=$request->name;
         $user->email=$request->email;
         $user->sex=$request->sex;
         if($request->file('avatar')){
            
            $user_avatar_path='public/users/'.$id.'/avatars';
            $uploaded_path=$request->file('avatar')->store($user_avatar_path);
            $avatar_filename=str_replace($user_avatar_path.'/','', $uploaded_path);
            $user->avatar=$avatar_filename;
         }
         $user->save();
        return back();
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
