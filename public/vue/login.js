new Vue({
    el: '#login',
    data: {
        correo: '',
        contrasenia: '',
    },
    created: function(){
        
    },
    methods: {
        login: function(){
            axios.post('../login',{
                correo: this.correo,
                contrasenia: this.contrasenia,
            }).then(result=>{           
                if(result.data.ok){
                    window.location = '/panel';
                }else{
                    swal.fire('Error', result.data.message, 'warning');
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    }
});