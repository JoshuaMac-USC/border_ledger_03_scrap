<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Border;
class LedgerController extends Controller
{
    public function index(){
        $person = Border::paginate(20);
        return view('ledgers.index',['ledgers' => $person]);
    }

    public function store(Request $request){

        $this->validate ($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'age' => ['required', 'int'],
            'id_number' => ['required', 'string', 'max:255'],
            'id_type' => ['required', 'string', 'max:255'],
            'mode_of_transpo' => ['required'],
            'vplatenum' => ['required', 'string', 'max:255'],
            'purpose' => 'required',
            'destination' => ['required', 'string', 'max:255'],
            'border_name' => 'required',
            'path' => 'required'
        ]);

        $person = new Border([
            $person->fname => $request->get('fname'),
            $person->lname => $request->get('lname'),
            $person->age => $request->get('age'),
            $person->id_number => $request->get('id_number'),    
            $person->id_type => $request->get('id_type'),
            $person->mode_of_transpo => $request->get('mode_of_transpo'),
            $person->vplatenum => $request->get('vplatenum'),
            $person->purpose => $request->get('purpose'),
            $person->destination => $request->get('destination'),
            $person->border_name => $request->get('border_name'),
            $person->path => $request->get('path')
        ]);

      
        
        $person->save();

        return redirect('/ledgers');
    }
}
