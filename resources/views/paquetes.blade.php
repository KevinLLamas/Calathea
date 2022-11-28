@extends('app')
@section('content')

    <!-- End Hero -->
    <section id="about" class="about">
        <img src="{{asset('assets/img/calathea/BANNER.png')}}" class="img-fluid" alt="">
    </section>
    <section id="about" class="about">
        
    </section>
    <main id="main">
        <!-- ======= Cliens Section ======= -->
        <section id="cliens" class="container mb-5">
            <img src="{{asset('assets/img/calathea/TABLA_PLANES.png')}}" class="img-fluid" alt="">
        
        </section><br><br>
        <!-- End Contact Section -->
        @include('mapa')
    </main>
@endsection