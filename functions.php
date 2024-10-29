<?php
function custom_theme_support() {
    add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    ) );
    add_theme_support( "sensitive-embeds" );
    add_theme_support( 'automatic-feed-links');
    add_theme_support( 'custom-header');
    add_theme_support( 'custom-logo');
    add_theme_support( 'custom-background');
    add_theme_support( 'wp-block-styles');
    add_theme_support( 'align-wide');
    add_theme_support( 'custom-line-height');
    add_theme_support( 'custom-line-spacing');
    add_theme_support( 'border');
    add_theme_support( 'link-color');
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats' );
    add_theme_support( 'title-tag' );
    // add_theme_support( 'menus' );
    register_nav_menus( 
        array(
            'gloval-nav' => ( 'サイド表示メニュー' ),
            'footer-nav' => ( 'フッター表示メニュー' )   
            )    
        );
    }
    add_action( 'after_setup_theme', 'custom_theme_support' );
    
    function hamburger_script() {
        // $locale = get_locale();
    // $locale = apply_filters( 'theme_locale', $locale, 'wpbeg' );
    // wp_enqueue_style( 'font-awesome', get_theme_file_uri ( '/css/font-awesome.css' ), array(), '4.7.0' );
    // if( $locale == 'ja' ) {
        // wp_enqueue_style( 'route4osr-NotoSans', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap', array() );
    // }
    wp_enqueue_style( 'hamburger-Hind', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', array() );
    wp_enqueue_style( 'hamburger-NotoSans', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap', array() );
    wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.6.1/css/all.css', array(), '5.6.1' );
    wp_enqueue_style( 'hamburger-reset', get_theme_file_uri ( '/css/reset.css' ), array(), '5.0.2' );
    wp_enqueue_style( 'hamburger-hamburger', get_theme_file_uri ( '/css/style.css' ), array( 'hamburger-reset' ), '1.0.0' );
    wp_enqueue_style( 'hamburger-style', get_theme_file_uri ( '/style.css' ), array(), '1.0.0' );
    wp_enqueue_script( 'my-jquery', get_theme_file_uri ( '/js/jquery-3.7.1.min.js' ) , '', '3.7.1', true );
    wp_enqueue_script( 'inview', get_theme_file_uri ( '/js/jquery.inview.js' ), array( 'my-jquery' ), '1.0.0', true );
    wp_enqueue_script( 'fademove', get_theme_file_uri ( './js/jquery.fademover.js' ) , array('my-jquery'), '1.0.0', true );
    wp_enqueue_script( 'matchheight', get_theme_file_uri ( './js/jquery.matchHeight.js' ) , array('my-jquery'), '1.0.0', true );
    wp_enqueue_script( 'mainjs', get_theme_file_uri ( '/js/main.js' ), array( 'inview' ), '1.0.0', true );
    wp_enqueue_script( 'modaljs', get_theme_file_uri ( '/js/modal.js' ), array( 'mainjs' ), '1.0.0', true );
    wp_enqueue_script( 'buttonjs', get_theme_file_uri ( '/js/button.js' ), array( 'mainjs' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'hamburger_script' );

function hamburger_title( $title ) {
    if ( is_front_page() && is_home() ) { //トップページなら
        $title = get_bloginfo( 'name', 'display' );
    } elseif ( is_singular() ) { //シングルページなら
        $title = single_post_title( '', false );
    }
        return $title;
    }
    add_filter( 'pre_get_document_title', 'hamburger_title' );
    
    function hamburger_widgets_init() {
        register_sidebar (
        array(
            'name'          => 'カテゴリーウィジェット',
            'id'            => 'category_widget',
            'description'   => 'カテゴリー用ウィジェットです',
            'before_widget' => '<div id="%1$s" class="list widget %2$s"><ul>',
            'after_widget'  => '</ul></div>',
            'before_title'  => '<h2 class="l-side__title">',
            'after_title'   => "</h2>\n",
            )
        );
    }
    add_action( 'widgets_init', 'hamburger_widgets_init' );
    
    
    // 現在ページと最大ページのガイド
    function pager_number(){
    global $wp_query;
    $paged = get_query_var('paged');
    
    if (empty($paged)){
        $paged = 1;
    }
    
    $max_page = $wp_query->max_num_pages;
    
    if($max_page >1 ){
        echo 'page'."&ensp;".$paged."&nbsp;". '/'."&nbsp;". $max_page;
    }
}

// 投稿ページのみ検索
function my_post_search($search){
    if(is_search()){
        $search .= "AND post_type = 'post'";
    }
    return $search;
}
add_filter('posts_search','my_post_search');

// 何も記入せず検索すると、トップページに推移
function empty_search_redirect($wp_query){
    if ($wp_query->is_main_query() && $wp_query->is_search && ! $wp_query->is_admin){
        $s = $wp_query->get('s');
        $s = trim($s);
        if (empty($s)){
            wp_safe_redirect(home_url('/'));
            exit;
        }
    }
}
add_action('parse_query','empty_search_redirect');


//エディタースタイル
function hamburger_theme_add_editor_styles() {
    add_theme_support( "editor-style" );
    add_editor_style( get_template_directory_uri() . "./css/editor-style.css" );
}
add_action( 'admin_init', 'hamburger_theme_add_editor_styles' );

//register_block_style
// function custom_block_styles(){
//     register_block_style(
//         'core/button',
//         array(
//             'name'  => 'page-button',
//             'label' => 'ボタンスタイル',
//         )
//     );
// }
// add_action('init','custom_block_styles');

// function custom_block_pattern(){
//     register_block_pattern(
//         'my-button',
//         array(
//             'title'  => 'button-gray',
//             'content' => '<!-- wp:html -->
//             <button class="p-single__button c-btn" type="button" id="btn">ボタン</button>
//             <!-- /wp:html -->',
//             'categories' => array('button'),
//         )
//     );
// }
// add_action('init','custom_block_pattern');

// add_filter('use_default_gallery_style','__return_false');