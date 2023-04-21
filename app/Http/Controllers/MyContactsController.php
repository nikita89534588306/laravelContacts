<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class MyContactsController extends Controller
{
    public function index(){
        
        $dataAllUsers = Person::query()            
            ->join('phones', 'people.id', '=', 'phones.person_id')
            ->select('people.name as name', 'people.surname as surname','phones.number as phone_number','people.id as id')
            ->get();

        return view('contacts.index')->with(['dataAllUsers' => $dataAllUsers]);
    }
    public function create(){ return view('contacts.create');}

    public function store(Request $req){ 

        $dataUser = Person::query()->insert([
            'name' => $req->name,
            'surname' => $req->surname
        ]);
        $idUser = DB::getPdo()->lastInsertId();
        
        Phones::query()->insert([
            "number" => $req->phone_number,
            "person_id" => $idUser
        ]);

        return redirect()->route('all_contacts');
    }

    public function show($idUser){

        $dataUser = Person::query()
            ->join('phones', 'people.id', '=', 'phones.person_id')
            ->select('people.name as name', 'people.surname as surname','phones.number as phone_number')
            ->where("people.id", '=', $idUser)
            ->first();

        if(empty($dataUser)) abort(404);

        return view("contacts.show")->with(['dataUser'=>$dataUser]);

    }
}
