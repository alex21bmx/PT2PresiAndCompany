function cargarUsuarios(){      
        axios.get('./BD/api/api.php', {
            timeout:10000,
            params: {
                id: 15
            }
        })
        .then(function (respuesta) {
            console.log(respuesta);
            if(respuesta.data[0].status!="empty"){
                
               
            let cadena = "";
            localStorage.setItem("jsonTuExp",JSON.stringify(respuesta.data));
            for (let index = 0; index < respuesta.data.length; index++) {
                cadena+='<p onclick="togglePopup(19,'+index+')" style="cursor: pointer;"> ID: '+respuesta.data[index]["id_usuario"]+' Username: '+respuesta.data[index]["username"]+' Role: '+respuesta.data[index]["tipo_usuario"]+'</p>'+
                '<input type="hidden" class="indexUsersAdmin" value="'+index+'">';
            }
            document.getElementById("usersAdmin").innerHTML = cadena; 
                
            }else{
                 
            }         
        })
        .catch(function (error) {
            alert("Users")
        })
        .then(function () {
        });   
}  