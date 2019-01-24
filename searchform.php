<form role="search" method="get" class="Search" action="<?php echo home_url('/');?>">
  <input type="search" id="s" placeholder="<?php echo esc_attr_x('Búsqueda','qtl');?>" value="<?php echo get_search_query();?>" name="s" title="<?php echo esc_attr_x('Búsqueda','qtl');?>">
  <label for="s"></label>
  <button type="submit" class="icon-search"></button>
</form>
