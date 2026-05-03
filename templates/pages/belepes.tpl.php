<h2>🔐 Belépés és Regisztráció</h2>

<?php if (isset($belepes_hiba)) { ?>
    <div class="uzenet-hiba"><?= htmlspecialchars($belepes_hiba) ?></div>
<?php } ?>

<div class="auth-wrap">
    <!-- BELÉPÉS -->
    <div class="auth-box">
        <h2>🚪 Belépés</h2>
        <form action="belep" method="post">
            <div class="urlap-mezo">
                <label for="felhasznalo">Felhasználónév:</label>
                <input type="text" id="felhasznalo" name="felhasznalo"
                       placeholder="Felhasználói név" autocomplete="username">
            </div>
            <div class="urlap-mezo">
                <label for="jelszo">Jelszó:</label>
                <input type="password" id="jelszo" name="jelszo"
                       placeholder="Jelszó" autocomplete="current-password">
            </div>
            <button type="submit" class="gomb gomb-primary">🔓 Belépés</button>
        </form>
    </div>

    <!-- REGISZTRÁCIÓ -->
    <div class="auth-box">
        <h2>📝 Regisztráció</h2>
        <p style="font-size:0.88em; color:#546e7a; margin-bottom:12px;">
            Regisztráció után automatikus belépés <strong>nem</strong> történik.
        </p>
        <form action="regisztral" method="post">
            <div class="urlap-mezo">
                <label for="vezeteknev">Vezetéknév:</label>
                <input type="text" id="vezeteknev" name="vezeteknev"
                       placeholder="Vezetéknév">
            </div>
            <div class="urlap-mezo">
                <label for="utonev">Utónév:</label>
                <input type="text" id="utonev" name="utonev"
                       placeholder="Utónév">
            </div>
            <div class="urlap-mezo">
                <label for="reg_felhsznalo">Felhasználói név:</label>
                <input type="text" id="reg_felhsznalo" name="felhasznalo"
                       placeholder="Felhasználói név (max. 12 karakter)">
            </div>
            <div class="urlap-mezo">
                <label for="reg_jelszo">Jelszó:</label>
                <input type="password" id="reg_jelszo" name="jelszo"
                       placeholder="Jelszó" autocomplete="new-password">
            </div>
            <button type="submit" class="gomb gomb-success">✅ Regisztráció</button>
        </form>
    </div>
</div>
