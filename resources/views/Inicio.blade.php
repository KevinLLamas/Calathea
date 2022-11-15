@extends('app')
@section('content')
  <style>.google-map{
    height:100%;
    margin-bottom: -8px;
}

.google-map iframe{
    width:100%;
    border:0;
    filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 10+ */
    -webkit-filter: grayscale(99%); /* Chrome 19+ & Safari 6+ */
    -webkit-backface-visibility: hidden;  /* Fix for transition flickering */
} 
#map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }</style>
    <section id="about" class="about">
        <img src="{{asset('assets/img/calathea/banner_principal.png')}}" class="img-fluid" alt="">
        <div class="container" style="margin-top: -50px;">
            <div class="card text-left shadow round">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body row">
                <div class="form-group col-3" >
                  <label for="">Fecha</label>
                  <select class="form-control" name="" id="">
                    <option>Sab, Mar 2022</option>
                    <option></option>
                    <option></option>
                  </select>
                </div>
                <div class="form-group col-3" >
                  <label for="">Paquete</label>
                  <select class="form-control" name="" id="">
                    <option>Paquete 1</option>
                    <option></option>
                    <option></option>
                  </select>
                </div>
                <div class="form-group col-2" >
                  <label for="">Horario</label>
                  <select class="form-control" name="" id="">
                    <option>9:00</option>
                    <option></option>
                    <option></option>
                  </select>
                </div>
                <div class="form-group col-2 mt-4">
                  <label for=""></label>
                  <a name="" id="" class="btn btn-danger mt-1" href="#" role="button">VER PAQUETES</a>
                </div>
                <div class="form-group col-2 mt-4">
                  <label for=""></label>
                  <a name="" id="" class="btn btn-danger mt-1" href="#" role="button">PRE RESERVAR</a>
                </div>
              </div>
            </div>
       </div> 
    </section>
    <section id="cliens" class="container-fluid">
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
        
        <section id="cliens" class="container-fluid text-center">
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
         <div id="map"></div>
    </main>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMOg75K24AhWgbuKKzFQ47q4kuWwufzGI&callback=initMap&signed_in=true" async defer></script>
    <script>
    function initMap() {
      // The location of Uluru
      var uluru = {lat: 19.512230, lng: -99.268843 };
      // The map, centered at Uluru 
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 18, center: uluru});
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({position: uluru, map: map});
    }
    </script>
@endsection