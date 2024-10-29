<?php get_header(); ?>
    
    <main class="l-main">
        <div class="p-mainvisual">
            <img class="p-mainvisual__img inview" src="<?php the_post_thumbnail_url(); ?>">
            <h1 class="p-mainvisual__title"><?php the_title(); ?></h1>
        </div> 
        
        <?php
            if( have_posts() ) :
                while( have_posts() ) :
                    the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <section class="p-single">
        <?php the_content(); ?>

        </div>
                <?php endwhile;
            else :
                ?><p>表示する記事がありません</p><?php
            endif;
        ?>
            
        </section>

        <!-- <?php wp_link_pages( $args ); ?> -->
    </main>
    
    <?php get_sidebar(); ?>

<?php get_footer(); ?>