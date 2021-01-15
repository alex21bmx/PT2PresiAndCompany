function deleteExperiencia(){
    let idExp = document.getElementById("gestionId").value;
    axios.get('./BD/api/api.php', {
        timeout:10000,
        params: {
            id_experiencia: idExp,
            id: 9
        }
    })
    .then(function (respuesta) {
        console.log(respuesta);
        if (respuesta.data=="ok"){
            alert("Experiencia creada!");
            document.getElementById("popup-5").classList.toggle("active");
        }
        location.reload();
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });
}