/* Script do Admin */

jQuery(document).ready(function($) {
    // Inicializar color picker
    $('.wp-color-picker-label').next().wpColorPicker();
    
    // Delegado para atualização de dados
    $(document).on('click', '.update-settings', function() {
        // O form já faz isso automaticamente via WordPress
        console.log('Configurações atualizadas');
    });
});
