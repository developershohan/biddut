<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package biddut
 */
$categories = get_the_terms($post->ID, 'category');
$biddut_blog_cat = get_theme_mod('biddut_blog_cat', false);
$biddut_singleblog_social = get_theme_mod('biddut_singleblog_social', false);

$social_shear_col = $biddut_singleblog_social ? "col-xl-6 col-lg-6 col-md-6" : "col-xl-12 col-md-12 col-lg-12";

if (is_single()): ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item tp-postbox-item-wrapper mb-80 format-image'); ?>>
        <?php if (has_post_thumbnail()): ?>
            <div class="tp-postbox-item-thumb p-relative mb-25">
                <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>

            </div>
        <?php endif; ?>
        <!-- blog meta -->
        <?php get_template_part('template-parts/blog/blog-meta'); ?>

        <h3 class="tp-postbox-title2"><?php the_title(); ?></h3>
        <?php the_content(); ?>
        <?php
        wp_link_pages([
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'biddut'),
            'after' => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after' => '</span>',
        ]);
        ?>
        <?php if (has_tag()): ?>
            <div class="tp-postbox-share-wrapper">
                <div class="row">
                    <div class="<?php echo esc_attr($social_shear_col); ?>">
                        <?php echo biddut_get_tag(); ?>
                    </div>
                    <?php biddut_blog_social_share() ?>
                </div>
            </div>
        <?php endif; ?>
    </article>

<?php else: ?>


    <div id="post-<?php the_ID(); ?>"  <?php post_class('col-xl-4 col-lg-4 col-md-6 mb-30  wow tpfadeUp'); ?>  data-wow-duration=".9s" data-wow-delay=".3s">
        <div class="tp-blog-3-item">

            <?php if (has_post_thumbnail()): ?>
                <div class="tp-blog-3-thumb p-relative">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                    </a>
                    <div class="tp-blog-3-icon">
                        <a href="blog-details.html"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="tp-blog-3-content text-center z-index">

                <h4 class="tp-blog-3-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            </div>
        </div>
    </div>

<?php endif; ?>