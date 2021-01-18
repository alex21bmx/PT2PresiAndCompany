<link rel="stylesheet" href="css/estils.css">
<div id="header">
    <div id="fraseHeader">
        <p>Never let your memories be greater than your dreams</p>
    </div>
    <div id="titolHeader">
        <img id="logo" src="./src/presiLogo.png" alt="">
    </div>
    <div id="botonsDivHeader">
        
    <?php
                if(isset($_COOKIE["username"]))
                    echo '<button class="headerBttn" onclick="togglePopup(1)"><img id="searchBttn" src="./src/buscar.jpg" alt=""></button>';
            ?>

            <?php
                if(isset($_COOKIE["username"])){
                    $valor = $_COOKIE["admin"];
                    if($valor == "admin")
                        echo '<button class="headerBttn" onclick="togglePopup(11)" id="admin"><img id="adminBttn" src="./src/admin.png" alt=""></button>';
                }
            ?>

            <button class="headerBttn" onclick="togglePopup(2)"><img id="staffBttn" src="./src/staff.ico" alt=""></button>

            <?php
                if(isset($_COOKIE["username"])){
                    $prueba = $_COOKIE["username"];
                    echo '<button class="headerBttn" onclick="togglePopup(9)" id="admin"><img id="logInBttn" src="./src/user.png" alt=""></button>';

                }else{
                    echo '<button class="headerBttn" onclick="togglePopup(3)"><img id="logInBttn" src="./src/key.ico" alt=""></button>';
                }
            ?>
            </div>
     <!--Usuario Admin POP-UP-->
     <div class="popup" id="popup-16">
        <div class="overlay"></div>
        <div class="usersAdmin">
            <h1 id="" style="color:white">User edit</h1>
            <div class="close-btn" onclick="togglePopup(19)">&times;</div>
            <input type="hidden" id="userIDAdmin" placeholder="ID"></input><br>
            <input type="text" id="usernameAdmin" placeholder="Username"></input><br>
            <input type="text" id="passwordAdmin" placeholder="Password"></input><br>
            <input type="text" id="roleAdmin" placeholder="Role"></input><br><br>
            <input type="button" value="Update" id="UpdateUserAdmin" onclick="updateUsuario()">
            <input type="button" value="Delete" id="deleteUserAdmin" onclick="deleteUser()">
        </div>
    </div>

    <!--Usuarios Admin POP-UP-->
    <div class="popup" id="popup-15">
        <div class="overlay"></div>
        <div class="usersAdmin">
            <h1 id="" style="color:white">Usuarios</h1>
            <div class="close-btn" onclick="togglePopup(18)">&times;</div>
            <div id="usersAdmin"></div>
        </div>
    </div>
    <!--Tus experiencias POP-UP-->
    <div class="popup" id="popup-14">
        <div class="overlay"></div>
        <div class="contentTusExperiencias">
            <h1 id="" style="color:white">Experiences</h1>
            <div class="close-btn" onclick="togglePopup(17)">&times;</div>
            <div id="experienciasAdmin"></div>
        </div>
    </div>

    <!--Tu experiencia POP-UP-->
    <div class="popup" id="popup-13">
        <div class="overlay"></div>
            <div class="contentMyexperiences">
                <div class="close-btn" onclick="togglePopup(16)">&times;</div>
                <div class="wrapper wrapper--w780">
                    <div class="card card-3">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Edit an Experience</h2>
                            <form>
                            <div class="input-group">
                                <input id="localizacionTusExp" class="input--style-3" type="text" placeholder="Location" name="localizacion">
                            </div>
                            <div class="input-group">
                                <input id="latitudTusExp" class="input--style-3" type="number" placeholder="Latitude" name="latitud">
                                <input id="longitudTusExp" class="input--style-3" type="number" placeholder="Length" name="longitud">
                            </div>
                            <div class ="input-group">
                            <div class = "categories">
                            <select id="categoriaTusExp">
                                <option selected value="adventures">Adventures ✈</option> 
                                <option value="mountaineering">Mountaineering 🌄</option>
                                <option value="family">Familiar 👪</option> 
                                <option value="historical">Historical 📖</option>
                                <option value="romantic">Romantic 💏</option> 
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                        <br>
                        <div class="mas_info">
                            <input type="text" id="imagenTusExp" name="imagen" placeholder="Img - (URL)" required><br>
                            <h3 class="descEditExp">Description</h3>
                            <input type="text" id="textoTusExp" name="texto" placeholder="Write a description ..." required><br>
                        </div>
                        <br>
                        <select id="estadoTusExp">
                            <option value="Esbozo">Archived</option> 
                            <option value="Publicada">Posted</option> 
                        </select><br><br>
                        <input type="button" value="Update" id="crearTusExp" class="crear crear--pill crear-orange">
                        <div><br><br>
                        <input type="button" value="Delete" id="crearTusExp" onclick="deleteExperiencia(1)" class="crear crear--pill crear-orange">
                        </div>
                        <input type="hidden" id="idTusExp" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <!--Tus experiencias POP-UP-->
    <div class="popup" id="popup-12">
        <div class="overlay"></div>
        <div class="contentTusExperiencias">
            <h1 id="" style="color:white">Your Experiences</h1>
            <div class="close-btn" onclick="togglePopup(15)">&times;</div>
            <div id="tusExperiencias"></div>
        </div>
    </div>

    <!--Experiencia reportada POP-UP-->
    <div class="popup" id="popup-11">
        <div class="overlay"></div>
        <div class="contentReportada">
            <div class="close-btn" onclick="togglePopup(13)">&times;</div>
            <input type="hidden" id="reportedId" value="">
            <img id="reportedImg" src="" width="300" height="300">
            <h4 id="reportedTitle"></h4>
            <h4 id="reportedText"></h4>
            <button onclick="actualizarEstadoReport()">Forgive</button>
            <button onclick="deleteExperienciaReportada()">Delete</button>
        </div>
    </div>

    <!--Experiencias reportadas POP-UP-->
    <div class="popup" id="popup-10">
        <div class="overlay"></div>
        <div class="contentReportadas">
            <h1 id="" style="color:white">Reports</h1>
            <div class="close-btn" onclick="togglePopup(12)">&times;</div>
            <div id="experienciasReport"></div>
        </div>
    </div>

    <!--OPCIONES USUARIO POP-UP-->
    <div class="popup" id="popup-8">
        <div class="overlay2"></div>
        <div class="contentOptions">
            <?php
                 echo '  <ul id="optionsUl">
                             <li ><div id="logeado_user">Logged: '.$_COOKIE["username"].'</div></li>
                             <li class="optionClickable" onclick="togglePopup(6)"><div>New Experience</div></li>
                             <li class="optionClickable" onclick="togglePopup(15)"><div>Your Experiences</div></li>
                             <li class="optionClickable" onclick="cerrarSesion('."'$prueba'".')"><div>Sign out</div></li>
                         </ul>';
            ?>
        </div>
    </div>
    <!--OPCIONES STAFF POP-UP-->
    <div class="popup" id="popup-9">
        <div class="overlay2"></div>
        <div class="contentAdmin">
            <?php
                 echo '  <ul id="optionsUl">
                             <li class="optionClickable" onclick="togglePopup(12)"><div>Reported Experiences</div></li>
                             <li class="optionClickable" onclick="togglePopup(17)"><div>Experiencies Control</div></li>
                             <li class="optionClickable" onclick="togglePopup(18)"><div>Users Control</div></li>
                         </ul>';
            ?>
        </div>
    </div>
    <!--SEARCH POP-UP--> 
    </div>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="contentSearch">
            <h1 id="filtroTitol" style="color:white">SEARCH</h1>
            <div class="close-btn" onclick="togglePopup(1)">&times;</div>
            <div class="search-container">
                <h4 class="filtroLabel" style="color:white">Filter by user</h4>
                <input type="text" name="" id="filtroUser" value="" placeholder="User"><br>

                <h4 class="filtroLabel" style="color:white">Filter by Likes</h4>
                <select class="selects" name="cars" id="filtroLikes">
                    <option value="MAS">▲ LIKES</option>
                    <option value="MENOS">▼ LIKES</option>
                    <option value="null" selected style="font-weight:bold">-</option>
                </select>

                <h4 class="filtroLabel" style="color:white">Filter by Categories</h4>
                <select class="selects" name="cars" id="filtroCategoria">
                    <option value="null">-</option>
                    <option value="adventures">Adventures ✈</option>
                    <option value="mountaineering">Mountaineering 🌄</option>
                    <option value="family">Familiar 👪</option>
                    <option value="historical">Historical 📖</option>
                    <option value="romantic">Romantic 💏</option>
                </select>
                <br><br>

                <button id="searchButton" onclick="aplicaFiltros()"><img id="searchBttn" src="./src/buscar.jpg" alt=""></button>
    </div>
        </div>
    </div>
    <!--STAFF POP-UP-->
    <div class="popup" id="popup-2">
        <div class="overlay"></div>
        <div class="contentStaff">
            <div class="close-btn" onclick="togglePopup(2)">&times;</div>
            <h1 style="color:white">Staff</h1>
            <div class="row">
                <div class="column">
                    <div class="cardStaff">
                    <img src="./src/alex.PNG" alt="" style="width:100%">
                    <div class="container">
                        <h2 style="color:white">Àlex Pérez Fernández</h2>
                        <p class="title">The Humble</p>
                        <p style="color:white">Fantastic person, code machine.</p>
                        <p style="color:white">a18aleperfer@inspedralbes.cat</p>
                        <p><button class="button">Contact</button></p>
                    </div>
                    </div>
                </div>

                <div class="column">
                    <div class="cardStaff">
                    <img src="./src/sergio.PNG" alt="" style="width:100%">
                    <div class="container">
                        <h2 style="color:white">Sergio Grima Bravo</h2>
                        <p class="title">The Rock</p>
                        <p style="color:white">Lift the dumbbells like nothing. He's terrible.</p>
                        <p style="color:white">a18sergribra@inspedralbes.cat</p>
                        <p><button class="button">Contact</button></p>
                    </div>
                    </div>
                </div>
                
                <div class="column">
                    <div class="cardStaff">
                    <img src="./src/arnau.PNG" alt="" style="width:100%">
                    <div class="container">
                        <h2 style="color:white">Arnau Fernández Jerez</h2>
                        <p class="title">The President</p>
                        <p style="color:white">Their presence wanders from capitalism.</p>
                        <p style="color:white">a18arnferjer@inspedralbes.cat</p>
                        <p><button class="button">Contact</button></p>
                    </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!--LOGIN POP-UP-->
    <div class="popup" id="popup-3">
        <div class="overlay"></div>
        <div class="contentLogin">
            <div class="close-btn" onclick="togglePopup(3)">&times;</div>
            <img class="avatar" src="./src/presiLogoPopUp.png" alt="">
            <h1>Login Here</h1>
            <form>
                    <!--USERNAME INPUT-->
                    <input id="username1" type="text" placeholder="Enter Username" required>
                    <!--PASS INPUT-->
                    <input id="password1" type="password" placeholder="Enter Password" required>
                    <input type="button" value="Log In" id="login">
            </form>
            <hr></hr> 
            <br>
            <button id="nouUsuari" onclick="togglePopup(4)">Don't have An account?</button>
        </div>
    </div>
    <div class="popup" id="popup-4">
        <div class="overlay"></div>
        <div class="contentRegister">
            <div class="close-btn" onclick="togglePopup(5)">&times;</div>
            <img class="avatar" src="./src/presiLogoPopUp.png" alt="">
            <h1><i>Sign-up</i></h1>
            <form>
                <input type="text" id="newUsername" name="newUsername" placeholder="Enter Username" required><br>
                <input type="password" id="newPassword" name="newPassword" placeholder="Enter Password" required><br>
                <input type="button" value="Sign Up" id="signup">
            </form>
        </div>
    </div>
    <!--CREAR EXPERIENCIA POP-UP-->
    <div class="popup" id="popup-5">
        <div class="overlay"></div>
        <div class="contentNewExperience">
        <div class="close-btn" onclick="togglePopup(6)">&times;</div>
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Post an Experience</h2>
                    <form>
                        <div class="input-group">
                            <input class="input--style-3" id="localizacion" type="text" placeholder="Location" name="localizacion">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" id="latitud" type="number" placeholder="Latitude" name="latitud">
                            <input class="input--style-3" id="longitud" type="number" placeholder="Length" name="longitud">
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select id="categoria">
                                    <option selected value="adventures">Adventures ✈</option> 
                                    <option value="mountaineering">Mountaineering 🌄</option>
                                    <option value="family">Familiar 👪</option> 
                                    <option value="historical">Historical 📖</option>
                                    <option value="romantic">Romantic 💏</option> 
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" id="imagen" type="text" placeholder="URL" name="imagen">
                        </div>
                        <div class="input-group">
                            <input class="input--style-4" id="texto" type="text" placeholder="Write a description ..." name="texto">
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select id="estado">
                                    <option value="Esbozo">Archived</option> 
                                    <option selected value="Publicada">Posted</option>  
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <input type="button" value="CREATE" id="crear" class="crear crear--pill crear-orange">
                        </div>
                        <?php 
                            echo '<input id="username" style="visibility:hidden" value="'. $prueba . '"required>';
                        ?>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

<script src="./js/header.js"></script>
<script src="./AXIOS/login_request.js"></script>
<script src="./AXIOS/signup_request.js"></script>
<script src="./AXIOS/crearExperiencia_request.js"></script>
<script src="./AXIOS/usuarios_request.js"></script>
<script src="./AXIOS/experienciasAdmin_request.js"></script>
<script src="./AXIOS/experienciasUser_request.js"></script>
<script src="./AXIOS/actualizarReporte_request.js"></script>
<script src="AXIOS/borrar_Experiencia_request.js"></script>
<script src="AXIOS/ActualizarTusExperiencias_request.js"></script>