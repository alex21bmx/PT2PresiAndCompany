document.getElementById("signup").addEventListener("click",function(){      
    document.getElementById("signup").innerHTML=`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Validando`
    if(document.getElementById("newUsername").value.length != 0 && document.getElementById("newPassword").value.length != 0){
        axios.get('./BD/api/api.php', {
            timeout:3000,
            params: {
                user: document.getElementById("newUsername").value ,
                pass: document.getElementById("newPassword").value ,
                id: 3
            }
        })
        .then(function (respuesta) {
        
            if (respuesta.data.status=="fail"){
                document.getElementById("signup").innerHTML="Validar"
                Swal.fire({
                    icon: 'error',
                    title: 'User already exists',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
            else{                            
                Swal.fire({
                    icon: 'success',
                    title: 'User created',
                    showConfirmButton: false,
                    timer: 1500
                });
                document.getElementById("popup-4").classList.toggle("active");
                setTimeout(function(){
                    document.getElementById("popup-3").classList.toggle("active");
                }, 1500);
            }

            console.log(respuesta);
            
            
        })
        .catch(function (error) {
            alert("El servidor ha tardado mucho en responder1");
        })
        .then(function () {
            //se ejecuta siempre
            document.getElementById("signup").innerHTML="Sign-up"
        }); 
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Fill in the required fields',
            showConfirmButton: false,
            timer: 1500
        });
    }

});