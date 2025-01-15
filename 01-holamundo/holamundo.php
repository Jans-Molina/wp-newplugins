<?php
/*
Plugin Name: Hola Mundo Email
Plugin URI: https://vawt.cl
Description: Este es un plugin básico para demostrar cómo se crea un plugin en WordPress, enviando correos con descuentos a los clientes cada 24hrs.
Version: 1.0
Author: VAWT.CL
Author URI: https://vawt.cl
*/

if (!defined('ABSPATH')) {
    exit;
}

register_activation_hook(__FILE__, 'vawt_hm_schedule_email');
function vawt_hm_schedule_email()
{
    if (!wp_next_scheduled('vawt_hm_diario_email')) {
        wp_schedule_event(time(), 'daily', 'vawt_hm_diario_email');
    }
}

register_deactivation_hook(__FILE__, 'vawt_hm_unschedule_email');
function vawt_hm_unschedule_email()
{
    $timestamp = wp_next_scheduled('vawt_hm_diario_email');
    if ($timestamp) {
        wp_unschedule_event($timestamp, 'vawt_hm_diario_email');
    }
}

add_action('vawt_hm_diario_email', 'vawt_hm_envio_correo');
function vawt_hm_envio_correo()
{
    $clients = vawt_hm_obtener_cliente();
    $products = vawt_hm_obtener_desc_producto();

    if (empty($clients) || empty($products)) {
        return;
    }

    foreach ($clients as $client) {
        $to = $client['email'];
        $subject = '¡Ofertas Diarias en VAWT.CL!';
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        $body = vawt_hm_generar_email($products, $client['name']);

        wp_mail($to, $subject, $body, $headers);
    }
}

function vawt_hm_obtener_cliente()
{
    return [
        ['name' => 'Juan Pérez', 'email' => 'juan.perez@example.com'],
        ['name' => 'María López', 'email' => 'maria.lopez@example.com'],
    ];
}

function vawt_hm_obtener_desc_producto()
{
    return [
        ['name' => 'Panel Solar', 'link' => 'https://vawt.cl/panel-solar', 'discount' => '20%'],
        ['name' => 'Turbina Eólica', 'link' => 'https://vawt.cl/turbina-eolica', 'discount' => '15%'],
    ];
}

function vawt_hm_generar_email($products, $client_name)
{
    $content = "<h1>Hola, $client_name!</h1>";
    $content .= "<p>Estas son las ofertas exclusivas de hoy:</p><ul>";

    foreach ($products as $product) {
        $content .= "<li><strong>{$product['name']}</strong>: {$product['discount']} de descuento. <a href='{$product['link']}'>Ver Producto</a></li>";
    }

    $content .= "</ul><p>Visítanos en <a href='https://vawt.cl'>nuestra página web</a> para más detalles.</p>";
    return $content;
}
