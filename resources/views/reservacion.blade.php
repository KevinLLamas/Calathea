@extends('app')
@section('content')
<div id="reservacion" v-cloak>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- End Hero -->
    <section id="about" class="about">
        <img src="{{asset('assets/img/calathea/BANNER.png')}}" class="img-fluid" alt="">
    </section>
    <section id="about" class="about">
        
    </section>
    <main id="main">
        <!-- ======= Cliens Section ======= -->
        <section id="cliens" class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/calathea/Grupo 2087.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/img/calathea/Trazado 27181.png')}}" class="img-fluid" alt="">
                </div>
            </div>
            
        </section>
        <section id="cliens" class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                    <button hidden type="button" id="btn_abrir_modal_mover" class="btn btn-primary" data-toggle="modal" data-target="#moverReservacion">Cambiar</button>
                    <button hidden type="button" id="btn_abrir_modal_editar" class="btn btn-primary" data-toggle="modal" data-target="#editarReservacion">Cambiar</button>
                    <button hidden type="button" id="btn_abrir_modal" class="btn btn-primary" data-toggle="modal" data-target="#agregarReservacion">Cambiar</button>
                    <div id="calendar"></div>  
                </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="titulo">Fecha: </label>
                            <input type="text" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha de la reservacion" v-model="reservacion.fecha" readonly>
                            <label for="titulo">Nombre Cliente: </label>
                            <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Nombre persona que reserva" v-model="reservacion.nombre_persona">
                            <label for="titulo">Correo Cliente: </label>
                            <input type="text" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo persona que reserva" v-model="reservacion.correo">
                            <label for="titulo">Paquete: </label>
                            <select class="form-control" name="" id="" v-model="reservacion.id_paquete">
                                <option value="" disabled selected="selected">Elija un paquete</option>
                                <option value="1">Paquete 1 Lunes y Martes</option>
                                <option value="2">Paquete 2 Miercoles y Jueves</option>
                                <option value="3">Paquete 3 Viernes</option>
                                <option value="4">Paquete 4 Sabado</option>
                                <option value="5">Paquete 5 Domingo</option>
                            </select>
                        </div>
                    </div>
                    </div>
                </div>
        </section>
        <section id="cliens" class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/calathea/lets_party.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/img/calathea/girl_cake.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->
</div>
<script src="{{asset('/vue/reservacion.js')}}"></script>
@endsection