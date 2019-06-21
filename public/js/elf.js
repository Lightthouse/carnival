let prefers = document.querySelectorAll('.prefer_list li');
let prefer_percent = document.querySelectorAll('span.prefer_value');
let gems_names = document.querySelectorAll('span.gems_names');
let change_prefer_button = document.querySelector('button.prefer_change');
let change_prefer_text = document.querySelector('b.prefer_change');


//change_prefer_button.onclick = change_prefer;
//change_prefer_text.onclick = change_prefer;
//change_prefer_text.addEventListener('click', add_inputs);
change_prefer_button.addEventListener('click', add_inputs);

/*console.log(prefers[0].childNodes[2]);
function contains(arr, elem) {
    return arr.find((i) => i === elem) != -1;
}*/

function add_inputs() {
    for (let i = 0; i < prefers.length; i++ ) {
        let inp = document.createElement('input');
        inp.classList.add('prefer_input');
        inp.setAttribute('type','number');
        inp.name = gems_names[i].innerHTML;
        inp.value = prefer_percent[i].innerHTML;
        prefers[i].replaceChild(inp, prefer_percent[i]);
    }
}



