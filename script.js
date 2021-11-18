$(document).ready(() => {
    alert('Bienvenido!!');
    $('.nombre').text('Fernando Ponce Solís');
    $('.nombre').css('color', 'white');
    $('.nombre').css('background-color', 'rgb(85,115,248)');
    $('.nombre').css('text-align', 'center');
    $('.nombre').css('margin', '0');
    if ($('.nombre').hasClass('saludo')){
            $('.nombre').show(3000);
        }
});

$('.nombre').click(() => {
    $('.nombre').hide(300);
});

function mover_a() {
    location.href = 'https://google.com';
}

