async function obtenerInfo(e) {

    console.log(e.value);
    console.log(tipo);
    fetch(path.getAttribute("data-path") + '/home/info/' + tipo + '/' + e.value)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error de red: ${response.status}`);
            }
            // Leer el cuerpo de la respuesta como texto
            return response.json();
        })
        .then(data => {
            // Manipular la cadena de texto recibida
            let aux;
            // console.log(data);
            switch (tipo) {
                case "Peliculas":
                    aux = document.getElementById("orden_pelicula");
                    aux.value = parseInt(data['orden']) + 1;
                    break;
                case "Series":
                    aux = document.getElementById("numero_temporada_serie");
                    aux.value = parseInt(data['numero_temporada']) + 1;
                    aux = document.getElementById("numero_episodio_serie");
                    aux.value = parseInt(data['numero_episodio']) + 1;
                    break;
                case "Libros":
                    aux = document.getElementById("orden_libro");
                    aux.value = parseInt(data['orden']) + 1;
                    break;
                case "Revistas":
                    aux = document.getElementById("numero");
                    aux.value = parseInt(data['numero']) + 1;
                    break;
                case "Animes":
                    aux = document.getElementById("numero_temporada_anime");
                    aux.value = parseInt(data['numero_temporada']) + 1;
                    aux = document.getElementById("numero_episodio_anime");
                    aux.value = parseInt(data['numero_episodio']) + 1;
                    break;
                case "Musica":
                    aux = document.getElementById("numero_cancion");
                    aux.value = parseInt(data['numero_cancion']) + 1;
                    break;
                default:
                    break;
            }
            document.getElementById("genero_1").value = "";
            document.getElementById("genero_2").value = "";
            document.getElementById("genero_3").value = "";
            data['genero_1'] ? document.getElementById("genero_1").value = data['genero_1'] : document.getElementById("genero_1").setAttribute("placeholder", data['no_genre']);

            data['genero_2'] ? document.getElementById("genero_2").value = data['genero_2'] : document.getElementById("genero_2").setAttribute("placeholder", data['no_genre']);

            data['genero_3'] ? document.getElementById("genero_3").value = data['genero_3'] : document.getElementById("genero_3").setAttribute("placeholder", data['no_genre']);

        })
        .catch(error => {
            // Capturar errores de red u otros errores
            console.error('Error:', error);
        });

}

function borrar() {
    // console.log(this);
    this.value = "";
}