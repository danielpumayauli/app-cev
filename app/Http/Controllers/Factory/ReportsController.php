<?php

namespace App\Http\Controllers\Factory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        $categories = DB::connection('awscanvas')->select("SELECT * FROM factory_categories");
        $offices = DB::connection('awscanvas')->select("SELECT * FROM offices");
        $recordings = DB::connection('awscanvas')->select("SELECT fr.created_at,fr.id,fr.dni,fr.fullname,fr.course,fr.program,fr.state,room.`name` as room,res.`name` as resourc
        from `factory_recordings` fr
        inner join `factory_rooms` room on room.id = fr.`room`
        left join `factory_educational_resources` res on res.`id` = fr.`resource`
        ORDER BY created_at desc");
        // dd($recordings);
        
        return view('admin/reports',compact('categories','offices','recordings'));
    }
}
