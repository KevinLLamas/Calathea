@extends('app')
@section('content')
<div id="inicio">
    <div class="">
        <img src="{{asset('assets/img/calathea/banner_principal.png')}}" class="img-fluid" alt="">
        <div class="container" style="margin-top: -50px;">
            <div class="card text-left shadow round" id="reservar">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body row">
                <div class="form-group col-md-3 col-xs-12" >
                  <label for="">Fecha</label>
                  <input type="date" class="form-control" name="" id="" aria-describedby="helpId" v-model="fecha">
                </div>
                <div class="form-group col-md-3 col-xs-12" >
                  <label for="">Paquete</label>
                  <select class="form-control" name="" id="" v-model="paquete">
                    <option value="">Elija un paquete</option>
                    <option value="1">Paquete 1 Lunes y Martes</option>
                    <option value="2">Paquete 2 Miercoles y Jueves</option>
                    <option value="3">Paquete 3 Viernes</option>
                    <option value="4">Paquete 4 Sabado</option>
                    <option value="5">Paquete 5 Domingo</option>
                  </select>
                </div>
                <div class="form-group col-md-2 col-xs-12" >
                  <label for="">Horario</label>
                  <select class="form-control" name="" id="" v-model="horario">
                    <option value="">Seleccione</option>
                    <option value="matutino">9:00 a 14:00 hrs</option>
                    <option value="vespertino">14:00 a 19:00 hrs</option>
                  </select>
                </div>
                <div class="form-group col-md-2 col-xs-12 mt-4">
                  <label for=""></label>
                  <a name="" id="" class="btn btn-danger mt-1" href="paquetes" role="button">VER PAQUETES</a>
                </div>
                <div class="form-group col-md-2 col-xs-12 mt-4">
                  <label for=""></label>
                  <button type="button" class="btn btn-danger mt-1" v-on:click="redir">PRE RESERVAR</button>
                </div>
              </div>
            </div>
       </div> 
</div>
    <section id="nosotros" class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/calathea/ninio.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('assets/img/calathea/Trazado 27181.png.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6 mt-5">
                    <h1 class="text-primary mx-5">NOSOTROS</h1>
                    <h2 class="my-5 mx-5 text-secondary">
                      Calathea Kids es un jardín de eventos infantiles. 
                      Es el sitio ideal para convertir las fiestas de los niños en experiencias inolvidables de ensueño, donde hacemos también de ti un invitado más en tu propio evento.
                    </h2>
                    <br><br><br><br>
                    <img src="{{asset('assets/img/calathea/derecha.png')}}" class="img-fluid mt-5" alt="">
                </div>
            </div>
        </section>
    <main id="main">
        <!-- ======= Cliens Section ======= -->
        
        <section id="galeria" class="container-fluid text-center">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/calathea/galeria.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('assets/img/calathea/izq.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('assets/img/calathea/lets_party.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/img/calathea/good_vibes.png')}}" class="img-fluid" alt="">
                    <img src="{{asset('assets/img/calathea/ninia_fiesta.png')}}" class="img-fluid" alt="">
                </div>
            </div>
            
        </section>
        <!--<section id="cliens" class="container-fluid text-center">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/calathea/lets_party.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/img/calathea/girl_cake.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </section>
         End Contact Section -->
         @include('mapa')
    </main>
</div>
    <script src="{{asset('/vue/inicio.js')}}"></script>
@endsection