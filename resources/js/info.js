let inputs = document.querySelectorAll('input:not([type="number"]):not([type="checkbox"])');

// console.log(inputs);
inputs.forEach(function (input) {
    input.addEventListener("click", borrar);
})