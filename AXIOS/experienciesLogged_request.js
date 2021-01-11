window.onload = function() {
    axios.get('./BD/api/api.php', {
        timeout:4000,
        params: {
            size: document.getElementById("numero").value
            ,id: 7
        }
    })
    .then(function (respuesta) {
       
        if (respuesta.data.status=="fail"){
            alert("ERROR, TE HAS EQUIVOCADO");
        }
        else{  
            let cadena= "";
            for (let index = 0; index < respuesta.data.length; index++) {
                cadena+="<div>"+respuesta.data[index]["localizacion"]+"</div>";  
            }
            document.getElementById("grid-container").innerHTML = cadena;   
        }
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });         
  };