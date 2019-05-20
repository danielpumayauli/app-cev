<!DOCTYPE html>
<html lang="es">
    
<!-- Mirrored from byrushan.com/projects/material-admin/app/2.0/jquery/bs4/empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jul 2017 17:21:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/notify/pnotify.custom.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/flatpickr/dist/flatpickr.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('bower_components/nouislider/distribute/nouislider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hovercss/hover-min.css') }}">
      

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        <style>
        .container-select-factory a{
            font-size: 1.5em;
            margin-top: 10px;
            padding: 1em;
        }
        .select2-dropdown {
              z-index: 100000;
              border: 1px solid darkgray;
        }
        .borde-select {
            border-bottom: 1px solid darkgray;
        }
        .progress {
            cursor: progress;
        }
 
        </style>
        
    </head>

   <body data-ma-theme="indigo">
    <!-- <section style="border: 1px solid red">
        <p>logo</p>
    </section> -->
 

    <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header">
                

                <div class="header__logo hidden-sm-down">
                    <h1><a href="/factory">DIGITAL LEARNING FACTORY</a></h1>
                </div>

                

                <ul class="top-nav">
                    <li ><a href="/factory" ><i class="zmdi zmdi-arrow-back" style="font-size: 1.1rem;"></i> INICIO</a></li>
                    
                    <!-- <li class="dropdown hidden-xs-down">
                        <a href="#" data-toggle="dropdown"><i class="zmdi zmdi-power"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            
                            <a href="#" class="dropdown-item">Editar contraseña</a>
                            <a href="#" class="dropdown-item">Salir</a>
                        </div>
                    </li> -->
                    
                </ul>
            </header>

            
            

            <section class="content content--full" style="background: lightgrey">
                <div class="row">
                    <!-- <div class="col-md-6" style="background: rgba(255, 255, 255, 0.8);">
                        
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-header">
                                            <h2 class="card-title">Reportes</h2>
                                        </div>

                                        <div class="card-block">
                                            <div id="recordingsTable" class="table-responsive">
                                                                      
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            
                                        
                        </div>

                    </div> -->
                    <div class="col-md-8" style="background: rgba(255, 255, 255, 0.8);">
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-header">
                                            <h2 class="card-title">Grabaciones</h2>
                                        </div>

                                        <div class="card-block">
                                            <div id="projectsTable" class="table-responsive">
                                                <table id="data-table" class="table table-bordered" style="text-align: left; font-size: 10px;">
                                                    <thead class="thead-default">
                                                        <tr>
                                                            <!-- <th style="width:250px; text-align: ">#</th> -->
                                                            <th style="width:1500px;text-align: ">FECHA</th>
                                                            <th style="width:1500px;text-align: ">DNI</th>
                                                            <th style="width:250px;">NOMBRE Y APELLIDO</th>
                                                            <th >CURSO</th>
                                                            <th >PROGRAMA</th>
                                                            <th >ESTADO</th>
                                                            <th style="width:800px;">SALA</th>
                                                            <th>RECURSO</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($recordings as $recording)
                                                        <tr>                                
                                                            <!-- <th>ID</th> -->
                                                            <th><a href="#">{{$recording->created_at}}</a></th>
                                                            <th>{{$recording->dni}}</th>
                                                            <th>{{$recording->fullname}}</th>
                                                            <th>{{($recording->course != null ? $recording->course : 'CURSO NO ESPECIFICADO')}}</th>
                                                            <th>{{($recording->program != null ? $recording->program : 'PROGRAMA NO ESPECIFICADO')}}</th>
                                                            <th>{{($recording->state == 'closed' ? 'Cerrado' : 'Abierto')}}</th>
                                                            <th>{{$recording->room}}</th>
                                                            <th>{{($recording->resourc != null ? $recording->resourc :'Recurso no especificado')}}</th>
                                                        </tr>
                                                    
                                                    @endforeach
                                                        
                                                    </tbody>
                                                </table>                            
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            
                                        
                        </div>
                    </div>
                </div>
                

                <!-- <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">xxx</h2>
                        <small class="card-subtitle">xxx</small>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem perspiciatis molestias assumenda tempora maxime magnam quisquam iure. Sit reprehenderit sequi quia. Voluptate expedita ut eligendi vero! Ea iste dolore reiciendis?</p>
                    </div>

                    <div class="card-block">

                    </div>
                </div> -->

                
            </section>
        </main>


        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/Waves/dist/waves.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>
        <script src="{{ asset('bower_components/notify/pnotify.custom.min.js') }}"></script>
        <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('bower_components/flatpickr/dist/flatpickr.min.js') }}"></script>
        <script src="{{ asset('bower_components/nouislider/distribute/nouislider.min.js') }}"></script>

        <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('bower_components/jszip/dist/jszip.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>

        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('js/Utils.js') }}"></script>
        <script>

            function showProyectForm(){
                console.log('run modal');
            }

            $('#formAddProject').on('submit', function(e) {
                e.preventDefault();
                
                let nameProject = $('#nameProject').val();
                let descriptionProject = $('#descriptionProject').val();
                let applicant = $('#applicant').val();
                let categoryProject = $('#categoryProject').val();
                let responsableProject = $('#responsableProject').val();
                let dateStart = $('#dateStart').val();
                let dateEnd = $('#dateEnd').val();

                console.log(nameProject);

                if( nameProject != '' && 
                    categoryProject != 0 && 
                    applicant != '' && 
                    responsableProject != 0 &&
                    dateStart != '' &&
                    dateEnd != ''){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type    :   'POST',
                            'url'   :   '/admin/addNewProject',
                            data    :   {nameProject : nameProject,
                                        descriptionProject: descriptionProject,
                                        applicant   :   applicant,
                                        categoryProject :   categoryProject,
                                        responsableProject  :   responsableProject,
                                        dateStart   :   dateStart,
                                        dateEnd :   dateEnd},
                            'async' :   false
                            })
                            .done(function(data){
                                let datos    =   JSON.parse(data);

                                console.log(datos);

                                if(datos.error == 0){
                                    // $('#nombres').val(datos.information[0].name).trigger('chosen:updated');
                                    // $('#curso').html(datos.listaCourses);
                                    // $('#curso').val('').trigger('chosen:updated');
                                    // $('#lblCurso').show();
                                    // $("#curso").removeAttr("disabled", true);
                                    mostrarNotificacion('success','Proyecto creado', '');
                                    setTimeout("location.href='/admin'", 1200);
                                    
                                }else{                            
                                    mostrarNotificacion('error','Hubo problemas, vuelva a intentarlo. '+datos.error, '');
                                }
                            });
                }else{
                    mostrarNotificacion('error','Seleccione una sala.', '');
                }
            });

            (function getTimeNow(){
                
                let now = new Date();
                let day = ("0" + now.getDate()).slice(-2);
                let dayAdd5 = ("0" + now.getDate()+5).slice(-2);
                let month = ("0" + (now.getMonth() + 1)).slice(-2);

                console.log(Number(day)+5);

                let h = (now.getHours().toString().length < 2) ? '0'+now.getHours() : now.getHours();
                let m = (now.getMinutes().toString().length < 2) ? '0'+now.getMinutes() : now.getMinutes();
                let s = (now.getSeconds().toString().length < 2) ? '0'+now.getSeconds() : now.getSeconds();
                
                $("#dateStart").val(now.getFullYear()+"-"+(month)+"-"+(day));
                $("#dateEnd").val(now.getFullYear()+"-"+(month)+"-"+(Number(day)+5));

                // $("#timeStart").val(h+':'+m+':'+s);
               
            })();
        </script>

        
    
    
    
    
    
    
    
    
    </body>


</html>