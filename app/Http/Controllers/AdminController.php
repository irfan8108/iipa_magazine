<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	
    public function dashboard(){
        return view('admin.dashboard');
    }
    
    public function users(){
    	return view('admin.users');
    }

    public function addUser(){
    	return view('admin.addUser');
    }  

    public function userProfile(){
    	return view('admin.user-profile');
    } 


}
