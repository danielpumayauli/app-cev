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
        .borde-select-danger {
            border-bottom: 1px solid salmon;
        }
        .progress {
            cursor: progress;
        }
 
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
        
                <div class="error__inner" style="padding: 50px; max-width: 800px;">
                    <form id="form-event" enctype="multipart/form-data">
                        {{csrf_field()}}
                    
                        <div class="card" style="margin-top: 50px;">
                            <div class="card-header">
                                <div style="width:100%; text-align:left">
                                    <a href="/factory" class="btn btn-primary btn--icon waves-effect"><i class="zmdi zmdi-arrow-back"></i></a>
                                </div>
                                <h2 class="card-title">Eventos</h2>                            
                                <small class="card-subtitle">Estimado docente, registre sus datos a continuación:</small>
                                <!-- <p>Si no aparece su DNI dé clic aquí <button class="btn btn-secondary btn--icon-text waves-effect" disabled><i class="zmdi zmdi-account-add"></i> Agregar DNI</button></p> -->
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-6 col-md-12">
                                        <div class="form-group borde-select">                              

                                            <label for="dni">DNI</label>
                                            <select id="dni" name="dni" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" onchange="changeFullName()">
                                                <option value="0">:: SELECCIONE DNI ::</option>
                                                @foreach( $dnis as $dni)
                                                <option value="{{ $dni->dni}}">{{ $dni->dni}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group borde-select-danger">    
                                            <input type="text" id="nombres" name="nombres" class="form-control form-control-lg" placeholder="Apellidos y Nombres">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>

                                   

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group borde-select">
                                            <label id="lblRoom" for="room" style="display:none;">SELECCIONE LA SALA</label>
                                            <select id="room" name="room" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required >
                                                <option value="0">:: SELECCIONE LA SALA ::</option>
                                                @foreach( $rooms as $room)
                                                <option value="{{ $room->id}}">{{ $room->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group borde-select-danger">
                                            <input id="event" name="event" type="text" class="form-control form-control-lg" placeholder="Evento">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>

                                    

                                    <div class="col-sm-12 col-md-12">
                                    
                                        <button type="submit" id="registerEvent" name="registerEvent" class="btn btn-primary btn-round" type="button">Registrar</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    
                    </form>
                </div>
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
        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('js/Utils.js') }}"></script>
        <script>
            function changeFullName(){
                let dni = $.trim($('#dni').val());


                if(dni != 0){
                    $.ajax({
                    type    :   'GET',
                    'url'   :   '/factory/grabaciones/getFullNameForm',
                    data    :   {   dni     : dni},
                    'async' :   false
                    })
                    .done(function(data){
                        let datos    =   JSON.parse(data);

                        if(datos.error == 0){
                            $('#nombres').val(datos.information[0].name).trigger('chosen:updated');
                                                        
                        }else{                            
                            mostrarNotificacion('error','Hubo problemas, vuelva a intentarlo. '+datos.error, '');
                        }
                    });
                }else{
                    // console.log('debera llenar un campo adicional dni');
                }
            }

            $('#form-event').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                formData.append('_token', $('input[name=_token]').val());
                let dni = $('#dni').val();	  
                let nombres = $('#nombres').val();
                let room = $('#room').val();
                let event = $('#event').val();

                console.log(dni,nombres,room,event);
                
                if( nombres != '' ){
                    if( event != '' ){
                            console.log('enviando');
                            $.ajax({
                                type:'POST',
                                url: '/factory/eventos/guardar',
                                data:formData,
                                cache:false,
                                contentType: false,
                                processData: false,
                                success:function(data){
                                    data = JSON.parse(data);
                                    mostrarNotificacion('success','Evento registrado.', '');
                                    setTimeout("location.href='/factory'", 1500);
                                },
                                error: function(jqXHR, text, error){
                                    alert('No se pudo Añadir los datos<br>' + error);
                                }
                            });
                        
                    }else{
                        mostrarNotificacion('error','Por favor, registre el nombre del evento.', '');
                    }

                        

                        
                    
                }else{
                    mostrarNotificacion('error','Por favor, registre los nombres de la persona.', '');
                }

                
            });

            (function getTimeNow(){
                
                let now = new Date();
                let day = ("0" + now.getDate()).slice(-2);
                let month = ("0" + (now.getMonth() + 1)).slice(-2);
                let today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                let h = (now.getHours().toString().length < 2) ? '0'+now.getHours() : now.getHours();
                let m = (now.getMinutes().toString().length < 2) ? '0'+now.getMinutes() : now.getMinutes();
                let s = (now.getSeconds().toString().length < 2) ? '0'+now.getSeconds() : now.getSeconds();
                
                $("#dateStart").val(today);
               
            })();
        </script>

        
    </body>


</html>