let episodios = document.getElementsByClassName('li_episodios');
let video_container = document.getElementsByTagName('video')[0];
let video_source = document.getElementsByTagName('source')[0];
let visionado = document.getElementsByClassName('visionado')[0];

let obj_lectura = document.getElementById("obj_lectura");
let lecturas = document.getElementsByClassName('li_lecturas');

let audio = document.getElementById("audio");
let audios = document.getElementsByClassName('li_audios');

Array.prototype.forEach.call(episodios, function (episodio) {
    episodio.addEventListener("click", function (e) {
        video_container.pause();
        visionado.style.display = "block";

        let path = document.getElementById("path").dataset.path;
        path = path.replace('public', '');
        path = path + e.target.dataset.path;
        path = path.replaceAll(' ', '%20');
        path = path.replace('public', 'public/storage');
        video_source.setAttribute('src', path);
        video_container.load();
    });
});

Array.prototype.forEach.call(lecturas, function (lectura) {
    lectura.addEventListener("click", function (e) {
        // visionado.style.display = "block";
        let path = document.getElementById("path").dataset.path;
        path = path.replace('public', '');
        path = path + e.target.dataset.path;
        path = path.replaceAll(' ', '%20');
        path = path.replace('public', 'public/storage');
        // obj_lectura.setAttribute('src', path);
        console.log(path);
        window.open(path, '_blank').focus();
    });
});

Array.prototype.forEach.call(audios, function (audi) {
    audi.addEventListener("click", function (e) {
        visionado.style.display = "block";
        let path = document.getElementById("path").dataset.path;
        path = path.replace('public', '');
        path = path + e.target.dataset.path;
        path = path.replaceAll(' ', '%20');
        path = path.replace('public', 'public/storage');
        audio.setAttribute('src', path);
    });
});

function cerrarVisionado(e) {
    visionado.style.display = "none";
}