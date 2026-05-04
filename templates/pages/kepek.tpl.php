<h2>🖼️ Képgaléria</h2>

<?php if (isset($feltoltes_uzenet)) { ?>
    <div class="<?= $feltoltes_ok ? 'uzenet-ok' : 'uzenet-hiba' ?>">
        <?= htmlspecialchars($feltoltes_uzenet) ?>
    </div>
<?php } ?>

<!-- Képfeltöltés – csak bejelentkezett felhasználónak -->
<?php if (isset($_SESSION['login'])) { ?>
    <div class="feltolto-form">
        <h3>📤 Kép feltöltése</h3>
        <form action="kepfeltolt" method="post" enctype="multipart/form-data">
            <div class="urlap-mezo">
                <label for="kep">Képfájl (jpg, png, gif – max. 5 MB):</label>
                <input type="file" id="kep" name="kep" accept="image/jpeg,image/png,image/gif"
                       style="padding:6px; width:100%;">
            </div>
            <div class="urlap-mezo">
                <label for="leiras">Leírás (opcionális):</label>
                <input type="text" id="leiras" name="leiras" placeholder="Kép rövid leírása...">
            </div>
            <button type="submit" class="gomb gomb-success">⬆️ Feltöltés</button>
        </form>
    </div>
<?php } else { ?>
    <div class="uzenet-ok" style="background:#fff3e0; border-color:#f57f17; color:#e65100;">
        ℹ️ Képet feltölteni csak bejelentkezett felhasználó tud.
        <a href="belepes" class="gomb gomb-primary" style="margin-left:10px; padding:5px 14px; font-size:0.85em;">Belépés</a>
    </div>
<?php } ?>

<!-- Galéria megjelenítése -->
<h3 style="margin-top:25px;">📸 Feltöltött képek</h3>
<?php if (empty($kepek)) { ?>
    <p style="color:#546e7a; font-style:italic;">Még nem töltöttek fel képet.</p>
<?php } else { ?>
    <div class="galeria-grid">
        <?php foreach ($kepek as $kep) { ?>
            <div class="galeria-item">
                <a href="./images/galeria/<?= htmlspecialchars($kep['fajlnev']) ?>" target="_blank">
                    <img src="./images/galeria/<?= htmlspecialchars($kep['fajlnev']) ?>"
                         alt="<?= htmlspecialchars($kep['leiras'] ?: $kep['fajlnev']) ?>">
                </a>
                <div class="kep-info">
                    <?php if (!empty($kep['leiras'])) { ?>
                        <strong><?= htmlspecialchars($kep['leiras']) ?></strong><br>
                    <?php } ?>
                    👤 <?= htmlspecialchars($kep['feltolto']) ?><br>
                    🕐 <?= date('Y.m.d H:i', strtotime($kep['feltoltes_ideje'])) ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
