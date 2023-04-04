<?php

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$url = $data['url'];

$iniFile = 'urls.ini';

$ini = parse_ini_file($iniFile, true);

if (!$ini) {
    echo json_encode(['success' => false, 'message' => 'Le fichier urls.ini n\'existe pas']);
    exit;
}

$ini['urls']['url' . count($ini['urls']) + 1] = $url;

$result = write_ini_file($ini, $iniFile, true);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Une erreur s\'est produite lors de l\'écriture du fichier']);
}

function write_ini_file($data, $file, $make_backup = true)
{
    if ($make_backup) {
        $backup_file = $file . '.bak';
        if (file_exists($file)) {
            copy($file, $backup_file);
        }
    }

    $content = '';

    foreach ($data as $section => $values) {
        $content .= "[$section]\n";
        foreach ($values as $key => $value) {
            $content .= "$key=$value\n";
        }
    }

    return file_put_contents($file, $content) !== false;
}

?>
