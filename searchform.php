<form role="search" method="get" class="search-form <?php echo esc_attr($args['form_class'] ?? ''); ?>"
    action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" class="form-control me-2"
        placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'code95-task'); ?>"
        value="<?php echo get_search_query(); ?>" name="s"
        aria-label="<?php echo esc_attr_x('Search', 'label', 'code95-task'); ?>">
    <button type="submit" class="customBtn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
            viewBox="0 0 16 16">
            <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
        </svg>
    </button>

</form>