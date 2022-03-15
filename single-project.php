<?php get_header(); ?>


<main class="content section">
        <div class="content__inner section__inner">
            
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
             <article class="single single--project">
                <h1 class="single__title"> <?php the_title(); ?> </h1>
                <div class="single__year"><?php the_field('project_year'); ?></div>

            
                <?php 

                if (has_post_thumbnail()) {

             
                $args = ['class' => 'single__featured' ];

                the_post_thumbnail('full', $args); 
                 }
                ?>  
                
            
                <div class="single__content">

                    <?php the_content(); ?>

                </div>
            </article>

            <?php endwhile; endif; ?>
        </div>
    </main>



<?php get_footer(); ?>