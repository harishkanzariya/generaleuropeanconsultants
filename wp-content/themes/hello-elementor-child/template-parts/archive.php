<?php
/**
 * The template for displaying archive pages.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<main id="content" class="site-main-1">
<div class="innerHeader">
	<div class="container1">
	<header class="post_single-header">
	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
			<?php
			the_archive_title( '<h1 class="entry-title">', '</h1>' );
			the_archive_description( '<p class="archive-description">', '</p>' );
			?>
		
	<?php endif; ?>



		</header>
	</div>
</div>


	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
		
	<?php endif; ?>
	<div class="page-content-1">

	<div class="blog_list_page container1">
	<div class="post_full">

	
	<div class="grid-3">
				<?php
				while ( have_posts() ) {
				the_post();
				$post_link = get_permalink();
				$output = "";

				 $month = date("F", strtotime($post->post_date));
            $pdate = date("j", strtotime($post->post_date));
            $pYear = date("Y", strtotime($post->post_date));
            $thumbnail_id  = get_post_thumbnail_id($post->ID);
            $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
            $tags = get_the_tags($post->ID);
            $output .= '
                    <div class="item-box">
                        <div class="blog-items">
                            <div class="b-item">
                                <div class="thumb">';
            if (has_post_thumbnail($post->ID)) {
                $output .='<a href="' . get_permalink($post->ID) . '">';
                $output .= '<img src="' . $thumbnail['0'] . '" alt="' . $thumbnail_alt . '" />';
                $output .='</a>';
            } else {
                $output .='<a href="' . get_permalink($post->ID) . '">';
                $output .=  '<img src="' . get_bloginfo('stylesheet_directory')
                    . '/assets/images/no_img_1.png" alt="" />';
                    $output .='</a>';
            }
            $output .= ' </div>';
              $output .= '<div class="blog_date_outer"> 
                                <div class="blog-date ">
                                    <span>' . $pdate . '  ' .   $month .  ' ' .   $pYear .  ' </span>
                                </div>';

                                    // Display tags
                        if (!empty($tags)) {
                            $output .= '<div class="project_tags">';
                            $tag_names = array_map(
                                function ($tag) {
                                    return $tag->name;
                                },
                                $tags
                            );
                            $output .= '' . implode(', ', $tag_names);
                            $output .= '</div>';
                        }

                        $output .= '</div>';
                       $output .= ' <div class="blog-info">
                            <h4> ' . $post->post_title . ' </h4>';
                            if($post->post_excerpt)
                            {
                                $output .= '  <p>' . $post->post_excerpt . '</p>';
                            }
                            
                            $output .= '
                            <a class="btn btn-sm btn-theme effect read-more" href="' . get_permalink($post->ID) . '">Read More</a>
                        </div>
                    </div>
                </div>
            </div>';
        

				echo  $output;

			?>
			<!-- <article class="post">
				< ?php
				printf( '<h2 class="%s"><a href="%s">%s</a></h2>', 'entry-title', esc_url( $post_link ), wp_kses_post( get_the_title() ) );
				if ( has_post_thumbnail() ) {
					printf( '<a href="%s">%s</a>', esc_url( $post_link ), get_the_post_thumbnail( $post, 'large' ) );
				}
				the_excerpt();
				?>
			</article> -->
		<?php } ?>
	</div>
	<?php echo wp_pagenavi(); ?>
	</div>
	<!-- <div class="post_right">
		<div class="post_right_inner">
			<?php dynamic_sidebar('sidebar-1') ?>
			
		</div>
	</div> -->
</div>



	</div>
	<!-- < ?php wp_link_pages(); ?> -->

	<?php
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) :
		?>
		<!-- <nav class="pagination">
			<div class="nav-previous">< ?php next_posts_link( sprintf( __( '%s older', 'hello-elementor' ), '<span class="meta-nav">&larr;</span>' ) ); ?></div>
			<div class="nav-next">< ?php previous_posts_link( sprintf( __( 'newer %s', 'hello-elementor' ), '<span class="meta-nav">&rarr;</span>' ) ); ?></div>
		</nav> -->
	<?php endif; ?>
</main>
