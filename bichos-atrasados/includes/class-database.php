<?php
/**
 * Classe para gerenciar banco de dados
 */

class Bichos_Atrasados_Database {
    
    public static function create_table() {
        global $wpdb;
        
        $table_name = $wpdb->prefix . BICHOS_ATRASADOS_TABLE;
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            estado varchar(100) NOT NULL,
            premio varchar(50) NOT NULL,
            dados longtext NOT NULL,
            atualizado_em datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            criado_em datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY estado_premio (estado, premio)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    public static function insert_or_update($estado, $premio, $dados) {
        global $wpdb;
        
        $table_name = $wpdb->prefix . BICHOS_ATRASADOS_TABLE;
        
        return $wpdb->replace(
            $table_name,
            array(
                'estado' => sanitize_text_field($estado),
                'premio' => sanitize_text_field($premio),
                'dados' => wp_json_encode($dados),
            ),
            array('%s', '%s', '%s')
        );
    }
    
    public static function get_by_estado($estado) {
        global $wpdb;
        
        $table_name = $wpdb->prefix . BICHOS_ATRASADOS_TABLE;
        
        $results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE estado = %s ORDER BY premio ASC",
                $estado
            )
        );
        
        return $results;
    }
    
    public static function get_all() {
        global $wpdb;
        
        $table_name = $wpdb->prefix . BICHOS_ATRASADOS_TABLE;
        
        $results = $wpdb->get_results("SELECT DISTINCT estado FROM $table_name ORDER BY estado ASC");
        
        return $results;
    }
    
    public static function get_last_update() {
        global $wpdb;
        
        $table_name = $wpdb->prefix . BICHOS_ATRASADOS_TABLE;
        
        $result = $wpdb->get_var("SELECT MAX(atualizado_em) FROM $table_name");
        
        return $result ? $result : 'Nunca';
    }
}
