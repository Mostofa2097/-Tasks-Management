<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagory_list = catagory::where('created_by',Auth::id())->get();

        return view("catagory.index",compact("catagory_list"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catagory.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            
        ]);

        $catagory = new Catagory();
        $catagory->name= $request->name;
        $catagory->created_by = Auth::id();
        $catagory->save();

        return redirect("/catagories");
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
    public function edit($id)
    {
        $cat = catagory::where('created_by',Auth::id())->find($id);
        if($cat){
          return view("catagory.edit",compact("cat"));
        }
        return redirect()->back();
        
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
        $cat = catagory::where('created_by',Auth::id())->find($id);
      if($cat){
        $cat->name = $request->name;
        $cat->save();
      }
      return redirect("/catagories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cat = catagory::where('created_by',Auth::id())->find($id);
      if($cat){
        $cat->delete();
      }
      return redirect("/catagories");
    }
}
