import './bootstrap';
import 'bootstrap';

let arrowUp = document.getElementById('arrow-up');
let arrowDown = document.getElementById('arrow-down');
let myButton = document.getElementById('nav-btn');

// Aggiungo un evento di click al bottone
myButton.addEventListener('click', function () {
    if (!arrowUp.classList.contains('hidden')) {
        arrowUp.classList.add('hidden');// Nasconde la freccia
        arrowDown.classList.remove('hidden');// Nasconde la freccia
    } else {
        arrowUp.classList.remove('hidden');// Mostra la freccia
        arrowDown.classList.add('hidden');// Mostra la freccia
    }
});

let nav = document.getElementById('nav');
let windowHeight = window.innerHeight;

window.addEventListener('scroll', function () {
    let scrollPosition = window.scrollY;

    // Calcola la posizione in cui far apparire la navbar
    let threshold = windowHeight / 2; // Metà della finestra

    // Se la posizione di scroll supera la soglia
    if (scrollPosition > threshold) {
        nav.classList.remove('hidden'); // Mostra la navbar
    } else {
        nav.classList.add('hidden'); // Nascondi la navbar
    }
});