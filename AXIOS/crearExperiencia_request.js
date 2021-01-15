document.getElementById("crear").addEventListener("click",function(){
    if(document.getElementById("texto").value.length != 0 && document.getElementById("imagen").value.length != 0 && document.getElementById("categoria").value.length != 0 &&
    document.getElementById("localizacion").value.length != 0){
        axios.get('./BD/api/api.php', {
            timeout:10000,
            params: {
                username: document.getElementById("username").value,
                estado: document.getElementById("estado").value,
                texto: document.getElementById("texto").value,
                imagen: document.getElementById("imagen").value,
                categoria: document.getElementById("categoria").value,
                latitud: document.getElementById("latitud").value,
                longitud: document.getElementById("longitud").value,
                localizacion: document.getElementById("localizacion").value,
                id: 13
            }
        })
        .then(function (respuesta) {
            console.log(respuesta);
            if (respuesta.data=="ok"){
                alert("Experiencia creada!");
                document.getElementById("popup-5").classList.toggle("active");
            }
            
        })
        .catch(function (error) {
            alert("El servidor ha tardado mucho en responder2")
        });
    }
} );      