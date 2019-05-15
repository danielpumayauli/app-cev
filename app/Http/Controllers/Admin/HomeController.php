<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
        $categories = DB::connection('awscanvas')->select("SELECT * FROM factory_categories");
        $offices = DB::connection('awscanvas')->select("SELECT * FROM offices");
        $projects = DB::connection('awscanvas')->select("SELECT p.id,p.code,p.name,p.`description`,p.`requesting_dpt`,p.init_at,sp.name as state,c.name as category,o.`name` as office
                                                            FROM `factory_projects` p
                                                            INNER JOIN `factory_state_project` sp ON p.state_project_id = sp.id
                                                            INNER JOIN `factory_categories` c ON p.category_id = c.id
                                                            INNER JOIN offices o ON p.office_id = o.id");
        
        return view('admin/home',compact('categories','offices','projects'));
    }
}
