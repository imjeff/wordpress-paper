<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
<?php if ( !is_home() ) { ?>
<a href="<?php echo esc_url(home_url('/')); ?>">← <?php bloginfo('name'); ?></a>
<?php if ( is_single() ) { ?> | <?php the_category( ', ' );?><?php } ?>
<?php } else { ?>
<nav>
<?php if ( has_nav_menu( 'primary-menu' ) ) :
$menuParameters = array('container'	=> false,'echo'	=> false,'menu_class' => 'menu','items_wrap' => '%3$s','depth'	=> 0,);
echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' ); 
endif;?>
</nav>
<?php } ?>
</header>
<main>