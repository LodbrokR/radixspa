<?php
/**
 * Descripción Meta Box Callback  
 */
function radix_proyecto_descripcion_callback($post) {
    wp_nonce_field('radix_proyecto_descripcion_nonce', 'proyecto_descripcion_nonce');
    $descripcion = get_post_meta($post->ID, '_proyecto_descripcion', true);
    $caracteristicas = get_post_meta($post->ID, '_proyecto_caracteristicas', true);
    $materiales = get_post_meta($post->ID, '_proyecto_materiales', true);
    ?>
    <style>
        .radix-desc-container { background: #f9f9f9; padding: 20px; border-radius: 8px; border: 1px solid #e0e0e0; }
        .radix-field-group { margin-bottom: 20px; }
        .radix-field-label { display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; }
        .radix-field-help { display: block; font-size: 12px; color: #646970; margin-bottom: 8px; font-style: italic; }
        .radix-field-input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        .radix-field-input:focus { border-color: #2271b1; outline: none; box-shadow: 0 0 0 1px #2271b1; }
        .radix-field-textarea { min-height: 100px; resize: vertical; }
    </style>
    <div class="radix-desc-container">
        <div style="background: #e7f3ff; border-left: 4px solid #2271b1; padding: 12px; margin-bottom: 15px; border-radius: 4px;">
            <p style="margin: 0; font-size: 13px;"><strong>💡 Tip:</strong> Llena estos campos para describir el proyecto. Son fáciles y claros.</p>
        </div>
        <div class="radix-field-group">
            <label class="radix-field-label">📝 Descripción del Proyecto</label>
            <span class="radix-field-help">Describe el proyecto en 2-3 párrafos</span>
            <textarea name="proyecto_descripcion" class="radix-field-input radix-field-textarea" placeholder="Walking closet moderno diseñado a medida con acabados premium..."><?php echo esc_textarea($descripcion); ?></textarea>
        </div>
        <div class="radix-field-group">
            <label class="radix-field-label">⭐ Características Destacadas</label>
            <span class="radix-field-help">Una característica por línea</span>
            <textarea name="proyecto_caracteristicas" class="radix-field-input radix-field-textarea" placeholder="Diseño a medida&#10;Materiales premium&#10;Iluminación LED"><?php echo esc_textarea($caracteristicas); ?></textarea>
        </div>
        <div class="radix-field-group">
            <label class="radix-field-label">🛠️ Materiales (Opcional)</label>
            <span class="radix-field-help">Separados por comas</span>
            <input type="text" name="proyecto_materiales" class="radix-field-input" value="<?php echo esc_attr($materiales); ?>" placeholder="Melamina, Herrajes importados, Vidrio" />
        </div>
    </div>
    <?php
}
