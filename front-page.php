<?php get_header(); ?>
    
    <main class="l-main">
        <div class="p-mainvisual">
            <img class="p-mainvisual__img inview" src="<?php the_post_thumbnail_url(); ?>">
            <h1 class="p-mainvisual__title"><?php the_title(); ?></h1>
        </div> 
        
        <?php the_content(); ?>

    </main>

   <!-- <?php dynamic_sidebar( 'category_widget' );?> -->
    
    <?php get_sidebar(); ?>
    

<?php get_footer(); ?>