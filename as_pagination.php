<?php
/**
 *  This function displays a Wordpress pagination using Bootstrap 4 as frontend.
 *  - Put the function as_pagination(){...} in your functions.php theme file;
 *  - Call the function as_pagination(); in the category.php or search.php where do you wanto to see the pagination buttons.
 * 
 * @param string $range: Total of the buttons to show on pagination
 * @return void
 */

function acs_pagnation($range = 10){  
    global $paged;
    global $wp_query; 

    $pages = $wp_query->max_num_pages;
    $showitems = ($range * 2) + 1;  

    if(empty($paged)) $paged = 1;
    if(!$pages) $pages = 1;      
    
    if(1 != $pages){
        echo '<nav aria-label="Page navigation" role="navigation">',
             '<span class="sr-only">Navegação</span>',
             '<ul class="pagination justify-content-center ft-wpbs">',      
             '<li class="page-item disabled hidden-md-down d-none d-lg-block">',
             '<span class="page-link">Page '.$paged.' of '.$pages.'</span></li>';
    
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo; First</a></li>';
    
        if($paged > 1 && $showitems < $pages) 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo; Previous</a></li>';
    
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
        }
        
        if ($paged < $pages && $showitems < $pages) 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page">Next &rsaquo;</a></li>';  

        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page">Last &raquo;</a></li>';
        echo '</ul></nav>';
    }
}