/*
Theme Name: Pitada de Amor
Theme URI: https://pitadadeamor.com.br
Author: Seu Nome
Description: Tema personalizado para a loja Pitada de Amor com decoração de Dia dos Namorados
Version: 1.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: pitada-de-amor
Tags: e-commerce, woocommerce, responsive
*/

/* Aqui você coloca todo o CSS do protótipo */
:root {
    --turquoise: #24b9ca;
    --pink: #FF69B4;
    --red: #FF0000;
    --black: #000000;
    --white: #FFFFFF;
    --light-gray: #f5f5f5;
    --gray: #888888;
}

/* Resto do CSS do protótipo... */

3. Arquivo functions.php

Este arquivo contém todas as funções e configurações do tema:

<?php
/**
 * Pitada de Amor functions and definitions
 *
 * @package Pitada_de_Amor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define('PITADA_THEME_VERSION', '1.0.0');
define('PITADA_THEME_DIR', trailingslashit(get_template_directory()));
define('PITADA_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));

/**
 * Theme Setup
 */
function pitada_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Register menu locations
    register_nav_menus(array(
        'primary' => esc_html__('Menu Principal', 'pitada-de-amor'),
        'footer' => esc_html__('Menu Rodapé', 'pitada-de-amor'),
    ));

    // Switch default core markup to output valid HTML5.
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'pitada_setup');

/**
 * Enqueue scripts and styles.
 */
function pitada_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('pitada-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap', array(), null);
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Enqueue main stylesheet
    wp_enqueue_style('pitada-style', get_stylesheet_uri(), array(), PITADA_THEME_VERSION);
    
    // Enqueue custom JavaScript
    wp_enqueue_script('pitada-scripts', PITADA_THEME_URI . 'js/scripts.js', array('jquery'), PITADA_THEME_VERSION, true);
    
    // Localize script for AJAX
    wp_localize_script('pitada-scripts', 'pitada_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('pitada-ajax-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'pitada_scripts');

/**
 * Register widget areas.
 */
function pitada_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'pitada-de-amor'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Adicione widgets aqui.', 'pitada-de-amor'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Rodapé Coluna 1', 'pitada-de-amor'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Widgets do rodapé coluna 1.', 'pitada-de-amor'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Rodapé Coluna 2', 'pitada-de-amor'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Widgets do rodapé coluna 2.', 'pitada-de-amor'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Rodapé Coluna 3', 'pitada-de-amor'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Widgets do rodapé coluna 3.', 'pitada-de-amor'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'pitada_widgets_init');

/**
 * Include WooCommerce functions
 */
require PITADA_THEME_DIR . 'inc/woocommerce-functions.php';

/**
 * Include Customizer functions
 */
require PITADA_THEME_DIR . 'inc/customizer.php';

4. Arquivo header.php

Este arquivo contém o cabeçalho do site:

<?php
/**
 * The header for our theme
 *
 * @package Pitada_de_Amor
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="top-bar-contact">
                <a href="tel:+5511999999999"><i class="fas fa-phone"></i> (11) 99999-9999</a>
                <a href="mailto:contato@pitadadeamor.com.br"><i class="fas fa-envelope"></i> contato@pitadadeamor.com.br</a>
            </div>
            <div class="top-bar-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="main-header">
        <div class="header-content">
            <button class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="logo">
                <span class="logo-heart"><i class="fas fa-heart"></i></span>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-text"><?php bloginfo('name'); ?></a>
            </div>
            <div class="search-bar">
                <?php get_search_form(); ?>
            </div>
            <div class="header-actions">
                <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">
                    <i class="far fa-user"></i>
                    <span>Conta</span>
                </a>
                <a href="<?php echo esc_url(wc_get_endpoint_url('wishlist', '', wc_get_page_permalink('myaccount'))); ?>">
                    <i class="far fa-heart"></i>
                    <span>Favoritos</span>
                </a>
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" style="position: relative;">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    <span>Carrinho</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="main-nav">
        <div class="nav-content">
            <button class="close-menu">
                <i class="fas fa-times"></i>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-list',
                'container'      => false,
                'fallback_cb'    => false,
                'walker'         => new Pitada_Walker_Nav_Menu(),
            ));
            ?>
        </div>
        <div class="menu-overlay"></div>
    </nav>

5. Arquivo footer.php

Este arquivo contém o rodapé do site:

<?php
/**
 * The template for displaying the footer
 *
 * @package Pitada_de_Amor
 */

