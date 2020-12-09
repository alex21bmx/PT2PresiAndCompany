<link rel="stylesheet" href="css/estils.css">
<script src="./js/header.js"></script>
<div id="header">
    <div id="logoHeader">
        <img id="logo" src="./src/logo.jpg" alt="">
    </div>
    <div id="titolHeader">
        <h1>Viatges</h1>
    </div>
    <div id="botonsDivHeader">
        
            <button class="headerBttn" onclick="togglePopup(1)"><img id="searchBttn" src="./src/search.png" alt=""></button>
        
        
            <button class="headerBttn" onclick="togglePopup(2)">Staff</button>
        
        
            <button class="headerBttn" onclick="togglePopup(3)">Log-in</button>
        
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aspernatur laborum rem sed laudantium excepturi veritatis voluptatum architecto, dolore quaerat totam officiis nisi animi accusantium alias inventore nulla atque debitis.</p>
        </div>
    </div>
</div>