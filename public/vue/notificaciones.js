new Vue({
    el: '#notificaciones',
    data: {
        notificaciones: []
    },
    created: function(){
        this.get_notificaciones();
    },
    methods: {
        get_notificaciones: function(){
            axios.post('get_notificaciones').then(response => {
                this.notificaciones = response.data;
                console.log(response.data);
            });
        },
        
    }
});