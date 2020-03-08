<?php

namespace App\Http\Controllers;

use App\Preregister;
use Illuminate\Http\Request;

class PreregisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Preregister::get();
        dd($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Preregister.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $link =  $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'address' => '',
            'height' => '',
            'weight' => '',
            'school' => '',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone' => 'required',
            'address' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            
            $preregister2 = new Preregister();

            $request = $request->except(['_token']);

            foreach ($request as $key => $value) {
                $preregister2->$key = $value;
            }
            $preregister2->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preregister  $preregister
     * @return \Illuminate\Http\Response
     */
    public function show(Preregister $preregister)
    {
       dd($preregister);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preregister  $preregister
     * @return \Illuminate\Http\Response
     */
    public function edit(Preregister $preregister)
    {
        return view('Preregister.edit', ["preregister" => $preregister]);

    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preregister  $preregister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preregister $preregister)
    {
        $link =  $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'address' => '',
            'height' => '',
            'weight' => '',
            'school' => '',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone' => 'required',
            'address' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

            

            
        $data =Preregister::find($preregister["id"]);

        $request = $request->except(['_token']);
        
       
       
        $data->update($request);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preregister  $preregister
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preregister $preregister)
    {
        $data =Preregister::destroy($preregister["id"]);

    }
}
