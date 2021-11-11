@extends('app')
@section('content')
<link href="{{ asset('assets/css/my_chat.css')}}" rel="stylesheet">


<!-- Begin Page Content -->
<div class="container-fluid" id="room-chat" v-cloak>
    <div class="row">
        <div class="col-xl-12 col-lg-11" style="float: none; margin: 0 auto;">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Chat</h6>       
            </div>
            <div class="card-body">
                <!-- Content wrapper start -->
                <div class="content-wrapper">
                    <!-- Row start -->
                    <div class="row gutters">
            
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
                            <div class="card m-0">
            
                                <!-- Row start -->
                                <div class="row no-gutters">
                                    <!--div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                                        <div class="users-container">
                                            <div class="chat-search-box">
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Search">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-info">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="users">
                                                <li class="person" data-chat="person1">
                                                    <div class="user">
                                                        <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                        <span class="status busy"></span>
                                                    </div>
                                                    <p class="name-time">
                                                        <span class="name">Steve Bangalter</span>
                                                        <span class="time">15/02/2019</span>
                                                    </p>
                                                </li>
                                                <li class="person" data-chat="person1">
                                                    <div class="user">
                                                        <img src="https://www.bootdey.com/img/Content/avatar/avatar1.png" alt="Retail Admin">
                                                        <span class="status offline"></span>
                                                    </div>
                                                    <p class="name-time">
                                                        <span class="name">Steve Bangalter</span>
                                                        <span class="time">15/02/2019</span>
                                                    </p>
                                                </li>
                                                <li class="person active-user" data-chat="person2">
                                                    <div class="user">
                                                        <img src="https://www.bootdey.com/img/Content/avatar/avatar2.png" alt="Retail Admin">
                                                        <span class="status away"></span>
                                                    </div>
                                                    <p class="name-time">
                                                        <span class="name">Peter Gregor</span>
                                                        <span class="time">12/02/2019</span>
                                                    </p>
                                                </li>
                                                <li class="person" data-chat="person3">
                                                    <div class="user">
                                                        <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                        <span class="status busy"></span>
                                                    </div>
                                                    <p class="name-time">
                                                        <span class="name">Jessica Larson</span>
                                                        <span class="time">11/02/2019</span>
                                                    </p>
                                                </li>
                                                <li class="person" data-chat="person4">
                                                    <div class="user">
                                                        <img src="https://www.bootdey.com/img/Content/avatar/avatar4.png" alt="Retail Admin">
                                                        <span class="status offline"></span>
                                                    </div>
                                                    <p class="name-time">
                                                        <span class="name">Lisa Guerrero</span>
                                                        <span class="time">08/02/2019</span>
                                                    </p>
                                                </li>
                                                <li class="person" data-chat="person5">
                                                    <div class="user">
                                                        <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png" alt="Retail Admin">
                                                        <span class="status away"></span>
                                                    </div>
                                                    <p class="name-time">
                                                        <span class="name">Michael Jordan</span>
                                                        <span class="time">05/02/2019</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div-->
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                                        <div class="selected-user">
                                            <span>To: <span class="name">Group</span></span>
                                        </div>
                                        <div class="chat-container">
                                            <ul class="chat-box chatContainerScroll">
                                                <div v-for="message in chats">
                                                    <li v-if="message.id_usuario != {{Session::get('id')}}" class="chat-left">
                                                        <div class="chat-avatar">
                                                            <img :src="'storage/usuarios/usuario-' + message.usuario.id + '/' + message.usuario.nombre_foto" alt="Retail Admin">
                                                            <div class="chat-name">@{{message.usuario.nombre}} @{{message.usuario.apellido}}</div>
                                                        </div>
                                                        <div class="chat-text">@{{message.contenido}}</div>
                                                        <div class="chat-hour">@{{message.fecha}}<span class="fa fa-check-circle"></span></div>
                                                    </li>
                                                    <li v-if="message.id_usuario == {{Session::get('id')}}" class="chat-right">
                                                        <div class="chat-hour">@{{message.fecha}}<span class="fa fa-check-circle"></span></div>
                                                        <div class="chat-text">@{{message.contenido}}</div>
                                                        <div class="chat-avatar">
                                                            <img :src="'storage/usuarios/usuario-' + message.usuario.id + '/' + message.usuario.nombre_foto" alt="Retail Admin">
                                                            <!--img width="70%" height="60px" class="img-profile rounded-circle "  /-->
                                                            <div class="chat-name">Yo</div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </ul>
                                            <div class="form-group mt-3 mb-0">
                                                <textarea v-model="nuevo_mensaje" class="form-control" rows="3" placeholder="Escribe tu mensaje aquí..."></textarea>
                                                <button class="btn btn-primary mt-1" type="button" v-on:click="guardar()">Enviar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
            
                        </div>
            
                    </div>
                    <!-- Row end -->
            
                </div>
                <!-- Content wrapper end -->
            </div>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script src="{{asset('assets/vue/room_chat.js')}}"></script>
@endsection