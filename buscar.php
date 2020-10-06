<?php

include_once './config/config.php';

if (!isset($_GET['b']))
    redirect();

$termo = $_GET['b'];
$animes = DB::query("SELECT * FROM animes WHERE titulo LIKE '%$termo%'");
$episodios = DB::query("SELECT * FROM episodios WHERE titulo LIKE '%$termo%'");

$busca = array_merge($animes, $episodios);

foreach ($busca as $k => $v) {
    $tipo = "anime";
    if (isset($v['url_episodio'])) {
        $tipo = "episodio";
        $busca[$k]['capa'] = base_url("assets/images/{$v['capa_episodio']}");
    } else {
        $busca[$k]['capa'] = base_url("assets/images/{$v['capa']}");
        $busca[$k]['generos'] = ($v['generos']);
    }

    $busca[$k]['url_acesso'] = base_url($tipo);
    $busca[$k]['titulo'] = ($v['titulo']);
}

load_header("Buscando por " . $termo);
?>
<br>
<div class="container">
    <h4 class="text-white">Resultado da busca por "<?= $termo ?>"</h4>
    <br>
    <div class="row">
        <?php foreach ($busca as $item): ?>
            <div class="col-md-3" style="margin-bottom: 10px">
                <a href="<?= $item['url_acesso'] . '?a=' . $item['id'] ?>" style="text-decoration: none">
                    <div class="card bg-dark" style="box-shadow: 5px 0px 9px -5px rgba(0,0,0,0.21); padding: 10px">
                        <img class="card-img-top" height="300" src="<?= $item['capa'] ?>" alt="<?= $item['titulo'] ?>">
                        <div class="card-body">
                            <h5 class="card-title text-white"><?= $item['titulo'] ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
load_footer();