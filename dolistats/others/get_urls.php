<?php
$config = parse_ini_file('urls.ini');
$urls = isset($config['urls']) ? $config['urls'] : [];
header('Content-Type: application/json');
echo json_encode(['urls' => $urls]);
