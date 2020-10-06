<?php

include_once './config/config.php';

if (!isset($_GET['g']))
    redirect();

$genero = $_GET['g'];
$sql = "SELECT * FROM animes WHERE generos LIKE '%$genero%'";
$animes = DB::query($sql);

load_header("Animes " . $genero);
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-white">Animes de "<?= $genero ?>"</h4>
        </div>
    </div>
    <div class="row">
        <?php foreach ($animes as $item): ?>
            <div class="col-md-3" style="margin-bottom: 10px">
                <a href="<?= base_url("anime?a={$item['id']}") ?>" style="text-decoration: none">
                    <div class="card bg-dark" style="box-shadow: 5px 0px 9px -5px rgba(0,0,0,0.21); padding: 10px">
                        <img class="card-img-top" height="300" src="<?= base_url("assets/images/{$item['capa']}") ?>" alt="<?= $item['titulo'] ?>">
                        <div class="card-body">
                            <h5 class="card-title text-white"><?= ($item['titulo']) ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
load_footer();