function togglePopup(num,index){
    switch (num){
        case 1:
            document.getElementById("popup-1").classList.toggle("active");
            break;
        case 2:
            document.getElementById("popup-2").classList.toggle("active");
            break;
        case 3:
            document.getElementById("popup-3").classList.toggle("active");
            break;
        case 4:
            document.getElementById("popup-3").classList.toggle("active");
            document.getElementById("popup-4").classList.toggle("active");
            break;
        case 5:
            document.getElementById("popup-4").classList.toggle("active");
            break;
        case 6:
            document.getElementById("popup-5").classList.toggle("active");
            break;
        case 7:
            document.getElementById("popup-6").classList.toggle("active");
            document.getElementById("popExpFoto").style.backgroundImage = document.getElementsByClassName("experienciaInner")[index].style.backgroundImage;
            document.getElementById("popExpTitol").innerHTML = document.getElementsByClassName("localizacion")[index].textContent;
            document.getElementById("popExpFecha").innerHTML = document.getElementsByClassName("usuarioYfecha")[index].textContent;
            document.getElementById("popExpCoords").innerHTML = document.getElementsByClassName("coordenadas")[index].textContent;
            document.getElementById("popExpTexto").innerHTML = document.getElementsByClassName("textoExp")[index].value;
            break;
        case 8:
            document.getElementById("popup-7").classList.toggle("active");
            let categoria = document.getElementsByClassName("categoriaExperiencia")[index].textContent;
            if(categoria=="historical"){
                document.getElementById("categoriaAct").value = "historico";
            }else if(categoria=="adventures"){
                document.getElementById("categoriaAct").value = "aventuras";
            }else if(categoria=="mountaineering"){
                document.getElementById("categoriaAct").value = "montañismo";
            }else if(categoria=="family"){
                document.getElementById("categoriaAct").value = "familiar";
            }else{
                document.getElementById("categoriaAct").value = "romantico";
            }
            let str = document.getElementsByClassName("experienciaInner")[index].style.backgroundImage;
            let img = str.substring(
                str.lastIndexOf("(") + 2, 
                str.lastIndexOf(")") - 1
            );
            let str2 = document.getElementsByClassName("coordenadas")[index].textContent;
            document.getElementById("imagenAct").value = img;
            document.getElementById("latitudAct").value = str2.substring(
                0, 
                str2.lastIndexOf(",")
            );
            document.getElementById("longitudAct").value = str2.substring(
                str2.lastIndexOf(",") +1, 
                str2.length
            );
            document.getElementById("localizacionAct").value = document.getElementsByClassName("localizacion")[index].textContent;
            document.getElementById("textoAct").value = document.getElementsByClassName("textoExp")[index].value;
            document.getElementById("gestionId").value = document.getElementsByClassName("id_experiencia")[index].value;
            break;
        case 9:
            document.getElementById("popup-8").classList.toggle("active");
            break;
        case 10:
            document.getElementById("popup-8").classList.remove("active");
            document.getElementById("popup-9").classList.remove("active");
            break;
        case 11:
            document.getElementById("popup-9").classList.toggle("active");
            break;
        case 12:
            document.getElementById("popup-10").classList.toggle("active");
            if(document.getElementById("popup-10").classList.contains("active")){
                cargaExperienciasReportadas();
            }
            break;
        case 13:
            document.getElementById("popup-10").classList.toggle("active");
            document.getElementById("popup-11").classList.toggle("active");
            document.getElementById("reportedId").value = document.getElementsByClassName("reportedId")[index].value;
            document.getElementById("reportedImg").src = document.getElementsByClassName("reportedImg")[index].value;
            document.getElementById("reportedTitle").innerHTML = "Titulo: "+document.getElementsByClassName("reportedTitle")[index].value;
            document.getElementById("reportedText").innerHTML = "Texto: "+document.getElementsByClassName("reportedText")[index].value;
            break;
        case 14:
            document.getElementById("popup-10").classList.toggle("active");
            document.getElementById("popup-11").classList.toggle("active");
            cargaExperienciasReportadas();
            break;
        case 15:
            document.getElementById("popup-12").classList.toggle("active");
            break;
    }
}

function cerrarSesion(valor){
    document.cookie = "username=" + valor + "; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    document.cookie = "admin=admin; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    Swal.fire({
        icon: 'info',
        title: 'Logged out',
        showConfirmButton: false,
        timer: 1500
      })
      setTimeout(function(){
        window.location.reload();
      }, 1500);
}
function aplicaFiltros(){
    try {
        if(document.getElementById("filtroUser").value==""){
            localStorage.setItem("filtroUser","null");
        }else{
            localStorage.setItem("filtroUser",document.getElementById("filtroUser").value);
        }
    } catch (error) {
        localStorage.setItem("filtroUser","null");
    }
    localStorage.setItem("filtroLikes",document.getElementById("filtroLikes").value);
    localStorage.setItem("filtroCategoria",document.getElementById("filtroCategoria").value);
    localStorage.setItem("filtresOn","si");
    location.reload();
}
function reiniciaFiltros(){
    localStorage.setItem("filtroCategoria","null");
    localStorage.setItem("filtroUser","null");
    localStorage.setItem("filtroLikes","null");
    localStorage.setItem("filtresOn","no");
}