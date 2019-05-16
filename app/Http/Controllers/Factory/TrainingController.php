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

    public function store(Request $request)
    {   
        $data['error']    = 1;
        $data['msj']      = null;

        $dni = $request->input('dni');
        $fullname = $request->input('nombres');
        $course = $request->input('curso');
        $program = $request->input('program');
        $modality = $request->input('modalidad');

        $plataforma = $request->input('plataforma');
        $responsable = $request->input('responsable');
        $tool = $request->input('tool');
        $reason = $request->input('reason');
        $duration = $request->input('duration');
        $dateStart = $request->input('dateStart');

        try{
            $id = DB::connection('awscanvas')->table('factory_trainings')->insertGetId(
                array(  'dni' => $dni, 
                        'fullname' => $fullname,
                        'course' => $course,
                        'program' => $program,
                        'modality' => $modality,
                        'platform' => $plataforma,
                        'responsable' => $responsable,
                        'tool' => $tool,
                        'reason' => $reason,
                        'state' => 'done',
                        'duration' => $duration,
                        'date' => $dateStart,
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
