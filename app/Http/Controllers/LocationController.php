<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller{

   public function index(){
      return view('test');
   }

   /*
   AJAX request
   */
   public function getLocations(Request $request){

      $search = $request->search;

      if($search == ''){
         $location = Location::orderby('border','dsc')->select('id','border')->limit(5)->get();
      }else{
         $location = Location::orderby('border','dsc')->select('id','border')->where('border', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($locations as $location){
         $response[] = array(
              "id"=>$location->id,
              "text"=>$location->border
         );
      }

      echo json_encode($response);
      exit;
   }
}
