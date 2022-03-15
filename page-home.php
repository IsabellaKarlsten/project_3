<?php 
//Template name: Landingssida
get_header(); 
?>


    <!-- HERO -->

    <section id="home" class="hero section">
        <div class="hero__inner section__inner">
            <span class="hero__title"><?php the_field('big_headline') ?></span>

            <div class="hero__text">
                I'm not a real life  <span class="accent" >flamingo</span> <br>
                I am a developer
            </div>


        </div>
    </section>

    <!-- PORTFOLIO -->

    <section id="work"  class="portfolio section">
        <div class="portfolio__inner section__inner">

        <?php 
        
        $portfolio = get_field('portfolio');
        
        ?>
            
            <div class="portfolio__header">
                <h2 class="portfolio__title">  <?php echo $portfolio['portfolio_title']; ?></h2>
                <p class="portfolio__text"><?php echo $portfolio['portfolio_content']; ?></p>
            <a href=" <?php echo $portfolio['portfolio_link_target']; ?> " class="portfolio__link link"><?php echo $portfolio['portfolio_link_text']; ?> <img src="<?php echo get_template_directory_uri(); 
                ?>/images/images/icon_arrow.svg" alt="">  </a>
            </div>


            <div class="gallery">

            <?php 
            
            $gallery = get_field('gallery');
            $image1 = $gallery['image_1'];
            $image2 = $gallery['image_2'];
            $image3 = $gallery['image_3'];
            $image4 = $gallery['image_4'];
            $image5 = $gallery['image_5'];
            

            ?>

            <?php if ($image1) :  ?>

                <div class="gallery__item">
                    <img src="<?php echo $image1;?> "class= "gallery__img" alt="">
                </div>
                <?php endif; ?>
            <?php if ($image2) :  ?>

                <div class="gallery__item ">
                    <img src="<?php echo $image2;?> "class= "gallery__img " alt="">
                </div>
                <?php endif; ?>
            <?php if ($image3) :  ?>

                <div class="gallery__item  gallery__item--tall">
                    <img src="<?php echo $image3;?> "class= "gallery__img  " alt="">
                </div>
                <?php endif; ?>
            <?php if ($image4) :  ?>

                <div class="gallery__item  gallery__item--big">
                    <img src="<?php echo $image4;?> "class= "gallery__img" alt="">
                </div>
                <?php endif; ?>
            <?php if ($image5) :  ?>

                <div class="gallery__item">
                    <img src="<?php echo $image5;?> "class= "gallery__img" alt="">
                </div>
                <?php endif; ?>

           


            </div>

           

        </div>
    </section>

    <!-- PROJECTS -->

    <section id="projects" class="projects section">
        <div class="projects__inner section__inner">

            <div class="projects__header">
                <h2 class="projects__title">Projects.</h2>
                <a href="" class="projects__link link">Work with me? <img src="<?php echo get_template_directory_uri(); 
                ?>/images/images/icon_arrow.svg" alt=""> </a>
            </div>

            <div class="projects__content">

                <?php 

                /** 
                 * Custom loop for projects
                 * @link https://developer.wordpress.org/reference/classes/wp_query/
                 */

                 //Arguments to send to the WP_Query class
                 $args = [
                     'post_type' => 'project'
                 ];

                 //The new WP_Query with out arguments
                 $query = new WP_Query($args);
                
                 //The custom loop querying the new information
                if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
                ?>

                <!-- project 1 -->
                <article class="project">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="project__featured">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="project__meta"> <?php the_field('project_year'); ?></div>
                    <h3 class="project__title"> <?php the_title(); ?></h3>
                    <div class="project__excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?> " class="project__link">Explore project</a>
                </article>

                

                <?php  endwhile; wp_reset_postdata(); endif; ?>

            </div>

        </div>
    </section>

   <?php get_footer(); ?>