function actualizarEstadoReport(){
        axios.get('./BD/api/api.php', {
            timeout:10000,
            params: {
                idExperiencia: document.getElementById("reportedId").value,
                id: 18
            }
        })
        .then(function (respuesta) {
            console.log(respuesta); 
            togglePopup(14);          
        })
        .catch(function (error) {
            alert("El servidor ha tardado mucho en responder2")
        });
}     