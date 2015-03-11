<div class="entry-meta entry-header">
	<span class="published"><?php the_time( get_option('date_format') ); ?></span>
	<span class="meta-sep"> / </span>
	<span class="comment-count"><?php comments_popup_link(__('No Comments', INFINITE_LANGUAGE), __('1 Comment', INFINITE_LANGUAGE), __('% Comments', INFINITE_LANGUAGE)); ?></span>
    
    <?php edit_post_link( __('Edit', INFINITE_LANGUAGE), ' / <span class="edit-post">', '</span>' ); ?>
</div>