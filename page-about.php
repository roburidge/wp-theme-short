<?php
/*
Template Name: About Page
*/
?>

<?php
global $post;
$intro = wpautop(get_post_meta( $post->ID, '_short_about_intro_text', true ));
$image1 = esc_url(get_post_meta( $post->ID, '_short_about_left_hero_image', true ));
$image2 = esc_url(get_post_meta( $post->ID, '_short_about_right_hero_image', true ));
?>

<?php get_header(); ?>

<div id="content">

  <div id="inner-content" class="wrap clearfix">

    <div id="main" class="clearfix" role="main">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix box'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

          <header class="article-header">

            <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

            <?php echo $intro; ?>

          </header> <!-- end article header -->

          <div class="clearfix">
            <div class="sixcol first">
              <img src="<?php echo $image1; ?>" alt="" class="responsive-image featured-image">
            </div>
            <div class="sixcol">
              <img src="<?php echo $image2; ?>" alt="" class="responsive-image featured-image">
            </div>
          </div>

          <div class="clearfix features">


            <div class="threecol first">
              <img src="<?php bloginfo('template_url'); ?>/library/images/ico-computer.png" alt="">
              <h2>Software Engineering</h2>
              <p>lipsum</p>
            </div>
            <div class="threecol">
              <img src="<?php bloginfo('template_url'); ?>/library/images/ico-man.png" alt="">
              <h2>Project Management</h2>
              <p>We have expertise, focus & passion for delivering long term complex projects through to a succesfull completion.</p>
            </div>
            <div class="threecol">
              <img src="<?php bloginfo('template_url'); ?>/library/images/ico-doc.png" alt="">
              <h2>Professional Support</h2>
              <p>We offer excellence in technical, design and marketing strategies to deliver complete software package solutions.</p>
            </div>
            <div class="threecol">
              <img src="<?php bloginfo('template_url'); ?>/library/images/ico-connections.png" alt="">
              <h2>System Architecture</h2>
              <p>Our team build high level system architecture and integration for leading edge solutions.</p>
            </div>

          </div>

          <section class="entry-content clearfix" itemprop="articleBody">
            <h2 class="line-title">
              <span>What we are all about</span>
            </h2>
            <div class="two-textcols">
              <?php the_content(); ?>
            </div>
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
          Off The Peg - Our Pre Built Solutions
        </div>
      </a>
      <a href="<? bloginfo('url') ?>/bespoke" class="box bespoke cta fourcol cta-button">
        <div class="cta-text">
          Bespoke - We Cater to Your Needs
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
