document.getElementById("cargamas").addEventListener("click",function(){
    document.getElementById("numero").value = parseInt(document.getElementById("numero").value)+8;
    document.getElementById("cargamas").innerHTML = "";
    document.getElementById("cargamas").classList.add("lds-dual-ring");
    console.log(document.getElementById("numero").value);
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
            if(respuesta.data[0].status!="empty"){
                let cadena= localStorage.getItem('cadena');
                for (let index = parseInt(document.getElementById("numero").value)-8; index < respuesta.data.length; index++) {
                    let color = "";
                    switch (respuesta.data[index]["categoria"]){
                        case "aventures":
                            color = "#40731D";
                            break; 
                        case "muntanyisme":
                            color = "#633E36";
                            break; 
                        case "familiar":
                            color = "#01709A";
                            break; 
                        case "historic":
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
                localStorage.setItem('tamany',respuesta.data.length);
                localStorage.setItem('cadena',cadena);
                document.getElementById("grid-container").innerHTML = cadena; 
                for (let index = 0; index < respuesta.data.length; index++) {
                    let element = document.getElementById("like"+index);
                    element.addEventListener("click", function(){ likea(index); });
                    element.addEventListener("webkitAnimationEnd", function(){ finished(index); });
                    comprovaLike(index);
                }
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No hay mas resultados',
                    showConfirmButton: false,
                    timer: 1500
                  })
            } 
            document.getElementById("cargamas").innerHTML = "SHOW MORE";
            document.getElementById("cargamas").classList.remove("lds-dual-ring");            
        }
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });         
});