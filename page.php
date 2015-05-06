<?php get_header(); ?>

<div id="content">

  <div id="inner-content" class="wrap clearfix">

    <div id="main" class="clearfix" role="main">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="box bespoke cta heading-cta">
        <div class="boxout">
          <?php
          global $post;
          $text = get_post_meta( $post->ID, '_cmb_intro_text', true );
          echo $text;
          ?>
        </div>
      </div>
    
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix box'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      
        <header class="article-header">
        
          <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
      
        </header> <!-- end article header -->
    
        <section class="entry-content clearfix" itemprop="articleBody">
          <?php the_content(); ?>
        </section> <!-- end article section -->
      
        <footer class="article-footer">
    <?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?>
        
        </footer> <!-- end article footer -->
    
      </article> <!-- end article -->
    
      <?php endwhile; else : ?>
    
        <article id="post-not-found" class="hentry clearfix">
          <header class="article-header">
            <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
          </header>
          <section class="entry-content">
            <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
          </section>
          <footer class="article-footer">
            <p><?php _e("This is the error message in the page.php template.", "bonestheme"); ?></p>
          </footer>
        </article>
    
      <?php endif; ?>

      <a href="<? bloginfo('url') ?>/off-the-peg" class="box off-the-peg cta fourcol first cta-button">
        <div class="cta-text">
          Off The Peg - We Cater to Your Needs
        </div>
      </a>
      <a href="<? bloginfo('url') ?>/about" class="box about-us cta fourcol cta-button">
        <div class="cta-text">
          Find Out More About Us
        </div>
      </a>
      <a href="<? bloginfo('url') ?>/contact" class="box contact-us cta fourcol cta-button">
        <div class="cta-text">
          Speak To Us
        </div>
      </a>

    </div> <!-- end #main -->
    
  </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>