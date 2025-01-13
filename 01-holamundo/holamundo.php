<?php
/*
Plugin Name: Mi Primer Plugin
Description: Este es un plugin básico para demostrar cómo se crea un plugin en WordPress.
Version: 1.0
Author: Jans Molina
*/

// Hook que agrega contenido al pie de cada entrada.
add_action('wp_footer', 'funcion_personalizada');

function funcion_personalizada() {
    echo "<p> Este es el plugins creado! </p>"
}