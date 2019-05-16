<?php

namespace App\Http\Controllers\Factory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function __construct()
    {}
    
    public function index()
    {
        $dnis = DB::connection('awscanvas')->select("SELECT id, dni FROM `silac_professors`");
        $resources = DB::connection('awscanvas')->select("SELECT id, name FROM `factory_educational_resources`");
        $rooms = DB::connection('awscanvas')->select("SELECT * FROM factory_rooms");
        
        return view('factory/training/register',compact('dnis','resources','rooms'));
    }
}
