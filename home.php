<?php get_header(); ?>
    
    <main class="l-main">
        <div class="p-mainvisual p-mainvisual--single">
            <img class="p-mainvisual__img inview" src="<?php echo get_theme_file_uri('./images/title/arcive-mask.jpg') ?>" alt="">
            <dl class="p-mainvisual__title">
                <dt><h1 class="p-mainvisual__title--single">Menu:</h1></dt>
                <dd><p class="search-result"><?php single_cat_title(); ?></p></dd>
            </dl>
        </div>

        <section class="p-archive">
            <div class="p-archive__intro">
                <h2 class="p-archive__intro--title">小見出しが入ります</h2>
                <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
            </div>

         <?php 
            if(have_posts()):
              while(have_posts()):
                the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div  class="c-card p-archive__card">
                    <div class="c-card__img p-archive__card--img inview">
                        <img src="<?php the_post_thumbnail(); ?>">
                    </div>
                    <div class="p-archive__card--contents">
                        <div class="p-archive__card--info">
                            <h3><?php echo wp_trim_words(get_the_title(), 15, '_'); ?></h3>
                            <p><?php the_content(); ?></p>
                            <!-- <p> <?php echo wp_trim_words( get_the_content(), 120, '_' ); ?></p> -->
                        </div>
                        <p class="p-archive__card--detail c-btn__underline"><a href="<?php the_permalink(); ?>">詳しく見る</a></p>
                    </div>
                </div>
            </div>

            <?php endwhile;
                else :
                    ?><p>表示する記事がありません</p><?php
                endif;
            ?>
        
        <?php get_template_part('pagination');?>
            
        </section>
        
        
    </main>
    
    <?php get_sidebar(); ?>

    <?php get_footer(); ?>