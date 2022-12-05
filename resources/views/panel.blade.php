@extends('apppanel')
@section('content')
<div id="panel" v-cloak style="background: #FFF8F3;">
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <main id="main">
    <div id="wrapper">

<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        
        <li>
            <a class="fa fa-home" style="color:#FFFFFF;" href="http://127.0.0.1:8000/panel">AGENDA</a>
        </li>
        <li>
        <a class="fa fa-bell" style="color:#FFFFFF;" href="http://127.0.0.1:8000/panel">NOTIFICACIONES</a>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->


</div>
<!-- /#wrapper -->
        <section id="cliens" class="container">
            <label id="label_id" hidden></label>
            <button type="button" id="btn_llamar_llenar" class="btn btn-primary" v-on:click="llenarReservacion()" hidden>Mover</button>
            <button type="button" id="btn_llamar_disponible" class="btn btn-primary" v-on:click="checkDisponible()" hidden>Mover</button>
            <button type="button" id="btn_llamar_limpiar" class="btn btn-primary" v-on:click="limpiar()" hidden></button>
            <button type="button" id="btn_llamar_paqueteDia" class="btn btn-primary" v-on:click="getPaquetesDia()" hidden></button>
            
            <div class="container">
                <button type="button" id="btn_abrir_modal_mover" class="btn btn-primary" data-toggle="modal" data-target="#moverReservacion" hidden>Cambiar</button>
                <button type="button" id="btn_abrir_modal_editar" class="btn btn-primary" data-toggle="modal" data-target="#editarReservacion" hidden>Cambiar</button>
                <button type="button" id="btn_abrir_modal" class="btn btn-primary" data-toggle="modal" data-target="#agregarReservacion" hidden>Cambiar</button>
                <br><br><br><br>
                <div class="card text-left border rounded-lg shadow mt-5" style="border-radius: 1.5rem!important;">
                  <img class="card-img-top" src="holder.js/100px180/" alt="">
                  <div class="card-body">
                    <div id="calendar"></div> 
                  </div>
                </div>
                 
            </div>
            <div class="modal fade" id="agregarReservacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Reservacion</h5>
                                <button id="btn_cerrar_modalpermiso" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="titulo">Fecha: </label>
                                        <input type="text" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha de la reservacion" v-model="reservacion.fecha" readonly>
                                        <label for="titulo">Nombre Cliente: </label>
                                        <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Nombre persona que reserva" v-model="reservacion.nombre_persona">
                                        <label for="titulo">Correo Cliente: </label>
                                        <input type="text" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo persona que reserva" v-model="reservacion.correo">
                                        <label for="titulo">Paquete: </label>
                                        <select class="form-control" name="" id="paquete_edit" v-model="reservacion.id_paquete">
                                            <option value="" disabled selected="selected">Elija un paquete</option>
                                            <option v-for="paquete in paquetes" v-bind:value="paquete.id">Paquete N°@{{paquete.numero_paquete}}; Horario @{{paquete.horas}} Costo: @{{paquete.costo}}</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button id="btn_cerrar_modal_agregar" type="button" class="btn btn-secondary" v-on:click="limpiar()" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" v-on:click="guardarReservacion()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>    
            <div class="modal fade" id="moverReservacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mover Reservacion</h5>
                                <button id="btn_cerrar_modalmover" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="titulo">Fecha: </label>
                                        <input type="text" class="form-control" name="fecha" id="fecha_move" aria-describedby="helpId" placeholder="Fecha de la reservacion" v-model="reservacion.fecha" readonly>
                                        <label for="titulo">Nombre Cliente: </label>
                                        <input type="text" class="form-control" name="titulo" id="titulo_move" aria-describedby="helpId" placeholder="Nombre persona que reserva" v-model="reservacion.nombre_persona" readonly>
                                        <label for="titulo">Correo Cliente: </label>
                                        <input type="text" class="form-control" name="correo" id="correo_move" aria-describedby="helpId" placeholder="Correo persona que reserva" v-model="reservacion.correo" readonly>
                                        <label for="titulo">Paquete: </label>
                                        <select class="form-control" name="" id="paquete_edit" v-model="reservacion.id_paquete">
                                            <option value="" disabled selected="selected">Elija un paquete</option>
                                            <option v-for="paquete in paquetes" v-bind:value="paquete.id">Paquete N°@{{paquete.numero_paquete}}; Horario @{{paquete.horas}} Costo: @{{paquete.costo}}</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button id="btn_cerrar_modal_mover" type="button" class="btn btn-secondary" v-on:click="limpiar()" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" v-on:click="editarReservacion()">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="modal fade" id="editarReservacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Reservacion</h5>
                                <button id="btn_cerrar_modaleditar" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="titulo">Fecha: </label>
                                        <input type="text" class="form-control" name="fecha" id="fecha_edit" aria-describedby="helpId" placeholder="Fecha de la reservacion" v-model="reservacion.fecha" readonly>
                                        <label for="titulo">Nombre Cliente: </label>
                                        <input type="text" class="form-control" name="titulo" id="titulo_edit" aria-describedby="helpId" placeholder="Nombre persona que reserva" v-model="reservacion.nombre_persona" >
                                        <label for="titulo">Correo Cliente: </label>
                                        <input type="text" class="form-control" name="correo" id="correo_edit" aria-describedby="helpId" placeholder="Correo persona que reserva" v-model="reservacion.correo" >
                                        <label for="titulo">Paquete: </label>
                                        <select class="form-control" name="" id="paquete_edit" v-model="reservacion.id_paquete">
                                            <option value="" disabled selected="selected">Elija un paquete</option>
                                            <option v-for="paquete in paquetes" v-bind:value="paquete.id">Paquete N°@{{paquete.numero_paquete}}; Horario @{{paquete.horas}} Costo: @{{paquete.costo}}</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <!--button id="btn_cerrar_modal_edit" type="button" class="btn btn-secondary" v-on:click="limpiar()" data-dismiss="modal">Cerrar</button-->
                                <button v-if="reservacion.es_confirmada == 'No'" type="button" class="btn btn-primary" v-on:click="confirmarReservacion('Si')" >Confirmar</button>
                                <button v-if="reservacion.es_confirmada == 'Si'" type="button" class="btn btn-primary" v-on:click="confirmarReservacion('No')" >Desconfirmar</button>
                                
                                <button type="button" class="btn btn-primary" v-on:click="editarReservacion()">Guardar edición</button>
                                <button type="button" class="btn btn-danger" v-on:click="eliminarReservacion()" style="background:#E9590B;">Eliminar</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>  
        </section>
        
    </main>
</div>
<script src="{{asset('/vue/panel.js')}}"></script>
@endsection