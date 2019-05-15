<?php

namespace App\Http\Controllers\Factory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RecordingController extends Controller
{
    public function __construct()
    {}
    
    public function index()
    {
        // $items = DB::select("SELECT * 
        // from `canvas_courses_usil`
        // limit 10");

        $dnis = DB::connection('awscanvas')->select("SELECT id, dni FROM `silac_professors`");
        $resources = DB::connection('awscanvas')->select("SELECT id, name FROM `factory_educational_resources`");
        $rooms = DB::connection('awscanvas')->select("SELECT * FROM factory_rooms");
        
        return view('factory/recording/register',compact('dnis','resources','rooms'));
    }

    public function getFullNameForm(Request $request)
    {
        $html = '<option value="0" >OTRO CURSO</option>';
        $data['error']    = 2;
        $data['msj']      = null;
        $data['cabecera'] = null;

        try{
            $information = DB::connection('awscanvas')->select("SELECT id,cpersona,name FROM silac_professors WHERE dni = '{$request->dni}'");
            $data['information'] = $information;
            $data['error'] = 1;

        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
            
        }finally{
            if($data['error'] == 1){
                try{
                    $courses = DB::connection('awscanvas')->select("SELECT sc.id, sc.curso
                                                                    FROM `silac_professor_courses`sdc
                                                                    LEFT JOIN `silac_courses` sc ON sc.id = sdc.curso_id
                                                                    WHERE docente_id = (SELECT id FROM `silac_professors`
                                                                    WHERE dni = '{$request->dni}')");
                    // $data['courses'] = $courses;
    
                    foreach ($courses as $course) {
                        $html .= '<option value="'.$course->curso.'" >'.$course->curso.'</option>';                    
                    }
                    $data['listaCourses'] = $html;
                    $data['error'] = 0;
                }catch(Exception $e){
                    $data['msj'] .= '<br>'.$e->getMessage();
                }
            }
        }

        // echo json_encode(array_map('utf8_encode', $html));
        echo json_encode($data);
    }

    public function getProgramForm(Request $request)
    {
        $html = '';
        $data['error']    = 1;
        $data['msj']      = null;
        $data['cabecera'] = null;

        try{
            $informationProgram = DB::connection('awscanvas')->select("SELECT id,programa FROM `silac_courses`
                                                                        WHERE curso = '{$request->courseSelected}' LIMIT 1");
            $data['error']    = 0;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }finally{
            if($informationProgram){
                $data['program'] = $informationProgram;
            }else{
                $data['program'] = null;
            }
        }
        echo json_encode($data);
    }

    public function store(Request $request)
    {
        $data['error']    = 1;
        $data['msj']      = null;

        $dni = $request->input('dni');
        $nombres = $request->input('nombres');
        $curso = $request->input('curso');
        $program = $request->input('program');
        $resource = $request->input('resource');
        $week = $request->input('week');
        $room = $request->input('room');
        $dateStart = $request->input('dateStart');
        $timeStart = $request->input('timeStart');

        try{
            $id = DB::connection('awscanvas')->table('factory_recordings')->insertGetId(
                array('dni' => $dni, 
                        'fullname' => $nombres,
                        'course' => $curso,
                        'program' => $program,
                        'resource' => $resource,
                        'week' => $week,
                        'room' => $room,
                        'date' => $dateStart,
                        'start_time' => $timeStart,
                        'created_at' => new \DateTime(),
                        'state' => 'open')
            );
            $data['id'] = $id;
            $data['error']    = 0;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }

        echo json_encode($data);
    }

    public function endRecording($idRecord)
    {
        $data['error']    = 1;
        $data['msj']      = null;
        try{
            DB::connection('awscanvas')->table('factory_recordings')->where('id', $idRecord)
                  ->update(['state' => 'closed',
                            'finished_at' => new \DateTime(),]);
            $data['error']    = 0;
        }catch(Exception $e){
            $data['msj']      = $e->getMessage();
        }
        echo json_encode($data);
    }
}
