<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\controller\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/admin/addUser');
    }

    /**
     * Store a newly created resource in storage.
    //  */

    public function store(Request $request)
{
    $messages = $this->errMsg();

    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
    ], $messages);

    // Handle the active field
    $data['active'] = isset($request->active);
  

    // Create the user
    User::create($data);

    // Redirect to the users list with a success message
    return redirect('/admin/users')->with('success', 'User added successfully.');
}


//     /**
     //Show the form for editing the specified resource.
     
    public function edit(string $id)
    {
        $user =User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'name' => 'required|max:100|min:5',
            'username' => 'required|min:11',
            'email' => 'required|email:rfc',
            'password' => 'required',
        ], $messages);

       
        
        
        $data['active'] = isset($request->active);
        User::where('id', $id)->update($data);
        return redirect('/admin/users');
    }

    public function errMsg(){
        return [
            'UserName.required' => 'The user name is missed, please insert',
            'UserName.min' => 'length less than 5, please insert more chars',
        ];
    }
}
