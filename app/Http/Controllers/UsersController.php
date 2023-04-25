<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function getAgents()
    {
        $users = User::all();
        $roles = Role::all();
        return Inertia::render('Agents/Index',[
            'users' => $users,
            'roles' => $roles
        ]);
    }


    public function storeUser(Request $request)
    {
        if(request()->hasFile('picture')){
            $file =  $request->file('picture');
            $string =   Str::random(4);
            $fileName = $file->getClientOriginalName();
            $fileExt = $file->getClientOriginalExtension();
            $savedFile =  $request->file('picture')->storeAs('/images/users',$fileName);
            $pathToBeSaved = 'images/users/'.time().$string.'.'.$fileExt;
        }

        $user = User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            'name' => $request->first_name.' '.$request->last_name, 
            "email" => $request->email,
            "password" => $request->password,
            "state" => $request->state,
            "country" => $request->country,
            "contact" => $request->contact,
            "city" => $request->city,
            "other_info" => $request->other_info,
            'picture' => $pathToBeSaved,
        ]);


        $user->assignRole($request->role_id);

        dd('Done');






    }



}
