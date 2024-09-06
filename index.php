<?php get_header();?>
<?php if (is_home()) { ?>
<h1 class="title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
<div class="intro"><?php bloginfo( 'description' ); ?></div>
<?php }; if (is_archive()) { ?>
<h1 class="title"><?php the_archive_title(); ?></h1>
<div class="intro">共有 <?php echo esc_html($wp_query->found_posts); ?> 篇文章</div>
<?php } ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post();?>
<article>
<?php $site_title_elem 	= is_front_page() || ( is_home() || is_archive() ) ? 'h2' : 'h1'; ?>
<<?php echo $site_title_elem; ?> class="title"><a href="<?php the_permalink(); ?>"><?php if ( is_sticky() && is_home() ) : ?>🔝 <?php endif; ?><?php the_title(); ?></a></<?php echo $site_title_elem; ?>>
<?php if ( !is_page() ) { ?><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_date( get_option( 'date_format' ) ); ?></time><?php } ?>
<div class="content"><?php the_content(); ?></div>
<?php if ( is_single() ) { ?>
<p><?php wp_link_pages(); ?></p>
<?php if ( get_the_tags() ) { ?><p class="tags"><?php the_tags( ' #', ' #', ' ' ); ?></p><?php } ?>
<?php } ?>
</article>
<?php endwhile; if ( is_single() ) { ?><p><?php if (comments_open()) {comments_template();}?></p><?php } ?>
<?php if (is_home() || is_archive()) { ?>
<?php if ( get_the_posts_pagination() ) : ?><nav>
<?php if ( get_previous_posts_link() ) : ?><?php previous_posts_link( '上一页' ); ?><?php endif; ?>
<?php if ( get_next_posts_link() ) : ?><?php next_posts_link( '下一页' ); ?><?php endif; ?></nav><?php endif; ?>
<?php } ?>
<?php endif; ?>
<?php get_footer();?>