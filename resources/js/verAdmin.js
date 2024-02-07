let video_container = document.getElementsByTagName('video')[0];
let video_source = document.getElementsByTagName('source')[0];

let obj_lectura = document.getElementById("obj_lectura");

let audio = document.getElementById("audio");

document.getElementById("cerrar").addEventListener("click", () => {
    visionado.style.display = "none";
})

let lis = document.querySelectorAll('li[data-path]');

// console.log(lis);
lis.forEach(li => {
    li.addEventListener("click", function (e) {
        reproductor.style.display = "none";
        audio.style.display = "none";
        obj_lectura.style.display = "none";
        let path = document.getElementById("path").dataset.path;
        path = path.replace('public', '');
        path = path + e.target.getAttribute("data-path");
        path = path.replaceAll(' ', '%20');
        path = path.replace('public', 'public/storage');
        if (['Peliculas', 'Videos', 'Anime', 'Series', 'Documentales'].includes(e.target.getAttribute("data-tipo"))) {
            reproductor.style.display = "block";
            video_container.pause();
            video_source.setAttribute('src', path);
            video_container.load();
        } else if (e.target.getAttribute("data-tipo") == 'Musica') {
            audio.style.display = "block";
            audio.setAttribute('src', path);
        } else if (['Revistas', 'Libros'].includes(e.target.getAttribute("data-tipo"))) {
            obj_lectura.style.display = "block";
            obj_lectura.setAttribute('src', path);
        }
    })
});

let para_eliminar = document.querySelectorAll(".eliminar");
// console.log(para_eliminar);

para_eliminar.forEach(element => {
    element.addEventListener("click", (e) => {
        // console.log(path.getAttribute("data-path") + '/home/delete/' + e.target.parentElement.getAttribute("data-path").replace("public/", ""));

        var datos = {
            path: e.target.parentElement.getAttribute('data-path'),
        };

        console.log(e.target.parentElement.getAttribute('data-path'));
        console.log(JSON.stringify(e.target.parentElement.getAttribute('data-path')));
        var configuracion = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute("content")
                // document.querySelector("meta[name='csrf-token']").getAttribute("content")
            },
            body: JSON.stringify(datos)
        };

        fetch(path.getAttribute("data-path") + '/home/delete/' + e.target.parentElement.getAttribute("data-tipo"), configuracion).then(response => {
            if (!response.ok) {
                throw new Error(`Error de red: ${response.status}`);
            }
            // Leer el cuerpo de la respuesta como texto
            return response.text();
        })
            .then(data => {
                // Manipular la cadena de texto recibida
                // console.log(data);
                e.target.parentElement.remove();

            })
            .catch(error => {
                // Capturar errores de red u otros errores
                console.error('Error:', error);
            });
    });
});