<?php
// Ha siker a login akk ---------> (logicals/belep.php kezeli)
// Ha mégis ideér (hiba esetén a logicals megállíttja), megjelenítjük a hibát
if (isset($belepes_hiba)) {
    echo '<div class="uzenet-hiba">' . htmlspecialchars($belepes_hiba) . '</div>';
    echo '<a href="belepes" class="gomb gomb-secondary" style="margin-top:12px; display:inline-block;">↩️ Vissza</a>';
}
?>
