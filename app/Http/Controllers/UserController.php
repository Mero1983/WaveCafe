<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('users', compact('users'));
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
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8',],
        ], $messages);

        $fileName = $this->upload($request->image, 'assets/images');

        $data['image'] = $fileName;

        $data['active'] = isset($request->active);
        User::create($data);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('showUser', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user =User::findOrFail($id);
        return view('editUser', compact('user'));
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

        if($request->hasFile('image')){
            $fileName = $this->upload($request->image, 'assets/images');
            $data['image'] = $fileName;
            // Storage - unlink
        }
        
        $data['active'] = isset($request->active);
        User::where('id', $id)->update($data);
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
       User::where('id',$id)->delete();
        return redirect('users');
    }

    
   
   public function trash()
   {
       $trashed = User::onlyTrashed()->get();
       return view('trashUser', compact('trashed'));
   }

   /**
    * Restore.
    */
   public function restore(string $id)
   {
      User::where('id',$id)->restore();
       return redirect('users');
   }
    public function errMsg(){
        return [
            'UserName.required' => 'The user name is missed, please insert',
            'UserName.min' => 'length less than 5, please insert more chars',
        ];
    }
}
