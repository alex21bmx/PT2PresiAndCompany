function deleteExperienciaReportada(){
    axios.get('./BD/api/api.php', {
        timeout:10000,
        params: {
            id_experiencia: document.getElementById("reportedId").value,
            id: 9
        }
    })
    .then(function (respuesta) {
        togglePopup(14);
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });
}