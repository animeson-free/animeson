<?php

include_once './config/config.php';

$animes = DB::query("SELECT * FROM animes");

load_header("Todos os animes")
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h4>Todos os animes presentes no site</h4>
        </div>
        <div class="col-md-3 float-right">
            <div class="input-group mb-2">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pesquisar anime...">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-search"></i></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row" id="animes">
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
?>
<script type="text/javascript">
    $(function(){
        $("#inlineFormInputGroup").keyup(function(){
            var texto = $(this).val();
            $("#animes div").css("display", "block");
            $("#animes div").each(function(){
                let text = $(this).text().toLowerCase();
                if(text.indexOf(texto.toLowerCase()) < 0)
                    $(this).css("display", "none");
            });
        });
    });
</script>
