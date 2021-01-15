function donaLike(idusuari,idexperiencia) {
    axios.get('./BD/api/api.php', {
        timeout:10000,
        params: {
            iduser: idusuari ,
            idexp: idexperiencia ,
            id: 10
        }
    })
    .then(function (respuesta) {
       
        if (respuesta.data.status=="fail"){
            document.getElementById("login").innerHTML="Validar"
            alert("ERROR, TE HAS EQUIVOCADO")
        }

        console.log(respuesta);
        
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });         
}
function borraLike(idusuari,idexperiencia) {
    axios.get('./BD/api/api.php', {
        timeout:10000,
        params: {
            iduser: idusuari ,
            idexp: idexperiencia ,
            id: 11
        }
    })
    .then(function (respuesta) {
       
        if (respuesta.data.status=="fail"){
            document.getElementById("login").innerHTML="Validar"
            alert("ERROR, TE HAS EQUIVOCADO")
        }

        console.log(respuesta);
        
        
    })
    .catch(function (error) {
        alert("El servidor ha tardado mucho en responder2")
    });         
}
function IsLiked(idusuari,idexperiencia,numero){
    axios.get('./BD/api/api.php', {
        timeout:10000,
        params: {
            iduser: idusuari ,
            idexp: idexperiencia ,
            id: 12
        }
    })
    .then(function (respuesta) {
       
        if (respuesta.data.status=="fail"){
            document.getElementById("login").innerHTML="Validar"
            alert("ERROR, TE HAS EQUIVOCADO")
        }
        if (respuesta.data.status=="ok"){
            document.getElementById("like"+numero).style.backgroundPosition = "right";
            document.getElementById("like"+numero).classList.add('likeado');
        }      
        
    })
    .catch(function (error) {
        
    }); 
}
