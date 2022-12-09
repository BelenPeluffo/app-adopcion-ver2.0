import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/*
REGISTRO DE USER
APARECER Y DESAPARECER los campos condicionales
*/
$('select[id=categoria]').change(function() {
    if($(this).val()=='particular') {
        $('.particular').show();
    } else {
        $('.particular').hide();
    }
});

/*
SEÑAL DE COLOR
Para advertir al user que quizás se puede interactuar
con esos objetos.
*/
$('.d-inline').mouseenter(function() {
    $(this).css("color","white");
    $(this).css("background-color","greenyellow");
})
$('.d-inline').mouseleave(function() {
    $(this).css("color","");
    $(this).css("background-color","");
})

/*
FORMULARIO SEGÚN INTENCIÓN
Muestra el formulario dependiendo de que el user
quiera adoptar o dar en adopción.
*/
$('#darEnAdopcion').click(function() {
    //MUESTRA EL FORMULARIO PARA QUIENES DAN EN ADOPCIÓN
    //alert("Estás queriendo dar en adopción");   //DEBUG
    $('.adopcion').show();
    $('.particular').hide();
})

$('#adoptar').click(function() {
    //MUESTRA EL FORMULARIO PARA QUIENES QUIEREN ADOPTAR
    //alert("Estás queriendo adoptar");           //DEBUG
    $('.adopcion').hide();
    $('.particular').show();
})
