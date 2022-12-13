@extends('app')
@section('content')
<div id="inicio">
    <div class="">
        <img src="{{asset('assets/img/calathea/banner_principal.png')}}" class="img-fluid" alt="">
        <div class="container " style="margin-top: -50px;" >
            <div class="card text-left shadow round" id="reservar">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body row">
                <div class="form-group col-md-3 col-xs-12" >
                  <label for="">Fecha</label>
                  <input type="date" class="form-control" name="" id="" aria-describedby="helpId" v-model="fecha" @change="get_info()">
                </div>
                <div class="form-group col-md-5 col-xs-12" >
                  <label for="">Paquete y Horario</label>
                  <select class="form-control" name="" id="" v-model="paquete" required>
                    <option value="">Elija un paquete y horario</option>
                      <option v-for="paquete in paquetes" v-bind:value="paquete.id">Paquete N°@{{paquete.numero_paquete}}; Horario @{{paquete.horas}}</option>
                  </select>
                </div>
                <!--div class="form-group col-md-2 col-xs-12" >
                  <label for="">Horario</label>
                  <select class="form-control" name="" id="" v-model="horario">
                    <option value="">Seleccione</option>
                    <option value="matutino">9:00 a 14:00 hrs</option>
                    <option value="vespertino">14:00 a 19:00 hrs</option>
                  </select>
                </div!-->
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
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="{{asset('assets/img/calathea/carousel/Calathea_001.jpg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="{{asset('assets/img/calathea/carousel/Calathea_002.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="{{asset('assets/img/calathea/carousel/Calathea_003.jpg')}}" alt="Third slide">
                        </div>
                        <!--div class="carousel-item">
                          <img class="d-block w-100" src="{{asset('assets/img/calathea/carousel/Calathea_004.jpg')}}" alt="Fourth slide">
                        </div-->
                        <div class="carousel-item">
                          <img class="d-block w-100" src="{{asset('assets/img/calathea/carousel/Calathea_005.jpg')}}" alt="Five slide">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
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