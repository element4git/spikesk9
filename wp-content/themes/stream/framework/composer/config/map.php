<?php
/**
 * WPBakery Visual Composer Shortcodes settings
 *
 * @package VPBakeryVisualComposer
 *
 */

$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;

$target_arr = array(
	__("Same window", "INFINITE_LANGUAGE") => "_self", 
	__("New window", "INFINITE_LANGUAGE") => "_blank"
);

// Global Icons
global $infinite_icons;
$infinite_icons = array(
'icon-earth' => 'icon-earth', 'icon-clock' => 'icon-clock', 'icon-minus' => 'icon-minus', 'icon-plus' => 'icon-plus', 'icon-cancel' => 'icon-cancel', 'icon-question' => 'icon-question', 'icon-comment' => 'icon-comment', 'icon-chat' => 'icon-chat', 'icon-speaker' => 'icon-speaker', 'icon-heart' => 'icon-heart', 'icon-list' => 'icon-list', 'icon-edit' => 'icon-edit', 'icon-trash' => 'icon-trash', 'icon-briefcase' => 'icon-briefcase', 'icon-newspaper' => 'icon-newspaper', 'icon-calendar' => 'icon-calendar', 'icon-inbox' => 'icon-inbox', 'icon-facebook' => 'icon-facebook', 'icon-googleplus' => 'icon-googleplus', 'icon-instagram' => 'icon-instagram', 'icon-contrast' => 'icon-contrast', 'icon-brightness' => 'icon-brightness', 'icon-user' => 'icon-user', 'icon-users' => 'icon-users', 'icon-sent' => 'icon-sent', 'icon-archive' => 'icon-archive', 'icon-desktop' => 'icon-desktop', 'icon-reply' => 'icon-reply', 'icon-popup' => 'icon-popup', 'icon-grid' => 'icon-grid', 'icon-email' => 'icon-email', 'icon-tag' => 'icon-tag', 'icon-film' => 'icon-film', 'icon-share' => 'icon-share', 'icon-picture' => 'icon-picture', 'icon-frame' => 'icon-frame', 'icon-wand' => 'icon-wand', 'icon-mobile' => 'icon-mobile', 'icon-crop' => 'icon-crop', 'icon-marquee' => 'icon-marquee', 'icon-locked' => 'icon-locked', 'icon-pin' => 'icon-pin', 'icon-zoomin' => 'icon-zoomin', 'icon-zoomout' => 'icon-zoomout', 'icon-search' => 'icon-search', 'icon-home' => 'icon-home', 'icon-cart' => 'icon-cart', 'icon-camera' => 'icon-camera', 'icon-compass' => 'icon-compass', 'icon-cloud' => 'icon-cloud', 'icon-chat2' => 'icon-chat2', 'icon-chat-alt-stroke' => 'icon-chat-alt-stroke', 'icon-chat-alt-fill' => 'icon-chat-alt-fill', 'icon-comment-alt1-stroke' => 'icon-comment-alt1-stroke', 'icon-comment2' => 'icon-comment2', 'icon-comment-stroke' => 'icon-comment-stroke', 'icon-comment-fill' => 'icon-comment-fill', 'icon-comment-alt2-stroke' => 'icon-comment-alt2-stroke', 'icon-comment-alt2-fill' => 'icon-comment-alt2-fill', 'icon-checkmark' => 'icon-checkmark', 'icon-check-alt' => 'icon-check-alt', 'icon-x' => 'icon-x', 'icon-x-altx-alt' => 'icon-x-altx-alt', 'icon-denied' => 'icon-denied', 'icon-cursor' => 'icon-cursor', 'icon-rss' => 'icon-rss', 'icon-rss-alt' => 'icon-rss-alt', 'icon-wrench' => 'icon-wrench', 'icon-dial' => 'icon-dial', 'icon-cog' => 'icon-cog', 'icon-calendar2' => 'icon-calendar2', 'icon-calendar-alt-stroke' => 'icon-calendar-alt-stroke', 'icon-calendar-alt-fill' => 'icon-calendar-alt-fill', 'icon-share2' => 'icon-share2', 'icon-mail' => 'icon-mail', 'icon-heart-stroke' => 'icon-heart-stroke', 'icon-heart-fill' => 'icon-heart-fill', 'icon-movie' => 'icon-movie', 'icon-document-alt-stroke' => 'icon-document-alt-stroke', 'icon-document-alt-fill' => 'icon-document-alt-fill', 'icon-document-stroke' => 'icon-document-stroke', 'icon-document-fill' => 'icon-document-fill', 'icon-plus2' => 'icon-plus2', 'icon-plus-alt' => 'icon-plus-alt', 'icon-minus2' => 'icon-minus2', 'icon-minus-alt' => 'icon-minus-alt', 'icon-pin2' => 'icon-pin2', 'icon-link' => 'icon-link', 'icon-bolt' => 'icon-bolt', 'icon-move' => 'icon-move', 'icon-move-alt1' => 'icon-move-alt1', 'icon-move-alt2' => 'icon-move-alt2', 'icon-equalizer' => 'icon-equalizer', 'icon-award-fill' => 'icon-award-fill', 'icon-award-stroke' => 'icon-award-stroke', 'icon-magnifying-glass' => 'icon-magnifying-glass', 'icon-trash-stroke' => 'icon-trash-stroke', 'icon-trash-fill' => 'icon-trash-fill', 'icon-beaker-alt' => 'icon-beaker-alt', 'icon-beaker' => 'icon-beaker', 'icon-key-stroke' => 'icon-key-stroke', 'icon-key-fill' => 'icon-key-fill', 'icon-new-window' => 'icon-new-window', 'icon-lightbulb' => 'icon-lightbulb', 'icon-spin-alt' => 'icon-spin-alt', 'icon-spin' => 'icon-spin', 'icon-curved-arrow' => 'icon-curved-arrow', 'icon-undo' => 'icon-undo', 'icon-reload' => 'icon-reload', 'icon-reload-alt' => 'icon-reload-alt', 'icon-loop' => 'icon-loop', 'icon-loop-alt1' => 'icon-loop-alt1', 'icon-loop-alt2' => 'icon-loop-alt2', 'icon-loop-alt3' => 'icon-loop-alt3', 'icon-loop-alt4' => 'icon-loop-alt4', 'icon-transfer' => 'icon-transfer', 'icon-move-vertical' => 'icon-move-vertical', 'icon-move-vertical-alt1' => 'icon-move-vertical-alt1', 'icon-move-vertical-alt2' => 'icon-move-vertical-alt2', 'icon-move-horizontal' => 'icon-move-horizontal', 'icon-move-horizontal-alt1' => 'icon-move-horizontal-alt1', 'icon-move-horizontal-alt2' => 'icon-move-horizontal-alt2', 'icon-arrow-left' => 'icon-arrow-left', 'icon-arrow-left-alt1' => 'icon-arrow-left-alt1', 'icon-arrow-left-alt2' => 'icon-arrow-left-alt2', 'icon-arrow-right' => 'icon-arrow-right', 'icon-arrow-right-alt1' => 'icon-arrow-right-alt1', 'icon-arrow-right-alt2' => 'icon-arrow-right-alt2', 'icon-arrow-up' => 'icon-arrow-up', 'icon-arrow-up-alt1' => 'icon-arrow-up-alt1', 'icon-arrow-up-alt2' => 'icon-arrow-up-alt2', 'icon-arrow-down' => 'icon-arrow-down', 'icon-arrow-down-alt1' => 'icon-arrow-down-alt1', 'icon-arrow-down-alt2' => 'icon-arrow-down-alt2', 'icon-cd' => 'icon-cd', 'icon-steering-wheel' => 'icon-steering-wheel', 'icon-microphone' => 'icon-microphone', 'icon-headphones' => 'icon-headphones', 'icon-volume' => 'icon-volume', 'icon-volume-mute' => 'icon-volume-mute', 'icon-play' => 'icon-play', 'icon-pause' => 'icon-pause', 'icon-stop' => 'icon-stop', 'icon-eject' => 'icon-eject', 'icon-first' => 'icon-first', 'icon-last' => 'icon-last', 'icon-play-alt' => 'icon-play-alt', 'icon-fullscreen-exit' => 'icon-fullscreen-exit', 'icon-fullscreen-exit-alt' => 'icon-fullscreen-exit-alt', 'icon-fullscreen' => 'icon-fullscreen', 'icon-fullscreen-alt' => 'icon-fullscreen-alt', 'icon-iphone' => 'icon-iphone', 'icon-battery-empty' => 'icon-battery-empty', 'icon-battery-half' => 'icon-battery-half', 'icon-battery-full' => 'icon-battery-full', 'icon-battery-charging' => 'icon-battery-charging', 'icon-compass2' => 'icon-compass2', 'icon-box' => 'icon-box', 'icon-folder-stroke' => 'icon-folder-stroke', 'icon-folder-fill' => 'icon-folder-fill', 'icon-at' => 'icon-at', 'icon-ampersand' => 'icon-ampersand', 'icon-info' => 'icon-info', 'icon-question-mark' => 'icon-question-mark', 'icon-pilcrow' => 'icon-pilcrow', 'icon-hash' => 'icon-hash', 'icon-left-quote' => 'icon-left-quote', 'icon-right-quote' => 'icon-right-quote', 'icon-left-quote-alt' => 'icon-left-quote-alt', 'icon-right-quote-alt' => 'icon-right-quote-alt', 'icon-article' => 'icon-article', 'icon-read-more' => 'icon-read-more', 'icon-list2' => 'icon-list2', 'icon-list-nested' => 'icon-list-nested', 'icon-book' => 'icon-book', 'icon-book-alt' => 'icon-book-alt', 'icon-book-alt2' => 'icon-book-alt2', 'icon-pen' => 'icon-pen', 'icon-pen-alt-stroke' => 'icon-pen-alt-stroke', 'icon-pen-alt-fill' => 'icon-pen-alt-fill', 'icon-pen-alt2' => 'icon-pen-alt2', 'icon-brush' => 'icon-brush', 'icon-brush-alt' => 'icon-brush-alt', 'icon-eyedropper' => 'icon-eyedropper', 'icon-layers-alt' => 'icon-layers-alt', 'icon-layers' => 'icon-layers', 'icon-image' => 'icon-image', 'icon-camera2' => 'icon-camera2', 'icon-aperture' => 'icon-aperture', 'icon-aperture-alt' => 'icon-aperture-alt', 'icon-chart' => 'icon-chart', 'icon-chart-alt' => 'icon-chart-alt', 'icon-bars' => 'icon-bars', 'icon-bars-alt' => 'icon-bars-alt', 'icon-eye' => 'icon-eye', 'icon-user2' => 'icon-user2', 'icon-home2' => 'icon-home2', 'icon-clock2' => 'icon-clock2', 'icon-lock-stroke' => 'icon-lock-stroke', 'icon-lock-fill' => 'icon-lock-fill', 'icon-unlock-stroke' => 'icon-unlock-stroke', 'icon-unlock-fill' => 'icon-unlock-fill', 'icon-tag-stroke' => 'icon-tag-stroke', 'icon-tag-fill' => 'icon-tag-fill', 'icon-sun-stroke' => 'icon-sun-stroke', 'icon-sun-fill' => 'icon-sun-fill', 'icon-moon-stroke' => 'icon-moon-stroke', 'icon-moon-fill' => 'icon-moon-fill', 'icon-cloud2' => 'icon-cloud2', 'icon-rain' => 'icon-rain', 'icon-umbrella' => 'icon-umbrella', 'icon-star' => 'icon-star', 'icon-map-pin-stroke' => 'icon-map-pin-stroke', 'icon-map-pin-fill' => 'icon-map-pin-fill', 'icon-map-pin-alt' => 'icon-map-pin-alt', 'icon-target' => 'icon-target', 'icon-download' => 'icon-download', 'icon-upload' => 'icon-upload', 'icon-cloud-download' => 'icon-cloud-download', 'icon-cloud-upload' => 'icon-cloud-upload', 'icon-fork' => 'icon-fork', 'icon-paperclip' => 'icon-paperclip', 'icon-warning' => 'icon-warning', 'icon-cloud3' => 'icon-cloud3', 'icon-locked2' => 'icon-locked2', 'icon-inbox2' => 'icon-inbox2', 'icon-comment3' => 'icon-comment3', 'icon-mic' => 'icon-mic', 'icon-envelope' => 'icon-envelope', 'icon-briefcase2' => 'icon-briefcase2', 'icon-cart2' => 'icon-cart2', 'icon-contrast2' => 'icon-contrast2', 'icon-clock3' => 'icon-clock3', 'icon-user3' => 'icon-user3', 'icon-cog2' => 'icon-cog2', 'icon-music' => 'icon-music', 'icon-twitter' => 'icon-twitter', 'icon-pencil' => 'icon-pencil', 'icon-frame2' => 'icon-frame2', 'icon-switch' => 'icon-switch', 'icon-star2' => 'icon-star2', 'icon-key' => 'icon-key', 'icon-chart2' => 'icon-chart2', 'icon-apple' => 'icon-apple', 'icon-file' => 'icon-file', 'icon-plus3' => 'icon-plus3', 'icon-minus3' => 'icon-minus3', 'icon-picture2' => 'icon-picture2', 'icon-folder' => 'icon-folder', 'icon-camera3' => 'icon-camera3', 'icon-search2' => 'icon-search2', 'icon-dribbble' => 'icon-dribbble', 'icon-forrst' => 'icon-forrst', 'icon-feed' => 'icon-feed', 'icon-blocked' => 'icon-blocked', 'icon-target2' => 'icon-target2', 'icon-play2' => 'icon-play2', 'icon-pause2' => 'icon-pause2', 'icon-bug' => 'icon-bug', 'icon-console' => 'icon-console', 'icon-film2' => 'icon-film2', 'icon-type' => 'icon-type', 'icon-home3' => 'icon-home3', 'icon-earth2' => 'icon-earth2', 'icon-location' => 'icon-location', 'icon-info2' => 'icon-info2', 'icon-eye2' => 'icon-eye2', 'icon-heart2' => 'icon-heart2', 'icon-bookmark' => 'icon-bookmark', 'icon-wrench2' => 'icon-wrench2', 'icon-calendar3' => 'icon-calendar3', 'icon-window' => 'icon-window', 'icon-monitor' => 'icon-monitor', 'icon-mobile2' => 'icon-mobile2', 'icon-droplet' => 'icon-droplet', 'icon-mouse' => 'icon-mouse', 'icon-refresh' => 'icon-refresh', 'icon-location2' => 'icon-location2', 'icon-tag2' => 'icon-tag2', 'icon-phone' => 'icon-phone', 'icon-star3' => 'icon-star3', 'icon-pointer' => 'icon-pointer', 'icon-thumbsup' => 'icon-thumbsup', 'icon-thumbsdown' => 'icon-thumbsdown', 'icon-headphones2' => 'icon-headphones2', 'icon-move2' => 'icon-move2', 'icon-checkmark2' => 'icon-checkmark2', 'icon-cancel2' => 'icon-cancel2', 'icon-skype' => 'icon-skype', 'icon-gift' => 'icon-gift', 'icon-cone' => 'icon-cone', 'icon-alarm' => 'icon-alarm', 'icon-coffee' => 'icon-coffee', 'icon-basket' => 'icon-basket', 'icon-flag' => 'icon-flag', 'icon-ipod' => 'icon-ipod', 'icon-trashcan' => 'icon-trashcan', 'icon-bolt2' => 'icon-bolt2', 'icon-ampersand2' => 'icon-ampersand2', 'icon-compass3' => 'icon-compass3', 'icon-list3' => 'icon-list3', 'icon-grid2' => 'icon-grid2', 'icon-volume2' => 'icon-volume2', 'icon-volume3' => 'icon-volume3', 'icon-stats' => 'icon-stats', 'icon-target3' => 'icon-target3', 'icon-forward' => 'icon-forward', 'icon-paperclip2' => 'icon-paperclip2', 'icon-keyboard' => 'icon-keyboard', 'icon-crop2' => 'icon-crop2', 'icon-floppy' => 'icon-floppy', 'icon-filter' => 'icon-filter', 'icon-trophy' => 'icon-trophy', 'icon-diary' => 'icon-diary', 'icon-addressbook' => 'icon-addressbook', 'icon-stop2' => 'icon-stop2', 'icon-smiley' => 'icon-smiley', 'icon-shit' => 'icon-shit', 'icon-bookmark2' => 'icon-bookmark2', 'icon-camera4' => 'icon-camera4', 'icon-lamp' => 'icon-lamp', 'icon-disk' => 'icon-disk', 'icon-button' => 'icon-button', 'icon-database' => 'icon-database', 'icon-creditcard' => 'icon-creditcard', 'icon-atom' => 'icon-atom', 'icon-winsows' => 'icon-winsows', 'icon-target4' => 'icon-target4', 'icon-battery' => 'icon-battery', 'icon-code' => 'icon-code', 'icon-sunrise' => 'icon-sunrise', 'icon-sun' => 'icon-sun', 'icon-moon' => 'icon-moon', 'icon-sun2' => 'icon-sun2', 'icon-windy' => 'icon-windy', 'icon-wind' => 'icon-wind', 'icon-snowflake' => 'icon-snowflake', 'icon-cloudy' => 'icon-cloudy', 'icon-cloud4' => 'icon-cloud4', 'icon-weather' => 'icon-weather', 'icon-weather2' => 'icon-weather2', 'icon-weather3' => 'icon-weather3', 'icon-lines' => 'icon-lines', 'icon-cloud5' => 'icon-cloud5', 'icon-lightning' => 'icon-lightning', 'icon-lightning2' => 'icon-lightning2', 'icon-rainy' => 'icon-rainy', 'icon-rainy2' => 'icon-rainy2', 'icon-windy2' => 'icon-windy2', 'icon-windy3' => 'icon-windy3', 'icon-snowy' => 'icon-snowy', 'icon-snowy2' => 'icon-snowy2', 'icon-snowy3' => 'icon-snowy3', 'icon-weather4' => 'icon-weather4', 'icon-cloudy2' => 'icon-cloudy2', 'icon-cloud6' => 'icon-cloud6', 'icon-lightning3' => 'icon-lightning3', 'icon-sun3' => 'icon-sun3', 'icon-moon2' => 'icon-moon2', 'icon-cloudy3' => 'icon-cloudy3', 'icon-cloud7' => 'icon-cloud7', 'icon-cloud8' => 'icon-cloud8', 'icon-lightning4' => 'icon-lightning4', 'icon-rainy3' => 'icon-rainy3', 'icon-rainy4' => 'icon-rainy4', 'icon-windy4' => 'icon-windy4', 'icon-windy5' => 'icon-windy5', 'icon-snowy4' => 'icon-snowy4', 'icon-snowy5' => 'icon-snowy5', 'icon-weather5' => 'icon-weather5', 'icon-cloudy4' => 'icon-cloudy4', 'icon-lightning5' => 'icon-lightning5', 'icon-thermometer' => 'icon-thermometer', 'icon-compass4' => 'icon-compass4', 'icon-none' => 'icon-none', 'icon-Celsius' => 'icon-Celsius', 'icon-Fahrenheit' => 'icon-Fahrenheit', 'icon-home4' => 'icon-home4', 'icon-home5' => 'icon-home5', 'icon-home6' => 'icon-home6', 'icon-home7' => 'icon-home7', 'icon-home8' => 'icon-home8', 'icon-home9' => 'icon-home9', 'icon-home10' => 'icon-home10', 'icon-home11' => 'icon-home11', 'icon-home12' => 'icon-home12', 'icon-home13' => 'icon-home13', 'icon-home14' => 'icon-home14', 'icon-office' => 'icon-office', 'icon-newspaper2' => 'icon-newspaper2', 'icon-pencil2' => 'icon-pencil2', 'icon-pencil3' => 'icon-pencil3', 'icon-pencil4' => 'icon-pencil4', 'icon-pencil5' => 'icon-pencil5', 'icon-pencil6' => 'icon-pencil6', 'icon-pencil7' => 'icon-pencil7', 'icon-quill' => 'icon-quill', 'icon-quill2' => 'icon-quill2', 'icon-quill3' => 'icon-quill3', 'icon-pen2' => 'icon-pen2', 'icon-pen3' => 'icon-pen3', 'icon-pen4' => 'icon-pen4', 'icon-pen5' => 'icon-pen5', 'icon-pen6' => 'icon-pen6', 'icon-marker' => 'icon-marker', 'icon-home15' => 'icon-home15', 'icon-marker2' => 'icon-marker2', 'icon-blog' => 'icon-blog', 'icon-blog2' => 'icon-blog2', 'icon-brush2' => 'icon-brush2', 'icon-palette' => 'icon-palette', 'icon-palette2' => 'icon-palette2', 'icon-eyedropper2' => 'icon-eyedropper2', 'icon-eyedropper3' => 'icon-eyedropper3', 'icon-droplet2' => 'icon-droplet2', 'icon-droplet3' => 'icon-droplet3', 'icon-droplet4' => 'icon-droplet4', 'icon-droplet5' => 'icon-droplet5', 'icon-paint-format' => 'icon-paint-format', 'icon-paint-format2' => 'icon-paint-format2', 'icon-image2' => 'icon-image2', 'icon-image3' => 'icon-image3', 'icon-image4' => 'icon-image4', 'icon-images' => 'icon-images', 'icon-image5' => 'icon-image5', 'icon-image6' => 'icon-image6', 'icon-image7' => 'icon-image7', 'icon-images2' => 'icon-images2', 'icon-image8' => 'icon-image8', 'icon-camera5' => 'icon-camera5', 'icon-camera6' => 'icon-camera6', 'icon-camera7' => 'icon-camera7', 'icon-camera8' => 'icon-camera8', 'icon-music2' => 'icon-music2', 'icon-music3' => 'icon-music3', 'icon-music4' => 'icon-music4', 'icon-music5' => 'icon-music5', 'icon-music6' => 'icon-music6', 'icon-music7' => 'icon-music7', 'icon-piano' => 'icon-piano', 'icon-guitar' => 'icon-guitar', 'icon-headphones3' => 'icon-headphones3', 'icon-headphones4' => 'icon-headphones4', 'icon-play3' => 'icon-play3', 'icon-play4' => 'icon-play4', 'icon-movie2' => 'icon-movie2', 'icon-movie3' => 'icon-movie3', 'icon-movie4' => 'icon-movie4', 'icon-film3' => 'icon-film3', 'icon-film4' => 'icon-film4', 'icon-film5' => 'icon-film5', 'icon-film6' => 'icon-film6', 'icon-camera9' => 'icon-camera9', 'icon-camera10' => 'icon-camera10', 'icon-camera11' => 'icon-camera11', 'icon-camera12' => 'icon-camera12', 'icon-camera13' => 'icon-camera13', 'icon-dice' => 'icon-dice', 'icon-gamepad' => 'icon-gamepad', 'icon-gamepad2' => 'icon-gamepad2', 'icon-gamepad3' => 'icon-gamepad3', 'icon-pacman' => 'icon-pacman', 'icon-spades' => 'icon-spades', 'icon-clubs' => 'icon-clubs', 'icon-diamonds' => 'icon-diamonds', 'icon-king' => 'icon-king', 'icon-queen' => 'icon-queen', 'icon-rock' => 'icon-rock', 'icon-bishop' => 'icon-bishop', 'icon-knight' => 'icon-knight', 'icon-pawn' => 'icon-pawn', 'icon-chess' => 'icon-chess', 'icon-bullhorn' => 'icon-bullhorn', 'icon-megaphone' => 'icon-megaphone', 'icon-new' => 'icon-new', 'icon-connection' => 'icon-connection', 'icon-connection2' => 'icon-connection2', 'icon-podcast' => 'icon-podcast', 'icon-radio' => 'icon-radio', 'icon-feed2' => 'icon-feed2', 'icon-connection3' => 'icon-connection3', 'icon-radio2' => 'icon-radio2', 'icon-podcast2' => 'icon-podcast2', 'icon-podcast3' => 'icon-podcast3', 'icon-mic2' => 'icon-mic2', 'icon-mic3' => 'icon-mic3', 'icon-mic4' => 'icon-mic4', 'icon-mic5' => 'icon-mic5', 'icon-mic6' => 'icon-mic6', 'icon-book2' => 'icon-book2', 'icon-book3' => 'icon-book3', 'icon-books' => 'icon-books', 'icon-reading' => 'icon-reading', 'icon-library' => 'icon-library', 'icon-library2' => 'icon-library2', 'icon-graduation' => 'icon-graduation', 'icon-file2' => 'icon-file2', 'icon-profile' => 'icon-profile', 'icon-file3' => 'icon-file3', 'icon-file4' => 'icon-file4', 'icon-file5' => 'icon-file5', 'icon-file6' => 'icon-file6', 'icon-file7' => 'icon-file7', 'icon-files' => 'icon-files', 'icon-file-plus' => 'icon-file-plus', 'icon-file-minus' => 'icon-file-minus', 'icon-file-download' => 'icon-file-download', 'icon-file-upload' => 'icon-file-upload', 'icon-file-check' => 'icon-file-check', 'icon-file-remove' => 'icon-file-remove', 'icon-file8' => 'icon-file8', 'icon-file9' => 'icon-file9', 'icon-file-plus2' => 'icon-file-plus2', 'icon-file-minus2' => 'icon-file-minus2', 'icon-file-download2' => 'icon-file-download2', 'icon-file-upload2' => 'icon-file-upload2', 'icon-file-check2' => 'icon-file-check2', 'icon-file-remove2' => 'icon-file-remove2', 'icon-file10' => 'icon-file10', 'icon-copy' => 'icon-copy', 'icon-copy2' => 'icon-copy2', 'icon-copy3' => 'icon-copy3', 'icon-copy4' => 'icon-copy4', 'icon-paste' => 'icon-paste', 'icon-paste2' => 'icon-paste2', 'icon-paste3' => 'icon-paste3', 'icon-stack' => 'icon-stack', 'icon-stack2' => 'icon-stack2', 'icon-stack3' => 'icon-stack3', 'icon-folder2' => 'icon-folder2', 'icon-folder-download' => 'icon-folder-download', 'icon-folder-upload' => 'icon-folder-upload', 'icon-folder-plus' => 'icon-folder-plus', 'icon-folder-plus2' => 'icon-folder-plus2', 'icon-folder-minus' => 'icon-folder-minus', 'icon-folder-minus2' => 'icon-folder-minus2', 'icon-folder8' => 'icon-folder8', 'icon-folder-remove' => 'icon-folder-remove', 'icon-folder3' => 'icon-folder3', 'icon-folder-open' => 'icon-folder-open', 'icon-folder4' => 'icon-folder4', 'icon-folder5' => 'icon-folder5', 'icon-folder-plus3' => 'icon-folder-plus3', 'icon-folder-minus3' => 'icon-folder-minus3', 'icon-folder-plus4' => 'icon-folder-plus4', 'icon-folder-remove2' => 'icon-folder-remove2', 'icon-folder-download2' => 'icon-folder-download2', 'icon-folder-upload2' => 'icon-folder-upload2', 'icon-folder-download3' => 'icon-folder-download3', 'icon-folder-upload3' => 'icon-folder-upload3', 'icon-folder6' => 'icon-folder6', 'icon-folder-open2' => 'icon-folder-open2', 'icon-folder7' => 'icon-folder7', 'icon-folder-open3' => 'icon-folder-open3', 'icon-certificate' => 'icon-certificate', 'icon-cc' => 'icon-cc', 'icon-tag3' => 'icon-tag3', 'icon-tag4' => 'icon-tag4', 'icon-tag5' => 'icon-tag5', 'icon-tag6' => 'icon-tag6', 'icon-tag7' => 'icon-tag7', 'icon-tag8' => 'icon-tag8', 'icon-tag9' => 'icon-tag9', 'icon-tags' => 'icon-tags', 'icon-tags2' => 'icon-tags2', 'icon-tag10' => 'icon-tag10', 'icon-barcode' => 'icon-barcode', 'icon-barcode2' => 'icon-barcode2', 'icon-qrcode' => 'icon-qrcode', 'icon-ticket' => 'icon-ticket', 'icon-cart3' => 'icon-cart3', 'icon-cart4' => 'icon-cart4', 'icon-cart5' => 'icon-cart5', 'icon-cart6' => 'icon-cart6', 'icon-cart7' => 'icon-cart7', 'icon-cart8' => 'icon-cart8', 'icon-cart9' => 'icon-cart9', 'icon-cart-plus' => 'icon-cart-plus', 'icon-cart-minus' => 'icon-cart-minus', 'icon-cart-add' => 'icon-cart-add', 'icon-cart-remove' => 'icon-cart-remove', 'icon-cart-checkout' => 'icon-cart-checkout', 'icon-cart-remove2' => 'icon-cart-remove2', 'icon-basket2' => 'icon-basket2', 'icon-basket3' => 'icon-basket3', 'icon-bag' => 'icon-bag', 'icon-bag2' => 'icon-bag2', 'icon-bag3' => 'icon-bag3', 'icon-coin' => 'icon-coin', 'icon-coins' => 'icon-coins', 'icon-credit' => 'icon-credit', 'icon-credit2' => 'icon-credit2', 'icon-calculate' => 'icon-calculate', 'icon-calculate2' => 'icon-calculate2', 'icon-support' => 'icon-support', 'icon-phone2' => 'icon-phone2', 'icon-phone3' => 'icon-phone3', 'icon-phone4' => 'icon-phone4', 'icon-phone5' => 'icon-phone5', 'icon-contact-add' => 'icon-contact-add', 'icon-contact-remove' => 'icon-contact-remove', 'icon-contact-add2' => 'icon-contact-add2', 'icon-contact-remove2' => 'icon-contact-remove2', 'icon-call-incoming' => 'icon-call-incoming', 'icon-call-outgoing' => 'icon-call-outgoing', 'icon-phone6' => 'icon-phone6', 'icon-phone7' => 'icon-phone7', 'icon-phone-hang-up' => 'icon-phone-hang-up', 'icon-phone-hang-up2' => 'icon-phone-hang-up2', 'icon-address-book' => 'icon-address-book', 'icon-address-book2' => 'icon-address-book2', 'icon-notebook' => 'icon-notebook', 'icon-envelop' => 'icon-envelop', 'icon-envelop2' => 'icon-envelop2', 'icon-mail-send' => 'icon-mail-send', 'icon-envelop-opened' => 'icon-envelop-opened', 'icon-envelop3' => 'icon-envelop3', 'icon-pushpin' => 'icon-pushpin', 'icon-location3' => 'icon-location3', 'icon-location4' => 'icon-location4', 'icon-location5' => 'icon-location5', 'icon-location6' => 'icon-location6', 'icon-location7' => 'icon-location7', 'icon-location8' => 'icon-location8', 'icon-location9' => 'icon-location9', 'icon-compass5' => 'icon-compass5', 'icon-compass6' => 'icon-compass6', 'icon-map' => 'icon-map', 'icon-map2' => 'icon-map2', 'icon-map3' => 'icon-map3', 'icon-map4' => 'icon-map4', 'icon-direction' => 'icon-direction', 'icon-history' => 'icon-history', 'icon-history2' => 'icon-history2', 'icon-clock4' => 'icon-clock4', 'icon-clock5' => 'icon-clock5', 'icon-clock6' => 'icon-clock6', 'icon-clock7' => 'icon-clock7', 'icon-watch' => 'icon-watch', 'icon-clock8' => 'icon-clock8', 'icon-clock9' => 'icon-clock9', 'icon-clock10' => 'icon-clock10', 'icon-alarm2' => 'icon-alarm2', 'icon-alarm3' => 'icon-alarm3', 'icon-bell' => 'icon-bell', 'icon-bell2' => 'icon-bell2', 'icon-alarm-plus' => 'icon-alarm-plus', 'icon-alarm-minus' => 'icon-alarm-minus', 'icon-alarm-check' => 'icon-alarm-check', 'icon-alarm-cancel' => 'icon-alarm-cancel', 'icon-stopwatch' => 'icon-stopwatch', 'icon-calendar4' => 'icon-calendar4', 'icon-calendar5' => 'icon-calendar5', 'icon-calendar6' => 'icon-calendar6', 'icon-calendar7' => 'icon-calendar7', 'icon-calendar8' => 'icon-calendar8', 'icon-print' => 'icon-print', 'icon-print2' => 'icon-print2', 'icon-print3' => 'icon-print3', 'icon-mouse2' => 'icon-mouse2', 'icon-mouse3' => 'icon-mouse3', 'icon-mouse4' => 'icon-mouse4', 'icon-mouse5' => 'icon-mouse5', 'icon-keyboard2' => 'icon-keyboard2', 'icon-keyboard3' => 'icon-keyboard3', 'icon-screen' => 'icon-screen', 'icon-screen2' => 'icon-screen2', 'icon-screen3' => 'icon-screen3', 'icon-screen4' => 'icon-screen4', 'icon-laptop' => 'icon-laptop', 'icon-mobile3' => 'icon-mobile3', 'icon-mobile4' => 'icon-mobile4', 'icon-tablet' => 'icon-tablet', 'icon-mobile5' => 'icon-mobile5', 'icon-tv' => 'icon-tv', 'icon-cabinet' => 'icon-cabinet', 'icon-archive2' => 'icon-archive2', 'icon-drawer' => 'icon-drawer', 'icon-drawer2' => 'icon-drawer2', 'icon-drawer3' => 'icon-drawer3', 'icon-box2' => 'icon-box2', 'icon-box-add' => 'icon-box-add', 'icon-box-remove' => 'icon-box-remove', 'icon-download2' => 'icon-download2', 'icon-upload2' => 'icon-upload2', 'icon-disk2' => 'icon-disk2', 'icon-cd2' => 'icon-cd2', 'icon-storage' => 'icon-storage', 'icon-storage2' => 'icon-storage2', 'icon-database2' => 'icon-database2', 'icon-database3' => 'icon-database3', 'icon-database4' => 'icon-database4', 'icon-undo2' => 'icon-undo2', 'icon-redo' => 'icon-redo', 'icon-rotate' => 'icon-rotate', 'icon-rotate2' => 'icon-rotate2', 'icon-flip' => 'icon-flip', 'icon-flip2' => 'icon-flip2', 'icon-unite' => 'icon-unite', 'icon-subtract' => 'icon-subtract', 'icon-interset' => 'icon-interset', 'icon-exclude' => 'icon-exclude', 'icon-align-left' => 'icon-align-left', 'icon-align-center-horizontal' => 'icon-align-center-horizontal', 'icon-align-right' => 'icon-align-right', 'icon-align-top' => 'icon-align-top', 'icon-align-center-vertical' => 'icon-align-center-vertical', 'icon-align-bottom' => 'icon-align-bottom', 'icon-undo3' => 'icon-undo3', 'icon-redo2' => 'icon-redo2', 'icon-forward2' => 'icon-forward2', 'icon-reply2' => 'icon-reply2', 'icon-reply3' => 'icon-reply3', 'icon-bubble' => 'icon-bubble', 'icon-bubbles' => 'icon-bubbles', 'icon-bubbles2' => 'icon-bubbles2', 'icon-bubble2' => 'icon-bubble2', 'icon-bubbles3' => 'icon-bubbles3', 'icon-bubbles4' => 'icon-bubbles4', 'icon-bubble-notification' => 'icon-bubble-notification', 'icon-bubbles5' => 'icon-bubbles5', 'icon-bubbles6' => 'icon-bubbles6', 'icon-bubble3' => 'icon-bubble3', 'icon-bubble-dots' => 'icon-bubble-dots', 'icon-bubble4' => 'icon-bubble4', 'icon-bubble5' => 'icon-bubble5', 'icon-bubble-dots2' => 'icon-bubble-dots2', 'icon-bubble6' => 'icon-bubble6', 'icon-bubble7' => 'icon-bubble7', 'icon-bubble8' => 'icon-bubble8', 'icon-bubbles7' => 'icon-bubbles7', 'icon-bubble9' => 'icon-bubble9', 'icon-bubbles8' => 'icon-bubbles8', 'icon-bubble10' => 'icon-bubble10', 'icon-bubble-dots3' => 'icon-bubble-dots3', 'icon-bubble11' => 'icon-bubble11', 'icon-bubble12' => 'icon-bubble12', 'icon-bubble-dots4' => 'icon-bubble-dots4', 'icon-bubble13' => 'icon-bubble13', 'icon-bubbles9' => 'icon-bubbles9', 'icon-bubbles10' => 'icon-bubbles10', 'icon-bubble-blocked' => 'icon-bubble-blocked', 'icon-bubble-quote' => 'icon-bubble-quote', 'icon-bubble-user' => 'icon-bubble-user', 'icon-bubble-check' => 'icon-bubble-check', 'icon-bubble-video-chat' => 'icon-bubble-video-chat', 'icon-bubble-link' => 'icon-bubble-link', 'icon-bubble-locked' => 'icon-bubble-locked', 'icon-bubble-star' => 'icon-bubble-star', 'icon-bubble-heart' => 'icon-bubble-heart', 'icon-bubble-paperclip' => 'icon-bubble-paperclip', 'icon-bubble-cancel' => 'icon-bubble-cancel', 'icon-bubble-plus' => 'icon-bubble-plus', 'icon-bubble-minus' => 'icon-bubble-minus', 'icon-bubble-notification2' => 'icon-bubble-notification2', 'icon-bubble-trash' => 'icon-bubble-trash', 'icon-bubble-left' => 'icon-bubble-left', 'icon-bubble-right' => 'icon-bubble-right', 'icon-bubble-up' => 'icon-bubble-up', 'icon-bubble-down' => 'icon-bubble-down', 'icon-bubble-first' => 'icon-bubble-first', 'icon-bubble-last' => 'icon-bubble-last', 'icon-bubble-replu' => 'icon-bubble-replu', 'icon-bubble-forward' => 'icon-bubble-forward', 'icon-bubble-reply' => 'icon-bubble-reply', 'icon-bubble-forward2' => 'icon-bubble-forward2', 'icon-user4' => 'icon-user4', 'icon-users2' => 'icon-users2', 'icon-user-plus' => 'icon-user-plus', 'icon-user-plus2' => 'icon-user-plus2', 'icon-user-minus' => 'icon-user-minus', 'icon-user-minus2' => 'icon-user-minus2', 'icon-user-cancel' => 'icon-user-cancel', 'icon-user-block' => 'icon-user-block', 'icon-users3' => 'icon-users3', 'icon-user5' => 'icon-user5', 'icon-users4' => 'icon-users4', 'icon-user-plus3' => 'icon-user-plus3', 'icon-user-minus3' => 'icon-user-minus3', 'icon-user-cancel2' => 'icon-user-cancel2', 'icon-user-block2' => 'icon-user-block2', 'icon-user6' => 'icon-user6', 'icon-user7' => 'icon-user7', 'icon-user8' => 'icon-user8', 'icon-user9' => 'icon-user9', 'icon-users5' => 'icon-users5', 'icon-user10' => 'icon-user10', 'icon-user11' => 'icon-user11', 'icon-users6' => 'icon-users6', 'icon-vcard' => 'icon-vcard', 'icon-tshirt' => 'icon-tshirt', 'icon-hanger' => 'icon-hanger', 'icon-quotes-left' => 'icon-quotes-left', 'icon-quotes-right' => 'icon-quotes-right', 'icon-quotes-right2' => 'icon-quotes-right2', 'icon-quotes-right3' => 'icon-quotes-right3', 'icon-busy' => 'icon-busy', 'icon-busy2' => 'icon-busy2', 'icon-busy3' => 'icon-busy3', 'icon-busy4' => 'icon-busy4', 'icon-spinner' => 'icon-spinner', 'icon-spinner2' => 'icon-spinner2', 'icon-spinner3' => 'icon-spinner3', 'icon-spinner4' => 'icon-spinner4', 'icon-spinner5' => 'icon-spinner5', 'icon-spinner6' => 'icon-spinner6', 'icon-spinner7' => 'icon-spinner7', 'icon-spinner8' => 'icon-spinner8', 'icon-spinner9' => 'icon-spinner9', 'icon-spinner10' => 'icon-spinner10', 'icon-spinner11' => 'icon-spinner11', 'icon-spinner12' => 'icon-spinner12', 'icon-microscope' => 'icon-microscope', 'icon-binoculars' => 'icon-binoculars', 'icon-binoculars2' => 'icon-binoculars2', 'icon-search3' => 'icon-search3', 'icon-search4' => 'icon-search4', 'icon-zoomin2' => 'icon-zoomin2', 'icon-zoomout2' => 'icon-zoomout2', 'icon-search5' => 'icon-search5', 'icon-search6' => 'icon-search6', 'icon-zoomin3' => 'icon-zoomin3', 'icon-zoomout3' => 'icon-zoomout3', 'icon-search7' => 'icon-search7', 'icon-expand' => 'icon-expand', 'icon-contract' => 'icon-contract', 'icon-scale-up' => 'icon-scale-up', 'icon-scale-down' => 'icon-scale-down', 'icon-expand2' => 'icon-expand2', 'icon-contract2' => 'icon-contract2', 'icon-scale-up2' => 'icon-scale-up2', 'icon-scale-down2' => 'icon-scale-down2', 'icon-fullscreen2' => 'icon-fullscreen2', 'icon-expand3' => 'icon-expand3', 'icon-contract3' => 'icon-contract3', 'icon-key2' => 'icon-key2', 'icon-key3' => 'icon-key3', 'icon-key4' => 'icon-key4', 'icon-key5' => 'icon-key5', 'icon-key6' => 'icon-key6', 'icon-keyhole' => 'icon-keyhole', 'icon-lock' => 'icon-lock', 'icon-lock2' => 'icon-lock2', 'icon-lock3' => 'icon-lock3', 'icon-lock4' => 'icon-lock4', 'icon-unlocked' => 'icon-unlocked', 'icon-lock5' => 'icon-lock5', 'icon-unlocked2' => 'icon-unlocked2', 'icon-wrench3' => 'icon-wrench3', 'icon-wrench4' => 'icon-wrench4', 'icon-wrench5' => 'icon-wrench5', 'icon-wrench6' => 'icon-wrench6', 'icon-settings' => 'icon-settings', 'icon-equalizer2' => 'icon-equalizer2', 'icon-equalizer3' => 'icon-equalizer3', 'icon-equalizer4' => 'icon-equalizer4', 'icon-cog3' => 'icon-cog3', 'icon-cogs' => 'icon-cogs', 'icon-cog4' => 'icon-cog4', 'icon-cog5' => 'icon-cog5', 'icon-cog6' => 'icon-cog6', 'icon-cog7' => 'icon-cog7', 'icon-cog8' => 'icon-cog8', 'icon-cog9' => 'icon-cog9', 'icon-factory' => 'icon-factory', 'icon-hammer' => 'icon-hammer', 'icon-tools' => 'icon-tools', 'icon-screwdriver' => 'icon-screwdriver', 'icon-screwdriver2' => 'icon-screwdriver2', 'icon-wand2' => 'icon-wand2', 'icon-wand3' => 'icon-wand3', 'icon-health' => 'icon-health', 'icon-aid' => 'icon-aid', 'icon-patch' => 'icon-patch', 'icon-bug2' => 'icon-bug2', 'icon-bug3' => 'icon-bug3', 'icon-inject' => 'icon-inject', 'icon-inject2' => 'icon-inject2', 'icon-construction' => 'icon-construction', 'icon-cone2' => 'icon-cone2', 'icon-pie' => 'icon-pie', 'icon-pie2' => 'icon-pie2', 'icon-pie3' => 'icon-pie3', 'icon-pie4' => 'icon-pie4', 'icon-pie5' => 'icon-pie5', 'icon-pie6' => 'icon-pie6', 'icon-pie7' => 'icon-pie7', 'icon-stats2' => 'icon-stats2', 'icon-stats3' => 'icon-stats3', 'icon-stats4' => 'icon-stats4', 'icon-bars2' => 'icon-bars2', 'icon-bars3' => 'icon-bars3', 'icon-bars4' => 'icon-bars4', 'icon-bars5' => 'icon-bars5', 'icon-bars6' => 'icon-bars6', 'icon-bars7' => 'icon-bars7', 'icon-stats-up' => 'icon-stats-up', 'icon-stats-down' => 'icon-stats-down', 'icon-stairs-down' => 'icon-stairs-down', 'icon-stairs-down2' => 'icon-stairs-down2', 'icon-chart3' => 'icon-chart3', 'icon-stairs' => 'icon-stairs', 'icon-stairs2' => 'icon-stairs2', 'icon-ladder' => 'icon-ladder', 'icon-cake' => 'icon-cake', 'icon-gift2' => 'icon-gift2', 'icon-gift3' => 'icon-gift3', 'icon-balloon' => 'icon-balloon', 'icon-rating' => 'icon-rating', 'icon-rating2' => 'icon-rating2', 'icon-rating3' => 'icon-rating3', 'icon-podium' => 'icon-podium', 'icon-medal' => 'icon-medal', 'icon-medal2' => 'icon-medal2', 'icon-medal3' => 'icon-medal3', 'icon-medal4' => 'icon-medal4', 'icon-medal5' => 'icon-medal5', 'icon-crown' => 'icon-crown', 'icon-trophy2' => 'icon-trophy2', 'icon-trophy3' => 'icon-trophy3', 'icon-trophy-star' => 'icon-trophy-star', 'icon-diamond' => 'icon-diamond', 'icon-diamond2' => 'icon-diamond2', 'icon-glass' => 'icon-glass', 'icon-glass2' => 'icon-glass2', 'icon-bottle' => 'icon-bottle', 'icon-bottle2' => 'icon-bottle2', 'icon-mug' => 'icon-mug', 'icon-food' => 'icon-food', 'icon-food2' => 'icon-food2', 'icon-hamburger' => 'icon-hamburger', 'icon-cup' => 'icon-cup', 'icon-cup2' => 'icon-cup2', 'icon-leaf' => 'icon-leaf', 'icon-leaf2' => 'icon-leaf2', 'icon-apple-fruit' => 'icon-apple-fruit', 'icon-tree' => 'icon-tree', 'icon-tree2' => 'icon-tree2', 'icon-paw' => 'icon-paw', 'icon-steps' => 'icon-steps', 'icon-flower' => 'icon-flower', 'icon-rocket' => 'icon-rocket', 'icon-meter' => 'icon-meter', 'icon-meter2' => 'icon-meter2', 'icon-meter-slow' => 'icon-meter-slow', 'icon-meter-medium' => 'icon-meter-medium', 'icon-meter-fast' => 'icon-meter-fast', 'icon-dashboard' => 'icon-dashboard', 'icon-hammer2' => 'icon-hammer2', 'icon-balance' => 'icon-balance', 'icon-bomb' => 'icon-bomb', 'icon-fire' => 'icon-fire', 'icon-fire2' => 'icon-fire2', 'icon-lab' => 'icon-lab', 'icon-atom2' => 'icon-atom2', 'icon-atom3' => 'icon-atom3', 'icon-magnet' => 'icon-magnet', 'icon-magnet2' => 'icon-magnet2', 'icon-magnet3' => 'icon-magnet3', 'icon-magnet4' => 'icon-magnet4', 'icon-dumbbell' => 'icon-dumbbell', 'icon-skull' => 'icon-skull', 'icon-skull2' => 'icon-skull2', 'icon-skull3' => 'icon-skull3', 'icon-lamp2' => 'icon-lamp2', 'icon-lamp3' => 'icon-lamp3', 'icon-lamp4' => 'icon-lamp4', 'icon-lamp5' => 'icon-lamp5', 'icon-remove' => 'icon-remove', 'icon-remove2' => 'icon-remove2', 'icon-remove3' => 'icon-remove3', 'icon-remove4' => 'icon-remove4', 'icon-remove5' => 'icon-remove5', 'icon-remove6' => 'icon-remove6', 'icon-remove7' => 'icon-remove7', 'icon-remove8' => 'icon-remove8', 'icon-briefcase3' => 'icon-briefcase3', 'icon-briefcase4' => 'icon-briefcase4', 'icon-briefcase5' => 'icon-briefcase5', 'icon-airplane' => 'icon-airplane', 'icon-airplane2' => 'icon-airplane2', 'icon-paperplane' => 'icon-paperplane', 'icon-car' => 'icon-car', 'icon-gas-pump' => 'icon-gas-pump', 'icon-bus' => 'icon-bus', 'icon-truck' => 'icon-truck', 'icon-bike' => 'icon-bike', 'icon-road' => 'icon-road', 'icon-train' => 'icon-train', 'icon-ship' => 'icon-ship', 'icon-boat' => 'icon-boat', 'icon-cube' => 'icon-cube', 'icon-cube2' => 'icon-cube2', 'icon-cube3' => 'icon-cube3', 'icon-cube4' => 'icon-cube4', 'icon-pyramid' => 'icon-pyramid', 'icon-pyramid2' => 'icon-pyramid2', 'icon-cylinder' => 'icon-cylinder', 'icon-package' => 'icon-package', 'icon-puzzle' => 'icon-puzzle', 'icon-puzzle2' => 'icon-puzzle2', 'icon-puzzle3' => 'icon-puzzle3', 'icon-puzzle4' => 'icon-puzzle4', 'icon-glasses' => 'icon-glasses', 'icon-glasses2' => 'icon-glasses2', 'icon-glasses3' => 'icon-glasses3', 'icon-sunglasses' => 'icon-sunglasses', 'icon-accessibility' => 'icon-accessibility', 'icon-accessibility2' => 'icon-accessibility2', 'icon-brain' => 'icon-brain', 'icon-target5' => 'icon-target5', 'icon-target6' => 'icon-target6', 'icon-target7' => 'icon-target7', 'icon-gun' => 'icon-gun', 'icon-gun-ban' => 'icon-gun-ban', 'icon-shield' => 'icon-shield', 'icon-shield2' => 'icon-shield2', 'icon-shield3' => 'icon-shield3', 'icon-shield4' => 'icon-shield4', 'icon-soccer' => 'icon-soccer', 'icon-football' => 'icon-football', 'icon-baseball' => 'icon-baseball', 'icon-basketball' => 'icon-basketball', 'icon-golf' => 'icon-golf', 'icon-hockey' => 'icon-hockey', 'icon-racing' => 'icon-racing', 'icon-eightball' => 'icon-eightball', 'icon-bowlingball' => 'icon-bowlingball', 'icon-bowling' => 'icon-bowling', 'icon-bowling2' => 'icon-bowling2', 'icon-lightning6' => 'icon-lightning6', 'icon-power' => 'icon-power', 'icon-power2' => 'icon-power2', 'icon-switch2' => 'icon-switch2', 'icon-powercord' => 'icon-powercord', 'icon-cord' => 'icon-cord', 'icon-socket' => 'icon-socket', 'icon-clipboard' => 'icon-clipboard', 'icon-clipboard2' => 'icon-clipboard2', 'icon-signup' => 'icon-signup', 'icon-clipboard3' => 'icon-clipboard3', 'icon-clipboard4' => 'icon-clipboard4', 'icon-list4' => 'icon-list4', 'icon-list5' => 'icon-list5', 'icon-list6' => 'icon-list6', 'icon-numbered-list' => 'icon-numbered-list', 'icon-list7' => 'icon-list7', 'icon-list8' => 'icon-list8', 'icon-playlist' => 'icon-playlist', 'icon-grid3' => 'icon-grid3', 'icon-grid4' => 'icon-grid4', 'icon-grid5' => 'icon-grid5', 'icon-grid6' => 'icon-grid6', 'icon-grid7' => 'icon-grid7', 'icon-grid8' => 'icon-grid8', 'icon-tree3' => 'icon-tree3', 'icon-tree4' => 'icon-tree4', 'icon-tree5' => 'icon-tree5', 'icon-menu' => 'icon-menu', 'icon-menu2' => 'icon-menu2', 'icon-circle-small' => 'icon-circle-small', 'icon-menu3' => 'icon-menu3', 'icon-menu4' => 'icon-menu4', 'icon-menu5' => 'icon-menu5', 'icon-menu6' => 'icon-menu6', 'icon-menu7' => 'icon-menu7', 'icon-menu8' => 'icon-menu8', 'icon-menu9' => 'icon-menu9', 'icon-cloud9' => 'icon-cloud9', 'icon-cloud10' => 'icon-cloud10', 'icon-cloud11' => 'icon-cloud11', 'icon-cloud-download2' => 'icon-cloud-download2', 'icon-cloud-upload2' => 'icon-cloud-upload2', 'icon-download3' => 'icon-download3', 'icon-upload3' => 'icon-upload3', 'icon-download4' => 'icon-download4', 'icon-upload4' => 'icon-upload4', 'icon-download5' => 'icon-download5', 'icon-upload5' => 'icon-upload5', 'icon-download6' => 'icon-download6', 'icon-upload6' => 'icon-upload6', 'icon-download7' => 'icon-download7', 'icon-upload7' => 'icon-upload7', 'icon-download8' => 'icon-download8', 'icon-upload8' => 'icon-upload8', 'icon-globe' => 'icon-globe', 'icon-globe2' => 'icon-globe2', 'icon-globe3' => 'icon-globe3', 'icon-earth3' => 'icon-earth3', 'icon-network' => 'icon-network', 'icon-link2' => 'icon-link2', 'icon-link3' => 'icon-link3', 'icon-link4' => 'icon-link4', 'icon-link22' => 'icon-link22', 'icon-link5' => 'icon-link5', 'icon-link6' => 'icon-link6', 'icon-link7' => 'icon-link7', 'icon-anchor' => 'icon-anchor', 'icon-flag2' => 'icon-flag2', 'icon-flag3' => 'icon-flag3', 'icon-flag4' => 'icon-flag4', 'icon-flag5' => 'icon-flag5', 'icon-flag6' => 'icon-flag6', 'icon-flag7' => 'icon-flag7', 'icon-attachment' => 'icon-attachment', 'icon-attachment2' => 'icon-attachment2', 'icon-eye3' => 'icon-eye3', 'icon-eye-blocked' => 'icon-eye-blocked', 'icon-eye4' => 'icon-eye4', 'icon-eye5' => 'icon-eye5', 'icon-eye-blocked2' => 'icon-eye-blocked2', 'icon-eye6' => 'icon-eye6', 'icon-eye7' => 'icon-eye7', 'icon-eye8' => 'icon-eye8', 'icon-eye9' => 'icon-eye9', 'icon-eye10' => 'icon-eye10', 'icon-bookmark3' => 'icon-bookmark3', 'icon-bookmark4' => 'icon-bookmark4', 'icon-bookmarks' => 'icon-bookmarks', 'icon-bookmark5' => 'icon-bookmark5', 'icon-spotlight' => 'icon-spotlight', 'icon-starburst' => 'icon-starburst', 'icon-snowflake2' => 'icon-snowflake2', 'icon-temperature' => 'icon-temperature', 'icon-temperature2' => 'icon-temperature2', 'icon-weather-lightning' => 'icon-weather-lightning', 'icon-weather-rain' => 'icon-weather-rain', 'icon-weather-snow' => 'icon-weather-snow', 'icon-windy6' => 'icon-windy6', 'icon-fan' => 'icon-fan', 'icon-umbrella2' => 'icon-umbrella2', 'icon-sun4' => 'icon-sun4', 'icon-sun5' => 'icon-sun5', 'icon-brightness-high' => 'icon-brightness-high', 'icon-brightness-medium' => 'icon-brightness-medium', 'icon-brightness-low' => 'icon-brightness-low', 'icon-brightness-contrast' => 'icon-brightness-contrast', 'icon-contrast3' => 'icon-contrast3', 'icon-moon3' => 'icon-moon3', 'icon-bed' => 'icon-bed', 'icon-bed2' => 'icon-bed2', 'icon-star4' => 'icon-star4', 'icon-star5' => 'icon-star5', 'icon-star6' => 'icon-star6', 'icon-star7' => 'icon-star7', 'icon-star8' => 'icon-star8', 'icon-star9' => 'icon-star9', 'icon-heart3' => 'icon-heart3', 'icon-heart4' => 'icon-heart4', 'icon-heart5' => 'icon-heart5', 'icon-heart6' => 'icon-heart6', 'icon-heart-broken' => 'icon-heart-broken', 'icon-heart7' => 'icon-heart7', 'icon-heart8' => 'icon-heart8', 'icon-heart-broken2' => 'icon-heart-broken2', 'icon-heart9' => 'icon-heart9', 'icon-heart10' => 'icon-heart10', 'icon-heart-broken3' => 'icon-heart-broken3', 'icon-lips' => 'icon-lips', 'icon-lips2' => 'icon-lips2', 'icon-thumbs-up' => 'icon-thumbs-up', 'icon-thumbs-up2' => 'icon-thumbs-up2', 'icon-thumbs-down' => 'icon-thumbs-down', 'icon-thumbs-down2' => 'icon-thumbs-down2', 'icon-thumbs-up3' => 'icon-thumbs-up3', 'icon-thumbs-up4' => 'icon-thumbs-up4', 'icon-thumbs-up5' => 'icon-thumbs-up5', 'icon-thumbs-up6' => 'icon-thumbs-up6', 'icon-people' => 'icon-people', 'icon-man' => 'icon-man', 'icon-male' => 'icon-male', 'icon-woman' => 'icon-woman', 'icon-female' => 'icon-female', 'icon-peace' => 'icon-peace', 'icon-yin-yang' => 'icon-yin-yang', 'icon-happy' => 'icon-happy', 'icon-happy2' => 'icon-happy2', 'icon-smiley2' => 'icon-smiley2', 'icon-smiley3' => 'icon-smiley3', 'icon-tongue' => 'icon-tongue', 'icon-tongue2' => 'icon-tongue2', 'icon-sad' => 'icon-sad', 'icon-sad2' => 'icon-sad2', 'icon-wink' => 'icon-wink', 'icon-wink2' => 'icon-wink2', 'icon-grin' => 'icon-grin', 'icon-grin2' => 'icon-grin2', 'icon-cool' => 'icon-cool', 'icon-cool2' => 'icon-cool2', 'icon-angry' => 'icon-angry', 'icon-angry2' => 'icon-angry2', 'icon-evil' => 'icon-evil', 'icon-evil2' => 'icon-evil2', 'icon-shocked' => 'icon-shocked', 'icon-shocked2' => 'icon-shocked2', 'icon-confused' => 'icon-confused', 'icon-confused2' => 'icon-confused2', 'icon-neutral' => 'icon-neutral', 'icon-neutral2' => 'icon-neutral2', 'icon-wondering' => 'icon-wondering', 'icon-wondering2' => 'icon-wondering2', 'icon-cursor2' => 'icon-cursor2', 'icon-cursor3' => 'icon-cursor3', 'icon-point-up' => 'icon-point-up', 'icon-point-right' => 'icon-point-right', 'icon-point-down' => 'icon-point-down', 'icon-point-left' => 'icon-point-left', 'icon-pointer2' => 'icon-pointer2', 'icon-hand' => 'icon-hand', 'icon-stack-empty' => 'icon-stack-empty', 'icon-stack-plus' => 'icon-stack-plus', 'icon-stack-minus' => 'icon-stack-minus', 'icon-stack-star' => 'icon-stack-star', 'icon-stack-picture' => 'icon-stack-picture', 'icon-stack-down' => 'icon-stack-down', 'icon-stack-up' => 'icon-stack-up', 'icon-stack-cancel' => 'icon-stack-cancel', 'icon-stack-checkmark' => 'icon-stack-checkmark', 'icon-stack-list' => 'icon-stack-list', 'icon-stack-clubs' => 'icon-stack-clubs', 'icon-stack-spades' => 'icon-stack-spades', 'icon-stack-hearts' => 'icon-stack-hearts', 'icon-stack-diamonds' => 'icon-stack-diamonds', 'icon-stack-user' => 'icon-stack-user', 'icon-stack4' => 'icon-stack4', 'icon-stack-music' => 'icon-stack-music', 'icon-stack-play' => 'icon-stack-play', 'icon-move3' => 'icon-move3', 'icon-resize' => 'icon-resize', 'icon-resize2' => 'icon-resize2', 'icon-warning2' => 'icon-warning2', 'icon-warning3' => 'icon-warning3', 'icon-notification' => 'icon-notification', 'icon-notification2' => 'icon-notification2', 'icon-question2' => 'icon-question2', 'icon-question3' => 'icon-question3', 'icon-question4' => 'icon-question4', 'icon-question5' => 'icon-question5', 'icon-question6' => 'icon-question6', 'icon-plus-circle' => 'icon-plus-circle', 'icon-plus-circle2' => 'icon-plus-circle2', 'icon-minus-circle' => 'icon-minus-circle', 'icon-minus-circle2' => 'icon-minus-circle2', 'icon-info3' => 'icon-info3', 'icon-info4' => 'icon-info4', 'icon-blocked2' => 'icon-blocked2', 'icon-cancel-circle' => 'icon-cancel-circle', 'icon-cancel-circle2' => 'icon-cancel-circle2', 'icon-checkmark-circle' => 'icon-checkmark-circle', 'icon-checkmark-circle2' => 'icon-checkmark-circle2', 'icon-cancel3' => 'icon-cancel3', 'icon-spam' => 'icon-spam', 'icon-close' => 'icon-close', 'icon-close2' => 'icon-close2', 'icon-close3' => 'icon-close3', 'icon-close4' => 'icon-close4', 'icon-close5' => 'icon-close5', 'icon-checkmark3' => 'icon-checkmark3', 'icon-checkmark4' => 'icon-checkmark4', 'icon-checkmark5' => 'icon-checkmark5', 'icon-checkmark6' => 'icon-checkmark6', 'icon-spell-check' => 'icon-spell-check', 'icon-minus4' => 'icon-minus4', 'icon-plus4' => 'icon-plus4', 'icon-minus5' => 'icon-minus5', 'icon-plus5' => 'icon-plus5', 'icon-enter' => 'icon-enter', 'icon-exit' => 'icon-exit', 'icon-enter2' => 'icon-enter2', 'icon-exit2' => 'icon-exit2', 'icon-enter3' => 'icon-enter3', 'icon-exit3' => 'icon-exit3', 'icon-exit4' => 'icon-exit4', 'icon-play5' => 'icon-play5', 'icon-pause3' => 'icon-pause3', 'icon-stop3' => 'icon-stop3', 'icon-backward' => 'icon-backward', 'icon-forward3' => 'icon-forward3', 'icon-play6' => 'icon-play6', 'icon-pause4' => 'icon-pause4', 'icon-stop4' => 'icon-stop4', 'icon-backward2' => 'icon-backward2', 'icon-forward4' => 'icon-forward4', 'icon-first2' => 'icon-first2', 'icon-last2' => 'icon-last2', 'icon-previous' => 'icon-previous', 'icon-next' => 'icon-next', 'icon-eject2' => 'icon-eject2', 'icon-volume-high' => 'icon-volume-high', 'icon-volume-medium' => 'icon-volume-medium', 'icon-volume-low' => 'icon-volume-low', 'icon-volume-mute2' => 'icon-volume-mute2', 'icon-volume-mute3' => 'icon-volume-mute3', 'icon-volume-increase' => 'icon-volume-increase', 'icon-volume-decrease' => 'icon-volume-decrease', 'icon-volume-high2' => 'icon-volume-high2', 'icon-volume-medium2' => 'icon-volume-medium2', 'icon-volume-low2' => 'icon-volume-low2', 'icon-volume-mute4' => 'icon-volume-mute4', 'icon-volume-mute5' => 'icon-volume-mute5', 'icon-volume-increase2' => 'icon-volume-increase2', 'icon-volume-decrease2' => 'icon-volume-decrease2', 'icon-volume5' => 'icon-volume5', 'icon-volume4' => 'icon-volume4', 'icon-volume32' => 'icon-volume32', 'icon-volume22' => 'icon-volume22', 'icon-volume1' => 'icon-volume1', 'icon-volume0' => 'icon-volume0', 'icon-volume-mute6' => 'icon-volume-mute6', 'icon-volume-mute7' => 'icon-volume-mute7', 'icon-loop2' => 'icon-loop2', 'icon-loop3' => 'icon-loop3', 'icon-loop4' => 'icon-loop4', 'icon-loop5' => 'icon-loop5', 'icon-loop6' => 'icon-loop6', 'icon-shuffle' => 'icon-shuffle', 'icon-shuffle2' => 'icon-shuffle2', 'icon-wave' => 'icon-wave', 'icon-wave2' => 'icon-wave2', 'icon-arrow-first' => 'icon-arrow-first', 'icon-arrow-right2' => 'icon-arrow-right2', 'icon-arrow-up2' => 'icon-arrow-up2', 'icon-arrow-right3' => 'icon-arrow-right3', 'icon-arrow-down2' => 'icon-arrow-down2', 'icon-arrow-left2' => 'icon-arrow-left2', 'icon-arrow-up3' => 'icon-arrow-up3', 'icon-arrow-right4' => 'icon-arrow-right4', 'icon-arrow-down3' => 'icon-arrow-down3', 'icon-arrow-left3' => 'icon-arrow-left3', 'icon-arrow-up-left' => 'icon-arrow-up-left', 'icon-arrow-up4' => 'icon-arrow-up4', 'icon-arrow-up-right' => 'icon-arrow-up-right', 'icon-arrow-right5' => 'icon-arrow-right5', 'icon-arrow-down-right' => 'icon-arrow-down-right', 'icon-arrow-down4' => 'icon-arrow-down4', 'icon-arrow-down-left' => 'icon-arrow-down-left', 'icon-arrow-left4' => 'icon-arrow-left4', 'icon-arrow-up-left2' => 'icon-arrow-up-left2', 'icon-arrow-up5' => 'icon-arrow-up5', 'icon-arrow-up-right2' => 'icon-arrow-up-right2', 'icon-arrow-right6' => 'icon-arrow-right6', 'icon-arrow-down-right2' => 'icon-arrow-down-right2', 'icon-arrow-down5' => 'icon-arrow-down5', 'icon-arrow-down-left2' => 'icon-arrow-down-left2', 'icon-arrow-left5' => 'icon-arrow-left5', 'icon-arrow-up-left3' => 'icon-arrow-up-left3', 'icon-arrow-up6' => 'icon-arrow-up6', 'icon-arrow-up-right3' => 'icon-arrow-up-right3', 'icon-arrow-right7' => 'icon-arrow-right7', 'icon-arrow-down-right3' => 'icon-arrow-down-right3', 'icon-arrow-down6' => 'icon-arrow-down6', 'icon-arrow-down-left3' => 'icon-arrow-down-left3', 'icon-arrow-left6' => 'icon-arrow-left6', 'icon-arrow-up-left4' => 'icon-arrow-up-left4', 'icon-arrow-up7' => 'icon-arrow-up7', 'icon-arrow-up-right4' => 'icon-arrow-up-right4', 'icon-arrow-right8' => 'icon-arrow-right8', 'icon-arrow-down-right4' => 'icon-arrow-down-right4', 'icon-arrow-down7' => 'icon-arrow-down7', 'icon-arrow-down-left4' => 'icon-arrow-down-left4', 'icon-arrow-left7' => 'icon-arrow-left7', 'icon-arrow' => 'icon-arrow', 'icon-arrow2' => 'icon-arrow2', 'icon-arrow3' => 'icon-arrow3', 'icon-arrow4' => 'icon-arrow4', 'icon-arrow5' => 'icon-arrow5', 'icon-arrow6' => 'icon-arrow6', 'icon-arrow7' => 'icon-arrow7', 'icon-arrow8' => 'icon-arrow8', 'icon-arrow-up-left5' => 'icon-arrow-up-left5', 'icon-arrowsquare' => 'icon-arrowsquare', 'icon-arrow-up-right5' => 'icon-arrow-up-right5', 'icon-arrow-right9' => 'icon-arrow-right9', 'icon-arrow-down-right5' => 'icon-arrow-down-right5', 'icon-arrow-down8' => 'icon-arrow-down8', 'icon-arrow-down-left5' => 'icon-arrow-down-left5', 'icon-arrow-left8' => 'icon-arrow-left8', 'icon-arrow-up8' => 'icon-arrow-up8', 'icon-arrow-right10' => 'icon-arrow-right10', 'icon-arrow-down9' => 'icon-arrow-down9', 'icon-arrow-left9' => 'icon-arrow-left9', 'icon-arrow-up9' => 'icon-arrow-up9', 'icon-arrow-right11' => 'icon-arrow-right11', 'icon-arrow-bottom' => 'icon-arrow-bottom', 'icon-arrow-left10' => 'icon-arrow-left10', 'icon-arrow-up-left6' => 'icon-arrow-up-left6', 'icon-arrow-up10' => 'icon-arrow-up10', 'icon-arrow-up-right6' => 'icon-arrow-up-right6', 'icon-arrow-right12' => 'icon-arrow-right12', 'icon-arrow-down-right6' => 'icon-arrow-down-right6', 'icon-arrow-down10' => 'icon-arrow-down10', 'icon-arrow-down-left6' => 'icon-arrow-down-left6', 'icon-arrow-left11' => 'icon-arrow-left11', 'icon-arrow-up-left7' => 'icon-arrow-up-left7', 'icon-arrow-up11' => 'icon-arrow-up11', 'icon-arrow-up-right7' => 'icon-arrow-up-right7', 'icon-arrow-right13' => 'icon-arrow-right13', 'icon-arrow-down-right7' => 'icon-arrow-down-right7', 'icon-arrow-down11' => 'icon-arrow-down11', 'icon-arrow-down-left7' => 'icon-arrow-down-left7', 'icon-arrow-left12' => 'icon-arrow-left12', 'icon-arrow-up12' => 'icon-arrow-up12', 'icon-arrow-right14' => 'icon-arrow-right14', 'icon-arrow-down12' => 'icon-arrow-down12', 'icon-arrow-left13' => 'icon-arrow-left13', 'icon-arrow-up13' => 'icon-arrow-up13', 'icon-arrow-right15' => 'icon-arrow-right15', 'icon-arrow-down13' => 'icon-arrow-down13', 'icon-arrow-left14' => 'icon-arrow-left14', 'icon-arrow-up14' => 'icon-arrow-up14', 'icon-arrow-right16' => 'icon-arrow-right16', 'icon-arrow-down14' => 'icon-arrow-down14', 'icon-arrow-left15' => 'icon-arrow-left15', 'icon-arrow-up15' => 'icon-arrow-up15', 'icon-arrow-right17' => 'icon-arrow-right17', 'icon-arrow-down15' => 'icon-arrow-down15', 'icon-arrow-left16' => 'icon-arrow-left16', 'icon-arrow-up16' => 'icon-arrow-up16', 'icon-arrow-right18' => 'icon-arrow-right18', 'icon-arrow-down16' => 'icon-arrow-down16', 'icon-arrow-left17' => 'icon-arrow-left17', 'icon-arrow-up17' => 'icon-arrow-up17', 'icon-arrow-right19' => 'icon-arrow-right19', 'icon-arrow-down17' => 'icon-arrow-down17', 'icon-arrow-left18' => 'icon-arrow-left18', 'icon-menu10' => 'icon-menu10', 'icon-menu11' => 'icon-menu11', 'icon-menu-close' => 'icon-menu-close', 'icon-menu-close2' => 'icon-menu-close2', 'icon-enter4' => 'icon-enter4', 'icon-enter5' => 'icon-enter5', 'icon-esc' => 'icon-esc', 'icon-backspace' => 'icon-backspace', 'icon-backspace2' => 'icon-backspace2', 'icon-backspace3' => 'icon-backspace3', 'icon-tab' => 'icon-tab', 'icon-transmission' => 'icon-transmission', 'icon-transmission2' => 'icon-transmission2', 'icon-sort' => 'icon-sort', 'icon-sort2' => 'icon-sort2', 'icon-key-keyboard' => 'icon-key-keyboard', 'icon-key-A' => 'icon-key-A', 'icon-key-up' => 'icon-key-up', 'icon-key-right' => 'icon-key-right', 'icon-key-down' => 'icon-key-down', 'icon-key-left' => 'icon-key-left', 'icon-command' => 'icon-command', 'icon-checkbox-checked' => 'icon-checkbox-checked', 'icon-checkbox-unchecked' => 'icon-checkbox-unchecked', 'icon-square' => 'icon-square', 'icon-checkbox-partial' => 'icon-checkbox-partial', 'icon-checkbox' => 'icon-checkbox', 'icon-checkbox-unchecked2' => 'icon-checkbox-unchecked2', 'icon-checkbox-partial2' => 'icon-checkbox-partial2', 'icon-checkbox-checked2' => 'icon-checkbox-checked2', 'icon-checkbox-unchecked3' => 'icon-checkbox-unchecked3', 'icon-checkbox-partial3' => 'icon-checkbox-partial3', 'icon-radio-checked' => 'icon-radio-checked', 'icon-radio-unchecked' => 'icon-radio-unchecked', 'icon-circle' => 'icon-circle', 'icon-circle2' => 'icon-circle2', 'icon-crop3' => 'icon-crop3', 'icon-crop4' => 'icon-crop4', 'icon-vector' => 'icon-vector', 'icon-rulers' => 'icon-rulers', 'icon-scissors' => 'icon-scissors', 'icon-scissors2' => 'icon-scissors2', 'icon-scissors3' => 'icon-scissors3', 'icon-filter2' => 'icon-filter2', 'icon-filter3' => 'icon-filter3', 'icon-filter4' => 'icon-filter4', 'icon-filter5' => 'icon-filter5', 'icon-font' => 'icon-font', 'icon-font-size' => 'icon-font-size', 'icon-type2' => 'icon-type2', 'icon-text-height' => 'icon-text-height', 'icon-text-width' => 'icon-text-width', 'icon-height' => 'icon-height', 'icon-width' => 'icon-width', 'icon-bold' => 'icon-bold', 'icon-underline' => 'icon-underline', 'icon-italic' => 'icon-italic', 'icon-strikethrough' => 'icon-strikethrough', 'icon-strikethrough2' => 'icon-strikethrough2', 'icon-font-size2' => 'icon-font-size2', 'icon-bold2' => 'icon-bold2', 'icon-underline2' => 'icon-underline2', 'icon-italic2' => 'icon-italic2', 'icon-strikethrough3' => 'icon-strikethrough3', 'icon-omega' => 'icon-omega', 'icon-sigma' => 'icon-sigma', 'icon-nbsp' => 'icon-nbsp', 'icon-page-break' => 'icon-page-break', 'icon-page-break2' => 'icon-page-break2', 'icon-superscript' => 'icon-superscript', 'icon-subscript' => 'icon-subscript', 'icon-superscript2' => 'icon-superscript2', 'icon-subscript2' => 'icon-subscript2', 'icon-text-color' => 'icon-text-color', 'icon-highlight' => 'icon-highlight', 'icon-pagebreak' => 'icon-pagebreak', 'icon-clear-formatting' => 'icon-clear-formatting', 'icon-table' => 'icon-table', 'icon-table2' => 'icon-table2', 'icon-insert-template' => 'icon-insert-template', 'icon-pilcrow2' => 'icon-pilcrow2', 'icon-lefttoright' => 'icon-lefttoright', 'icon-righttoleft' => 'icon-righttoleft', 'icon-paragraph-left' => 'icon-paragraph-left', 'icon-paragraph-center' => 'icon-paragraph-center', 'icon-paragraph-right' => 'icon-paragraph-right', 'icon-paragraph-justify' => 'icon-paragraph-justify', 'icon-paragraph-left2' => 'icon-paragraph-left2', 'icon-paragraph-center2' => 'icon-paragraph-center2', 'icon-paragraph-right2' => 'icon-paragraph-right2', 'icon-paragraph-justify2' => 'icon-paragraph-justify2', 'icon-indent-increase' => 'icon-indent-increase', 'icon-indent-decrease' => 'icon-indent-decrease', 'icon-paragraph-left3' => 'icon-paragraph-left3', 'icon-paragraph-center3' => 'icon-paragraph-center3', 'icon-paragraph-right3' => 'icon-paragraph-right3', 'icon-paragraph-justify3' => 'icon-paragraph-justify3', 'icon-indent-increase2' => 'icon-indent-increase2', 'icon-indent-decrease2' => 'icon-indent-decrease2', 'icon-share3' => 'icon-share3', 'icon-newtab' => 'icon-newtab', 'icon-newtab2' => 'icon-newtab2', 'icon-popout' => 'icon-popout', 'icon-embed' => 'icon-embed', 'icon-code2' => 'icon-code2', 'icon-console2' => 'icon-console2', 'icon-sevensegment0' => 'icon-sevensegment0', 'icon-sevensegment1' => 'icon-sevensegment1', 'icon-sevensegment2' => 'icon-sevensegment2', 'icon-sevensegment3' => 'icon-sevensegment3', 'icon-sevensegment4' => 'icon-sevensegment4', 'icon-sevensegment5' => 'icon-sevensegment5', 'icon-sevensegment6' => 'icon-sevensegment6', 'icon-sevensegment7' => 'icon-sevensegment7', 'icon-sevensegment8' => 'icon-sevensegment8', 'icon-sevensegment9' => 'icon-sevensegment9', 'icon-share4' => 'icon-share4', 'icon-share5' => 'icon-share5', 'icon-mail2' => 'icon-mail2', 'icon-mail3' => 'icon-mail3', 'icon-mail4' => 'icon-mail4', 'icon-mail5' => 'icon-mail5', 'icon-google' => 'icon-google', 'icon-googleplus2' => 'icon-googleplus2', 'icon-googleplus3' => 'icon-googleplus3', 'icon-googleplus4' => 'icon-googleplus4', 'icon-googleplus5' => 'icon-googleplus5', 'icon-google-drive' => 'icon-google-drive', 'icon-facebook2' => 'icon-facebook2', 'icon-facebook3' => 'icon-facebook3', 'icon-facebook4' => 'icon-facebook4', 'icon-facebook5' => 'icon-facebook5', 'icon-instagram2' => 'icon-instagram2', 'icon-twitter2' => 'icon-twitter2', 'icon-twitter3' => 'icon-twitter3', 'icon-twitter4' => 'icon-twitter4', 'icon-feed3' => 'icon-feed3', 'icon-feed4' => 'icon-feed4', 'icon-feed5' => 'icon-feed5', 'icon-youtube' => 'icon-youtube', 'icon-youtube2' => 'icon-youtube2', 'icon-vimeo' => 'icon-vimeo', 'icon-vimeo2' => 'icon-vimeo2', 'icon-vimeo3' => 'icon-vimeo3', 'icon-lanyrd' => 'icon-lanyrd', 'icon-flickr' => 'icon-flickr', 'icon-flickr2' => 'icon-flickr2', 'icon-flickr3' => 'icon-flickr3', 'icon-flickr4' => 'icon-flickr4', 'icon-picassa' => 'icon-picassa', 'icon-picassa2' => 'icon-picassa2', 'icon-dribbble2' => 'icon-dribbble2', 'icon-dribbble3' => 'icon-dribbble3', 'icon-dribbble4' => 'icon-dribbble4', 'icon-forrst2' => 'icon-forrst2', 'icon-forrst3' => 'icon-forrst3', 'icon-deviantart' => 'icon-deviantart', 'icon-deviantart2' => 'icon-deviantart2', 'icon-steam' => 'icon-steam', 'icon-steam2' => 'icon-steam2', 'icon-github' => 'icon-github', 'icon-github2' => 'icon-github2', 'icon-github3' => 'icon-github3', 'icon-github4' => 'icon-github4', 'icon-github5' => 'icon-github5', 'icon-wordpress' => 'icon-wordpress', 'icon-wordpress2' => 'icon-wordpress2', 'icon-joomla' => 'icon-joomla', 'icon-blogger' => 'icon-blogger', 'icon-blogger2' => 'icon-blogger2', 'icon-tumblr' => 'icon-tumblr', 'icon-tumblr2' => 'icon-tumblr2', 'icon-yahoo' => 'icon-yahoo', 'icon-tux' => 'icon-tux', 'icon-apple2' => 'icon-apple2', 'icon-finder' => 'icon-finder', 'icon-android' => 'icon-android', 'icon-windows' => 'icon-windows', 'icon-windows8' => 'icon-windows8', 'icon-soundcloud' => 'icon-soundcloud', 'icon-soundcloud2' => 'icon-soundcloud2', 'icon-skype2' => 'icon-skype2', 'icon-reddit' => 'icon-reddit', 'icon-linkedin' => 'icon-linkedin', 'icon-lastfm' => 'icon-lastfm', 'icon-lastfm2' => 'icon-lastfm2', 'icon-delicious' => 'icon-delicious', 'icon-stumbleupon' => 'icon-stumbleupon', 'icon-stumbleupon2' => 'icon-stumbleupon2', 'icon-stackoverflow' => 'icon-stackoverflow', 'icon-pinterest' => 'icon-pinterest', 'icon-pinterest2' => 'icon-pinterest2', 'icon-xing' => 'icon-xing', 'icon-xing2' => 'icon-xing2', 'icon-flattr' => 'icon-flattr', 'icon-foursquare' => 'icon-foursquare', 'icon-foursquare2' => 'icon-foursquare2', 'icon-paypal' => 'icon-paypal', 'icon-paypal2' => 'icon-paypal2', 'icon-paypal3' => 'icon-paypal3', 'icon-yelp' => 'icon-yelp', 'icon-libreoffice' => 'icon-libreoffice', 'icon-file-pdf' => 'icon-file-pdf', 'icon-file-openoffice' => 'icon-file-openoffice', 'icon-file-word' => 'icon-file-word', 'icon-file-excel' => 'icon-file-excel', 'icon-file-zip' => 'icon-file-zip', 'icon-file-powerpoint' => 'icon-file-powerpoint', 'icon-file-xml' => 'icon-file-xml', 'icon-file-css' => 'icon-file-css', 'icon-html5' => 'icon-html5', 'icon-html52' => 'icon-html52', 'icon-css3' => 'icon-css3', 'icon-chrome' => 'icon-chrome', 'icon-firefox' => 'icon-firefox', 'icon-IE' => 'icon-IE', 'icon-opera' => 'icon-opera', 'icon-safari' => 'icon-safari', 'icon-IcoMoon' => 'icon-IcoMoon', 'icon-store' => 'icon-store', 'icon-out' => 'icon-out', 'icon-in' => 'icon-in', 'icon-in-alt' => 'icon-in-alt', 'icon-home16' => 'icon-home16', 'icon-lightbulb2' => 'icon-lightbulb2', 'icon-anchor2' => 'icon-anchor2', 'icon-feather' => 'icon-feather', 'icon-expand4' => 'icon-expand4', 'icon-maximize' => 'icon-maximize', 'icon-search8' => 'icon-search8', 'icon-zoomin4' => 'icon-zoomin4', 'icon-zoomout4' => 'icon-zoomout4', 'icon-add' => 'icon-add', 'icon-subtract2' => 'icon-subtract2', 'icon-exclamation' => 'icon-exclamation', 'icon-question7' => 'icon-question7', 'icon-close6' => 'icon-close6', 'icon-cmd' => 'icon-cmd', 'icon-forbid' => 'icon-forbid', 'icon-book4' => 'icon-book4', 'icon-spinner13' => 'icon-spinner13', 'icon-play7' => 'icon-play7', 'icon-stop5' => 'icon-stop5', 'icon-pause5' => 'icon-pause5', 'icon-forward5' => 'icon-forward5', 'icon-rewind' => 'icon-rewind', 'icon-sound' => 'icon-sound', 'icon-sound-alt' => 'icon-sound-alt', 'icon-soundoff' => 'icon-soundoff', 'icon-task' => 'icon-task', 'icon-inbox3' => 'icon-inbox3', 'icon-inbox-alt' => 'icon-inbox-alt', 'icon-envelope2' => 'icon-envelope2', 'icon-compose' => 'icon-compose', 'icon-newspaper3' => 'icon-newspaper3', 'icon-newspaper-alt' => 'icon-newspaper-alt', 'icon-clipboard5' => 'icon-clipboard5', 'icon-calendar9' => 'icon-calendar9', 'icon-hyperlink' => 'icon-hyperlink', 'icon-trash2' => 'icon-trash2', 'icon-trash-alt' => 'icon-trash-alt', 'icon-grid9' => 'icon-grid9', 'icon-grid-alt' => 'icon-grid-alt', 'icon-menu12' => 'icon-menu12', 'icon-list9' => 'icon-list9', 'icon-gallery' => 'icon-gallery', 'icon-calculator' => 'icon-calculator', 'icon-windows2' => 'icon-windows2', 'icon-browser' => 'icon-browser', 'icon-alarm4' => 'icon-alarm4', 'icon-clock11' => 'icon-clock11', 'icon-attachment3' => 'icon-attachment3', 'icon-settings2' => 'icon-settings2', 'icon-portfolio' => 'icon-portfolio', 'icon-user12' => 'icon-user12', 'icon-users7' => 'icon-users7', 'icon-heart11' => 'icon-heart11', 'icon-chat3' => 'icon-chat3', 'icon-comments' => 'icon-comments', 'icon-screen5' => 'icon-screen5', 'icon-iphone2' => 'icon-iphone2', 'icon-ipad' => 'icon-ipad', 'icon-forkandspoon' => 'icon-forkandspoon', 'icon-forkandknife' => 'icon-forkandknife', 'icon-instagram3' => 'icon-instagram3', 'icon-facebook6' => 'icon-facebook6', 'icon-delicious2' => 'icon-delicious2', 'icon-googleplus6' => 'icon-googleplus6', 'icon-dribbble5' => 'icon-dribbble5', 'icon-pin3' => 'icon-pin3', 'icon-pin-alt' => 'icon-pin-alt', 'icon-camera14' => 'icon-camera14', 'icon-brightness2' => 'icon-brightness2', 'icon-brightness-half' => 'icon-brightness-half', 'icon-moon4' => 'icon-moon4', 'icon-cloud12' => 'icon-cloud12', 'icon-circle-full' => 'icon-circle-full', 'icon-circle-half' => 'icon-circle-half', 'icon-globe4' => 'icon-globe4', 'icon-mobile6' => 'icon-mobile6', 'icon-laptop2' => 'icon-laptop2', 'icon-desktop2' => 'icon-desktop2', 'icon-tablet2' => 'icon-tablet2', 'icon-phone8' => 'icon-phone8', 'icon-document' => 'icon-document', 'icon-documents' => 'icon-documents', 'icon-search9' => 'icon-search9', 'icon-clipboard6' => 'icon-clipboard6', 'icon-newspaper4' => 'icon-newspaper4', 'icon-notebook2' => 'icon-notebook2', 'icon-book-open' => 'icon-book-open', 'icon-browser2' => 'icon-browser2', 'icon-calendar10' => 'icon-calendar10', 'icon-presentation' => 'icon-presentation', 'icon-picture3' => 'icon-picture3', 'icon-pictures' => 'icon-pictures', 'icon-video' => 'icon-video', 'icon-camera15' => 'icon-camera15', 'icon-printer' => 'icon-printer', 'icon-toolbox' => 'icon-toolbox', 'icon-briefcase6' => 'icon-briefcase6', 'icon-wallet' => 'icon-wallet', 'icon-gift4' => 'icon-gift4', 'icon-bargraph' => 'icon-bargraph', 'icon-grid10' => 'icon-grid10', 'icon-expand5' => 'icon-expand5', 'icon-focus' => 'icon-focus', 'icon-edit2' => 'icon-edit2', 'icon-adjustments' => 'icon-adjustments', 'icon-ribbon' => 'icon-ribbon', 'icon-hourglass' => 'icon-hourglass', 'icon-lock6' => 'icon-lock6', 'icon-megaphone2' => 'icon-megaphone2', 'icon-shield5' => 'icon-shield5', 'icon-trophy4' => 'icon-trophy4', 'icon-flag8' => 'icon-flag8', 'icon-map5' => 'icon-map5', 'icon-puzzle5' => 'icon-puzzle5', 'icon-basket4' => 'icon-basket4', 'icon-envelope3' => 'icon-envelope3', 'icon-streetsign' => 'icon-streetsign', 'icon-telescope' => 'icon-telescope', 'icon-gears' => 'icon-gears', 'icon-key7' => 'icon-key7', 'icon-paperclip3' => 'icon-paperclip3', 'icon-attachment4' => 'icon-attachment4', 'icon-pricetags' => 'icon-pricetags', 'icon-lightbulb3' => 'icon-lightbulb3', 'icon-layers2' => 'icon-layers2', 'icon-pencil8' => 'icon-pencil8', 'icon-tools2' => 'icon-tools2', 'icon-tools-2' => 'icon-tools-2', 'icon-scissors4' => 'icon-scissors4', 'icon-paintbrush' => 'icon-paintbrush', 'icon-magnifying-glass2' => 'icon-magnifying-glass2', 'icon-circle-compass' => 'icon-circle-compass', 'icon-linegraph' => 'icon-linegraph', 'icon-mic7' => 'icon-mic7', 'icon-strategy' => 'icon-strategy', 'icon-beaker2' => 'icon-beaker2', 'icon-caution' => 'icon-caution', 'icon-recycle' => 'icon-recycle', 'icon-anchor3' => 'icon-anchor3', 'icon-profile-male' => 'icon-profile-male', 'icon-profile-female' => 'icon-profile-female', 'icon-bike2' => 'icon-bike2', 'icon-wine' => 'icon-wine', 'icon-hotairballoon' => 'icon-hotairballoon', 'icon-globe5' => 'icon-globe5', 'icon-genius' => 'icon-genius', 'icon-map-pin' => 'icon-map-pin', 'icon-dial2' => 'icon-dial2', 'icon-chat4' => 'icon-chat4', 'icon-heart12' => 'icon-heart12', 'icon-cloud13' => 'icon-cloud13', 'icon-upload9' => 'icon-upload9', 'icon-download9' => 'icon-download9', 'icon-target8' => 'icon-target8', 'icon-hazardous' => 'icon-hazardous', 'icon-piechart' => 'icon-piechart', 'icon-speedometer' => 'icon-speedometer', 'icon-global' => 'icon-global', 'icon-compass7' => 'icon-compass7', 'icon-lifesaver' => 'icon-lifesaver', 'icon-clock12' => 'icon-clock12', 'icon-aperture2' => 'icon-aperture2', 'icon-quote' => 'icon-quote', 'icon-scope' => 'icon-scope', 'icon-alarmclock' => 'icon-alarmclock', 'icon-refresh2' => 'icon-refresh2', 'icon-happy3' => 'icon-happy3', 'icon-sad3' => 'icon-sad3', 'icon-facebook7' => 'icon-facebook7', 'icon-twitter5' => 'icon-twitter5', 'icon-googleplus7' => 'icon-googleplus7', 'icon-rss2' => 'icon-rss2', 'icon-tumblr3' => 'icon-tumblr3', 'icon-linkedin2' => 'icon-linkedin2', 'icon-dribbble6' => 'icon-dribbble6', 'icon-number' => 'icon-number', 'icon-number2' => 'icon-number2', 'icon-number3' => 'icon-number3', 'icon-number4' => 'icon-number4', 'icon-number5' => 'icon-number5', 'icon-number6' => 'icon-number6', 'icon-number7' => 'icon-number7', 'icon-number8' => 'icon-number8', 'icon-number9' => 'icon-number9', 'icon-number10' => 'icon-number10', 'icon-number11' => 'icon-number11', 'icon-number12' => 'icon-number12', 'icon-number13' => 'icon-number13', 'icon-number14' => 'icon-number14', 'icon-number15' => 'icon-number15', 'icon-number16' => 'icon-number16', 'icon-number17' => 'icon-number17', 'icon-number18' => 'icon-number18', 'icon-number19' => 'icon-number19', 'icon-number20' => 'icon-number20', 'icon-quote2' => 'icon-quote2', 'icon-quote3' => 'icon-quote3', 'icon-tag11' => 'icon-tag11', 'icon-tag12' => 'icon-tag12', 'icon-link8' => 'icon-link8', 'icon-link9' => 'icon-link9', 'icon-cabinet2' => 'icon-cabinet2', 'icon-cabinet3' => 'icon-cabinet3', 'icon-calendar11' => 'icon-calendar11', 'icon-calendar12' => 'icon-calendar12', 'icon-calendar13' => 'icon-calendar13', 'icon-file11' => 'icon-file11', 'icon-file12' => 'icon-file12', 'icon-file13' => 'icon-file13', 'icon-files2' => 'icon-files2', 'icon-phone9' => 'icon-phone9', 'icon-tablet3' => 'icon-tablet3', 'icon-window2' => 'icon-window2', 'icon-monitor2' => 'icon-monitor2', 'icon-ipod2' => 'icon-ipod2', 'icon-tv2' => 'icon-tv2', 'icon-camera16' => 'icon-camera16', 'icon-camera17' => 'icon-camera17', 'icon-camera18' => 'icon-camera18', 'icon-film7' => 'icon-film7', 'icon-film8' => 'icon-film8', 'icon-film9' => 'icon-film9', 'icon-microphone2' => 'icon-microphone2', 'icon-microphone3' => 'icon-microphone3', 'icon-microphone4' => 'icon-microphone4', 'icon-drink' => 'icon-drink', 'icon-drink2' => 'icon-drink2', 'icon-drink3' => 'icon-drink3', 'icon-drink4' => 'icon-drink4', 'icon-coffee2' => 'icon-coffee2', 'icon-mug2' => 'icon-mug2', 'icon-icecream' => 'icon-icecream', 'icon-cake2' => 'icon-cake2', 'icon-inbox4' => 'icon-inbox4', 'icon-download10' => 'icon-download10', 'icon-upload10' => 'icon-upload10', 'icon-inbox5' => 'icon-inbox5', 'icon-checkmark7' => 'icon-checkmark7', 'icon-checkmark8' => 'icon-checkmark8', 'icon-cancel4' => 'icon-cancel4', 'icon-cancel5' => 'icon-cancel5', 'icon-plus6' => 'icon-plus6', 'icon-plus7' => 'icon-plus7', 'icon-minus6' => 'icon-minus6', 'icon-minus7' => 'icon-minus7', 'icon-notice' => 'icon-notice', 'icon-notice2' => 'icon-notice2', 'icon-cog10' => 'icon-cog10', 'icon-cogs2' => 'icon-cogs2', 'icon-cog11' => 'icon-cog11', 'icon-warning4' => 'icon-warning4', 'icon-health2' => 'icon-health2', 'icon-suitcase' => 'icon-suitcase', 'icon-suitcase2' => 'icon-suitcase2', 'icon-suitcase3' => 'icon-suitcase3', 'icon-picture4' => 'icon-picture4', 'icon-pictures2' => 'icon-pictures2', 'icon-pictures3' => 'icon-pictures3', 'icon-android2' => 'icon-android2', 'icon-marvin' => 'icon-marvin', 'icon-pacman2' => 'icon-pacman2', 'icon-cassette' => 'icon-cassette', 'icon-watch2' => 'icon-watch2', 'icon-chronometer' => 'icon-chronometer', 'icon-watch3' => 'icon-watch3', 'icon-alarmclock2' => 'icon-alarmclock2', 'icon-time' => 'icon-time', 'icon-time2' => 'icon-time2', 'icon-headphones5' => 'icon-headphones5', 'icon-wallet2' => 'icon-wallet2', 'icon-checkmark9' => 'icon-checkmark9', 'icon-cancel6' => 'icon-cancel6', 'icon-eye11' => 'icon-eye11', 'icon-position' => 'icon-position', 'icon-sitemap' => 'icon-sitemap', 'icon-sitemap2' => 'icon-sitemap2', 'icon-cloud14' => 'icon-cloud14', 'icon-upload11' => 'icon-upload11', 'icon-chart4' => 'icon-chart4', 'icon-chart5' => 'icon-chart5', 'icon-chart6' => 'icon-chart6', 'icon-chart7' => 'icon-chart7', 'icon-chart8' => 'icon-chart8', 'icon-chart9' => 'icon-chart9', 'icon-location10' => 'icon-location10', 'icon-download11' => 'icon-download11', 'icon-basket5' => 'icon-basket5', 'icon-folder9' => 'icon-folder9', 'icon-gamepad4' => 'icon-gamepad4', 'icon-alarm5' => 'icon-alarm5', 'icon-alarm-cancel2' => 'icon-alarm-cancel2', 'icon-phone10' => 'icon-phone10', 'icon-phone11' => 'icon-phone11', 'icon-image9' => 'icon-image9', 'icon-open' => 'icon-open', 'icon-sale' => 'icon-sale', 'icon-direction2' => 'icon-direction2', 'icon-map6' => 'icon-map6', 'icon-trashcan2' => 'icon-trashcan2', 'icon-vote' => 'icon-vote', 'icon-graduate' => 'icon-graduate', 'icon-lab2' => 'icon-lab2', 'icon-tie' => 'icon-tie', 'icon-football2' => 'icon-football2', 'icon-eightball2' => 'icon-eightball2', 'icon-bowling3' => 'icon-bowling3', 'icon-bowlingpin' => 'icon-bowlingpin', 'icon-baseball2' => 'icon-baseball2', 'icon-soccer2' => 'icon-soccer2', 'icon-dglasses' => 'icon-dglasses', 'icon-microwave' => 'icon-microwave', 'icon-refrigerator' => 'icon-refrigerator', 'icon-oven' => 'icon-oven', 'icon-washingmachine' => 'icon-washingmachine', 'icon-mouse6' => 'icon-mouse6', 'icon-smiley4' => 'icon-smiley4', 'icon-sad4' => 'icon-sad4', 'icon-mute' => 'icon-mute', 'icon-hand2' => 'icon-hand2', 'icon-radio3' => 'icon-radio3', 'icon-satellite' => 'icon-satellite', 'icon-medal6' => 'icon-medal6', 'icon-medal7' => 'icon-medal7', 'icon-switch3' => 'icon-switch3', 'icon-key8' => 'icon-key8', 'icon-cord2' => 'icon-cord2', 'icon-locked3' => 'icon-locked3', 'icon-unlocked3' => 'icon-unlocked3', 'icon-locked4' => 'icon-locked4', 'icon-unlocked4' => 'icon-unlocked4', 'icon-magnifier' => 'icon-magnifier', 'icon-zoomin5' => 'icon-zoomin5', 'icon-zoomout5' => 'icon-zoomout5', 'icon-stack5' => 'icon-stack5', 'icon-stack6' => 'icon-stack6', 'icon-stack7' => 'icon-stack7', 'icon-davidstar' => 'icon-davidstar', 'icon-cross' => 'icon-cross', 'icon-moonandstar' => 'icon-moonandstar', 'icon-transformers' => 'icon-transformers', 'icon-batman' => 'icon-batman', 'icon-spaceinvaders' => 'icon-spaceinvaders', 'icon-skeletor' => 'icon-skeletor', 'icon-lamp6' => 'icon-lamp6', 'icon-lamp7' => 'icon-lamp7', 'icon-umbrella3' => 'icon-umbrella3', 'icon-streetlight' => 'icon-streetlight', 'icon-bomb2' => 'icon-bomb2', 'icon-archive3' => 'icon-archive3', 'icon-battery2' => 'icon-battery2', 'icon-battery3' => 'icon-battery3', 'icon-battery4' => 'icon-battery4', 'icon-battery5' => 'icon-battery5', 'icon-battery6' => 'icon-battery6', 'icon-megaphone3' => 'icon-megaphone3', 'icon-megaphone4' => 'icon-megaphone4', 'icon-patch2' => 'icon-patch2', 'icon-pil' => 'icon-pil', 'icon-injection' => 'icon-injection', 'icon-thermometer2' => 'icon-thermometer2', 'icon-lamp8' => 'icon-lamp8', 'icon-lamp9' => 'icon-lamp9', 'icon-lamp10' => 'icon-lamp10', 'icon-cube5' => 'icon-cube5', 'icon-box3' => 'icon-box3', 'icon-box4' => 'icon-box4', 'icon-diamond3' => 'icon-diamond3', 'icon-bag4' => 'icon-bag4', 'icon-moneybag' => 'icon-moneybag', 'icon-grid11' => 'icon-grid11', 'icon-grid12' => 'icon-grid12', 'icon-list10' => 'icon-list10', 'icon-list11' => 'icon-list11', 'icon-ruler' => 'icon-ruler', 'icon-ruler2' => 'icon-ruler2', 'icon-layout' => 'icon-layout', 'icon-layout2' => 'icon-layout2', 'icon-layout3' => 'icon-layout3', 'icon-layout4' => 'icon-layout4', 'icon-layout5' => 'icon-layout5', 'icon-layout6' => 'icon-layout6', 'icon-layout7' => 'icon-layout7', 'icon-layout8' => 'icon-layout8', 'icon-layout9' => 'icon-layout9', 'icon-layout10' => 'icon-layout10', 'icon-layout11' => 'icon-layout11', 'icon-layout12' => 'icon-layout12', 'icon-layout13' => 'icon-layout13', 'icon-layout14' => 'icon-layout14', 'icon-tools3' => 'icon-tools3', 'icon-screwdriver3' => 'icon-screwdriver3', 'icon-paint' => 'icon-paint', 'icon-hammer3' => 'icon-hammer3', 'icon-brush3' => 'icon-brush3', 'icon-pen7' => 'icon-pen7', 'icon-chat5' => 'icon-chat5', 'icon-comments2' => 'icon-comments2', 'icon-chat6' => 'icon-chat6', 'icon-chat7' => 'icon-chat7', 'icon-volume6' => 'icon-volume6', 'icon-volume7' => 'icon-volume7', 'icon-volume8' => 'icon-volume8', 'icon-equalizer5' => 'icon-equalizer5', 'icon-resize3' => 'icon-resize3', 'icon-resize4' => 'icon-resize4', 'icon-stretch' => 'icon-stretch', 'icon-narrow' => 'icon-narrow', 'icon-resize5' => 'icon-resize5', 'icon-download12' => 'icon-download12', 'icon-calculator2' => 'icon-calculator2', 'icon-library3' => 'icon-library3', 'icon-auction' => 'icon-auction', 'icon-justice' => 'icon-justice', 'icon-stats5' => 'icon-stats5', 'icon-stats6' => 'icon-stats6', 'icon-attachment5' => 'icon-attachment5', 'icon-hourglass2' => 'icon-hourglass2', 'icon-abacus' => 'icon-abacus', 'icon-pencil9' => 'icon-pencil9', 'icon-pen8' => 'icon-pen8', 'icon-pin4' => 'icon-pin4', 'icon-pin5' => 'icon-pin5', 'icon-discout' => 'icon-discout', 'icon-edit3' => 'icon-edit3', 'icon-scissors5' => 'icon-scissors5', 'icon-profile2' => 'icon-profile2', 'icon-profile3' => 'icon-profile3', 'icon-profile4' => 'icon-profile4', 'icon-rotate3' => 'icon-rotate3', 'icon-rotate4' => 'icon-rotate4', 'icon-reply4' => 'icon-reply4', 'icon-forward6' => 'icon-forward6', 'icon-retweet' => 'icon-retweet', 'icon-shuffle3' => 'icon-shuffle3', 'icon-loop7' => 'icon-loop7', 'icon-crop5' => 'icon-crop5', 'icon-square2' => 'icon-square2', 'icon-square3' => 'icon-square3', 'icon-circle3' => 'icon-circle3', 'icon-dollar' => 'icon-dollar', 'icon-dollar2' => 'icon-dollar2', 'icon-coins2' => 'icon-coins2', 'icon-pig' => 'icon-pig', 'icon-bookmark6' => 'icon-bookmark6', 'icon-bookmark7' => 'icon-bookmark7', 'icon-addressbook2' => 'icon-addressbook2', 'icon-addressbook3' => 'icon-addressbook3', 'icon-safe' => 'icon-safe', 'icon-envelope4' => 'icon-envelope4', 'icon-envelope5' => 'icon-envelope5', 'icon-radioactive' => 'icon-radioactive', 'icon-music8' => 'icon-music8', 'icon-presentation2' => 'icon-presentation2', 'icon-male2' => 'icon-male2', 'icon-female2' => 'icon-female2', 'icon-aids' => 'icon-aids', 'icon-heart13' => 'icon-heart13', 'icon-info5' => 'icon-info5', 'icon-info6' => 'icon-info6', 'icon-piano2' => 'icon-piano2', 'icon-rain2' => 'icon-rain2', 'icon-snow' => 'icon-snow', 'icon-lightning7' => 'icon-lightning7', 'icon-sun6' => 'icon-sun6', 'icon-moon5' => 'icon-moon5', 'icon-cloudy5' => 'icon-cloudy5', 'icon-cloudy6' => 'icon-cloudy6', 'icon-car2' => 'icon-car2', 'icon-bike3' => 'icon-bike3', 'icon-truck2' => 'icon-truck2', 'icon-bus2' => 'icon-bus2', 'icon-bike4' => 'icon-bike4', 'icon-plane' => 'icon-plane', 'icon-paperplane2' => 'icon-paperplane2', 'icon-rocket2' => 'icon-rocket2', 'icon-book5' => 'icon-book5', 'icon-book6' => 'icon-book6', 'icon-barcode3' => 'icon-barcode3', 'icon-barcode4' => 'icon-barcode4', 'icon-expand6' => 'icon-expand6', 'icon-collapse' => 'icon-collapse', 'icon-popout2' => 'icon-popout2', 'icon-popin' => 'icon-popin', 'icon-target9' => 'icon-target9', 'icon-badge' => 'icon-badge', 'icon-badge2' => 'icon-badge2', 'icon-ticket2' => 'icon-ticket2', 'icon-ticket3' => 'icon-ticket3', 'icon-ticket4' => 'icon-ticket4', 'icon-microphone5' => 'icon-microphone5', 'icon-cone3' => 'icon-cone3', 'icon-blocked3' => 'icon-blocked3', 'icon-stop6' => 'icon-stop6', 'icon-keyboard4' => 'icon-keyboard4', 'icon-keyboard5' => 'icon-keyboard5', 'icon-radio4' => 'icon-radio4', 'icon-printer2' => 'icon-printer2', 'icon-checked' => 'icon-checked', 'icon-error' => 'icon-error', 'icon-add2' => 'icon-add2', 'icon-minus8' => 'icon-minus8', 'icon-alert' => 'icon-alert', 'icon-pictures4' => 'icon-pictures4', 'icon-atom4' => 'icon-atom4', 'icon-eyedropper4' => 'icon-eyedropper4', 'icon-globe6' => 'icon-globe6', 'icon-globe7' => 'icon-globe7', 'icon-shipping' => 'icon-shipping', 'icon-yingyang' => 'icon-yingyang', 'icon-compass8' => 'icon-compass8', 'icon-zip' => 'icon-zip', 'icon-zip2' => 'icon-zip2', 'icon-anchor4' => 'icon-anchor4', 'icon-lockedheart' => 'icon-lockedheart', 'icon-magnet5' => 'icon-magnet5', 'icon-navigation' => 'icon-navigation', 'icon-tags3' => 'icon-tags3', 'icon-heart14' => 'icon-heart14', 'icon-heart15' => 'icon-heart15', 'icon-usb' => 'icon-usb', 'icon-clipboard7' => 'icon-clipboard7', 'icon-clipboard8' => 'icon-clipboard8', 'icon-clipboard9' => 'icon-clipboard9', 'icon-switch4' => 'icon-switch4', 'icon-ruler3' => 'icon-ruler3', 'icon-heart16' => 'icon-heart16', 'icon-cloud15' => 'icon-cloud15', 'icon-star10' => 'icon-star10', 'icon-tv3' => 'icon-tv3', 'icon-sound2' => 'icon-sound2', 'icon-video2' => 'icon-video2', 'icon-trash3' => 'icon-trash3', 'icon-user13' => 'icon-user13', 'icon-key9' => 'icon-key9', 'icon-search10' => 'icon-search10', 'icon-settings3' => 'icon-settings3', 'icon-camera19' => 'icon-camera19', 'icon-tag13' => 'icon-tag13', 'icon-lock7' => 'icon-lock7', 'icon-bulb' => 'icon-bulb', 'icon-pen9' => 'icon-pen9', 'icon-diamond4' => 'icon-diamond4', 'icon-display' => 'icon-display', 'icon-location11' => 'icon-location11', 'icon-eye12' => 'icon-eye12', 'icon-bubble14' => 'icon-bubble14', 'icon-stack8' => 'icon-stack8', 'icon-cup3' => 'icon-cup3', 'icon-phone12' => 'icon-phone12', 'icon-news' => 'icon-news', 'icon-mail6' => 'icon-mail6', 'icon-like' => 'icon-like', 'icon-photo' => 'icon-photo', 'icon-note' => 'icon-note', 'icon-clock13' => 'icon-clock13', 'icon-paperplane3' => 'icon-paperplane3', 'icon-params' => 'icon-params', 'icon-banknote' => 'icon-banknote', 'icon-data' => 'icon-data', 'icon-music9' => 'icon-music9', 'icon-megaphone5' => 'icon-megaphone5', 'icon-study' => 'icon-study', 'icon-lab3' => 'icon-lab3', 'icon-food3' => 'icon-food3', 'icon-t-shirt' => 'icon-t-shirt', 'icon-fire3' => 'icon-fire3', 'icon-clip' => 'icon-clip', 'icon-shop' => 'icon-shop', 'icon-calendar14' => 'icon-calendar14', 'icon-wallet3' => 'icon-wallet3', 'icon-vynil' => 'icon-vynil', 'icon-truck3' => 'icon-truck3', 'icon-world' => 'icon-world', 'icon-facebook8' => 'icon-facebook8', 'icon-twitter-old' => 'icon-twitter-old', 'icon-share6' => 'icon-share6', 'icon-feed6' => 'icon-feed6', 'icon-bird' => 'icon-bird', 'icon-chat8' => 'icon-chat8', 'icon-envelope6' => 'icon-envelope6', 'icon-envelope7' => 'icon-envelope7', 'icon-phone13' => 'icon-phone13', 'icon-phone14' => 'icon-phone14', 'icon-phone15' => 'icon-phone15', 'icon-mobile7' => 'icon-mobile7', 'icon-ipod3' => 'icon-ipod3', 'icon-monitor3' => 'icon-monitor3', 'icon-laptop3' => 'icon-laptop3', 'icon-modem' => 'icon-modem', 'icon-speaker2' => 'icon-speaker2', 'icon-window3' => 'icon-window3', 'icon-server' => 'icon-server', 'icon-hdd' => 'icon-hdd', 'icon-keyboard6' => 'icon-keyboard6', 'icon-mouse7' => 'icon-mouse7', 'icon-cd3' => 'icon-cd3', 'icon-floppy2' => 'icon-floppy2', 'icon-hardware' => 'icon-hardware', 'icon-usb2' => 'icon-usb2', 'icon-cord3' => 'icon-cord3', 'icon-socket2' => 'icon-socket2', 'icon-socket3' => 'icon-socket3', 'icon-socket4' => 'icon-socket4', 'icon-printer3' => 'icon-printer3', 'icon-camera20' => 'icon-camera20', 'icon-pictures5' => 'icon-pictures5', 'icon-eye13' => 'icon-eye13', 'icon-uniEB6B' => 'icon-uniEB6B', 'icon-film10' => 'icon-film10', 'icon-camera21' => 'icon-camera21', 'icon-movie5' => 'icon-movie5', 'icon-tv4' => 'icon-tv4', 'icon-camera22' => 'icon-camera22', 'icon-camera23' => 'icon-camera23', 'icon-volume9' => 'icon-volume9', 'icon-music10' => 'icon-music10', 'icon-microphone6' => 'icon-microphone6', 'icon-radio5' => 'icon-radio5', 'icon-ipod4' => 'icon-ipod4', 'icon-headphone' => 'icon-headphone', 'icon-cassette2' => 'icon-cassette2', 'icon-broadcast' => 'icon-broadcast', 'icon-broadcast2' => 'icon-broadcast2', 'icon-calculator3' => 'icon-calculator3', 'icon-gamepad5' => 'icon-gamepad5', 'icon-gamepad6' => 'icon-gamepad6', 'icon-cog12' => 'icon-cog12', 'icon-shield6' => 'icon-shield6', 'icon-skull4' => 'icon-skull4', 'icon-bug4' => 'icon-bug4', 'icon-mine' => 'icon-mine', 'icon-earth4' => 'icon-earth4', 'icon-globe8' => 'icon-globe8', 'icon-planet' => 'icon-planet', 'icon-battery7' => 'icon-battery7', 'icon-battery-low' => 'icon-battery-low', 'icon-battery8' => 'icon-battery8', 'icon-battery-full2' => 'icon-battery-full2', 'icon-folder10' => 'icon-folder10', 'icon-search11' => 'icon-search11', 'icon-zoomout6' => 'icon-zoomout6', 'icon-zoomin6' => 'icon-zoomin6', 'icon-binocular' => 'icon-binocular', 'icon-location12' => 'icon-location12', 'icon-pin6' => 'icon-pin6', 'icon-file14' => 'icon-file14', 'icon-tag14' => 'icon-tag14', 'icon-quote4' => 'icon-quote4', 'icon-attachment6' => 'icon-attachment6', 'icon-bookmark8' => 'icon-bookmark8', 'icon-bookmark9' => 'icon-bookmark9', 'icon-newspaper5' => 'icon-newspaper5', 'icon-notebook3' => 'icon-notebook3', 'icon-addressbook4' => 'icon-addressbook4', 'icon-clipboard10' => 'icon-clipboard10', 'icon-clipboard11' => 'icon-clipboard11', 'icon-board' => 'icon-board', 'icon-pencil10' => 'icon-pencil10', 'icon-pen10' => 'icon-pen10', 'icon-user14' => 'icon-user14', 'icon-user15' => 'icon-user15', 'icon-user16' => 'icon-user16', 'icon-trashcan3' => 'icon-trashcan3', 'icon-cart10' => 'icon-cart10', 'icon-bag5' => 'icon-bag5', 'icon-suitcase4' => 'icon-suitcase4', 'icon-card' => 'icon-card', 'icon-book7' => 'icon-book7', 'icon-gift5' => 'icon-gift5', 'icon-lamp11' => 'icon-lamp11', 'icon-settings4' => 'icon-settings4', 'icon-support2' => 'icon-support2', 'icon-medicine' => 'icon-medicine', 'icon-cone4' => 'icon-cone4', 'icon-locked5' => 'icon-locked5', 'icon-unlocked5' => 'icon-unlocked5', 'icon-key10' => 'icon-key10', 'icon-info7' => 'icon-info7', 'icon-clock14' => 'icon-clock14', 'icon-timer' => 'icon-timer', 'icon-food4' => 'icon-food4', 'icon-drink5' => 'icon-drink5', 'icon-mug3' => 'icon-mug3', 'icon-cup4' => 'icon-cup4', 'icon-drink6' => 'icon-drink6', 'icon-mug4' => 'icon-mug4', 'icon-lollipop' => 'icon-lollipop', 'icon-lab4' => 'icon-lab4', 'icon-puzzle6' => 'icon-puzzle6', 'icon-flag9' => 'icon-flag9', 'icon-star11' => 'icon-star11', 'icon-heart17' => 'icon-heart17', 'icon-badge3' => 'icon-badge3', 'icon-cup5' => 'icon-cup5', 'icon-scissors6' => 'icon-scissors6', 'icon-snowflake3' => 'icon-snowflake3', 'icon-cloud16' => 'icon-cloud16', 'icon-lightning8' => 'icon-lightning8', 'icon-night' => 'icon-night', 'icon-sunny' => 'icon-sunny', 'icon-droplet6' => 'icon-droplet6', 'icon-umbrella4' => 'icon-umbrella4', 'icon-truck4' => 'icon-truck4', 'icon-car3' => 'icon-car3', 'icon-gaspump' => 'icon-gaspump', 'icon-factory2' => 'icon-factory2', 'icon-tree6' => 'icon-tree6', 'icon-leaf3' => 'icon-leaf3', 'icon-flower2' => 'icon-flower2', 'icon-direction3' => 'icon-direction3', 'icon-thumbsup2' => 'icon-thumbsup2', 'icon-thumbsdown2' => 'icon-thumbsdown2', 'icon-pointer3' => 'icon-pointer3', 'icon-pointer4' => 'icon-pointer4', 'icon-pointer5' => 'icon-pointer5', 'icon-pointer6' => 'icon-pointer6', 'icon-arrow-up18' => 'icon-arrow-up18', 'icon-arrow-down18' => 'icon-arrow-down18', 'icon-arrow-left19' => 'icon-arrow-left19', 'icon-arrow-right20' => 'icon-arrow-right20', 'icon-arrow-top-right' => 'icon-arrow-top-right', 'icon-arrow-top-left' => 'icon-arrow-top-left', 'icon-arrow-bottom-right' => 'icon-arrow-bottom-right', 'icon-arrow-bottom-left' => 'icon-arrow-bottom-left', 'icon-contract4' => 'icon-contract4', 'icon-enlarge' => 'icon-enlarge', 'icon-refresh3' => 'icon-refresh3', 'icon-download13' => 'icon-download13', 'icon-chat9' => 'icon-chat9', 'icon-archive4' => 'icon-archive4', 'icon-user17' => 'icon-user17', 'icon-users8' => 'icon-users8', 'icon-archive5' => 'icon-archive5', 'icon-earth5' => 'icon-earth5', 'icon-location13' => 'icon-location13', 'icon-contract5' => 'icon-contract5', 'icon-mobile8' => 'icon-mobile8', 'icon-screen6' => 'icon-screen6', 'icon-mail7' => 'icon-mail7', 'icon-support3' => 'icon-support3', 'icon-help' => 'icon-help', 'icon-videos' => 'icon-videos', 'icon-pictures6' => 'icon-pictures6', 'icon-link10' => 'icon-link10', 'icon-search12' => 'icon-search12', 'icon-cog13' => 'icon-cog13', 'icon-trashcan4' => 'icon-trashcan4', 'icon-pencil11' => 'icon-pencil11', 'icon-info8' => 'icon-info8', 'icon-article2' => 'icon-article2', 'icon-clock15' => 'icon-clock15', 'icon-photoshop' => 'icon-photoshop', 'icon-illustrator' => 'icon-illustrator', 'icon-star12' => 'icon-star12', 'icon-heart18' => 'icon-heart18', 'icon-bookmark10' => 'icon-bookmark10', 'icon-file15' => 'icon-file15', 'icon-feed7' => 'icon-feed7', 'icon-locked6' => 'icon-locked6', 'icon-unlocked6' => 'icon-unlocked6', 'icon-refresh4' => 'icon-refresh4', 'icon-list12' => 'icon-list12', 'icon-share7' => 'icon-share7', 'icon-archive6' => 'icon-archive6', 'icon-images3' => 'icon-images3', 'icon-images4' => 'icon-images4', 'icon-pencil12' => 'icon-pencil12', 'icon-times' => 'icon-times', 'icon-tick' => 'icon-tick', 'icon-plus8' => 'icon-plus8', 'icon-minus9' => 'icon-minus9', 'icon-equals' => 'icon-equals', 'icon-divide' => 'icon-divide', 'icon-chevron-right' => 'icon-chevron-right', 'icon-chevron-left' => 'icon-chevron-left', 'icon-arrow-right-thick' => 'icon-arrow-right-thick', 'icon-arrow-left-thick' => 'icon-arrow-left-thick', 'icon-th-small' => 'icon-th-small', 'icon-th-menu' => 'icon-th-menu', 'icon-th-list' => 'icon-th-list', 'icon-th-large' => 'icon-th-large', 'icon-home17' => 'icon-home17', 'icon-arrow-forward' => 'icon-arrow-forward', 'icon-arrow-back' => 'icon-arrow-back', 'icon-rss3' => 'icon-rss3', 'icon-location14' => 'icon-location14', 'icon-link11' => 'icon-link11', 'icon-image10' => 'icon-image10', 'icon-arrow-up-thick' => 'icon-arrow-up-thick', 'icon-arrow-down-thick' => 'icon-arrow-down-thick', 'icon-starburst2' => 'icon-starburst2', 'icon-starburst-outline' => 'icon-starburst-outline', 'icon-star13' => 'icon-star13', 'icon-flow-children' => 'icon-flow-children', 'icon-export' => 'icon-export', 'icon-delete' => 'icon-delete', 'icon-delete-outline' => 'icon-delete-outline', 'icon-cloud-storage' => 'icon-cloud-storage', 'icon-wi-fi' => 'icon-wi-fi', 'icon-heart19' => 'icon-heart19', 'icon-flash' => 'icon-flash', 'icon-cancel7' => 'icon-cancel7', 'icon-backspace4' => 'icon-backspace4', 'icon-attachment7' => 'icon-attachment7', 'icon-arrow-move' => 'icon-arrow-move', 'icon-warning5' => 'icon-warning5', 'icon-user18' => 'icon-user18', 'icon-radar' => 'icon-radar', 'icon-lock-open' => 'icon-lock-open', 'icon-lock-closed' => 'icon-lock-closed', 'icon-location-arrow' => 'icon-location-arrow', 'icon-info9' => 'icon-info9', 'icon-user-delete' => 'icon-user-delete', 'icon-user-add' => 'icon-user-add', 'icon-media-pause' => 'icon-media-pause', 'icon-group' => 'icon-group', 'icon-chart-pie' => 'icon-chart-pie', 'icon-chart-line' => 'icon-chart-line', 'icon-chart-bar' => 'icon-chart-bar', 'icon-chart-area' => 'icon-chart-area', 'icon-video3' => 'icon-video3', 'icon-point-of-interest' => 'icon-point-of-interest', 'icon-infinity' => 'icon-infinity', 'icon-globe9' => 'icon-globe9', 'icon-eye14' => 'icon-eye14', 'icon-cog14' => 'icon-cog14', 'icon-camera24' => 'icon-camera24', 'icon-upload12' => 'icon-upload12', 'icon-scissors7' => 'icon-scissors7', 'icon-refresh5' => 'icon-refresh5', 'icon-pin7' => 'icon-pin7', 'icon-key11' => 'icon-key11', 'icon-info-large' => 'icon-info-large', 'icon-eject3' => 'icon-eject3', 'icon-download14' => 'icon-download14', 'icon-zoom' => 'icon-zoom', 'icon-zoom-out' => 'icon-zoom-out', 'icon-zoom-in' => 'icon-zoom-in', 'icon-sort-numerically' => 'icon-sort-numerically', 'icon-sort-alphabetically' => 'icon-sort-alphabetically', 'icon-input-checked' => 'icon-input-checked', 'icon-calender' => 'icon-calender', 'icon-world2' => 'icon-world2', 'icon-notes' => 'icon-notes', 'icon-code3' => 'icon-code3', 'icon-arrow-sync' => 'icon-arrow-sync', 'icon-arrow-shuffle' => 'icon-arrow-shuffle', 'icon-arrow-repeat' => 'icon-arrow-repeat', 'icon-arrow-minimise' => 'icon-arrow-minimise', 'icon-arrow-maximise' => 'icon-arrow-maximise', 'icon-arrow-loop' => 'icon-arrow-loop', 'icon-anchor5' => 'icon-anchor5', 'icon-spanner' => 'icon-spanner', 'icon-puzzle7' => 'icon-puzzle7', 'icon-power3' => 'icon-power3', 'icon-plane2' => 'icon-plane2', 'icon-pi' => 'icon-pi', 'icon-phone16' => 'icon-phone16', 'icon-microphone7' => 'icon-microphone7', 'icon-media-rewind' => 'icon-media-rewind', 'icon-flag10' => 'icon-flag10', 'icon-adjust-brightness' => 'icon-adjust-brightness', 'icon-waves' => 'icon-waves', 'icon-social-twitter' => 'icon-social-twitter', 'icon-social-facebook' => 'icon-social-facebook', 'icon-social-dribbble' => 'icon-social-dribbble', 'icon-media-stop' => 'icon-media-stop', 'icon-media-record' => 'icon-media-record', 'icon-media-play' => 'icon-media-play', 'icon-media-fast-forward' => 'icon-media-fast-forward', 'icon-media-eject' => 'icon-media-eject', 'icon-social-vimeo' => 'icon-social-vimeo', 'icon-social-tumbler' => 'icon-social-tumbler', 'icon-social-skype' => 'icon-social-skype', 'icon-social-pinterest' => 'icon-social-pinterest', 'icon-social-linkedin' => 'icon-social-linkedin', 'icon-social-last-fm' => 'icon-social-last-fm', 'icon-social-github' => 'icon-social-github', 'icon-social-flickr' => 'icon-social-flickr', 'icon-at2' => 'icon-at2', 'icon-times-outline' => 'icon-times-outline', 'icon-plus-outline' => 'icon-plus-outline', 'icon-minus-outline' => 'icon-minus-outline', 'icon-tick-outline' => 'icon-tick-outline', 'icon-th-large-outline' => 'icon-th-large-outline', 'icon-equals-outline' => 'icon-equals-outline', 'icon-divide-outline' => 'icon-divide-outline', 'icon-chevron-right-outline' => 'icon-chevron-right-outline', 'icon-chevron-left-outline' => 'icon-chevron-left-outline', 'icon-arrow-right-outline' => 'icon-arrow-right-outline', 'icon-arrow-left-outline' => 'icon-arrow-left-outline', 'icon-th-small-outline' => 'icon-th-small-outline', 'icon-th-menu-outline' => 'icon-th-menu-outline', 'icon-th-list-outline' => 'icon-th-list-outline', 'icon-news2' => 'icon-news2', 'icon-home-outline' => 'icon-home-outline', 'icon-arrow-up-outline' => 'icon-arrow-up-outline', 'icon-arrow-forward-outline' => 'icon-arrow-forward-outline', 'icon-arrow-down-outline' => 'icon-arrow-down-outline', 'icon-arrow-back-outline' => 'icon-arrow-back-outline', 'icon-trash4' => 'icon-trash4', 'icon-rss-outline' => 'icon-rss-outline', 'icon-message' => 'icon-message', 'icon-location-outline' => 'icon-location-outline', 'icon-link-outline' => 'icon-link-outline', 'icon-image-outline' => 'icon-image-outline', 'icon-export-outline' => 'icon-export-outline', 'icon-cross2' => 'icon-cross2', 'icon-wi-fi-outline' => 'icon-wi-fi-outline', 'icon-star-outline' => 'icon-star-outline', 'icon-media-pause-outline' => 'icon-media-pause-outline', 'icon-mail8' => 'icon-mail8', 'icon-heart-outline' => 'icon-heart-outline', 'icon-flash-outline' => 'icon-flash-outline', 'icon-cancel-outline' => 'icon-cancel-outline', 'icon-beaker3' => 'icon-beaker3', 'icon-arrow-move-outline' => 'icon-arrow-move-outline', 'icon-watch4' => 'icon-watch4', 'icon-warning-outline' => 'icon-warning-outline', 'icon-time3' => 'icon-time3', 'icon-radar-outline' => 'icon-radar-outline', 'icon-lock-open-outline' => 'icon-lock-open-outline', 'icon-location-arrow-outline' => 'icon-location-arrow-outline', 'icon-info-outline' => 'icon-info-outline', 'icon-backspace-outline' => 'icon-backspace-outline', 'icon-attachment-outline' => 'icon-attachment-outline', 'icon-user-outline' => 'icon-user-outline', 'icon-user-delete-outline' => 'icon-user-delete-outline', 'icon-user-add-outline' => 'icon-user-add-outline', 'icon-lock-closed-outline' => 'icon-lock-closed-outline', 'icon-group-outline' => 'icon-group-outline', 'icon-chart-pie-outline' => 'icon-chart-pie-outline', 'icon-chart-line-outline' => 'icon-chart-line-outline', 'icon-chart-bar-outline' => 'icon-chart-bar-outline', 'icon-chart-area-outline' => 'icon-chart-area-outline', 'icon-video-outline' => 'icon-video-outline', 'icon-point-of-interest-outline' => 'icon-point-of-interest-outline', 'icon-map7' => 'icon-map7', 'icon-key-outline' => 'icon-key-outline', 'icon-infinity-outline' => 'icon-infinity-outline', 'icon-globe-outline' => 'icon-globe-outline', 'icon-eye-outline' => 'icon-eye-outline', 'icon-cog-outline' => 'icon-cog-outline', 'icon-camera-outline' => 'icon-camera-outline', 'icon-upload-outline' => 'icon-upload-outline', 'icon-support4' => 'icon-support4', 'icon-scissors-outline' => 'icon-scissors-outline', 'icon-refresh-outline' => 'icon-refresh-outline', 'icon-info-large-outline' => 'icon-info-large-outline', 'icon-eject-outline' => 'icon-eject-outline', 'icon-download-outline' => 'icon-download-outline', 'icon-battery-mid' => 'icon-battery-mid', 'icon-battery-low2' => 'icon-battery-low2', 'icon-battery-high' => 'icon-battery-high', 'icon-zoom-outline' => 'icon-zoom-outline', 'icon-zoom-out-outline' => 'icon-zoom-out-outline', 'icon-zoom-in-outline' => 'icon-zoom-in-outline', 'icon-tag15' => 'icon-tag15', 'icon-tabs-outline' => 'icon-tabs-outline', 'icon-pin-outline' => 'icon-pin-outline', 'icon-message-typing' => 'icon-message-typing', 'icon-directions' => 'icon-directions', 'icon-battery-full3' => 'icon-battery-full3', 'icon-battery-charge' => 'icon-battery-charge', 'icon-pipette' => 'icon-pipette', 'icon-pencil13' => 'icon-pencil13', 'icon-folder11' => 'icon-folder11', 'icon-folder-delete' => 'icon-folder-delete', 'icon-folder-add' => 'icon-folder-add', 'icon-edit4' => 'icon-edit4', 'icon-document2' => 'icon-document2', 'icon-document-delete' => 'icon-document-delete', 'icon-document-add' => 'icon-document-add', 'icon-brush4' => 'icon-brush4', 'icon-thumbs-up7' => 'icon-thumbs-up7', 'icon-thumbs-down3' => 'icon-thumbs-down3', 'icon-pen11' => 'icon-pen11', 'icon-sort-numerically-outline' => 'icon-sort-numerically-outline', 'icon-sort-alphabetically-outline' => 'icon-sort-alphabetically-outline', 'icon-social-last-fm-circular' => 'icon-social-last-fm-circular', 'icon-social-github-circular' => 'icon-social-github-circular', 'icon-compass9' => 'icon-compass9', 'icon-bookmark11' => 'icon-bookmark11', 'icon-input-checked-outline' => 'icon-input-checked-outline', 'icon-code-outline' => 'icon-code-outline', 'icon-calender-outline' => 'icon-calender-outline', 'icon-business-card' => 'icon-business-card', 'icon-arrow-up19' => 'icon-arrow-up19', 'icon-arrow-sync-outline' => 'icon-arrow-sync-outline', 'icon-arrow-right21' => 'icon-arrow-right21', 'icon-arrow-repeat-outline' => 'icon-arrow-repeat-outline', 'icon-arrow-loop-outline' => 'icon-arrow-loop-outline', 'icon-arrow-left20' => 'icon-arrow-left20', 'icon-flow-switch' => 'icon-flow-switch', 'icon-flow-parallel' => 'icon-flow-parallel', 'icon-flow-merge' => 'icon-flow-merge', 'icon-document-text' => 'icon-document-text', 'icon-clipboard12' => 'icon-clipboard12', 'icon-calculator4' => 'icon-calculator4', 'icon-arrow-minimise-outline' => 'icon-arrow-minimise-outline', 'icon-arrow-maximise-outline' => 'icon-arrow-maximise-outline', 'icon-arrow-down19' => 'icon-arrow-down19', 'icon-gift6' => 'icon-gift6', 'icon-film11' => 'icon-film11', 'icon-database5' => 'icon-database5', 'icon-bell3' => 'icon-bell3', 'icon-anchor-outline' => 'icon-anchor-outline', 'icon-adjust-contrast' => 'icon-adjust-contrast', 'icon-world-outline' => 'icon-world-outline', 'icon-shopping-bag' => 'icon-shopping-bag', 'icon-power-outline' => 'icon-power-outline', 'icon-notes-outline' => 'icon-notes-outline', 'icon-device-tablet' => 'icon-device-tablet', 'icon-device-phone' => 'icon-device-phone', 'icon-device-laptop' => 'icon-device-laptop', 'icon-device-desktop' => 'icon-device-desktop', 'icon-briefcase7' => 'icon-briefcase7', 'icon-stopwatch2' => 'icon-stopwatch2', 'icon-spanner-outline' => 'icon-spanner-outline', 'icon-puzzle-outline' => 'icon-puzzle-outline', 'icon-printer4' => 'icon-printer4', 'icon-pi-outline' => 'icon-pi-outline', 'icon-lightbulb4' => 'icon-lightbulb4', 'icon-flag-outline' => 'icon-flag-outline', 'icon-contacts' => 'icon-contacts', 'icon-archive7' => 'icon-archive7', 'icon-weather-stormy' => 'icon-weather-stormy', 'icon-weather-shower' => 'icon-weather-shower', 'icon-weather-partly-sunny' => 'icon-weather-partly-sunny', 'icon-weather-downpour' => 'icon-weather-downpour', 'icon-weather-cloudy' => 'icon-weather-cloudy', 'icon-plane-outline' => 'icon-plane-outline', 'icon-phone-outline' => 'icon-phone-outline', 'icon-microphone-outline' => 'icon-microphone-outline', 'icon-weather-windy' => 'icon-weather-windy', 'icon-weather-windy-cloudy' => 'icon-weather-windy-cloudy', 'icon-weather-sunny' => 'icon-weather-sunny', 'icon-weather-snow2' => 'icon-weather-snow2', 'icon-weather-night' => 'icon-weather-night', 'icon-media-stop-outline' => 'icon-media-stop-outline', 'icon-media-rewind-outline' => 'icon-media-rewind-outline', 'icon-media-record-outline' => 'icon-media-record-outline', 'icon-media-play-outline' => 'icon-media-play-outline', 'icon-media-fast-forward-outline' => 'icon-media-fast-forward-outline', 'icon-media-eject-outline' => 'icon-media-eject-outline', 'icon-wine2' => 'icon-wine2', 'icon-waves-outline' => 'icon-waves-outline', 'icon-ticket5' => 'icon-ticket5', 'icon-tags4' => 'icon-tags4', 'icon-plug' => 'icon-plug', 'icon-headphones6' => 'icon-headphones6', 'icon-credit-card' => 'icon-credit-card', 'icon-coffee3' => 'icon-coffee3', 'icon-book8' => 'icon-book8', 'icon-beer' => 'icon-beer', 'icon-volume10' => 'icon-volume10', 'icon-volume-up' => 'icon-volume-up', 'icon-volume-mute8' => 'icon-volume-mute8', 'icon-volume-down' => 'icon-volume-down', 'icon-social-vimeo-circular' => 'icon-social-vimeo-circular', 'icon-social-twitter-circular' => 'icon-social-twitter-circular', 'icon-social-pinterest-circular' => 'icon-social-pinterest-circular', 'icon-social-linkedin-circular' => 'icon-social-linkedin-circular', 'icon-social-facebook-circular' => 'icon-social-facebook-circular', 'icon-social-dribbble-circular' => 'icon-social-dribbble-circular', 'icon-tree7' => 'icon-tree7', 'icon-thermometer3' => 'icon-thermometer3', 'icon-social-tumbler-circular' => 'icon-social-tumbler-circular', 'icon-social-skype-outline' => 'icon-social-skype-outline', 'icon-social-flickr-circular' => 'icon-social-flickr-circular', 'icon-social-at-circular' => 'icon-social-at-circular', 'icon-shopping-cart' => 'icon-shopping-cart', 'icon-messages' => 'icon-messages', 'icon-leaf4' => 'icon-leaf4', 'icon-feather2' => 'icon-feather2', 'icon-type3' => 'icon-type3', 'icon-box5' => 'icon-box5', 'icon-archive8' => 'icon-archive8', 'icon-envelope8' => 'icon-envelope8', 'icon-email2' => 'icon-email2', 'icon-files3' => 'icon-files3', 'icon-uniED45' => 'icon-uniED45', 'icon-file-settings' => 'icon-file-settings', 'icon-file-add' => 'icon-file-add', 'icon-file16' => 'icon-file16', 'icon-align-left2' => 'icon-align-left2', 'icon-align-right2' => 'icon-align-right2', 'icon-align-center' => 'icon-align-center', 'icon-align-justify' => 'icon-align-justify', 'icon-file-broken' => 'icon-file-broken', 'icon-browser3' => 'icon-browser3', 'icon-windows3' => 'icon-windows3', 'icon-window4' => 'icon-window4', 'icon-folder12' => 'icon-folder12', 'icon-folder-add2' => 'icon-folder-add2', 'icon-folder-settings' => 'icon-folder-settings', 'icon-folder-check' => 'icon-folder-check', 'icon-wifi-low' => 'icon-wifi-low', 'icon-wifi-mid' => 'icon-wifi-mid', 'icon-wifi-full' => 'icon-wifi-full', 'icon-connection-empty' => 'icon-connection-empty', 'icon-connection-25' => 'icon-connection-25', 'icon-connection-50' => 'icon-connection-50', 'icon-connection-75' => 'icon-connection-75', 'icon-connection-full' => 'icon-connection-full', 'icon-list13' => 'icon-list13', 'icon-grid13' => 'icon-grid13', 'icon-uniED5F' => 'icon-uniED5F', 'icon-battery-charging2' => 'icon-battery-charging2', 'icon-battery-empty2' => 'icon-battery-empty2', 'icon-battery-25' => 'icon-battery-25', 'icon-battery-50' => 'icon-battery-50', 'icon-battery-75' => 'icon-battery-75', 'icon-battery-full4' => 'icon-battery-full4', 'icon-settings5' => 'icon-settings5', 'icon-arrow-left21' => 'icon-arrow-left21', 'icon-arrow-up20' => 'icon-arrow-up20', 'icon-arrow-down20' => 'icon-arrow-down20', 'icon-arrow-right22' => 'icon-arrow-right22', 'icon-reload2' => 'icon-reload2', 'icon-refresh6' => 'icon-refresh6', 'icon-volume11' => 'icon-volume11', 'icon-volume-increase3' => 'icon-volume-increase3', 'icon-volume-decrease3' => 'icon-volume-decrease3', 'icon-mute2' => 'icon-mute2', 'icon-microphone8' => 'icon-microphone8', 'icon-microphone-off' => 'icon-microphone-off', 'icon-book9' => 'icon-book9', 'icon-checkmark10' => 'icon-checkmark10', 'icon-checkbox-checked3' => 'icon-checkbox-checked3', 'icon-checkbox2' => 'icon-checkbox2', 'icon-paperclip4' => 'icon-paperclip4', 'icon-download15' => 'icon-download15', 'icon-tag16' => 'icon-tag16', 'icon-trashcan5' => 'icon-trashcan5', 'icon-search13' => 'icon-search13', 'icon-zoomin7' => 'icon-zoomin7', 'icon-zoomout7' => 'icon-zoomout7', 'icon-chat10' => 'icon-chat10', 'icon-chat-1' => 'icon-chat-1', 'icon-chat-2' => 'icon-chat-2', 'icon-chat-3' => 'icon-chat-3', 'icon-comment4' => 'icon-comment4', 'icon-calendar15' => 'icon-calendar15', 'icon-bookmark12' => 'icon-bookmark12', 'icon-email3' => 'icon-email3', 'icon-heart20' => 'icon-heart20', 'icon-enter6' => 'icon-enter6', 'icon-cloud17' => 'icon-cloud17', 'icon-book10' => 'icon-book10', 'icon-star14' => 'icon-star14', 'icon-clock16' => 'icon-clock16', 'icon-printer5' => 'icon-printer5', 'icon-home18' => 'icon-home18', 'icon-flag11' => 'icon-flag11', 'icon-meter3' => 'icon-meter3', 'icon-switch5' => 'icon-switch5', 'icon-forbidden' => 'icon-forbidden', 'icon-lock8' => 'icon-lock8', 'icon-unlocked7' => 'icon-unlocked7', 'icon-unlocked8' => 'icon-unlocked8', 'icon-users9' => 'icon-users9', 'icon-user19' => 'icon-user19', 'icon-users10' => 'icon-users10', 'icon-user20' => 'icon-user20', 'icon-bullhorn2' => 'icon-bullhorn2', 'icon-share8' => 'icon-share8', 'icon-screen7' => 'icon-screen7', 'icon-phone17' => 'icon-phone17', 'icon-phone-portrait' => 'icon-phone-portrait', 'icon-phone-landscape' => 'icon-phone-landscape', 'icon-tablet4' => 'icon-tablet4', 'icon-tablet-landscape' => 'icon-tablet-landscape', 'icon-laptop4' => 'icon-laptop4', 'icon-camera25' => 'icon-camera25', 'icon-microwaveoven' => 'icon-microwaveoven', 'icon-creditcards' => 'icon-creditcards', 'icon-calculator5' => 'icon-calculator5', 'icon-bag6' => 'icon-bag6', 'icon-diamond5' => 'icon-diamond5', 'icon-drink7' => 'icon-drink7', 'icon-shorts' => 'icon-shorts', 'icon-vcard2' => 'icon-vcard2', 'icon-sun7' => 'icon-sun7', 'icon-bill' => 'icon-bill', 'icon-coffee4' => 'icon-coffee4', 'icon-uniEDAE' => 'icon-uniEDAE', 'icon-newspaper6' => 'icon-newspaper6', 'icon-stack9' => 'icon-stack9', 'icon-mapmarker' => 'icon-mapmarker', 'icon-map8' => 'icon-map8', 'icon-support5' => 'icon-support5', 'icon-uniEDB4' => 'icon-uniEDB4', 'icon-barbell' => 'icon-barbell', 'icon-stopwatch3' => 'icon-stopwatch3', 'icon-atom5' => 'icon-atom5', 'icon-syringe' => 'icon-syringe', 'icon-health3' => 'icon-health3', 'icon-bolt3' => 'icon-bolt3', 'icon-pill' => 'icon-pill', 'icon-bones' => 'icon-bones', 'icon-lab5' => 'icon-lab5', 'icon-clipboard13' => 'icon-clipboard13', 'icon-mug5' => 'icon-mug5', 'icon-bucket' => 'icon-bucket', 'icon-select' => 'icon-select', 'icon-graph' => 'icon-graph', 'icon-crop6' => 'icon-crop6', 'icon-image11' => 'icon-image11', 'icon-cube6' => 'icon-cube6', 'icon-bars8' => 'icon-bars8', 'icon-chart10' => 'icon-chart10', 'icon-pencil14' => 'icon-pencil14', 'icon-measure' => 'icon-measure', 'icon-eyedropper5' => 'icon-eyedropper5', 'icon-eye15' => 'icon-eye15', 'icon-paper-clip' => 'icon-paper-clip', 'icon-mail9' => 'icon-mail9', 'icon-toggle' => 'icon-toggle', 'icon-layout15' => 'icon-layout15', 'icon-link12' => 'icon-link12', 'icon-bell4' => 'icon-bell4', 'icon-lock9' => 'icon-lock9', 'icon-unlock' => 'icon-unlock', 'icon-ribbon2' => 'icon-ribbon2', 'icon-image12' => 'icon-image12', 'icon-signal' => 'icon-signal', 'icon-target10' => 'icon-target10', 'icon-clipboard14' => 'icon-clipboard14', 'icon-clock17' => 'icon-clock17', 'icon-watch5' => 'icon-watch5', 'icon-air-play' => 'icon-air-play', 'icon-camera26' => 'icon-camera26', 'icon-video4' => 'icon-video4', 'icon-disc' => 'icon-disc', 'icon-printer6' => 'icon-printer6', 'icon-monitor4' => 'icon-monitor4', 'icon-server2' => 'icon-server2', 'icon-cog15' => 'icon-cog15', 'icon-heart21' => 'icon-heart21', 'icon-paragraph' => 'icon-paragraph', 'icon-align-justify2' => 'icon-align-justify2', 'icon-align-left3' => 'icon-align-left3', 'icon-align-center2' => 'icon-align-center2', 'icon-align-right3' => 'icon-align-right3', 'icon-book11' => 'icon-book11', 'icon-layers3' => 'icon-layers3', 'icon-stack10' => 'icon-stack10', 'icon-stack-2' => 'icon-stack-2', 'icon-paper' => 'icon-paper', 'icon-paper-stack' => 'icon-paper-stack', 'icon-search14' => 'icon-search14', 'icon-zoom-in2' => 'icon-zoom-in2', 'icon-zoom-out2' => 'icon-zoom-out2', 'icon-reply5' => 'icon-reply5', 'icon-circle-plus' => 'icon-circle-plus', 'icon-circle-minus' => 'icon-circle-minus', 'icon-circle-check' => 'icon-circle-check', 'icon-circle-cross' => 'icon-circle-cross', 'icon-square-plus' => 'icon-square-plus', 'icon-square-minus' => 'icon-square-minus', 'icon-square-check' => 'icon-square-check', 'icon-square-cross' => 'icon-square-cross', 'icon-microphone9' => 'icon-microphone9', 'icon-record' => 'icon-record', 'icon-skip-back' => 'icon-skip-back', 'icon-rewind2' => 'icon-rewind2', 'icon-play8' => 'icon-play8', 'icon-pause6' => 'icon-pause6', 'icon-stop7' => 'icon-stop7', 'icon-fast-forward' => 'icon-fast-forward', 'icon-skip-forward' => 'icon-skip-forward', 'icon-shuffle4' => 'icon-shuffle4', 'icon-repeat' => 'icon-repeat', 'icon-folder13' => 'icon-folder13', 'icon-umbrella5' => 'icon-umbrella5', 'icon-moon6' => 'icon-moon6', 'icon-thermometer4' => 'icon-thermometer4', 'icon-drop' => 'icon-drop', 'icon-sun8' => 'icon-sun8', 'icon-cloud18' => 'icon-cloud18', 'icon-cloud-upload3' => 'icon-cloud-upload3', 'icon-cloud-download3' => 'icon-cloud-download3', 'icon-upload13' => 'icon-upload13', 'icon-download16' => 'icon-download16', 'icon-location15' => 'icon-location15', 'icon-location-2' => 'icon-location-2', 'icon-map9' => 'icon-map9', 'icon-battery9' => 'icon-battery9', 'icon-head' => 'icon-head', 'icon-briefcase8' => 'icon-briefcase8', 'icon-speech-bubble' => 'icon-speech-bubble', 'icon-anchor6' => 'icon-anchor6', 'icon-globe10' => 'icon-globe10', 'icon-box6' => 'icon-box6', 'icon-reload3' => 'icon-reload3', 'icon-share9' => 'icon-share9', 'icon-marquee2' => 'icon-marquee2', 'icon-marquee-plus' => 'icon-marquee-plus', 'icon-marquee-minus' => 'icon-marquee-minus', 'icon-tag17' => 'icon-tag17', 'icon-power4' => 'icon-power4', 'icon-command2' => 'icon-command2', 'icon-alt' => 'icon-alt', 'icon-esc2' => 'icon-esc2', 'icon-bar-graph' => 'icon-bar-graph', 'icon-bar-graph-2' => 'icon-bar-graph-2', 'icon-pie-graph' => 'icon-pie-graph', 'icon-star15' => 'icon-star15', 'icon-arrow-left22' => 'icon-arrow-left22', 'icon-arrow-right23' => 'icon-arrow-right23', 'icon-arrow-up21' => 'icon-arrow-up21', 'icon-arrow-down21' => 'icon-arrow-down21', 'icon-volume12' => 'icon-volume12', 'icon-mute3' => 'icon-mute3', 'icon-content-right' => 'icon-content-right', 'icon-content-left' => 'icon-content-left', 'icon-grid14' => 'icon-grid14', 'icon-grid-2' => 'icon-grid-2', 'icon-columns' => 'icon-columns', 'icon-loader' => 'icon-loader', 'icon-bag7' => 'icon-bag7', 'icon-ban' => 'icon-ban', 'icon-flag12' => 'icon-flag12', 'icon-trash5' => 'icon-trash5', 'icon-expand7' => 'icon-expand7', 'icon-contract6' => 'icon-contract6', 'icon-maximize2' => 'icon-maximize2', 'icon-minimize' => 'icon-minimize', 'icon-plus9' => 'icon-plus9', 'icon-minus10' => 'icon-minus10', 'icon-check' => 'icon-check', 'icon-cross3' => 'icon-cross3', 'icon-move4' => 'icon-move4', 'icon-delete2' => 'icon-delete2', 'icon-menu13' => 'icon-menu13', 'icon-archive9' => 'icon-archive9', 'icon-inbox6' => 'icon-inbox6', 'icon-outbox' => 'icon-outbox', 'icon-file17' => 'icon-file17', 'icon-file-add2' => 'icon-file-add2', 'icon-file-subtract' => 'icon-file-subtract', 'icon-help2' => 'icon-help2', 'icon-open2' => 'icon-open2', 'icon-ellipsis' => 'icon-ellipsis', 'icon-glass3' => 'icon-glass3', 'icon-music11' => 'icon-music11', 'icon-search15' => 'icon-search15', 'icon-envelope-o' => 'icon-envelope-o', 'icon-heart22' => 'icon-heart22', 'icon-star16' => 'icon-star16', 'icon-star-o' => 'icon-star-o', 'icon-user21' => 'icon-user21', 'icon-film12' => 'icon-film12', 'icon-th-large2' => 'icon-th-large2', 'icon-th' => 'icon-th', 'icon-th-list2' => 'icon-th-list2', 'icon-check2' => 'icon-check2', 'icon-times2' => 'icon-times2', 'icon-search-plus' => 'icon-search-plus', 'icon-search-minus' => 'icon-search-minus', 'icon-power-off' => 'icon-power-off', 'icon-signal2' => 'icon-signal2', 'icon-gear' => 'icon-gear', 'icon-trash-o' => 'icon-trash-o', 'icon-home19' => 'icon-home19', 'icon-file-o' => 'icon-file-o', 'icon-clock-o' => 'icon-clock-o', 'icon-road2' => 'icon-road2', 'icon-download17' => 'icon-download17', 'icon-arrow-circle-o-down' => 'icon-arrow-circle-o-down', 'icon-arrow-circle-o-up' => 'icon-arrow-circle-o-up', 'icon-inbox7' => 'icon-inbox7', 'icon-play-circle-o' => 'icon-play-circle-o', 'icon-rotate-right' => 'icon-rotate-right', 'icon-refresh7' => 'icon-refresh7', 'icon-list-alt' => 'icon-list-alt', 'icon-lock10' => 'icon-lock10', 'icon-flag13' => 'icon-flag13', 'icon-headphones7' => 'icon-headphones7', 'icon-volume-off' => 'icon-volume-off', 'icon-volume-down2' => 'icon-volume-down2', 'icon-volume-up2' => 'icon-volume-up2', 'icon-qrcode2' => 'icon-qrcode2', 'icon-barcode5' => 'icon-barcode5', 'icon-tag18' => 'icon-tag18', 'icon-tags5' => 'icon-tags5', 'icon-book12' => 'icon-book12', 'icon-bookmark13' => 'icon-bookmark13', 'icon-print4' => 'icon-print4', 'icon-camera27' => 'icon-camera27', 'icon-font2' => 'icon-font2', 'icon-bold3' => 'icon-bold3', 'icon-italic3' => 'icon-italic3', 'icon-text-height2' => 'icon-text-height2', 'icon-text-width2' => 'icon-text-width2', 'icon-align-left4' => 'icon-align-left4', 'icon-align-center3' => 'icon-align-center3', 'icon-align-right4' => 'icon-align-right4', 'icon-align-justify3' => 'icon-align-justify3', 'icon-list14' => 'icon-list14', 'icon-dedent' => 'icon-dedent', 'icon-indent' => 'icon-indent', 'icon-video-camera' => 'icon-video-camera', 'icon-picture-o' => 'icon-picture-o', 'icon-pencil15' => 'icon-pencil15', 'icon-map-marker' => 'icon-map-marker', 'icon-adjust' => 'icon-adjust', 'icon-tint' => 'icon-tint', 'icon-edit5' => 'icon-edit5', 'icon-share-square-o' => 'icon-share-square-o', 'icon-check-square-o' => 'icon-check-square-o', 'icon-arrows' => 'icon-arrows', 'icon-step-backward' => 'icon-step-backward', 'icon-fast-backward' => 'icon-fast-backward', 'icon-backward3' => 'icon-backward3', 'icon-play9' => 'icon-play9', 'icon-pause7' => 'icon-pause7', 'icon-stop8' => 'icon-stop8', 'icon-forward7' => 'icon-forward7', 'icon-fast-forward2' => 'icon-fast-forward2', 'icon-step-forward' => 'icon-step-forward', 'icon-eject4' => 'icon-eject4', 'icon-chevron-left2' => 'icon-chevron-left2', 'icon-chevron-right2' => 'icon-chevron-right2', 'icon-plus-circle3' => 'icon-plus-circle3', 'icon-minus-circle3' => 'icon-minus-circle3', 'icon-times-circle' => 'icon-times-circle', 'icon-check-circle' => 'icon-check-circle', 'icon-question-circle' => 'icon-question-circle', 'icon-info-circle' => 'icon-info-circle', 'icon-crosshairs' => 'icon-crosshairs', 'icon-times-circle-o' => 'icon-times-circle-o', 'icon-check-circle-o' => 'icon-check-circle-o', 'icon-ban2' => 'icon-ban2', 'icon-arrow-left23' => 'icon-arrow-left23', 'icon-arrow-right24' => 'icon-arrow-right24', 'icon-arrow-up22' => 'icon-arrow-up22', 'icon-arrow-down22' => 'icon-arrow-down22', 'icon-mail-forward' => 'icon-mail-forward', 'icon-expand8' => 'icon-expand8', 'icon-compress' => 'icon-compress', 'icon-plus10' => 'icon-plus10', 'icon-minus11' => 'icon-minus11', 'icon-asterisk' => 'icon-asterisk', 'icon-exclamation-circle' => 'icon-exclamation-circle', 'icon-gift7' => 'icon-gift7', 'icon-leaf5' => 'icon-leaf5', 'icon-fire4' => 'icon-fire4', 'icon-eye16' => 'icon-eye16', 'icon-eye-slash' => 'icon-eye-slash', 'icon-warning6' => 'icon-warning6', 'icon-plane3' => 'icon-plane3', 'icon-calendar16' => 'icon-calendar16', 'icon-random' => 'icon-random', 'icon-comment5' => 'icon-comment5', 'icon-magnet6' => 'icon-magnet6', 'icon-chevron-up' => 'icon-chevron-up', 'icon-chevron-down' => 'icon-chevron-down', 'icon-retweet2' => 'icon-retweet2', 'icon-shopping-cart2' => 'icon-shopping-cart2', 'icon-folder14' => 'icon-folder14', 'icon-folder-open4' => 'icon-folder-open4', 'icon-arrows-v' => 'icon-arrows-v', 'icon-arrows-h' => 'icon-arrows-h', 'icon-bar-chart-o' => 'icon-bar-chart-o', 'icon-twitter-square' => 'icon-twitter-square', 'icon-facebook-square' => 'icon-facebook-square', 'icon-camera-retro' => 'icon-camera-retro', 'icon-key12' => 'icon-key12', 'icon-gears2' => 'icon-gears2', 'icon-comments3' => 'icon-comments3', 'icon-thumbs-o-up' => 'icon-thumbs-o-up', 'icon-thumbs-o-down' => 'icon-thumbs-o-down', 'icon-star-half' => 'icon-star-half', 'icon-heart-o' => 'icon-heart-o', 'icon-sign-out' => 'icon-sign-out', 'icon-linkedin-square' => 'icon-linkedin-square', 'icon-thumb-tack' => 'icon-thumb-tack', 'icon-external-link' => 'icon-external-link', 'icon-sign-in' => 'icon-sign-in', 'icon-trophy5' => 'icon-trophy5', 'icon-github-square' => 'icon-github-square', 'icon-upload14' => 'icon-upload14', 'icon-lemon-o' => 'icon-lemon-o', 'icon-phone18' => 'icon-phone18', 'icon-square-o' => 'icon-square-o', 'icon-bookmark-o' => 'icon-bookmark-o', 'icon-phone-square' => 'icon-phone-square', 'icon-twitter6' => 'icon-twitter6', 'icon-facebook9' => 'icon-facebook9', 'icon-github6' => 'icon-github6', 'icon-unlock2' => 'icon-unlock2', 'icon-credit-card2' => 'icon-credit-card2', 'icon-rss4' => 'icon-rss4', 'icon-hdd-o' => 'icon-hdd-o', 'icon-bullhorn3' => 'icon-bullhorn3', 'icon-bell5' => 'icon-bell5', 'icon-certificate2' => 'icon-certificate2', 'icon-hand-o-right' => 'icon-hand-o-right', 'icon-hand-o-left' => 'icon-hand-o-left', 'icon-hand-o-up' => 'icon-hand-o-up', 'icon-hand-o-down' => 'icon-hand-o-down', 'icon-arrow-circle-left' => 'icon-arrow-circle-left', 'icon-arrow-circle-right' => 'icon-arrow-circle-right', 'icon-arrow-circle-up' => 'icon-arrow-circle-up', 'icon-arrow-circle-down' => 'icon-arrow-circle-down', 'icon-globe11' => 'icon-globe11', 'icon-wrench7' => 'icon-wrench7', 'icon-tasks' => 'icon-tasks', 'icon-filter6' => 'icon-filter6', 'icon-briefcase9' => 'icon-briefcase9', 'icon-arrows-alt' => 'icon-arrows-alt', 'icon-group2' => 'icon-group2', 'icon-chain' => 'icon-chain', 'icon-cloud19' => 'icon-cloud19', 'icon-flask' => 'icon-flask', 'icon-cut' => 'icon-cut', 'icon-copy5' => 'icon-copy5', 'icon-paperclip5' => 'icon-paperclip5', 'icon-save' => 'icon-save', 'icon-square4' => 'icon-square4', 'icon-bars9' => 'icon-bars9', 'icon-list-ul' => 'icon-list-ul', 'icon-list-ol' => 'icon-list-ol', 'icon-strikethrough4' => 'icon-strikethrough4', 'icon-underline3' => 'icon-underline3', 'icon-table3' => 'icon-table3', 'icon-magic' => 'icon-magic', 'icon-truck5' => 'icon-truck5', 'icon-pinterest3' => 'icon-pinterest3', 'icon-pinterest-square' => 'icon-pinterest-square', 'icon-google-plus-square' => 'icon-google-plus-square', 'icon-google-plus' => 'icon-google-plus', 'icon-money' => 'icon-money', 'icon-caret-down' => 'icon-caret-down', 'icon-caret-up' => 'icon-caret-up', 'icon-caret-left' => 'icon-caret-left', 'icon-caret-right' => 'icon-caret-right', 'icon-columns2' => 'icon-columns2', 'icon-unsorted' => 'icon-unsorted', 'icon-sort-down' => 'icon-sort-down', 'icon-sort-up' => 'icon-sort-up', 'icon-envelope9' => 'icon-envelope9', 'icon-linkedin3' => 'icon-linkedin3', 'icon-rotate-left' => 'icon-rotate-left', 'icon-legal' => 'icon-legal', 'icon-dashboard2' => 'icon-dashboard2', 'icon-comment-o' => 'icon-comment-o', 'icon-comments-o' => 'icon-comments-o', 'icon-flash2' => 'icon-flash2', 'icon-sitemap3' => 'icon-sitemap3', 'icon-umbrella6' => 'icon-umbrella6', 'icon-paste4' => 'icon-paste4', 'icon-lightbulb-o' => 'icon-lightbulb-o', 'icon-exchange' => 'icon-exchange', 'icon-cloud-download4' => 'icon-cloud-download4', 'icon-cloud-upload4' => 'icon-cloud-upload4', 'icon-user-md' => 'icon-user-md', 'icon-stethoscope' => 'icon-stethoscope', 'icon-suitcase5' => 'icon-suitcase5', 'icon-bell-o' => 'icon-bell-o', 'icon-coffee5' => 'icon-coffee5', 'icon-cutlery' => 'icon-cutlery', 'icon-file-text-o' => 'icon-file-text-o', 'icon-building-o' => 'icon-building-o', 'icon-hospital-o' => 'icon-hospital-o', 'icon-ambulance' => 'icon-ambulance', 'icon-medkit' => 'icon-medkit', 'icon-fighter-jet' => 'icon-fighter-jet', 'icon-beer2' => 'icon-beer2', 'icon-h-square' => 'icon-h-square', 'icon-plus-square' => 'icon-plus-square', 'icon-angle-double-left' => 'icon-angle-double-left', 'icon-angle-double-right' => 'icon-angle-double-right', 'icon-angle-double-up' => 'icon-angle-double-up', 'icon-angle-double-down' => 'icon-angle-double-down', 'icon-angle-left' => 'icon-angle-left', 'icon-angle-right' => 'icon-angle-right', 'icon-angle-up' => 'icon-angle-up', 'icon-angle-down' => 'icon-angle-down', 'icon-desktop3' => 'icon-desktop3', 'icon-laptop5' => 'icon-laptop5', 'icon-tablet5' => 'icon-tablet5', 'icon-mobile-phone' => 'icon-mobile-phone', 'icon-circle-o' => 'icon-circle-o', 'icon-quote-left' => 'icon-quote-left', 'icon-quote-right' => 'icon-quote-right', 'icon-spinner14' => 'icon-spinner14', 'icon-circle4' => 'icon-circle4', 'icon-mail-reply' => 'icon-mail-reply', 'icon-github-alt' => 'icon-github-alt', 'icon-folder-o' => 'icon-folder-o', 'icon-folder-open-o' => 'icon-folder-open-o', 'icon-smile-o' => 'icon-smile-o', 'icon-frown-o' => 'icon-frown-o', 'icon-meh-o' => 'icon-meh-o', 'icon-gamepad7' => 'icon-gamepad7', 'icon-keyboard-o' => 'icon-keyboard-o', 'icon-flag-o' => 'icon-flag-o', 'icon-flag-checkered' => 'icon-flag-checkered', 'icon-terminal' => 'icon-terminal', 'icon-code4' => 'icon-code4', 'icon-reply-all' => 'icon-reply-all', 'icon-star-half-empty' => 'icon-star-half-empty', 'icon-location-arrow2' => 'icon-location-arrow2', 'icon-crop7' => 'icon-crop7', 'icon-code-fork' => 'icon-code-fork', 'icon-unlink' => 'icon-unlink', 'icon-question8' => 'icon-question8', 'icon-info10' => 'icon-info10', 'icon-exclamation2' => 'icon-exclamation2', 'icon-superscript3' => 'icon-superscript3', 'icon-subscript3' => 'icon-subscript3', 'icon-eraser' => 'icon-eraser', 'icon-puzzle-piece' => 'icon-puzzle-piece', 'icon-microphone10' => 'icon-microphone10', 'icon-microphone-slash' => 'icon-microphone-slash', 'icon-shield7' => 'icon-shield7', 'icon-calendar-o' => 'icon-calendar-o', 'icon-fire-extinguisher' => 'icon-fire-extinguisher', 'icon-rocket3' => 'icon-rocket3', 'icon-maxcdn' => 'icon-maxcdn', 'icon-chevron-circle-left' => 'icon-chevron-circle-left', 'icon-chevron-circle-right' => 'icon-chevron-circle-right', 'icon-chevron-circle-up' => 'icon-chevron-circle-up', 'icon-chevron-circle-down' => 'icon-chevron-circle-down', 'icon-html53' => 'icon-html53', 'icon-css32' => 'icon-css32', 'icon-anchor7' => 'icon-anchor7', 'icon-unlock-alt' => 'icon-unlock-alt', 'icon-bullseye' => 'icon-bullseye', 'icon-ellipsis-h' => 'icon-ellipsis-h', 'icon-ellipsis-v' => 'icon-ellipsis-v', 'icon-rss-square' => 'icon-rss-square', 'icon-play-circle' => 'icon-play-circle', 'icon-ticket6' => 'icon-ticket6', 'icon-minus-square' => 'icon-minus-square', 'icon-minus-square-o' => 'icon-minus-square-o', 'icon-level-up' => 'icon-level-up', 'icon-level-down' => 'icon-level-down', 'icon-check-square' => 'icon-check-square', 'icon-pencil-square' => 'icon-pencil-square', 'icon-external-link-square' => 'icon-external-link-square', 'icon-share-square' => 'icon-share-square', 'icon-compass10' => 'icon-compass10', 'icon-toggle-down' => 'icon-toggle-down', 'icon-toggle-up' => 'icon-toggle-up', 'icon-toggle-right' => 'icon-toggle-right', 'icon-euro' => 'icon-euro', 'icon-gbp' => 'icon-gbp', 'icon-dollar3' => 'icon-dollar3', 'icon-rupee' => 'icon-rupee', 'icon-cny' => 'icon-cny', 'icon-ruble' => 'icon-ruble', 'icon-won' => 'icon-won', 'icon-bitcoin' => 'icon-bitcoin', 'icon-file18' => 'icon-file18', 'icon-file-text' => 'icon-file-text', 'icon-sort-alpha-asc' => 'icon-sort-alpha-asc', 'icon-sort-alpha-desc' => 'icon-sort-alpha-desc', 'icon-sort-amount-asc' => 'icon-sort-amount-asc', 'icon-sort-amount-desc' => 'icon-sort-amount-desc', 'icon-sort-numeric-asc' => 'icon-sort-numeric-asc', 'icon-sort-numeric-desc' => 'icon-sort-numeric-desc', 'icon-thumbs-up8' => 'icon-thumbs-up8', 'icon-thumbs-down4' => 'icon-thumbs-down4', 'icon-youtube-square' => 'icon-youtube-square', 'icon-youtube3' => 'icon-youtube3', 'icon-xing3' => 'icon-xing3', 'icon-xing-square' => 'icon-xing-square', 'icon-youtube-play' => 'icon-youtube-play', 'icon-dropbox' => 'icon-dropbox', 'icon-stack-overflow' => 'icon-stack-overflow', 'icon-instagram4' => 'icon-instagram4', 'icon-flickr5' => 'icon-flickr5', 'icon-adn' => 'icon-adn', 'icon-bitbucket' => 'icon-bitbucket', 'icon-bitbucket-square' => 'icon-bitbucket-square', 'icon-tumblr4' => 'icon-tumblr4', 'icon-tumblr-square' => 'icon-tumblr-square', 'icon-long-arrow-down' => 'icon-long-arrow-down', 'icon-long-arrow-up' => 'icon-long-arrow-up', 'icon-long-arrow-left' => 'icon-long-arrow-left', 'icon-long-arrow-right' => 'icon-long-arrow-right', 'icon-apple3' => 'icon-apple3', 'icon-windows4' => 'icon-windows4', 'icon-android3' => 'icon-android3', 'icon-linux' => 'icon-linux', 'icon-dribbble7' => 'icon-dribbble7', 'icon-skype3' => 'icon-skype3', 'icon-foursquare3' => 'icon-foursquare3', 'icon-trello' => 'icon-trello', 'icon-female3' => 'icon-female3', 'icon-male3' => 'icon-male3', 'icon-gittip' => 'icon-gittip', 'icon-sun-o' => 'icon-sun-o', 'icon-moon-o' => 'icon-moon-o', 'icon-archive10' => 'icon-archive10', 'icon-bug5' => 'icon-bug5', 'icon-vk' => 'icon-vk', 'icon-weibo' => 'icon-weibo', 'icon-renren' => 'icon-renren', 'icon-pagelines' => 'icon-pagelines', 'icon-stack-exchange' => 'icon-stack-exchange', 'icon-arrow-circle-o-right' => 'icon-arrow-circle-o-right', 'icon-arrow-circle-o-left' => 'icon-arrow-circle-o-left', 'icon-toggle-left' => 'icon-toggle-left', 'icon-dot-circle-o' => 'icon-dot-circle-o', 'icon-wheelchair' => 'icon-wheelchair', 'icon-vimeo-square' => 'icon-vimeo-square', 'icon-turkish-lira' => 'icon-turkish-lira', 'icon-plus-square-o' => 'icon-plus-square-o', 'icon-zynga' => 'icon-zynga', 'icon-zootool' => 'icon-zootool', 'icon-zerply' => 'icon-zerply', 'icon-youtube_alt' => 'icon-youtube_alt', 'icon-youtube4' => 'icon-youtube4', 'icon-yelp2' => 'icon-yelp2', 'icon-yahoo_messenger' => 'icon-yahoo_messenger', 'icon-yahoo_buzz' => 'icon-yahoo_buzz', 'icon-yahoo' => 'icon-yahoo', 'icon-xing4' => 'icon-xing4', 'icon-wordpress_alt' => 'icon-wordpress_alt', 'icon-wordpress3' => 'icon-wordpress3', 'icon-wists' => 'icon-wists', 'icon-windows5' => 'icon-windows5', 'icon-wikipedia' => 'icon-wikipedia', 'icon-whatsapp' => 'icon-whatsapp', 'icon-w3' => 'icon-w3', 'icon-virb' => 'icon-virb', 'icon-vimeo4' => 'icon-vimeo4', 'icon-viddler' => 'icon-viddler', 'icon-vcard3' => 'icon-vcard3', 'icon-twitter_alt' => 'icon-twitter_alt', 'icon-twitter7' => 'icon-twitter7', 'icon-tumblr5' => 'icon-tumblr5', 'icon-tripit' => 'icon-tripit', 'icon-tribe_net' => 'icon-tribe_net', 'icon-threewords_me' => 'icon-threewords_me', 'icon-technorati' => 'icon-technorati', 'icon-stumbleupon3' => 'icon-stumbleupon3', 'icon-steam3' => 'icon-steam3', 'icon-squidoo' => 'icon-squidoo', 'icon-squarespace' => 'icon-squarespace', 'icon-spotify' => 'icon-spotify', 'icon-soundcloud3' => 'icon-soundcloud3', 'icon-smugmug' => 'icon-smugmug', 'icon-slideshare' => 'icon-slideshare', 'icon-slashdot' => 'icon-slashdot', 'icon-skype4' => 'icon-skype4', 'icon-simplenote' => 'icon-simplenote', 'icon-sharethis' => 'icon-sharethis', 'icon-scribd' => 'icon-scribd', 'icon-rss5' => 'icon-rss5', 'icon-robo_to' => 'icon-robo_to', 'icon-retweet3' => 'icon-retweet3', 'icon-reddit2' => 'icon-reddit2', 'icon-readernaut' => 'icon-readernaut', 'icon-rdio' => 'icon-rdio', 'icon-quora' => 'icon-quora', 'icon-quik' => 'icon-quik', 'icon-qik' => 'icon-qik', 'icon-posterous' => 'icon-posterous', 'icon-podcast4' => 'icon-podcast4', 'icon-plurk' => 'icon-plurk', 'icon-plixi' => 'icon-plixi', 'icon-playstation' => 'icon-playstation', 'icon-pingchat' => 'icon-pingchat', 'icon-ping' => 'icon-ping', 'icon-pinboard_in' => 'icon-pinboard_in', 'icon-picassa3' => 'icon-picassa3', 'icon-picasa' => 'icon-picasa', 'icon-photobucket' => 'icon-photobucket', 'icon-paypal4' => 'icon-paypal4', 'icon-path' => 'icon-path', 'icon-pandora' => 'icon-pandora', 'icon-orkut' => 'icon-orkut', 'icon-openid' => 'icon-openid', 'icon-official_fm' => 'icon-official_fm', 'icon-newsvine' => 'icon-newsvine', 'icon-myspace_alt' => 'icon-myspace_alt', 'icon-myspace' => 'icon-myspace', 'icon-msn_messenger' => 'icon-msn_messenger', 'icon-mobileme' => 'icon-mobileme', 'icon-mixx_alt' => 'icon-mixx_alt', 'icon-mixx' => 'icon-mixx', 'icon-mister_wong' => 'icon-mister_wong', 'icon-ming' => 'icon-ming', 'icon-metacafe' => 'icon-metacafe', 'icon-meetup' => 'icon-meetup', 'icon-lovedsgn' => 'icon-lovedsgn', 'icon-livejournal' => 'icon-livejournal', 'icon-linkedin_alt' => 'icon-linkedin_alt', 'icon-linkedin4' => 'icon-linkedin4', 'icon-last_fm' => 'icon-last_fm', 'icon-krop' => 'icon-krop', 'icon-kik' => 'icon-kik', 'icon-itunes' => 'icon-itunes', 'icon-instapaper' => 'icon-instapaper', 'icon-identi_ca' => 'icon-identi_ca', 'icon-icq' => 'icon-icq', 'icon-hyves' => 'icon-hyves', 'icon-hype_machine' => 'icon-hype_machine', 'icon-hi5' => 'icon-hi5', 'icon-hacker_news' => 'icon-hacker_news', 'icon-grooveshark' => 'icon-grooveshark', 'icon-gowalla_alt' => 'icon-gowalla_alt', 'icon-gowalla' => 'icon-gowalla', 'icon-google_talk' => 'icon-google_talk', 'icon-google_buzz' => 'icon-google_buzz', 'icon-google2' => 'icon-google2', 'icon-goodreads' => 'icon-goodreads', 'icon-github_alt' => 'icon-github_alt', 'icon-github7' => 'icon-github7', 'icon-gdgt' => 'icon-gdgt', 'icon-friendster' => 'icon-friendster', 'icon-friendfeed' => 'icon-friendfeed', 'icon-foursquare4' => 'icon-foursquare4', 'icon-forrst4' => 'icon-forrst4', 'icon-formspring' => 'icon-formspring', 'icon-folkd' => 'icon-folkd', 'icon-flickr6' => 'icon-flickr6', 'icon-feedburner' => 'icon-feedburner', 'icon-facto_me' => 'icon-facto_me', 'icon-facebook_places' => 'icon-facebook_places', 'icon-facebook_alt' => 'icon-facebook_alt', 'icon-facebook10' => 'icon-facebook10', 'icon-evernote' => 'icon-evernote', 'icon-etsy' => 'icon-etsy', 'icon-ember' => 'icon-ember', 'icon-ebay' => 'icon-ebay', 'icon-dzone' => 'icon-dzone', 'icon-drupal' => 'icon-drupal', 'icon-dropbox2' => 'icon-dropbox2', 'icon-dribbble8' => 'icon-dribbble8', 'icon-diigo' => 'icon-diigo', 'icon-digg_alt' => 'icon-digg_alt', 'icon-digg' => 'icon-digg', 'icon-deviantart3' => 'icon-deviantart3', 'icon-designmoo' => 'icon-designmoo', 'icon-designfloat' => 'icon-designfloat', 'icon-designbump' => 'icon-designbump', 'icon-delicious3' => 'icon-delicious3', 'icon-dailybooth' => 'icon-dailybooth', 'icon-creative_commons' => 'icon-creative_commons', 'icon-coroflot' => 'icon-coroflot', 'icon-cloudapp' => 'icon-cloudapp', 'icon-cinch' => 'icon-cinch', 'icon-brightkite' => 'icon-brightkite', 'icon-bnter' => 'icon-bnter', 'icon-blogger3' => 'icon-blogger3', 'icon-blip' => 'icon-blip', 'icon-bing' => 'icon-bing', 'icon-behance' => 'icon-behance', 'icon-bebo' => 'icon-bebo', 'icon-basecamp' => 'icon-basecamp', 'icon-baidu' => 'icon-baidu', 'icon-aws' => 'icon-aws', 'icon-arto' => 'icon-arto', 'icon-apple4' => 'icon-apple4', 'icon-app_store' => 'icon-app_store', 'icon-amazon' => 'icon-amazon', 'icon-aim_alt' => 'icon-aim_alt', 'icon-aim' => 'icon-aim', 'icon-uniform' => 'icon-uniform', 'icon-windsurfing' => 'icon-windsurfing', 'icon-weight-lifting' => 'icon-weight-lifting', 'icon-water-bottle' => 'icon-water-bottle', 'icon-volleyball' => 'icon-volleyball', 'icon-ultimate' => 'icon-ultimate', 'icon-triathlon' => 'icon-triathlon', 'icon-tennis-ball' => 'icon-tennis-ball', 'icon-synchronize-swimming' => 'icon-synchronize-swimming', 'icon-surfer' => 'icon-surfer', 'icon-stopwatch4' => 'icon-stopwatch4', 'icon-soccer-field' => 'icon-soccer-field', 'icon-soccer-boot' => 'icon-soccer-boot', 'icon-soccer-ball' => 'icon-soccer-ball', 'icon-snowboarder' => 'icon-snowboarder', 'icon-sled' => 'icon-sled', 'icon-skateboard' => 'icon-skateboard', 'icon-shuttlecock' => 'icon-shuttlecock', 'icon-rollerblade' => 'icon-rollerblade', 'icon-referee' => 'icon-referee', 'icon-rafting' => 'icon-rafting', 'icon-racquet' => 'icon-racquet', 'icon-race-car' => 'icon-race-car', 'icon-pole-vault' => 'icon-pole-vault', 'icon-ping-pong' => 'icon-ping-pong', 'icon-pilates' => 'icon-pilates', 'icon-parachute' => 'icon-parachute', 'icon-paddle-board' => 'icon-paddle-board', 'icon-lifeguard' => 'icon-lifeguard', 'icon-land-yacht' => 'icon-land-yacht', 'icon-kayak' => 'icon-kayak', 'icon-jet-skiing' => 'icon-jet-skiing', 'icon-ice-skate' => 'icon-ice-skate', 'icon-hula-hoop' => 'icon-hula-hoop', 'icon-horse-riding' => 'icon-horse-riding', 'icon-hockey2' => 'icon-hockey2', 'icon-helmet' => 'icon-helmet', 'icon-hang-gliding' => 'icon-hang-gliding', 'icon-golf2' => 'icon-golf2', 'icon-goal' => 'icon-goal', 'icon-football3' => 'icon-football3', 'icon-flags' => 'icon-flags', 'icon-fishing-lure' => 'icon-fishing-lure', 'icon-fencing' => 'icon-fencing', 'icon-dumbbell2' => 'icon-dumbbell2', 'icon-downhill-skiing' => 'icon-downhill-skiing', 'icon-discus-throw' => 'icon-discus-throw', 'icon-deadlift' => 'icon-deadlift', 'icon-cricket-helmet' => 'icon-cricket-helmet', 'icon-cheerleader' => 'icon-cheerleader', 'icon-checkered-flag' => 'icon-checkered-flag', 'icon-boxer' => 'icon-boxer', 'icon-bowling-pin' => 'icon-bowling-pin', 'icon-bowling-ball' => 'icon-bowling-ball', 'icon-boomerang' => 'icon-boomerang', 'icon-bike-trial' => 'icon-bike-trial', 'icon-bike-stand' => 'icon-bike-stand', 'icon-bike-hop' => 'icon-bike-hop', 'icon-basketball2' => 'icon-basketball2', 'icon-baseball3' => 'icon-baseball3', 'icon-badminton' => 'icon-badminton', 'icon-archery' => 'icon-archery', 'icon-phone19' => 'icon-phone19', 'icon-mobile9' => 'icon-mobile9', 'icon-mouse8' => 'icon-mouse8', 'icon-directions2' => 'icon-directions2', 'icon-mail10' => 'icon-mail10', 'icon-paperplane4' => 'icon-paperplane4', 'icon-pencil16' => 'icon-pencil16', 'icon-feather3' => 'icon-feather3', 'icon-paperclip6' => 'icon-paperclip6', 'icon-drawer4' => 'icon-drawer4', 'icon-reply6' => 'icon-reply6', 'icon-reply-all2' => 'icon-reply-all2', 'icon-forward8' => 'icon-forward8', 'icon-user22' => 'icon-user22', 'icon-users11' => 'icon-users11', 'icon-user-add2' => 'icon-user-add2', 'icon-vcard22' => 'icon-vcard22', 'icon-export2' => 'icon-export2', 'icon-location16' => 'icon-location16', 'icon-map10' => 'icon-map10', 'icon-compass11' => 'icon-compass11', 'icon-location22' => 'icon-location22', 'icon-target11' => 'icon-target11', 'icon-share10' => 'icon-share10', 'icon-sharable' => 'icon-sharable', 'icon-heart23' => 'icon-heart23', 'icon-heart24' => 'icon-heart24', 'icon-star17' => 'icon-star17', 'icon-star22' => 'icon-star22', 'icon-thumbs-up9' => 'icon-thumbs-up9', 'icon-thumbs-down5' => 'icon-thumbs-down5', 'icon-chat11' => 'icon-chat11', 'icon-comment6' => 'icon-comment6', 'icon-quote5' => 'icon-quote5', 'icon-house' => 'icon-house', 'icon-popup2' => 'icon-popup2', 'icon-search16' => 'icon-search16', 'icon-flashlight' => 'icon-flashlight', 'icon-printer7' => 'icon-printer7', 'icon-bell6' => 'icon-bell6', 'icon-link13' => 'icon-link13', 'icon-flag14' => 'icon-flag14', 'icon-cog16' => 'icon-cog16', 'icon-tools4' => 'icon-tools4', 'icon-trophy6' => 'icon-trophy6', 'icon-tag19' => 'icon-tag19', 'icon-camera28' => 'icon-camera28', 'icon-megaphone6' => 'icon-megaphone6', 'icon-moon7' => 'icon-moon7', 'icon-palette3' => 'icon-palette3', 'icon-leaf6' => 'icon-leaf6', 'icon-music12' => 'icon-music12', 'icon-music22' => 'icon-music22', 'icon-new2' => 'icon-new2', 'icon-graduation2' => 'icon-graduation2', 'icon-book13' => 'icon-book13', 'icon-newspaper7' => 'icon-newspaper7', 'icon-bag8' => 'icon-bag8', 'icon-airplane3' => 'icon-airplane3', 'icon-lifebuoy' => 'icon-lifebuoy', 'icon-eye17' => 'icon-eye17', 'icon-clock18' => 'icon-clock18', 'icon-microphone11' => 'icon-microphone11', 'icon-calendar17' => 'icon-calendar17', 'icon-bolt4' => 'icon-bolt4', 'icon-thunder' => 'icon-thunder', 'icon-droplet7' => 'icon-droplet7', 'icon-cd4' => 'icon-cd4', 'icon-briefcase10' => 'icon-briefcase10', 'icon-air' => 'icon-air', 'icon-hourglass3' => 'icon-hourglass3', 'icon-gauge' => 'icon-gauge', 'icon-language' => 'icon-language', 'icon-network2' => 'icon-network2', 'icon-key13' => 'icon-key13', 'icon-battery10' => 'icon-battery10', 'icon-bucket2' => 'icon-bucket2', 'icon-magnet7' => 'icon-magnet7', 'icon-drive' => 'icon-drive', 'icon-cup6' => 'icon-cup6', 'icon-rocket4' => 'icon-rocket4', 'icon-brush5' => 'icon-brush5', 'icon-suitcase6' => 'icon-suitcase6', 'icon-cone5' => 'icon-cone5', 'icon-earth6' => 'icon-earth6', 'icon-keyboard7' => 'icon-keyboard7', 'icon-browser4' => 'icon-browser4', 'icon-publish' => 'icon-publish', 'icon-progress-3' => 'icon-progress-3', 'icon-progress-2' => 'icon-progress-2', 'icon-brogress-1' => 'icon-brogress-1', 'icon-progress-0' => 'icon-progress-0', 'icon-sun22' => 'icon-sun22', 'icon-sun9' => 'icon-sun9', 'icon-adjust2' => 'icon-adjust2', 'icon-code5' => 'icon-code5', 'icon-screen8' => 'icon-screen8', 'icon-infinity2' => 'icon-infinity2', 'icon-light-bulb' => 'icon-light-bulb', 'icon-credit-card3' => 'icon-credit-card3', 'icon-database6' => 'icon-database6', 'icon-voicemail' => 'icon-voicemail', 'icon-clipboard15' => 'icon-clipboard15', 'icon-cart11' => 'icon-cart11', 'icon-box7' => 'icon-box7', 'icon-ticket7' => 'icon-ticket7', 'icon-rss22' => 'icon-rss22', 'icon-signal3' => 'icon-signal3', 'icon-thermometer5' => 'icon-thermometer5', 'icon-droplets' => 'icon-droplets', 'icon-uniE68E' => 'icon-uniE68E', 'icon-statistics' => 'icon-statistics', 'icon-pie8' => 'icon-pie8', 'icon-bars10' => 'icon-bars10', 'icon-graph2' => 'icon-graph2', 'icon-lock11' => 'icon-lock11', 'icon-lock-open2' => 'icon-lock-open2', 'icon-logout' => 'icon-logout', 'icon-login' => 'icon-login', 'icon-checkmark11' => 'icon-checkmark11', 'icon-cross4' => 'icon-cross4', 'icon-minus12' => 'icon-minus12', 'icon-plus32' => 'icon-plus32', 'icon-cross32' => 'icon-cross32', 'icon-minus22' => 'icon-minus22', 'icon-plus11' => 'icon-plus11', 'icon-cross22' => 'icon-cross22', 'icon-minus32' => 'icon-minus32', 'icon-plus22' => 'icon-plus22', 'icon-erase' => 'icon-erase', 'icon-blocked4' => 'icon-blocked4', 'icon-info11' => 'icon-info11', 'icon-info22' => 'icon-info22', 'icon-question9' => 'icon-question9', 'icon-help3' => 'icon-help3', 'icon-warning7' => 'icon-warning7', 'icon-cycle' => 'icon-cycle', 'icon-cw' => 'icon-cw', 'icon-ccw' => 'icon-ccw', 'icon-shuffle5' => 'icon-shuffle5', 'icon-arrow9' => 'icon-arrow9', 'icon-arrow22' => 'icon-arrow22', 'icon-retweet22' => 'icon-retweet22', 'icon-loop8' => 'icon-loop8', 'icon-history3' => 'icon-history3', 'icon-back' => 'icon-back', 'icon-switch6' => 'icon-switch6', 'icon-list15' => 'icon-list15', 'icon-add-to-list' => 'icon-add-to-list', 'icon-layout16' => 'icon-layout16', 'icon-list22' => 'icon-list22', 'icon-text' => 'icon-text', 'icon-text2' => 'icon-text2', 'icon-document3' => 'icon-document3', 'icon-docs' => 'icon-docs', 'icon-landscape' => 'icon-landscape', 'icon-pictures7' => 'icon-pictures7', 'icon-video5' => 'icon-video5', 'icon-music32' => 'icon-music32', 'icon-folder15' => 'icon-folder15', 'icon-archive11' => 'icon-archive11', 'icon-trash6' => 'icon-trash6', 'icon-upload15' => 'icon-upload15', 'icon-download18' => 'icon-download18', 'icon-disk3' => 'icon-disk3', 'icon-install' => 'icon-install', 'icon-cloud20' => 'icon-cloud20', 'icon-upload22' => 'icon-upload22', 'icon-bookmark14' => 'icon-bookmark14', 'icon-bookmarks2' => 'icon-bookmarks2', 'icon-book22' => 'icon-book22', 'icon-play10' => 'icon-play10', 'icon-pause8' => 'icon-pause8', 'icon-record2' => 'icon-record2', 'icon-stop9' => 'icon-stop9', 'icon-next2' => 'icon-next2', 'icon-previous2' => 'icon-previous2', 'icon-first3' => 'icon-first3', 'icon-last3' => 'icon-last3', 'icon-resize-enlarge' => 'icon-resize-enlarge', 'icon-resize-shrink' => 'icon-resize-shrink', 'icon-volume13' => 'icon-volume13', 'icon-sound3' => 'icon-sound3', 'icon-mute4' => 'icon-mute4', 'icon-flow-cascade' => 'icon-flow-cascade', 'icon-flow-branch' => 'icon-flow-branch', 'icon-flow-tree' => 'icon-flow-tree', 'icon-flow-line' => 'icon-flow-line', 'icon-flow-parallel2' => 'icon-flow-parallel2', 'icon-arrow-left24' => 'icon-arrow-left24', 'icon-arrow-down23' => 'icon-arrow-down23', 'icon-arrow-up--upload' => 'icon-arrow-up--upload', 'icon-arrow-right25' => 'icon-arrow-right25', 'icon-arrow-left25' => 'icon-arrow-left25', 'icon-arrow-down24' => 'icon-arrow-down24', 'icon-arrow-up23' => 'icon-arrow-up23', 'icon-arrow-right26' => 'icon-arrow-right26', 'icon-arrow-left32' => 'icon-arrow-left32', 'icon-arrow-down32' => 'icon-arrow-down32', 'icon-arrow-up24' => 'icon-arrow-up24', 'icon-arrow-right32' => 'icon-arrow-right32', 'icon-arrow-left42' => 'icon-arrow-left42', 'icon-arrow-down42' => 'icon-arrow-down42', 'icon-arrow-up32' => 'icon-arrow-up32', 'icon-arrow-right42' => 'icon-arrow-right42', 'icon-arrow-left52' => 'icon-arrow-left52', 'icon-arrow-down52' => 'icon-arrow-down52', 'icon-arrow-up42' => 'icon-arrow-up42', 'icon-arrow-right52' => 'icon-arrow-right52', 'icon-arrow-left62' => 'icon-arrow-left62', 'icon-arrow-down62' => 'icon-arrow-down62', 'icon-arrow-up52' => 'icon-arrow-up52', 'icon-arrow-right62' => 'icon-arrow-right62', 'icon-arrow-left72' => 'icon-arrow-left72', 'icon-arrow-down72' => 'icon-arrow-down72', 'icon-arrow-up62' => 'icon-arrow-up62', 'icon-uniE6F8' => 'icon-uniE6F8', 'icon-arrow-left82' => 'icon-arrow-left82', 'icon-arrow-down82' => 'icon-arrow-down82', 'icon-arrow-up72' => 'icon-arrow-up72', 'icon-arrow-right72' => 'icon-arrow-right72', 'icon-menu14' => 'icon-menu14', 'icon-ellipsis2' => 'icon-ellipsis2', 'icon-dots' => 'icon-dots', 'icon-dot' => 'icon-dot', 'icon-cc2' => 'icon-cc2', 'icon-cc-by' => 'icon-cc-by', 'icon-cc-nc' => 'icon-cc-nc', 'icon-cc-nc-eu' => 'icon-cc-nc-eu', 'icon-cc-nc-jp' => 'icon-cc-nc-jp', 'icon-cc-sa' => 'icon-cc-sa', 'icon-cc-nd' => 'icon-cc-nd', 'icon-cc-pd' => 'icon-cc-pd', 'icon-cc-zero' => 'icon-cc-zero', 'icon-cc-share' => 'icon-cc-share', 'icon-cc-share2' => 'icon-cc-share2', 'icon-daniel-bruce' => 'icon-daniel-bruce', 'icon-daniel-bruce2' => 'icon-daniel-bruce2', 'icon-github8' => 'icon-github8', 'icon-github22' => 'icon-github22', 'icon-flickr7' => 'icon-flickr7', 'icon-flickr22' => 'icon-flickr22', 'icon-vimeo5' => 'icon-vimeo5', 'icon-vimeo22' => 'icon-vimeo22', 'icon-twitter22' => 'icon-twitter22', 'icon-twitter8' => 'icon-twitter8', 'icon-facebook11' => 'icon-facebook11', 'icon-facebook32' => 'icon-facebook32', 'icon-facebook22' => 'icon-facebook22', 'icon-googleplus8' => 'icon-googleplus8', 'icon-googleplus22' => 'icon-googleplus22', 'icon-pinterest4' => 'icon-pinterest4', 'icon-pinterest22' => 'icon-pinterest22', 'icon-tumblr6' => 'icon-tumblr6', 'icon-tumblr22' => 'icon-tumblr22', 'icon-linkedin5' => 'icon-linkedin5', 'icon-linkedin22' => 'icon-linkedin22', 'icon-dribbble9' => 'icon-dribbble9', 'icon-dribbble22' => 'icon-dribbble22', 'icon-stumbleupon4' => 'icon-stumbleupon4', 'icon-stumbleupon22' => 'icon-stumbleupon22', 'icon-lastfm3' => 'icon-lastfm3', 'icon-lastfm22' => 'icon-lastfm22', 'icon-rdio2' => 'icon-rdio2', 'icon-rdio22' => 'icon-rdio22', 'icon-spotify2' => 'icon-spotify2', 'icon-spotify22' => 'icon-spotify22', 'icon-qq' => 'icon-qq', 'icon-instagram5' => 'icon-instagram5', 'icon-dropbox3' => 'icon-dropbox3', 'icon-evernote2' => 'icon-evernote2', 'icon-flattr2' => 'icon-flattr2', 'icon-skype5' => 'icon-skype5', 'icon-skype22' => 'icon-skype22', 'icon-renren2' => 'icon-renren2', 'icon-sina-weibo' => 'icon-sina-weibo', 'icon-paypal5' => 'icon-paypal5', 'icon-picasa2' => 'icon-picasa2', 'icon-soundcloud4' => 'icon-soundcloud4', 'icon-mixi' => 'icon-mixi', 'icon-behance2' => 'icon-behance2', 'icon-circles' => 'icon-circles', 'icon-vk2' => 'icon-vk2', 'icon-smashing' => 'icon-smashing'
);

