document.getElementById("").addEventListener("click",function(){      
    document.getElementById("signup").innerHTML=`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Validando`

    axios.get('./BD/api/api.php', {
        timeout:3000,
        params: {
            user: ,
            id: 5
        }
    })
    .then(function (respuesta) {
       
        if (respuesta.data.status=="fail"){
            document.getElementById("signup").innerHTML="Validar"
            alert("Este usuario no existe")
        }
        else{                            
            alert("Usuario eliminado");
        }

        console.log(respuesta);
        
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder");
    })
    .then(function () {
    });         
});