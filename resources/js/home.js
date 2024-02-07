let lis = document.querySelectorAll('.home>li');

for (li of lis) {
    if (typeof tipo === "undefined" || !["Documentaries", "Documentales", "Software", "Otros", "Other"].includes(tipo)) {
        // console.log(document.getElementsByTagName("ul")[0]);
        li.addEventListener("click", function (e) {
            // console.log(e.target.firstChildE);
            if (e.target.tagName === 'LI') {
                window.location = e.target.firstElementChild.getAttribute('href');
            } else {
                e.stopPropagation();
            }
        })
    } else {
        document.getElementsByTagName("ul")[0].classList.remove('flex-container', 'home');
        document.getElementsByTagName("ul")[0].classList.add('ancho-100', 'f-l', 'm-t-32', 't-a-c', 'p-l-16');
    }

}

document.getElementById("reportar").addEventListener("click", function (e) {
    // document.getElementById("form_reporte").style.display = "block";
    document.getElementById("form_reporte").classList.add("centrado");
    document.getElementsByClassName("flex-container home")[0].style.display = "none";
    console.log(document.querySelector("form span"));
    document.querySelector("form span").innerText = "";
})

document.getElementById("form_reporte_atras").addEventListener("click", function (e) {
    document.getElementById("form_reporte").classList.remove("centrado");
    document.getElementsByClassName("flex-container home")[0].style.display = "flex";
})

document.getElementById("form_reporte").addEventListener("submit", function (event) {
    event.preventDefault();

    // Obtener los datos del formulario
    const formData = new FormData(event.target);

    // Realizar la solicitud Ajax utilizando fetch
    fetch(document.getElementById("form_reporte").getAttribute("action"), {
        method: "POST",
        body: formData
    })
        .then(response => response.json()) // Puedes usar .text() si esperas una respuesta en formato de texto
        .then(data => {
            // Manejar la respuesta del servidor
            document.getElementById("respuesta").innerHTML = JSON.stringify(data.mensaje).replace(/"/g, '');
            // Puedes realizar más acciones aquí según la respuesta del servidor
            document.getElementsByTagName("textarea")[0].value = "";
        })
        .catch(error => {
            console.error("Error en la solicitud:", error);
        });
})

