@extends('app')
@section('content')
<div id="reservacion" v-cloak>  
    
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
                <div class="col-md-6 float-right">
                    <img src="{{asset('assets/img/calathea/Trazado 27181.png')}}" class="w-25" alt="">
                </div>
            </div>
            
        </section>
        <input type="hidden" value="{{$fecha}}" name="fecha" id="fecha">
        <input type="hidden" value="{{$paquete}}" name="paquete" id="paquete">
        <section id="cliens" class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container border border-secondary rounded-lg shadow">
                        <button type="button" id="btn_cambio_fecha" class="btn btn-primary" data-toggle="modal" v-on:click="cambiarFecha()" hidden></button>
                        <div id="calendar"></div>  
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row border border-secondary rounded-lg shadow">
                        <div class="form-group col-12 mt-3">
                            <label for="titulo">Fecha: </label>
                            <input type="text" class="form-control rounded mb-4" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha de la reservacion" v-model="reservacion.fecha" readonly>
                            <label for="titulo">Nombre Cliente: </label>
                            <input type="text" class="form-control rounded mb-4" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Nombre persona que reserva" v-model="reservacion.nombre_persona">
                            <label for="titulo">Correo Cliente: </label>
                            <input type="text" class="form-control rounded mb-4" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo persona que reserva" v-model="reservacion.correo">
                            <label for="titulo">Paquete: </label>
                            <select class="form-control" name="" id="paquete_edit" v-model="reservacion.id_paquete">
                                <option value="" disabled selected="selected">Elija un paquete</option>
                                <option v-for="paquete in paquetes" v-bind:value="paquete.id">Paquete N°@{{paquete.numero_paquete}}; Horario @{{paquete.horas}} Costo: @{{paquete.costo}}</option>
                            </select>
                            <button type="button" class="mt-3 btn btn-danger btn-block" v-on:click="guardarReservacion()">RESERVAR</button>
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