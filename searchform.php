<!-- <form class="search_desktop"  role="search" method="get" action="<?php echo home_url('/'); ?>">
          <input type="search" placeholder="খুজুন..." aria-label="Search" value="<?php the_search_query(); ?>" name="s" id="s" />
</form> -->

<!-- For Mobile -->

<!-- <form class="searchbar"  role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
          <input class="search_input" type="search" placeholder="খুজুন..." aria-label="Search" value="<?php the_search_query(); ?>" name="s" id="s" />
          <button class="btn btn-outline-success my-2 my-sm-0 search_icon" type="submit"> <i class="fa fa-search"></i> </button>
</form> -->

<form class="form-container" role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
  <input type="search" placeholder="খুজুন..." aria-label="Search" value="<?php the_search_query(); ?>" name="s" id="s">
  <div class="search"></div>
</form>