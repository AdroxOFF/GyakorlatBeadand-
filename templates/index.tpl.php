<?php session_start(); ?>
<?php if (file_exists('./logicals/' . $keres['fajl'] . '.php')) {
    include("./logicals/{$keres['fajl']}.php");
} ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($ablakcim['cim']) ?><?= isset($keres['szoveg']) && $keres['szoveg'] ? ' | ' . htmlspecialchars($keres['szoveg']) : '' ?></title>
    <link rel="stylesheet" href="./styles/stilus.css" type="text/css">
    <?php if (file_exists('./styles/' . $keres['fajl'] . '.css')) { ?>
        <link rel="stylesheet" href="./styles/<?= $keres['fajl'] ?>.css" type="text/css">
    <?php } ?>
</head>
<body>

<header>
    <div class="header-inner">
        <div class="header-logo">
            <img src="./images/<?= htmlspecialchars($fejlec['kepforras']) ?>"
                 alt="<?= htmlspecialchars($fejlec['kepalt']) ?>">
        </div>
        <div class="header-text">
            <h1><?= htmlspecialchars($fejlec['cim']) ?></h1>
            <?php if (!empty($fejlec['motto'])) { ?>
                <p class="motto"><?= htmlspecialchars($fejlec['motto']) ?></p>
            <?php } ?>
        </div>
        <?php if (isset($_SESSION['login'])) { ?>
            <div class="bejelentkezett">
                🔓 Bejelentkezett: <strong><?= htmlspecialchars($_SESSION['csn'] . ' ' . $_SESSION['un']) ?></strong>
                (<?= htmlspecialchars($_SESSION['login']) ?>)
            </div>
        <?php } ?>
    </div>
</header>

<nav id="fomenu">
    <ul>
        <?php foreach ($oldalak as $url => $oldal) { ?>
            <?php
            $latható = (!isset($_SESSION['login']) && $oldal['menun'][0])
                    || (isset($_SESSION['login']) && $oldal['menun'][1]);
            if ($latható) { ?>
                <li<?= ($oldal === $keres) ? ' class="active"' : '' ?>>
                    <a href="<?= ($url === '/') ? '.' : htmlspecialchars($url) ?>">
                        <?= htmlspecialchars($oldal['szoveg']) ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</nav>

<div id="wrapper">
    <main id="content">
        <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
    </main>
</div>

<footer>
    <p>
        <?php if (isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= htmlspecialchars($lablec['copyright']) ?>&nbsp;<?php } ?>
        <?php if (isset($lablec['ceg'])) { ?><strong><?= htmlspecialchars($lablec['ceg']) ?></strong><?php } ?>
        &nbsp;|&nbsp; Vízvezeték-szerelés, csőtörés-elhárítás
    </p>
</footer>

</body>
</html>
