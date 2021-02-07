<?php

namespace App\Http\Controllers;
use App\citata;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CitataController extends Controller
{
    //
    public function allCitats(){
        $data=DB::table('citatas')->orderBy('created_at', 'desc')->paginate(10)->withPath('/');
        $tags_array=[];
        foreach( $data as $key => $element)
        {
            array_push($tags_array,DB::select("select name from tags where id in ($element->tags)"));
        }
        
        return view('data',[ 'data'=>$data,'tags_array'=>json_encode($tags_array)]);

    }

}