$position_choice = 
	array(
      	"type" => "dropdown",
      	"heading" => __("Position?", "INFINITE_LANGUAGE"),
      	"param_name" => "loading_position_choice",
      	"value" => array ( __("No", "INFINITE_LANGUAGE") => "no", __("Yes", "INFINITE_LANGUAGE") => "yes"),
	  	"admin_label" => false,
      	"description" => __("Enable or Disable position on item.", "INFINITE_LANGUAGE")
    );

$loading_position =	
	array(
      	"type" => "dropdown",
      	"heading" => __("Loading Position", "INFINITE_LANGUAGE"),
      	"param_name" => "loading_position",
      	"value" => array(__("Left", "INFINITE_LANGUAGE") => "loading_left", __("Center", "INFINITE_LANGUAGE") => "loading_center", __("Right", "INFINITE_LANGUAGE") => "loading_right"),
	  	"admin_label" => false,
      	"description" => __("Select your position.", "INFINITE_LANGUAGE"),
	  	"dependency" => Array('element' => "loading_position_choice", 'value' => array('yes'))
    );

$animated_choice = 
	array(
      	"type" => "dropdown",
      	"heading" => __("Animation?", "INFINITE_LANGUAGE"),
      	"param_name" => "animation_loading",
      	"value" => array ( __("No", "INFINITE_LANGUAGE") => "no", __("Yes", "INFINITE_LANGUAGE") => "yes"),
	  	"admin_label" => false,
      	"description" => __("Enable or Disable animation on item.", "INFINITE_LANGUAGE")
    );
	
