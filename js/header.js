function togglePopup(num){
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

    }
}