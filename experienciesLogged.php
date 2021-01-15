<div id="grid-container">
</div>
<input type="hidden" id="numero" value="8">
<button id="cargamas">SHOW MORE</button>
<div class="popup" id="popup-6">
        <div class="overlay"></div>
        <div class="contentExp">
            <div class="close-btn" onclick="togglePopup(7)">&times;</div>
            <div class="allInfoExp">
            <h1 id="popExpTitol"></h1>
                <button id="popExpFecha"></button>
                <div id="popExpFoto"></div>
                <div id="popExpFecha"></div>
                <div id="popExpCoords"></div>
            </div>
            <p id="popExpTexto"></p>
        </div>
    </div>
    <div class="popup" id="popup-7">
        <input type="hidden" id="gestionId" value="">
        <div class="overlay"></div>
        <div class="contentExp">
            <div class="close-btn" onclick="togglePopup(8)">&times;</div>
            <button onclick="deleteExperiencia()">Borrar experiencia</button>
        </div>
    </div>
<script src="AXIOS/experienciesLogged_request.js"></script>
<script src="AXIOS/cargarMasExperiencias_request.js"></script>