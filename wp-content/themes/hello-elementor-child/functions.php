<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );
/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

    wp_enqueue_script('glorious-common-script', get_stylesheet_directory_uri() . '/assets/js/theme.js', array(
        'jquery'
    ));
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );

function enqueue_custom_style() {
    if ( ! is_admin() ) { // Only enqueue on the front end, not in the admin panel
       wp_enqueue_style('glorious-bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
		wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_style' );


function example_body_open () { ?>


<!-- <div class="CTA_btn">
    <a href="javascript:void(0)" class="freeBtnPopup"><img src="<?php echo site_url(); ?>/wp-content/themes/hello-elementor-child/assets/images/requestacall.png" alt=""></a>
</div> -->

<div class="preloader">
    <div class="preloader_inner">
        <img class="logo" width="200" src="<?php echo site_url(); ?>/wp-content/themes/hello-elementor-child/assets/images/logo.png"
            alt="<?php bloginfo( 'name' ); ?>">
        <div class="loadingLogo">

            <img src="<?php echo site_url(); ?>/wp-content/themes/hello-elementor-child/assets/images/loading.gif"
                alt="Loading" width="50px">
            <!-- https://loading.io/ -->
        </div>
    </div>

</div>
<script>
jQuery('.preloader').delay(800).fadeOut(800);
</script>
<style>
    .preloader {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background: #fff;
        z-index: 999999;
    }
    .preloader_inner {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }

    .loadingLogo {
        padding: 20px 0 0 0;
    }
</style>
<?php }
add_action( 'wp_body_open', 'example_body_open' );
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

	function twenty_twenty_one_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog Right', 'twentytwentyone' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
        register_sidebar(
			array(
				'name'          => esc_html__( 'Right Panel', 'twentytwentyone' ),
				'id'            => 'right-panel',
				'description'   => esc_html__( 'Add widgets here to appear in top right side panel.', 'twentytwentyone' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
	add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

function breadcrumbs_shortcode($atts) {
    if (!is_front_page()) {
        ob_start();
        ?>
<div class="breadcrumbs">
        <ul class="breadcrumb">
            <li><a href="<?php echo esc_url(home_url()); ?>"><?php echo __('Home', 'text-domain'); ?></a>  </li>
            <?php
                    if (is_category() || is_single()) {
                        echo '<li>';
                        the_category(', ');
                        echo '</li>';
                        if (is_single()) {
                            echo '<li>';
                            the_title();
                            echo '</li>';
                        }
                    } elseif (is_page()) {
                        echo '<li>';
                        echo the_title();
                        echo '</li>';
                    }
                    ?>
        </ul>
</div>
<?php
        return ob_get_clean();
    }
}
add_shortcode('breadcrumbs', 'breadcrumbs_shortcode');

// WordPress custom function
function my_custom_function(){
    ?>
<script>
window.onscroll = function() {
    myFunction()
};
// Get the header
var header = document.getElementById("sticky-head");
// Get the offset position of the navbar
var sticky = header.offsetTop;
// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset > 500) {

        header.classList.add("hfe-sticky");
    } else {
        setTimeout(function() {
            header.classList.remove("hfe-sticky");
        }, 100);
    }
}

jQuery(document).ready(function() {
    jQuery(".freeBtnPopup").click(function() {
        jQuery("#freeAnalysis").modal('show');
    });
});

</script>

<script>
// JavaScript code to handle the cookie banner and set cookie on user's consent
document.addEventListener("DOMContentLoaded", function() {
    var cookieBanner = document.getElementById("cookie-banner");
    var acceptCookiesBtn = document.getElementById("accept-cookies");

    // Check if the user has already accepted the cookies
    if (!getCookie("cookies_accepted")) {
        cookieBanner.style.display = "block";
    }

    // Function to set the cookie when the user accepts
    acceptCookiesBtn.addEventListener("click", function() {
        setCookie("cookies_accepted", "true", 365); // Cookie will be valid for 365 days
        cookieBanner.style.display = "none";
    });

    // Function to set a cookie
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Function to get the value of a cookie
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
});

 // JavaScript code to toggle "Read More" and "Read Less" using event listeners
 var content = document.getElementById("readmoreContent");
    var btnRead = document.querySelector(".btnRead");
    if (content && btnRead) {

    btnRead.addEventListener("click", function() {
      if (content.classList.contains("hidden")) {
        content.classList.remove("hidden");
        btnRead.textContent = "Read Less";
      } else {
        content.classList.add("hidden");
        btnRead.textContent = "Read More";
      }
    });

}
    var content_area = document.getElementById("readmoreContentArea");
    var btnRead_area = document.querySelector(".btnRead_area");
    if (content_area && btnRead_area) {

    btnRead_area.addEventListener("click", function() {
      if (content_area.classList.contains("hidden")) {
        content_area.classList.remove("hidden");
        btnRead_area.textContent = "Click here to close the areas we cover";
     
      } else {
        content_area.classList.add("hidden");
        btnRead_area.textContent = "Click here to see the areas we cover";
     
      }
    });

}

</script>



<!-- Cookie policy banner -->
<div id="cookie-banner" style="display: none;">
    This website uses cookies to ensure you get the best experience on our website. Read our <a
        href="<?php echo site_url(); ?>/privacy-policy">privacy policy</a>.
    <button id="accept-cookies">Accept</button>
</div>
<div class="modal fade" id="freeAnalysis" tabindex="-1" role="dialog" aria-labelledby="freeAnalysisTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Package And Price </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo do_shortcode('[metform form_id="827"]'); ?>
            </div>

        </div>
    </div>
</div>

<?php
}

add_action('wp_footer', 'my_custom_function');

add_filter('xmlrpc_enabled', '__return_false');

// [gl_blog ][/gl_blog]
function gl_blog_func($atts)
{
    $attr = shortcode_atts(array(
        'number_of_blog' => 3,
        'blog_img' => "yes",
        'image_size' => "thumbnail",
        'blog_date' => "yes",
        'blog_dec' =>  "yes",
        'cate_id' =>  "",
        'blog_readmore_btn' =>  "yes",
    ), $atts);
	$cate_id = $attr["cate_id"]; 
	
	if(empty($cate_id)){
	
		$args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $attr["number_of_blog"]);	
	}
	else {
		$args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $attr["number_of_blog"] , 'cat' => $attr["cate_id"]);

	}

    
    $loop = new WP_Query($args);
    $output = "";
    if (!empty($loop->posts)) {
        $output .= '<div class="grid-3">';
        foreach ($loop->posts as $key => $post) {
            $month = date("F", strtotime($post->post_date));
            $pdate = date("j", strtotime($post->post_date));
            $pYear = date("Y", strtotime($post->post_date));
            
            $thumbnail_id  = get_post_thumbnail_id($post->ID);
            $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $attr["image_size"]);
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
            $output .= ' </div><div class="blog-content ">
                        <div class="blog-date ">
                            <span>' . $pdate . '  ' .   $month .  ' ' .   $pYear .  ' </span>
                        </div>
                        <div class="blog-info">
                            <h4> ' . $post->post_title . ' </h4>
                            <p>' . $post->post_excerpt . '</p>
                            <a class="btn btn-sm btn-theme effect read-more" href="' . get_permalink($post->ID) . '">Read More</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>';
        }
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('gl_blog', 'gl_blog_func');

function enqueue_admin_styles() {
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri() . '/admin-styles.css');
}
add_action('admin_enqueue_scripts', 'enqueue_admin_styles');


function custom_archive_title($title) {
    if ( is_category() ) {
        $title = single_cat_title('', false);
    } elseif ( is_tag() ) {
        $title = single_tag_title('', false);
    } elseif ( is_author() ) {
        $title = get_the_author();
    } elseif ( is_year() ) {
        $title = get_the_date(_x('Y', 'yearly archives date format'));
    } elseif ( is_month() ) {
        $title = get_the_date(_x('F Y', 'monthly archives date format'));
    } elseif ( is_day() ) {
        $title = get_the_date(_x('F j, Y', 'daily archives date format'));
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title('', false);
    }

    // Customize the blog archive title here
    if ( is_home() || is_front_page() ) {
        $title = 'Blog';
    }

    return $title;
}

add_filter('get_the_archive_title', 'custom_archive_title');

// recent blog with thumlist for post single page

function gl_recent_post_func($atts)
{
    $attr = shortcode_atts(array(
        'number_of_blog' => 3,
        'blog_img' => "yes",
        'image_size' => "thumbnail",
        'blog_date' => "yes",
        'blog_dec' =>  "yes",
        'cate_id' =>  "",
        'blog_readmore_btn' =>  "yes",
    ), $atts);
	$cate_id = $attr["cate_id"]; 
	
	if(empty($cate_id)){
	
		$args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $attr["number_of_blog"]);	
	}
	else {
		$args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $attr["number_of_blog"] , 'cat' => $attr["cate_id"]);

	}
    
    $loop = new WP_Query($args);
    $output = "";
    if (!empty($loop->posts)) {
        $output .= '<div class="b-outer grid-1">';
        foreach ($loop->posts as $key => $post) {
            $month = date("F", strtotime($post->post_date));
            $pdate = date("j", strtotime($post->post_date));
            $pYear = date("Y", strtotime($post->post_date));
            $thumbnail_id  = get_post_thumbnail_id($post->ID);
            $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $attr["image_size"]);
            $tags = get_the_tags($post->ID);
            $output .= '<div class="blog-recent-items">';
            $output .='<a class="fulllink" href="' . get_permalink($post->ID) . '"></a> 
                            <div class="b-left">
                                <div class="b-thumb">';
            if (has_post_thumbnail($post->ID)) {
                
                $output .= '<img src="' . $thumbnail['0'] . '" alt="' . $thumbnail_alt . '" />';
              
            } else {
                $output .=  '<img src="' . get_bloginfo('stylesheet_directory')
                    . '/assets/images/no_img_1.png" alt="" />';
                 
            }
            $output .= ' </div>';
            $output .= '</div>';
              $output .= '<div class="b-right"> 
                                <div class="b-date ">
                                    <span>' . $pdate . '  ' .   $month .  ' ' .   $pYear .  ' </span>
                                </div> <h4 class="b-title"> ' . $post->post_title . ' </h4>';

               $output .= ' </div> ';
              
               $output .= '   </div>';
                

        }
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('gl_blog_recent', 'gl_recent_post_func');

// End recent blog with thumlist for post single page




function service_slider_func($atts)
{

	$attr = shortcode_atts(array(
        'slider_type' => "post",
        'post_type' => "services",
        'post_slider_type' => "both",
        'image_size' => "full",
        'no_of_item_desktop' => 3,
        'no_of_item_tablet' => 2,
        'no_of_item_mobile' => 1,
        'pagination_arrow' => "no",
        'pagination_dot' => "no",
        'loop' => "yes",
        'images' => "",
        'slider_speed' => "10000",
        'cate_id' => "3",
        'slider_autoplay' => "false",

    ), $atts);
	$attr["pagination_arrow"] = ($attr["pagination_arrow"] == "yes") ? "true" : "false";
    $attr["pagination_dot"]   = ($attr["pagination_dot"] == "yes") ? "true" : "false";
    $attr["loop"]             = ($attr["loop"] == "yes") ? "true" : "false";
    $slider_id                = uniqid();
    $output                   = "";
	global $wp_query;
    
	$args = array(
		'post_type' => $attr["post_type"],
		'post_status' => 'publish',
		'posts_per_page' => 3
	);

    // $taxonomy = 'feedback_category'; // Replace with your actual taxonomy name
    // $args = array(
    //     'post_type' => 'customer-feedback',
    //     'posts_per_page' => -1, // Set the number of posts you want to retrieve, -1 for all
    //     'tax_query' => array(
    //         array(
    //             'taxonomy' => $taxonomy,
    //             'field' => 'id', // You can use 'id', 'slug', or 'name'
    //             'terms' => $attr["cate_id"], // Replace with the category ID, slug, or name you want to retrieve
    //         ),
    //     ),
    // );
    

	$loop = new WP_Query($args);

	if (!empty($loop->posts)) {
		$output .= '<div class="owl-carousel ' . $attr["post_type"] . ' owl-theme" id="_gl_slider_' . $slider_id . '">';
		foreach ($loop->posts as $key => $post) {
            $thumbnail_id  = get_post_thumbnail_id($post->ID);
            $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            $content = get_the_excerpt($post->ID);
            $output .= '<div class="item">';
                    
                        $output .= '<div class="item_img">';
                                if (has_post_thumbnail($post->ID)) {
                                    $output .='<a href="services">';
                                    $output .= '<img src="' . $thumbnail['0'] . '" alt="' . $thumbnail_alt . '" />';
                                    $output .='</a>';
                                } else {
                                    $output .='<a href="services">';
                                    $output .=  '<img src="' . get_bloginfo('stylesheet_directory')
                                        . '/assets/images/no_img_1.png" alt="" />';
                                        $output .='</a>';
                                }
                        $output .= '</div>';
                        $output .= '<div class="content_outer">';
                        $output .= '<div class="service_slider"> '. get_the_title($post->ID).' </div>';
                        $output .= '<div class="service_content"><p> '.$content.' </p></div>';

			    $output .= ' </div>';
                $output .= ' </div>';
		}
		$output .= '</div>';

	}

	wp_enqueue_script('glorious-slider-script', get_stylesheet_directory_uri() . '/assets/owl-carousel/js/owl.carousel.min.js', array(
        'jquery'
    ));
    wp_enqueue_style('glorious-slider-style', get_stylesheet_directory_uri() . '/assets/owl-carousel/css/owl.carousel.min.css');
    wp_add_inline_script("glorious-slider-script", "
        var owl = jQuery('#_gl_slider_" . $slider_id . "');
        owl.owlCarousel({
            stagePadding: 0,
            margin: 22,
            nav: " . $attr["pagination_arrow"] . ",
            dots: " . $attr["pagination_dot"] . ",
            loop: " . $attr["loop"] . ",
            autoplay:" . $attr["slider_autoplay"] . ",
            autoplayTimeout:" . $attr["slider_speed"] . ",
            responsive: {
                0: {
                    items: " . $attr["no_of_item_mobile"] . "
                },
                600: {
                    items: " . $attr["no_of_item_tablet"] . "
                },
                1000: {
                    items: " . $attr["no_of_item_desktop"] . "
                }
            }
        })
 
        var prevBtn2 = jQuery('.prev-btn2');
        var nextBtn2 = jQuery('.next-btn2');
        var mySlider2 = jQuery('#_gl_slider_" . $slider_id . "'); // Replace 'mySlider2' with your actual slider ID
        
        // Manually control the slider navigation
        prevBtn2.click(function() {
          mySlider2.trigger('prev.owl.carousel');
        });
        
        nextBtn2.click(function() {
          mySlider2.trigger('next.owl.carousel');
        });
        
        // Update button states based on current slide index
        mySlider2.on('changed.owl.carousel', function(event) {
          var currentSlide = event.relatedTarget.current();
          var totalSlides = event.relatedTarget.maximum();
        
          prevBtn2.prop('disabled', currentSlide === 0);
          nextBtn2.prop('disabled', currentSlide === totalSlides - 0);
        
          // Disable next button on the last slide
          if (currentSlide === totalSlides - 0) {
            nextBtn2.addClass('disabled');
          } else {
            nextBtn2.removeClass('disabled');
          }
        
          // Destroy Owl Carousel on mobile devices
          if (jQuery(window).width() < 768) {
            mySlider2.owlCarousel('destroy');
          }
        });

       
    ");
    return $output;


}


add_shortcode('gl_service_slider', 'service_slider_func');


function service_codex_custom()
{
    $labels = array(
        'name' => 'Services',
        'singular_name' => 'Services',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Services',
        'edit_item' => 'Edit Services',
        'new_item' => 'New Services',
        'all_items' => 'All Services',
        'view_item' => 'View Services',
        'search_items' => 'Search Services',
        'not_found' => 'No Services',
        'not_found_in_trash' => 'No Services in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Services'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 23,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title','thumbnail','excerpt', 'editor' )
    );
    register_post_type('services', $args);
}
add_action('init', 'service_codex_custom');
