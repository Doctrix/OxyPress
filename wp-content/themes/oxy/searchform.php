<form class="form-inline my-2 my-lg-0" action="<?= esc_url(home_url('/')) ?>">
	<input class="form-control mr-sm-2" name='s' type="search" placeholder="Recherche" aria-label="Recherche" value="<?php get_search_query() ?>">
	<button class="btn btn-outline my-2 my-sm-0" type="submit">Recherche</button>
</form>