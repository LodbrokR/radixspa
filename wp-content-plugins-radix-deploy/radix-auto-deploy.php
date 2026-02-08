<?php
/**
 * Plugin Name: Radix Auto-Deploy
 * Plugin URI: https://radixspa.cl
 * Description: Automatic deployment from GitHub to WordPress theme directory. Listens for GitHub webhooks and pulls latest changes.
 * Version: 1.0.0
 * Author: Radix Diseños
 * Author URI: https://radixspa.cl
 * License: GPL v2 or later
 * Text Domain: radix-deploy
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Radix_Auto_Deploy {
    
    private $webhook_secret = 'RADIX_DEPLOY_2024_SECURE';
    private $theme_path;
    private $log_file;
    
    public function __construct() {
        $this->theme_path = get_template_directory();
        $this->log_file = WP_CONTENT_DIR . '/radix-deploy.log';
        
        // Register webhook endpoint
        add_action('rest_api_init', array($this, 'register_webhook_endpoint'));
        
        // Admin menu
        add_action('admin_menu', array($this, 'add_admin_menu'));
        
        // Settings
        add_action('admin_init', array($this, 'register_settings'));
    }
    
    /**
     * Register REST API endpoint for GitHub webhook
     */
    public function register_webhook_endpoint() {
        register_rest_route('radix-deploy/v1', '/webhook', array(
            'methods' => 'POST',
            'callback' => array($this, 'handle_webhook'),
            'permission_callback' => '__return_true' // Public endpoint
        ));
    }
    
    /**
     * Handle incoming GitHub webhook
     */
    public function handle_webhook($request) {
        $this->write_log('📨 Webhook received');
        
        // Get payload
        $payload = $request->get_body();
        $signature = $request->get_header('x-hub-signature-256');
        
        // Verify signature if secret is set
        if (!empty($this->webhook_secret)) {
            $expected_signature = 'sha256=' . hash_hmac('sha256', $payload, $this->webhook_secret);
            
            if (!hash_equals($expected_signature, $signature)) {
                $this->write_log('❌ Invalid signature');
                return new WP_Error('invalid_signature', 'Invalid signature', array('status' => 403));
            }
            
            $this->write_log('✅ Signature verified');
        }
        
        // Decode payload
        $data = json_decode($payload, true);
        
        // Check if it's a push to main
        if (!isset($data['ref']) || $data['ref'] !== 'refs/heads/main') {
            $this->write_log('ℹ️ Ignoring non-main branch push');
            return array(
                'status' => 'ignored',
                'message' => 'Not a push to main branch'
            );
        }
        
        $this->write_log('📦 Push to main branch detected');
        $this->write_log('👤 Pushed by: ' . ($data['pusher']['name'] ?? 'unknown'));
        
        // Execute git pull
        $result = $this->execute_git_pull();
        
        if ($result['success']) {
            $this->write_log('✅ Deploy successful!');
            
            // Clear WordPress cache
            if (function_exists('wp_cache_flush')) {
                wp_cache_flush();
                $this->write_log('🧹 Cache cleared');
            }
            
            return array(
                'status' => 'success',
                'message' => 'Deploy completed successfully',
                'output' => $result['output']
            );
        } else {
            $this->write_log('❌ Deploy failed: ' . $result['error']);
            return new WP_Error('deploy_failed', $result['error'], array('status' => 500));
        }
    }
    
    /**
     * Execute git pull command
     */
    private function execute_git_pull() {
        $cwd = getcwd();
        chdir($this->theme_path);
        
        // Execute git pull
        exec('git pull origin main 2>&1', $output, $return_code);
        
        chdir($cwd);
        
        if ($return_code === 0) {
            return array(
                'success' => true,
                'output' => implode("\n", $output)
            );
        } else {
            return array(
                'success' => false,
                'error' => implode("\n", $output)
            );
        }
    }
    
    /**
     * Write to log file
     */
    private function write_log($message) {
        $timestamp = date('Y-m-d H:i:s');
        $log_message = "[$timestamp] $message\n";
        file_put_contents($this->log_file, $log_message, FILE_APPEND);
    }
    
    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        add_management_page(
            'Radix Auto-Deploy',
            'Auto-Deploy',
            'manage_options',
            'radix-deploy',
            array($this, 'admin_page')
        );
    }
    
    /**
     * Admin page content
     */
    public function admin_page() {
        ?>
        <div class="wrap">
            <h1>🚀 Radix Auto-Deploy</h1>
            
            <div class="card" style="max-width: 800px;">
                <h2>Configuración del Webhook</h2>
                <p>Configura este webhook en GitHub para deployar automáticamente cuando hagas push a main:</p>
                
                <table class="form-table">
                    <tr>
                        <th>Webhook URL:</th>
                        <td>
                            <code style="background: #f0f0f0; padding: 8px; display: block;">
                                <?php echo rest_url('radix-deploy/v1/webhook'); ?>
                            </code>
                            <button class="button" onclick="navigator.clipboard.writeText('<?php echo rest_url('radix-deploy/v1/webhook'); ?>')">
                                📋 Copiar URL
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th>Secret:</th>
                        <td>
                            <code style="background: #f0f0f0; padding: 8px; display: block;">
                                <?php echo esc_html($this->webhook_secret); ?>
                            </code>
                        </td>
                    </tr>
                    <tr>
                        <th>Content Type:</th>
                        <td><code>application/json</code></td>
                    </tr>
                    <tr>
                        <th>Events:</th>
                        <td><code>Just the push event</code></td>
                    </tr>
                </table>
                
                <h3>Pasos para configurar en GitHub:</h3>
                <ol>
                    <li>Ve a tu repositorio: <code>https://github.com/LodbrokR/radixspa</code></li>
                    <li>Click en <strong>Settings</strong> → <strong>Webhooks</strong> → <strong>Add webhook</strong></li>
                    <li>Pega la Webhook URL de arriba</li>
                    <li>Selecciona <strong>application/json</strong> como Content type</li>
                    <li>Pega el Secret</li>
                    <li>Selecciona <strong>Just the push event</strong></li>
                    <li>Marca <strong>Active</strong> y guarda</li>
                </ol>
            </div>
            
            <div class="card" style="max-width: 800px; margin-top: 20px;">
                <h2>📊 Últimos Logs</h2>
                <div style="background: #1e1e1e; color: #00ff00; padding: 15px; border-radius: 5px; font-family: monospace; font-size: 12px; max-height: 400px; overflow-y: auto;">
                    <?php
                    if (file_exists($this->log_file)) {
                        $logs = file_get_contents($this->log_file);
                        $log_lines = explode("\n", $logs);
                        $recent_logs = array_slice($log_lines, -50); // Last 50 lines
                        echo nl2br(esc_html(implode("\n", array_reverse($recent_logs))));
                    } else {
                        echo "No hay logs disponibles aún.";
                    }
                    ?>
                </div>
                <p style="margin-top: 10px;">
                    <a href="?page=radix-deploy&clear_logs=1" class="button">🗑️ Limpiar Logs</a>
                </p>
                <?php
                if (isset($_GET['clear_logs']) && $_GET['clear_logs'] == '1') {
                    file_put_contents($this->log_file, '');
                    echo '<div class="notice notice-success"><p>Logs limpiados exitosamente.</p></div>';
                }
                ?>
            </div>
            
            <div class="card" style="max-width: 800px; margin-top: 20px;">
                <h2>🧪 Probar Deploy Manual</h2>
                <p>Ejecuta un git pull manual para probar:</p>
                <form method="post">
                    <input type="hidden" name="manual_deploy" value="1">
                    <?php wp_nonce_field('radix_manual_deploy'); ?>
                    <button type="submit" class="button button-primary">🚀 Ejecutar Deploy Manual</button>
                </form>
                
                <?php
                if (isset($_POST['manual_deploy']) && check_admin_referer('radix_manual_deploy')) {
                    $result = $this->execute_git_pull();
                    if ($result['success']) {
                        echo '<div class="notice notice-success"><p>✅ Deploy exitoso!</p><pre>' . esc_html($result['output']) . '</pre></div>';
                    } else {
                        echo '<div class="notice notice-error"><p>❌ Deploy falló:</p><pre>' . esc_html($result['error']) . '</pre></div>';
                    }
                }
                ?>
            </div>
        </div>
        <?php
    }
    
    /**
     * Register plugin settings
     */
    public function register_settings() {
        register_setting('radix_deploy_settings', 'radix_deploy_secret');
    }
}

// Initialize plugin
new Radix_Auto_Deploy();
