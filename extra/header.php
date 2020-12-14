<link rel="stylesheet" href="css/estils.css">
<script src="./js/header.js"></script>
<div id="header">
    <div id="fraseHeader">
        <p>Sé capaz de hacer algo cuyas consecuencias sean para siempre. ¡Bienvenido a este nuevo día!</p>
    </div>
    <div id="titolHeader">
        <img id="logo" src="./src/presiLogo.png" alt="">
    </div>
    <div id="botonsDivHeader">

            <?php
                if(isset($_COOKIE["username"])){
                    echo "<h4>Logged as (".$_COOKIE["username"].")</h4>";
                }
            ?>
        
            <button class="headerBttn" onclick="togglePopup(1)"><img id="searchBttn" src="./src/buscar.jpg" alt=""></button>
        
        
            <button class="headerBttn" onclick="togglePopup(2)"><img id="staffBttn" src="./src/staff.ico" alt=""></button>
        
            <?php
                if(isset($_COOKIE["username"])){
                    echo "<h4>Logged as (".$_COOKIE["username"].")</h4>";
                }else{
                    echo '<button class="headerBttn" onclick="togglePopup(3)"><img id="logInBttn" src="./src/key.ico" alt=""></button>';
                }
            ?>
        
    </div>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup(1)">&times;</div>
            <h1>Search</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aspernatur laborum rem sed laudantium excepturi veritatis voluptatum architecto, dolore quaerat totam officiis nisi animi accusantium alias inventore nulla atque debitis.</p>
        </div>
    </div>
    <div class="popup" id="popup-2">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup(2)">&times;</div>
            <h1>Staff</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aspernatur laborum rem sed laudantium excepturi veritatis voluptatum architecto, dolore quaerat totam officiis nisi animi accusantium alias inventore nulla atque debitis.</p>
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
                <input type="password" name="" id="password1" placeholder="Contrasenya" required><br>                    <input type="button" value="Login" id="login">
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
</div>
<script src="./AXIOS/login_request.js"></script>
<script src="./AXIOS/signup_request.js"></script>