document.getElementById("crear").addEventListener("click",function(){
    console.log("hola");
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
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });
} );      