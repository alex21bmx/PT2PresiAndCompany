function cargaExperienciasReportadas(){
    axios.get('./BD/api/api.php', {
        timeout:10000,
        params: {
            id: 14
        }
    })
    .then(function (respuesta) {
       
        if (respuesta.data.status=="fail"){
            alert("ERROR, TE HAS EQUIVOCADO");
        }
        else{
            console.log(respuesta);
            let cadena = "";
            for (let index = 0; index < respuesta.data.length; index++) {
                cadena+='<p onclick="togglePopup(13,'+index+')" style="cursor: pointer;"> id: '+respuesta.data[index]["id_experiencia"]+' Fecha: '+respuesta.data[index]["fecha_de_publicacion"]+'</p>'+
                '<input type="hidden" class="reportedImg" value="'+respuesta.data[index]["imagen"]+'">'+
                '<input type="hidden" class="reportedId" value="'+respuesta.data[index]["id_experiencia"]+'">'+ 
                '<input type="hidden" class="reportedText" value="'+respuesta.data[index]["texto"]+'">'+
                '<input type="hidden" class="reportedTitle" value="'+respuesta.data[index]["localizacion"]+'">';
            }
            document.getElementById("experienciasReport").innerHTML = cadena;
            /*
            if(respuesta.data[0].status!="empty"){
                
                document.getElementById("experienciasReport").innerHTML += cadena; 
                
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No hay mas resultados',
                    showConfirmButton: false,
                    timer: 1500
                  })
            } */       
        }
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });         
}