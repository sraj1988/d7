<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<?php $path = path_to_theme(); ?>
<div id="wrap">

  <header id="header" class="clearfix" role="banner">

    <div>
      <?php if ($logo): ?>
       <div id="logo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
        </div>
      <?php endif; ?>
      <hgroup id="sitename">
        <h2><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></h2>
        <p><?php if ($site_slogan): ?><?php print $site_slogan; ?><?php endif; ?></p><!--site slogan-->
      </hgroup>
    </div>
    <nav id="navigation" class="clearfix" role="navigation">
      <div id="main-menu">
        <?php 
          if (module_exists('i18n_menu')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree);
        ?>
      </div>
    </nav><!-- end main-menu -->
  </header>
  
  <?php print render($page['header']); ?>
  
    <?php if (theme_get_setting('slideshow_display','business')): ?>
    <?php 
    $url1 = check_plain(theme_get_setting('slide1_url','business'));
    $url2 = check_plain(theme_get_setting('slide2_url','business'));
    $url3 = check_plain(theme_get_setting('slide3_url','business'));
    ?>
      <div id="slider">
        <div class="main_view">
            <div class="window">
                <div class="image_reel">
<!--                    <a href="<?php // print url($url1); ?>"><img src="<?php // print base_path() . drupal_get_path('theme', 'business') . '/images/slide-image-1.jpg'; ?>"></a>
                    <a href="<?php // print url($url2); ?>"><img src="<?php // print base_path() . drupal_get_path('theme', 'business') . '/images/slide-image-2.jpg'; ?>"></a>
                    <a href="<?php // print url($url3); ?>"><img src="<?php // print base_path() . drupal_get_path('theme', 'business') . '/images/slide-image-3.jpg'; ?>"></a>-->
                    <a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'business') . '/images/img-slider-1.jpg'; ?>" width="930px" height="320px"></a>
                    <a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'business') . '/images/img-slider-2.jpg'; ?>" width="930px" height="320px"></a>
                    <a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'business') . '/images/img-slider-3.jpg'; ?>" width="930px" height="320px"></a>
                    <a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'business') . '/images/img-slider-4.jpg'; ?>" width="930px" height="320px"></a>
                    <a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'business') . '/images/img-slider-5.jpg'; ?>" width="930px" height="320px"></a>
                </div>
                <div class="descriptions">
                    <!--<div class="desc" style="display: none;"><?php //  print check_markup(theme_get_setting('slide1_desc','business')); ?></div>-->
                    <!--<div class="desc" style="display: none;"><?php // print check_markup(theme_get_setting('slide2_desc','business')); ?></div>-->
                    <!--<div class="desc" style="display: none;"><?php // print check_markup(theme_get_setting('slide3_desc','business')); ?></div>-->
                    <div class="desc" style="display: none;"></div>
                    <div class="desc" style="display: none;"></div>
                    <div class="desc" style="display: none;"></div>
                    <div class="desc" style="display: none;"></div>
                    <div class="desc" style="display: none;"></div>
                </div>
            </div>
        
            <div class="paging">
                <a rel="1" href="#">1</a>
                <a rel="2" href="#">2</a>
                <a rel="3" href="#">3</a>
                <a rel="4" href="#">4</a>
                <a rel="5" href="#">5</a>
            </div>
        </div>
      </div><!-- EOF: #banner -->
	<?php endif; ?>  


  <?php print $messages; ?>

  <?php if ($page['homequotes']): ?>
  <div id="home-quote"> <?php print render($page['homequotes']); ?></div>
  <?php endif; ?>
  
  <?php if ($page['home_high1'] || $page['home_high2'] || $page['home_high3']): ?>
    <div id="home-highlights" class="clearfix">
     <?php if ($page['home_high1']): ?>
     <div class="home-highlight-box"><?php print render($page['home_high1']); ?></div>
     <?php endif; ?>
     <?php if ($page['home_high2']): ?>
     <div class="home-highlight-box"><?php print render($page['home_high2']); ?></div>
     <?php endif; ?>
     <?php if ($page['home_high3']): ?>
     <div class="home-highlight-box remove-margin"><?php print render($page['home_high3']); ?></div>
     <?php endif; ?>
    </div>
  <?php else:?>
    <div class="home-highlight-box">
        <h2>Register Free <br>
        &amp; Apply 
        </h2>
    </div>
    <div class="home-highlight-box">
        <h2>Find Jobs in <br>
          Your Area
       </h2>
    </div>
