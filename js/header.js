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

    }
}

function cerrarSesion(valor){
    document.cookie = "username=" + valor + "; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    document.cookie = "admin=admin; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    window.location.reload();
    alert("Sesión cerrada");
}
function aplicaFiltros(){
    try {
        localStorage.setItem("filtroUser",document.getElementById("filtroUser").value);
    } catch (error) {
        localStorage.setItem("filtroUser","no");
    }
    if(document.getElementById("filtroNone").checked == true){
        localStorage.setItem("filtroLikes","no");
    }else if(document.getElementById("filtroMasLikes").checked == true){
        localStorage.setItem("filtroLikes","MAS");
    }else{
        localStorage.setItem("filtroLikes","MENOS")
    }
    localStorage.setItem("filtroCategoria",document.getElementById("filtroCategoria").value);
    location.reload();
}
function reiniciaFiltros(){
    localStorage.setItem("filtroCategoria","no");
    localStorage.setItem("filtroUser","no");
    localStorage.setItem("filtroLikes","no");
}