<?php
/**
 * Classe para frontend e shortcode
 */

class Bichos_Atrasados_Frontend {
    
    public function __construct() {
        add_shortcode('bichos_atrasados', array($this, 'render_shortcode'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }
    
    public function enqueue_scripts() {
        wp_enqueue_style(
            'bichos-atrasados-frontend',
            BICHOS_ATRASADOS_PLUGIN_URL . 'css/frontend-style.css',
            array(),
            BICHOS_ATRASADOS_VERSION
        );
        
        wp_enqueue_script(
            'bichos-atrasados-frontend',
            BICHOS_ATRASADOS_PLUGIN_URL . 'js/frontend-script.js',
            array('jquery'),
            BICHOS_ATRASADOS_VERSION,
            true
        );
    }
    
    public function render_shortcode() {
        $loterias = Bichos_Atrasados_Database::get_all();
        
        // Emojis para cada loteria
        $emojis = array(
            'PT Rio de Janeiro' => '🔵',
            'Look Goiás' => '🏴',
            'Loteria Federal' => '🦅',
            'Nacional' => '🏛️',
            'São Paulo' => '🏙️',
            'Boa Sorte' => '🍀',
            'Lotece' => '🎰',
            'Lotep' => '🎲',
            'MG' => '🔺',
            'L-BA' => '🏘️',
            'Maluca-BA' => '🤪',
            'Maluquinha RJ' => '💙',
            'Loteria Popular' => '👨‍👩‍👧‍👦',
            'Bicho-RS Rio Grande do Sul' => '🐂',
            'LBR Brasília' => '🏛️',
        );
        
        // Cores personalizadas
        $bg_color = Bichos_Atrasados_Settings::get_option('bg_color', '#FDB710');
        $text_color = Bichos_Atrasados_Settings::get_option('text_color', '#000000');
        $card_color = Bichos_Atrasados_Settings::get_option('card_color', '#FFFFFF');
        $button_color = Bichos_Atrasados_Settings::get_option('button_color', '#1E5BA8');
        $button_text_color = Bichos_Atrasados_Settings::get_option('button_text_color', '#FFFFFF');
        
        ob_start();
        ?>
        <div class="bichos-container" style="background-color: <?php echo esc_attr($bg_color); ?>;">
            <div class="bichos-grid">
                <?php
                if (empty($loterias)) {
                    echo '<p style="text-align: center; padding: 20px; grid-column: 1/-1;">Nenhum dado encontrado. Por favor, ative o plugin novamente.</p>';
                } else {
                    foreach ($loterias as $loteria) {
                        $estado = $loteria->estado;
                        $emoji = isset($emojis[$estado]) ? $emojis[$estado] : '🎲';
                        ?>
                        <div class="bichos-card" style="background-color: <?php echo esc_attr($card_color); ?>;">
                            <div class="bichos-card-header">
                                <h3 style="color: <?php echo esc_attr($text_color); ?>;">Atrasados - <?php echo esc_html($estado); ?></h3>
                                <div class="bichos-emoji"><?php echo $emoji; ?></div>
                            </div>
                            <p style="color: #999;">Sem dados</p>
                            <button 
                                class="bichos-button" 
                                style="background-color: <?php echo esc_attr($button_color); ?>; color: <?php echo esc_attr($button_text_color); ?>;"
                            >
                                Ver Tabelas
                            </button>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
