<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package code95_task
 */

get_header();
?>

<main id="primary" class="site-main container">

    <section id="main">
        <div class="row">
            <?php
            $main_posts = new WP_Query(array(
                'meta_key' => '_code95_task_main_post',
                'meta_value' => '1',
                'post_type' => 'post',
                'posts_per_page' => 4, // Change as needed
            ));
            if ($main_posts->have_posts()):
                while ($main_posts->have_posts()):
                    $main_posts->the_post();
                    echo '<div class="col-md-4 mb-4">';
                    get_template_part('template-parts/content', 'page');
                    echo '</div>';
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>

    <section id="egypt-news">
        <hr class="hr border border-black border-5">
        <h2>Egy News</h2>
        <div class="swiper egypt-swiper">
            <div class="swiper-wrapper">
                <?php
                $egypt_news = new WP_Query(array(
                    'category_name' => 'egypt',
                    'post_type' => 'post',
                    'posts_per_page' => 12,
                ));
                if ($egypt_news->have_posts()):
                    while ($egypt_news->have_posts()):
                        $egypt_news->the_post();
                        echo '<div class="swiper-slide">';
                        get_template_part('template-parts/content', 'news');
                        echo '</div>';
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <hr class="hr border border-black border-5" />
                <h2>Features</h2>
                <div class="row">
                    <?php
                    $feature_posts = new WP_Query(array(
                        'meta_key' => '_code95_feature_post',
                        'meta_value' => '1',
                        'post_type' => 'post',
                        'posts_per_page' => 2, // Change as needed
                    ));
                    if ($feature_posts->have_posts()):
                        while ($feature_posts->have_posts()):
                            $feature_posts->the_post();
                            echo '<div class="col-md-6 mb-4">';
                            get_template_part('template-parts/content', 'page');
                            echo '</div>';
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <hr class="hr border border-black border-5" />
                <h2>Top 5 Stories</h2>
                <div class="top-stories">
                    <?php
                    $top_stories = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'meta_key' => 'post_views_count',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                    ));
                    if ($top_stories->have_posts()):
                        $index = 1;
                        while ($top_stories->have_posts()):
                            $top_stories->the_post();
                            echo '<div class="top-story">';
                            echo '<span class=" badge bg-danger story-index">' . $index . '</span> ';
                            echo '<a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a>';
                            echo '<hr/>';
                            echo '</div>';
                            $index++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->

<?php
// get_sidebar();
// get_footer();
