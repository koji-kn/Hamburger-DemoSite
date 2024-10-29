<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="ハンバーガーショップデモサイト">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
     <p id="page-top"><a class="arrow-up" href="#"></a></p> <!-- トップに戻るボタン -->
    <header class="l-header">
        <div class="p-hamburger js-hamburger"><span>Menu</span></div>
        <div class="l-header__logo">
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        </div>

        <?php get_search_form(); ?>

    </header>