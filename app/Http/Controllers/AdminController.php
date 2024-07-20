<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Ensure that the controller uses the auth middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Method to handle the admin dashboard view
    public function index()
    {
        return view('/admin/addUser');
    }
}
    // Add other methods for different admin panel pages if needed

//     public function addUser()
//     {
//         return view('admin.addUser');
//     }

//     public function addBeverage()
//     {
//         return view('admin.addBeverage');
//     }

//     public function addCategory()
//     {
//         return view('admin.addCategory');
//     }
//     public function editUser()
//     {
//         return view('admin.editUser');
//     }
//     public function editBeverage()
//     {
//         return view('admin.editBeverage');
//     } public function editCategory()
//     {
//         return view('admin.editCategory');
//     } public function messages()
//     {
//         return view('admin.messages');
//     } public function showmessage()
//     {
//         return view('admin.showmessage');
//     } public function users()
//     {
//         return view('admin.users');
//     } public function beverages()
//     {
//         return view('admin.beverages');
//     } public function categories()
//     {
//         return view('admin.categories');
//     }
// }
