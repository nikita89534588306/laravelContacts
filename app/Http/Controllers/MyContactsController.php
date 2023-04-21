<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyContactsController extends Controller
{
    public function index(){
        
        $dataAllUsers = DB::table('people')            
            ->join('phones', 'people.id', '=', 'phones.person_id')
            ->select('people.name as name', 'people.surname as surname','phones.number as phone_number')
            ->get();

        return view('contacts.index')->with(['dataAllUsers' => $dataAllUsers]);
    }
    public function create(){ return view('contacts.create');}

    public function store(Request $req){ 
        $dataUser = DB::table('people')->insert([
            'name' => $req->name,
            'surname' => $req->surname
        ]);
        $idUser = DB::getPdo()->lastInsertId();

        DB::table('phones')->insert([
            "number" => $req->phone_number,
            "person_id" => $idUser
        ]);
        return redirect()->route('all_contacts');
    }
}
