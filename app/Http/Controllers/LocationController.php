<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;


class LocationController extends Controller
{
    /**
     * Show the application layout.
     *
     * @return \Illuminate\Http\Response
     */
    public function layout()
    {
    	return view('test');
    }


    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAjax(Request $request)
    {
        $data = [];
        $search = $request->search;

        if($request->has('q')){ //If user types show similar data to what he is typing
            $search = $request->q;
            $data = DB::table("locations")
            		->select("id","border")
            		->where('border','LIKE',"%$search%")
            		->get();
        }else{ //If user will not type anything show first 5 from DB
            $data = DB::table("locations")
            ->select("id","border")
            ->limit(5)
            ->get();
        }


        return response()->json($data);
    }
}