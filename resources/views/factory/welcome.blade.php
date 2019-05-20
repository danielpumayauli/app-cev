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
        <link rel="stylesheet" href="{{ asset('css/animate/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hovercss/hover-min.css') }}">
        
        

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        <style>
        .factory_options a{
            font-size: 1.5em;
            margin-top: 10px;
            padding: 1em;
        }
        </style>
        
    </head>

   <body style="background: url({{ asset('img/bg.jpg') }});
            background-size: cover;
            background-position: center center;">
    <!-- <section style="border: 1px solid red">
        <p>logo</p>
    </section> -->
    <section class="">
        
        <div class="error__inner" style="background: rgba(255, 255, 255, 0.8); padding: 50px; max-width: 950px; margin: auto;">
            <h2>Bienvenido a Digital Learning Factory <span style="font-size:14px"><a href="/factory/reportes" target="_blank">Ver reportes</a></span></h2>
            <h3>Seleccione un evento:</h3>

            <div class="row factory_options">
                <div class="col-md-4">
                    <a href="/factory/grabaciones" class="hvr-border-fade">GRABACIONES</a>
                </div>
                <div class="col-md-4">
                    <a href="/factory/capacitaciones" class="hvr-border-fade">CAPACITACIONES</a>
                </div>
                <div class="col-md-4">
                    <a href="/factory/eventos" class="hvr-border-fade" disabled>EVENTOS</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div id="contTabla" class="table-responsive">
                    <table id="data-table" class="table table-bordered" style="text-align: left">
                        <thead class="thead-default">
                            <tr>
                                <th style="width:250px; text-align: ">DNI</th>
                                <th style="width:1500px;text-align: ">NOMBRE DEL DOCENTE</th>
                                <th style="width:250px;">SALA</th>
                                <th >ESTADO</th>
                                <th style="width:800px;">HORA INICIO</th>
                                <th>TERMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($openRecordings as $openRecording)
                            <tr>                                
                                <th>{{$openRecording->dni}}</th>
                                <th>{{$openRecording->fullname}}</th>
                                <th>{{$openRecording->room}}</th>
                                <th>ABIERTO</th>
                                <th><strong>{{$openRecording->start_time}}</strong>  {{$openRecording->date}}</th>
                                <th><button id="btnFinish{{ $openRecording->id }}" class="btn btn-info" data-record="{{ $openRecording->id }}" onclick="finishRecording(this)">Terminar</button></th>
                            </tr>
                        
                        @endforeach
                            
                        </tbody>
                    </table>                            
                </div>
            </div>
            <!-- <h1>404</h1>
            <h2>The page you were looking for doesn't exist!</h2>
            <p>Donec in ex eget orci facilisis gravida vitae ut tortor. In tempus lacus ac dui iaculis, placerat tempus diam vehiculaed suscipit tortor id lorem mollis</p> -->
        </div>
    </section>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/Waves/dist/waves.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>
        <script src="{{ asset('bower_components/notify/pnotify.custom.min.js') }}"></script>

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
            function finishRecording(element){
                let idRecord = $(element).attr('data-record');
                console.log(idRecord);

                 $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type:'POST',
                        url: '/factory/endRecording/'+idRecord,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success:function(data){
                            data = JSON.parse(data);
                            console.log('ok!', 'se pudo terminar la grabacion<br>',data);
                            mostrarNotificacion('success','Grabación terminada, se cambió a estado "Terminado".', '');
                            setTimeout("location.href='/factory'", 1500);
                        },
                        error: function(jqXHR, text, error){
                            alert('No se pudo Añadir los datos<br>' + error);
                        }
                    });
            }
        </script>
        
    </body>


</html>