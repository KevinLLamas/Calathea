new Vue({
    el: '#inicio',
    data: {
        fecha: '',
        paquete: '',
        horario: '',
        paquetes: [],
        mostrar_paquetes: true,
    },
    created: function(){
        
    },
    methods: {
        redir: function(){
            if(this.fecha == ''){
                swal.fire('Atención', "Ingrese una fecha valida", 'warning');
                return;
            }
            if(this.paquete == ''){
                swal.fire('Atención', "Ingrese un paquete valido", 'warning');
                return;
            }
            window.location.href = "reservacion/"+this.fecha+"/"+this.paquete;
        },

        getPaquetes: function(){
            axios.get('get_paquetes').then(response => {
                if(response.data.ok){
                    this.paquetes = response.data.data;
                }
                console.log(response);
            });
        },

        get_info: function(){
            axios.post('get_all_paquetes_dia',{
                fecha: this.fecha,
             }).then(response=>{           
                if(response.data.ok){
                    this.paquetes = response.data.data;                    
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
        }
        
    }
});