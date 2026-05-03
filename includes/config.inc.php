<?php
$ablakcim = array(
    'cim' => 'Tiszta Víz Kft.',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt'    => 'Tiszta Víz Kft. logó',
    'cim'       => 'Tiszta Víz Kft.',
    'motto'     => 'Vízvezeték-szerelés szakszerűen – Sárgahegy és térsége'
);

$lablec = array(
    'copyright' => 'Copyright ' . date("Y") . '.',
    'ceg'       => 'Tiszta Víz Kft.'
);

// menun[0] = látható bejelentkezés NÉLKÜL, menun[1] = !!látható bejelentkezve!!
$oldalak = array(
    '/'          => array('fajl' => 'cimlap',      'szoveg' => 'Főoldal',       'menun' => array(1,1)),
    'kepek'      => array('fajl' => 'kepek',       'szoveg' => 'Képek',         'menun' => array(1,1)),
    'kapcsolat'  => array('fajl' => 'kapcsolat',   'szoveg' => 'Kapcsolat',     'menun' => array(1,1)),
    'crud'       => array('fajl' => 'crud',        'szoveg' => 'CRUD',          'menun' => array(1,1)),
    'uzenetek'   => array('fajl' => 'uzenetek',    'szoveg' => 'Üzenetek',      'menun' => array(0,1)),
    'belepes'    => array('fajl' => 'belepes',     'szoveg' => 'Belépés',       'menun' => array(1,0)),
    'kilepes'    => array('fajl' => 'kilepes',     'szoveg' => 'Kilépés',       'menun' => array(0,1)),
    // Nem menüpontok (logikai oldalak)
    'belep'      => array('fajl' => 'belep',       'szoveg' => '',              'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral',  'szoveg' => '',              'menun' => array(0,0)),
    'kepfeltolt' => array('fajl' => 'kepfeltolt',  'szoveg' => '',              'menun' => array(0,0)),
    'uzkld'      => array('fajl' => 'uzkld',       'szoveg' => '',              'menun' => array(0,0)),
    'crud_add'   => array('fajl' => 'crud_add',    'szoveg' => '',              'menun' => array(0,0)),
    'crud_edit'  => array('fajl' => 'crud_edit',   'szoveg' => '',              'menun' => array(0,0)),
    'crud_delete'=> array('fajl' => 'crud_delete', 'szoveg' => '',              'menun' => array(0,0)),
);

$hiba_oldal = array('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>
