<?php

namespace App\Http\Controllers\Admin;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::all();

        return view('backend.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Slider $slider)
    {
        $this->validate($request,[
            'slider'=>'required'
        ]);

        if($file =$request->file('slider')){
            //Get file original name//
$original_name=$file->getClientOriginalName();

            //Get just the file name
$filename=pathinfo($original_name,PATHINFO_FILENAME);

//Create new file name
$name=$filename.'_'.time().'.'.$file->getClientOriginalExtension();

            $destination='public/slider';
            $path=$request->slider->storeAs($destination,$name);
            $slider->slider=$name;
            $slider->save();
            return redirect('Admin/slider');

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
    public function edit(Slider $slider)
    {

        $arr['sliders']=$slider;
       return view('backend.slider.update')->with($arr);
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
       $slider=new Slider;
       $slider=$slider::find($id);
      
    
       if($file =$request->file('slider')){
        if(Storage::delete('public/slider/'.$slider->slider)){

            //Get file original name//
        
$original_name=$file->getClientOriginalName();

            //Get just the file name
$filename=pathinfo($original_name,PATHINFO_FILENAME);

//Create new file name
$name=$filename.'_'.time().'.'.$file->getClientOriginalExtension();

            $destination='public/slider';
            $path=$request->slider->storeAs($destination,$name);
            $slider->slider=$name;
            $slider->save();
            return redirect('Admin/slider');

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

        $slider=Slider::find($id);
        
        if(Storage::delete('public/slider/'.$slider->slider)){
            $slider->delete();
            return redirect('Admin/slider')->with('success','Photo Deleted');
        }
    }
}
