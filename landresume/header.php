<!doctype html>
<html>
	<head>
		<meta charset="utf-8"></meta>
		<?php wp_head(); ?>
	</head>

	<body>
		<div class="wrapper">
			<nav id="menuHome" class="navbar navbar-toggleable-md navbar-light px-4 pt-0 pb-4">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-brand logo mt-4">
					<a href="">
						<span class="jose text-uppercase"><?php echo esc_attr( get_option( 'first_name' ) ); ?></span>
						<span class="molina text-uppercase"><?php echo esc_attr( get_option( 'last_name' ) ); ?></span>
					</a>
				</div>
				<div class="collapse navbar-collapse justify-content-end" id="navbarHeader">
					<?php wp_nav_menu(['theme_location' => 'primary', 'menu_class' => 'navbar-nav', 'container' => false]); ?>
				</div>
			</nav>