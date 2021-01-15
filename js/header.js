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
            document.getElementById("numIndex").innerHTML = index;
            break;

    }
}

function cerrarSesion(valor){
    document.cookie = "username=" + valor + "; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    window.location.reload();
    alert("Sesión cerrada");
}