<h2>➕ Új szerelő hozzáadása</h2>

<?php if (isset($crud_add_hiba)) { ?>
    <div class="uzenet-hiba">• <?= $crud_add_hiba ?></div>
<?php } ?>

<div class="crud-form">
    <form method="post" action="crud_add">
        <div class="urlap-mezo">
            <label for="nev">Szerelő neve: <span style="color:red">*</span></label>
            <input type="text" id="nev" name="nev"
                   placeholder="Pl.: Kovács István"
                   value="<?= $nev_val ?? '' ?>">
        </div>
        <div class="urlap-mezo">
            <label for="kezdev">Munkakezdés éve: <span style="color:red">*</span></label>
            <input type="text" id="kezdev" name="kezdev"
                   placeholder="Pl.: 2010"
                   value="<?= $kezdev_val ?? '' ?>">
        </div>
        <button type="submit" class="gomb gomb-success">💾 Mentés</button>
        <a href="crud" class="gomb gomb-secondary" style="margin-left:10px;">↩️ Vissza</a>
    </form>
</div>