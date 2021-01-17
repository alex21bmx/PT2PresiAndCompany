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
            document.getElementById("gestionId").value = document.getElementsByClassName("id_experiencia")[index].value;
            document.getElementById("localizacionAct").placeHolder = document.getElementsByClassName("localizacion")[index].textContent;
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
    }
}

function cerrarSesion(valor){
    document.cookie = "username=" + valor + "; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    document.cookie = "admin=admin; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    Swal.fire({
        icon: 'info',
        title: 'Sesión cerrada',
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