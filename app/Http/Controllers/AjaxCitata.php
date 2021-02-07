<?php

namespace App\Http\Controllers;
use App\citata;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AjaxCitata extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=DB::table('citatas')->orderBy('created_at', 'desc')->paginate(10);
        return view('welcome',['tags'=>DB::table('tags')->get(), 'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCitat=new citata;
        $newCitat->author=$request->author;
        $newCitat->text=$request->text;
        $newCitat->tags=$request->tags;
        $newCitat->save();
       // DB::table('citatas')->insert($newCitat);
        //$res = citata::create(['author' => $request->author, 'text' => $request->text, 'tags'=>$request->tags]);

       // $data = ['author' => $request->author, 'text' => $request->text, 'tags'=>$request->tags];
       // echo'p[p[';
       //$data='op';
        return $newCitat;
    
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
