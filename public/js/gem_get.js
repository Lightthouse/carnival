let secret_button = document.querySelector('.filter_button');
let secret_form = document.querySelector('.filter_form');

secret_button.onclick = function() {
    secret_form.classList.toggle('hide_form');
}
