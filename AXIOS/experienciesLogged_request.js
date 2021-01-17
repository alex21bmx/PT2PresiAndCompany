window.onload = function() {
    if(localStorage.getItem("filtresOn")!="si"){
        reiniciaFiltros();
    }
    axios.get('./BD/api/api.php', {
        timeout:10000,
        params: {
            size: document.getElementById("numero").value
            ,filtroUser:localStorage.getItem('filtroUser')
            ,filtroLikes:localStorage.getItem('filtroLikes')
            ,filtroCategoria:localStorage.getItem('filtroCategoria')
            ,id: 7
        }
    })
    .then(function (respuesta) {
       
        if (respuesta.data.status=="fail"){
            alert("ERROR, TE HAS EQUIVOCADO");
        }
        else{ 
            console.log(respuesta); 
            let cadena= "";
            if(respuesta.data[0].status!="empty"){
                for (let index = parseInt(document.getElementById("numero").value)-8; index < respuesta.data.length; index++) {
                    let color = "";
                        switch (respuesta.data[index]["categoria"]){
                            case "adventures":
                            color = "#40731D";
                            break; 
                        case "mountaineering":
                            color = "#633E36";
                            break; 
                        case "family":
                            color = "#01709A";
                            break; 
                        case "historical":
                            color = "#779606";
                            break; 
                        case "romantic":
                            color = "#660271";
                            break;
                        }
                    let cadena2 = "";
                    if(respuesta.data[index]["id_usuario"]==localStorage.getItem("user_id")){
                        cadena2 = '<a class="gestion" onclick="togglePopup(8,'+index+')">Gestionar</a>';
                    }
                    cadena+=
                    '<div class="experienciaOutter">'+
                            '<input type="hidden" class="id_experiencia" value="'+respuesta.data[index]["id_experiencia"]+'">'+
                            '<input type="hidden" class="textoExp" value="'+respuesta.data[index]["texto"]+'">'+
                            '<div class="experienciaMiddle" style="background-color:'+color+';">'+
                                '<h4 class="categoriaExperiencia">'+respuesta.data[index]["categoria"]+'</h4>'+
                                '<div class="experienciaInner" onclick="togglePopup(7,'+index+')" style="background-image: url('+respuesta.data[index]["imagen"]+'");>'+
                                    '<div class="ultimaCapa">'+
                                        '<h4 class="localizacion">'+respuesta.data[index]["localizacion"]+'</h4>'+
                                        '<h4 class="coordenadas">'+respuesta.data[index]["latitud"]+','+respuesta.data[index]["longitud"]+'</h4>'+ 
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<h4 class="usuarioYfecha">'+respuesta.data[index]["fecha_de_publicacion"]+' - '+respuesta.data[index]["usuario"]+'</h4>'+
                            '<div class="likecontent">'+
                                '<div id="like'+index+'" class="heart"></div>'+
                                cadena2+
                                '<h4 class="numLike odometer">'+respuesta.data[index]["valoraciones"]+'</h4>'+
                            '</div>'+
                        '</div>';
                }
                localStorage.setItem('cadena',cadena);
                document.getElementById("grid-container").innerHTML = cadena;   
                for (let index = parseInt(document.getElementById("numero").value)-8; index < respuesta.data.length; index++) {
                    let element = document.getElementById("like"+index);
                    element.addEventListener("click", function(){ likea(index); });
                    element.addEventListener("webkitAnimationEnd", function(){ finished(index); });
                    comprovaLike(index);
                }
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No more results',
                    showConfirmButton: false,
                    timer: 1500
                  })
                setTimeout(function(){
                    window.location.reload();
                }, 1500);
            } 
            localStorage.setItem("filtresOn","no");
        }
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });         
  };