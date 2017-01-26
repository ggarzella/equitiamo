<?php

function equitiamo_add_inclusions() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/jquery/jquery.min.js' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js' );
}
add_action( 'wp_enqueue_scripts', 'equitiamo_add_inclusions' );



function equitiamo_register_menu() {
    register_nav_menu('equitiamo-index', __( 'Equitiamo Index Menu' ));
    register_nav_menu('equitiamo-page', __( 'Equitiamo Page Menu' ));
}
add_action( 'after_setup_theme', 'equitiamo_register_menu' );



function equitiamo_tinymce_settings($tinymce_init_settings) {
    $tinymce_init_settings['forced_root_block'] = false;
    $tinymce_init_settings['wpautop'] = false;
    $tinymce_init_settings['force_br_newlines'] = true;
    $tinymce_init_settings['convert_newlines_to_brs'] = true;
    $tinymce_init_settings['remove_linebreaks'] = false;
    $tinymce_init_settings['remove_redundant_brs'] = false;
    return $tinymce_init_settings;
}
add_filter('tiny_mce_before_init', 'equitiamo_tinymce_settings');
remove_filter('the_content', 'wpautop');



function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');



function show_post($path) {
    $post = get_page_by_path($path);
    $content = $post->post_content;
    echo $content;
}



function show_title($path) {
    $post = get_page_by_path($path);
    $title = $post->post_title;
    $title = is_user_logged_in() ? '<a href="' . get_edit_post_link($post->ID) . '">' . $title . '</a>' : $title;
    echo $title;
}



function equitiamo_show_menu($themeName) {

    $home = is_home() ? '#home' : get_site_url() . '#home';

    wp_nav_menu(
        array(
            'theme_location' => $themeName,
            'container_class' => 'container',
            'container_id' => 'home',
            'menu_class' => 'nav navbar-nav',
            'items_wrap' => '<div class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="' . $home . '">
								    <!--<img src="' . get_template_directory_uri() . '/images/logCEN.png" class="logo img-responsive"/>-->
								    Equitiamo
								</a>
							</div>
							<div class="collapse navbar-collapse">
								<ul class="%2$s">%3$s</ul>
							</div>
						</div>'
        )
    );
}


function equitiamo_get_child_list_query($path) {
    $parent = get_page_by_path($path);
    $query = new WP_Query(array('post_type' => 'page', 'post_parent' => $parent->ID, 'orderby' => 'menu_order', 'order' => 'ASC'));
    return $query;
}



function equitiamo_modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">Leggi di più</a>';
}
add_filter( 'the_content_more_link', 'equitiamo_modify_read_more_link' );



function equitiamo_get_blog_post() {
    $paged = (get_query_var('paged')) ? absint (get_query_var('paged')) : 1;
    $query = new WP_Query(array('category_name' => 'blog', 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 5));
    return $query;
}



function equitiamo_excerpt_length() {
    return 200;
}
add_filter('excerpt_length', 'equitiamo_excerpt_length');



function equitiamo_excerpt_more() {
    return equitiamo_modify_read_more_link();
}
add_filter('excerpt_more', 'equitiamo_excerpt_more');



function equitiamo_post_queries( $query ) {
    if ( !is_admin() && $query->is_main_query() ){

        if( is_category('blog') ) {
            $query->set('posts_per_page', 5);
        }
    }
}
add_action('pre_get_posts', 'equitiamo_post_queries');



function equitiamo_get_bootstrap_paginate_links() {
    ob_start();
    global $wp_query;
    $current = max( 1, absint( get_query_var( 'paged' ) ) );
    $pagination = paginate_links( array(
        'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
        'format' => '?paged=%#%',
        'current' => $current,
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
    ) ); ?>
    <?php if ( ! empty( $pagination ) ) : ?>
        <ul class="pagination pagination-sm">
            <?php foreach ( $pagination as $key => $page_link ) : ?>
                <li class="paginated_link<?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>"><?php echo $page_link ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif;

    $links = ob_get_clean();
    return apply_filters('equitiamo_bootstap_paginate_links', $links);
}



function equitiamo_paginate_links() {
    echo equitiamo_get_bootstrap_paginate_links();
}


function equitiamo_image_class_filter($classes) {
    return 'img-responsive';
}
add_filter('get_image_tag_class', 'equitiamo_image_class_filter');


add_filter('image_size_names_choose', 'rudr_new_image_sizes');

function rudr_new_image_sizes($sizes) {
    $addsizes = array(
        "equitiamo-image-size-name" => 'Standard size'
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}

add_image_size( 'equitiamo-image-size-name', 600, 600, false );

/*
function add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_excerpts_to_pages' );
*/