window.onload = function() {
    axios.get('./BD/api/api.php', {
        timeout:6000,
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
                cadena+=
                '<div class="experienciaOutter"'+
                    '<h4 class="categoriaExperiencia">'+respuesta.data[index]["categoria"]+'</h4>'+
                    '<div class="experienciaInner" style="background-image: url('+respuesta.data[index]["imagen"]+');>'+
                        '<p class="titolPost">'.respuesta.data[index]["localizacion"]+'</p>'+
                        '<h4 class="coordenadas">'+respuesta.data[index]["latitud"]+'-'+respuesta.data[index]["longitud"]+'</h4>'+ 
                    '</div>'+
                    '<h4 class="desc">'+respuesta.data[index]["fecha_de_publicacion"]+' ↠ '+respuesta.data[index]["id_usuario"]+'</h4>'+
                '</div>';
            }
            localStorage.setItem('cadena',cadena);
            document.getElementById("grid-container").innerHTML = cadena;   
        }
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });         
  };