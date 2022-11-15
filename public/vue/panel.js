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
            es_donfirmada: ''
        },
        paquetes:[]
    },
    created: function(){
        document.addEventListener('DOMContentLoaded', function() {
            
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
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
                    $("#btn_llamar_limpiar").trigger("click");
                    $("#btn_abrir_modal").trigger("click");
                    $("#fecha").val(info.dateStr);
                  
                },
                editable:true,
                eventResize: function(event, delta)
                {
                    console.log(event);
                },
                eventDrop: function(info, delta)
                {
                    $('#fecha_move').val(info.event.startStr);
                    $('#label_id').text(info.event.id);
                    $("#btn_llamar_llenar").trigger("click");
                    $("#btn_abrir_modal_mover").trigger("click");
                },
                eventClick:function(info){
                    $('#fecha_move').val(info.event.startStr);
                    $('#label_id').text(info.event.id);
                    $("#btn_llamar_llenar").trigger("click");
                    $("#btn_abrir_modal_editar").trigger("click");
                }
            });
            calendar.render();

            var event = calendar.getEvents();
            console.log(event);
            
        });
        this.getPaquetes();
    },
    methods:{
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
            
            axios.post('add_reservacion', {
                nombre_persona: this.reservacion.nombre_persona,
                fecha: this.reservacion.fecha,
                id_paquete: this.reservacion.id_paquete,
                correo: this.reservacion.correo
            }).then(response => {
                if(response.data.ok){
                    $("#btn_cerrar_modal_agregar").trigger("click");
                    Swal.fire('Se agregó con éxito', '', 'success')  

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
        editarReservacion: function(){
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
                    Swal.fire('Reservacion Editada', '', 'success')  
                }
                console.log(response);
            });
        },
        llenarReservacion: function() {
            const id = $('#label_id').text();
            const f = $('#fecha_move').val();
            axios.post('get_reservacion', {
                id: id,
            }).then(response => {
                if(response.data.ok){
                    this.reservacion = response.data.data;  
                    this.reservacion.fecha = f;
                    
                }
                console.log(response);
            });
        },
        limpiar: function(){
            this.reservacion.fecha = '';
            this.reservacion.nombre_persona = '';
            this.reservacion.id_paquete = '';
            this.reservacion.correo = '';            
        },
        getPaquetes: function(){
            axios.get('get_paquetes').then(response => {
                if(response.data.ok){
                    this.paquetes = response.data.data;
                }
                console.log(response);
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




