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
        <div id="cliens" class="container-fluid">
        
            <div class="row mb-5 pt-0">
                <div class="col-md-8 px-0 pt-0">
                    <img src="{{asset('assets/img/calathea/Grupo 2087.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-3 mt-2 ">
                    <img src="{{asset('assets/img/calathea/Trazado 27181.png')}}" class="w-50 float-right mr-3" alt="">
                </div>
            </div>
            <button type="button" id="btn_llamar_paqueteDia" class="btn btn-primary" v-on:click="getPaquetesDia()" hidden></button>
        </div>
        <input type="hidden" value="{{$fecha}}" name="fecha" id="fecha">
        <input type="hidden" value="{{$paquete}}" name="paquete" id="paquete">
        <div id="cliens" class="container-fluid">
            <div class="row mx-5">
                <div class="col-md-8">
                    <div class="container border border-secondary rounded-lg shadow mr-5">
                        <button type="button" id="btn_cambio_fecha" class="btn btn-primary" data-toggle="modal" v-on:click="cambiarFecha()" hidden></button>
                        <div id="calendar" class="mt-3"></div>  
                        
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="row border border-secondary rounded-lg shadow ml-5">
                        <div class="form-group col-12 mt-3">
                            <label for="titulo">Fecha: </label>
                            <input type="text" class="form-control rounded mb-4 border-secondary" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha de la reservacion" v-model="reservacion.fecha" readonly>
                            <label for="titulo">Paquete: </label>
                            <select v-if="p != ''" class="form-control border-secondary mb-4" name="" id="paquete_edit"  @change="getPaquete" v-model="reservacion.paquete">
                                <option value="" disabled selected="selected">Elija un paquete</option>
                                <option v-for="paquete in paquetes" v-bind:value="paquete.id">Paquete N°@{{paquete.numero_paquete}}; Horario @{{paquete.horas}}</option>
                            </select>
                            <label for="titulo">Nombre Cliente: </label>
                            <input type="text" class="form-control rounded mb-4 border-secondary" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Nombre persona que reserva" v-model="reservacion.nombre_persona">
                            <label for="titulo">Correo Cliente: </label>
                            <input type="text" class="form-control rounded mb-4 border-secondary" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo persona que reserva" v-model="reservacion.correo">
                            <div v-if="paquete_sel != ''" class="container border border-secondary rounded mb-4">
                                <label for="titulo">RESERVACIÓN: </label>
                                <label for="precio">5500 MXN</label>
                                <br>
                                <label for="titulo">TOTAL: </label>
                                <label for="precio">@{{paquete_sel.costo}} MXN</label>
                            </div>
                            <button type="button" class="mt-5 btn btn-danger btn-block" v-on:click="guardarReservacion()">RESERVAR</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <h4>Políticas de cancelación:</h4>
                    <p>
                        Cancelación sin costo 15 días antes de la fecha del evento 
                        <br>
                        Rembolso del 50% por cancelación 7 días antes de la fecha del evento
                    </p>
                </div>
            </div>
        </div>
        <section id="cliens" class="container-fluid my-5">
            <div class="row">
                <div class="col-md-8 px-0">
                    <img src="{{asset('assets/img/calathea/Grupo 2087.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-md-5 px-0">
                    <img src="{{asset('assets/img/calathea/derecha.png')}}" class="img-fluid w-50" alt="">
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-4 px-0">
                    <img src="{{asset('assets/img/calathea/derecha.png')}}" class="img-fluid " alt="">
                </div>
            </div>
        </section>
        @include('mapa')
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->
</div>
<script src="{{asset('/vue/reservacion.js')}}"></script>
@endsection