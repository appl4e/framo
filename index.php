
        <?php
        get_header();

        while(have_posts()): the_post();
        $title = get_post_meta( get_the_ID(), '_cm_page_title', true);
        $x = get_post_meta( get_the_ID(), 'cover_img', true);
        if(!$x){
            $x = wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'cover_img_id', 1 ), 'full' );
        }
        $cta_btn = get_post_meta( get_the_ID(), '_cm_cover_button', true);
        $image1 = get_post_meta( get_the_ID(), 'img_1', true);
        if(!$image1){
            $image1 = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'img_1_id', 1), 'full' );
        }
        $image2 = get_post_meta( get_the_ID(), 'img_2',true);
        if(!$image2){
            $image2 = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'img_2_id', 1), 'full');
        }
        $image3 = get_post_meta( get_the_ID(), 'img_3',true);
        if(!$image3){
            $image3 = wp_get_attachment_image_src( get_post_meta( get_the_ID(),'img_3_id', 1), 'full');
        }
        $product_description = get_post_meta( get_the_ID(), '_cm_product_desc', true);
        $big_btn_text = get_post_meta( get_the_ID(), '_cm_big_button_text', true);
        $big_btn_link = get_post_meta( get_the_ID(), '_cm_big_button_link', true);
        ?>

        <!-- Cover Section Starts here -->
        <section class="cover" <?php echo "style='background: url(". esc_url($x).") no-repeat 0 0 /  cover;'";?>>
            <div class="container-fluid no-padding">
                <div class="search-bar col-sm-3 pull-right hidden-xs">
                    <form method="get" action="<?php esc_url(bloginfo('home'));?>">
                        <div class="input-group">
                            <input type="search" id="s" name="s" valur="<?php echo get_search_query(); ?>" class="form-control" placeholder="search...">
                            <span class="input-group-btn">
                                <button class="btn btn-custom">
                                    <i class="fa fa-angle-double-right"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <h1><?php
                    echo esc_html( $title );
                ?></h1>
                <a href="#" target="_blank" class="cta-btn text-uppercase btn btn-lg btn-custom"><?php echo esc_html($cta_btn); ?></a>
            </div>
        </section>
    <?php endwhile; ?>
        <!-- Cover Section Ends here -->
        <!-- Content Section Starts here -->
        <section class="content">
            <div class="container">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12 col-xs-8 no-padding content-image image-1">
                            <img src="<?php echo $image1; ?>" alt="Product-1" class="img-responsive">
                        </div>
                        <div class="col-xs-4 no-padding visible-xs">
                            <div class="content-image image-4">
                                <img src="<?php echo $image2; ?>" alt="Product-2" class="img-responsive">
                            </div>
                            <div class="content-image image-4">
                                <img src="<?php echo $image3; ?>" alt="Product-3" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="row hidden-xs">
                        <div class="col-xs-6 no-padding content-image image-2">
                            <img src="<?php echo $image2; ?>" alt="Product-2" class="img-responsive">
                        </div>
                        <div class="col-xs-6 no-padding content-image image-3">
                            <img src="<?php echo $image3; ?>" alt="Product-3" class="img-responsive">
                        </div>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="col-sm-12 no-padding">
                        <?php echo $product_description; ?>
                        <a href="<?php echo esc_url($big_btn_link); ?>" class="content-btn btn btn-custom btn-lg col-sm-12"><?php echo $big_btn_text; ?></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content Section Ends here -->
        <!-- Extra Fields Section Starts Here -->

        <section class="products">
            <div class="container">
                <div class="col-cus-5 url_path">
                   <?php
                    $item_1_api = get_post_meta( get_the_ID(), '_cm_item_1', true);

                    $item_1 = file_get_contents('https://www.framo.nl/FramoApi.php?id='. $item_1_api);
                    $obj_1 = json_decode($item_1);

                   ?>
                    <div class="item-details">
                        <img src="<?php echo $obj_1->picture_url; ?>" alt="Featured Product">
                        <div class="item-text">
                            <p class="name"><?php echo $obj_1->name; ?></p>
                            <p><?php echo $obj_1->sku; ?></p>
                            <ul class="list-unstyled list-inline">
                                <li><p id="default_price_tax">&euro;<?php echo $obj_1->default_price; ?></p></li>
                                <li><p id="special_price_tax">&euro;<?php echo $obj_1->special_price; ?></p>
                            </ul>
                            <ul class="list-unstyled list-inline">
                                <li><p id="default_price_tax">&euro;<?php echo $obj_1->default_price_tax; ?></p></li>
                                <li><p id="special_price_tax">&euro;<?php echo $obj_1->special_price_tax; ?></p>
                            </ul>
                            <span>&euro;<?php echo $obj_1->default_price; ?>(incl 21&incare; BTW)</span>
                        </div>
                    </div>
                    <a href="<?php echo $obj_1->url_path;?>" class="kopen-btn btn btn-custom btn-lg text-uppercase">Nu Kopen</a>
                </div>
                <div class="col-cus-5">
                    <div class="item-details">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-14.jpg" alt="Featured Product">
                        <div class="item-text">
                            <p>Vibrax Medex Senator</p>
                            <p>Professional 3d</p>
                            <p>massageapparaat</p>
                            <ul class="list-unstyled list-inline">
                                <li><p>&euro;283,37</p></li>
                                <li><p>&euro;190,04</p>
                            </ul>
                            <span>&euro;229,95(incl 21&incare; BTW)</span>
                        </div>
                    </div>
                    <a href="" class="kopen-btn btn btn-custom btn-lg text-uppercase">Nu Kopen</a>
                </div>
                <div class="col-cus-5">
                    <div class="item-details">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-14.jpg" alt="Featured Product">
                        <div class="item-text">
                            <p>Vibrax Medex Senator</p>
                            <p>Professional 3d</p>
                            <p>massageapparaat</p>
                            <ul class="list-unstyled list-inline">
                                <li><p>&euro;283,37</p></li>
                                <li><p>&euro;190,04</p>
                            </ul>
                            <span>&euro;229,95(incl 21&incare; BTW)</span>
                        </div>
                    </div>
                    <a href="" class="kopen-btn btn btn-custom btn-lg text-uppercase">Nu Kopen</a>
                </div>
                <div class="col-cus-5">
                    <div class="item-details">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-14.jpg" alt="Featured Product">
                        <div class="item-text">
                            <p>Vibrax Medex Senator</p>
                            <p>Professional 3d</p>
                            <p>massageapparaat</p>
                            <ul class="list-unstyled list-inline">
                                <li><p>&euro;283,37</p></li>
                                <li><p>&euro;190,04</p>
                            </ul>
                            <span>&euro;229,95(incl 21&incare; BTW)</span>
                        </div>

                    </div>
                    <a href="" class="kopen-btn btn btn-custom btn-lg text-uppercase">Nu Kopen</a>
                </div>
                <div class="col-cus-5">
                    <div class="item-details">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-14.jpg" alt="Featured Product">
                        <div class="item-text">
                            <p>Vibrax Medex Senator</p>
                            <p>Professional 3d</p>
                            <p>massageapparaat</p>
                            <ul class="list-unstyled list-inline">
                                <li><p>&euro;283,37</p></li>
                                <li><p>&euro;190,04</p></li>
                            </ul>
                            <span>&euro;229,95(incl 21&incare; BTW)</span>
                        </div>
                    </div>
                    <a href="" class="kopen-btn btn btn-custom btn-lg text-uppercase">Nu Kopen</a>
                </div>
            </div>
        </section>
        <!-- Extra Fields Section Ends Here -->

        <?php get_footer(); ?>
