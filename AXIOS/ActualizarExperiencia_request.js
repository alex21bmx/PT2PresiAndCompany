document.getElementById("actualizar").addEventListener("click",function(){
    if(document.getElementById("textoAct").value.length != 0 && document.getElementById("imagenAct").value.length != 0 && document.getElementById("categoriaAct").value.length != 0 &&
    document.getElementById("localizacionAct").value.length != 0){
        axios.get('./BD/api/api.php', {
            timeout:10000,
            params: {
                id_experiencia: document.getElementById("gestionId").value,
                texto: document.getElementById("textoAct").value,
                imagen: document.getElementById("imagenAct").value,
                categoria: document.getElementById("categoriaAct").value,
                latitud: document.getElementById("latitudAct").value,
                longitud: document.getElementById("longitudAct").value,
                localizacion: document.getElementById("localizacionAct").value,
                id: 8
            }
        })
        .then(function (respuesta) {
            console.log(respuesta);
            /*if (respuesta.data=="ok"){
                alert("Experiencia actualizada!");
                location.reload();
            }*/
            
        })
        .catch(function (error) {
            alert("El servidor ha tardado mucho en responder2")
        });
    }
} );      