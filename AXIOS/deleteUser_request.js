function deleteUser(){
    axios.get('./BD/api/api.php', {
        timeout:3000,
        params: {
            user: document.getElementById("userIDAdmin").value,
            id: 5
        }
    })
    .then(function (respuesta) {

        console.log(respuesta);
        Swal.fire({
            icon: 'success',
            title: 'User deleted',
            showConfirmButton: false,
            timer: 1500
        });
        togglePopup(19);
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder");
    })
    .then(function () {
    });         
}