<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAgents()
    {
        $users = User::all();
        dd($users); 
    }
}