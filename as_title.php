<?php
/**
 *  This function returns a Wordpress title tag.
 *  - Put the function as_title(){...} in your functions.php theme file;
 *  - Call the function as_title(); in the header.php inside <title></title> tag.
 * 
 * @param none
 * @return string
 */

function as_title(){
    if ( is_home() ){
        return get_bloginfo('name') . ' | ' . get_bloginfo('description');
    }elseif( is_page() || is_single() ){
        return get_the_title() . ' | ' . get_bloginfo('name');
    }elseif( is_category() ){
        return 'Category: ' . single_cat_title('',false) . ' | ' . get_bloginfo('name');
    }elseif( is_month() ){
        return 'Archive: ' . get_the_time('F') . ' de ' . get_the_time('Y') . ' | ' . get_bloginfo('name'); 
    }elseif( is_year() ) {
        return 'Archive: ' . get_the_time('Y') . ' | ' . get_bloginfo('name');
    }elseif( is_tag() || is_author() ) {
        return 'Archive: ' . single_cat_title('',false) . ' | ' . get_bloginfo('name');
    }elseif( is_search() ){
        global $s;
        return 'Search: ' . $s . ' | ' . get_bloginfo('name');
    }elseif( is_404() ){
        return '404 - Ops! Page not found. | ' . get_bloginfo('name');
    }
    return get_bloginfo('name') . ' | ' . get_bloginfo('description');
}