$animated_effects =	
	array(
      	"type" => "dropdown",
      	"heading" => __("Animation Effects", "INFINITE_LANGUAGE"),
      	"param_name" => "animation_loading_effects",
      	"value" => array(__("Fade In", "INFINITE_LANGUAGE") => "fade_in", __("Move Left", "INFINITE_LANGUAGE") => "move_left", __("Move Right", "INFINITE_LANGUAGE") => "move_right", __("Move Up", "INFINITE_LANGUAGE") => "move_up", __("Scale Up", "INFINITE_LANGUAGE") => "scale_up", __("Little Bounce", "INFINITE_LANGUAGE") => "little_bounce"),
	  	"admin_label" => false,
      	"description" => __("Select your animation.", "INFINITE_LANGUAGE"),
	  	"dependency" => Array('element' => "animation_loading", 'value' => array('yes'))
    );

$animated_delay =	
	array(
      	"type" => "textfield",
      	"heading" => __("Animation Delay", "INFINITE_LANGUAGE"),
      	"param_name" => "animation_delay",
	  	"admin_label" => false,
      	"description" => __("<strong>Optional</strong> If you want you can insert a delay for animation. For example write 100 = 0.1 seconds", "INFINITE_LANGUAGE"),
	  	"dependency" => Array('element' => "animation_loading", 'value' => array('yes'))
    );

