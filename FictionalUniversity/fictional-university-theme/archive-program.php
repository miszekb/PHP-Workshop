<?php 
  get_header();
  pageBanner(array(
    'title' => 'All Programs',
    'subtitle' => 'There is something for everyone!'
  ));
?>
    <div class="container container--narrow page-section">
       <?php
        while(have_posts()) {
            the_post();
        ?>
            <div class="event-summary">
                  <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  </div>
            </div>
        <?php
        }
       echo paginate_links();
       ?>
    </div>
  
<?php
    get_footer(); 
?>
