<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div id="content">

  <div id="inner-content" class="wrap clearfix">

    <div id="main" class="clearfix" role="main">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix box'); ?> role="article">
      
        <header class="article-header">
        
          <h1 class="page-title"><?php the_title(); ?></h1>
      
        </header> <!-- end article header -->
    
        <section class="entry-content">
          <?php the_content(); ?>
        </section> <!-- end article section -->
      
        <footer class="article-footer">
          <p class="clearfix"><?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>
        
        </footer> <!-- end article footer -->
    
      </article> <!-- end article -->
    
      <?php endwhile; ?>  
    
      <?php else : ?>
    
        <article id="post-not-found" class="hentry clearfix">
          <header class="article-header">
            <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
          </header>
          <section class="entry-content">
            <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
          </section>
          <footer class="article-footer">
            <p><?php _e("This is the error message in the page-custom.php template.", "bonestheme"); ?></p>
          </footer>
        </article>
    
      <?php endif; ?>

    </div> <!-- end #main -->
    
    <div class="clearfix">
      <a href="<?php bloginfo('url'); ?>/bespoke/">
      <div class="sixcol first box bespoke cta big-cta">
        <div class="boxout">
          <h2 class="h1">Bespoke Software</h2>
          <p>Precise, scaleable, innovative.</p>
          <p>Tailored for your needs.</p>
        </div>
      </div>
      </a>
      <a href="<?php bloginfo('url'); ?>/off-the-peg/">
        <div class="sixcol box off-the-peg cta big-cta">
          <div class="boxout">
            <h2 class="h1">Off The Peg</h2>
            <p>Simple, effective, cost efficient.</p>
            <p>Software that just works.</p>
          </div>
        </div>
      </a>
    </div>

    <div class="clearfix box features">
      <div class="threecol first">
        <img src="<?php bloginfo('template_url'); ?>/library/images/ico-computer.png" alt="">
        <h2>Lorem</h2> 
        <p>Nullam a leo ac lectus consectetur pulvinar. Pellentesque porta volutpat maximus.</p>
      </div>
      <div class="threecol">
        <img src="<?php bloginfo('template_url'); ?>/library/images/ico-man.png" alt="">
        <h2>Ipsum</h2> 
        <p>Nullam a leo ac lectus consectetur pulvinar. Pellentesque porta volutpat maximus. </p>
      </div>
      <div class="threecol">
        <img src="<?php bloginfo('template_url'); ?>/library/images/ico-doc.png" alt="">
        <h2>Dolor</h2> 
        <p>Nullam a leo ac lectus consectetur pulvinar. Pellentesque porta volutpat maximus. </p>
      </div>
      <div class="threecol">
        <img src="<?php bloginfo('template_url'); ?>/library/images/ico-connections.png" alt="">
        <h2>Amet</h2> 
        <p>Nullam a leo ac lectus consectetur pulvinar. Pellentesque porta volutpat maximus. </p>
      </div>
    </div>
    
  </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>