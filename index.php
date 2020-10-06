<?php

include_once './config/config.php';

$ultimos_eps = DB::query("SELECT episodios.*, animes.titulo as anime FROM episodios INNER JOIN animes ON animes.id = episodios.idanime ORDER BY id DESC LIMIT 12");
$animes_mais_acessados = DB::query("SELECT * FROM animes ORDER BY acessos DESC LIMIT 5");

usort($animes_mais_acessados, function ($a, $b) {
    return $a['acessos'] < $b['acessos'];
});

load_header("Página Inicial");
?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card text-white" style="box-shadow: 5px 0 9px -5px rgba(0,0,0,0.21);background-color: #323233">
                    <div class="card-header" style="background-color: #000">
                        <h5>Últimos episódios</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($ultimos_eps as $item): ?>
                                <div class="col-md-4" style="margin-bottom: 10px;">
                                    <a href="<?= BASE_URL . 'episodio' . '?a=' . $item['id'] ?>"
                                       style="text-decoration: none;">
                                        <div class="card" style="padding: 10px; background-color: #1b1b1c">
                                            <img class="card-img-top" height="90"
                                                 src="<?= BASE_URL . 'assets/images/' . $item['capa_episodio'] ?>"
                                                 alt="<?= ($item['titulo']) . ' - ' . $item['anime'] ?>">
                                            <div class="card-body">
                                                <p class="text-white" style="font-weight: bold">
                                                    <small><?= ($item['anime']) ?></small>
                                                    <br>
                                                    <?= ($item['titulo']) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white" style="box-shadow: 5px 0 9px -5px rgba(0,0,0,0.21);background-color: #323233">
                    <div class="card-header" style="background-color: #000">
                        <h5>Animes mais acessados</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($animes_mais_acessados as $item): ?>
                                <div class="col-md-12" style="margin-bottom: 10px">
                                    <a href="<?= BASE_URL . 'anime' . '?a=' . $item['id'] ?>" style="text-decoration: none;">
                                        <div class="card" style="background-color: #1b1b1c">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img class="card-img-top" height="90"
                                                         src="<?= BASE_URL . 'assets/images/' . $item['capa'] ?>"
                                                         alt="<?= ($item['titulo']) ?>">
                                                </div>
                                                <div class="col-md-8">
                                                    <p class="text-white" style="font-weight: bold; margin-left: -10px; margin-top: 5px">
                                                        <?= ($item['titulo']) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
load_footer();