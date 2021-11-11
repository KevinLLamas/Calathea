let ip_adress = '';
let socket_port = '';
let socket;
new Vue({
    el: '#room-chat',
    data: {
        chats: [],
        nuevo_mensaje: '',
        user: ''
    },
    created: function(){
        this.getSession(); 
        this.getMensajes();
    },
    methods: {
        getSession: function(){
            axios.get('/getSession').then(result=>{           
               this.user = result.data;
            })
        },

        getMensajes: function(){
            axios.get('/get_mensajes').then(result=>{           
                this.chats = result.data.data;
            })
            this.chatConnection();  
        },

        chatConnection: function(){
            ip_adress = 'http://165.232.139.88';
            socket_port = '3000';
            socket = io(ip_adress + ':' + socket_port);

            /*let message = 'Hello';
            socket.on('sendChatToClient', (message) => {
                console.log(message);
                let nuevo_mensaje = {
                    nombre_usuario : 'Lucas Lopez',
                    mensaje : message,
                    fecha : '07-12-21 13:05'
                }
                this.chats.push(nuevo_mensaje);
            });*/

            socket.on('broadcast', (message) => {
                this.chats.push(message);
            });
            //this.emit();

        },

        emit: function(){
            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime = date+' '+time;

            let nuevo_mensaje = {
                usuario : this.user,
                contenido : this.nuevo_mensaje,
                fecha : dateTime,
                id_usuario : this.user.id
            }
            this.chats.push(nuevo_mensaje);
            socket.emit('sendChatToServer', nuevo_mensaje);
            this.nuevo_mensaje = '';
        },

        guardar: function(){
            axios.post('save_mensaje',{
                contenido: this.nuevo_mensaje
            }).then(result=>{           
                if(result.data.ok){
                    this.emit();
                }else{
                    swal.fire('Error', 'Error', 'warning');
                }
            })
        },

        enviar: function(){
            let temp = `<div class="out-msg">
            <span class="my-msg">${this.text}</span>
            <!--img src="img/me.jpg" class="avatar"-->
            </div>`;
        
            chatArea.insertAdjacentHTML("beforeend", temp);
            this.text = '';
        },           
    }
});