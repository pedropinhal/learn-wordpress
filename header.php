<header>
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="page-header">
				  <h1><a href="#">easydevtuts</a> <small>web development tutorials</small></h1>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="navbar">	
	<div class="navbar-inner">

		<?php wp_nav_menu( array(
			'menu'            => 'main-nav', 
			'container_class' => 'container', 
			'menu_class'      => 'nav', 
		) ) ?>
    
  </div>
</div>