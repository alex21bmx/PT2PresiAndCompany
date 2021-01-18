function cargarExperienciasUser(usuario){
        axios.get('./BD/api/api.php', {
            timeout:10000,
            params: {
                username: usuario,
                id: 17
            }
        })
        .then(function (respuesta) {
            if(respuesta.data[0].status!="empty"){
                
                console.log(respuesta);
            let cadena = "";
            localStorage.setItem("jsonTuExp",JSON.stringify(respuesta.data));
            for (let index = 0; index < respuesta.data.length; index++) {
                cadena+='<p onclick="togglePopup(16,'+index+')" style="cursor: pointer;"> Localizacion: '+respuesta.data[index]["localizacion"]+' Fecha: '+respuesta.data[index]["fecha_de_publicacion"]+'</p>'+
                '<input type="hidden" class="indexTusExp" value="'+index+'">';
            }
            document.getElementById("tusExperiencias").innerHTML = cadena; 
                
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No experiences',
                    showConfirmButton: false,
                    timer: 1500
                  })  
            }         
        })
        .catch(function (error) {
            alert("tus experiencias")
        });
}      