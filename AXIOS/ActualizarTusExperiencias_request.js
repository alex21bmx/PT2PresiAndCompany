document.getElementById("crearTusExp").addEventListener("click",function(){
    if(document.getElementById("textoTusExp").value.length != 0 && document.getElementById("imagenTusExp").value.length != 0 && document.getElementById("categoriaTusExp").value.length != 0 &&
    document.getElementById("localizacionTusExp").value.length != 0){
        axios.get('./BD/api/api.php', {
            timeout:10000,
            params: {
                id_experiencia: document.getElementById("idTusExp").value,
                texto: document.getElementById("textoTusExp").value,
                imagen: document.getElementById("imagenTusExp").value,
                categoria: document.getElementById("categoriaTusExp").value,
                latitud: document.getElementById("latitudTusExp").value,
                longitud: document.getElementById("longitudTusExp").value,
                localizacion: document.getElementById("localizacionTusExp").value,
                id: 8
            }
        })
        .then(function (respuesta) {
            console.log(respuesta);
            if (respuesta.data.status=="ok"){
                document.getElementById("popup-13").classList.toggle("active");
                Swal.fire({
                    icon: 'success',
                    title: 'Experience updated',
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
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Fill in the required fields',
            showConfirmButton: false,
            timer: 1500
        });
    }
} );      