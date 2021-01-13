function likea(numero){
    let id_exp = document.getElementsByClassName("id_experiencia")[numero].value;
    let id_user = localStorage.getItem("user_id");
    if(document.getElementById("like"+numero).classList.contains("likeado")){
        document.getElementById("like"+numero).style.backgroundPosition = "left";
        document.getElementById("like"+numero).classList.remove('likeado');
        borraLike(id_user,id_exp);//Axios quitar like
    }else{
        document.getElementById("like"+numero).classList.add('is_animating');
        document.getElementById("like"+numero).style.backgroundPosition = "right";
        document.getElementById("like"+numero).classList.add('likeado');
        donaLike(id_user,id_exp);//Axios poner like
    }
}
function finished(numero){
    document.getElementById("like"+numero).classList.remove('is_animating');
}
function comprovaLike(numero){
    let id_exp = document.getElementsByClassName("id_experiencia")[numero].value;
    let id_user = localStorage.getItem("user_id");
    IsLiked(id_user,id_exp);
}