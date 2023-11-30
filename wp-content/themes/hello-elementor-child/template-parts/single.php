<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if (!defined("ABSPATH")) {
    exit(); // Exit if accessed directly.
}
while (have_posts()):
    the_post(); ?>

    
<div id="content-1">
    <?php if (is_single()) { ?>
    <div class="innerHeader">
        <div class="container1">
            <?php if (apply_filters("hello_elementor_page_title", true)): ?>
            <header class="post_single-header">
                <?php the_title('<h1 class="entry-title">', "</h1>"); ?>
                <?php if (function_exists("yoast_breadcrumb")) {
                    echo yoast_breadcrumb('<p id="breadcrumbs">', "</p>");
                } ?>
            </header>
            <?php endif; ?>
        </div>
    </div>

    <div class="post_single container1">
        <div class="post_left">
            <main id="content" <?php post_class("site-main"); ?>>
                <?php
                $post_id = get_the_ID(); // Get the current post ID
                if (has_post_thumbnail($post_id)) {
                    $thumbnail = get_the_post_thumbnail($post_id, "full"); // 'thumbnail' is the size of the thumbnail image
                    // Display the thumbnail
                    echo $thumbnail;
                }
                ?>
                <?php
                $month = date("F", strtotime($post->post_date));
                $pdate = date("j", strtotime($post->post_date));
                $pYear = date("Y", strtotime($post->post_date));
                ?>
                <div class="post_date_outer">
                    <div class="published_by"> <img
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/user.png" alt="">
                        <?php printf(
                            __("by %s", "glorious"),
                            esc_html(get_the_author())
                        ); ?></div>
                    <div class="post_date"> <img
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/time.png" alt="">
                        <?php echo $pdate; ?> <?php echo $month; ?> <?php echo $pYear; ?> </div>
                    <div class="post_tag"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tag-green.png" alt="">
                                <?php
                                $categories = get_the_category();
                                if ($categories) {
                                    foreach ($categories as $category) {
                                        echo '<a href="' .
                                            esc_url(
                                                get_category_link(
                                                    $category->term_id
                                                )
                                            ) .
                                            '">' .
                                            esc_html($category->name) .
                                            "</a>, ";
                                    }
                                }
                                ?>
                    </div>
                </div>
                <div class="page-content">
                    <?php the_content(); ?>
                    <div class="post-tags"> 
                        <?php
                        $post_id = get_the_ID(); // Get the current post ID, or you can replace this with the specific post ID you're interested in.
                        $tags = get_the_tags($post_id);
                        if ($tags) {
                            echo "Tag:";
                            foreach ($tags as $tag) {
                                echo $tag->name . ", "; // Output each tag name
                            }
                        }
                        ?>
                    </div>
                    <?php wp_link_pages(); ?>
                </div>
            </main>
        </div>
        <div class="post_right">
            <div class="post_right_inner">
            <?php dynamic_sidebar("sidebar-1"); ?>
            
            </div>

        </div>
    </div>


    <?php } ?>

    <?php if (!is_single()) { ?>
    <main id="content_inner" <?php post_class("site-main"); ?>>
        <?php if (apply_filters("hello_elementor_page_title", true)): ?>
        <header class="page-header">
            <?php the_title('<h1 class="entry-title">', "</h1>"); ?>
        </header>
        <?php endif; ?>
        <div class="page-content">
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
        </div>

        <?php
        //comments_template();
        ?>
    </main>


    <?php } ?>
</div>
<?php
endwhile;
