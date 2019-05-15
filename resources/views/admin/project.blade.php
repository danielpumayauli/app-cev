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
                    <li ><a onclick="showProyectForm()" data-toggle="modal" data-target="#modal-project"><i class="zmdi zmdi-plus-circle-o" style="font-size: 1.1rem;"></i> NUEVO PROYECTO</a></li>
                    
                    <li class="dropdown hidden-xs-down">
                        <a href="#" data-toggle="dropdown"><i class="zmdi zmdi-power"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            
                            <a href="#" class="dropdown-item">Editar contraseña</a>
                            <a href="#" class="dropdown-item">Salir</a>
                        </div>
                    </li>
                    
                </ul>
            </header>

            
            
            
            <section class="content content--full" style="background: lightgrey">
                <!-- <div style="width:100%;background:pink">
                    <button>terminar</button>
                </div> -->
                <div class="row">
                    
                    <div class="col-md-6">
                        
                        <header class="" style="margin-top:">
                            <h1>{{$project[0]->name}} <button class="btn btn-danger " style="right:0">terminar</button></h1>
                                
                           
                        </header>

                    </div>
                </div>
                


                
            </section>
        </main>

        <!-- Modal Project -->
        <div class="modal fade" id="modal-project" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pull-left">Nuevo proyecto</h5>
                    </div>
                    <form id="formAddProject" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            
                            <br>
                            
                            <div class="row">
                            
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input id="nameProject" name="nameProject" type="text" class="form-control form-control-lg" placeholder="NOMBRE DE PROYECTO" required>
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <div class="form-group borde-select">                              

                                        <input id="descriptionProject" name="descriptionProject" type="text" class="form-control form-control-lg" placeholder="DESCRIPCIÓN">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-12">
                                    <div class="form-group borde-select">                              

                                        <input id="applicant" name="applicant" type="text" class="form-control form-control-lg" placeholder="ÁREA SOLICITANTE" required>
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-6">                                    
                                    <div class="form-group form-group--select borde-select">
                                        <div class="select">
                                            <select id="categoryProject" name="categoryProject" class="form-control">
                                                <option value="0">::Seleccione una categoría::</option>
                                                @foreach($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{$categorie->name}}</option>
                                                @endforeach                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group form-group--select borde-select">
                                        <select id="responsableProject" name="responsableProject" class="form-control">
                                            <option value="0">:: Seleccione un responsable::</option>
                                            @foreach($offices as $office)
                                            <option value="{{ $office->id }}">{{$office->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group" >
                                    <label id="" for="" >FECHA DE INICIO</label>
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                            <div class="form-group borde-select">
                                                <input id="dateStart" name="dateStart" type="text" class="form-control date-picker">
                                                <i class="form-group__bar"></i>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group" >
                                    <label id="" for="" >FECHA FINAL <strong>ESTIMADA</strong></label>
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                            <div class="form-group borde-select">
                                                <input id="dateEnd" name="dateEnd" type="text" class="form-control date-picker">
                                                <i class="form-group__bar"></i>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">GUARDAR</button>
                            <button type="button" class="btn btn-link" data-dismiss="modal">CERRAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


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