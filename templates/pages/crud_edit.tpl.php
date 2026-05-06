<h2>✏️ Szerelő szerkesztése</h2>

<?php if (isset($crud_edit_hiba)) { ?>
    <div class="uzenet-hiba">• <?= $crud_edit_hiba ?></div>
<?php } ?>

<?php if ($szerelo) { ?>
    <div class="crud-form">
        <form method="post" action="crud_edit&id=<?= (int)$szerelo['az'] ?>">
            <input type="hidden" name="id" value="<?= (int)$szerelo['az'] ?>">

            <div class="urlap-mezo">
                <label for="nev">Szerelő neve: <span style="color:red">*</span></label>
                <input type="text" id="nev" name="nev"
                       value="<?= htmlspecialchars($szerelo['nev']) ?>">
            </div>
            <div class="urlap-mezo">
                <label for="kezdev">Munkakezdés éve: <span style="color:red">*</span></label>
                <input type="text" id="kezdev" name="kezdev"
                       value="<?= htmlspecialchars($szerelo['kezdev']) ?>">
            </div>

            <button type="submit" class="gomb gomb-warning">💾 Módosítás mentése</button>
            <a href="crud" class="gomb gomb-secondary" style="margin-left:10px;">↩️ Vissza</a>
        </form>
    </div>
<?php } ?>