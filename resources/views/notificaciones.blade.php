@extends('apppanel')
@section('content')
<div id="notificaciones" v-cloak style="background: #FFF8F3;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('assets/css/fonts.css')}}" rel="stylesheet">
    <main id="main">
        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    
                    <a class="nav-link text-white my-1 mt-4" href="/panel">
                        <i class="fa fa-home"></i>
                        <span class="menu-title">AGENDA</span>
                    </a>
                    <a class="nav-link text-white my-1" href="/notificaciones">
                        <i class="fa fa-bell"></i>
                        <span class="menu-title">NOTIFICACIONES</span>
                    </a>
                    <a class="nav-link text-white my-1" href="/logout">
                        <i class="fa fa-sign-out"></i>
                        <span class="menu-title">CERRAR SESIÓN</span>
                    </a>
                </ul>
            </div>
        </div>
        <section id="cliens" class="container">
            <div class="container">
                <button type="button" id="btn_abrir_modal_mover" class="btn btn-primary" data-toggle="modal" data-target="#moverReservacion" hidden>Cambiar</button>
                <button type="button" id="btn_abrir_modal_editar" class="btn btn-primary" data-toggle="modal" data-target="#editarReservacion" hidden>Cambiar</button>
                <button type="button" id="btn_abrir_modal" class="btn btn-primary" data-toggle="modal" data-target="#agregarReservacion" hidden>Cambiar</button>
                <br><br><br><br>
                <div class="card text-left border rounded-lg shadow mt-5" style="border-radius: 1.5rem!important;">
                  <div class="card-body text-center">
                        <h3>Noficiaciones</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Mensaje</th>
                                    <th>Correo</th>
                                    <th>fecha</th>
                                    <th>Confirmada</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="notificacion in notificaciones">
                                <td class="text-secondary">@{{notificacion.id}}</td>
                                <td class="text-secondary">@{{notificacion.mensaje}}</td>
                                <td class="text-secondary">@{{notificacion.reservacion.correo}}</td>
                                <td class="text-secondary">@{{notificacion.reservacion.fecha}}</td>
                                <td class="text-secondary">@{{notificacion.reservacion.es_confirmada}}</td>
                                <td class="text-secondary"><a name="" id="" class="btn btn-primary" href="#" role="button">Ver</a></td>
                            </tr>
                            </tbody>
                        </table>
                  </div>
                </div>
            </div>
        </section>
    </main>
</div>
<script src="{{asset('/vue/notificaciones.js')}}"></script>
@endsection