<link rel="stylesheet" href="css/estils.css">
<script src="./js/header.js"></script>
<div id="header">
    <div id="fraseHeader">
        <p>Never let your memories be greater than your dreams</p>
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
        <div class="contentStaff">
            <div class="close-btn" onclick="togglePopup(2)">&times;</div>
            <h1>Staff</h1>
            <div class="row">
                <div class="column">
                    <div class="card">
                    <img src="./src/alex.PNG" alt="" style="width:100%">
                    <div class="container">
                        <h2>Álex Pérez Fernández</h2>
                        <p class="title">LOL player</p>
                        <p>Fantastic person, good LOL player.</p>
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
                        <p class="title">Está empezando el gym</p>
                        <p>Lift the dumbbells like nothing.</p>
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
            <div class = "containerSignInSignUp"  id="containerSignInSignUp">
            <!--PARTE CREAR USUARIO-->
                <div class ="form-container crearCuentaContainer">
                    <form action="#">
                        <h1>Create Account</h1>
                        <div class = "social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <span>or use your user for registration</span>
                        <input type="text" placeholder="User"/>
                        <input type="password" placeholder="Password"/>

                        <button>Sign Up</button>
                    </form>
                </div> 
            <!--PARTE INICIAR SESION-->
                <div class="form-container iniciarSesionContainer">
                    <form action="#">
                        <h1>Sign in</h1>
                        <div class = "social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <span>or use your account</span>
                        <input type="text" placeholder="User"/>
                        <input type="password" placeholder="Password"/>
                        <a href="#">Forgot your password?Pues te jodes</a>
                        <button>Sign in</button>
                    </form>
                </div>
            <!--CREO EL CONTAINER OVERLAY-->c
                <div class="overlay-container-log">
                    <div class="overlay">
                        <!--PARTE IZQUIERDA DEL OVERLAY, parte login-->
                        <div class="overlay-panel overlay-left">
                            <h1>Welcome Back!</h1>
                            <p>To keep connected with us please login with your personal info</p>
                            <button class="fantasma" id="signIn">Sing In</button>
                        </div>
                         <!--PARTE DERECHA DEL OVERLAY, parte registrar-->
                         <div class="overlay-panel overlay-left">
                            <h1>Hello, new MaloMalisimo!</h1>
                            <p>Enter your personal details for join us, with the presi</p>
                            <button class="fantasma" id="signUp">Sing Up</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<script src="./AXIOS/login_request.js"></script>
<script src="./AXIOS/signup_request.js"></script>
<script>
    /*JAVASCRIPT LOGIN-REGISTER*/
    const signUpBttn = document.getElementById('signUp');
    const signInBttn = document.getElementById('signIn');
    const containerSignInSignUp = document.getElementById('containerSignInSignUp');

    signUpBttn.addEventListener('click', () => {
        containerSignInSignUp.classList.add("right-panel-active");
    });

    signInBttn.addEventListener('click', () => {
        containerSignInSignUp.classList.remove("right-panel-active");
    });
</script>
