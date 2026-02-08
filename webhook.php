<?php
/**
 * GitHub Webhook Handler for Radix Theme Auto-Deploy
 * 
 * Este archivo debe colocarse en el servidor en:
 * /public_html/webhook.php
 * 
 * Luego configurar en GitHub:
 * Repository → Settings → Webhooks → Add webhook
 * Payload URL: https://radixspa.cl/webhook.php
 * Content type: application/json
 * Secret: RADIX_DEPLOY_2024_SECURE
 */

// Configuración
define('WEBHOOK_SECRET', 'RADIX_DEPLOY_2024_SECURE'); // Cambiar por un secreto fuerte
define('THEME_PATH', '/home/radixspa/public_html/wp-content/themes/radix-theme');
define('LOG_FILE', '/home/radixspa/deploy.log');

// Función para registrar logs
function writeLog($message) {
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents(LOG_FILE, "[$timestamp] $message\n", FILE_APPEND);
}

// Verificar que es una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die('Method Not Allowed');
}

// Obtener el payload
$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

// Verificar la firma (seguridad)
if (!empty(WEBHOOK_SECRET)) {
    $expected_signature = 'sha256=' . hash_hmac('sha256', $payload, WEBHOOK_SECRET);
    if (hash_equals($expected_signature, $signature)) {
        writeLog('✅ Signature verified');
    } else {
        writeLog('❌ Invalid signature');
        http_response_code(403);
        die('Invalid signature');
    }
}

// Decodificar el payload
$data = json_decode($payload, true);

// Verificar que es un push a main
if (isset($data['ref']) && $data['ref'] === 'refs/heads/main') {
    writeLog('📦 Received push to main branch');
    writeLog('👤 Pusher: ' . ($data['pusher']['name'] ?? 'unknown'));
    
    // Cambiar al directorio del tema
    chdir(THEME_PATH);
    
    // Ejecutar git pull
    exec('git pull origin main 2>&1', $output, $return_code);
    
    if ($return_code === 0) {
        writeLog('✅ Deploy successful!');
        writeLog('Output: ' . implode("\n", $output));
        
        // Limpiar caché de WordPress si existe WP-CLI
        exec('wp cache flush 2>&1', $cache_output);
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Deploy completed successfully',
            'output' => $output
        ]);
    } else {
        writeLog('❌ Deploy failed');
        writeLog('Error: ' . implode("\n", $output));
        
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'message' => 'Deploy failed',
            'output' => $output
        ]);
    }
} else {
    writeLog('ℹ️ Ignoring non-main branch push');
    echo json_encode([
        'status' => 'ignored',
        'message' => 'Not a push to main branch'
    ]);
}

http_response_code(200);
