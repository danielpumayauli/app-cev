<!DOCTYPE html>
<html lang="es">
    
<!-- Mirrored from byrushan.com/projects/material-admin/app/2.0/jquery/bs4/empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jul 2017 17:21:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hovercss/hover-min.css') }}">



        <!-- App styles -->
        <!-- <link rel="stylesheet" href="css/app.min.css"> -->
        
        

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        <style>

        </style>
        
    </head>

   <body style="background: url({{ asset('img/bg.jpg') }});
            background-size: cover;
            background-position: center center;">
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

            
            <section class="error">
        
                <div class="error__inner container-select-factory" style="padding: 50px;">
                    
                    <div class="card" style="margin-top: 50px;">
                        <div class="card-header">
                            <div style="width:100%; text-align:left">
                                <a href="/factory" class="btn btn-default btn--icon waves-effect"><i class="zmdi zmdi-arrow-back"></i></a>
                            </div>
                            <h2 class="card-title">Capacitaciones</h2>
                            <small class="card-subtitle">Estimado docente, registre sus datos a continuación:</small>
                            <p>Si no aparece su DNI dé clic aquí <button class="btn btn-secondary btn--icon-text waves-effect"><i class="zmdi zmdi-account-add"></i> Agregar DNI</button></p>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="DNI">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Apellidos y Nombres">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Programa">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Curso">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Modalidad">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Plataforma">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Herramienta/Proceso">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Responsable CEV">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Capacitación/Asesoría">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Fecha">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group borde-select">                              

                                        <input type="text" class="form-control form-control-lg" placeholder="Duración">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                
                                    <button id="filter" class="btn btn-primary waves-effect" type="button" onclick="">Registrar</button>
                                </div>


                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>


            <!-- <section class="content">
                <div class="content__inner">
                    

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Textual inputs</h2>
                            <small class="card-subtitle">Basic Textual inputs with different sizes by height and column.</small>
                        </div>

                        <div class="card-block">
                            

                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="col-sm-6">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="col-sm-6">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </section> -->
        </main>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/Waves/dist/waves.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>
        <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>

        
    </body>


</html>