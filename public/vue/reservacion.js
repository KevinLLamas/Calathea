var url = window.location.pathname;
var get_paquete = url.substring(url.lastIndexOf('/')+1);

Vue.config.devtools = true
new Vue({
    el: '#reservacion',
    data:{
        formulario: '',
        titulo: '',
        fecha: '',
        fecha_fin: '',
        reservacion:{
            nombre_persona: '',
            fecha: '',
            paquete: '',
            correo: '',
            es_donfirmada: '',
            horario: ''
        },
        paquetes:[],
        calendarEl: '',
        calendar: '',
        p: '',
        paquete_sel: ''
    },
    created: function(){
        this.reservacion.fecha = $("#fecha").val();
        this.reservacion.nombre_persona = $("#nombre").val();
        this.reservacion.correo = $("#correo").val();
        this.p = $("#paquete").val();          
        
        document.addEventListener('DOMContentLoaded', this.setup);
        this.check_disponible();
        //this.paquete = this.no_paquete;
        //this.getPaquetes();
    },
    methods:{
        setup: function(){
            this.calendarEl = document.getElementById('calendar');
            this.calendar = new FullCalendar.Calendar(this.calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                locale:"es",
                header: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'dayGridMonth, timeGridWeek, listWeek'
                },
                contentHeight:"auto",
                events: '/get_reservaciones_cliente',
                selectable:true,
                selectHelper: true,
                fixedWeekCount: false,
                showNonCurrentDates: false,
                dateClick: function(info) {
                    $('#fecha').val(info.dateStr);
                    $("#btn_cambio_fecha").trigger("click");
                    $("#btn_llamar_paqueteDia").trigger("click");
                   /* $("#btn_llamar_limpiar").trigger("click");
                    $("#btn_abrir_modal").trigger("click");
                    $("#fecha").val(info.dateStr);*/
                  
                },
                editable:false,
                eventResize: function(event, delta)
                {
                    console.log(event);
                },
                eventDrop: function(info, delta)
                {
                    /*$('#fecha_move').val(info.event.startStr);
                    $('#label_id').text(info.event.id);
                    $("#btn_llamar_llenar").trigger("click");
                    $("#btn_abrir_modal_mover").trigger("click");*/
                },
                eventClick:function(info){
                    /*$('#fecha_move').val(info.event.startStr);
                    $('#label_id').text(info.event.id);
                    $("#btn_llamar_llenar").trigger("click");
                    $("#btn_abrir_modal_editar").trigger("click");*/
                },
                selectAllow: function(event)
                {
                    console.log(event);
                    //return true;
                    var m = moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                    return m;
                },
            });
            this.calendar.render();

            /*var event = calendar.getEvents();
            console.log(event);*/
        },
        handleDateClick: function(arg) {
            alert('date click! ' + arg.dateStr)
          },
          check_disponible: function(){
            axios.post('/get_paquete_dia',{
                fecha: this.reservacion.fecha,
                tipo: 'Nuevo'
             }).then(response=>{           
                if(response.data.ok){
                    this.paquetes = response.data.data;   
                    this.reservacion.paquete = $("#paquete").val();         
                    this.getPaquete();        
                    //this.llenarReservacionMover();
                    //$("#btn_abrir_modal_mover").trigger("click");
                }else{
                    swal.fire('Atención', response.data.data, 'warning');
                    //this.setup();
                    return;
                }
             }).catch(error=>{
                console.log(error);
             });
        },
        getPaquetesDia: function(){
            this.reservacion.fecha = $("#fecha").val();
            axios.post('/get_paquete_dia',{
                fecha: this.reservacion.fecha,
                tipo: 'Nuevo'
             }).then(response=>{           
                if(response.data.ok){
                    this.paquetes = response.data.data;
                    $("#btn_abrir_modal").trigger("click");
                }else{
                    swal.fire('Atención', response.data.data, 'warning');
                    return;
                }
             }).catch(error=>{
                console.log(error);
             });
        },
        getPaquete: function(){
            axios.post('/get_paquete',{
                id_paquete: this.reservacion.paquete,
             }).then(response=>{           
                if(response.data.ok){
                    this.paquete_sel = response.data.data[0];
                }else{
                    swal.fire('Atención', response.data.data, 'warning');
                    return;
                }
             }).catch(error=>{
                console.log(error);
             });
        },
        guardarReservacion: function(){      
            if(this.reservacion.paquete == ''){
                swal.fire('Atención', "Seleccione un paquete", 'warning');
                return;
            }
            if(this.reservacion.nombre_persona == ''){
                swal.fire('Atención', "Ingrese un nombre", 'warning');
                return;
            }
            if(this.reservacion.fecha == ''){
                swal.fire('Atención', "Ingrese una fecha", 'warning');
                return;
            }
            if(this.reservacion.correo == ''){
                swal.fire('Atención', "Ingrese un correo", 'warning');
                return;
            }
            
            

            axios.post('/add_reservacion', {
                nombre_persona: this.reservacion.nombre_persona,
                fecha: this.reservacion.fecha,
                id_paquete: this.reservacion.paquete,
                correo: this.reservacion.correo
            }).then(response => {
                if(response.data.ok){
                    //Swal.fire('Listo, se le envió un correo con instrucciones para completar su reservación.', '', 'success')
                    Swal.fire({
                        title: '',
                        icon: '',
                        
                        html:
                          '<img src="/assets/img/calathea/Trazado 31519.png" alt="logo" class="w-25" style="font-family:'+"'gotham-rounded-medium'"+';width: 15%!important;"><br><br>'+
                          '<h4 style="color:white"><b>Tu Pre Reservación ha sido hecha</b></h4>'+
                          '<h4 style="color:white">Recibirás un mail de confirmación <br>A tu correo de contacto<h4>',
                        color: "#fff",
                        background: '#84C5B8',
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonColor: "#E9590B",
                        confirmButtonText:
                          '<i class="fa fa-thumbs-up"></i>Regresar',
                      });  
                    this.setup();
                    this.limpiar();
                }
                console.log(response);
            });
        },
        cambiarFecha: function(){
            this.reservacion.fecha = $("#fecha").val();
        },
        moverReservacion: function(){
            axios.post('mover_reservacion', {
                id: this.reservacion.id,
                fecha: this.reservacion.fecha,
            }).then(response => {
                if(response.data.ok){
                    //$("#btn_cerrar_modal_mover").trigger("click");
                    Swal.fire('Reservacion Editada', '', 'success')  
                }
                console.log(response);
            });
        },
        confirmarReservacion: function(dato){
            /*Swal.fire({
                title: '¿Esta seguro que desea cambiar el status de está reservación?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Si`,
                denyButtonText: `No, cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.reservacion.es_confirmada = dato;
                    this.editarReservacion();
                }
                else{
                    Swal.fire('Se decartaron los cambios', '', 'info')
                }                
            })*/
        },
        editarReservacion: function(){
           
            /*axios.post('editar_reservacion', {
                id: this.reservacion.id,
                nombre_persona: this.reservacion.nombre_persona,
                fecha: this.reservacion.fecha,
                id_paquete: this.reservacion.id_paquete,
                correo: this.reservacion.correo,
                es_confirmada: this.reservacion.es_confirmada,
            }).then(response => {
                if(response.data.ok){
                    $("#btn_cerrar_modal_edit").trigger("click");
                    Swal.fire('Reservacion Editada', '', 'success')  
                }
                console.log(response);
            });*/
        },
        llenarReservacion: function() {
            /*const id = $('#label_id').text();
            const f = $('#fecha_move').val();
            axios.post('get_reservacion', {
                id: id,
            }).then(response => {
                if(response.data.ok){
                    this.reservacion = response.data.data;  
                    this.reservacion.fecha = f;
                    
                }
                console.log(response);
            });*/
        },
        limpiar: function(){
            this.reservacion.fecha = '';
            this.reservacion.nombre_persona = '';
            this.reservacion.paquete = '';
            this.reservacion.correo = '';     
            this.paquete_sel= '';     
        },
        getPaquetes: function(){
            axios.get('get_paquetes').then(response => {
                if(response.data.ok){
                    this.paquetes = response.data.data;
                    this.reservacion.paquete = $("#paquete").val();
                }
                console.log(response);
            }); 
        },
        eliminarReservacion: function(){
            /*Swal.fire({
                title: '¿Esta seguro que desea eliminar esta reservacion?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Si`,
                denyButtonText: `No, cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('eliminar_reservacion', {
                        id: this.reservacion.id,
                    }).then(response => {
                        if(response.data.ok){
                            Swal.fire('Reservacion Eliminada', '', 'success');
                            $("#btn_cerrar_modal_edit").trigger("click");
                        }
                        console.log(response);
                    });     
                }
                else{
                    Swal.fire('Se decartaron los cambios', '', 'info')
                }                
            })*/
        },
    }
});




