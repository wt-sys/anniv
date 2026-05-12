<?php
// Configuration CORS pour autoriser les requêtes cross-origin
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Gérer les requêtes OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Accepter uniquement POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

// Récupérer les données JSON
$data = json_decode(file_get_contents('php://input'), true);

// Fichier JSON pour stocker les visites
$visitsFile = __DIR__ . '/visits.json';

// Créer le fichier s'il n'existe pas
if (!file_exists($visitsFile)) {
    file_put_contents($visitsFile, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Lire les visites existantes
$visits = json_decode(file_get_contents($visitsFile), true);
if (!is_array($visits)) {
    $visits = [];
}

// Ajouter la nouvelle visite
$visits[] = [
    'sessionId' => $data['sessionId'] ?? null,
    'ip' => $data['ip'] ?? 'Unknown',
    'timestamp' => $data['timestamp'] ?? date('c'),
    'userAgent' => $data['userAgent'] ?? 'Unknown',
    'referrer' => $data['referrer'] ?? 'direct',
    'language' => $data['language'] ?? 'Unknown',
    'recorded_at' => date('c')
];

// Nettoyer les anciennes données (>90 jours)
$cleanedVisits = [];
$ninetyDaysAgo = strtotime('-90 days');
foreach ($visits as $visit) {
    $visitTime = strtotime($visit['timestamp']);
    if ($visitTime > $ninetyDaysAgo) {
        $cleanedVisits[] = $visit;
    }
}

// Écrire les données nettoyées
if (file_put_contents($visitsFile, json_encode($cleanedVisits, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Visit recorded']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Could not write to file']);
}
?>