/* Clean Output Classes */
function setClass($classes){
  if($classes){
    $return = '';
    foreach($classes as $class)
    {
        if(trim($class))
        $return .= trim($class).' ';
    }
    if(trim($return) != '')
    return ' class="'.trim($return).'"';
 }
}

/*-----------------------------------------------------------------------------------*/
/*	Row
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Row", "INFINITE_LANGUAGE"),
	"base" => "vc_row",
	"is_container" => true,
	"icon" => "icon-layout8",
	"show_settings_on_create" => false,
	"category" => __('Layout', 'INFINITE_LANGUAGE'),
	"params" => array(
	
		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra ID name", "INFINITE_LANGUAGE"),
		  	"param_name" => "section_id",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a ID and then refer to it in your css file.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra Section Class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "section_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Section Mode", "INFINITE_LANGUAGE"),
		  	"param_name" => "section_mode",
		  	"value" => array(__("Default", "INFINITE_LANGUAGE") => "normal", __("Full Width", "INFINITE_LANGUAGE") => "fluid"),
		  	"description" => __("Choose Layout Mode. Default 1170px Container. Full Width is a 100% Container.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Background Mode", "INFINITE_LANGUAGE"),
		  	"param_name" => "bgmode",
		  	"value" => array(__("Default", "INFINITE_LANGUAGE") => "default", __("Custom Image", "INFINITE_LANGUAGE") => "customimagebg", __("Custom Color", "INFINITE_LANGUAGE") => "custom", __("Custom Video", "INFINITE_LANGUAGE") => "video"),
		  	"description" => __("Choose Background Mode.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		// Custom Image Settings
		array(
		  	"type" => "attach_image",
		  	"heading" => __("Image", "INFINITE_LANGUAGE"),
		  	"param_name" => "image",
		  	"value" => "",
		  	"description" => __("Select image from media library.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "bgmode", 'value' => array('customimagebg'))
		),

		array(
		  	"type" => "colorpicker",
		  	"heading" => __("Background Color Image", "INFINITE_LANGUAGE"),
		  	"param_name" => "bgimagebackgrouncolor",
		  	"description" => __("Choose a background color for your transparent image block.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "image", 'not_empty' => true,)
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Background Image Position", "INFINITE_LANGUAGE"),
		  	"param_name" => "bgposition",
		  	"value" => 
			  	array(
			  		__("Top Left", "INFINITE_LANGUAGE") => "top left",
					__("Top Center", "INFINITE_LANGUAGE") => "top center",
					__("Top Right", "INFINITE_LANGUAGE") => "top right", 
					__("Bottom Left", "INFINITE_LANGUAGE") => "bottom left",
					__("Bottom Center", "INFINITE_LANGUAGE") => "bottom center",
					__("Bottom Right", "INFINITE_LANGUAGE") => "bottom right",
					__("Center Left", "INFINITE_LANGUAGE") => "center left",
					__("Center Center", "INFINITE_LANGUAGE") => "center center",
					__("Center Right", "INFINITE_LANGUAGE") => "center right"
				),
		  	"dependency" => Array('element' => "image", 'not_empty' => true)
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Background Image Repeat", "INFINITE_LANGUAGE"),
		  	"param_name" => "bgrepeat",
		  	"value" => 
			  	array(
			  		__("No Repeat", "INFINITE_LANGUAGE") => "no-repeat",
					__("Repeat", "INFINITE_LANGUAGE") => "repeat",
					__("Repeat Horizontally", "INFINITE_LANGUAGE") => "repeat-x",
					__("Repeat vertically", "INFINITE_LANGUAGE") => "repeat-y",
					__("Stretch to fit", "INFINITE_LANGUAGE") => "stretch"
				),
		  	"dependency" => Array('element' => "image", 'not_empty' => true)
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Background Attachment", "INFINITE_LANGUAGE"),
		  	"param_name" => "bgattachment",
		  	"value" => 
			  	array(
			  		__("Scroll", "INFINITE_LANGUAGE") => "scroll",
					__("Fixed", "INFINITE_LANGUAGE") => "fixed"
				),
		  	"dependency" => Array('element' => "image", 'not_empty' => true)
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Overlay Mask", "INFINITE_LANGUAGE"),
		  	"param_name" => "section_overlay",
		  	"value" => array(__("No Overlay Mask", "INFINITE_LANGUAGE") => "no_overlay", __("Yes, Overlay Mask", "INFINITE_LANGUAGE") => "yes_overlay"),
		  	"description" => __("Enable or Disable the custom options for overlay section.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "bgmode", 'value' => array('customimagebg'))
		),

		array(
		  	"type" => "colorpicker",
		  	"heading" => __("Background Color Overlay Mask", "INFINITE_LANGUAGE"),
		  	"param_name" => "sectionoveralycolor",
		  	"description" => __("Choose a background color overlay for your title block. Only if Overlay Mask is enable.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "section_overlay", 'value' => array('yes_overlay'))
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Background Opacity Overlay Mask", "INFINITE_LANGUAGE"),
		  	"param_name" => "sectionoverlayopacity",
		  	"description" => __("Enter a number 0 - 1 for your background color opacity. Default 0.70. Only if Overlay Mask is enable.", "INFINITE_LANGUAGE"),
		  	"value" => "0.70",
		  	"dependency" => Array('element' => "section_overlay", 'value' => array('yes_overlay'))
		),

		// Background Color Without Image Settings
		array(
		  	"type" => "colorpicker",
		  	"heading" => __("Background Color", "INFINITE_LANGUAGE"),
		  	"param_name" => "custombgcolor",
		  	"description" => __("Select a custom background color.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "bgmode", 'value' => array('custom'))
		),

		// Video Settings
		array(
		  	"type" => "textfield",
		  	"heading" => __("WEBM File URL", "INFINITE_LANGUAGE"),
		  	"param_name" => "customvideowebm",
		  	"description" => __("Upload a WEBM File.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "bgmode", 'value' => array('video'))
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("M4V File URL", "INFINITE_LANGUAGE"),
		  	"param_name" => "customvideom4v",
		  	"description" => __("Upload a M4V File.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "bgmode", 'value' => array('video'))
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("OGV File URL", "INFINITE_LANGUAGE"),
		  	"param_name" => "customvideoogv",
		  	"description" => __("Upload a OGV File.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "bgmode", 'value' => array('video'))
		),

		array(
		  	"type" => "attach_image",
		  	"heading" => __("Video Preview Image", "INFINITE_LANGUAGE"),
		  	"param_name" => "customimagevideo",
		  	"value" => "",
		  	"description" => __("Select image from media library.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "bgmode", 'value' => array('video'))
		),

		array(
		  	"type" => 'checkbox',
		  	"heading" => __("Video Overlay?", "INFINITE_LANGUAGE"),
		  	"param_name" => "video_overlay",
		  	"value" => Array(__("Use transparent overlay over video?", "INFINITE_LANGUAGE") => 'show_video_overlay'),
		 	"dependency" => Array('element' => "bgmode", 'value' => array('video'))
		),

		array(
		  	"type" => "colorpicker",
		  	"heading" => __("Video Overlay Color", "INFINITE_LANGUAGE"),
		  	"param_name" => "video_color_overlay",
		  	"description" => __("Select a custom color for overlay block.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "video_overlay", 'value' => array('show_video_overlay'))
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Video Overlay Opacity", "INFINITE_LANGUAGE"),
		  	"param_name" => "video_opacity_overlay",
		  	"description" => __("Enter a number 0 - 1 for your overlay color opacity. Default 0.70. Only if Video Overlay Mask is enable.", "INFINITE_LANGUAGE"),
		  	"value" => "0.70",
		  	"dependency" => Array('element' => "video_overlay", 'value' => array('show_video_overlay'))
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Section Padding", "INFINITE_LANGUAGE"),
		  	"param_name" => "padding",
		  	"value" => array(__("No Padding", "INFINITE_LANGUAGE") => "no-padding", __("Small Padding", "INFINITE_LANGUAGE") => "small-padding", __("Default Padding", "INFINITE_LANGUAGE") => "default-padding", __("Large Padding", "INFINITE_LANGUAGE") => "large-padding", __("Custom Padding", "INFINITE_LANGUAGE") => "custom-padding"),
		  	"description" => __("Define the sections top and bottom padding.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Padding Top", "INFINITE_LANGUAGE"),
		  	"param_name" => "padding_top_value",
		  	"description" => __("Padding Top value in pixel. Enter only number value. Default value is 70.", "INFINITE_LANGUAGE"),
		  	"value" => "70",
		  	"dependency" => Array('element' => "padding", 'value' => array('custom-padding'))
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Padding Bottom", "INFINITE_LANGUAGE"),
		  	"param_name" => "padding_bottom_value",
		  	"description" => __("Padding Bottom value in pixel. Enter only number value. Default value is 70.", "INFINITE_LANGUAGE"),
		  	"value" => "70",
		  	"dependency" => Array('element' => "padding", 'value' => array('custom-padding'))
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Section Shadow", "INFINITE_LANGUAGE"),
		  	"param_name" => "shadow",
		  	"value" => array(__("No Shadow", "INFINITE_LANGUAGE") => "shadow-off", __("Display Shadow", "INFINITE_LANGUAGE") => "shadow-on"),
		  	"description" => __("Display a small styling shadow at the top and bottom of the section.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra Row Class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	),
	"js_view" => 'VcRowView'
));

/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Columns", "INFINITE_LANGUAGE"), //Inner Row
	"base" => "vc_row_inner",
	"is_container" => true,
	"category" => __('Layout', 'INFINITE_LANGUAGE'),
	"icon" => "icon-layout13",
	"show_settings_on_create" => false,
	"params" => array(
		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	),
	"js_view" => 'VcRowView'
));

wpb_map(array(
	"name" => __("Column", "INFINITE_LANGUAGE"),
	"base" => "vc_column",
	"is_container" => true,
	"content_element" => false,
	"params" => array(
		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	),
	"js_view" => 'VcColumnView'
));

/*-----------------------------------------------------------------------------------*/
/*	Custom Heading
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Custom Heading", "INFINITE_LANGUAGE"),
	"base" => "ig_special_heading",
	"icon" => "icon-font-size2",
	"wrapper_class" => "clearfix",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
	
		array(
		  	"type" => "textarea",
		  	"holder" => "div",
		  	"heading" => __("Text", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"value" => __("I am Heading Text.", "INFINITE_LANGUAGE"),
		  	"description" => __("Insert your text. HTML is allowed.", "INFINITE_LANGUAGE"),
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Heading Type", "INFINITE_LANGUAGE"),
		  	"param_name" => "heading_type",
		  	"value" => 
			  	array(
					__("H1", "INFINITE_LANGUAGE") => "1", 
					__("H2", "INFINITE_LANGUAGE") => "2",
					__("H3", "INFINITE_LANGUAGE") => "3",
					__("H4", "INFINITE_LANGUAGE") => "4", 
					__("H5", "INFINITE_LANGUAGE") => "5", 
					__("H6", "INFINITE_LANGUAGE") => "6"
				),
		  	"description" => __("Select which kind of heading you want to display.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Font Color", "INFINITE_LANGUAGE"),
		  	"param_name" => "heading_color",
		  	"value" => array(__("Theme Color Default", "INFINITE_LANGUAGE") => "", __("Custom Color", "INFINITE_LANGUAGE") => "custom"),
		  	"description" => __("Choose a color for your heading text.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "colorpicker",
		  	"heading" => __("Heading Custom Color", "INFINITE_LANGUAGE"),
		  	"param_name" => "custom_heading_color",
		  	"description" => __("Select custom color for heading text.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "heading_color", 'value' => array('custom'))
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Font Heading Size", "INFINITE_LANGUAGE"),
		  	"param_name" => "heading_size",
		  	"value" => array(__("Theme Size Default", "INFINITE_LANGUAGE") => "", __("Custom Size", "INFINITE_LANGUAGE") => "custom"),
		  	"description" => __("Choose a size for your heading text.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Heading Custom Size", "INFINITE_LANGUAGE"),
		  	"param_name" => "custom_heading_size",
		  	"description" => __("Font Size in pixel. Enter only number value.", "INFINITE_LANGUAGE"),
		  	"value" => "",
		  	"dependency" => Array('element' => "heading_size", 'value' => array('custom')),
		  	"admin_label" => false
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Heading Style", "INFINITE_LANGUAGE"),
		  	"param_name" => "heading_style",
		  	"value" => 
			  	array(
					__("Default Style", "INFINITE_LANGUAGE") => "default",
					__("Italic Style", "INFINITE_LANGUAGE") => "italic"
				),
		  	"description" => __("Select a heading style.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Heading Align", "INFINITE_LANGUAGE"),
		  	"param_name" => "heading_align",
		  	"value" => 
			  	array(
					__("Align Left", "INFINITE_LANGUAGE") => "textalignleft",
					__("Align Center", "INFINITE_LANGUAGE") => "textaligncenter",
					__("Align Right", "INFINITE_LANGUAGE") => "textalignright",
				),
		  	"description" => __("Select a heading align.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Padding Bottom", "INFINITE_LANGUAGE"),
		  	"param_name" => "padding_bottom_heading",
		  	"description" => __("Bottom Padding in pixel. Enter only number value. Default value is 30.", "INFINITE_LANGUAGE"),
		  	"value" => "30",
		  	"admin_label" => false
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Text Block
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Text Block", "INFINITE_LANGUAGE"),
	"base" => "vc_column_text",
	"icon" => "icon-document",
	"wrapper_class" => "clearfix",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Text", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"value" => __("I am text block. Click edit button to change this text.", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Divider and Empty Space
/*-----------------------------------------------------------------------------------*/

