<?php 
    /*
     Template Name: Blog
     */
 ?>


    <?php get_header(); ?>
    <!-- end of header -->

    <!-- main home content -->
    <div id="main-content" class="container">

        <div class="row">
            <div class="span8">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <div class="media">
                      <a class="pull-left" href="#">
                        <?php the_post_thumbnail('thumbnail'); ?>
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading"><?php the_title(); ?></h4>

                            <?php the_content(); ?>

                            <a href="<?php the_permalink(); ?>" class="btn btn-mini btn-info">read more</a>
                      </div>
                    </div>
                <!-- post -->
                <?php endwhile; ?>
                <!-- post navigation -->
                <?php else: ?>
                <!-- no posts found -->
                <?php endif; ?>
            </div>
            <div class="span4">
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>
    <!-- end of main home content -->

    <?php get_footer(); ?>