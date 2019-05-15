<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['error']    = 1;
        $data['msj']      = null;

        $nameProject = $request->input('nameProject');
        $descriptionProject = $request->input('descriptionProject');
        $categoryProject = $request->input('categoryProject');
        $applicant = $request->input('applicant');
        $responsableProject = $request->input('responsableProject');
        $dateStart = $request->input('dateStart');
        $dateEnd = $request->input('dateEnd');

        try{
            $id = DB::connection('awscanvas')->table('factory_projects')->insertGetId(
                array(  'code' => 'CEV'.str_random(5), 
                        'name' => $nameProject,
                        'description' => $descriptionProject,
                        'requesting_dpt' => $applicant,
                        'category_id' => $categoryProject,
                        'state_project_id' => 1,
                        'office_id' => $responsableProject,
                        'created_at' => new \DateTime(),
                        'init_at' => $dateStart,
                        'estimated_finished_at' => $dateEnd
                    )
            );
            $data['id'] = $id;
            $data['error']    = 0;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }

        echo json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codeProject)
    {
        $project = DB::connection('awscanvas')->select("SELECT p.id,p.code,p.name,p.`description`,p.`requesting_dpt`,p.init_at,sp.name as state,c.name as category,o.`name` as office
                                                        FROM `factory_projects` p
                                                        INNER JOIN `factory_state_project` sp ON p.state_project_id = sp.id
                                                        INNER JOIN `factory_categories` c ON p.category_id = c.id
                                                        INNER JOIN offices o ON p.office_id = o.id
                                                        WHERE p.code = '{$codeProject}'");
        $categories = DB::connection('awscanvas')->select("SELECT * FROM factory_categories");
        $offices = DB::connection('awscanvas')->select("SELECT * FROM offices");
        $projects = DB::connection('awscanvas')->select("SELECT p.id,p.code,p.name,p.`description`,p.`requesting_dpt`,p.init_at,sp.name as state,c.name as category,o.`name` as office
                                                            FROM `factory_projects` p
                                                            INNER JOIN `factory_state_project` sp ON p.state_project_id = sp.id
                                                            INNER JOIN `factory_categories` c ON p.category_id = c.id
                                                            INNER JOIN offices o ON p.office_id = o.id");
        return view('admin/project',compact('categories','offices','projects','project'));

        // dd($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
