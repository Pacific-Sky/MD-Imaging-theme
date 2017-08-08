<?php
/**
 * Footer file common to all
 * templates
 *
 */
global $mdi_department;
switch ($mdi_department) {
  case 'mdi':
    $ps_logo_url = 'https://pacificsky.co/logo?variant=light&tagline=yes';
    break;
  case 'vic':
    $ps_logo_url = 'https://pacificsky.co/logo?variant=medium&tagline=yes';
    break;
  case 'wic':
    $ps_logo_url = 'https://pacificsky.co/logo?variant=medium&tagline=yes';
    break;
  default:
  # code...
  break;
}
?>

<div id="badges">
  <div class="wrapper">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Breast_MRI_Pink.png" alt="" width="100">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Breast_Ultrasound_Pink.png" alt="" width="100">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/CT_Blue.png" alt="" width="100">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Mammo_Blue.png" alt="" width="100">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/MRI_Green.png" alt="" width="100">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/SBB_Red.png" alt="" width="100">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Ultrasound_Teal.png" alt="" width="100">
  </div>
</div>
<div id='map' style='width: 100%; height: 500px;'></div>
<footer class="site__footer">
  <div class="wrapper">
    <div id="location_exterior" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/<?php echo $mdi_department; ?>_exterior.jpg)"></div>
    <ul id="footer__widgets">
      <?php dynamic_sidebar('footer'); ?>
    </ul>
  </div>
</footer>
<footer id="colophon">
  <div class="wrapper">
    <span class="copyright">© Copyright 2006-<?php echo date('Y'); ?> MD Imaging serving Redding, Red Bluff, Anderson.<br />All Rights Reserved.</span>
    <span class="credit"><span>Website created by</span><a href="http://pacificsky.co" target="_blank"><img width="400" src="<?php echo $ps_logo_url; ?>" /></a></span>
  </div>
</footer>



<?php wp_footer(); ?>

<?php // </body> opens in header.php ?>
<script src='https://api.mapbox.com/mapbox-gl-js/v0.18.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.18.0/mapbox-gl.css' rel='stylesheet' />
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoidHlsZXJzaHVzdGVyIiwiYSI6IkVtQUNDR0kifQ.lmw4IoRwovnroo6vfHO9gQ';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/tylershuster/cioevihyr002da5nemecmlnvj',
    interactive: false
});
map.setZoom(13.4);
var vicLatLng = [-122.399277,40.570616];
var mdiLatLng = [-122.394000,40.578165];
<?php if($mdi_department == 'vic'): ?>
map.setCenter(vicLatLng);
<?php else: ?>
map.setCenter(mdiLatLng);
<?php endif; ?>

function createVICMarker() {
  var vascularOfficeDiv = document.createElement('div');
  vascularOfficeDiv.id = 'markerVIC';
  vascularOfficeDiv.innerHTML = "<a href='<?php echo get_bloginfo('url'); ?>/vascular-interventional-center/#map'>Vascular and Interventional Center</a>";
  vascularOfficeDiv.className = "mapboxMarker";
  var vicLatLngMarker = new mapboxgl.Popup().setLngLat(vicLatLng).setDOMContent(vascularOfficeDiv).addTo(map);
}
function createMDIMarker(label) {
  label = label || 'MD Imaging';
  var mainOfficeDiv = document.createElement('div');
  mainOfficeDiv.id = 'markerMain';
  mainOfficeDiv.innerHTML = "<a href='<?php echo get_bloginfo('url'); ?>#map'>" + label + "</a>";
  if(label === 'MD Imaging') {
    mainOfficeDiv.innerHTML += "<a href='<?php echo get_bloginfo('url'); ?>/womens-imaging-center/'>Women's Imaging Center</a>"
  }
  mainOfficeDiv.className = "mapboxMarker combined";
  var mdiLatLngMarker = new mapboxgl.Popup().setLngLat(mdiLatLng).setDOMContent(mainOfficeDiv).addTo(map);
}


<?php if($mdi_department === 'vic'): ?>
createVICMarker();
var currentTransform = jQuery(mdiLatLngMarker._container).css('transform');
jQuery(mdiLatLngMarker._container).css('transform', currentTransform + ' scale(0.8)');
<?php elseif($mdi_department === 'wic'): ?>
createMDIMarker("Women's Imaging Center");
<?php else: ?>
createMDIMarker();
createVICMarker();
var currentTransform = jQuery(vicLatLngMarker._container).css('transform');
jQuery(vicLatLngMarker._container).css('transform', currentTransform + ' scale(0.8)');
<?php endif; ?>
</script>

</body>
</html>
