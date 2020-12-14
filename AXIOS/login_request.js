document.getElementById("login").addEventListener("click",function(){      

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
       
        if (respuesta.data.status=="fail"){
            document.getElementById("login").innerHTML="Validar"
            alert("ERROR, TE HAS EQUIVOCADO")
        }
        else{                            
            document.cookie = "username="+document.getElementById("username1").value;
        }

        console.log(respuesta);
        
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    })
    .then(function () {
        //se ejecuta siempre
        document.getElementById("login").innerHTML="Log-In"
    });         
});