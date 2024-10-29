<?php get_header(); ?>
    
    <main class="l-main">
        <?php
        if( have_posts() ) :
            while( have_posts() ) :
                the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="p-single">
            <div class="p-mainvisual p-single__mainvisual">
                <div class="p-mainvisual__mask"></div>
                <img class="p-mainvisual__img inview" src="<?php the_post_thumbnail_url(); ?>">
                <h1 class="p-mainvisual__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            </div> 

            <?php the_content(); ?>

            <!-- ページ分割 -->
            <?php $args = array ( //出力のフォーマットを設定
                'before' => '<div class="page-split">', //ラッパー用の開始タグ
                'after' => '</div>', //ラッパーのとじタグ
                'link_before' => '<span>', //リンクの前に表示するタグ
                'link_after' => '</span>', //リンクの後ろに表示するタグ
                );
                wp_link_pages( $args ); //ページ分割された投稿についてページリンクを表示します。
            ?>
            
            <!-- <div class="author">
                <h3 class="author__ttl">投稿者</h3>
                <div class="author__wrap">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
                    <div class="author__info">
                        <div class="author__name"><?php the_author_posts_link(); ?></div>
                        <p class="author__comment"><?php echo get_the_author_meta( 'description' ) ?></p>
                    </div>
                </div>
            </div> -->

            <?php comments_template(); ?>

           <p class="tag">タグ：<?php the_tags('');?></p> 

            <?php 
            $prevpost = get_adjacent_post(true,'',true);
            $nextpost = get_adjacent_post(true,'',false);
            if( $prevpost or $nextpost){
                ?>
                <ul class="p-pagination__single u-margin__center">
                    <?php
                    if($prevpost){
                        echo '<a href="'.get_permalink($prevpost->ID).'"><li class="p-pagination__prev"><div class="p-pagination__img">'.get_the_post_thumbnail($prevpost->ID,'thumbnail').'</div>'.get_the_title($prevpost->ID).'</li></a>';
                    }
                    // else{
                    //     echo'<div><a href="'.network_site_url('/').'">TOPへ戻る</a></div>';
                    // }

                    if($nextpost){
                        echo '<a href="'.get_permalink($nextpost->ID).'"><li class="p-pagination__next"><div class="p-pagination__img">'.get_the_post_thumbnail($nextpost->ID,'thumbnail').'</div>'.get_the_title($nextpost->ID).'</li></a>';
                    }
                    // else{
                    //     echo'<div><a href="'.network_site_url('/').'">TOPへ戻る</a></div>';
                    // }
                    ?>
                </ul>
           <?php }?>
       
            
        </div>
            <?php endwhile;
        else :
            ?><p>表示する記事がありません</p><?php
        endif; ?>
        </section>

    </main>
    
<?php get_sidebar(); ?>

<?php get_footer(); ?>