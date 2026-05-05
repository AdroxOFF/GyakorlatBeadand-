<h2>📬 Kapcsolat</h2>
<p>Vegye fel velünk a kapcsolatot az alábbi űrlapon! Igyekszünk 24 órán belül válaszolni.</p>

<?php if (isset($szerver_hiba)) { ?>
    <div class="uzenet-hiba"><?= htmlspecialchars($szerver_hiba) ?></div>
<?php } ?>

<div class="urlap">
    <!--
        A HTML5 kötelezőség (required, type="email", pattern) szándékosan NINCS használva.
        Az ellenőrzést JavaScript (kliens) és PHP (szerver) végzi.
    -->
    <form id="kapcsolatForm" action="uzkld" method="post" novalidate onsubmit="return validalUr(this)">

        <div class="urlap-mezo">
            <label for="nev">Teljes neve: <span style="color:red">*</span></label>
            <input type="text" id="nev" name="nev"
                   placeholder="Pl.: Kovács János"
                   value="<?= htmlspecialchars($_POST['nev'] ?? '') ?>">
            <span class="hiba-uzenet" id="nev-hiba">⚠️ Kérem adja meg a nevét!</span>
        </div>

        <div class="urlap-mezo">
            <label for="email">E-mail cím: <span style="color:red">*</span></label>
            <input type="text" id="email" name="email"
                   placeholder="Pl.: pelda@email.hu"
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            <span class="hiba-uzenet" id="email-hiba">⚠️ Kérem adjon meg érvényes e-mail címet!</span>
        </div>

        <div class="urlap-mezo">
            <label for="targy">Tárgy: <span style="color:red">*</span></label>
            <input type="text" id="targy" name="targy"
                   placeholder="Pl.: Csőtörés bejelentés"
                   value="<?= htmlspecialchars($_POST['targy'] ?? '') ?>">
            <span class="hiba-uzenet" id="targy-hiba">⚠️ Kérem adja meg az üzenet tárgyát!</span>
        </div>

        <div class="urlap-mezo">
            <label for="uzenet">Üzenet: <span style="color:red">*</span></label>
            <textarea id="uzenet" name="uzenet"
                      placeholder="Írja ide üzenetét (minimum 10 karakter)..."><?= htmlspecialchars($_POST['uzenet'] ?? '') ?></textarea>
            <span class="hiba-uzenet" id="uzenet-hiba">⚠️ Az üzenet legalább 10 karakter legyen!</span>
        </div>

        <button type="submit" class="gomb gomb-primary">📤 Üzenet küldése</button>
        <p style="font-size:0.83em; color:#546e7a; margin-top:8px;">
            <span style="color:red">*</span> Kötelező mezők
        </p>
    </form>
</div>

<script>
    /**
     * Kliens oldali űrlapellenőrzés – JavaScript
     * A HTML5 validáció ki van kapcsolva (novalidate), ezt végzi el.
     */
    function validalUr(form) {
        let hibas = false;

        function mezoHiba(mezoId, hibaId, felt) {
            const hibaElem = document.getElementById(hibaId);
            if (felt) {
                hibaElem.style.display = 'block';
                document.getElementById(mezoId).style.borderColor = '#c62828';
                hibas = true;
            } else {
                hibaElem.style.display = 'none';
                document.getElementById(mezoId).style.borderColor = '#90caf9';
            }
        }

        const nev    = form.nev.value.trim();
        const email  = form.email.value.trim();
        const targy  = form.targy.value.trim();
        const uzenet = form.uzenet.value.trim();

        // E-mail regex ellenőrzés
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        mezoHiba('nev',    'nev-hiba',    nev.length < 2);
        mezoHiba('email',  'email-hiba',  !emailRegex.test(email));
        mezoHiba('targy',  'targy-hiba',  targy.length < 2);
        mezoHiba('uzenet', 'uzenet-hiba', uzenet.length < 10);

        if (hibas) {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        return !hibas;
    }

    // Valós idejű ellenőrzés blur eseményre
    document.addEventListener('DOMContentLoaded', function () {
        ['nev', 'email', 'targy', 'uzenet'].forEach(function(id) {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('blur', function() {
                    document.getElementById('kapcsolatForm').dispatchEvent;
                });
            }
        });
    });
</script>
