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
}
