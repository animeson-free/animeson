<?php

include_once './config/config.php';

if (!isset($_GET['a']))
    redirect();

$id = $_GET['a'];
DB::query("UPDATE animes SET acessos = acessos + 1 WHERE id = $id");
$anime = DB::query("SELECT * FROM animes WHERE id = $id")[0];
$eps = DB::query("SELECT * FROM episodios WHERE idanime = $id");

$episodios = [];
$indice = 1;

foreach ($eps as $key => $ep) {
    $ordem = explode(' ', $ep['titulo']);
    $eps[$key]['ordem'] = (int)$ordem[1];
}

usort($eps, function ($a, $b) {
    return $a['ordem'] > $b['ordem'];
});

foreach ($eps as $key => $ep) {
    $episodios[$ep['idioma']][] = $eps[$key];
}

foreach ($episodios as $tipo => $eps) {
    $indice = 1;
    foreach ($eps as $key => $ep) {
        $episodios[$tipo][$key]['indice'] = $indice++;
    }
}

$extra = [
    'desc' => (str_pad($anime['sinopse'], 154)),
    'url' => base_url("anime?a=$id")
];

load_header($anime['titulo'], [], false, $extra);
?>
<br>
<div class="container">
    <div class="card" style="box-shadow: 5px 0 9px -5px rgba(0,0,0,0.21);background-color: #323233">
        <div class="card-header text-white" style="background-color: #000">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <img width="200" src="<?= base_url("assets/images/{$anime['capa']}") ?>"
                                 class="rounded"
                                 alt="<?= $anime['titulo'] ?>">
                        </div>
                        <div class="col-md-9">
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><?= ($anime['titulo']) ?></h4>
                                </div>
                                <br><br>
                                <div class="col-md-9">
                                    <p><?= ($anime['sinopse']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="card-body text-white">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <?php if (isset($episodios['Legendado'])): ?>
                                    <li class="nav-item">
                                        <a class="nav-link active bg-danger" id="pills-home-tab" data-toggle="pill"
                                           href="#pills-home"
                                           role="tab"
                                           aria-controls="pills-home" aria-selected="true">Legendado</a>
                                    </li>
                                <?php endif; ?>
                                <?php if (isset($episodios['Dublado'])): ?>
                                    <li class="nav-item bg-danger">
                                        <a class="nav-link bg-danger" id="pills-profile-tab" data-toggle="pill"
                                           href="#pills-profile"
                                           role="tab"
                                           aria-controls="pills-profile" aria-selected="false">Dublado</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-md-3 float-right">
                            <div class="input-group mb-2">
                                <link rel="stylesheet"
                                      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                <input type="text" class="form-control" id="inlineFormInputGroup"
                                       placeholder="Pesquisar episódio...">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-search"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (isset($episodios['Legendado'])): ?>
                                        <table class="table table-striped eps">
                                            <tbody>
                                            <?php foreach ($episodios['Legendado'] as $legendado): ?>
                                                <?php if ($legendado['indice'] % 2 == 1): ?>
                                                    <tr>
                                                        <th>
                                                            <img width="150" class="img-thumbnail"
                                                                 src="<?= BASE_URL . 'assets/images/' . $legendado['capa_episodio'] ?>"
                                                                 alt="<?= $legendado['titulo'] ?>">
                                                        </th>
                                                        <th>
                                                            <a href="<?= base_url("episodio?a={$legendado['id']}") ?>">
                                                                <?= $legendado['titulo'] ?>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php if (isset($episodios['Legendado'])): ?>
                                        <table class="table table-striped eps">
                                            <tbody>
                                            <?php foreach ($episodios['Legendado'] as $legendado): ?>
                                                <?php if ($legendado['indice'] % 2 == 0): ?>
                                                    <tr>
                                                        <th>
                                                            <img width="150" class="img-thumbnail"
                                                                 src="<?= BASE_URL . 'assets/images/' . $legendado['capa_episodio'] ?>"
                                                                 alt="<?= $legendado['titulo'] ?>">
                                                        </th>
                                                        <th>
                                                            <a href="<?= base_url("episodio?a={$legendado['id']}") ?>">
                                                                <?= $legendado['titulo'] ?>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                             aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (isset($episodios['Dublado'])): ?>
                                        <table class="table table-striped eps">
                                            <tbody>
                                            <?php foreach ($episodios['Dublado'] as $dublado): ?>
                                                <?php if ($dublado['indice'] % 2 == 1): ?>
                                                    <tr>
                                                        <th>
                                                            <img width="150" class="img-thumbnail"
                                                                 src="<?= BASE_URL . 'assets/images/' . $dublado['capa_episodio'] ?>"
                                                                 alt="<?= $dublado['titulo'] ?>">
                                                        </th>
                                                        <th>
                                                            <a href="<?= base_url("episodio?a={$dublado['id']}") ?>">
                                                                <?= $dublado['titulo'] ?>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php if (isset($episodios['Dublado'])): ?>
                                        <table class="table table-striped eps">
                                            <tbody>
                                            <?php foreach ($episodios['Dublado'] as $dublado): ?>
                                                <?php if ($dublado['indice'] % 2 == 0): ?>
                                                    <tr>
                                                        <th>
                                                            <img width="150" class="img-thumbnail"
                                                                 src="<?= BASE_URL . 'assets/images/' . $dublado['capa_episodio'] ?>"
                                                                 alt="<?= $dublado['titulo'] ?>">
                                                        </th>
                                                        <th>
                                                            <a href="<?= base_url("episodio?a={$dublado['id']}") ?>">
                                                                <?= $dublado['titulo'] ?>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
load_footer();
?>
<script type="text/javascript">
    $(function () {
        $("#inlineFormInputGroup").keyup(function () {
            var texto = $(this).val();
            $(".eps tr").css("display", "block");
            $(".eps tr").each(function () {
                let text = $(this).text().toLowerCase();
                if (text.indexOf(texto.toLowerCase()) < 0)
                    $(this).css("display", "none");
            });
        });
    });
</script>