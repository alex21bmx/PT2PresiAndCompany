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
        <div class="contentExp">
            <div class="close-btn" onclick="togglePopup(8)">&times;</div>
            <form>
            <div class = "categories">
                    <select id="categoriaAct">
                        <option value="adventures">Adventures ✈</option>
                        <option value="mountaineering">Mountaineering 🌄</option>
                        <option value="family">Familiar 👪</option>
                        <option value="historical">Historical 📖</option>
                        <option value="romantic">Romantic 💏</option> 
                    </select><br><br>
                </div>
                <div class="mas_info">
                    <input type="text" id="localizacionAct" name="localizacionAct" placeholder="Localización" required><br>
                    <input type="text" id="imagenAct" name="imagenAct" placeholder="Imagen - (URL)" required><br>
                    <input type="number" id="latitudAct" name="latitudAct" placeholder="Latitud"> 
                    <input type="number" id="longitudAct" name="longitudAct" placeholder="Longitud"><br><br>
                    <input type="text" id="textoAct" name="textoAct" placeholder="Escribe una descripción..." required><br>
                </div><br><br>
                <input type="button" value="Actualizar" id="actualizar">
            </form>
            <button onclick="deleteExperiencia(0)">Borrar experiencia</button>
        </div>
    </div>
<script src="AXIOS/experienciesLogged_request.js"></script>
<script src="AXIOS/cargarMasExperiencias_request.js"></script>
<script src="AXIOS/borrar_Experiencia_request.js"></script>
<script src="AXIOS/ActualizarExperiencia_request.js"></script>