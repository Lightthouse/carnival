let elves_change_button = document.querySelector('button.change_elf_button');
let distributions_change_button = document.querySelector('button.change_distribution_button');
let distributions_commit_button = document.querySelector('button.commit_distribution_button');
let elves_selectors = document.querySelectorAll('.hide_element');
let distributions_inputs = document.querySelectorAll('.distribution_parameters input');

distributions_change_button.onclick = function(){
    for (let i = 0; i < distributions_inputs.length ; i++) {
        distributions_inputs[i].toggleAttribute('disabled');
    }
    distributions_commit_button.toggleAttribute('disabled');
};

elves_change_button.onclick = function(){
 for (let i = 0; i < elves_selectors.length; i++) {
        elves_selectors[i].classList.toggle('hide_element');
    }
};
