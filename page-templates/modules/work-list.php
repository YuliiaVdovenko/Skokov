<?php
get_header();
$container   = get_theme_mod( 'understrap_container_type' );?>

<section class="<?php echo esc_attr( $container ); ?> pt-5 pb-5">
    <?php if( get_sub_field('work_list_title') ): ?>
        <h3 class="section-title pt-5 pb-3"> <?= get_sub_field('work_list_title') ?></h3>
        <p class="section-subtitle pb-5"><?= get_sub_field('work_list_subtitle') ?></p>
    <?php endif; ?>
    <?php if (have_rows('list')) : ?>
        <ul class="d-flex flex-wrap justify-content-between work-list">
            <?php while (have_rows ('list')) : the_row ();?>
                <li class="col-12 col-sm-6 col-md-4 col-lg-3 work-list-item">
                    <div class="before-hover">
                        <div class="back-color">
                            <?php the_sub_field('icon1') ?>
                            <h4 class="work-title"> <?php the_sub_field('title-image1') ?> </h4>
                        </div>
                        <p class="list-title"> <?php the_sub_field('subtitle-image1') ?></p>
                        <div class="hover">
                            <img src="<?php the_sub_field('image-hover1') ?>" alt="work">
                            <h4> <?php the_sub_field('title-image-hover1') ?></h4>
                            <p> <?php the_sub_field('subtitle-image-hover1') ?></p>
                        </div>
                    </div>
                </li>
                <li class="col-12 col-sm-6 col-md-4 col-lg-3 work-list-item">
                    <div class="before-hover">
                        <div class="back-color">
                            <?php the_sub_field('icon2') ?>
                            <h4 class="work-title"> <?php the_sub_field('title-image2') ?> </h4>
                        </div>
                        <p class="list-title"> <?php the_sub_field('subtitle-image2') ?></p>
                        <div class="hover">
                            <img src="<?php the_sub_field('image-hover2') ?>" alt="work">
                            <h4> <?php the_sub_field('title-image-hover2') ?></h4>
                            <p> <?php the_sub_field('subtitle-image-hover2') ?></p>
                        </div>
                    </div>
                </li>
                <li class="col-12 col-sm-6 col-md-4 col-lg-3 work-list-item">
                    <div class="before-hover">
                        <div class="back-color">
                            <?php the_sub_field('icon3') ?>
                            <h4 class="work-title"> <?php the_sub_field('title-image3') ?> </h4>
                        </div>
                        <p class="list-title"> <?php the_sub_field('subtitle-image3') ?></p>
                        <div class="hover">
                            <img src="<?php the_sub_field('image-hover3') ?>" alt="work">
                            <h4> <?php the_sub_field('title-image-hover3') ?></h4>
                            <p> <?php the_sub_field('subtitle-image-hover3') ?></p>
                        </div>
                    </div>
                </li>
                <li class="col-12 col-sm-6 col-md-4 col-lg-3 work-list-item">
                    <div class="before-hover">
                        <div class="back-color">
                            <?php the_sub_field('icon4') ?>
                            <h4 class="work-title"> <?php the_sub_field('title-image4') ?> </h4>
                        </div>
                        <p class="list-title"> <?php the_sub_field('subtitle-image4') ?></p>
                        <div class="hover">
                            <img src="<?php the_sub_field('image-hover4') ?> " alt="work">
                            <h4> <?php the_sub_field('title-image-hover4') ?></h4>
                            <p> <?php the_sub_field('subtitle-image-hover4') ?></p>
                        </div>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</section>