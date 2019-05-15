<?php

namespace App\Http\Controllers\Factory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FactoryController extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
        $openRecordings = DB::connection('awscanvas')->select("SELECT rec.id,rec.dni,rec.fullname,rec.date,rec.start_time,room.name as room FROM factory_recordings rec
                                                                INNER JOIN `factory_rooms`room ON room.id = rec.room
                                                                WHERE rec.state = 'open' ORDER BY rec.id ASC");
        $openTrainings = null;


        // dd($openRecordings);
        return view('factory/welcome',compact('openRecordings','openTrainings'));
    }
}
