function actualizarEstadoReportAdd(id){
        axios.get('./BD/api/api.php', {
            timeout:10000,
            params: {
                idExperiencia: id,
                id: 19
            }
        })
        .then(function (respuesta) {
            console.log(respuesta); 
            Swal.fire({
                icon: 'success',
                title: 'Reported',
                showConfirmButton: false,
                timer: 1500
              })           
        })
        .catch(function (error) {
            alert("El servidor ha tardado mucho en responder2")
        });
}     