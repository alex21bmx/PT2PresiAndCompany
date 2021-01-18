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
                document.getElementById("categoriaAct").value = "historical";
            }else if(categoria=="adventures"){
                document.getElementById("categoriaAct").value = "adventures";
            }else if(categoria=="mountaineering"){
                document.getElementById("categoriaAct").value = "mountaineering";
            }else if(categoria=="family"){
                document.getElementById("categoriaAct").value = "family";
            }else{
                document.getElementById("categoriaAct").value = "romantic";
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
            if(document.getElementById("popup-12").classList.contains("active")){
                cargarExperienciasUser(localStorage.getItem("user_id"));
                localStorage.setItem("currentPopup",12);
            }
            break;
        case 16:
            document.getElementById("popup-13").classList.toggle("active");
            if(localStorage.getItem("currentPopup")==12){
                document.getElementById("popup-12").classList.toggle("active");
            }else{
                document.getElementById("popup-14").classList.toggle("active");
            }
            let json = JSON.parse(localStorage.getItem("jsonTuExp"));
            let categoria2 = json[index]["categoria"];
            if(categoria2=="historical"){
                document.getElementById("categoriaTusExp").value = "historical";
            }else if(categoria2=="adventures"){
                document.getElementById("categoriaTusExp").value = "adventures";
            }else if(categoria2=="mountaineering"){
                document.getElementById("categoriaTusExp").value = "mountaineering";
            }else if(categoria2=="family"){
                document.getElementById("categoriaTusExp").value = "family";
            }else{
                document.getElementById("categoriaTusExp").value = "romantic";
            }
            let estado = json[index]["estado"];
            if(estado=="Esbozo"){
                document.getElementById("estadoTusExp").value = "Esbozo";
            }else{
                document.getElementById("estadoTusExp").value = "Publicada";
            }
            document.getElementById("imagenTusExp").value = json[index]["imagen"];
            document.getElementById("latitudTusExp").value = json[index]["latitud"];
            document.getElementById("longitudTusExp").value = json[index]["longitud"];
            document.getElementById("localizacionTusExp").value = json[index]["localizacion"];
            document.getElementById("textoTusExp").value = json[index]["texto"];
            document.getElementById("idTusExp").value = json[index]["id_experiencia"];
            break;
        case 17:
            document.getElementById("popup-14").classList.toggle("active");
            if(document.getElementById("popup-14").classList.contains("active")){
                cargarExperiencias();
                localStorage.setItem("currentPopup",14);
            }
            break;
        case 18:
            document.getElementById("popup-15").classList.toggle("active");
            if(document.getElementById("popup-15").classList.contains("active")){
                cargarUsuarios();
            }
            break;
        case 19:
            document.getElementById("popup-16").classList.toggle("active");
            document.getElementById("popup-15").classList.toggle("active");
            
            let json3 = JSON.parse(localStorage.getItem("jsonTuExp"));
            
            document.getElementById("userIDAdmin").value = json3[index]["id_usuario"];
            document.getElementById("usernameAdmin").value = json3[index]["username"];
            document.getElementById("passwordAdmin").value = json3[index]["password"];
            document.getElementById("roleAdmin").value = json3[index]["tipo_usuario"];
            
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