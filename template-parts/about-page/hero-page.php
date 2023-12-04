
<?php
    $alpha_feature_img = get_the_post_thumbnail_url(null, "large");
?>

<div class="header page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline"><?php bloginfo('description') ?></h3>
                <a href="<?php echo site_url()?>"><h1 class="align-self-center display-1 text-center heading"><?php bloginfo('name') ?></h1></a> 
            </div>
            
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-12">
                <div class="navigation">
                    <?php wp_nav_menu(
                        array(
                                "theme_location" => "topmenu",
                                "menu_id" => "topmenucontainer",
                                "menu_class" => "list-inline, text-center",
                            )
                    );
                    ?>
                </div>
            </div>
    </div>
</div>
 