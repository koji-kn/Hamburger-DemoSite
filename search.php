<?php
    global $wp_query;
    $total_results = $wp_query->found_posts;
    $search_query = get_search_query();
?>

<?php get_header(); ?>
    
    <main class="l-main">
        <div class="p-mainvisual p-mainvisual--single">
            <img class="p-mainvisual__img inview" src="<?php echo get_theme_file_uri('./images/title/arcive-mask.jpg') ?>" alt="">
            <dl class="p-mainvisual__title">
                <dt><h1 class="p-mainvisual__title--single">Search:</h1></dt>
                <dd><p class="search-result"><?php echo get_search_query(); ?></p></dd>
            </dl>
        </div>

        <section class="p-archive">
            <?php if(have_posts()):?>

                <div class="p-archive__intro">
                    <h2 class="p-archive__intro--title"><?php echo get_search_query(); ?>の検索結果</h2>
                    <p><?php echo $total_results;?>件の記事があります。</p>
                </div>
            
            <?php 
               while(have_posts()):
                    the_post(); ?>

                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div  class="c-card p-archive__card">
                        <div class="c-card__img p-archive__card--img inview">
                            <img src="<?php the_post_thumbnail(); ?>">
                        </div>
                        <div class="p-archive__card--contents">
                            <div class="p-archive__card--info">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_content(); ?></p>
                                <!-- <p> <?php echo mb_substr( get_the_excerpt(), 0, 40 ); ?></p> -->
                            </div>
                            <p class="p-archive__card--detail c-btn__underline"><a href="<?php the_permalink(); ?>">詳しく見る</a></p>
                        </div>
                    </div>
                </div>

            <?php endwhile;
                else :
                    ?><p>表示する記事がありません</p>
                    <p style="text-align:center; margin-top:30px;"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a>へ戻る</p>
                    <?php
                endif;
            ?>

        <?php get_template_part('pagination');?>

        </section>
           
    </main>
    
    <?php get_sidebar(); ?>

    <?php get_footer(); ?>