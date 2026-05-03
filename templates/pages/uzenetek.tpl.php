<h2>📥 Beérkezett üzenetek</h2>

<?php if (isset($db_hiba)) { ?>
    <div class="uzenet-hiba"><?= htmlspecialchars($db_hiba) ?></div>
<?php } elseif (empty($uzenetek)) { ?>
    <p style="color:#546e7a; font-style:italic;">Még nem érkezett üzenet a kapcsolat-űrlapon keresztül.</p>
<?php } else { ?>
    <p>Összesen <strong><?= count($uzenetek) ?></strong> üzenet (legfrissebb elöl).</p>
    <div class="tabla-wrap">
        <table class="uzenet-tabla">
            <thead>
            <tr>
                <th>#</th>
                <th>Küldő neve</th>
                <th>E-mail</th>
                <th>Tárgy</th>
                <th>Üzenet (részlet)</th>
                <th>Küldő felhasználó</th>
                <th>Küldés ideje</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($uzenetek as $i => $uzenet) { ?>
                <tr>
                    <td><?= $uzenet['id'] ?></td>
                    <td><?= htmlspecialchars($uzenet['nev']) ?></td>
                    <td><a href="mailto:<?= htmlspecialchars($uzenet['email']) ?>">
                            <?= htmlspecialchars($uzenet['email']) ?>
                        </a></td>
                    <td><?= htmlspecialchars($uzenet['targy']) ?></td>
                    <td title="<?= htmlspecialchars($uzenet['uzenet']) ?>">
                        <?= htmlspecialchars(mb_substr($uzenet['uzenet'], 0, 60)) ?>
                        <?= mb_strlen($uzenet['uzenet']) > 60 ? '…' : '' ?>
                    </td>
                    <td>
                        <?php if ($uzenet['felhasznalo']) { ?>
                            <strong><?= htmlspecialchars($uzenet['felhasznalo']) ?></strong>
                        <?php } else { ?>
                            <em style="color:#546e7a;">Vendég</em>
                        <?php } ?>
                    </td>
                    <td><?= date('Y.m.d H:i', strtotime($uzenet['kuldes_ideje'])) ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>
