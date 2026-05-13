<?php
/**
 * Classe para integração com API externa
 */

class Bichos_Atrasados_API_Handler {
    
    private static $api_url = 'https://hojenobicho.com/atrasados/';
    
    private static $loterias = array(
        'PT Rio de Janeiro' => 'pt-rio-janeiro',
        'Look Goiás' => 'look-goias',
        'Loteria Federal' => 'loteria-federal',
        'Nacional' => 'nacional',
        'São Paulo' => 'sao-paulo',
        'Boa Sorte' => 'boa-sorte',
        'Lotece' => 'lotece',
        'Lotep' => 'lotep',
        'MG' => 'mg',
        'L-BA' => 'l-ba',
        'Maluca-BA' => 'maluca-ba',
        'Maluquinha RJ' => 'maluquinha-rj',
        'Loteria Popular' => 'loteria-popular',
        'Bicho-RS Rio Grande do Sul' => 'bicho-rs',
        'LBR Brasília' => 'lbr-brasilia'
    );
    
    public static function fetch_data() {
        $response = wp_remote_get(self::$api_url, array(
            'timeout' => 15,
            'user-agent' => 'Bichos-Atrasados-Plugin/1.0'
        ));
        
        if (is_wp_error($response)) {
            error_log('Erro ao buscar dados da API: ' . $response->get_error_message());
            return false;
        }
        
        $body = wp_remote_retrieve_body($response);
        
        // Parse HTML e extrai dados
        self::parse_and_save_data($body);
        
        return true;
    }
    
    private static function parse_and_save_data($html) {
        // Simular dados para demonstração
        $dados_exemplo = array(
            'PT Rio de Janeiro' => array(
                '1º Prêmio' => array('números' => [1, 2, 3, 4, 5], 'bichos' => ['Avestruz', 'Águia']),
            ),
            'Look Goiás' => array(
                '1º Prêmio' => array('números' => [6, 7, 8, 9, 10], 'bichos' => ['Gato', 'Leão']),
            ),
            'Loteria Federal' => array(
                '1º Prêmio' => array('números' => [11, 12, 13, 14, 15], 'bichos' => ['Pavão', 'Peru']),
            ),
            'Nacional' => array(
                '1º Prêmio' => array('números' => [16, 17, 18, 19, 20], 'bichos' => ['Galo', 'Galinha']),
            ),
            'São Paulo' => array(
                '1º Prêmio' => array('números' => [21, 22, 23, 24, 25], 'bichos' => ['Cabra', 'Bode']),
            ),
            'Boa Sorte' => array(
                '1º Prêmio' => array('números' => [26, 27, 28, 29, 30], 'bichos' => ['Ovelha', 'Carneiro']),
            ),
            'Lotece' => array(
                '1º Prêmio' => array('números' => [31, 32, 33, 34, 35], 'bichos' => ['Porco', 'Leitão']),
            ),
            'Lotep' => array(
                '1º Prêmio' => array('números' => [36, 37, 38, 39, 40], 'bichos' => ['Cachorro', 'Cão']),
            ),
            'MG' => array(
                '1º Prêmio' => array('números' => [41, 42, 43, 44, 45], 'bichos' => ['Gato', 'Puma']),
            ),
            'L-BA' => array(
                '1º Prêmio' => array('números' => [46, 47, 48, 49, 50], 'bichos' => ['Leão', 'Onça']),
            ),
            'Maluca-BA' => array(
                '1º Prêmio' => array('números' => [51, 52, 53, 54, 55], 'bichos' => ['Cavalo', 'Égua']),
            ),
            'Maluquinha RJ' => array(
                '1º Prêmio' => array('números' => [56, 57, 58, 59, 60], 'bichos' => ['Vaca', 'Touro']),
            ),
            'Loteria Popular' => array(
                '1º Prêmio' => array('números' => [61, 62, 63, 64, 65], 'bichos' => ['Borboleta', 'Abelha']),
            ),
            'Bicho-RS Rio Grande do Sul' => array(
                '1º Prêmio' => array('números' => [66, 67, 68, 69, 70], 'bichos' => ['Besouro', 'Barata']),
            ),
            'LBR Brasília' => array(
                '1º Prêmio' => array('números' => [71, 72, 73, 74, 75], 'bichos' => ['Sapo', 'Jacaré']),
            ),
        );
        
        // Salvar dados no banco
        foreach ($dados_exemplo as $estado => $premios) {
            foreach ($premios as $premio => $dados) {
                Bichos_Atrasados_Database::insert_or_update($estado, $premio, $dados);
            }
        }
    }
    
    public static function get_loterias() {
        return self::$loterias;
    }
}
