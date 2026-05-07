<h2>🔧 Szerelők nyilvántartása (CRUD)</h2>
<p>A <strong>Tiszta Víz Kft.</strong> szerelőinek kezelése – létrehozás, olvasás, módosítás, törlés.</p>

<?php if (isset($crud_uzenet)) { ?>
    <div class="<?= $crud_ok ? 'uzenet-ok' : 'uzenet-hiba' ?>">
        <?= htmlspecialchars($crud_uzenet) ?>
    </div>
<?php } ?>

<div style="margin: 18px 0;">
    <a href="crud_add" class="gomb gomb-success">➕ Új szerelő hozzáadása</a>
</div>

<?php if (empty($szerelok)) { ?>
    <p style="color:#546e7a; font-style:italic;">Nincs rögzített szerelő.</p>
<?php } else { ?>
    <div class="tabla-wrap">
        <table class="crud-tabla">
            <thead>
            <tr>
                <th>Azonosító</th>
                <th>Neve</th>
                <th>Munkakezdés éve</th>
                <th>Munkaviszony (év)</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($szerelok as $s) { ?>
                <tr>
                    <td><?= (int)$s['az'] ?></td>
                    <td><strong><?= htmlspecialchars($s['nev']) ?></strong></td>
                    <td><?= (int)$s['kezdev'] ?></td>
                    <td><?= date('Y') - (int)$s['kezdev'] ?> év</td>
                    <td class="muveletek">
                        <a href="crud_edit&id=<?= (int)$s['az'] ?>"
                           class="gomb gomb-warning" style="padding:5px 12px; font-size:0.85em;">
                            ✏️ Szerkesztés
                        </a>
                        <form method="post" action="crud_delete" style="display:inline;"
                              onsubmit="return confirm('Biztosan törli: <?= htmlspecialchars(addslashes($s['nev'])) ?>?')">
                            <input type="hidden" name="id" value="<?= (int)$s['az'] ?>">
                            <button type="submit" class="gomb gomb-danger" style="padding:5px 12px; font-size:0.85em;">
                                🗑️ Törlés
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <p style="font-size:0.85em; color:#546e7a; margin-top:8px;">
        Összesen: <strong><?= count($szerelok) ?></strong> szerelő
    </p>
<?php } ?>