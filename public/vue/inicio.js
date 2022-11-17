new Vue({
    el: '#inicio',
    data: {
        fecha: '',
        paquete: '',
        horario: ''
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
            if(this.horario == ''){
                swal.fire('Atención', "Ingrese un horario valido", 'warning');
                return;
            }
            window.location.href = "reservacion/"+this.fecha+"/"+this.paquete+"/+"+this.horario;
        }
    }
});