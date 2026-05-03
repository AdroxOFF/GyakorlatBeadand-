<h2>👋 Sikeres kilépés</h2>
<p>
    <?php if ($kilep_nev) { ?>
        <strong><?= htmlspecialchars($kilep_nev) ?></strong> sikeresen kijelentkezett.
    <?php } else { ?>
        Sikeresen kijelentkezett.
    <?php } ?>
</p>
<a href="." class="gomb gomb-primary" style="margin-top:15px; display:inline-block;">🏠 Vissza a főoldalra</a>