// Divider
wpb_map(array(
    "base"		=> "ig_divider",
    "name"		=> __("Divider", "INFINITE_LANGUAGE"),
    "class"		=> "wpb_vc_separator",
    "icon"      => "icon-pagebreak",
	"category" 	=> __('Content', 'INFINITE_LANGUAGE'),
    "params"	=> array(
		
		array(
		 	"type" => "dropdown",
		 	"heading" => __("Divider Style", "INFINITE_LANGUAGE"),
		 	"param_name" => "div_type",
		  	"value" => array( __("Normal", "INFINITE_LANGUAGE") => "normal", __("Short", "INFINITE_LANGUAGE") => "short" ),
		  	"admin_label" => false,
		  	"description" => __("Choose between the two available divider styles.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Margin Top Value", "INFINITE_LANGUAGE"),
		  	"param_name" => "margin_top_value",
		  	"description" => __("Margin Top Value in pixel. Enter only number value. Default value is 30.", "INFINITE_LANGUAGE"),
		  	"value" => "30"
		),

		array(
		  	"type" => "textfield",
		 	"heading" => __("Margin Bottom Value", "INFINITE_LANGUAGE"),
		  	"param_name" => "margin_bottom_value",
		  	"description" => __("Margin Bottom Value in pixel. Enter only number value. Default value is 36.", "INFINITE_LANGUAGE"),
		  	"value" => "36"
		),
		
		$animated_choice,
		$animated_effects,
		$animated_delay,
	
        array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
    )
));

