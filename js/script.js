//btn recargar tabla
function refreshPage(){
    window.location.href = window.location.pathname;
};

//funcion para habilitar o dehabilitar cedula o pasaporte
function mostrarCampos() {
    var idTypeSelect = document.getElementById('tipoId');
    var cedulaInput = document.getElementById('ci');
    var pasaporteInput = document.getElementById('pasaporte');

    if (idTypeSelect.value === 'cedula') {
        cedulaInput.removeAttribute('disabled');
        pasaporteInput.setAttribute('disabled', 'disabled');
    } else if (idTypeSelect.value === 'pasaporte') {
        pasaporteInput.removeAttribute('disabled');
        cedulaInput.setAttribute('disabled', 'disabled');
    } else {
        cedulaInput.setAttribute('disabled', 'disabled');
        pasaporteInput.setAttribute('disabled', 'disabled');
    }
};


//boton que expande o achica la sidebar
const toggler = document.querySelector(".btn");
toggler.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

//terminado




