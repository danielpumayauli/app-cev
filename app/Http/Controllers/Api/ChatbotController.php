<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChatbotController extends Controller
{
    /*
    * Parámetros:
    * $dni es el DNI del usuario en SILAC que debería estar en Canvas
    */

    public function users($dni = null)
    {   
        // Validacion
        if(is_null($dni)){
			$respuesta = array(
				'error' => true,
				'message' => 'Es necesario enviar el dni de usuario de Canvas.'
            );
            return Response::json($respuesta,404);
        }
            
        $data = DB::connection('awscanvas')->select("SELECT canvas_user_id, full_name
                                                        FROM canvas_users_usil
                                                        WHERE integration_id_DNI = '{$dni}'
                                                        LIMIT 1");
        if(!empty($data) ){
			$respuesta = array(
				'error' => false,
				'mensaje' => 'Consulta satisfactoria.',
				'data' => $data
			);
			return Response::json($respuesta);
		}else{
			$respuesta = array(
				'error' => true,
				'mensaje' => "El id del usuario con dni {$dni} no existe en Canvas.",
				'data' => null
			);
			return Response::json($respuesta,404);
		}

        return Response::json($respuesta);
    }

    /*
    * Parámetros:
    * $id es id de usuario de Canvas
    */

    public function courses($id = null)
    {
        // Validacion
        if(is_null($id)){
			$respuesta = array(
				'error' => true,
				'message' => 'Es necesario enviar el id de usuario de Canvas.'
            );
            return Response::json($respuesta,404);
        }

        $data = DB::connection('awscanvas')->select("SELECT c.canvas_course_id,c.long_name
                                                    FROM  canvas_users_usil u
                                                    LEFT JOIN canvas_enrollments_usil e ON e.canvas_user_id = u.canvas_user_id
                                                    INNER JOIN canvas_courses_usil c ON c.canvas_course_id = e.canvas_course_id
                                                    WHERE u.canvas_user_id = '{$id}' -- parametro de consulta
                                                    AND u.authentication_provider_id = '5' -- estudiantes que ingresan por Office365
                                                    AND c.status = 'active' -- estado de curso en canvas
                                                    AND (c.term_id = '10319'
                                                    OR c.term_id = '10766') -- periodo 2019-1 pregrado en canvas
                                                    GROUP BY u.canvas_user_id,e.canvas_course_id");
        
        if(!empty($data) ){
			$respuesta = array(
				'error' => false,
				'mensaje' => 'Consulta satisfactoria.',
				'data' => $data
			);
			return Response::json($respuesta);
		}else{
			$respuesta = array(
				'error' => true,
				'mensaje' => "No se encontraron cursos para el usuario con id {$id} en Canvas.",
				'data' => null
			);
			return Response::json($respuesta,404);
		}

        return Response::json($respuesta);
    }
}
