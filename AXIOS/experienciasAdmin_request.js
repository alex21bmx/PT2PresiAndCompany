function cargarExperiencias(){      
        axios.get('./BD/api/api.php', {
            timeout:3000,
            params: {
                id: 16
            }
        })
        .then(function (respuesta) {
            console.log(respuesta);
        })
        .catch(function (error) {
            alert("El servidor ha tardado mucho en responder2")
        })
        .then(function () {
        });   
}  