<?php
/**
 * Classe para painel administrativo
 */

class Bichos_Atrasados_Admin {
    
    public function __construct() {
        add_action('admin_menu', array($this, 'add_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
    }
    
    public function add_menu() {
        // Menu principal
        add_menu_page(
            'Bichos Atrasados',
            'Bichos Atrasados',
            'manage_options',
            'bichos-atrasados',
            array($this, 'dashboard_page'),
            'dashicons-chart-bar',
            76
        );
        
        // Submenu Dashboard
        add_submenu_page(
            'bichos-atrasados',
            'Dashboard',
            'Dashboard',
            'manage_options',
            'bichos-atrasados',
            array($this, 'dashboard_page')
        );
        
        // Submenu Configurações
        add_submenu_page(
            'bichos-atrasados',
            'Configurações',
            'Configurações',
            'manage_options',
            'bichos-atrasados-settings',
            array($this, 'settings_page')
        );
    }
    
    public function enqueue_scripts($hook) {
        if (strpos($hook, 'bichos-atrasados') === false) {
            return;
        }
        
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        
        wp_enqueue_style(
            'bichos-atrasados-admin',
            BICHOS_ATRASADOS_PLUGIN_URL . 'css/admin-style.css',
            array(),
            BICHOS_ATRASADOS_VERSION
        );
        
        wp_enqueue_script(
            'bichos-atrasados-admin',
            BICHOS_ATRASADOS_PLUGIN_URL . 'js/admin-script.js',
            array('jquery'),
            BICHOS_ATRASADOS_VERSION,
            true
        );
    }
    
    public function dashboard_page() {
        if (!current_user_can('manage_options')) {
            wp_die(__('Você não tem permissão para acessar esta página.'));
        }
        
        $ultima_atualizacao = Bichos_Atrasados_Database::get_last_update();
        $loterias = Bichos_Atrasados_Database::get_all();
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            
            <div class="bichos-dashboard">
                <div class="dashboard-box">
                    <h2>📊 Status do Sistema</h2>
                    <p><strong>Última Atualização:</strong> <?php echo esc_html($ultima_atualizacao); ?></p>
                    <p><strong>Loterias Cadastradas:</strong> <?php echo count($loterias); ?></p>
                    
                    <form method="post">
                        <?php wp_nonce_field('bichos_atrasados_update'); ?>
                        <input type="hidden" name="action" value="update_now">
                        <button type="submit" class="button button-primary">🔄 Atualizar Dados Agora</button>
                    </form>
                </div>
            </div>
            
            <?php if (isset($_POST['action']) && $_POST['action'] === 'update_now' && wp_verify_nonce($_POST['_wpnonce'], 'bichos_atrasados_update')) {
                Bichos_Atrasados_API_Handler::fetch_data();
                echo '<div class="updated"><p>✅ Dados atualizados com sucesso!</p></div>';
            } ?>
        </div>
        <?php
    }
    
    public function settings_page() {
        if (!current_user_can('manage_options')) {
            wp_die(__('Você não tem permissão para acessar esta página.'));
        }
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form method="post" action="options.php">
                <?php settings_fields('bichos_atrasados_group'); ?>
                <?php do_settings_sections('bichos-atrasados-settings'); ?>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}
