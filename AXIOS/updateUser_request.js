function updateUsuario(){

    axios.get('./BD/api/api.php', {
        timeout:3000,
        params: {
            user_id: document.getElementById("userIDAdmin").value,
            username: document.getElementById("usernameAdmin").value,
            tipo_usuario: document.getElementById("roleAdmin").value,
            password: document.getElementById("passwordAdmin").value,
            id: 4
        }
    })
    .then(function (respuesta) {

        console.log(respuesta);
        Swal.fire({
            icon: 'success',
            title: 'User updated',
            showConfirmButton: false,
            timer: 1500
        });
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder");
    })
    .then(function () {
    });         
}