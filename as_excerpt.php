<?php
/**
 *  This function returns a Wordpress post excerpt.
 *  - Put the function as_excerpt(){...} in your functions.php theme file;
 *  - Call the function as_excerpt(); in the category.php, search.php or where you wanto to show the text.
 * 
 * @param integer $words: Total of words to show in output text.
 * @return void
 */

function as_excerpt($words = 40){
    global $post;
    $strAllowedTags = '<i>,<em>,<b>,<strong>,<ul>,<ol>,<li>,<span>';
    $strText = explode( ' ', preg_replace('/\[.*\]/', '', strip_tags($post->post_content, $strAllowedTags) ) );
    $intTot = count($strText);
    
    for($i = 0; $i < $words; $i++){
        $strOutput .= $strText[$i] . ' '; 
    }

    $strOutput = convert_smilies($strOutput);

    echo '<p>',
    force_balance_tags($strOutput),
    $i < $intTot ? '...<p>' : '<p>',
    '<a href="' . get_permalink() . '" title="'.get_the_title().'">Continue lendo</a></p>';
}