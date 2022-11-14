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
        <input type="hidden" value="{{$fecha}}" name="fecha" id="fecha">
        <input type="hidden" value="{{$nombre}}" name="nombre" id="nombre">
        <input type="hidden" value="{{$correo}}" name="correo" id="correo">
        <input type="hidden" value="{{$paquete}}" name="paquete" id="paquete">
        <input type="hidden" value="{{$horario}}" name="horario" id="horario">
        <section id="cliens" class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container border border-secondary rounded-lg">
                        <button type="button" id="btn_cambio_fecha" class="btn btn-primary" data-toggle="modal" v-on:click="cambiarFecha()" hidden></button>
                        <div id="calendar"></div>  
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row border border-secondary rounded-lg">
                        <div class="form-group col-12">
                            <label for="titulo">Fecha: </label>
                            <input type="text" class="form-control rounded mb-4" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha de la reservacion" v-model="reservacion.fecha" readonly>
                            <label for="titulo">Nombre Cliente: </label>
                            <input type="text" class="form-control rounded mb-4" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Nombre persona que reserva" v-model="reservacion.nombre_persona">
                            <label for="titulo">Correo Cliente: </label>
                            <input type="text" class="form-control rounded mb-4" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo persona que reserva" v-model="reservacion.correo">
                            <label for="titulo">Paquete: </label>
                            <select v-if="reservacion.paquete != ''"class="form-control rounded mb-4" name="" id="" v-model="reservacion.paquete">
                                <option disabled>Elija un paquete</option>
                                <option value="1">Paquete 1 Lunes y Martes</option>
                                <option value="2">Paquete 2 Miercoles y Jueves</option>
                                <option value="3">Paquete 3 Viernes</option>
                                <option value="4">Paquete 4 Sabado</option>
                                <option value="5">Paquete 5 Domingo</option>
                            </select>
                            <label for="titulo">Horario: </label>
                            <select v-if="reservacion.horario != ''"class="form-control rounded mb-4" name="" id="" v-model="reservacion.horario">
                                <option disabled>Horario</option>
                                <option value="matutino">9:00 a 14:00 hrs</option>
                                <option value="vespertino">14:00 a 19:00 hrs</option>
                            </select>
                            <button type="button" class="mt-3 btn btn-warning btn-block" v-on:click="guardarReservacion()">RESERVAR</button>
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