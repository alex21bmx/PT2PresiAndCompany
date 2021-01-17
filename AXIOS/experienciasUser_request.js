function cargarExperienciasUser(usuario){
        axios.get('./BD/api/api.php', {
            timeout:10000,
            params: {
                username: usuario,
                id: 17
            }
        })
        .then(function (respuesta) {
            console.log(respuesta);          
        })
        .catch(function (error) {
            alert("El servidor ha tardado mucho en responder2")
        });
}      