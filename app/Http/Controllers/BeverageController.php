<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beverage;
use App\Traits\UploadFile;
class BeverageController extends Controller

{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beverages = Beverage::get();
        return view('/admin/beverages', compact('beverage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/admin/addBeverage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'content' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255',],
            'price' => ['required', 'integer'],
            'category' => ['required', 'string', 'min:8'],
        ], $messages);

        $fileName = $this->upload($request->image, 'assets/images');

        $data['image'] = $fileName;

    
        // Handle the checkbox field
        $data['published'] = isset($request->published);
        $data['special'] = isset($request->special);
        Beverage::create($data);
        return redirect('/admin/beverages');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $beverage =Beverage::findOrFail($id);
        return view('/admin/editBeverage', compact('beverage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'content' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'image' => 'sometimes|image' ,  
              'category' => ['required', 'string'],
        ], $messages);


        if($request->hasFile('image')){
            $fileName = $this->upload($request->image, 'assets/images');
            $data['image'] = $fileName;
        }
    
        // Handle the checkbox field
        $data['published'] = isset($request->published);
        $data['special'] = isset($request->special);
        Beverage::where('id', $id)->update($data);
        return redirect('/admin/beverages');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        {
            $id = $request->id;
            Beverage::where('id',$id)->delete();
            return redirect('/admin/beverages');
        }
    }
    public function errMsg(){
        return [
            'category.required' => 'The categoryis missed, please choose',
        ];
    }

    
    // public function upload(Request $request){
    //     $file_extension = $request->photo->getClientOriginalExtension();
    //     $file_name = time() . '.' . $file_extension;
    //     $path = 'images';
    //     $request->photo->move($path, $file_name);
    //     return 'Uploaded';
    //     }
}
