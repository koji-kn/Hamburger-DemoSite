<form class="p-search-form" id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input class="p-search-form__input" placeholder="" name="s" id="s" value="<?php the_search_query();?>">
    <input class="p-search-form__submit c-btn" id="searchsubmit" type="submit" value="検索">
</form>