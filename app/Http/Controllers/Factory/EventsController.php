<?php

namespace App\Http\Controllers\Factory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function index()
    {
        $dnis = DB::connection('awscanvas')->select("SELECT id, dni FROM `silac_professors`");
        $resources = DB::connection('awscanvas')->select("SELECT id, name FROM `factory_educational_resources`");
        $rooms = DB::connection('awscanvas')->select("SELECT * FROM factory_rooms");
        
        return view('factory/events/register',compact('dnis','resources','rooms'));
        
    }

    public function store(Request $request)
    {   
        $data['error']    = 1;
        $data['msj']      = null;

        $dni = ($request->input('dni') == 0 ? null : $request->input('dni'));
        $fullname = $request->input('nombres');
        $room = ($request->input('room') == 0 ? null : $request->input('room'));
        $event = $request->input('event');

        try{
            $id = DB::connection('awscanvas')->table('factory_events')->insertGetId(
                array(  'dni' => $dni, 
                        'fullname' => $fullname,
                        'room' => $room,
                        'description' => $event,
                        'created_at' => new \DateTime(),
                        )
            );
            $data['id'] = $id;
            $data['error']    = 0;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }

        echo json_encode($data);
    }
}
