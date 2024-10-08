<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package biddut
 */
?>
<!-- <div class="tp-blog-meta pb-10">

    <span><i class="flaticon-price-tag"></i>Repair</span>
</div> -->
<?php
$categories = get_the_terms($post->ID, 'category');
$biddut_blog_author = get_theme_mod('biddut_blog_author', true);
$biddut_blog_cat = get_theme_mod('biddut_blog_cat', false);

?>
<div class="tp-blog-meta pb-10">
    <?php if (!empty($biddut_blog_author)): ?>
        <span>
            <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                <i class="fa-light fa-circle-user"></i>
                <?php print get_the_author(); ?>
            </a>
        </span>
    <?php endif; ?>

    <?php if (!empty($biddut_blog_cat)): ?>
        <?php if (!empty($categories[0]->name)): ?>
            <span> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"> <i
                        class="fa-regular fa-folder-open"></i>
                    <?php echo esc_html($categories[0]->name); ?>
                </a>
            </span>
        <?php endif; ?>
    <?php endif; ?>

</div>