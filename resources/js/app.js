import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// PARA AUTH/REGISTER
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
    $(this).addClass('categoria');
    $('#adoptar').removeClass('categoria');
    if ($('.particular')) {
        $('.particular').remove();
    }
})

$('#adoptar').click(function() {
    //MUESTRA EL FORMULARIO PARA QUIENES QUIEREN ADOPTAR
    //alert("Estás queriendo adoptar");           //DEBUG
    $('.adopcion').hide();
    $(this).addClass('categoria');
    $('#darEnAdopcion').removeClass('categoria');
    $('.insertar').append(
        "<div class='form-group particular'><label class='etiqueta'>¿Buscás adoptar de forma transitoria o permanente?</label><select name='categoria' id='particular' class='form-control'><option value='transitorio'>Transitoria</option><option value='permanente'>Permanente</option></select></div>",
        "<div class='form-group particular'><label class='etiqueta'>¿Cuáles son las condiciones de tu vivienda?</label><select name='tipoDeVivienda' id='vivienda' class='form-control'><option value='con patio'>Con patio</option><option value='sin patio'>Sin patio</option></select></div>"
    );
})

// PARA MASCOTA/INDEX
$('#gatx-perrx').bootstrapSwitch();