// Empty Space
wpb_map(array(
    "base"		=> "ig_blank_divider",
    "name"		=> __("Empty Space", "INFINITE_LANGUAGE"),
    "class"		=> "wpb_vc_separator",
    "icon"      => "icon-page-break2",
	"category" 	=> __('Content', 'INFINITE_LANGUAGE'),
    "params"	=> array(
		array(
		  	"type" => "textfield",
		  	"heading" => __("Height Value", "INFINITE_LANGUAGE"),
		  	"param_name" => "height_value",
		  	"description" => __("Height Value in pixel. Enter only number value. Default value is 20.", "INFINITE_LANGUAGE"),
		  	"value" => "20"
		),

        array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
    )
));


/*-----------------------------------------------------------------------------------*/
/*	Alert Boxes
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
    "base"		=> "ig_alert_box",
    "name"		=> __("Alert Box", "INFINITE_LANGUAGE"),
    "class"		=> "",
    "icon"      => "icon-info6",
	"category" 	=> __('Content', 'INFINITE_LANGUAGE'),
    "params"	=> array(
		
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Type", "INFINITE_LANGUAGE"),
		  	"param_name" => "type",
		  	"value" => $type_arr,
		  	"description" => __("Select your Alert Box.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textarea",
		  	"holder" => "div",
		  	"heading" => __("Text", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"value" => __("I am text block. Click edit button to change this text.", "INFINITE_LANGUAGE")
		),
		
		$animated_choice,
		$animated_effects,
		$animated_delay,
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
    )
));

/*-----------------------------------------------------------------------------------*/
/*	Accordion / Toggle / Tab
/*-----------------------------------------------------------------------------------*/

