<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ url('bower/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('bower/moment/min/moment.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ url('bower/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ url('bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />

    {{-- Font-awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/177aa3b6ac.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm color-navbar">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ url('img/logo-movie.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(auth()->check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Modulos
                                </a>
                                
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if(auth()->user()->role == 1)
                                            <a class="dropdown-item" href="{{ url('/home') }}">Dashboard</a>
                                            <a class="dropdown-item" href="{{ url('/crear') }}">Crear función de cine</a>
                                        @endif
                                            <a class="dropdown-item" href="{{ url('/seleccionar') }}">Seleccionar función de cine</a>
                                    </div>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger btn-sm" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format : 'YYYY/MM/DD HH:mm:ss'
            });
        });
        //////////////////
        
        var map;
        var direccion_map = document.getElementById("direccion_map");
        var direccion = document.getElementById("direccion");
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 43.5293, lng: -5.6773},
            zoom: 13,
            });
            var marker = new google.maps.Marker({
            position: {lat: 43.542194, lng: -5.676875},
            map: map,
            title: 'Acuario de Gijón'
            });
            
            google.maps.event.addListener(map, 'click', function(event) {
                //latitud y longitud
                console.log(event.latLng.lat());
                console.log(event.latLng.lng());
                
                placeMarker(event.latLng);
            });

        function placeMarker(location) {

            var lat_lng = `${location.lat()},${location.lng()}`; 
           
            console.log(lat_lng);
            if (!marker || !marker.setPosition) {
            marker = new google.maps.Marker({
            position: location,
            map: map,
            });
            } else {
                marker.setPosition(location);
            }
            var geocoder = new google.maps.Geocoder;
            var infowindow = new google.maps.InfoWindow;
            geocodeLatLng(geocoder, map, infowindow,lat_lng);
        }

    }

    function geocodeLatLng(geocoder, map, infowindow, lat_lng) {
        var input = lat_lng;
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
                //obtener direccion
                direccion_map.value=results[0].formatted_address;
                direccion.value = results[0].formatted_address;
            } else {
              console.log('No results found');
            }
          } else {
            //window.alert('Geocoder failed due to: ' + status);
          }
        });
      }

    ///////////////FORMULARIO Y AJAX///////
    var frmCrearFuncion = document.getElementById("frmCrearFuncion");
    document.getElementById("guardar_funcion").addEventListener("click", function( event ) {
        // presentar la cuenta de clicks realizados sobre el elemento con id "prueba"
        if (confirm("¿Deseas crear la función?") == 1) {
            frmCrearFuncion.submit();
        }
        
    }, false);

    $(document).ready(function() {

        var idMovie ='';
        var idAsiento = '';

        $('body').on('click', '.selec_funcion', function(){
            $url = "info-funciones/"+$(this).attr('idMovie');
            idMovie = $(this).attr('idMovie');
            $.ajax({
                url: $url,
                success: function(respuesta) {
                    $('#info_boletos').load($url);
                    //console.log($(".selec_funcion").attr("idMovie"))
                },
                error: function() {
                    console.log("No se ha podido obtener la información");
                }
            });
        });

        //Asientos
        $('body').on('click', '.selec_asiento', function(){
            $url = "info-asientos/"+$(this).attr('idAsiento');
            idAsiento = $(this).attr('idAsiento');
            $.ajax({
                url: $url,
                success: function(respuesta) {
                    $('#info_asientos').load($url);
                    
                },
                error: function() {
                    console.log("No se ha podido obtener la información");
                }
            });
        });

        //
        $('body').on('click', '#guardar_asistencia', function(){
            $url = "guardar-asistencia";
        
            $.ajax({
                type:"POST",
                url: $url,
                data:{movieId:idMovie, seatId:idAsiento, "_token": $('#token').val()},
                success: function(respuesta) {
                    alert("Asistencia Guardada de forma correcta");
                    location.reload();
                    
                },
                error: function() {
                    console.log("No se ha podido obtener la información");
                }
            });
        });


        
    });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEsVicSEB-OMgHjVwdjaFi4KXYtWCOYgU&callback=initMap"></script>
    
</body>
</html>
