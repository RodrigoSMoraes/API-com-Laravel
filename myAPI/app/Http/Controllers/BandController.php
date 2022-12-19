<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll(){

        $bands = $this->getBands();

        return response()->json([$bands]);

    }

    public function getById($id){

        $band = null;

        foreach($this->getBands() as $_band){
            if($_band['id'] ==  $id )
                $band = $_band;
        }

        return $band ? response()->json([$band]) : abort(code:404);

    }

    public function getBandsByGender($gender){

        $bands = [];

        foreach($this->getBands() as $_band){
            if($_band['gender'] ==  $gender)
                $bands = $_band;
        }

        return response()->json([$bands]);

    }

    public function store(Request $request){
        
        $validate = $request->validate([
            'name' => 'required|min:3'
        ]);

        return response()->json($request->all());
    }


    
    protected function getBands(){
        return[
            ['id' => 1, 'name' => 'legião urbana', 'gender'=>'rock nacional'],
            ['id' => 2, 'name' => 'iron maiden', 'gender'=>'heavy metal'],
            ['id' => 3, 'name' => 'alabama shakes', 'gender'=>'indie'],
            ['id' => 4, 'name' => 'sepultura', 'gender'=>'trash metal'],
            ['id' => 5, 'name' => 'pablo vittar', 'gender'=>'pop'],
            ['id' => 6, 'name' => 'frank aguiar', 'gender'=>'forró']
        ];
    }
}
