let spans  = document.querySelectorAll('.change_span');
let inputs  = document.querySelectorAll('.change_input');
let checkbox = document.querySelector('.checkbox')
let change_settings_button  =document.querySelector('.change_button');
let save_settings_button  =document.querySelector('.save_button');

change_settings_button.onclick = function(){
    checkbox.toggleAttribute('disabled');
    save_settings_button.toggleAttribute('disabled');
    for (let i = 0; i < spans.length; i++) {
        spans[i].classList.toggle('hide_element');
        inputs[i].classList.toggle('hide_element');
    }
}
