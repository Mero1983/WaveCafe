<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function addUser()
    {
        return view('admin.addUser');
    }

    public function addBeverage()
    {
        return view('admin.addBeverage');
    }

    public function addCategory()
    {
        return view('admin.addCategory');
    }
    public function editUser()
    {
        return view('admin.editUser');
    }
    public function editBeverage()
    {
        return view('admin.editBeverage');
    } public function editCategory()
    {
        return view('admin.editCategory');
    } public function messages()
    {
        return view('admin.messages');
    } public function showmessage()
    {
        return view('admin.showmessage');
    } public function users()
    {
        return view('admin.users');
    } public function beverages()
    {
        return view('admin.beverages');
    } public function categories()
    {
        return view('admin.categories');
    }
}
