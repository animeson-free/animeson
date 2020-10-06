<?php

function load_header($title = '', $css = [], $portal = false, $more_data = []) {
    $list_css = $css;
    $file = $portal ? 'header_portal' : 'header';

    if (count($more_data) > 0) {
        $description = $more_data['desc'];
        $url = $more_data['url'];
    }

    include_once BASE_PATH . "assets/includes/$file.php";
}

function load_footer($portal = false) {
    $file = $portal ? 'footer_portal' : 'footer';
    include_once BASE_PATH . "assets/includes/$file.php";
}

function base_url($add_path = '') {
    return BASE_URL . $add_path;
}

function print_rr($info) {
    echo '<pre>';
    print_r($info);
    echo '</pre>';
}

function incluir($classes = []) {
    foreach ($classes as $classe) {
        include_once BASE_PATH . 'classes/' . ucfirst($classe) . '.class.php';
    }
}

function db_connect($prod = false) {
    if ($prod) {
        DB::$host = 'localhost';
        DB::$user = 'animesonfreeroot';
        DB::$password = 'j7M*w5';
        DB::$dbName = 'animesonfree_tkdb ';
    } else {
        DB::$user = 'root';
        DB::$password = '';
        DB::$dbName = 'animes';
    }
}

function redirect($path = '') {
    header('Location: ' . BASE_URL . $path);
}

function validate_post($fields) {
    foreach ($fields as $field) {
        if (!isset($_POST[$field]))
            return false;

        if (!$_POST[$field])
            return false;
    }

    return true;
}

function formata_monetario($valor) {
    return "R$ " . number_format($valor, 2, ',', '.');
}

function extract_mes($mes) {
    $meses = [
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Março',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
    ];

    return $meses[$mes];
}

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return "#" . random_color_part() . random_color_part() . random_color_part();
}