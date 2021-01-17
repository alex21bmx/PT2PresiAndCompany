function actualizarEstadoReport(){
        axios.get('./BD/api/api.php', {
            timeout:10000,
            params: {
                idExperiencia: "773",
                id: 18
            }
        })
        .then(function (respuesta) {
            console.log(respuesta);            
        })
        .catch(function (error) {
            alert("El servidor ha tardado mucho en responder2")
        });
}     