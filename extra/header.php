<link rel="stylesheet" href="css/estils.css">
<div id="header">
    <div id="fraseHeader">
        <p>Never let your memories be greater than your dreams</p>
    </div>
    <div id="titolHeader">
        <img id="logo" src="./src/presiLogo.png" alt="">
    </div>
    <div id="botonsDivHeader">
        
            <button class="headerBttn" onclick="togglePopup(1)"><img id="searchBttn" src="./src/buscar.jpg" alt=""></button>
        
        
            <button class="headerBttn" onclick="togglePopup(2)"><img id="staffBttn" src="./src/staff.ico" alt=""></button>
        
            <?php
                if(isset($_COOKIE["username"])){
                    $prueba = $_COOKIE["username"];
                    echo '<nav>
                        <ul>
                            <li><div>'.$_COOKIE["username"].'</div>
                            <div>
                                <ul>
                                    <li onclick="togglePopup(6)"><div>Crear experiencia</div></li>
                                    <li onclick=""><div>Tus experiencias</div></li>
                                    <li onclick="cerrarSesion('."'$prueba'".')"><div>Cerrar Sesión</div></li>
                                </ul>
                            </div>
                            </li>
                        </ul>
                    </nav>';
                }else{
                    echo '<button class="headerBttn" onclick="togglePopup(3)"><img id="logInBttn" src="./src/key.ico" alt=""></button>';
                }
            ?>
    <!--SEARCH POP-UP--> 
    </div>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup(1)">&times;</div>
            <div class="search-container">
                <form action="/action_page.php"> <!--Aquí poner el php o js que haga la accion de buscar-->
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
    </div>
        </div>
    </div>
    <!--STAFF POP-UP-->
    <div class="popup" id="popup-2">
        <div class="overlay"></div>
        <div class="contentStaff">
            <div class="close-btn" onclick="togglePopup(2)">&times;</div>
            <h1>Staff</h1>
            <div class="row">
                <div class="column">
                    <div class="card">
                    <img src="./src/alex.PNG" alt="" style="width:100%">
                    <div class="container">
                        <h2>Àlex Pérez Fernández</h2>
                        <p class="title">The Humble</p>
                        <p>Fantastic person, code machine.</p>
                        <p>a18aleperfer@inspedralbes.cat</p>
                        <p><button class="button">Contact</button></p>
                    </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                    <img src="./src/sergio.PNG" alt="" style="width:100%">
                    <div class="container">
                        <h2>Sergio Grima Bravo</h2>
                        <p class="title">The Rock</p>
                        <p>Lift the dumbbells like nothing. He's terrible.</p>
                        <p>a18sergribra@inspedralbes.cat</p>
                        <p><button class="button">Contact</button></p>
                    </div>
                    </div>
                </div>
                
                <div class="column">
                    <div class="card">
                    <img src="./src/arnau.PNG" alt="" style="width:100%">
                    <div class="container">
                        <h2>Arnau Fernández Jerez</h2>
                        <p class="title">The President</p>
                        <p>Their presence wanders from capitalism.</p>
                        <p>a18arnferjer@inspedralbes.cat</p>
                        <p><button class="button">Contact</button></p>
                    </div>
                    </div>
                </div>
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
                    <label for="username">Username</label>
                    <input id="username" type="text" placeholder="Enter Username">
                    <!--PASS INPUT-->
                    <label for="password">Password</label>
                    <input id="password" type="password" placeholder="Enter Password">
                    <input type="submit" value="Log In" id="login">
            <hr></hr> 
            <button id="nouUsuari" onclick="togglePopup(4)">Don't have An account?</button><br>
            <a href="#">Lost your Password?</a><br>
        </div>
    </div>
    <div class="popup" id="popup-4">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup(5)">&times;</div>
            <h1>Sign-up</h1>
            <form>
                <input type="text" id="newUsername" name="newUsername" placeholder="Usuari" required><br>
                <input type="password" id="newPassword" name="newPassword" placeholder="Contrasenya" required><br>
                <input type="button" value="signup" id="signup">
            </form>
        </div>
    </div>
    <!--CREAR EXPERIENCIA POP-UP-->
    <div class="popup" id="popup-5">
        <div class="overlay"></div>
        <div class="content">
        <div class="close-btn" onclick="togglePopup(6)">&times;</div>
            <h2>POST AN EXPERIENCE</h2>
            
            <form id="crearExperiencia">
                <div class = "categories">
                    <select id="estado">
                        <option value="0">Archive</option> 
                        <option selected value="1">Post</option> 
                    </select><br><br>
                        <!--<input type="checkbox" id="categoria1" name="categoria1" value="aventures">
                        <label for="categoria1">ADVENTURES</label>
                        <input type="checkbox" id="categoria2" name="categoria2" value="muntanyisme">
                        <label for="categoria2">MOUNTAIN</label>
                        <input type="checkbox" id="categoria3" name="categoria3" value="familiar">
                        <label for="categoria3">FAMILIAR</label>
                        <input type="checkbox" id="categoria4" name="categoria4" value="historic">
                        <label for="categoria4">HISTORICAL</label>
                        <input type="checkbox" id="categoria5" name="categoria5" value="romantic">
                        <label for="categoria5">ROMANTIC</label>-->
                </div>
                <div class="mas_info">
                    <input type="text" id="localizacion" name="localizacion" placeholder="Location" required><br>
                    <input type="text" id="imagen" name="imagen" placeholder="Img - (URL)" required><br>
                    <input type="number" id="latitud" name="latitud" placeholder="Latitude"> 
                    <input type="number" id="longitud" name="longitud" placeholder="Longitude"><br><br>
                    <input type="text" id="texto" name="texto" placeholder="Write a description..." required><br>
                </div>
                <select id="estado">
                    <option value="0">Archive</option> 
                    <option selected value="1">Post</option> 
                </select><br><br>
                <input type="button" value="✔" id="crear"><br>
                <?php 
                echo '<input id="username" style="visibility:hidden" value="'. $prueba . '">';
                ?>
            </form>
        </div>
    </div>
</div>
<script src="./js/header.js"></script>
<script src="./AXIOS/login_request.js"></script>
<script src="./AXIOS/signup_request.js"></script>
<script src="./AXIOS/crearExperiencia_request.js"></script>