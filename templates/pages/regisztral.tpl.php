<h2>📋 Regisztráció eredménye</h2>
<?php if (isset($reg_uzenet)) { ?>
    <div class="<?= $reg_ujra ? 'uzenet-hiba' : 'uzenet-ok' ?>">
        <?= htmlspecialchars($reg_uzenet) ?>
    </div>
    <?php if ($reg_ujra) { ?>
        <a href="belepes" class="gomb gomb-secondary" style="margin-top:12px; display:inline-block;">
            ↩️ Vissza a belépéshez
        </a>
    <?php } else { ?>
        <p style="margin-top:12px;">Most már <a href="belepes">be tud lépni</a> az oldalra.</p>
    <?php } ?>
<?php } ?>
