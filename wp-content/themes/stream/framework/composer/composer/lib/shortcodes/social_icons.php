<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Social Icons
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Social_Profile extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $el_class = '';
      extract( shortcode_atts( array(
        'el_class' => ''
      ), $atts ) );
      $output = '';
      $el_class = $this->getExtraClass($el_class);
	  
	  $output .= '<ul class="social-icons '.$el_class.'">';
	  
	  if(isset($atts['aim']))
	  $output .= '<li><a href="' . $atts['aim'] . '" target="_blank"><i class="icon-aim"></i></a></li>';
	  
	  if(isset($atts['aim_alt']))
	  $output .= '<li><a href="' . $atts['aim_alt'] . '" target="_blank"><i class="icon-aim_alt"></i></a></li>';
	  
	  if(isset($atts['amazon']))
	  $output .= '<li><a href="' . $atts['amazon'] . '" target="_blank"><i class="icon-amazon"></i></a></li>';	
	  
	  if(isset($atts['app_store']))
	  $output .= '<li><a href="' . $atts['app_store'] . '" target="_blank"><i class="icon-app_store"></i></a></li>';	
	  
	  if(isset($atts['apple']))
	  $output .= '<li><a href="' . $atts['apple'] . '" target="_blank"><i class="icon-apple"></i></a></li>';	
	  
	  if(isset($atts['arto']))
	  $output .= '<li><a href="' . $atts['arto'] . '" target="_blank"><i class="icon-arto"></i></a></li>';	
	  
	  if(isset($atts['aws']))
	  $output .= '<li><a href="' . $atts['aws'] . '" target="_blank"><i class="icon-aws"></i></a></li>';	
	  
	  if(isset($atts['baidu']))
	  $output .= '<li><a href="' . $atts['baidu'] . '" target="_blank"><i class="icon-baidu"></i></a></li>';	
	  
	  if(isset($atts['basecamp']))
	  $output .= '<li><a href="' . $atts['basecamp'] . '" target="_blank"><i class="icon-basecamp"></i></a></li>';	
	  
	  if(isset($atts['bebo']))
	  $output .= '<li><a href="' . $atts['bebo'] . '" target="_blank"><i class="icon-bebo"></i></a></li>';	
	  
	  if(isset($atts['behance']))
	  $output .= '<li><a href="' . $atts['behance'] . '" target="_blank"><i class="icon-behance"></i></a></li>';	
	  
	  if(isset($atts['bing']))
	  $output .= '<li><a href="' . $atts['bing'] . '" target="_blank"><i class="icon-bing"></i></a></li>';	
	  
	  if(isset($atts['blip']))
	  $output .= '<li><a href="' . $atts['blip'] . '" target="_blank"><i class="icon-blip"></i></a></li>';	
	  
	  if(isset($atts['blogger']))
	  $output .= '<li><a href="' . $atts['blogger'] . '" target="_blank"><i class="icon-blogger"></i></a></li>';	
	  
	  if(isset($atts['bnter']))
	  $output .= '<li><a href="' . $atts['bnter'] . '" target="_blank"><i class="icon-bnter"></i></a></li>';	
	  
	  if(isset($atts['brightkite']))
	  $output .= '<li><a href="' . $atts['brightkite'] . '" target="_blank"><i class="icon-brightkite"></i></a></li>';	
	  
	  if(isset($atts['cinch']))
	  $output .= '<li><a href="' . $atts['cinch'] . '" target="_blank"><i class="icon-cinch"></i></a></li>';	
	  
	  if(isset($atts['cloudapp']))
	  $output .= '<li><a href="' . $atts['cloudapp'] . '" target="_blank"><i class="icon-cloudapp"></i></a></li>';	
	  
	  if(isset($atts['coroflot']))
	  $output .= '<li><a href="' . $atts['coroflot'] . '" target="_blank"><i class="icon-coroflot"></i></a></li>';	
	  
	  if(isset($atts['creative_commons']))
	  $output .= '<li><a href="' . $atts['creative_commons'] . '" target="_blank"><i class="icon-creative_commons"></i></a></li>';	
	  
	  if(isset($atts['dailybooth']))
	  $output .= '<li><a href="' . $atts['dailybooth'] . '" target="_blank"><i class="icon-dailybooth"></i></a></li>';
	  
	  if(isset($atts['delicious']))
	  $output .= '<li><a href="' . $atts['delicious'] . '" target="_blank"><i class="icon-delicious"></i></a></li>';
	  
	  if(isset($atts['designbump']))
	  $output .= '<li><a href="' . $atts['designbump'] . '" target="_blank"><i class="icon-designbump"></i></a></li>';
	  
	  if(isset($atts['designfloat']))
	  $output .= '<li><a href="' . $atts['designfloat'] . '" target="_blank"><i class="icon-designfloat"></i></a></li>';
	  
	  if(isset($atts['designmoo']))
	  $output .= '<li><a href="' . $atts['designmoo'] . '" target="_blank"><i class="icon-designmoo"></i></a></li>';
	  
	  if(isset($atts['deviantart']))
	  $output .= '<li><a href="' . $atts['deviantart'] . '" target="_blank"><i class="icon-deviantart"></i></a></li>';
	  
	  if(isset($atts['digg']))
	  $output .= '<li><a href="' . $atts['digg'] . '" target="_blank"><i class="icon-digg"></i></a></li>';
	  
	  if(isset($atts['digg_alt']))
	  $output .= '<li><a href="' . $atts['digg_alt'] . '" target="_blank"><i class="icon-digg_alt"></i></a></li>';
	  
	  if(isset($atts['diigo']))
	  $output .= '<li><a href="' . $atts['diigo'] . '" target="_blank"><i class="icon-diigo"></i></a></li>';
	  
	  if(isset($atts['dribbble']))
	  $output .= '<li><a href="' . $atts['dribbble'] . '" target="_blank"><i class="icon-dribbble"></i></a></li>';
	  
	  if(isset($atts['dropbox']))
	  $output .= '<li><a href="' . $atts['dropbox'] . '" target="_blank"><i class="icon-dropbox"></i></a></li>';
	  
	  if(isset($atts['drupal']))
	  $output .= '<li><a href="' . $atts['drupal'] . '" target="_blank"><i class="icon-drupal"></i></a></li>';
	  
	  if(isset($atts['dzone']))
	  $output .= '<li><a href="' . $atts['dzone'] . '" target="_blank"><i class="icon-dzone"></i></a></li>';
	  
	  if(isset($atts['ebay']))
	  $output .= '<li><a href="' . $atts['ebay'] . '" target="_blank"><i class="icon-ebay"></i></a></li>';
	  
	  if(isset($atts['ember']))
	  $output .= '<li><a href="' . $atts['ember'] . '" target="_blank"><i class="icon-ember"></i></a></li>';
	  
	  if(isset($atts['etsy']))
	  $output .= '<li><a href="' . $atts['etsy'] . '" target="_blank"><i class="icon-etsy"></i></a></li>';
	  
	  if(isset($atts['evernote']))
	  $output .= '<li><a href="' . $atts['evernote'] . '" target="_blank"><i class="icon-evernote"></i></a></li>';
	  
	  if(isset($atts['facebook']))
	  $output .= '<li><a href="' . $atts['facebook'] . '" target="_blank"><i class="icon-facebook11"></i></a></li>';
	  
	  if(isset($atts['facebook_alt']))
	  $output .= '<li><a href="' . $atts['facebook_alt'] . '" target="_blank"><i class="icon-facebook_alt"></i></a></li>';
	  
	  if(isset($atts['facebook_places']))
	  $output .= '<li><a href="' . $atts['facebook_places'] . '" target="_blank"><i class="icon-facebook_places"></i></a></li>';
	  
	  if(isset($atts['facto_me']))
	  $output .= '<li><a href="' . $atts['facto_me'] . '" target="_blank"><i class="icon-facto_me"></i></a></li>';
	  
	  if(isset($atts['feedburner']))
	  $output .= '<li><a href="' . $atts['feedburner'] . '" target="_blank"><i class="icon-feedburner"></i></a></li>';
	  
	  if(isset($atts['flickr']))
	  $output .= '<li><a href="' . $atts['flickr'] . '" target="_blank"><i class="icon-flickr"></i></a></li>';
	  
	  if(isset($atts['folkd']))
	  $output .= '<li><a href="' . $atts['folkd'] . '" target="_blank"><i class="icon-folkd"></i></a></li>';
	  
	  if(isset($atts['formspring']))
	  $output .= '<li><a href="' . $atts['formspring'] . '" target="_blank"><i class="icon-formspring"></i></a></li>';
	  
	  if(isset($atts['forrst']))
	  $output .= '<li><a href="' . $atts['forrst'] . '" target="_blank"><i class="icon-forrst"></i></a></li>';
	  
	  if(isset($atts['foursquare']))
	  $output .= '<li><a href="' . $atts['foursquare'] . '" target="_blank"><i class="icon-foursquare"></i></a></li>';
	  
	  if(isset($atts['friendfeed']))
	  $output .= '<li><a href="' . $atts['friendfeed'] . '" target="_blank"><i class="icon-friendfeed"></i></a></li>';
	  
	  if(isset($atts['friendster']))
	  $output .= '<li><a href="' . $atts['friendster'] . '" target="_blank"><i class="icon-friendster"></i></a></li>';
	  
	  if(isset($atts['gdgt']))
	  $output .= '<li><a href="' . $atts['gdgt'] . '" target="_blank"><i class="icon-gdgt"></i></a></li>';
	  
	  if(isset($atts['github']))
	  $output .= '<li><a href="' . $atts['github'] . '" target="_blank"><i class="icon-github"></i></a></li>';
	  
	  if(isset($atts['github_alt']))
	  $output .= '<li><a href="' . $atts['github_alt'] . '" target="_blank"><i class="icon-github_alt"></i></a></li>';
	  
	  if(isset($atts['goodreads']))
	  $output .= '<li><a href="' . $atts['goodreads'] . '" target="_blank"><i class="icon-goodreads"></i></a></li>';
	  
	  if(isset($atts['google']))
	  $output .= '<li><a href="' . $atts['google'] . '" target="_blank"><i class="icon-google"></i></a></li>';
	  
	  if(isset($atts['googleplus']))
	  $output .= '<li><a href="' . $atts['googleplus'] . '" target="_blank"><i class="icon-googleplus2"></i></a></li>';
	  
	  if(isset($atts['google_buzz']))
	  $output .= '<li><a href="' . $atts['google_buzz'] . '" target="_blank"><i class="icon-google_buzz"></i></a></li>';
	  
	  if(isset($atts['google_talk']))
	  $output .= '<li><a href="' . $atts['google_talk'] . '" target="_blank"><i class="icon-google_talk"></i></a></li>';
	  
	  if(isset($atts['gowalla']))
	  $output .= '<li><a href="' . $atts['gowalla'] . '" target="_blank"><i class="icon-gowalla"></i></a></li>';
	  
	  if(isset($atts['gowalla_alt']))
	  $output .= '<li><a href="' . $atts['gowalla_alt'] . '" target="_blank"><i class="icon-gowalla_alt"></i></a></li>';
	  
	  if(isset($atts['grooveshark']))
	  $output .= '<li><a href="' . $atts['grooveshark'] . '" target="_blank"><i class="icon-grooveshark"></i></a></li>';
	  
	  if(isset($atts['hacker_news']))
	  $output .= '<li><a href="' . $atts['hacker_news'] . '" target="_blank"><i class="icon-hacker_news"></i></a></li>';
	  
	  if(isset($atts['hi5']))
	  $output .= '<li><a href="' . $atts['hi5'] . '" target="_blank"><i class="icon-hi5"></i></a></li>';
	  
	  if(isset($atts['hype_machine']))
	  $output .= '<li><a href="' . $atts['hype_machine'] . '" target="_blank"><i class="icon-hype_machine"></i></a></li>';
	  
	  if(isset($atts['hyves']))
	  $output .= '<li><a href="' . $atts['hyves'] . '" target="_blank"><i class="icon-hyves"></i></a></li>';
	  
	  if(isset($atts['icq']))
	  $output .= '<li><a href="' . $atts['icq'] . '" target="_blank"><i class="icon-icq"></i></a></li>';
	  
	  if(isset($atts['identi_ca']))
	  $output .= '<li><a href="' . $atts['identi_ca'] . '" target="_blank"><i class="icon-identi_ca"></i></a></li>';
	  
	  if(isset($atts['instagram']))
	  $output .= '<li><a href="' . $atts['instagram'] . '" target="_blank"><i class="icon-instagram"></i></a></li>';
	  
	  if(isset($atts['instapaper']))
	  $output .= '<li><a href="' . $atts['instapaper'] . '" target="_blank"><i class="icon-instapaper"></i></a></li>';
	  
	  if(isset($atts['itunes']))
	  $output .= '<li><a href="' . $atts['itunes'] . '" target="_blank"><i class="icon-itunes"></i></a></li>';
	  
	  if(isset($atts['kik']))
	  $output .= '<li><a href="' . $atts['kik'] . '" target="_blank"><i class="icon-kik"></i></a></li>';
	  
	  if(isset($atts['krop']))
	  $output .= '<li><a href="' . $atts['krop'] . '" target="_blank"><i class="icon-krop"></i></a></li>';
	  
	  if(isset($atts['last_fm']))
	  $output .= '<li><a href="' . $atts['last_fm'] . '" target="_blank"><i class="icon-last_fm"></i></a></li>';
	  
	  if(isset($atts['linkedin']))
	  $output .= '<li><a href="' . $atts['linkedin'] . '" target="_blank"><i class="icon-linkedin"></i></a></li>';
	  
	  if(isset($atts['linkedin_alt']))
	  $output .= '<li><a href="' . $atts['linkedin_alt'] . '" target="_blank"><i class="icon-linkedin_alt"></i></a></li>';
	  
	  if(isset($atts['livejournal']))
	  $output .= '<li><a href="' . $atts['livejournal'] . '" target="_blank"><i class="icon-livejournal"></i></a></li>';
	  
	  if(isset($atts['lovedsgn']))
	  $output .= '<li><a href="' . $atts['lovedsgn'] . '" target="_blank"><i class="icon-lovedsgn"></i></a></li>';
	  
	  if(isset($atts['meetup']))
	  $output .= '<li><a href="' . $atts['meetup'] . '" target="_blank"><i class="icon-meetup"></i></a></li>';
	  
	  if(isset($atts['metacafe']))
	  $output .= '<li><a href="' . $atts['metacafe'] . '" target="_blank"><i class="icon-metacafe"></i></a></li>';
	  
	  if(isset($atts['ming']))

	  $output .= '<li><a href="' . $atts['ming'] . '" target="_blank"><i class="icon-ming"></i></a></li>';
	  
	  if(isset($atts['mister_wong']))
	  $output .= '<li><a href="' . $atts['mister_wong'] . '" target="_blank"><i class="icon-mister_wong"></i></a></li>';
	  
	  if(isset($atts['mixx']))
	  $output .= '<li><a href="' . $atts['mixx'] . '" target="_blank"><i class="icon-mixx"></i></a></li>';
	  
	  if(isset($atts['mixx_alt']))
	  $output .= '<li><a href="' . $atts['mixx_alt'] . '" target="_blank"><i class="icon-mixx_alt"></i></a></li>';
	  
	  if(isset($atts['mobileme']))
	  $output .= '<li><a href="' . $atts['mobileme'] . '" target="_blank"><i class="icon-mobileme"></i></a></li>';
	  
	  if(isset($atts['msn_messenger']))
	  $output .= '<li><a href="' . $atts['msn_messenger'] . '" target="_blank"><i class="icon-msn_messenger"></i></a></li>';
	  
	  if(isset($atts['myspace']))
	  $output .= '<li><a href="' . $atts['myspace'] . '" target="_blank"><i class="icon-myspace"></i></a></li>';
	  
	  if(isset($atts['myspace_alt']))
	  $output .= '<li><a href="' . $atts['myspace_alt'] . '" target="_blank"><i class="icon-myspace_alt"></i></a></li>';
	  
	  if(isset($atts['newsvine']))
	  $output .= '<li><a href="' . $atts['newsvine'] . '" target="_blank"><i class="icon-newsvine"></i></a></li>';
	  
	  if(isset($atts['official_fm']))
	  $output .= '<li><a href="' . $atts['official_fm'] . '" target="_blank"><i class="icon-official_fm"></i></a></li>';
	  
	  if(isset($atts['openid']))
	  $output .= '<li><a href="' . $atts['openid'] . '" target="_blank"><i class="icon-openid"></i></a></li>';
	  
	  if(isset($atts['orkut']))
	  $output .= '<li><a href="' . $atts['orkut'] . '" target="_blank"><i class="icon-orkut"></i></a></li>';
	  
	  if(isset($atts['pandora']))
	  $output .= '<li><a href="' . $atts['pandora'] . '" target="_blank"><i class="icon-pandora"></i></a></li>';
	  
	  if(isset($atts['path']))
	  $output .= '<li><a href="' . $atts['path'] . '" target="_blank"><i class="icon-path"></i></a></li>';
	  
	  if(isset($atts['paypal']))
	  $output .= '<li><a href="' . $atts['paypal'] . '" target="_blank"><i class="icon-paypal"></i></a></li>';
	  
	  if(isset($atts['pinterest']))
	  $output .= '<li><a href="' . $atts['pinterest'] . '" target="_blank"><i class="icon-pinterest"></i></a></li>';
	  
	  if(isset($atts['photobucket']))
	  $output .= '<li><a href="' . $atts['photobucket'] . '" target="_blank"><i class="icon-photobucket"></i></a></li>';
	  
	  if(isset($atts['picasa']))
	  $output .= '<li><a href="' . $atts['picasa'] . '" target="_blank"><i class="icon-picasa"></i></a></li>';
	  
	  if(isset($atts['pinboard_in']))
	  $output .= '<li><a href="' . $atts['pinboard_in'] . '" target="_blank"><i class="icon-pinboard_in"></i></a></li>';
	  
	  if(isset($atts['ping']))
	  $output .= '<li><a href="' . $atts['ping'] . '" target="_blank"><i class="icon-ping"></i></a></li>';
	  
	  if(isset($atts['pingchat']))
	  $output .= '<li><a href="' . $atts['pingchat'] . '" target="_blank"><i class="icon-pingchat"></i></a></li>';
	  
	  if(isset($atts['playstation']))
	  $output .= '<li><a href="' . $atts['playstation'] . '" target="_blank"><i class="icon-playstation"></i></a></li>';
	  
	  if(isset($atts['plixi']))
	  $output .= '<li><a href="' . $atts['plixi'] . '" target="_blank"><i class="icon-plixi"></i></a></li>';
	  
	  if(isset($atts['plurk']))
	  $output .= '<li><a href="' . $atts['plurk'] . '" target="_blank"><i class="icon-plurk"></i></a></li>';
	  
	  if(isset($atts['podcast']))
	  $output .= '<li><a href="' . $atts['podcast'] . '" target="_blank"><i class="icon-podcast"></i></a></li>';
	  
	  if(isset($atts['posterous']))
	  $output .= '<li><a href="' . $atts['posterous'] . '" target="_blank"><i class="icon-posterous"></i></a></li>';
	  
	  if(isset($atts['qik']))
	  $output .= '<li><a href="' . $atts['qik'] . '" target="_blank"><i class="icon-qik"></i></a></li>';
	  
	  if(isset($atts['quik']))
	  $output .= '<li><a href="' . $atts['quik'] . '" target="_blank"><i class="icon-quik"></i></a></li>';
	  
	  if(isset($atts['quora']))
	  $output .= '<li><a href="' . $atts['quora'] . '" target="_blank"><i class="icon-quora"></i></a></li>';
	  
	  if(isset($atts['rdio']))
	  $output .= '<li><a href="' . $atts['rdio'] . '" target="_blank"><i class="icon-rdio"></i></a></li>';
	  
	  if(isset($atts['readernaut']))
	  $output .= '<li><a href="' . $atts['readernaut'] . '" target="_blank"><i class="icon-readernaut"></i></a></li>';
	  
	  if(isset($atts['reddit']))
	  $output .= '<li><a href="' . $atts['reddit'] . '" target="_blank"><i class="icon-reddit"></i></a></li>';
	  
	  if(isset($atts['retweet']))
	  $output .= '<li><a href="' . $atts['retweet'] . '" target="_blank"><i class="icon-retweet"></i></a></li>';
	  
	  if(isset($atts['robo_to']))
	  $output .= '<li><a href="' . $atts['robo_to'] . '" target="_blank"><i class="icon-robo_to"></i></a></li>';
	  
	  if(isset($atts['rss']))
	  $output .= '<li><a href="' . $atts['rss'] . '" target="_blank"><i class="icon-rss"></i></a></li>';
	  
	  if(isset($atts['scribd']))
	  $output .= '<li><a href="' . $atts['scribd'] . '" target="_blank"><i class="icon-scribd"></i></a></li>';
	  
	  if(isset($atts['sharethis']))
	  $output .= '<li><a href="' . $atts['sharethis'] . '" target="_blank"><i class="icon-sharethis"></i></a></li>';
	  
	  if(isset($atts['simplenote']))
	  $output .= '<li><a href="' . $atts['simplenote'] . '" target="_blank"><i class="icon-simplenote"></i></a></li>';
	  
	  if(isset($atts['skype']))
	  $output .= '<li><a href="' . $atts['skype'] . '" target="_blank"><i class="icon-skype"></i></a></li>';
	  
	  if(isset($atts['slashdot']))
	  $output .= '<li><a href="' . $atts['slashdot'] . '" target="_blank"><i class="icon-slashdot"></i></a></li>';
	  
	  if(isset($atts['slideshare']))
	  $output .= '<li><a href="' . $atts['slideshare'] . '" target="_blank"><i class="icon-slideshare"></i></a></li>';
	  
	  if(isset($atts['smugmug']))
	  $output .= '<li><a href="' . $atts['smugmug'] . '" target="_blank"><i class="icon-smugmug"></i></a></li>';
	  
	  if(isset($atts['soundcloud']))
	  $output .= '<li><a href="' . $atts['soundcloud'] . '" target="_blank"><i class="icon-soundcloud"></i></a></li>';
	  
	  if(isset($atts['spotify']))
	  $output .= '<li><a href="' . $atts['spotify'] . '" target="_blank"><i class="icon-spotify"></i></a></li>';
	  
	  if(isset($atts['squarespace']))
	  $output .= '<li><a href="' . $atts['squarespace'] . '" target="_blank"><i class="icon-squarespace"></i></a></li>';
	  
	  if(isset($atts['squidoo']))
	  $output .= '<li><a href="' . $atts['squidoo'] . '" target="_blank"><i class="icon-squidoo"></i></a></li>';
	  
	  if(isset($atts['steam']))
	  $output .= '<li><a href="' . $atts['steam'] . '" target="_blank"><i class="icon-steam"></i></a></li>';
	  
	  if(isset($atts['stumbleupon']))
	  $output .= '<li><a href="' . $atts['stumbleupon'] . '" target="_blank"><i class="icon-stumbleupon"></i></a></li>';
	  
	  if(isset($atts['technorati']))
	  $output .= '<li><a href="' . $atts['technorati'] . '" target="_blank"><i class="icon-technorati"></i></a></li>';
	  
	  if(isset($atts['threewords_me']))
	  $output .= '<li><a href="' . $atts['threewords_me'] . '" target="_blank"><i class="icon-threewords_me"></i></a></li>';
	  
	  if(isset($atts['tribe_net']))
	  $output .= '<li><a href="' . $atts['tribe_net'] . '" target="_blank"><i class="icon-tribe_net"></i></a></li>';
	  
	  if(isset($atts['tripit']))
	  $output .= '<li><a href="' . $atts['tripit'] . '" target="_blank"><i class="icon-tripit"></i></a></li>';
	  
	  if(isset($atts['tumblr']))
	  $output .= '<li><a href="' . $atts['tumblr'] . '" target="_blank"><i class="icon-tumblr"></i></a></li>';
	  
	  if(isset($atts['twitter']))
	  $output .= '<li><a href="' . $atts['twitter'] . '" target="_blank"><i class="icon-twitter"></i></a></li>';
	  
	  if(isset($atts['twitter_alt']))
	  $output .= '<li><a href="' . $atts['twitter_alt'] . '" target="_blank"><i class="icon-twitter_alt"></i></a></li>';
	  
	  if(isset($atts['vcard']))
	  $output .= '<li><a href="' . $atts['vcard'] . '" target="_blank"><i class="icon-vcard"></i></a></li>';
	  
	  if(isset($atts['viddler']))
	  $output .= '<li><a href="' . $atts['viddler'] . '" target="_blank"><i class="icon-viddler"></i></a></li>';
	  
	  if(isset($atts['vimeo']))
	  $output .= '<li><a href="' . $atts['vimeo'] . '" target="_blank"><i class="icon-vimeo"></i></a></li>';
	  
	  if(isset($atts['virb']))
	  $output .= '<li><a href="' . $atts['virb'] . '" target="_blank"><i class="icon-virb"></i></a></li>';
	  
	  if(isset($atts['w3']))
	  $output .= '<li><a href="' . $atts['w3'] . '" target="_blank"><i class="icon-w3"></i></a></li>';
	  
	  if(isset($atts['whatsapp']))
	  $output .= '<li><a href="' . $atts['whatsapp'] . '" target="_blank"><i class="icon-whatsapp"></i></a></li>';
	  
	  if(isset($atts['wikipedia']))
	  $output .= '<li><a href="' . $atts['wikipedia'] . '" target="_blank"><i class="icon-wikipedia"></i></a></li>';
	  
	  if(isset($atts['windows']))
	  $output .= '<li><a href="' . $atts['windows'] . '" target="_blank"><i class="icon-windows"></i></a></li>';
	  
	  if(isset($atts['wists']))
	  $output .= '<li><a href="' . $atts['wists'] . '" target="_blank"><i class="icon-wists"></i></a></li>';
	  
	  if(isset($atts['wordpress']))
	  $output .= '<li><a href="' . $atts['wordpress'] . '" target="_blank"><i class="icon-wordpress"></i></a></li>';
	  
	  if(isset($atts['wordpress_alt']))
	  $output .= '<li><a href="' . $atts['wordpress_alt'] . '" target="_blank"><i class="icon-wordpress_alt"></i></a></li>';
	  
	  if(isset($atts['xing']))
	  $output .= '<li><a href="' . $atts['xing'] . '" target="_blank"><i class="icon-xing"></i></a></li>';
	  
	  if(isset($atts['yahoo']))
	  $output .= '<li><a href="' . $atts['yahoo'] . '" target="_blank"><i class="icon-yahoo"></i></a></li>';
	  
	  if(isset($atts['yahoo_buzz']))
	  $output .= '<li><a href="' . $atts['yahoo_buzz'] . '" target="_blank"><i class="icon-yahoo_buzz"></i></a></li>';
	  
	  if(isset($atts['yahoo_messenger']))
	  $output .= '<li><a href="' . $atts['yahoo_messenger'] . '" target="_blank"><i class="icon-yahoo_messenger"></i></a></li>';
	  
	  if(isset($atts['yelp']))
	  $output .= '<li><a href="' . $atts['yelp'] . '" target="_blank"><i class="icon-yelp"></i></a></li>';
	  
	  if(isset($atts['youtube']))
	  $output .= '<li><a href="' . $atts['youtube'] . '" target="_blank"><i class="icon-youtube"></i></a></li>';
	  
	  if(isset($atts['youtube_alt']))
	  $output .= '<li><a href="' . $atts['youtube_alt'] . '" target="_blank"><i class="icon-youtube_alt"></i></a></li>';
	  
	  if(isset($atts['zerply']))
	  $output .= '<li><a href="' . $atts['zerply'] . '" target="_blank"><i class="icon-zerply"></i></a></li>';
	  
	  if(isset($atts['zootool']))
	  $output .= '<li><a href="' . $atts['zootool'] . '" target="_blank"><i class="icon-zootool"></i></a></li>';
	  
	  if(isset($atts['zynga']))
	  $output .= '<li><a href="' . $atts['zynga'] . '" target="_blank"><i class="icon-zynga"></i></a></li>';
	        
	  $output .= '</ul>';
	  
      return $output . $this->endBlockComment('ig_social_profile') . "\n";
  }
}

?>