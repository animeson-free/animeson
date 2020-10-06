<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?: '' ?> - Meus Investimentos</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <?php if ($list_css): ?>
        <?php foreach ($list_css as $css): ?>
            <link rel="stylesheet" href="<?= base_url("assets/css/$css.css"); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
<nav class="navbar navbar-dark">
    <div class="container">
        <h6 class="text-black">Meus Investimentos</h6>
        <h6 class="float-left text-black">Olá, <?= $_SESSION['username']; ?> | <a style="color: #000;text-decoration: underline;" href="<?= base_url('meus-investimentos/logout') ?>">Sair</a></h6>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light nav-shadow">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('meus-investimentos/') ?>">Resumo</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Carteiras
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach ($more_data['lista_carteiras'] as $carteira): ?>
                            <a class="dropdown-item" href="<?= base_url('meus-investimentos?c=' . $carteira['id']) ?>"><?= $carteira['nome_carteira'] ?></a>
                        <?php endforeach; ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('meus-investimentos/cadastros/criar-carteira') ?>">Criar nova carteira</a>
                        <a class="dropdown-item" href="<?= base_url('meus-investimentos/cadastros/editar-carteira') ?>">Editar Carteira atual (<small><?= $more_data['nome_carteira_atual'] ?></small>)</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('meus-investimentos/calculadora') ?>" class="nav-link">Calculadora de IR</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
