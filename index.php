<?php get_header(); ?>

    <!-- HERO -->

    <section id="home" class="hero section">
        <div class="hero__inner section__inner">
            <span class="hero__title">Hello!</span>

            <div class="hero__text">
                I'm not a real life  <span class="accent" >flamingo</span> <br>
                I am a developer
            </div>


        </div>
    </section>

    <!-- PORTFOLIO -->

    <section id="work"  class="portfolio section">
        <div class="portfolio__inner section__inner">
            
            <div class="portfolio__header">
                <h2 class="portfolio__heading"> A collection of my work</h2>
                <p class="portfolio__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores accusamus aut eligendi consequuntur beatae, quibusdam molestiae tempore eum.</p>
                <a href="" class="portfolio__link link">View all work <img src="<?php echo get_template_directory_uri(); 
                ?>/images/images/icon_arrow.svg" alt="">  </a>
            </div>
            <div class="gallery">

                <div class="gallery__item">
                    <img src="<?php echo get_template_directory_uri(); 
                    ?>/images/images/gallery.jpeg" class="gallery__img" alt="">
                </div>
                <div class="gallery__item">
                    <img src="<?php echo get_template_directory_uri(); 
                    ?>/images/images/gallery2.jpeg" class="gallery__img" alt="">
                </div>
                <div class="gallery__item gallery__item--tall">
                    <img src="<?php echo get_template_directory_uri(); 
                    ?>/images/images/gallery3.jpeg" class="gallery__img" alt="">
                </div>
                <div class="gallery__item gallery__item--big">
                    <img src="<?php echo get_template_directory_uri(); 
                    ?>/images/images/gallery4.jpeg" class="gallery__img" alt="">
                </div>
                <div class="gallery__item">
                    <img src="<?php echo get_template_directory_uri(); 
                    ?>/images/images/gallery5.jpeg" class="gallery__img" alt="">
                </div>


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

   <?php get_footer();?>