?>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="newsletter-content">
            <h3>Assine nossa Newsletter</h3>
            <p>Receba ofertas exclusivas e novidades em primeira mão</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Seu melhor e-mail">
                <button type="submit">Assinar</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else : ?>
                    <h4><?php bloginfo('name'); ?></h4>
                    <p>Sua loja online de acessórios, sapatos e cosméticos com uma pitada de amor em cada produto.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else : ?>
                    <h4>Categorias</h4>
                    <ul class="footer-links">
                        <?php
                        $categories = get_terms(array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => false,
                            'parent' => 0,
                            'number' => 5,
                        ));
                        
                        if (!empty($categories) && !is_wp_error($categories)) {
                            foreach ($categories as $category) {
                                echo '<li><a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else : ?>
                    <h4>Informações</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('sobre-nos'))); ?>">Sobre Nós</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('politica-de-privacidade'))); ?>">Política de Privacidade</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('termos-e-condicoes'))); ?>">Termos e Condições</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('politica-de-trocas'))); ?>">Política de Trocas</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('faq'))); ?>">FAQ</a></li>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="footer-column footer-contact">
                <h4>Contato</h4>
                <p><i class="fas fa-map-marker-alt"></i> Rua das Flores, 123 - São Paulo</p>
                <p><i class="fas fa-phone"></i> (11) 99999-9999</p>
                <p><i class="fas fa-envelope"></i> contato@pitadadeamor.com.br</p>
                <p><i class="fas fa-clock"></i> Seg - Sex: 9h às 18h</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos os direitos reservados.</p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

6. Arquivo index.php

Este é o arquivo principal do tema:

<?php
/**
 * The main template file
 *
 * @package Pitada_de_Amor
 */

get_header();
?>

<div class="main-content">
    <?php
    if (is_home() && !is_front_page()) {
        // Blog page
        ?>
        <header class="page-header">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </header>
        <?php
    }
    
    if (have_posts()) :
        ?>
        <div class="posts-grid">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;
            ?>
        </div>
        
        <?php
        the_posts_pagination(array(
            'prev_text' => '<i class="fas fa-chevron-left"></i>',
            'next_text' => '<i class="fas fa-chevron-right"></i>',
        ));
    else :
        get_template_part('template-parts/content', 'none');
    endif;
    ?>
</div>

<?php
get_footer();

7. Arquivo woocommerce.php

Este arquivo gerencia a integração com o WooCommerce:

<?php
/**
 * The template for displaying WooCommerce pages
 *
 * @package Pitada_de_Amor
 */

get_header();
?>

<div class="main-content woocommerce-content">
    <?php woocommerce_content(); ?>
</div>

<?php
get_footer();

8. Arquivo inc/woocommerce-functions.php

Este arquivo contém funções específicas para o WooCommerce:

<?php
/**
 * WooCommerce specific functions
 *
 * @package Pitada_de_Amor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * WooCommerce setup function.
 */
function pitada_woocommerce_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'pitada_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 */
function pitada_woocommerce_scripts() {
    wp_enqueue_style('pitada-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), PITADA_THEME_VERSION);
}
add_action('wp_enqueue_scripts', 'pitada_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 */
function pitada_woocommerce_active_body_class($classes) {
    $classes[] = 'woocommerce-active';
    return $classes;
}
add_filter('body_class', 'pitada_woocommerce_active_body_class');

/**
 * Products per page.
 */
function pitada_woocommerce_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'pitada_woocommerce_products_per_page');

/**
 * Product gallery thumbnail columns.
 */
function pitada_woocommerce_thumbnail_columns() {
    return 4;
}
add_filter('woocommerce_product_thumbnails_columns', 'pitada_woocommerce_thumbnail_columns');

/**
 * Default loop columns on product archives.
 */
function pitada_woocommerce_loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'pitada_woocommerce_loop_columns');

/**
 * Related Products Args.
 */
function pitada_woocommerce_related_products_args($args) {
    $defaults = array(
        'posts_per_page' => 3,
        'columns'        => 3,
    );

    $args = wp_parse_args($defaults, $args);

    return $args;
}
add_filter('woocommerce_output_related_products_args', 'pitada_woocommerce_related_products_args');

/**
 * Custom Walker for WooCommerce Product Categories
 */
class Pitada_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = array()) {



