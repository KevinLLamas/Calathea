Vue.config.devtools = true
new Vue({
    el: '#main',
    data:{
        formulario: '',
        titulo: '',
        fecha: '',
        fecha_fin: '',
        reservacion:{
            nombre_persona: '',
            fecha: '',
            id_paquete: '',
            correo: '',
            es_confirmada: ''
        },
        paquetes:[],
        calendarEl: '',
        calendar: '',
        today: new Date(),
    },
    created: function(){
        document.addEventListener('DOMContentLoaded', this.setup);
        //this.getPaquetes();
    },
    methods:{
        setup: function(){
            this.calendarEl = document.getElementById('calendar');
            this.calendar = new FullCalendar.Calendar(this.calendarEl, {
                initialView: 'dayGridMonth',
                locale:"es",
                header: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'dayGridMonth, timeGridWeek, listWeek'
                },
                events: '/get_reservaciones',
                selectable:true,
                selectHelper: true,
                dateClick: function(info) {
                    $("#fecha").val(info.dateStr);
                    $("#btn_llamar_limpiar").trigger("click");                    
                    $("#btn_llamar_paqueteDia").trigger("click");
                },
                editable:true,
                eventResize: function(event, delta)
                {
                    console.log(event);
                },
                eventDrop: function(info, delta)
                {
                    $('#fecha_move').val(info.event.startStr);
                    $("#fecha").val(info.event.startStr);
                    $('#label_id').text(info.event.id);
                    $("#btn_llamar_disponible").trigger("click");
                },
                eventClick:function(info){
                    $('#fecha_move').val(info.event.startStr);
                    $("#fecha").val(info.event.startStr);
                    $('#label_id').text(info.event.id);
                    $("#btn_llamar_llenar").trigger("click");
                    $("#btn_abrir_modal_editar").trigger("click");
                }
            });
            this.calendar.render();

            var event = this.calendar.getEvents();
            console.log(event);
        },

        handleDateClick: function(arg) {
            alert('date click! ' + arg.dateStr)
          },
        muestra: function(){
            
            var url = 'url';
            axios.post(url, {
                var: this.var
            }).then(response => {
                console.log(response);
            });
        },
        guardarReservacion: function(){
            this.reservacion.fecha = $("#fecha").val();
            
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
            if(this.reservacion.id_paquete == ''){
                swal.fire('Atención', "Seleccione un paquete", 'warning');
                return;
            }
            

            axios.post('add_reservacion', {
                nombre_persona: this.reservacion.nombre_persona,
                fecha: this.reservacion.fecha,
                id_paquete: this.reservacion.id_paquete,
                correo: this.reservacion.correo
            }).then(response => {
                if(response.data.ok){
                    $("#btn_cerrar_modal_agregar").trigger("click");
                    Swal.fire('Se agregó con éxito', '', 'success')  
                    this.setup();
                }
                console.log(response);
            });
        },
        moverReservacion: function(){
            axios.post('mover_reservacion', {
                id: this.reservacion.id,
                fecha: this.reservacion.fecha,
            }).then(response => {
                if(response.data.ok){
                    this.getPaquetesDiaEdicion();
                    $("#btn_cerrar_modal_mover").trigger("click");
                    Swal.fire('Reservacion Editada', '', 'success')  
                }
                console.log(response);
            });
        },
        confirmarReservacion: function(dato){
            
            Swal.fire({
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
            })
        },
        checkDisponible: function(){
            axios.post('get_paquete_dia',{
                fecha: $('#fecha_move').val(),
                tipo: 'Edicion'
             }).then(response=>{           
                if(response.data.ok){
                    this.paquetes = response.data.data;                    
                    this.llenarReservacionMover();
                    $("#btn_abrir_modal_mover").trigger("click");
                }else{
                    swal.fire('Atención', response.data.data, 'warning');
                    this.setup();
                    return;
                }
             }).catch(error=>{
                console.log(error);
             });
        },
        editarReservacion: function(){

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
            if(this.reservacion.id_paquete == ''){
                swal.fire('Atención', "Seleccione un paquete", 'warning');
                return;
            }
            
            axios.post('editar_reservacion', {
                id: this.reservacion.id,
                nombre_persona: this.reservacion.nombre_persona,
                fecha: this.reservacion.fecha,
                id_paquete: this.reservacion.id_paquete,
                correo: this.reservacion.correo,
                es_confirmada: this.reservacion.es_confirmada,
            }).then(response => {
                if(response.data.ok){
                    $("#btn_cerrar_modal_edit").trigger("click");
                    $("#btn_cerrar_modal_mover").trigger("click");
                    Swal.fire('Reservacion Editada', '', 'success')  
                }
                console.log(response);
            });
        },
        llenarReservacion: function() {
            console.log(this.calendar.getEvents());
            const id = $('#label_id').text();
            const f = $('#fecha_move').val();
            axios.post('get_reservacion', {
                id: id,
            }).then(response => {
                if(response.data.ok){
                    this.reservacion = response.data.data;  
                    this.reservacion.fecha = f;
                    this.getPaquetesDiaEdicion();
                }
                console.log(response);
            });
        },
        llenarReservacionMover: function() {
            console.log(this.calendar.getEvents());
            const id = $('#label_id').text();
            const f = $('#fecha_move').val();
            axios.post('get_reservacion', {
                id: id,
            }).then(response => {
                if(response.data.ok){
                    this.reservacion = response.data.data;  
                    this.reservacion.fecha = f;
                    this.getPaquetesDiaMover();
                }
                console.log(response);
            });
        },
        limpiar: function(){
            this.reservacion.fecha = '';
            this.reservacion.nombre_persona = '';
            this.reservacion.id_paquete = '';
            this.reservacion.correo = '';      
            this.reservacion.es_confirmada = '';     
            this.setup(); 
        },
        getPaquetes: function(){
            axios.get('get_paquetes').then(response => {
                if(response.data.ok){
                    this.paquetes = response.data.data;
                }
                console.log(response);
            });
        },
        getPaquetesDia: function(){
            this.reservacion.fecha = $("#fecha").val();
            axios.post('get_paquete_dia',{
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
        getPaquetesDiaMover: function(){
            this.reservacion.fecha = $("#fecha").val();
            axios.post('get_paquete_dia',{
                fecha: this.reservacion.fecha,
                tipo: 'Nuevo'
             }).then(response=>{           
                if(response.data.ok){
                    this.paquetes = response.data.data;
                }else{
                    swal.fire('Atención', response.data.data, 'warning');
                    return;
                }
             }).catch(error=>{
                console.log(error);
             });
        },
        getPaquetesDiaEdicion: function(){
            this.reservacion.fecha = $("#fecha").val();
            axios.post('get_paquete_dia',{
                fecha: this.reservacion.fecha,
                tipo: 'Edicion'
             }).then(response=>{           
                if(response.data.ok){
                    this.paquetes = response.data.data;
                }else{
                    swal.fire('Atención', 'No se puede cambiar el horario de la reservacion', 'warning');
                    this.getPaquete();
                    return;
                }
             }).catch(error=>{
                console.log(error);
             });
        },
        
        getPaquete: function(){
            axios.post('get_paquete',{
                id_paquete: this.reservacion.id_paquete,
             }).then(response=>{           
                if(response.data.ok){
                    this.paquetes = response.data.data;
                }else{
                    swal.fire('Atención', response.data.data, 'warning');
                    return;
                }
             }).catch(error=>{
                console.log(error);
             });
        },
        eliminarReservacion: function(){
            Swal.fire({
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
            })
        },
    }
});