// Accordions
wpb_map(array(
	"name" => __("Accordion", "INFINITE_LANGUAGE"),
	"base" => "ig_acc_container",
	"icon" => "icon-menu5",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(

		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Accordion", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"description" => __("Click on the <strong>Shortcode Button</strong> and select <strong>Accordion Section Shortcode</strong>.", "INFINITE_LANGUAGE"),
		  	"value" => __("", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

// Toggles
wpb_map(array(
	"name" => __("Toggle", "INFINITE_LANGUAGE"),
	"base" => "ig_tog_container",
	"icon" => "icon-menu4",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Toggle", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"description" => __("Click on the <strong>Shortcode Button</strong> and select <strong>Toggle Section Shortcode</strong>.", "INFINITE_LANGUAGE"),
		  	"value" => __("", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

// Tabs
wpb_map(array(
	"name" => __("Tabs", "INFINITE_LANGUAGE"),
	"base" => "ig_tab_container",
	"icon" => "icon-docs",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Tab", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"description" => __("Click on the <strong>Shortcode Button</strong> and select <strong>Tab Section Shortcode</strong>.", "INFINITE_LANGUAGE"),
		  	"value" => __("", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

// Testimonials
wpb_map(array(
	"name" => __("Testimonial", "INFINITE_LANGUAGE"),
	"base" => "ig_testimonial_container",
	"icon" => "icon-quote2",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Testimonial", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"description" => __("Click on the <strong>Shortcode Button</strong> and select <strong>Testimonial Section Shortcode</strong>. Don't add more one testimonial slider shortcode to the same page.", "INFINITE_LANGUAGE"),
		  	"value" => __("", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		 	 "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Single Image / Lightbox Image / Video
/*-----------------------------------------------------------------------------------*/

// Single Image
wpb_map(array(
    "base"		=> "ig_single_image",
    "name"		=> __("Single Image", "INFINITE_LANGUAGE"),
    "class"		=> "",
    "icon"      => "icon-picture3",
	"category" 	=> __('Content', 'INFINITE_LANGUAGE'),
    "params"	=> array(
        
        array(
		  	"type" => "attach_image",
		  	"heading" => __("Image", "INFINITE_LANGUAGE"),
		  	"param_name" => "image",
      	  	"value" => "",
		  	"description" => __("Select image from media library.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Image Mode", "INFINITE_LANGUAGE"),
		  	"param_name" => "image_mode",
      	  	"value" => array(__("No Responsive", "INFINITE_LANGUAGE") => "img-no-responsive", __("Responsive", "INFINITE_LANGUAGE") => "img-responsive", __("Full Responsive", "INFINITE_LANGUAGE") => "img-full-responsive"),
		  	"description" => __("Select mode of your image.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "image", 'not_empty' => true),
      	  	"admin_label" => false
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Image Alignment", "INFINITE_LANGUAGE"),
		  	"param_name" => "image_alignment",
      	  	"value" => array(__("Left", "INFINITE_LANGUAGE") => "alignleft", __("Center", "INFINITE_LANGUAGE") => "aligncenter", __("Right", "INFINITE_LANGUAGE") => "alignright"),
		  	"description" => __("Select mode of your image.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "image", 'not_empty' => true),
      	  	"admin_label" => false
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Image Link", "INFINITE_LANGUAGE"),
		  	"param_name" => "image_link",
      	  	"value" => array(__("No", "INFINITE_LANGUAGE") => "no-link", __("Yes", "INFINITE_LANGUAGE") => "yes"),
		  	"description" => __("Select mode of your image.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "image", 'not_empty' => true),
      	  	"admin_label" => false
		),
		
		array(
	      	"type" => "textfield",
	      	"heading" => __("Link URL", "INFINITE_LANGUAGE"),
	      	"param_name" => "image_link_url",
	      	"description" => __("Where should your image link to?", "INFINITE_LANGUAGE"),
	      	"dependency" => Array('element' => "image_link", 'value' => array('yes')),
		  	"admin_label" => false
	    ),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Link Target", "INFINITE_LANGUAGE"),
		  	"param_name" => "target",
		  	"value" => $target_arr,
		  	"dependency" => Array('element' => "image_link", 'value' => array('yes'))
		),
		
		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
    )
));

// Lightbox Images
wpb_map(array(
    "base"		=> "ig_lightbox_image",
    "name"		=> __("Lightbox Images", "INFINITE_LANGUAGE"),
    "class"		=> "",
    "icon"      => "icon-pictures",
	"category" 	=> __('Content', 'INFINITE_LANGUAGE'),
    "params"	=> array(
        
        array(
		  	"type" => "attach_image",
		  	"heading" => __("Image", "INFINITE_LANGUAGE"),
		  	"param_name" => "image",
      	  	"value" => "",
		  	"description" => __("Select image from media library.", "INFINITE_LANGUAGE")
		),
		
		array(
		  	"type" => "attach_image",
		  	"heading" => __("Different PopUp Image (Optional)", "INFINITE_LANGUAGE"),
		  	"param_name" => "image_popup",
      	  	"value" => "",
		  	"description" => __("Select image from media library. If you want a different PopUp Image.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "image", 'not_empty' => true)
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Thumbnail Width (Optional)", "INFINITE_LANGUAGE"),
		  	"param_name" => "thumb_widht",
      	  	"value" => "",
		  	"description" => __("If you wish choose a width for your thumbnail. It will be automatically cropped and resized. Enter only number value.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "image", 'not_empty' => true)
		),
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Title", "INFINITE_LANGUAGE"),
		  	"param_name" => "title",
		  	"description" => __("Title of Image.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Gallery Name", "INFINITE_LANGUAGE"),
		  	"param_name" => "gallery_name",
		  	"description" => __("Title of Gallery Name.", "INFINITE_LANGUAGE")
		),
		
		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
    )
));

// Lightbox Video
wpb_map(array(
    "base"		=> "ig_lightbox_video",
    "name"		=> __("Lightbox Video", "INFINITE_LANGUAGE"),
    "class"		=> "",
    "icon"      => "icon-play5",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
    "params"	=> array(
        
        array(
		  	"type" => "attach_image",
		  	"heading" => __("Image", "INFINITE_LANGUAGE"),
		  	"param_name" => "image",
      	  	"value" => "",
		  	"description" => __("Select image from media library.", "INFINITE_LANGUAGE")
		),
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Thumbnail Width (Optional)", "INFINITE_LANGUAGE"),
		  	"param_name" => "thumb_widht",
      	  	"value" => "",
		  	"description" => __("If you wish choose a width for your thumbnail. It will be automatically cropped and resized.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "image", 'not_empty' => true)
		),
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Link URL", "INFINITE_LANGUAGE"),
		  	"param_name" => "link_url",
		  	"description" => __("Insert Link for your video.", "INFINITE_LANGUAGE")
		),
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Title", "INFINITE_LANGUAGE"),
		  	"param_name" => "title",
		  	"description" => __("Title of Video.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Gallery Name", "INFINITE_LANGUAGE"),
		  	"param_name" => "gallery_name",
		  	"description" => __("Title of Gallery.", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
    )
));

// Lightbox Image Gallery
wpb_map(array(
    "base"		=> "ig_lightbox_image_gallery",
    "name"		=> __("Lightbox Gallery", "INFINITE_LANGUAGE"),
    "class"		=> "",
    "icon"      => "icon-pictures3",
	"category" 	=> __('Content', 'INFINITE_LANGUAGE'),
    "params"	=> array(
        
        array(
		  	"type" => "attach_image",
		  	"heading" => __("Thumbnail Image", "INFINITE_LANGUAGE"),
		  	"param_name" => "image",
      	  	"value" => "",
		  	"description" => __("Select thumbnail image from media library.", "INFINITE_LANGUAGE")
		),
		
		array(
		  	"type" => "attach_images",
		  	"heading" => __("Images for Gallery", "INFINITE_LANGUAGE"),
		  	"param_name" => "images_gallery",
      	  	"value" => "",
		  	"description" => __("Select images from media library.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "image", 'not_empty' => true)
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Thumbnail Width (Optional)", "INFINITE_LANGUAGE"),
		  	"param_name" => "thumb_widht",
      	  	"value" => "",
		  	"description" => __("If you wish choose a width for your thumbnail. It will be automatically cropped and resized. Enter only number value.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "image", 'not_empty' => true)
		),
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Thumbnail Title", "INFINITE_LANGUAGE"),
		  	"param_name" => "title",
		  	"description" => __("Title of Thumbnail Image.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Gallery Name", "INFINITE_LANGUAGE"),
		  	"param_name" => "gallery_name",
		  	"description" => __("Title of Gallery Name.", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
    )
));


/*-----------------------------------------------------------------------------------*/
/*	Progress Bar
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Progress Bar", "INFINITE_LANGUAGE"),
	"base" => "ig_progress_bar",
	"icon" => "icon-tasks",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "textfield",
		 	"heading" => __("Progress Bar Field", "INFINITE_LANGUAGE"),
		  	"param_name" => "field",
		  	"description" => __("Enter the Progress Bar Field title here.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		 	"type" => "textfield",
		  	"heading" => __("Progress in %", "INFINITE_LANGUAGE"),
		  	"param_name" => "percentage",
		  	"description" => __("Enter a number between 0 and 100.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Bar color", "INFINITE_LANGUAGE"),
		  	"param_name" => "bgcolor",
		  	"value" => array(__("Theme Color Default", "INFINITE_LANGUAGE") => "", __("Custom Color", "INFINITE_LANGUAGE") => "custom"),
		  	"description" => __("Choose a color for your progress bar here.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "colorpicker",
		  	"heading" => __("Bar Custom Color", "INFINITE_LANGUAGE"),
		  	"param_name" => "custombarcolor",
		  	"description" => __("Select custom background color for bar.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "bgcolor", 'value' => array('custom'))
		),
			
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Icon", "INFINITE_LANGUAGE"),
		  	"param_name" => "checkicon",
		  	"value" => array(__("No Icon", "INFINITE_LANGUAGE") => "no_icon", __("Yes, Display Icon", "INFINITE_LANGUAGE") => "custom_icon"),
		  	"description" => __("Should an icon be displayed at the left side of the progress bar.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "icons",
		  	"heading" => __("Icon", "INFINITE_LANGUAGE"),
		  	"param_name" => "icon",
		  	"value" => $infinite_icons,
		  	"dependency" => Array('element' => "checkicon", 'value' => array('custom_icon'))
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Pie Chart
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Pie Chart", "INFINITE_LANGUAGE"),
	"base" => "ig_circular_progress_bar",
	"icon" => "icon-pie-graph",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Circular Progress Bar Field", "INFINITE_LANGUAGE"),
		  	"param_name" => "circular_field",
		  	"description" => __("Enter the Circular Progress Bar Field title here.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Circular Progress in %", "INFINITE_LANGUAGE"),
		  	"param_name" => "circular_percentage",
		  	"description" => __("Enter a number between 0 and 100.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "colorpicker",
		  	"heading" => __("Circular Bar Color", "INFINITE_LANGUAGE"),
		  	"param_name" => "circular_bgcolor",
		  	"value" => "#47a3da",
		  	"description" => __("Select custom color for circular bar.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "colorpicker",
		  	"heading" => __("Circular Track Color", "INFINITE_LANGUAGE"),
		  	"param_name" => "circular_trackcolor",
		  	"value" => "#f2f2f2",
		  	"description" => __("Select custom color of the track for the bar.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Circular Progress Size", "INFINITE_LANGUAGE"),
		  	"param_name" => "circular_size",
		  	"description" => __("Enter a number for the size of your circle progress in px. Default size is 220.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Line Width Circle Progress", "INFINITE_LANGUAGE"),
		  	"param_name" => "circular_line",
		  	"description" => __("Enter a number for the width of the bar line in px. Default size is 24.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Count Number
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Count Number", "INFINITE_LANGUAGE"),
	"base" => "ig_count_number",
	"icon" => "icon-sort-numerically-outline",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Count Number Field", "INFINITE_LANGUAGE"),
		  	"param_name" => "number_field",
		  	"description" => __("Enter the Progress Bar Field title here.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Count Number From", "INFINITE_LANGUAGE"),
		  	"param_name" => "number_value_from",
		  	"value" => "0",
		  	"description" => __("The number to start counting from. Default value is 0.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Count Number To", "INFINITE_LANGUAGE"),
		  	"param_name" => "number_value_to",
		  	"value" => "100",
		  	"description" => __("The number to stop counting at. Default value is 100.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Count Number Speed", "INFINITE_LANGUAGE"),
		  	"param_name" => "number_speed",
		  	"value" => "1000",
		  	"description" => __("The number of milliseconds it should take to finish counting. Default value is 1000.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Icon", "INFINITE_LANGUAGE"),
		  	"param_name" => "checkicon",
		  	"value" => array(__("No Icon", "INFINITE_LANGUAGE") => "no_icon", __("Yes, Display Icon", "INFINITE_LANGUAGE") => "custom_icon"),
		  	"description" => __("Should an icon be displayed at the top of the count number.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "icons",
		  	"heading" => __("Icon", "INFINITE_LANGUAGE"),
		  	"param_name" => "icon",
		  	"value" => $infinite_icons,
		  	"dependency" => Array('element' => "checkicon", 'value' => array('custom_icon'))
		),

		$animated_choice,
		$animated_effects,

		array(
		  	"type" => "textfield",
		 	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Pricing Table
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
    "base"		=> "ig_pricing_table",
    "name"		=> __("Pricing Table", "INFINITE_LANGUAGE"),
    "class"		=> "",
    "icon"      => "icon-coin",
	"category" 	=> __('Content', 'INFINITE_LANGUAGE'),
    "params"	=> array(
        
        array(
		  	"type" => "textfield",
		  	"heading" => __("Pricing Table Title", "INFINITE_LANGUAGE"),
		  	"param_name" => "title"
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Pricing Table Price", "INFINITE_LANGUAGE"),
		  	"param_name" => "price"
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Pricing Table Currency Symbol", "INFINITE_LANGUAGE"),
		  	"param_name" => "currency"
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Pricing Table Interval Time", "INFINITE_LANGUAGE"),
		  	"param_name" => "interval"
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Pricing Table Button URL", "INFINITE_LANGUAGE"),
		  	"param_name" => "link_url",
		  	"value" => "#"
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Pricing Table Button Text", "INFINITE_LANGUAGE"),
		  	"param_name" => "link_text",
		  	"value" => "Button Text"
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Pricing Table Link Target", "INFINITE_LANGUAGE"),
		  	"param_name" => "target",
		  	"value" => $target_arr
		),
		
		array(
	      	"type" => "dropdown",
	      	"heading" => __("Icon", "INFINITE_LANGUAGE"),
	      	"param_name" => "checkicon",
	      	"value" => array(__("No Icon", "INFINITE_LANGUAGE") => "no_icon", __("Yes, Display Icon", "INFINITE_LANGUAGE") => "custom_icon"),
	      	"description" => __("Should an icon be displayed at the left side of the button.", "INFINITE_LANGUAGE"),
	      	"admin_label" => false
	    ),

		array(
	      	"type" => "icons",
	      	"heading" => __("Icon", "INFINITE_LANGUAGE"),
	      	"param_name" => "icon",
	      	"value" => $infinite_icons,
		  	"dependency" => Array('element' => "checkicon", 'value' => array('custom_icon'))
	    ),

		array(
		  	"type" => 'checkbox',
		  	"heading" => __("Highlight Pricing Table?", "INFINITE_LANGUAGE"),
		  	"param_name" => "highlight",
		  	"value" => Array(__("Yes, please", "INFINITE_LANGUAGE") => 'yes')
		),
		
		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Text", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"value" => __("<ul><li>5 Project</li><li>5GB Storage</li><li>12 Users</li><li>Tasks</li><li>CRM</li><li>Your Domain</li></ul>", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
    )
));

/*-----------------------------------------------------------------------------------*/
/*	Google Maps
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
    "base"		=> "ig_google_maps",
    "name"		=> __("Google Maps", "INFINITE_LANGUAGE"),
    "class"		=> "",
    "icon"      => "icon-map-pin",
	"category" 	=> __('Content', 'INFINITE_LANGUAGE'),
    "params"	=> array(
        
        array(
		  	"type" => "textfield",
		  	"heading" => __("Insert your Title Marker", "INFINITE_LANGUAGE"),
		  	"param_name" => "marker"
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Default Map Zoom Level", "INFINITE_LANGUAGE"),
		  	"param_name" => "zoom",
			"value" => "17",
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Map Center Latitude", "INFINITE_LANGUAGE"),
		  	"param_name" => "latitude"
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Map Center Longitude", "INFINITE_LANGUAGE"),
		  	"param_name" => "longitude"
		),
		array(
		  	"type" => "attach_image",
		  	"heading" => __("Marker Icon Upload", "INFINITE_LANGUAGE"),
		  	"param_name" => "image",
      	  	"value" => "",
		  	"description" => __("Select image from media library.", "INFINITE_LANGUAGE")
		),
		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Text", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"value" => __("Contact us. Send a Direct Message or Visit us. We are a nimble team making a powerful tools.", "INFINITE_LANGUAGE")
		)
    )
));

/*-----------------------------------------------------------------------------------*/
/*	Icons
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Icon", "INFINITE_LANGUAGE"),
	"base" => "ig_icon",
	"icon" => "icon-diamond4",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Icon Color", "INFINITE_LANGUAGE"),
		  	"param_name" => "icon_color",
		  	"value" => array(__("Theme Color Default", "INFINITE_LANGUAGE") => "", __("Custom Color", "INFINITE_LANGUAGE") => "custom"),
		  	"description" => __("Choose a color for your icon.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
		  	"type" => "colorpicker",
		  	"heading" => __("Icon Custom Color", "INFINITE_LANGUAGE"),
		  	"param_name" => "custom_icon_color",
		  	"description" => __("Select custom color for icon.", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "icon_color", 'value' => array('custom'))
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Icon Size", "INFINITE_LANGUAGE"),
		  	"param_name" => "icon_size",
		  	"description" => __("Size Value in pixel. Enter only number value. Default value is 16.", "INFINITE_LANGUAGE"),
		  	"value" => "16"
		),
		
		array(
		  	"type" => "icons",
		  	"heading" => __("Icon", "INFINITE_LANGUAGE"),
		  	"param_name" => "icon",
		  	"value" => $infinite_icons,
		  	"admin_label" => false
		),
		
		$position_choice,
		$loading_position,
		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));


/*-----------------------------------------------------------------------------------*/
/*	Box Icon
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Box Icon", "INFINITE_LANGUAGE"),
	"base" => "ig_box_icon",
	"icon" => "icon-add2",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Icons Select", "INFINITE_LANGUAGE"),
		  	"param_name" => "icons_select",
		  	"value" => array(
		  					__("Click For Select", "INFINITE_LANGUAGE") => "",
		  					__("Boxed Version", "INFINITE_LANGUAGE") => "boxed_version", 
		  					__("Circle Icon", "INFINITE_LANGUAGE") => "icon_circle",
		  					__("Icon Only", "INFINITE_LANGUAGE") => "icon_only",
		  					__("Standard Icon with Title") => "icon_standard"
		  				),
		  	"admin_label" => false,
		  	"description" => __("Select Your Favorite Box Icons Style.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Icon Position", "INFINITE_LANGUAGE"),
		  	"param_name" => "position",
		  	"value" => array(
		  					__("Left", "INFINITE_LANGUAGE") => "left", 
		  					__("Top", "INFINITE_LANGUAGE") => "top", 
		  					__("Right", "INFINITE_LANGUAGE") => "right"
		  				),
		  	"description" => __("Should the icon be positioned at the left, right or at the top?", "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "icons_select", 'value' => array('icon_circle', 'icon_only')),
		  	"admin_label" => false
		),
		
		array(
		  	"type" => "icons",
		  	"heading" => __("Icon", "INFINITE_LANGUAGE"),
		  	"param_name" => "icon",
		  	"value" => $infinite_icons,
		  	"dependency" => Array('element' => "icons_select", 'value' => array('icon_circle', 'icon_only', 'icon_standard', 'boxed_version')),
		  	"admin_label" => false
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Title", "INFINITE_LANGUAGE"),
		  	"param_name" => "title",
		  	"description" => __("Add an Box Icon title here.", "INFINITE_LANGUAGE"),
		  	"value" => "Box Icon Title",
		  	"admin_label" => false
		),

		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Text", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"value" => __("Insert Your Text.", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		 	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Widgetised sidebar
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Sidebar", "INFINITE_LANGUAGE"),
	"base" => "vc_widget_sidebar",
	"class" => "wpb_widget_sidebar_widget",
	"icon" => "icon-layout9",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(

		array(
		  	"type" => "textfield",
		  	"heading" => __("Widget title", "INFINITE_LANGUAGE"),
		  	"param_name" => "title",
		  	"description" => __("What text use as a widget title. Leave blank if no title is needed.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "widgetised_sidebars",
		  	"heading" => __("Sidebar", "INFINITE_LANGUAGE"),
		  	"param_name" => "sidebar_id",
		  	"description" => __("Select which widget area output.", "INFINITE_LANGUAGE")
		),
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Portfolio
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Portfolio", "INFINITE_LANGUAGE"),
	"base" => "ig_portfolio_grid",
	"icon" => "icon-badge3",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Layout Mode", "INFINITE_LANGUAGE"),
		  	"param_name" => "portfolio_layout",
		  	"value" => array(__("Grid", "INFINITE_LANGUAGE") => "grid-portfolio", __("Masonry", "INFINITE_LANGUAGE") => "masonry-portfolio"),
		  	"admin_label" => false,
		  	"description" => __("Select Portfolio Layout Mode", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Columns", "INFINITE_LANGUAGE"),
		  	"param_name" => "portfolio_columns_count",
		  	"value" => array(__("2 Columns", "INFINITE_LANGUAGE") => "2clm", __("3 Columns", "INFINITE_LANGUAGE") => "3clm", __("4 Columns", "INFINITE_LANGUAGE") => "4clm", __("6 Columns", "INFINITE_LANGUAGE") => "6clm"),
		  	"admin_label" => false,
		  	"description" => __("How many columns should be displayed?", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => 'checkbox',
		  	"heading" => __("Remove Space of the Portfolio Items?", "INFINITE_LANGUAGE"),
		  	"param_name" => "portfolio_item_no_space",
		  	"value" => Array(__("Select it", "INFINITE_LANGUAGE") => 'yes'),
		  	"description" => __("Enable or Disable the space between thSe single portfolio items.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => 'checkbox',
		  	"heading" => __("Remove Link to Single Portfolio Item?", "INFINITE_LANGUAGE"),
		  	"param_name" => "link_portfolio_item",
		  	"value" => Array(__("Select it", "INFINITE_LANGUAGE") => 'yes'),
		  	"description" => __("Enable or Disable the link for the single portfolio item page.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Display Mode", "INFINITE_LANGUAGE"),
		  	"param_name" => "portfolio_post_link",
		  	"value" => array(__("Direct access", "INFINITE_LANGUAGE") => "link_post", __("Display the Image or Video in a Fancybox", "INFINITE_LANGUAGE") => "link_fancybox"),
		  	"admin_label" => false,
		  	"description" => __("When clicking on an item:", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Sortable", "INFINITE_LANGUAGE"),
		  	"param_name" => "portfolio_sortable_mode",
		  	"value" => array(__("Yes", "INFINITE_LANGUAGE") => "yes", __("No", "INFINITE_LANGUAGE") => "no"),
		  	"admin_label" => false,
		  	"description" => __("Should the sorting options based on categories be displayed? Disable if you want display a custom portfolio categories.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Portfolio Sortable Name", "INFINITE_LANGUAGE"),
		  	"param_name" => "portfolio_sortable_name",
		  	"value" => "All Projects",
		  	"admin_label" => false,
		  	"description" => __('Enter sortable name. Default value is All Projects', "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "portfolio_sortable_mode", 'value' => array('yes'))
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Post Number", "INFINITE_LANGUAGE"),
		  	"param_name" => "portfolio_post_number",
		  	"admin_label" => false,
		  	"description" => __('How many post to show? Enter number or word "All". Default value is All.', "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Portfolio Categories", "INFINITE_LANGUAGE"),
		  	"param_name" => "portfolio_categories",
		  	"admin_label" => false,
		  	"description" => __("If you want to show only certain portfolio categories, not the entire portfolio, please write the categories in this field, separated by commas. Please use the <strong>category slug</strong>, not the title.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Order by", "INFINITE_LANGUAGE"),
		  	"param_name" => "orderby",
		  	"value" => array( "", __("Date", "INFINITE_LANGUAGE") => "date", __("ID", "INFINITE_LANGUAGE") => "ID", __("Author", "INFINITE_LANGUAGE") => "author", __("Title", "INFINITE_LANGUAGE") => "title", __("Modified", "INFINITE_LANGUAGE") => "modified", __("Random", "INFINITE_LANGUAGE") => "rand", __("Comment count", "INFINITE_LANGUAGE") => "comment_count", __("Menu order", "INFINITE_LANGUAGE") => "menu_order" ),
		  	"admin_label" => false,
		  	"description" => sprintf(__('Select how to sort retrieved posts. More at %s.', 'INFINITE_LANGUAGE'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Order way", "INFINITE_LANGUAGE"),
		  	"param_name" => "order",
		  	"value" => array( __("Descending", "INFINITE_LANGUAGE") => "DESC", __("Ascending", "INFINITE_LANGUAGE") => "ASC" ),
		  	"admin_label" => false,
		  	"description" => sprintf(__('Designates the ascending or descending order. More at %s.', 'INFINITE_LANGUAGE'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
		),

		$animated_choice,
		$animated_effects,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Team Member
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Team Member", "INFINITE_LANGUAGE"),
	"base" => "ig_team_grid",
	"icon" => "icon-stack-user",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Columns", "INFINITE_LANGUAGE"),
		  	"param_name" => "team_columns_count",
		  	"value" => array(__("2 Columns", "INFINITE_LANGUAGE") => "2clm", __("3 Columns", "INFINITE_LANGUAGE") => "3clm", __("4 Columns", "INFINITE_LANGUAGE") => "4clm"),
		  	"admin_label" => false,
		  	"description" => __("How many columns should be displayed?", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Sortable", "INFINITE_LANGUAGE"),
		  	"param_name" => "team_sortable_mode",
		  	"value" => array(__("Yes", "INFINITE_LANGUAGE") => "yes", __("No", "INFINITE_LANGUAGE") => "no"),
		  	"admin_label" => false,
		  	"description" => __("Should the sorting options based on categories be displayed? Disable if you want display a custom team categories.", "INFINITE_LANGUAGE")
		),

		array(
		 	"type" => "textfield",
		  	"heading" => __("Team Sortable Name", "INFINITE_LANGUAGE"),
		  	"param_name" => "team_sortable_name",
		  	"value" => "All Discipline",
		  	"admin_label" => false,
		  	"description" => __('Enter sortable name. Default value is All Discipline', "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "team_sortable_mode", 'value' => array('yes'))
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Team Number", "INFINITE_LANGUAGE"),
		  	"param_name" => "team_post_number",
		  	"admin_label" => false,
		  	"description" => __('How many post to show? Enter number or word "All". Default value is All.', "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Team Categories", "INFINITE_LANGUAGE"),
		  	"param_name" => "team_categories",
		  	"admin_label" => false,
		  	"description" => __("If you want to show only certain team categories, not the entire team, please write the categories in this field, separated by commas. Please use the <strong>category slug</strong>, not the title.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Order by", "INFINITE_LANGUAGE"),
		  	"param_name" => "orderby",
		  	"value" => array( "", __("Date", "INFINITE_LANGUAGE") => "date", __("ID", "INFINITE_LANGUAGE") => "ID", __("Author", "INFINITE_LANGUAGE") => "author", __("Title", "INFINITE_LANGUAGE") => "title", __("Modified", "INFINITE_LANGUAGE") => "modified", __("Random", "INFINITE_LANGUAGE") => "rand", __("Comment count", "INFINITE_LANGUAGE") => "comment_count", __("Menu order", "INFINITE_LANGUAGE") => "menu_order" ),
		  	"admin_label" => false,
		  	"description" => sprintf(__('Select how to sort retrieved posts. More at %s.', 'INFINITE_LANGUAGE'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Order way", "INFINITE_LANGUAGE"),
		  	"param_name" => "order",
		  	"value" => array( __("Descending", "INFINITE_LANGUAGE") => "DESC", __("Ascending", "INFINITE_LANGUAGE") => "ASC" ),
		  	"admin_label" => false,
		  	"description" => sprintf(__('Designates the ascending or descending order. More at %s.', 'INFINITE_LANGUAGE'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
		),

		$animated_choice,
		$animated_effects,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Knowledgebase
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Knowledgebase", "INFINITE_LANGUAGE"),
	"base" => "ig_knowledgebase_grid",
	"icon" => "icon-bookmark10",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Columns", "INFINITE_LANGUAGE"),
		  	"param_name" => "knowledgebase_columns_count",
		  	"value" => array(__("2 Columns", "INFINITE_LANGUAGE") => "2clm", __("3 Columns", "INFINITE_LANGUAGE") => "3clm", __("4 Columns", "INFINITE_LANGUAGE") => "4clm", __("5 Columns (Only Wall Effect Enabled)", "INFINITE_LANGUAGE") => "5clm", __("6 Columns (Only Wall Effect Enabled)", "INFINITE_LANGUAGE") => "6clm"),
		  	"admin_label" => false,
		  	"description" => __("How many columns should be displayed?", "INFINITE_LANGUAGE")
		),
		
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Sortable", "INFINITE_LANGUAGE"),
		  	"param_name" => "knowledgebase_sortable_mode",
		  	"value" => array(__("Yes", "INFINITE_LANGUAGE") => "yes", __("No", "INFINITE_LANGUAGE") => "no"),
		  	"admin_label" => false,
		  	"description" => __("Should the sorting options based on categories be displayed? Disable if you want display a custom knowledgebase categories.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Knowledgebase Sortable Name", "INFINITE_LANGUAGE"),
		  	"param_name" => "knowledgebase_sortable_name",
		  	"value" => "All Knowledgebase",
		  	"admin_label" => false,
		  	"description" => __('Enter sortable name. Default value is All Knowledgebase', "INFINITE_LANGUAGE"),
		  	"dependency" => Array('element' => "knowledgebase_sortable_mode", 'value' => array('yes'))
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Post Number", "INFINITE_LANGUAGE"),
		  	"param_name" => "knowledgebase_post_number",
		  	"admin_label" => false,
		  	"description" => __('How many post to show? Enter number or word "All". Default value is All.', "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Knowledgebase Categories", "INFINITE_LANGUAGE"),
		  	"param_name" => "knowledgebase_categories",
		  	"admin_label" => false,
		  	"description" => __("If you want to show only certain knowledgebase categories, not the entire knowledgebase, please write the categories in this field, separated by commas. Please use the <strong>category slug</strong>, not the title.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Order by", "INFINITE_LANGUAGE"),
		  	"param_name" => "orderby",
		  	"value" => array( "", __("Date", "INFINITE_LANGUAGE") => "date", __("ID", "INFINITE_LANGUAGE") => "ID", __("Author", "INFINITE_LANGUAGE") => "author", __("Title", "INFINITE_LANGUAGE") => "title", __("Modified", "INFINITE_LANGUAGE") => "modified", __("Random", "INFINITE_LANGUAGE") => "rand", __("Comment count", "INFINITE_LANGUAGE") => "comment_count", __("Menu order", "INFINITE_LANGUAGE") => "menu_order" ),
		  	"admin_label" => false,
		  	"description" => sprintf(__('Select how to sort retrieved posts. More at %s.', 'INFINITE_LANGUAGE'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
		),

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Order way", "INFINITE_LANGUAGE"),
		  	"param_name" => "order",
		  	"value" => array( __("Descending", "INFINITE_LANGUAGE") => "DESC", __("Ascending", "INFINITE_LANGUAGE") => "ASC" ),
		  	"admin_label" => false,
		  	"description" => sprintf(__('Designates the ascending or descending order. More at %s.', 'INFINITE_LANGUAGE'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
		),

		$animated_choice,
		$animated_effects,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Recent Posts
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Recent Posts", "INFINITE_LANGUAGE"),
	"base" => "ig_latest_posts",
	"icon" => "icon-eye12",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Columns", "INFINITE_LANGUAGE"),
		  	"param_name" => "post_columns_count",
		  	"value" => array(__("2 Columns", "INFINITE_LANGUAGE") => "2clm", __("3 Columns", "INFINITE_LANGUAGE") => "3clm", __("4 Columns", "INFINITE_LANGUAGE") => "4clm"),
		  	"admin_label" => false,
		  	"description" => __("How many columns should be displayed?", "INFINITE_LANGUAGE")
		),
			
		array(
		  	"type" => "textfield",
		  	"heading" => __("Post Number", "INFINITE_LANGUAGE"),
			"param_name" => "post_number",
		  	"admin_label" => false,
		  	"description" => __('How many post to show? Enter number or word "All". Default value is All.', "INFINITE_LANGUAGE")
		),

		array(
		 	"type" => "textfield",
		  	"heading" => __("Categories", "INFINITE_LANGUAGE"),
		  	"param_name" => "post_categories",
		  	"admin_label" => false,
		  	"description" => __("If you want to show only certain posts categories, not the entire blog, please write the categories in this field, separated by commas. Please use the <strong>category slug</strong>, not the title.", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Blog
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Blog", "INFINITE_LANGUAGE"),
	"base" => "ig_blog",
	"icon" => "icon-documents",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
	
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Layout", "INFINITE_LANGUAGE"),
		  	"param_name" => "blog_layout",
		  	"value" => array(__("Standard Blog With Left Sidebar", "INFINITE_LANGUAGE") => "sbwls_blog", __("Standard Blog With Right Sidebar", "INFINITE_LANGUAGE") => "sbwrs_blog", __("Standard Blog No Sidebar", "INFINITE_LANGUAGE") => "sbns_blog", __("Masonry Blog With Left Sidebar", "INFINITE_LANGUAGE") => "mbwls_blog", __("Masonry Blog With Right Sidebar", "INFINITE_LANGUAGE") => "mbwrs_blog", __("Masonry Blog No Sidebar", "INFINITE_LANGUAGE") => "mbns_blog", __("Blog With Dual Sibedars", "INFINITE_LANGUAGE") => "bwds_blog", __("Masonry Blog No Sidebar", "INFINITE_LANGUAGE") => "mbns_blog", __("Center Blog", "INFINITE_LANGUAGE") => "cb_blog"),
		  	"admin_label" => false,
		  	"description" => __("Please select the scheme you prefer for the blog.", "INFINITE_LANGUAGE")
		),
		
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Columns", "INFINITE_LANGUAGE"),
		  	"param_name" => "post_columns_count",
		  	"value" => array(__("2 Columns", "INFINITE_LANGUAGE") => "2clm", __("3 Columns", "INFINITE_LANGUAGE") => "3clm", __("4 Columns", "INFINITE_LANGUAGE") => "4clm"),
		  	"admin_label" => false,
		  	"description" => __("How many columns should be displayed? Just for Masonry scheme!", "INFINITE_LANGUAGE")
		),
		
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Pagination", "INFINITE_LANGUAGE"),
		  	"param_name" => "pagination_blog",
		  	"value" => array(__("No", "INFINITE_LANGUAGE") => "no", __("Yes", "INFINITE_LANGUAGE") => "yes"),
		  	"admin_label" => false,
		  	"description" => __("How want pagination for your blog?", "INFINITE_LANGUAGE")
		),
			
		array(
		  	"type" => "textfield",
		  	"heading" => __("Post Number Per Page", "INFINITE_LANGUAGE"),
			"param_name" => "post_number",
		  	"admin_label" => false,
		  	"description" => __('How many post to show? Enter number or word "All". Default value is 10.', "INFINITE_LANGUAGE")
		),

		array(
		 	"type" => "textfield",
		  	"heading" => __("Categories", "INFINITE_LANGUAGE"),
		  	"param_name" => "post_categories",
		  	"admin_label" => false,
		  	"description" => __("If you want to show only certain posts categories, not the entire blog, please write the categories in this field, separated by commas. Please use the <strong>category slug</strong>, not the title.", "INFINITE_LANGUAGE")
		),

		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Video Embed or Video Self Hosted
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Video Player", "INFINITE_LANGUAGE"),
	"base" => "ig_video_container",
	"icon" => "icon-play-circle",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Video Embed / Video Self Hosted", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"description" => __("Click on the <strong>Shortcode Button</strong> and select <strong>Video Embed or Video Self Hosted Shortcode</strong>.
		  	<br/><br/>A list of all supported Video Services can be found on <a href='http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F' target='_blank'>WordPress.org</a><br/>
		  	<br/>Working examples, in case you want to use an external service (Video Embed Shortcode):
		  	<br/><strong>https://vimeo.com/charlex/shapeshifter</strong>
		  	<br/><strong>http://www.youtube.com/watch?v=CZIt20emgLY</strong>", "INFINITE_LANGUAGE"),
		  	"value" => __("", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,
			
		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Audio Self Hosted
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Audio Player", "INFINITE_LANGUAGE"),
	"base" => "ig_audio_container",
	"icon" => "icon-music9",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(
		
		array(
		  	"type" => "textarea_html",
		  	"holder" => "div",
		  	"heading" => __("Audio Self Hosted", "INFINITE_LANGUAGE"),
		  	"param_name" => "content",
		  	"description" => __("Click on the <strong>Shortcode Button</strong> and select <strong>Audio Self Hosted Shortcode</strong>.", "INFINITE_LANGUAGE"),
		  	"value" => __("", "INFINITE_LANGUAGE")
		),

		$animated_choice,
		$animated_effects,
		$animated_delay,
			
		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Twitter
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Twitter", "INFINITE_LANGUAGE"),
	"base" => "ig_recent_tweets",
	"icon" => "icon-social-twitter-circular",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"params" => array(

		array(
		  	"type" => "dropdown",
		  	"heading" => __("Tweets Mode", "INFINITE_LANGUAGE"),
		  	"param_name" => "twitter_mode",
		  	"value" => array(__("One Tweet", "INFINITE_LANGUAGE") => "one_tweet", __("More Tweet", "INFINITE_LANGUAGE") => "more_tweet"),
		  	"admin_label" => false,
		  	"description" => __("Select Your Favorite Twitter Style.", "INFINITE_LANGUAGE")
		),
		
		array(
		  	"type" => "textfield",
		  	"heading" => __("Twitter Username", "INFINITE_LANGUAGE"),
		  	"param_name" => "twitter_username",
		  	"value" => "8grids",
		  	"description" => __("Insert here your twitter username only.", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
		),

		array(
			"type" => "textfield",
			"heading" => __("Number Tweet", "INFINITE_LANGUAGE"),
			"param_name" => "num_tweet",
			"value" => "",
			"description" => __("Display total tweets.", "INFINITE_LANGUAGE"),
			"dependency" => Array('element' => "twitter_mode", 'value' => array('more_tweet'))
		),

		$animated_choice,
		$animated_effects,
			
		array(
		  	"type" => "textfield",
		  	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
		  	"param_name" => "el_class",
		  	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
		)
	)
));

/*-----------------------------------------------------------------------------------*/
/*	Social Networks
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Social Networks", "INFINITE_LANGUAGE"),
  	"base" => "ig_social_profile",
  	"icon" => "icon-social-facebook-circular",
  	"category" => __('Content', 'INFINITE_LANGUAGE'),
  	"params" => array(
		
			array(
				"param_name" => "aim", 
				"type" => "textfield", 
				"heading" => __("Aim URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Aim URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "aim_alt", 
				"type" => "textfield", 
				"heading" => __("Aim alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Aim URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "amazon", 
				"type" => "textfield", 
				"heading" => __("Amazon URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Amazon URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "app_store", 
				"type" => "textfield", 
				"heading" => __("App Store URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your App Store URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "apple", 
				"type" => "textfield", 
				"heading" => __("Apple URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Apple URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "arto", 
				"type" => "textfield", 
				"heading" => __("Arto URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Arto URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "aws", 
				"type" => "textfield", 
				"heading" => __("AWS URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your AWS URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "baidu", 
				"type" => "textfield", 
				"heading" => __("Baidu URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Baidu URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "basecamp", 
				"type" => "textfield", 
				"heading" => __("Basecamp URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Basecamp URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "bebo", 
				"type" => "textfield", 
				"heading" => __("Bebo URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Bebo URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "behance", 
				"type" => "textfield", 
				"heading" => __("Behance URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Behance URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "bing", 
				"type" => "textfield", 
				"heading" => __("Bing URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Bing URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "blip", 
				"type" => "textfield", 
				"heading" => __("Blip URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Blip URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "blogger", 
				"type" => "textfield", 
				"heading" => __("Blogger URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Blogger URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "bnter", 
				"type" => "textfield", 
				"heading" => __("Bnter URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Bnter URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "brightkite", 
				"type" => "textfield", 
				"heading" => __("Brightkite URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Brightkite URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "cinch", 
				"type" => "textfield", 
				"heading" => __("Cinch URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Cinch URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "cloudapp", 
				"type" => "textfield", 
				"heading" => __("Cloudapp URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Cloudapp URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "coroflot", 

				"type" => "textfield", 
				"heading" => __("Coroflot URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Coroflot URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "creative_commons", 
				"type" => "textfield", 
				"heading" => __("Creative Commons URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Creative Commons URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "dailybooth", 
				"type" => "textfield", 
				"heading" => __("Dailybooth URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Dailybooth URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "delicious", 
				"type" => "textfield", 
				"heading" => __("Delicious URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Delicious URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "designbump", 
				"type" => "textfield", 
				"heading" => __("Designbump URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Designbump URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "designfloat", 
				"type" => "textfield", 
				"heading" => __("Designfloat URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Designfloat URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "designmoo", 
				"type" => "textfield", 
				"heading" => __("Designmoo URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Designmoo URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "deviantart", 
				"type" => "textfield", 
				"heading" => __("Deviantart URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Deviantart URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "digg", 
				"type" => "textfield", 
				"heading" => __("Digg URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Digg URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "digg_alt", 
				"type" => "textfield", 
				"heading" => __("digg alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Digg URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "diigo", 
				"type" => "textfield", 
				"heading" => __("Diigo URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Diigo URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "dribbble", 
				"type" => "textfield", 
				"heading" => __("Dribbble URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Dribbble URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "dropbox", 
				"type" => "textfield", 
				"heading" => __("Dropbox URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Dropbox URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "drupal", 
				"type" => "textfield", 
				"heading" => __("Drupal URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Drupal URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "dzone", 
				"type" => "textfield", 
				"heading" => __("Dzone URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Dzone URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "ebay", 
				"type" => "textfield", 
				"heading" => __("Ebay URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Ebay URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "ember", 
				"type" => "textfield", 
				"heading" => __("Ember URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Ember URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "etsy", 
				"type" => "textfield", 
				"heading" => __("Etsy URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Etsy URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "evernote", 
				"type" => "textfield", 
				"heading" => __("Evernote URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Evernote URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "facebook", 
				"type" => "textfield", 
				"heading" => __("Facebook URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Facebook URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "facebook_alt", 
				"type" => "textfield", 
				"heading" => __("Facebook alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Facebook URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "facebook_places", 
				"type" => "textfield", 
				"heading" => __("Facebook Places URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Facebook Places URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "facto_me", 
				"type" => "textfield", 
				"heading" => __("Facto.me URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Facto.me URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "feedburner", 
				"type" => "textfield", 
				"heading" => __("Feedburner URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Feedburner URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "flickr", 
				"type" => "textfield", 
				"heading" => __("Flickr URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Flickr URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "folkd", 
				"type" => "textfield", 
				"heading" => __("Folkd URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Folkd URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "formspring", 
				"type" => "textfield", 
				"heading" => __("Formspring URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Formspring URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "forrst", 
				"type" => "textfield", 
				"heading" => __("Forrst URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Forrst URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "foursquare", 
				"type" => "textfield", 
				"heading" => __("Foursquare URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Foursquare URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "friendfeed", 
				"type" => "textfield", 
				"heading" => __("Friendfeed URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Friendfeed URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "friendster", 
				"type" => "textfield", 
				"heading" => __("Friendster URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Friendster URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "gdgt", 
				"type" => "textfield", 
				"heading" => __("Gdgt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Gdgt URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "github", 
				"type" => "textfield", 
				"heading" => __("Github URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Github URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "github_alt", 
				"type" => "textfield", 
				"heading" => __("Github Alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Github URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "goodreads", 
				"type" => "textfield", 
				"heading" => __("Goodreads URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Goodreads URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "google", 
				"type" => "textfield", 
				"heading" => __("Google URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Google URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "google_buzz", 
				"type" => "textfield", 
				"heading" => __("Google Buzz URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Google Buzz URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "google_talk", 
				"type" => "textfield", 
				"heading" => __("Google Talk URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Google Talk URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "googleplus", 
				"type" => "textfield", 
				"heading" => __("Google Plus URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Google Plus URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "gowalla", 
				"type" => "textfield", 
				"heading" => __("Gowalla URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Gowalla URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "gowalla_alt", 
				"type" => "textfield", 
				"heading" => __("Gowalla alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Gowalla URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "grooveshark", 
				"type" => "textfield", 
				"heading" => __("Grooveshark URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Grooveshark URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "hacker_news", 
				"type" => "textfield", 
				"heading" => __("Hacker News URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Hacker News URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "hi5", 
				"type" => "textfield", 
				"heading" => __("hi5 URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your hi5 URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "hype_machine", 
				"type" => "textfield", 
				"heading" => __("Hype Machine URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Hype Machine URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "hyves", 
				"type" => "textfield", 
				"heading" => __("Hyves URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Hyves URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "icq", 
				"type" => "textfield", 
				"heading" => __("icq URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your icq URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "identi_ca", 
				"type" => "textfield", 
				"heading" => __("identi.ca URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your identi.ca URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "instagram", 
				"type" => "textfield", 
				"heading" => __("Instagram URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Instagram URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "instapaper", 
				"type" => "textfield", 
				"heading" => __("Instapaper URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Instapaper URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "itunes", 
				"type" => "textfield", 
				"heading" => __("iTunes URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your iTunes URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "kik", 
				"type" => "textfield", 
				"heading" => __("Kik URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Kik URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "krop", 
				"type" => "textfield", 
				"heading" => __("Krop URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Krop URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "last_fm", 
				"type" => "textfield", 
				"heading" => __("last.fm URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your last.fm URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "linkedin", 
				"type" => "textfield", 
				"heading" => __("Linkedin URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Linkedin URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "linkedin_alt", 
				"type" => "textfield", 
				"heading" => __("Linkedin alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Linkedin URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "livejournal", 
				"type" => "textfield", 
				"heading" => __("Livejournal URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Livejournal URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "lovedsgn", 
				"type" => "textfield", 
				"heading" => __("Lovedsgn URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Lovedsgn URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "meetup", 
				"type" => "textfield", 
				"heading" => __("Meetup URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Meetup URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "metacafe", 
				"type" => "textfield", 
				"heading" => __("Metacafe URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Metacafe URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "ming", 
				"type" => "textfield", 
				"heading" => __("Ming URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Ming URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "mister_wong", 
				"type" => "textfield", 
				"heading" => __("Mister Wong URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Mister Wong URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "mixx", 
				"type" => "textfield", 
				"heading" => __("Mixx URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Mixx URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "mixx_alt", 
				"type" => "textfield", 
				"heading" => __("Mixx alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Mixx URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "mobileme", 
				"type" => "textfield", 
				"heading" => __("Mobileme URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Mobileme URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "msn_messenger", 
				"type" => "textfield", 
				"heading" => __("Msn Messenger URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Msn Messenger URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "myspace", 
				"type" => "textfield", 
				"heading" => __("Myspace URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Myspace URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "myspace_alt", 
				"type" => "textfield", 
				"heading" => __("Myspace alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Myspace URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "newsvine", 
				"type" => "textfield", 
				"heading" => __("Newsvine URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Newsvine URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "official_fm", 
				"type" => "textfield", 
				"heading" => __("official.fm URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your official.fm URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "openid", 
				"type" => "textfield", 
				"heading" => __("Openid URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Openid URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "orkut", 
				"type" => "textfield", 
				"heading" => __("Orkut URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Orkut URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "pandora", 
				"type" => "textfield", 
				"heading" => __("Pandora URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Pandora URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "path", 
				"type" => "textfield", 
				"heading" => __("Path URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Path URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "paypal", 
				"type" => "textfield", 
				"heading" => __("Paypal URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Paypal URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "photobucket", 
				"type" => "textfield", 
				"heading" => __("Photobucket URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Photobucket URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "picasa", 
				"type" => "textfield", 
				"heading" => __("Picasa URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Picasa URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "pinboard_in", 
				"type" => "textfield", 
				"heading" => __("pinboard.in URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your pinboard.in URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "ping", 
				"type" => "textfield", 
				"heading" => __("Ping URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Ping URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "pingchat", 
				"type" => "textfield", 
				"heading" => __("Pingchat URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Pingchat URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "pinterest", 
				"type" => "textfield", 
				"heading" => __("Pinterest URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Pinterest URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "playstation", 
				"type" => "textfield", 
				"heading" => __("Playstation URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Playstation URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "plixi", 
				"type" => "textfield", 
				"heading" => __("Plixi URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Plixi URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "plurk", 
				"type" => "textfield", 
				"heading" => __("Plurk URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Plurk URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "podcast", 
				"type" => "textfield", 
				"heading" => __("Podcast URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Podcast URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "posterous", 
				"type" => "textfield", 
				"heading" => __("Posterous URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Posterous URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "qik", 
				"type" => "textfield", 
				"heading" => __("Qik URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Qik URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "quik", 
				"type" => "textfield", 
				"heading" => __("Quik URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Quik URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "quora", 
				"type" => "textfield", 
				"heading" => __("Quora URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Quora URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "rdio", 
				"type" => "textfield", 
				"heading" => __("rdio URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your rdio URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "readernaut", 
				"type" => "textfield", 
				"heading" => __("Readernaut URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Readernaut URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "reddit", 
				"type" => "textfield", 
				"heading" => __("Reddit URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Reddit URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "retweet", 
				"type" => "textfield", 
				"heading" => __("Retweet URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Retweet URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "robo_to", 
				"type" => "textfield", 
				"heading" => __("robo.to URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your robo.to URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "rss", 
				"type" => "textfield", 
				"heading" => __("rss URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your rss URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "scribd", 
				"type" => "textfield", 
				"heading" => __("Scribd URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Scribd URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "sharethis", 
				"type" => "textfield", 
				"heading" => __("Sharethis URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Sharethis URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "simplenote", 
				"type" => "textfield", 
				"heading" => __("Simplenote URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Simplenote URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),array(
				"param_name" => "skype", 
				"type" => "textfield", 
				"heading" => __("Skype URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Skype URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "slashdot", 
				"type" => "textfield", 
				"heading" => __("Slashdot URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Slashdot URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),array(
				"param_name" => "slideshare", 
				"type" => "textfield", 
				"heading" => __("Slideshare URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Slideshare URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "smugmug", 
				"type" => "textfield", 
				"heading" => __("Smugmug URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Smugmug URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "soundcloud", 
				"type" => "textfield", 
				"heading" => __("Soundcloud URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Soundcloud URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "spotify", 
				"type" => "textfield", 
				"heading" => __("Spotify URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Spotify URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "squarespace", 
				"type" => "textfield", 
				"heading" => __("Squarespace URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Squarespace URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "squidoo", 
				"type" => "textfield", 
				"heading" => __("Squidoo URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Squidoo URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),array(
				"param_name" => "steam", 
				"type" => "textfield", 
				"heading" => __("Steam URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Steam URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),array(
				"param_name" => "stumbleupon", 
				"type" => "textfield", 
				"heading" => __("Stumbleupon URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Stumbleupon URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "technorati", 
				"type" => "textfield", 
				"heading" => __("Technorati URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Technorati URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),array(
				"param_name" => "threewords_me", 
				"type" => "textfield", 
				"heading" => __("threewords.me URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your threewords.me URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "tribe_net", 
				"type" => "textfield", 
				"heading" => __("tribe.net URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your tribe.net URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "tripit", 
				"type" => "textfield", 
				"heading" => __("Tripit URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Tripit URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "tumblr", 
				"type" => "textfield", 
				"heading" => __("Tumblr URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Tumblr URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "twitter", 
				"type" => "textfield", 
				"heading" => __("Twitter URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Twitter URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "twitter_alt", 
				"type" => "textfield", 
				"heading" => __("twitter alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your twitter URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "vcard", 
				"type" => "textfield", 
				"heading" => __("Vcard URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Vcard URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "viddler", 
				"type" => "textfield", 
				"heading" => __("Viddler URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Viddler URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "vimeo", 
				"type" => "textfield", 
				"heading" => __("Vimeo URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Vimeo URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "virb", 
				"type" => "textfield", 
				"heading" => __("Virb URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Virb URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "w3", 
				"type" => "textfield", 
				"heading" => __("W3 URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your W3 URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "whatsapp", 
				"type" => "textfield", 
				"heading" => __("Whatsapp URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Whatsapp URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "wikipedia", 
				"type" => "textfield", 
				"heading" => __("Wikipedia URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Wikipedia URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "windows", 
				"type" => "textfield", 
				"heading" => __("Windows URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Windows URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "wists", 
				"type" => "textfield", 
				"heading" => __("Wists URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Wists URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "wordpress", 
				"type" => "textfield", 
				"heading" => __("Wordpress URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Wordpress URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "wordpress_alt", 
				"type" => "textfield", 
				"heading" => __("Wordpress alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Wordpress URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "xing", 
				"type" => "textfield", 
				"heading" => __("Xing URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Xing URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "yahoo", 
				"type" => "textfield", 
				"heading" => __("Yahoo URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Yahoo URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "yahoo_buzz", 
				"type" => "textfield", 
				"heading" => __("Yahoo Buzz URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Yahoo Buzz URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "yahoo_messenger", 
				"type" => "textfield", 
				"heading" => __("Yahoo Messenger URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Yahoo Messenger URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "yelp", 
				"type" => "textfield", 
				"heading" => __("Yelp URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Yelp URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "youtube", 
				"type" => "textfield", 
				"heading" => __("Youtube URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Youtube URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "youtube_alt", 
				"type" => "textfield", 
				"heading" => __("Youtube alt URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Youtube URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "zerply", 
				"type" => "textfield", 
				"heading" => __("Zerply URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Zerply URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "zootool", 
				"type" => "textfield", 
				"heading" => __("Zootool URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Zootool URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			),
			array(
				"param_name" => "zynga", 
				"type" => "textfield", 
				"heading" => __("Zynga URL", "INFINITE_LANGUAGE"),
				"description" => __("Please enter in your Zynga URL.", "INFINITE_LANGUAGE"),
				"value" => ""
			)
  	)
));

/*-----------------------------------------------------------------------------------*/
/*	Button
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
	"name" => __("Button", "INFINITE_LANGUAGE"),
  	"base" => "ig_buttons",
  	"icon" => "icon-mouse4",
  	"category" => __('Content', 'INFINITE_LANGUAGE'),
  	"params" => array(
		
		array(
      		"type" => "textfield",
      		"heading" => __("Button Label", "INFINITE_LANGUAGE"),
      		"param_name" => "buttonlabel",
      		"description" => __("This is the text that appears on your button.", "INFINITE_LANGUAGE"),
	  		"value" => "Button Title",
	  		"admin_label" => false
    	),
	
		array(
	      	"type" => "textfield",
	      	"heading" => __("Button Link", "INFINITE_LANGUAGE"),
	      	"param_name" => "buttonlink",
	      	"description" => __("Where should your button link to?", "INFINITE_LANGUAGE"),
		  	"admin_label" => false
	    ),
	
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Button Link Target", "INFINITE_LANGUAGE"),
		  	"param_name" => "target",
		  	"value" => $target_arr
		),
		
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Button Style", "INFINITE_LANGUAGE"),
		  	"param_name" => "button_style",
		  	"value" => array(__("Square", "INFINITE_LANGUAGE") => "square-button", __("Softly Rounded", "INFINITE_LANGUAGE") => "softly-rounded-button", __("Softly Rounded With Shadow", "INFINITE_LANGUAGE") => "softly-rounded-w-shadow-button", __("Rounded", "INFINITE_LANGUAGE") => "rounded-button"),
		  	"admin_label" => false
		),
		
		array(
		  	"type" => "dropdown",
		  	"heading" => __("Button Size", "INFINITE_LANGUAGE"),
		  	"param_name" => "buttonsize",
		  	"value" => array(__("Mini", "INFINITE_LANGUAGE") => "button-mini", __("Small", "INFINITE_LANGUAGE") => "button-small", __("Medium", "INFINITE_LANGUAGE") => "button-medium", __("Large", "INFINITE_LANGUAGE") => "button-large"),
		  	"admin_label" => false
		),
		
		array(
	      	"type" => "dropdown",
	      	"heading" => __("Button Color", "INFINITE_LANGUAGE"),
	      	"param_name" => "buttoncolor",
	      	"value" => array(__("Theme Color Default", "INFINITE_LANGUAGE") => "", __("Custom Color", "INFINITE_LANGUAGE") => "custom"),
	      	"description" => __("Choose a color for your button here.", "INFINITE_LANGUAGE"),
	      	"admin_label" => false
	    ),
	    
	    array(
	      	"type" => "colorpicker",
	      	"heading" => __("Button Custom Color", "INFINITE_LANGUAGE"),
	      	"param_name" => "custombuttoncolor",
	      	"description" => __("Select custom color for button.", "INFINITE_LANGUAGE"),
	      	"dependency" => Array('element' => "buttoncolor", 'value' => array('custom'))
	    ),
		
		array(
		  	"type" => 'checkbox',
		  	"heading" => __("Inverted Color?", "INFINITE_LANGUAGE"),
		  	"param_name" => "inverted",
		  	"value" => Array(__("Yes, please", "INFINITE_LANGUAGE") => 'yes')
		),
		
		array(
	      	"type" => "dropdown",
	      	"heading" => __("Icon", "INFINITE_LANGUAGE"),
	      	"param_name" => "checkicon",
	      	"value" => array(__("No Icon", "INFINITE_LANGUAGE") => "no_icon", __("Yes, Display Icon", "INFINITE_LANGUAGE") => "custom_icon"),
	      	"description" => __("Should an icon be displayed at the left side of the button.", "INFINITE_LANGUAGE"),
	      	"admin_label" => false
	    ),

		array(
	      	"type" => "icons",
	      	"heading" => __("Icon", "INFINITE_LANGUAGE"),
	      	"param_name" => "icon",
	      	"value" => $infinite_icons,
		  	"dependency" => Array('element' => "checkicon", 'value' => array('custom_icon'))
	    ),

	    $animated_choice,
		$animated_effects,
		$animated_delay,

		array(
	      	"type" => "textfield",
	      	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
	      	"param_name" => "el_class",
	      	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
	    )
  	)
));

/*-----------------------------------------------------------------------------------*/
/*	HTML / JS
/*-----------------------------------------------------------------------------------*/

wpb_map(array(
  	"name" => __("Raw HTML", "INFINITE_LANGUAGE"),
	"base" => "vc_raw_html",
	"icon" => "icon-console",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"wrapper_class" => "clearfix",
	"params" => array(
		array(
  			"type" => "textarea_raw_html",
			"holder" => "div",
			"heading" => __("Raw HTML", "INFINITE_LANGUAGE"),
			"param_name" => "content",
			"value" => base64_encode("<p>I am raw html block.<br/>Click edit button to change this html</p>"),
			"description" => __("Enter your HTML content.", "INFINITE_LANGUAGE")
		)
	)
));

wpb_map(array(
	"name" => __("Raw JS", "INFINITE_LANGUAGE"),
	"base" => "vc_raw_js",
	"icon" => "icon-console2",
	"category" => __('Content', 'INFINITE_LANGUAGE'),
	"wrapper_class" => "clearfix",
	"params" => array(
  		array(
  			"type" => "textarea_raw_html",
			"holder" => "div",
			"heading" => __("Raw js", "INFINITE_LANGUAGE"),
			"param_name" => "content",
			"value" => __(base64_encode("<script type='text/javascript'> alert('Enter your js here!'); </script>"), "INFINITE_LANGUAGE"),
			"description" => __("Enter your JS code.", "INFINITE_LANGUAGE")
		)
	)
));


/*-----------------------------------------------------------------------------------*/
/*	Support for 3rd Party plugins
/*-----------------------------------------------------------------------------------*/

// Contact form 7 plugin
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
if (is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
  global $wpdb;
  $cf7 = $wpdb->get_results( 
  	"
  	SELECT ID, post_title 
  	FROM $wpdb->posts
  	WHERE post_type = 'wpcf7_contact_form' 
  	"
  );
  $contact_forms = array();
  if ($cf7) {
    foreach ( $cf7 as $cform ) {
      $contact_forms[$cform->post_title] = $cform->ID;
    }
  } else {
    $contact_forms["No contact forms found"] = 0;
  }
  wpb_map(array(
  	"base" => "contact-form-7",
    "name" => __("Contact Form 7", "INFINITE_LANGUAGE"),
    "icon" => "icon-bubble14",
    "category" => __('Content', 'INFINITE_LANGUAGE'),
    "params" => array(
    	array(
        	"type" => "textfield",
        	"heading" => __("Form title", "INFINITE_LANGUAGE"),
        	"param_name" => "title",
        	"admin_label" => false,
        	"description" => __("What text use as form title. Leave blank if no title is needed.", "INFINITE_LANGUAGE")
      	),
      	
      	array(
        	"type" => "dropdown",
        	"heading" => __("Select contact form", "INFINITE_LANGUAGE"),
        	"param_name" => "id",
        	"value" => $contact_forms,
        	"description" => __("Choose previously created contact form from the drop down list.", "INFINITE_LANGUAGE")
      	)
    )
  ));
} // if contact form7 plugin active

if (is_plugin_active('revslider/revslider.php')) {
  global $wpdb;
  $rs = $wpdb->get_results( 
  	"
  	SELECT id, title, alias
  	FROM ".$wpdb->prefix."revslider_sliders
  	ORDER BY id ASC LIMIT 100
  	"
  );
  $revsliders = array();
  if ($rs) {
    foreach ( $rs as $slider ) {
      $revsliders[$slider->title] = $slider->alias;
    }
  } else {
    $revsliders["No sliders found"] = 0;
  }
  wpb_map(array(
    "base" => "rev_slider_vc",
    "name" => __("Revolution Slider", "INFINITE_LANGUAGE"),
    "icon" => "icon-stack-picture",
    "category" => __('Content', 'INFINITE_LANGUAGE'),
    "params"=> array(
    	array(
        	"type" => "textfield",
        	"heading" => __("Widget title", "INFINITE_LANGUAGE"),
        	"param_name" => "title",
        	"description" => __("What text use as a widget title. Leave blank if no title is needed.", "INFINITE_LANGUAGE")
      	),
      
      	array(
        	"type" => "dropdown",
        	"heading" => __("Revolution Slider", "INFINITE_LANGUAGE"),
        	"param_name" => "alias",
        	"admin_label" => false,
        	"value" => $revsliders,
        	"description" => __("Select your Revolution Slider.", "INFINITE_LANGUAGE")
      	),
      
      	array(
        	"type" => "textfield",
        	"heading" => __("Extra class name", "INFINITE_LANGUAGE"),
        	"param_name" => "el_class",
        	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "INFINITE_LANGUAGE")
      	)
    )
  ));
} // if revslider plugin active


WPBMap::layout(array('id'=>'column_12', 'title'=>'1/2'));
WPBMap::layout(array('id'=>'column_12-12', 'title'=>'1/2 + 1/2'));
WPBMap::layout(array('id'=>'column_13', 'title'=>'1/3'));
WPBMap::layout(array('id'=>'column_13-13-13', 'title'=>'1/3 + 1/3 + 1/3'));
WPBMap::layout(array('id'=>'column_13-23', 'title'=>'1/3 + 2/3'));
WPBMap::layout(array('id'=>'column_14', 'title'=>'1/4'));
WPBMap::layout(array('id'=>'column_14-14-14-14', 'title'=>'1/4 + 1/4 + 1/4 + 1/4'));
WPBMap::layout(array('id'=>'column_16', 'title'=>'1/6'));
WPBMap::layout(array('id'=>'column_11', 'title'=>'1/1'));