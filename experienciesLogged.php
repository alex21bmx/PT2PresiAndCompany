<div id="grid-container">
</div>
<input type="hidden" id="numero" value="8">
<button id="cargamas">SHOW MORE</button>
<div class="popup" id="popup-6">
        <div class="overlay"></div>
        <div class="contentExp">
            <div class="close-btn" onclick="togglePopup(7)">&times;</div>
            <br>
            <div class="allInfoExp">
                <h1 id="popExpTitol"></h1>
                <div id="popExpFoto"></div>
                <div id="popExpCoords"></div>
            </div>
            <br>
            <button id="popExpFecha"></button>
            <p id="popExpTexto"></p>
        </div>
    </div>
    <div class="popup" id="popup-7">
        <input type="hidden" id="gestionId" value="">
        <div class="overlay"></div>
        <div class="contentGestionar">
                <div class="close-btn" onclick="togglePopup(16)">&times;</div>
                <div class="wrapper wrapper--w780">
                    <div class="card card-3">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <h2 class="title">Edit an Experience</h2>
                            <form>
                            <div class="input-group">
                                <input id="localizacionAct" class="input--style-3" type="text" placeholder="Location" name="localizacion">
                            </div>
                            <div class="input-group">
                                <input id="latitudAct" class="input--style-3" type="number" placeholder="Latitude" name="latitud">
                                <input id="longitudAct" class="input--style-3" type="number" placeholder="Length" name="longitud">
                            </div>
                            <div class ="input-group">
                            <div class = "categories">
                            <select id="categoriaAct">
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
                            <input type="text" id="imagenAct" name="imagen" placeholder="Img - (URL)" required><br>
                            <h3 class="descEditExp">Description</h3>
                            <input type="text" id="textoAct" name="texto" placeholder="Write a description ..." required><br>
                        </div>
                        <br>
                        <input type="button" value="Update" id="actualizar" class="crear crear--pill crear-orange">
                        </div>
                    </form>
                    <button onclick="deleteExperiencia(0)"class="crear crear--pill crear-orange">Delete Experience</button>

                        </div>
                    </div>
                </div>
            </div>
    </div>
<script src="AXIOS/experienciesLogged_request.js"></script>
<script src="AXIOS/cargarMasExperiencias_request.js"></script>
<script src="AXIOS/borrar_Experiencia_request.js"></script>
<script src="AXIOS/ActualizarExperiencia_request.js"></script>
