<?php

namespace App\Http\Controllers\admin;
use App\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo=Logo::all();
        return view('backend.logo.index',compact('logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(Request $request,Logo $logo)
    {
        $this->validate($request,[
            'logo'=>'required'
        ]);
         if($file =$request->file('logo')){
            //Get file original name//
$original_name=$file->getClientOriginalName();

            //Get just the file name
$filename=pathinfo($original_name,PATHINFO_FILENAME);

//Create new file name
$name=$filename.'_'.time().'.'.$file->getClientOriginalExtension();

            $destination='public/logo';
            $path=$request->logo->storeAs($destination,$name);
            $logo->logo=$name;
            $logo->save();
            return redirect('Admin/logo');

        }
       
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
         $arr['logos']=$logo;
       return view('backend.logo.update')->with($arr);
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
        $logo=new Logo;
       $logo=$logo::find($id);
      
    
       if($file =$request->file('logo')){
        if(Storage::delete('public/logo/'.$logo->logo)){

            //Get file original name//
        
$original_name=$file->getClientOriginalName();

            //Get just the file name
$filename=pathinfo($original_name,PATHINFO_FILENAME);

//Create new file name
$name=$filename.'_'.time().'.'.$file->getClientOriginalExtension();

            $destination='public/logo';
            $path=$request->logo->storeAs($destination,$name);
            $logo->logo=$name;
            $logo->save();
            return redirect('Admin/logo');

        }
    }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $logo=Logo::find($id);
        
        if(Storage::delete('public/logo/'.$logo->logo)){
            $logo->delete();
            return redirect('Admin/logo')->with('success','Logo Deleted');
    }
    }
}
