let form = document.getElementsByTagName("form")[0];

document.getElementById("button_mostrar_registro").onclick = (e) => {
    document.getElementsByClassName("oculto")[0].style.display = "block";
    document.getElementsByClassName("oculto")[1].style.display = "inline-block";
    e.target.style.display = "none";
    document.getElementById("username_label").focus();
    form.action = form.action.substring(0, form.action.lastIndexOf("/")) + "/registrarse";

    document.getElementById("button_login").setAttribute("type", "button");
    document.getElementById("button_login").innerHTML = atras;

    // document.getElementsByClassName("formulario")[0].classList.add("form-abierto");
};

document.getElementById("button_registro").onclick = (e) => {
    e.preventDefault();
    grecaptcha.ready(function () {
        grecaptcha.execute('6LfhEigpAAAAAO8oj5d0aww9L75zQrckILY4zIKM', {
            action: 'login'
        }).then(function (token) {
            // Add your logic to submit to your backend server here.

            let form = e.target.form;
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'g-recaptcha-response';
            input.value = token;
            form.appendChild(input);

            e.target.form.submit();
        });
    });
};

document.getElementById("button_login").onclick = (e) => {

    if (e.target.innerHTML == "Volver atrás" || e.target.innerHTML == "Go back") {
        e.target.innerHTML = entrar;
        document.getElementsByClassName("oculto")[0].style.display = "none";
        document.getElementsByClassName("oculto")[1].style.display = "none";
        document.getElementById("username_label").focus();
        document.getElementById("button_mostrar_registro").style.display = "inline-block";
        setTimeout(() => {
            e.target.type = "submit";
        }, 500);
        form.action = form.action.substring(0, form.action.lastIndexOf("/")) + "/entrar";
        // document.getElementsByClassName("formulario")[0].style.height = "208px";
        // document.getElementsByClassName("formulario")[0].classList.remove("form-abierto");
    } else {
        e.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute('6LfhEigpAAAAAO8oj5d0aww9L75zQrckILY4zIKM', {
                action: 'login'
            }).then(function (token) {
                // Add your logic to submit to your backend server here.

                let form = e.target.form;
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'g-recaptcha-response';
                input.value = token;
                form.appendChild(input);

                e.target.form.submit();
            });
        });
    }

};

function togglePassword(e, mostrar, ocultar) {
    if (document.getElementById("password").getAttribute("type") == "password") {
        document.getElementById("password").setAttribute("type", "text");
        e.children[0].setAttribute("src", ocultar);
    } else {
        document.getElementById("password").setAttribute("type", "password");
        e.children[0].setAttribute("src", mostrar);
    }
}

function limpiarValor(e) {
    e.value = '';
}
