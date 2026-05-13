/* Scripts do Frontend */

jQuery(document).ready(function($) {
    // Animação dos botões
    $('.bichos-button').on('click', function() {
        alert('Funcionalidade de detalhes em desenvolvimento!');
    });
    
    // Efeito hover nos cards
    $('.bichos-card').on('mouseenter', function() {
        $(this).css('cursor', 'pointer');
    });
});
