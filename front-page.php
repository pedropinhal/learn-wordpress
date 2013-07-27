<?php 
    /*
     Template Name: Home
     */
 ?>


    <?php get_header(); ?>
    <!-- end of header -->

    <!-- main home content -->
    <div id="main-content" class="container">

        <div class="row">
            <div class="span12">
                <div class="hero-unit well">
                    <h1><?php the_field("big_page_title", 28) ?></h1>
                    <p>This template was developed for a HOME tutorial series about WordPress development. You can find the series on <a href="http://www.youtube.com/easydevtuts" target="_blank">YouTube</a></p>
                    <p><a href="http://www.easydevtuts.com" target="_blank" class="btn btn-inverse btn-large">Learn more »</a></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span4">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#tab-one" data-toggle="tab">Tutorials</a></li>
                    <li><a href="#tab-two" data-toggle="tab">Blog</a></li>
                    <li><a href="#tab-three" data-toggle="tab">Categories</a></li>
                </ul>
                <div id="home-tab-container" class="tab-content well">
                    <div class="tab-pane fade active in" id="tab-one">
                        <h3>List of Tutorials</h3>
                        <ol>
                            <li><a href="#">Tutorials Post</a></li>
                            <li><a href="#">Tutorials Post</a></li>
                            <li><a href="#">Tutorials Post</a></li>
                            <li><a href="#">Tutorials Post</a></li>
                            <li><a href="#">Tutorials Post</a></li>
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="tab-two">
                        <h3>List of Blog Postings</h3>
                        <ol>
                            <li><a href="#">Recent Post</a></li>
                            <li><a href="#">Recent Post</a></li>
                            <li><a href="#">Recent Post</a></li>
                            <li><a href="#">Recent Post</a></li>
                            <li><a href="#">Recent Post</a></li>
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="tab-three">
                        <h3>List of Categories</h3>
                        <ol>
                            <li><a href="#">Recent Post</a></li>
                            <li><a href="#">Recent Post</a></li>
                            <li><a href="#">Recent Post</a></li>
                            <li><a href="#">Recent Post</a></li>
                            <li><a href="#">Recent Post</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="span8">

                <div id="slider" class="carousel slide hidden-phone">
                    <div class="carousel-inner">

                        <?php $slides = new WP_Query('post_type=slide&posts_per_page=-1&offset=1'); 
                        
                        while ($slides->have_posts()) : $slides->the_post(); 
                            ?>

                        <div class="item <?php if ($slides->current_post == 0) { echo 'active'; } ?>">
                            <img src="<?php the_field("slide_image"); ?>" alt="<?php the_title(); ?>">
                            <div class="carousel-caption  hidden-phone">
                                <h4><?php the_title(); ?></h4>
                                <p><?php the_field("slide_caption"); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    <ol class="carousel-indicators">
                        
                        <?php for ($i=0; $i < $slides->post_count; $i++) { ?> 
                            <li data-target="#slider" data-slide-to="<? echo $i; ?>" class="<? if ($i == 0) { echo 'active';} ?>"></li>
                        <? } ?>
                       
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span12">
                <ul class="thumbnails">
                    <?php if ( have_posts() ) : 

                        query_posts( "category_name=Uncategorized&posts_per_page=3" );

                    while ( have_posts() ) : the_post(); ?>
                       <!-- post -->
                            <li class="span4">
                                <div class="thumbnail">
                                    <?php the_post_thumbnail(); ?>
                                    <div class="caption">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <?php the_excerpt(); ?>
                                        <p><a href="<?php the_permalink(); ?>" class="btn btn-mini">read more</a></p>
                                    </div>
                                </div>
                            </li>

                       <?php endwhile; ?>
                       <!-- post navigation -->
                       <?php else: ?>
                       <!-- no posts found -->
                       <?php endif; ?>   
                </ul>
            </div>
        </div>
    </div>
    <!-- end of main home content -->

    <?php get_footer(); ?>