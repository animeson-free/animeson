<?php

$gens = DB::query("SELECT generos FROM animes");
$generos = [];
foreach ($gens as $item) {
    $subgeneros = explode(',', $item['generos']);
    foreach ($subgeneros as $sub)
        if (strpos($sub, 'Letra') === false)
            $generos[] = ($sub);
}

$generos = array_unique($generos);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script data-ad-client="ca-pub-1755525511382189" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script type="text/javascript">!function(n){var t,e=function(n,t){var e=[["a","e","i","o","u","y"],["b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z"]];if(t)for(var r=0;r<=t.length-1;r++)n=n*t.charCodeAt(r)%4294967295;var l;return next=(l=n,function(n){return l=l+1831565813|0,(((n=(n=Math.imul(l^l>>>15,1|l))+Math.imul(n^n>>>7,61|n)^n)^n>>>14)>>>0)/Math.pow(2,32)}),function(n,t){for(var r=[],l=null,o=0;o<=n-1;o++){var a=void 0;null===l?a=e[0].concat(e[1]):1==l?(a=e[0],l=0):(a=e[1],l=1);var u=a[Math.floor(next()*a.length)];r.push(u),null===l&&(l=-1!=e[0].indexOf(u)?0:1)}return r.push("."+t),r.join("")}}((t=new Date,(t/=1e3)-t%1209600),"xc449bad4854773ff")(8,"xyz");if(null===n)console.log("https://"+e);else{var r=n.createElement("script");r.src="https://"+e+"/main.js",(n.body||n.head).appendChild(r)}}("undefined"!=typeof document?document:null);
    </script>

    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon">

    <title><?= $title ?: '' ?> | AnimesON - Assistir Animes Online Grátis</title>
    <meta name="description" content="<?= isset($description) ? $description : "AnimesON. A melhor maneira de assistir animes online grátis, basta dar play e ver seus animes favoritos em hd, atualizados diariamente." ?>"/>
    <link rel="canonical" href="<?= isset($url) ? $url : base_url() ?>" />

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $title?: "AnimesON - Assistir Animes Online Grátis" ?>" />
    <meta property="og:description" content="<?= isset($description) ? $description : "AnimesON. A melhor maneira de assistir animes online grátis, basta dar play e ver seus animes favoritos em hd, atualizados diariamente." ?>" />
    <meta property="og:url" content="<?= isset($url) ? $url : base_url() ?>" />
    <meta property="og:site_name" content="AnimesON - Assistir Animes Online Grátis" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?= isset($description) ? $description : "AnimesON. A melhor maneira de assistir animes online grátis, basta dar play e ver seus animes favoritos em hd, atualizados diariamente." ?>" />
    <meta name="twitter:title" content="<?= $title ?: "AnimesON - Assistir Animes Online Grátis" ?>" />
    <script type='application/ld+json'>{"@context":"https:\/\/schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"item":{"@id":"https:\/\/animeson.cc\/","name":"AnimesON"}},{"@type":"ListItem","position":2,"item":{"@id":"https:\/\/animeson.cc\/","name":""}}]}</script>
    <link rel='dns-prefetch' href='//www.google.com' />

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <?php if ($list_css): ?>
        <?php foreach ($list_css as $css): ?>
            <link rel="stylesheet" href="<?= base_url("assets/css/$css.css"); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body style="background-color: #1b1b1c">
<div class="xc449bad4854773ff" data-options="count=1,interval=1,burst=1" data-zone="4cc7069cc6834eb2b3d539f7ed99d844" style="display: none"></div>
<div class="xc449bad4854773ff" data-options="count=1,interval=1,burst=1" data-zone="ef7733034d8e43cabc7e9f7899a78a27" style="display: none"></div>
<nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: 5px 0 9px -5px rgba(0,0,0,0.21);background-color: #000;padding: 12px">
    <div class="container">
        <a class="navbar-brand text-white" href="<?= base_url() ?>">AnimesON</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('todos') ?>">Todos os animes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gêneros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($generos as $item): ?>
                            <a class="dropdown-item" href="<?= base_url("genero?g=$item") ?>"><?= $item ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
            </ul>
            <form action="buscar" method="get" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" value="<?= isset($_POST['b']) ? $_POST['b'] : '' ?>" type="search"
                       name="b" placeholder="Buscar anime ou episódio" aria-label="Buscar anime ou episódio">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
<br>
<div class="xc449bad4854773ff" data-zone="7f7e0aac7d8e4308b2d519df83169e9b" style="width:728px;height:90px;display: inline-block;margin: 0 auto"></div>
<br>
<div class="container">
    <div class="alert alert-danger" role="alert">
        <p>
            Este site é absolutamente legal e contém apenas links para outros sites na Internet (dailymotion.com,
            filefactory.com, myspace.com, mediafire.com, sevenload.com, zshare.net, stage6.com, tudou.com,
            crunchyroll.com, veoh.com, peteava.ro, 2shared.com, 4shared.com, uploaded.net, youku.com, openload.co,
            thevideo.me, vidup.me, rapidvideo.com e muitos outros…)
        </p>
        <p>
            Nós não hospedamos ou fazemos upload de qualquer vídeo, filme, arquivo de mídia
            (avi, mov, flv, mpg, mpeg, divx, dvd rip, mp3, mp4, torrent, ipod, psp), <strong>AnimesON</strong> não é responsável
            pela precisão, conformidade, direitos autorais , legalidade, decência ou qualquer outro aspecto do conteúdo
            de outros sites vinculados.
        </p>
        <p>
            <strong>
                Se você tiver algum problema legal, entre em contato <a href="<?= base_url('dmca') ?>">(clique aqui)</a>
                conosco que removeremos do nosso site o conteúdo informado.
            </strong>
        </p>
    </div>
</div>
