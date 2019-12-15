const btnIniciarSesion = document.getElementById("home-tab");
const btnRegistrarse = document.getElementById("profile-tab");
const contenedorRegistro = document.getElementById("cajon");

//registro
const nombre = document.getElementById("nombreRegistro");
const apellidoRegistro = document.getElementById("apellidoRegistro");
const contacto = document.getElementById("contacto");

const fechaNacimiento = document.getElementById("start");

const emailRegistro = document.getElementById("emailRegistro");
const contrasennaRegistro = document.getElementById("contrasennaRegistro");
const login = document.getElementById("login");
//registro

//iniciar sesion
const email = document.getElementById("email");
const password = document.getElementById("password");
//iniciar sesion

//cambiarContrasenna
const contrasennaActual = document.getElementById("contrasennaActual");
const contrasennaNueva = document.getElementById("contrasennaNueva");
const contrasennaNueva2 = document.getElementById("contrasennaNueva2");
//cambiarContrasenna

const prueba = document.getElementsByClassName("nav-item");
console.log(prueba);
btnIniciarSesion.addEventListener('click', () => {
    contenedorRegistro.style.width = '30%';
    email.value = "";
    password.value = "";

    nombre.value = "";
    apellidoRegistro.value = "";
    contacto.value = "";
    fechaNacimiento.value = "";
    emailRegistro.value = "";
    contrasennaRegistro.value = "";
    login.value = "";
})
btnRegistrarse.addEventListener('click', () => {
    contenedorRegistro.style.width = '60%';
    email.value = "";
    nombre.value = "";
    apellidoRegistro.value = "";
    contacto.value = "";
    fechaNacimiento.value = "";
    emailRegistro.value = "";
    contrasennaRegistro.value = "";
    login.value = "";

    email.value = "";
    password.value = "";
})


const modalBody = document.getElementById("modalBody");

function modal() {
    if (email.value == "") {
        console.log("vacio");
        mostrarModalConfimacion();
        document.getElementById("modalBody").innerHTML = "<p>Ingrese un correo.</p>";
    } else {
        mostrarModalConfimacion();
        console.log(email.value);
        console.log(modalBody.value);
        document.getElementById("modalBody").innerHTML = "Contraseña enviada al correo: " + email.value;
    }
}

function mostrarModalConfimacion() {
    div = document.getElementById('flotante');
    div.style.display = '';
}

function cerrarModalConfimacion() {
    div = document.getElementById('flotante');
    div.style.display = 'none';
    nombre.value = "";
    apellidoRegistro.value = "";
    contacto.value = "";
    fechaNacimiento.value = "";
    emailRegistro.value = "";
    contrasennaRegistro = "";
    login.value = "";

}

function modalContrasenna() {
    if (document.getElementById("email").value == "") {
        console.log("vacio");
        mostrarModalConfimacion();
        document.getElementById("modalBody").innerHTML = "<p>Ingrese un correo.</p>";

    } else {
        mostrarModalContrasenna();
        console.log(email.value);
    }
}

function mostrarModalContrasenna() {
    div = document.getElementById('cambioContrasenna');
    div.style.display = '';
}

function cerrarModalContrasenna(ev) {
    var re = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/);
    if (!re.test(contrasennaNueva.value)) {
        $('#collapseExample5').collapse('show');
        ev.preventDefault();

    } else if (contrasennaNueva.value !== contrasennaNueva2.value) {
        $('#collapseExample6').collapse('show');
        ev.preventDefault();
    } else {
        div = document.getElementById('cambioContrasenna');
        div.style.display = 'none';
        $('#collapseExample').collapse('hide');
        $('#collapseExample2').collapse('hide');
        $('#collapseExample3').collapse('hide');
        $('#collapseExample5').collapse('hide');
        $('#collapseExample6').collapse('hide');
        contrasennaActual.value = "";
        contrasennaNueva.value = "";
        contrasennaNueva2.value = "";
    }
}

contrasennaNueva.addEventListener('keyup', () => {
    $('#collapseExample5').collapse('hide');
})

contrasennaNueva2.addEventListener('keyup', () => {
    $('#collapseExample6').collapse('hide');
})


function campoLleno() {
    if (contrasennaActual.value == "") {
        $('#collapseExample').collapse('show');
    }
    if (contrasennaNueva.value == "") {
        $('#collapseExample2').collapse('show');
    }
    if (contrasennaNueva2.value == "") {
        $('#collapseExample3').collapse('show');
    }
}
contrasennaActual.addEventListener('keyup', () => {
    $('#collapseExample').collapse('hide')
})
contrasennaNueva.addEventListener('keyup', () => {
    $('#collapseExample2').collapse('hide')
})
contrasennaNueva2.addEventListener('keyup', () => {
    $('#collapseExample3').collapse('hide')
})

// const nombreRegistro = document.getElementById("nombreRegistro");
// const apellidoRegistro = document.getElementById("apellidoRegistro");

// nombreRegistro.addEventListener('keyup', obtenerNombre)

// function obtenerNombre() {
//     apellidoRegistro.value = nombreRegistro.value;
//     console.log(nombreRegistro);
// }


function cerrarModalContrasennaCancelar() {
    div = document.getElementById('cambioContrasenna');
    div.style.display = 'none';
    $('#collapseExample').collapse('hide');
    $('#collapseExample2').collapse('hide');
    $('#collapseExample3').collapse('hide');
    contrasennaActual.value = "";
    contrasennaNueva.value = "";
    contrasennaNueva2.value = "";
}

//btns
const btnIngresar = document.getElementById("btnIngresar");



btnIngresar.addEventListener('click', mostrarInfoInicio)

function mostrarInfoInicio() {
    console.log(email.value);
    console.log(password.value);
}

function validarContrasenna(ev) {
    var re = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/);
    if (!re.test(contrasennaRegistro.value)) {
        $('#collapseExample4').collapse('show');
        ev.preventDefault();
    }
}

contrasennaRegistro.addEventListener('keyup', () => {
    $('#collapseExample4').collapse('hide');
})