<!--    <div class="home-highlight-box">
      <h2>Submit Resume <br>
          for Free
       </h2>
    </div>-->
    <div class="home-highlight-box remove-margin">
        <h2>Looking for<br> 
            a Job? 
        </h2>
    </div>
  <?php endif; ?>
  
  <?php if (theme_get_setting('show_front_content') == 1): ?>
    <div id="main" class="clearfix">
      <section id="post-content" role="main">
        <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
      </section> <!-- /#main -->

      <?php if ($page['sidebar_first']): ?>
        <aside id="sidebar" role="complementary" class="sidebar clearfix">
         <?php print render($page['sidebar_first']); ?>
        </aside>  <!-- /#sidebar-first -->
      <?php endif; ?>
    </div>
    <div class="clear"></div>
  <?php endif; ?>
  
  <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_fourth']): ?>
    <div id="footer-saran" class="clearfix">
     <div id="footer-wrap">
      <?php if ($page['footer_first']): ?>
      <div class="footer-box"><?php print render($page['footer_first']); ?></div>
      <?php endif; ?>
      <?php if ($page['footer_second']): ?>
      <div class="footer-box"><?php print render($page['footer_second']); ?></div>
      <?php endif; ?>
      <?php if ($page['footer_third']): ?>
      <div class="footer-box"><?php print render($page['footer_third']); ?></div>
      <?php endif; ?>
      <?php if ($page['footer_fourth']): ?>
      <div class="footer-box remove-margin"><?php print render($page['footer_fourth']); ?></div>
      <?php endif; ?>
     </div>
    </div>
    <div class="clear"></div>
  <?php else:?>
    <div id="footer-saran" class="clearfix">
     <div id="footer-wrap">
             <div class="footer-box">
                <h3>Profile Verification</h3>
                <!--<div class="image"><img src="<?php // echo $path; ?>/images/img1.png" width="158" height="97" alt=""></div>-->
                <h5>If you are sure that your profile is being verified and surpassed further to extract the relevant job opening for you, you need to bring some effort in it. But don't worry. Let this effort go in our hand. Our professionals will get this job done for you without any further fuss. You only need to mention your basic information, which is needed for your profile verification; and rest will only be the best. </h5>
             </div>
             <div class="footer-box">
                <h3>Cover Letters</h3>
                <!--<div class="image"><img src="<?php // echo $path; ?>/images/img2.png" width="132" height="97" alt=""></div>-->
                <h5>One of the essential aspects that we believe to bring the first impression among the recruiters and the employers is an impressive cover letter. We at "Shinning your Career" craft the most informative, communicative and impressive cover letter for the ardent job seekers focusing on the experience, communication skills, professional qualifications and experience, personality performance and even the quality of professionalism. When everything is clustered in a much impressive manner, we bring the best cover letter all for you. </h5>
             </div>
      
             <div class="footer-box">
                <h3>Resume Guide</h3>
                <!--<div class="image"><img src="<?php // echo $path; ?>/images/img3.png" width="132" height="97" alt=""></div>-->
                <h5>Our special resume guide will help you bring right information and inspiration to find the right job for you. A professionally developed resume brings the best impact among the reputed firms and the recruiters and so we guide you to craft the most impressive and professional resume and upload in your profile. A professional resume guidance will help you to get helped in enhancing your profile strength and curb your anxiety of finding the best job. </h5>
             </div>
             <div class="footer-box remove-margin">
                <h3>Career Alerts</h3>
                <!--<div class="image"><img src="<?php // echo $path; ?>/images/img4.png" width="132" height="97" alt=""></div>-->
                <h5>We understand the extent of worries you have in your mind when you are job less or planning to switch. Well, but this competitive era will not allow you to sit and wait for your turn; regular jobs alerts will help you to stay updated and bring the best job opportunities for you in the form of emails and sms. We make this alert job alert active for you when you are registered to us and become a regular user of our website. Stay connected and get leveraged of these job alerts whenever you update your profile on our website.</h5>
             </div>
    </div>
    </div>
    <div class="clear"></div>
  <?php endif; ?>
  
  <!--END footer -->
  <?php print render($page['footer']) ?>
  
  <?php if (theme_get_setting('footer_copyright')): ?>
  <div class="clear"></div>
  <div id="copyright">
    <?php if ($footer_copyright): ?>
      <?php print $footer_copyright; ?>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</div>
