<form role="search" method="get" id="searchform" class="navbar-form navbar-right search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Tìm kiếm..." value="<?php echo get_search_query(); ?>" name="s" id="s" />
		<button type="submit"><span class="glyphicon glyphicon-search"></span></button>
		<!-- <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" /> -->
	</div>
</form>
