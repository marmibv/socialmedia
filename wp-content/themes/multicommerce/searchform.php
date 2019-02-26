<?php
/**
 * Custom Searchform
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
?>
<div class="search-block">
    <form action="<?php echo esc_url( home_url() );?>" class="searchform" id="searchform" method="get" role="search">
        <div>
            <label for="menu-search" class="screen-reader-text"></label>
            <?php
                global $multicommerce_customizer_all_values;
                $placeholder_text = '';
                if ( isset( $multicommerce_customizer_all_values['multicommerce-search-placeholder']) ):
                    $placeholder_text = esc_attr( $multicommerce_customizer_all_values['multicommerce-search-placeholder']);
                endif; 
            ?>
            <input type="text" placeholder="<?php echo esc_attr($placeholder_text); ?>" id="menu-search" name="s" value="<?php echo get_search_query();?>">
            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
        </div>
    </form>
</div>