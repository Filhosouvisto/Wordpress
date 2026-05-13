<?php
/**
 * Classe para integração com API externa
 */

class Bichos_Atrasados_API_Handler {
    
    private static $api_url = 'https://hojenobicho.com/atrasados/';
    
    public static function fetch_data() {
        error_log('=== INICIANDO BUSCA DE DADOS ===');
        
        // Simular dados para demonstração
        self::parse_and_save_data('');
        
        error_log('=== BUSCA DE DADOS FINALIZADA ===');
        
        return true;
    }
    
    private static function parse_and_save_data($html) {
        $dados_exemplo = array(
            'PT Rio de Janeiro' => array(
                '1º Prêmio' => array('números' => array(1, 2, 3, 4, 5), 'bichos' => array('Avestruz', 'Águia')),
            ),
            'Look Goiás' => array(
                '1º Prêmio' => array('números' => array(6, 7, 8, 9, 10), 'bichos' => array('Gato', 'Leão')),
            ),
            'Loteria Federal' => array(
                '1º Prêmio' => array('números' => array(11, 12, 13, 14, 15), 'bichos' => array('Pavão', 'Peru')),
            ),
            'Nacional' => array(
                '1º Prêmio' => array('números' => array(16, 17, 18, 19, 20), 'bichos' => array('Galo', 'Galinha')),
            ),
            'São Paulo' => array(
                '1º Prêmio' => array('números' => array(21, 22, 23, 24, 25), 'bichos' => array('Cabra', 'Bode')),
            ),
            'Boa Sorte' => array(
                '1º Prêmio' => array('números' => array(26, 27, 28, 29, 30), 'bichos' => array('Ovelha', 'Carneiro')),
            ),
            'Lotece' => array(
                '1º Prêmio' => array('números' => array(31, 32, 33, 34, 35), 'bichos' => array('Porco', 'Leitão')),
            ),
            'Lotep' => array(
                '1º Prêmio' => array('números' => array(36, 37, 38, 39, 40), 'bichos' => array('Cachorro', 'Cão')),
            ),
            'MG' => array(
                '1º Prêmio' => array('números' => array(41, 42, 43, 44, 45), 'bichos' => array('Gato', 'Puma')),
            ),
            'L-BA' => array(
                '1º Prêmio' => array('números' => array(46, 47, 48, 49, 50), 'bichos' => array('Leão', 'Onça')),
            ),
            'Maluca-BA' => array(
                '1º Prêmio' => array('números' => array(51, 52, 53, 54, 55), 'bichos' => array('Cavalo', 'Égua')),
            ),
            'Maluquinha RJ' => array(
                '1º Prêmio' => array('números' => array(56, 57, 58, 59, 60), 'bichos' => array('Vaca', 'Touro')),
            ),
            'Loteria Popular' => array(
                '1º Prêmio' => array('números' => array(61, 62, 63, 64, 65), 'bichos' => array('Borboleta', 'Abelha')),
            ),
            'Bicho-RS Rio Grande do Sul' => array(
                '1º Prêmio' => array('números' => array(66, 67, 68, 69, 70), 'bichos' => array('Besouro', 'Barata')),
            ),
            'LBR Brasília' => array(
                '1º Prêmio' => array('números' => array(71, 72, 73, 74, 75), 'bichos' => array('Sapo', 'Jacaré')),
            ),
        );
        
        // Salvar dados no banco
        $count = 0;
        foreach ($dados_exemplo as $estado => $premios) {
            foreach ($premios as $premio => $dados) {
                $result = Bichos_Atrasados_Database::insert_or_update($estado, $premio, $dados);
                if ($result !== false) {
                    $count++;
                    error_log("Inserido: $estado - $premio");
                }
            }
        }
        
        error_log("Total de registros inseridos: $count");
    }
}
