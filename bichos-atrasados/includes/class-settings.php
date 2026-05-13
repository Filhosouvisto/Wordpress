<?php
/**
 * Classe para gerenciar configurações
 */

class Bichos_Atrasados_Settings {
    
    public function __construct() {
        add_action('admin_init', array($this, 'register_settings'));
    }
    
    public function register_settings() {
        register_setting('bichos_atrasados_group', 'bichos_atrasados_options');
        
        add_settings_section(
            'bichos_atrasados_section',
            'Configurações de Cores',
            array($this, 'section_callback'),
            'bichos-atrasados-settings'
        );
        
        // Campo 1: Cor de fundo (grid)
        add_settings_field(
            'bichos_atrasados_bg_color',
            'Cor de Fundo (Grid)',
            array($this, 'color_field_callback'),
            'bichos-atrasados-settings',
            'bichos_atrasados_section',
            array('name' => 'bg_color', 'default' => '#FDB710')
        );
        
        // Campo 2: Cor de texto
        add_settings_field(
            'bichos_atrasados_text_color',
            'Cor do Texto',
            array($this, 'color_field_callback'),
            'bichos-atrasados-settings',
            'bichos_atrasados_section',
            array('name' => 'text_color', 'default' => '#000000')
        );
        
        // Campo 3: Cor do card
        add_settings_field(
            'bichos_atrasados_card_color',
            'Cor do Card',
            array($this, 'color_field_callback'),
            'bichos-atrasados-settings',
            'bichos_atrasados_section',
            array('name' => 'card_color', 'default' => '#FFFFFF')
        );
        
        // Campo 4: Cor do botão
        add_settings_field(
            'bichos_atrasados_button_color',
            'Cor do Botão',
            array($this, 'color_field_callback'),
            'bichos-atrasados-settings',
            'bichos_atrasados_section',
            array('name' => 'button_color', 'default' => '#1E5BA8')
        );
        
        // Campo 5: Cor do texto do botão
        add_settings_field(
            'bichos_atrasados_button_text_color',
            'Cor do Texto do Botão',
            array($this, 'color_field_callback'),
            'bichos-atrasados-settings',
            'bichos_atrasados_section',
            array('name' => 'button_text_color', 'default' => '#FFFFFF')
        );
    }
    
    public function section_callback() {
        echo 'Customize as cores CSS do plugin:';
    }
    
    public function color_field_callback($args) {
        $options = get_option('bichos_atrasados_options', array());
        $value = isset($options[$args['name']]) ? $options[$args['name']] : $args['default'];
        ?>
        <input 
            type="text" 
            class="wp-color-picker" 
            name="bichos_atrasados_options[<?php echo esc_attr($args['name']); ?>]" 
            value="<?php echo esc_attr($value); ?>" 
            data-default-color="<?php echo esc_attr($args['default']); ?>"
        />
        <?php
    }
    
    public static function get_option($key, $default = '') {
        $options = get_option('bichos_atrasados_options', array());
        return isset($options[$key]) ? $options[$key] : $default;
    }
}
