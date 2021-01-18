function deleteExperiencia(num){
    let idExp;
    if(num==0)
        idExp = document.getElementById("gestionId").value;
    else
        idExp = document.getElementById("idTusExp").value;
    axios.get('./BD/api/api.php', {
        timeout:10000,
        params: {
            id_experiencia: idExp,
            id: 9
        }
    })
    .then(function (respuesta) {
        console.log(respuesta);
        if (respuesta.data.status=="ok"){
            if(num==0)
                document.getElementById("popup-7").classList.toggle("active");
            else
                document.getElementById("popup-13").classList.toggle("active");
            Swal.fire({
                icon: 'success',
                title: 'Experience deleted',
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(function(){
                window.location.reload();
            }, 1500);
        }
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });
}