document.getElementById("login").addEventListener("click",function(){      
    if(document.getElementById("username1").value.length != 0 && document.getElementById("password1").value.length != 0){
        document.getElementById("login").innerHTML=`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Validando`
        axios.get('./BD/api/api.php', {
            timeout:3000,
            params: {
                user: document.getElementById("username1").value ,
                pass: document.getElementById("password1").value ,
                id: 1
            }
        })
        .then(function (respuesta) {
            console.log(respuesta);
            console.log(respuesta.data.id);
            if (respuesta.data.status=="fail"){
                document.getElementById("login").innerHTML="Validar";
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid username or password',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
            else{  
                console.log(respuesta);
                localStorage.setItem("user_id",respuesta.data.id);                   
                document.cookie = "username="+document.getElementById("username1").value;
                document.cookie = "admin="+respuesta.data.tipo_usuario;
                localStorage.setItem("filtresOn","no");
                location.reload();
            }

            
            
        })
        .catch(function (error) {
            alert("El servidor ha tardado mucho en responder2")
        })
        .then(function () {
            //se ejecuta siempre
            document.getElementById("login").innerHTML="Log-In"
        });   
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Invalid username or password',
            showConfirmButton: false,
            timer: 1500
        });
    }
});