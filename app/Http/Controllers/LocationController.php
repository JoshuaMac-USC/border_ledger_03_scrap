<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Location;


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
      $search = $request->search;

      if($search == ''){
         $locations = Location::orderby('border','asc')->select('id','border')->limit(5)->get();
      }else{
         $locations = Location::orderby('border','asc')->select('id','border')->where('border', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($locations as $location){
         $response[] = array(
              "id"=>$location->border,
              "text"=>$location->border
         );
      }

      echo json_encode($response);
      exit;
    }
}