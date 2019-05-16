<?php

namespace App\Http\Controllers\QA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class QAController extends Controller
{
    public function index()
    {
        $dnis = DB::connection('awscanvas')->select("SELECT id, dni FROM `silac_professors` limit 20");
        $flag = DB::connection('ie')->select("SELECT * 
                                            from `user`
                                            limit 8");
        
        dd($dnis);
    }
}
