<link rel="stylesheet" href="css/estils.css">
<script src="./js/header.js"></script>
<div id="header">
    <div id="logoHeader">
        
    </div>
    <div id="titolHeader">
        <img id="logo" src="./src/presiLogo.png" alt="">
    </div>
    <div id="botonsDivHeader">
        
            <button class="headerBttn" onclick="togglePopup(1)"><img id="searchBttn" src="./src/buscar.jpg" alt=""></button>
        
        
            <button class="headerBttn" onclick="togglePopup(2)"><img id="staffBttn" src="./src/staff.ico" alt=""></button>
        
        
            <button class="headerBttn" onclick="togglePopup(3)"><img id="logInBttn" src="./src/key.ico" alt=""></button>
        
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
    <div class="popup" id="popup-3">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup(3)">&times;</div>
            <h1>Log-in</h1>
            <form>
                <input type="text" name="" id="username1" placeholder="Usuari"><br>
                <input type="password" name="" id="password1" placeholder="Contrasenya"><br>
                <input type="button" value="Log-in" id="login">
            </form>
            <button id="nouUsuari" onclick="togglePopup(4)">Nou usuari</button>
            </div>
    </div>
    <div class="popup" id="popup-4">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup(5)">&times;</div>
            <h1>Sign-up</h1>
            <form>
                <input type="text" name="" id="" placeholder="Usuari"><br>
                <input type="password" name="" id="" placeholder="Contrasenya"><br>
                <button>Sign-up</button>
            </form>
        </div>
    </div>
</div>
<script src="./AXIOS/login_request.js"></script>