<?php
include('./includes/config.inc.php');
// Az első &-ig tartó rész az útvonal (pl. crud_edit&id=3 -> crud_edit)
$oldal = explode('&', $_SERVER['QUERY_STRING'])[0];
if ($oldal != "") {
    if (isset($oldalak[$oldal]) && file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {
        $keres = $oldalak[$oldal];
    }
    else {
        $keres = $hiba_oldal;
        header("HTTP/1.0 404 Not Found");
    }
}
else $keres = $oldalak['/'];
include('./templates/index.tpl.php');
?>
