<?php
/**
 * Classe para gerenciar banco de dados
 */

class Bichos_Atrasados_Database {
    
    public static function create_table() {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'bichos_atrasados_cache';
        $charset_collate = $wpdb->get_charset_collate();
        
        // Remover tabela antiga se existir
        $wpdb->query("DROP TABLE IF EXISTS $table_name");
        
        $sql = "CREATE TABLE $table_name (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            estado VARCHAR(255) NOT NULL,
            premio VARCHAR(255) NOT NULL,
            dados LONGTEXT NOT NULL,
            criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
            atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY estado_premio (estado(100), premio(100))
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        $result = dbDelta($sql);
        
        error_log('Tabela criada: ' . print_r($result, true));
        
        return true;
    }
    
    public static function insert_or_update($estado, $premio, $dados) {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'bichos_atrasados_cache';
        
        $result = $wpdb->replace(
            $table_name,
            array(
                'estado' => $estado,
                'premio' => $premio,
                'dados' => json_encode($dados),
            ),
            array('%s', '%s', '%s')
        );
        
        if ($result === false) {
            error_log('Erro ao inserir dados: ' . $wpdb->last_error);
        }
        
        return $result;
    }
    
    public static function get_by_estado($estado) {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'bichos_atrasados_cache';
        
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
        
        $table_name = $wpdb->prefix . 'bichos_atrasados_cache';
        
        $results = $wpdb->get_results("SELECT DISTINCT estado FROM $table_name ORDER BY estado ASC");
        
        error_log('Total de estados encontrados: ' . count($results));
        
        return $results ? $results : array();
    }
    
    public static function get_last_update() {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'bichos_atrasados_cache';
        
        $result = $wpdb->get_var("SELECT MAX(atualizado_em) FROM $table_name");
        
        return $result ? $result : 'Nunca';
    }
}
