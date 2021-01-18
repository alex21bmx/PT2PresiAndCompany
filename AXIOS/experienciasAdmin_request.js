function cargarExperiencias(){      
        axios.get('./BD/api/api.php', {
            timeout:3000,
            params: {
                id: 16
            }
        })
        .then(function (respuesta) {
            if(respuesta.data[0].status!="empty"){
                
                console.log(respuesta);
            let cadena = "";
            localStorage.setItem("jsonTuExp",JSON.stringify(respuesta.data));
            for (let index = 0; index < respuesta.data.length; index++) {
                cadena+='<p onclick="togglePopup(18,'+index+')" style="cursor: pointer;"> Localizacion: '+respuesta.data[index]["localizacion"]+' Fecha: '+respuesta.data[index]["fecha_de_publicacion"]+' ID: '+respuesta.data[index]["id_usuario"]+'</p>'+
                '<input type="hidden" class="indexAdminExp" value="'+index+'">';
            }
            document.getElementById("experienciasAdmin").innerHTML = cadena; 
                
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
            alert("El servidor ha tardado mucho en responder2")
        })
        .then(function () {
        });   
}  