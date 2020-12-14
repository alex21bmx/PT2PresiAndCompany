    axios.get('./BD/api/api.php', {
        timeout:3000,
        params: {
            id: 2
        }
    })
    .then(function (respuesta) {
       
        if (respuesta.data.status=="fail"){
            document.getElementById("login").innerHTML="Validar"
            alert("ERROR, TE HAS EQUIVOCADO")
        }
        else{                            
            for (let index = 0; index < 3; index++) {
                document.getElementsByClassName("fotoPost")[index].src = respuesta["data"]["viaje"+index]["imagen"];
                
                document.getElementsByClassName("titolPost")[index].innerHTML = respuesta["data"]["viaje"+index]["localizacion"];
                
                document.getElementsByClassName("dadesPost")[index].innerHTML = respuesta["data"]["viaje"+index]["id_usuario"]+" - "+respuesta["data"]["viaje"+index]["fecha_de_publicacion"];   
                             
            }
        }
        
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder3")
    })
    ;         
