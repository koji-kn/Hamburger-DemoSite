<div class="p-comment">
    <?php if( have_comments() ): ?>
        <h2 id="comments" class="p-comment__ttl">Comment</h2>
        <ul class="p-comment__list">
            <?php wp_list_comments( 'avatar_size=60' ); ?>
        </ul>
    <?php endif; ?>

    <?php
        $args = array(
            'title_reply' => 'Leave a Reply',
            'label_submit' => ' POST COMMENT',
        );
        comment_form( $args );
    ?>

    <?php
        if(get_comment_pages_count() > 1){
            echo '<div>';
            paginate_comments_links();
            echo '</div>';
        }
    ?>
</div>

<!-- <div class="p-comment">
    <h2 class="p-comment__ttl">Comment</h2>
    <ol class="p-comment__list">
        <li class="comment parent">
            <div class="comment-body">
                <img class="avatar" src="<?php echo get_theme_file_uri('images/icon/avatar.png')?>" alt="author">
                <div class="p-comment__info">
                    <cite>ユーザー名</cite><span>より:</span>
                    <div class="comment-meta commentmetadata"><a href="#">Octber 11, 2017 at 11:45 pm</a></div>
                    <p>コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。</p>
                    <div class="reply"><a class="comment-reply-link" href="#">返信</a></div>
                </div>
            </div>

            <ul class="children">
                <li class="comment bypostauthor">
                    <div class="comment-body">
                        <img class="avatar" src="<?php echo get_theme_file_uri('images/icon/avatar.png')?>" alt="author">
                        <div class="p-comment__info">
                            <cite>ユーザー名</cite><span>より:</span>  
                            <div class="comment-meta commentmetadata"><a href="#">Octber 11, 2017 at 11:45 pm</a></div>
                            <p>コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。コメントが入ります。</p>
                            <div class="reply"><a class="comment-reply-link" href="#">返信</a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ol>
    <div class="comment-page-link"><a class="prev page-numbers" href="#">&laquo; 前へ</a></a><a class="page-numbers" href="#">1</a><a class="page-numbers" href="#">2</a><a class="page-numbers" href="#">3</a><span class="page-numbers current">4</span></div>
    </div> -->