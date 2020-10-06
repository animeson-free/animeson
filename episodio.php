<?php

include_once './config/config.php';

if (!isset($_GET['a']))
    redirect();

$id = $_GET['a'];
DB::query("UPDATE episodios SET acessos = acessos + 1 WHERE id = $id");
$ep = DB::query("SELECT * FROM episodios WHERE id = $id")[0];
$anime = DB::query("SELECT * FROM animes WHERE id = {$ep['idanime']}")[0];

$ep['titulo'] = ($ep['titulo']);

$ep_anterior = DB::query("SELECT * FROM episodios WHERE id < $id AND idanime = {$ep['idanime']} LIMIT 1");
if (count($ep_anterior) == 0)
    $ep_anterior['id'] = $id;
else
    $ep_anterior = $ep_anterior[0];

$ep_proximo = DB::query("SELECT * FROM episodios WHERE id > $id AND idanime = {$ep['idanime']} LIMIT 1");
if (count($ep_proximo) == 0)
    $ep_proximo['id'] = $id;
else
    $ep_proximo = $ep_proximo[0];

$extra = [
    'desc' => (str_pad($anime['sinopse'], 154)),
    'url' => base_url("episodio?a=$id")
];

load_header($anime['titulo'], [], false, $extra);
?>
<br>
<div class="container">
    <div class="card" style="box-shadow: 5px 0px 9px -5px rgba(0,0,0,0.21);background-color: #323233">
        <div class="card-header text-white" style="background-color: #000">
            <h4><?= $anime['titulo'] . ' - '.  $ep['titulo'] ?></h4>
        </div>
        <div class="card-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?= $ep['url_video'] ?>" frameborder="0"></iframe>
            </div>
        </div>
        <div class="card-footer text-white" style="background-color: #000">
            <div class="row">
                <div class="col-md-4">
                    <a href="<?= BASE_URL . 'episodio?a=' . $ep_anterior['id'] ?>" class="btn btn-danger align-content-center <?= $ep_anterior['id'] == $ep['id'] ? 'disabled' : '' ?>">Episódio anterior</a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="<?= BASE_URL . 'anime?a=' . $anime['id'] ?>" class="btn btn-danger align-content-center">Lista de episódios</a>
                </div>
                <div class="col-md-4">
                    <a href="<?= BASE_URL . 'episodio?a=' . $ep_proximo['id'] ?>" class="btn btn-danger float-right <?= $ep_proximo['id'] == $ep['id'] ? 'disabled' : '' ?>">Próximo episódio</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
load_footer();
