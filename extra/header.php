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

            <?php
                if(isset($_COOKIE["username"])){
                    $prueba = $_COOKIE["username"];
<<<<<<< Updated upstream
                    echo '<button class="headerBttn" onclick="togglePopup(9)" id="admin"><img id="logInBttn" src="./src/key.ico" alt=""></button>';
                    
=======
                    echo '<button class="headerBttn"
                    <nav id="navMenu">
                        <ul id="menu">
                            <li><a href="">'.$_COOKIE["username"].'</a>
                                <ul id="opcionesMenu">
                                    <li onclick="togglePopup(6)"><a href="">New experience</a></li>
                                    <li onclick="cerrarSesion('."'$prueba'".')"><a href="">Sign out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    </button>';
>>>>>>> Stashed changes
                }else{
                    echo '<button class="headerBttn" onclick="togglePopup(3)"><img id="logInBttn" src="./src/key.ico" alt=""></button>';
                }
            ?>
            </div>
    <!--OPCIONES USUARIO POP-UP-->
    <div class="popup" id="popup-8">
        <div class="overlay2"></div>
        <div class="contentOptions">
            <?php
                 echo '  <ul id="optionsUl">
                             <li ><div>Loggeado: '.$_COOKIE["username"].'</div></li>
                             <li class="optionClickable" onclick="togglePopup(6)"><div>Crear experiencia</div></li>
                             <li class="optionClickable" onclick="cargarExperienciasUser('."'$prueba'".')"><div>Tus experiencias</div></li>
                             <li class="optionClickable" onclick="cerrarSesion('."'$prueba'".')"><div>Cerrar Sesión</div></li>
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
                             <li class="optionClickable" onclick=""><div>Experiencias reportadas</div></li>
                             <li class="optionClickable" onclick="cargarExperiencias()"><div>Borrar o modificar Experiencias</div></li>
                             <li class="optionClickable" onclick="cargarUsuarios()"><div>Borrar o modificar Usuarios</div></li>
                         </ul>';
            ?>
        </div>
    </div>
    <!--SEARCH POP-UP--> 
    </div>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="contentSearch">
            <h1 id="filtroTitol" style="color:white">Búsqueda</h1>
            <div class="close-btn" onclick="togglePopup(1)">&times;</div>
            <div class="search-container">
                <h4 class="filtroLabel" style="color:white">Filtrar por usuario</h4>
                <input type="text" name="" id="filtroUser" value="" placeholder="Usuario"><br>

                <h4 class="filtroLabel" style="color:white">Filtrar por Likes</h4>
                <select class="selects" name="cars" id="filtroLikes">
                    <option value="MENOS">Menos likes</option>
                    <option value="MAS">Mas likes</option>
                    <option value="null" selected>Ningúno</option>
                </select>

                <h4 class="filtroLabel" style="color:white">Filtrar por Categoria</h4>
                <select class="selects" name="cars" id="filtroCategoria">
                    <option value="null" selected>Ningúno</option>
                    <option value="aventuras">Aventuras</option>
                    <option value="montañismo">Montañismo</option>
                    <option value="familiar">Familiar</option>
                    <option value="historico">Histórico</option>
                    <option value="romantico">Romántico</option>
                </select>
                <br><br>

                <button onclick="aplicaFiltros()">Buscar</button>
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
                    <div class="card">
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
                    <div class="card">
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
                    <div class="card">
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
            <h1>Sign-up</h1>
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
        <div class="content">
        <div class="close-btn" onclick="togglePopup(6)">&times;</div>
            <h2>POST AN EXPERIENCE</h2>
            
            <form>
                <div class = "categories">
                    <select id="categoria">
                        <option selected value="aventuras">Aventuras</option> 
                        <option value="montañismo">Montañismo</option>
                        <option value="familiar">Familiar</option> 
                        <option value="historico">Histórico</option>
                        <option value="romantico">Romántico</option> 
                    </select><br><br>
                </div>
                <div class="mas_info">
                    <input type="text" id="localizacion" name="localizacion" placeholder="Localización" required><br>
                    <input type="text" id="imagen" name="imagen" placeholder="Imagen - (URL)" required><br>
                    <input type="number" id="latitud" name="latitud" placeholder="Latitud"> 
                    <input type="number" id="longitud" name="longitud" placeholder="Longitud"><br><br>
                    <input type="text" id="texto" name="texto" placeholder="Escribe una descripción..." required><br>
                </div>
                <select id="estado">
                    <option value="Esbozo">Esbozo</option> 
                    <option selected value="Publicada">Publicada</option> 
                </select><br><br>
                <input type="button" value="✔" id="crear"><br>
                <?php 
                echo '<input id="username" style="visibility:hidden" value="'. $prueba . '"required>';
                ?>
            </form>
        </div>
    </div>

<script src="./js/header.js"></script>
<script src="./AXIOS/login_request.js"></script>
<script src="./AXIOS/signup_request.js"></script>
<script src="./AXIOS/crearExperiencia_request.js"></script>
<script src="./AXIOS/usuarios_request.js"></script>
<script src="./AXIOS/experienciasAdmin_request.js"></script>
<script src="./AXIOS/experienciasUser_request.js"></script>