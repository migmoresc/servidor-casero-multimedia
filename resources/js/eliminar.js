let botonesEliminar = Array.from(document.getElementsByClassName("delete"));
// let visionado = document.getElementsByClassName('visionado')[0];

// console.log(botonesEliminar);
botonesEliminar.forEach((element) => {

    element.addEventListener("click", (e) => {


        visionado ? visionado.style.display = "none" : null;

        var datos = {
            path: e.target.parentElement.getAttribute('data-path'),
        };

        var configuracion = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute("content")
                // document.querySelector("meta[name='csrf-token']").getAttribute("content")
            },
            body: JSON.stringify(datos)
        };

        // console.log(configuracion);
        e.stopImmediatePropagation();
        // console.log(e.target.nextSibling);
        fetch(path.getAttribute("data-path") + '/home/delete/' + tipo, configuracion)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                // La solicitud se completó con éxito
                if (data == "OK") {
                    e.target.parentElement.style.display = "none";
                } else {
                    e.target.parentElement.style.border = "solid 2px red";
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

    });
});