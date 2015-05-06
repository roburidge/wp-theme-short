<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>

<div id="content">

  <div id="inner-content" class="wrap clearfix">

    <div id="main" class="clearfix" role="main">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="clearfix box">
    
        <article id="post-<?php the_ID(); ?>" <?php post_class(' fourcol first'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        
          <header class="article-header">
          
            <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
        
          </header> <!-- end article header -->
      
          <section class="entry-content clearfix" itemprop="articleBody">
            <?php the_content(); ?>
          </section> <!-- end article section -->
      
        </article> <!-- end article -->

        <div class="fourcol address">
          <p>
            <?php
            $contactAddress = short_get_option( 'contact_address' );
            $contactPhone = short_get_option( 'contact_phone' );
            $contactEmail = short_get_option( 'contact_email' );
            echo $contactAddress;
            ?>
          </p>
          t: <?php echo $contactPhone; ?><br>
          <a href="mailto:<?php echo $contactEmail; ?>"><?php echo $contactEmail; ?></a>
        </div>
        <div class="fourcol">
          Content?
        </div>

      </div>

      <div id="map-canvas" class="map box" style="width:100%; height: 400px;"></div>
    
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

    </div> <!-- end #main -->
    
  </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php
// Grab the metadata from the database
$text = get_post_meta( get_the_ID(), '_short_contact_location', true );
$apiKey = get_post_meta( get_the_ID(), '_short_contact_api_key', true );
?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&?key=<?php echo $apiKey ?>&signed_in=false"></script>
<script>
function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $text["latitude"]; ?>,<?php echo $text["longitude"]; ?>);
  var mapOptions = {
    zoom: 16,
    center: myLatlng,
    scrollwheel: false
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php get_footer(); ?>
