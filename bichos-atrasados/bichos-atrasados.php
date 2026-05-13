<?php
/**
 * Plugin Name: Bichos Atrasados
 * Plugin URI: https://hojenobicho.com/atrasados/
 * Description: Plugin WordPress para exibir Bichos Atrasados de loterias com atualização automática
 * Version: 1.0.0
 * Author: Filhosouvisto
 * Author URI: https://github.com/Filhosouvisto
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bichos-atrasados
 * Domain Path: /languages
 */

// Evitar acesso direto
if (!defined('ABSPATH')) {
    exit;
}

// Constantes do plugin
define('BICHOS_ATRASADOS_VERSION', '1.0.0');
define('BICHOS_ATRASADOS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('BICHOS_ATRASADOS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('BICHOS_ATRASADOS_TABLE', 'bichos_atrasados_cache');

// Includes
require_once BICHOS_ATRASADOS_PLUGIN_DIR . 'includes/class-database.php';
require_once BICHOS_ATRASADOS_PLUGIN_DIR . 'includes/class-api-handler.php';
require_once BICHOS_ATRASADOS_PLUGIN_DIR . 'includes/class-settings.php';
require_once BICHOS_ATRASADOS_PLUGIN_DIR . 'includes/class-admin.php';
require_once BICHOS_ATRASADOS_PLUGIN_DIR . 'includes/class-frontend.php';

// Classe Principal
class Bichos_Atrasados {
    private static $instance = null;

    public static function get_instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        // Ativar plugin
        register_activation_hook(__FILE__, array($this, 'activate'));
        
        // Desativar plugin
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        
        // Inicializar classes
        add_action('plugins_loaded', array($this, 'init'));
        
        // Atualização automática (a cada 1 hora)
        add_action('bichos_atrasados_cron', array('Bichos_Atrasados_API_Handler', 'fetch_data'));
    }

    public function activate() {
        // Criar tabela
        Bichos_Atrasados_Database::create_table();
        
        // Agendar tarefa
        if (!wp_next_scheduled('bichos_atrasados_cron')) {
            wp_schedule_event(time(), 'hourly', 'bichos_atrasados_cron');
        }
    }

    public function deactivate() {
        // Desagendar tarefa
        wp_clear_scheduled_hook('bichos_atrasados_cron');
    }

    public function init() {
        // Inicializar classes
        new Bichos_Atrasados_Admin();
        new Bichos_Atrasados_Settings();
        new Bichos_Atrasados_Frontend();
    }
}

// Iniciar plugin
Bichos_Atrasados::get_instance();
