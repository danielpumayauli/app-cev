<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /* Función que retorna datos informativos  
        a ser consumidor por chatBot Service */

    public function index()
    {
        $result = array();
        $data['test_data']['users'] = 'https://contenidoscev.usil.edu.pe/shared/chatbot/dataset/cpel20191/users.csv';
        $data['test_data']['courses'] = 'https://contenidoscev.usil.edu.pe/shared/chatbot/dataset/cpel20191/courses.csv';
        $data['test_data']['enrollments'] = 'https://contenidoscev.usil.edu.pe/shared/chatbot/dataset/cpel20191/enrollments.csv';
        $data['video_tutorial'] = 'https://contenidoscev.usil.edu.pe/videos/CHEFS/recetas/ADOBOS/CL_Adobos_Adobo_de_cerdo.mp4';
        $data['frequent_questions'] = '';
        $data['social'] = 'https://facebook.com/usilfanpage';
        $result[] = $data;

        return Response::json($result);
    }
}
