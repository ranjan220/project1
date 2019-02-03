<?php

namespace App\Http\Controllers\Admin;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team=Team::all();

        return view('backend.team.index',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Team $team)
    {

            
        $this->validate($request,['team'=>'required']);
        if($file=$request->file('team')){
            //Get file original name();
            $original_name=$file->getClientOriginalName();
             //Get just the file name
$filename=pathinfo($original_name,PATHINFO_FILENAME);

//Create new file name
$name=$filename.'_'.time().'.'.$file->getClientOriginalExtension();

            $destination='public/team';
            $path=$request->team->storeAs($destination,$name);
             $name  = $request->name;
           $position = $request->position;
            $content=$request->content;
           
            
            $team->position = $position;
            $team->content=$content;
             $team->save();
            return redirect('Admin/team');

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
    public function edit(Team $team)
    {

          $arr['teams']=$team;
       return view('backend.team.update')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $team)
    {
        
        
     $teams=Team::find($team);
      
    
       if($file =$request->file('image')){
        
            //Get file original name//
        
$original_name=$file->getClientOriginalName();

            //Get just the file name
$filename=pathinfo($original_name,PATHINFO_FILENAME);

//Create new file name
$name=$filename.'_'.time().'.'.$file->getClientOriginalExtension();

           $destination='public/team';
            $path=$request->team->storeAs($destination,$name);
             $name  = $request->name;
           $position = $request->position;
            $content=$request->content;
           
          
            $team->position = $position;
            $team->content=$content;
             $team->save();
            return redirect('Admin/team');

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
        $team=Team::find($id);
        
        if(Storage::delete('public/team/'.$team->team)){
            $team->delete();
            return redirect('Admin/team')->with('success','Photo Deleted');
        } 
    }
}
