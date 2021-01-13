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
                                    <li onclick="cerrarSesion('."'$prueba'".')"><div>Tus experiencias</div></li>
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
        <div class="content">
            <div class="close-btn" onclick="togglePopup(3)">&times;</div>
            <div id="logInHeader">
                <img id="logoHeader" src="./src/presiLogoPopUp.png" alt="">
            </div>
            <hr></hr>
            <div id="logInRegister">
                <h1>Login or register</h1>
            </div>
            <form>
                <input type="text" name="" id="username1" placeholder="Usuari" required><br>
                <input type="password" name="" id="password1" placeholder="Contrasenya" required><br>                    
                <input type="button" value="Login" id="login">
            </form>
            <button id="nouUsuari" onclick="togglePopup(4)">Register</button>
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
            <h1>Crear experiencia</h1>
            <form>
                <input type="text" id="localizacion" name="localizacion" placeholder="Localització" required><br>
                <input type="text" id="imagen" name="imagen" placeholder="Imatge(URL)" required><br>
                <h5>Categories</h5>
                <input type="checkbox" id="categoria1" name="categoria1" value="aventures">
                <label for="categoria1">Aventures</label>
                <input type="checkbox" id="categoria2" name="categoria2" value="muntanyisme">
                <label for="categoria2">Muntanyisme</label>
                <input type="checkbox" id="categoria3" name="categoria3" value="familiar">
                <label for="categoria3">Familiar</label>
                <input type="checkbox" id="categoria4" name="categoria4" value="historic">
                <label for="categoria4">Històric</label>
                <input type="checkbox" id="categoria5" name="categoria5" value="romantic">
                <label for="categoria5">Romàntic</label>
                <input type="number" id="latitud" name="latitud" placeholder="Latitud"> 
                <input type="number" id="longitud" name="longitud" placeholder="Longitud"><br><br>
                <input type="text" id="texto" name="texto" placeholder="Descripció"><br>
                <select>
                    <option value="0">Esbozo</option> 
                    <option selected value="1">Publicada</option> 
                </select><br><br>
                <input type="button" value="Crear" id="crear">
            </form>
        </div>
    </div>
</div>
<script src="./js/header.js"></script>
<script src="./AXIOS/login_request.js"></script>
<script src="./AXIOS/signup_request.js"></script>