<?php
require_once( CTF_URL . '/inc/widget.php' );

require_once( CTF_URL . '/inc/admin-pro-hooks.php' );

/**
* include the admin files only if in the admin area
*/
if ( is_admin() ) {
require_once( CTF_URL . '/inc/CtfAdmin.php' );

$admin = new CtfAdmin;
}

/**
 * Generates the Twitter feed wherever the shortcode is placed
 *
 * @param $atts array shortcode arguments
 * 
 * @return string
 */
function ctf_init( $atts ) {

    include_once( CTF_URL . '/inc/CtfFeed.php' );
    include_once( CTF_URL . '/inc/CtfFeedPro.php' );

    wp_enqueue_script( 'ctf_scripts' );
    $twitter_feed = CtfFeedPro::init( $atts );

    // if there is an error, display the error html, otherwise the feed
    if ( ! $twitter_feed->tweet_set || $twitter_feed->missing_credentials || ! isset( $twitter_feed->tweet_set[0]['created_at'] ) ) {
        return $twitter_feed->getErrorHtml();
    } else {
    	if ( ! $twitter_feed->feed_options['persistentcache'] ) {
		    $twitter_feed->maybeCacheTweets();
	    }

        $feed_html = $twitter_feed->getFeedOpeningHtml();
        $feed_html .= $twitter_feed->getTweetSetHtml();
        $feed_html .= $twitter_feed->getFeedClosingHtml();

        return $feed_html;
    }
}
add_shortcode( 'custom-twitter-feed', 'ctf_init' );
add_shortcode( 'custom-twitter-feeds', 'ctf_init' );

/**
* Called via ajax to get more posts after the "load more" button is clicked
*/
function ctf_get_more_posts() {
    $shortcode_data = json_decode( str_replace( array( '\"', "\\'" ), array( '"', "'" ), sanitize_text_field( $_POST['shortcode_data'] ) ), true ); // necessary to unescape quotes
    $last_id_data = isset( $_POST['last_id_data'] ) ? sanitize_text_field( $_POST['last_id_data'] ) : '';
    $num_needed = isset( $_POST['num_needed'] ) ? (int)$_POST['num_needed'] : 0;
    $ids_to_remove = isset( $_POST['ids_to_remove'] ) ? $_POST['ids_to_remove'] : 0;
    $is_pagination = empty( $last_id_data ) ? 0 : 1;
    $persistent_index = isset( $_POST['persistent_index'] ) ? sanitize_text_field( $_POST['persistent_index'] ) : '';

    include_once( CTF_URL . '/inc/CtfFeed.php' );
    include_once( CTF_URL . '/inc/CtfFeedPro.php' );

    $twitter_feed = CtfFeedPro::init( $shortcode_data, $last_id_data, $num_needed, $ids_to_remove, $persistent_index );

	if ( ! $twitter_feed->feed_options['persistentcache'] ) {
		$twitter_feed->maybeCacheTweets();
	}

    echo $twitter_feed->getTweetSetHtml( $is_pagination );

    die();
}
add_action( 'wp_ajax_nopriv_ctf_get_more_posts', 'ctf_get_more_posts' );
add_action( 'wp_ajax_ctf_get_more_posts', 'ctf_get_more_posts' );

/**
 * the html output is controlled by the user selecting which portions of tweets to show
 *
 * @param $part string          part of the feed in the html
 * @param $feed_options array   options that contain what parts of the tweet to show
 * @return bool                 whether or not to show the tweet
 */
function ctf_show( $part, $feed_options ) {
    $tweet_excludes = isset( $feed_options['tweet_excludes'] ) ? $feed_options['tweet_excludes'] : '';
    $tweet_includes = isset( $feed_options['tweet_includes'] ) ? $feed_options['tweet_includes'] : '';

    // if part is in the array of excluded parts or not in the array of included parts, don't show
    if ( ! empty( $tweet_excludes ) ) {
        return ( in_array( $part, $tweet_excludes ) === false );
    } else {
        return ( in_array( $part, $tweet_includes ) === true );
    }
}

function ctf_get_fa_el( $icon ) {
    $options = get_option( 'ctf_options' );
    $font_method = isset( $options['font_method'] ) ? $options['font_method'] : 'svg';

    $elems = array(
	    'fa-arrows-alt' => array(
		    'icon' => '<span class="fa fa-arrows-alt"></span>',
		    'svg' => '<svg class="svg-inline--fa fa-arrows-alt fa-w-16" aria-hidden="true" aria-label="expand" data-fa-processed="" data-prefix="fa" data-icon="arrows-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M352.201 425.775l-79.196 79.196c-9.373 9.373-24.568 9.373-33.941 0l-79.196-79.196c-15.119-15.119-4.411-40.971 16.971-40.97h51.162L228 284H127.196v51.162c0 21.382-25.851 32.09-40.971 16.971L7.029 272.937c-9.373-9.373-9.373-24.569 0-33.941L86.225 159.8c15.119-15.119 40.971-4.411 40.971 16.971V228H228V127.196h-51.23c-21.382 0-32.09-25.851-16.971-40.971l79.196-79.196c9.373-9.373 24.568-9.373 33.941 0l79.196 79.196c15.119 15.119 4.411 40.971-16.971 40.971h-51.162V228h100.804v-51.162c0-21.382 25.851-32.09 40.97-16.971l79.196 79.196c9.373 9.373 9.373 24.569 0 33.941L425.773 352.2c-15.119 15.119-40.971 4.411-40.97-16.971V284H284v100.804h51.23c21.382 0 32.09 25.851 16.971 40.971z"></path></svg>'
	    ),
	    'fa-check-circle' => array(
		    'icon' => '<span class="fa fa-check-circle"></span>',
		    'svg' => '<svg class="svg-inline--fa fa-check-circle fa-w-16" aria-hidden="true" aria-label="verified" data-fa-processed="" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>'
	    ),
	    'fa-reply' => array(
		    'icon' => '<span class="fa fa-reply"></span>',
		    'svg' => '<svg class="svg-inline--fa fa-reply fa-w-16" aria-hidden="true" aria-label="reply" data-fa-processed="" data-prefix="fa" data-icon="reply" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M8.309 189.836L184.313 37.851C199.719 24.546 224 35.347 224 56.015v80.053c160.629 1.839 288 34.032 288 186.258 0 61.441-39.581 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 45.344-145.012-21.507-183.51-176.59-185.742V360c0 20.7-24.3 31.453-39.687 18.164l-176.004-152c-11.071-9.562-11.086-26.753 0-36.328z"></path></svg>'
	    ),
	    'fa-retweet' => array(
		    'icon' => '<span class="fa fa-retweet"></span>',
		    'svg' => '<svg class="svg-inline--fa fa-retweet fa-w-20" aria-hidden="true" aria-label="retweet" data-fa-processed="" data-prefix="fa" data-icon="retweet" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M629.657 343.598L528.971 444.284c-9.373 9.372-24.568 9.372-33.941 0L394.343 343.598c-9.373-9.373-9.373-24.569 0-33.941l10.823-10.823c9.562-9.562 25.133-9.34 34.419.492L480 342.118V160H292.451a24.005 24.005 0 0 1-16.971-7.029l-16-16C244.361 121.851 255.069 96 276.451 96H520c13.255 0 24 10.745 24 24v222.118l40.416-42.792c9.285-9.831 24.856-10.054 34.419-.492l10.823 10.823c9.372 9.372 9.372 24.569-.001 33.941zm-265.138 15.431A23.999 23.999 0 0 0 347.548 352H160V169.881l40.416 42.792c9.286 9.831 24.856 10.054 34.419.491l10.822-10.822c9.373-9.373 9.373-24.569 0-33.941L144.971 67.716c-9.373-9.373-24.569-9.373-33.941 0L10.343 168.402c-9.373 9.373-9.373 24.569 0 33.941l10.822 10.822c9.562 9.562 25.133 9.34 34.419-.491L96 169.881V392c0 13.255 10.745 24 24 24h243.549c21.382 0 32.09-25.851 16.971-40.971l-16.001-16z"></path></svg>'
	    ),
	    'fa-heart' => array(
		    'icon' => '<span class="fa fa-heart"></span>',
		    'svg' => '<svg class="svg-inline--fa fa-heart fa-w-18" aria-hidden="true" aria-label="like" data-fa-processed="" data-prefix="fa" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M414.9 24C361.8 24 312 65.7 288 89.3 264 65.7 214.2 24 161.1 24 70.3 24 16 76.9 16 165.5c0 72.6 66.8 133.3 69.2 135.4l187 180.8c8.8 8.5 22.8 8.5 31.6 0l186.7-180.2c2.7-2.7 69.5-63.5 69.5-136C560 76.9 505.7 24 414.9 24z"></path></svg>'
	    ),
	    'fa-twitter' => array(
		    'icon' => '<span class="fa fab fa-twitter"></span>',
		    'svg' => '<svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" aria-label="twitter logo" data-fa-processed="" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>'
	    ),
	    'fa-user' => array(
		    'icon' => '<span class="fa fa-user"></span>',
		    'svg' => '<svg class="svg-inline--fa fa-user fa-w-16" aria-hidden="true" aria-label="followers" data-fa-processed="" data-prefix="fa" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M96 160C96 71.634 167.635 0 256 0s160 71.634 160 160-71.635 160-160 160S96 248.366 96 160zm304 192h-28.556c-71.006 42.713-159.912 42.695-230.888 0H112C50.144 352 0 402.144 0 464v24c0 13.255 10.745 24 24 24h464c13.255 0 24-10.745 24-24v-24c0-61.856-50.144-112-112-112z"></path></svg>'
	    ),
	    'ctf_playbtn' => array(
		    'icon' => '',
		    'svg' => '<svg aria-label="play button" style="color: rgba(255,255,255,1)" class="svg-inline--fa fa-play fa-w-14 ctf_playbtn" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>'
	    ),
    );

    if ( $font_method !== 'fontfile' ){
        return $elems[ $icon ]['svg'];
    }

    return $elems[ $icon ]['icon'];
}

/**
 * this function returns the properly formatted date string based on user input
 *
 * @param $raw_date string      the date from the Twitter api
 * @param $feed_options array   options for the feed that contain date formatting settings
 * @param $utc_offset int       offset in seconds for the time display based on timezone
 * @return string               formatted date
 */
function ctf_get_formatted_date( $raw_date, $feed_options, $utc_offset ) {
    include_once( CTF_URL . '/inc/CtfDateTime.php' );
    $options = get_option( 'ctf_options' );
    $timezone = isset( $options['timezone'] ) ? $options['timezone'] : 'default';
    // use php DateTimeZone class to handle the date formatting and offsets
    $date_obj = new CtfDateTime( $raw_date, new DateTimeZone( "UTC" ) );

    if( $timezone != 'default' ) {
        $date_obj->setTimeZone( new DateTimeZone( $timezone ) );
        $utc_offset = $date_obj->getOffset();
    }

    $tz_offset_timestamp = $date_obj->getTimestamp() + $utc_offset;

    // use the custom date format if set, otherwise use from the selected defaults
    if ( ! empty( $feed_options['datecustom'] ) ){
        $date_str = date_i18n( $feed_options['datecustom'], $tz_offset_timestamp );
    } else {

        switch ( $feed_options['dateformat'] ) {

            case '2':
                $date_str = date_i18n( 'F j', $tz_offset_timestamp );
                break;
            case '3':
                $date_str = date_i18n( 'F j, Y', $tz_offset_timestamp );
                break;
            case '4':
                $date_str = date_i18n( 'm.d', $tz_offset_timestamp );
                break;
            case '5':
                $date_str = date_i18n( 'm.d.y', $tz_offset_timestamp );
                break;
            default:

                // default format is similar to Twitter
                $ctf_minute = ! empty( $feed_options['mtime'] ) ? $feed_options['mtime'] : 'm';
                $ctf_hour = ! empty( $feed_options['htime'] ) ? $feed_options['htime'] : 'h';
                $ctf_now_str = ! empty( $feed_options['nowtime'] ) ? $feed_options['nowtime'] : 'now';

                $now = time() + $utc_offset;

                $difference = $now - $tz_offset_timestamp;

                if ( $difference < 60 ) {
                    $date_str = $ctf_now_str;
                } elseif ( $difference < 60*60 ) {
                    $date_str = round( $difference/60 ) . $ctf_minute;
                } elseif ( $difference < 60*60*24 ) {
                    $date_str = round( $difference/3600 ) . $ctf_hour;
                } else  {
                    $one_year_from_date = new CtfDateTime( $raw_date, new DateTimeZone( "UTC" ) );
                    $one_year_from_date->modify('+1 year');
                    $one_year_from_date_timestamp = $one_year_from_date->getTimestamp();
                    if ( $now > $one_year_from_date_timestamp ) {
                        $date_str = date_i18n( 'j M Y', $tz_offset_timestamp );
                    } else {
                        $date_str = date_i18n( 'j M', $tz_offset_timestamp );
                    }
                }
                break;
        }

    }

    return $date_str;
}

function ctf_maybe_shorten_text( $string, $feed_settings ) {

	$limit = $feed_settings['textlength'];

	if ( strlen( $string ) <= $limit || $limit == 280 ) {
		return $string;
	}

    $parts = preg_split( '/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE );
    $parts_count = count( $parts );

    $length = 0;
    $last_part = 0;
    for ( ; $last_part < $parts_count; ++$last_part ) {
        $length += strlen( $parts[ $last_part ] );
        if ( $length > $limit ) { break; }
    }

    $last_part = $last_part !== 0 ? $last_part - 1 : 0;
    $parts[ $last_part ] = $parts[ $last_part ] . '<a href="#" class="ctf_more">...</a><span class="ctf_remaining">';

    $return = implode( ' ', $parts ).'</span>';

    return $return;
}
add_filter( 'ctf_tweet_text', 'ctf_maybe_shorten_text', 10, 2 );

function ctf_replace_urls( $string, $feed_settings, $post ) {

	if ( $feed_settings['shorturls'] ) {
	    return $string;
    }

	if ( isset( $post['entities']['urls'][0] ) ) {
	    foreach ( $post['entities']['urls'] as $url ) {
		    if ( isset( $url['url'] ) ) {
			    $string = str_replace( $url['url'], $url['expanded_url'], $string );
		    }
        }
    }

	return $string;
}
add_filter( 'ctf_tweet_text', 'ctf_replace_urls', 9, 3 );
add_filter( 'ctf_quoted_tweet_text', 'ctf_replace_urls', 9, 3 );

/**
 * Called via ajax to retrieve twitter card data to be used in the feed
 */
function ctf_twitter_cards() {
    $urls = $_POST['ctf_urls'];
    $urls = array_map('esc_url', $urls);

    include_once( CTF_URL . '/inc/twitter-cards.php' );

    die();
}
add_action( 'wp_ajax_nopriv_ctf_twitter_cards', 'ctf_twitter_cards' );
add_action( 'wp_ajax_ctf_twitter_cards', 'ctf_twitter_cards' );

/**
 * Called via ajax to automatically save access token and access token secret
 * retrieved with the big blue button
 */
function ctf_auto_save_tokens() {
    if ( current_user_can( 'edit_posts' ) ) {
        wp_cache_delete ( 'alloptions', 'options' );

        $options = get_option( 'ctf_options', array() );

        $options['access_token'] = sanitize_text_field( $_POST['access_token'] );
        $options['access_token_secret'] = sanitize_text_field( $_POST['access_token_secret'] );

        update_option( 'ctf_options', $options );
        die();
    }
    die();
}
add_action( 'wp_ajax_ctf_auto_save_tokens', 'ctf_auto_save_tokens' );

/**
* manually clears the cached tweets in case of error or user preference
*
* @return mixed bool whether or not it was successful
*/

function ctf_clear_cache() {
    //Delete all transients

	ctf_clear_cache_sql();
	echo '1';
    die();
}
add_action( 'wp_ajax_ctf_clear_cache', 'ctf_clear_cache' );

function ctf_clear_cache_sql() {
	global $wpdb;
	$table_name = $wpdb->prefix . "options";
	$result = $wpdb->query("
    DELETE
    FROM $table_name
    WHERE `option_name` LIKE ('%\_transient\_ctf\_%')
    ");
	$wpdb->query("
    DELETE
    FROM $table_name
    WHERE `option_name` LIKE ('%\_transient\_timeout\_ctf\_%')
    ");
}
add_action( 'ctf_cron_job', 'ctf_clear_cache_sql' );

/**
* manually clears the cached twitter cards in case of error or user preference
*
* @return mixed bool whether or not it was successful
*/
function ctf_clear_twitter_card_cache() {
    if ( current_user_can( 'edit_posts' ) ) {
        delete_option( 'ctf_twitter_cards' );
    } else {
        return false;
    }

    die('1');
}
add_action( 'wp_ajax_ctf_clear_twitter_card_cache', 'ctf_clear_twitter_card_cache' );

/**
 * manually clears the persistent cached tweets
 *
 * @return mixed bool whether or not it was successful
 */

function ctf_clear_persistent_cache() {
	if ( current_user_can( 'edit_posts' ) ) {
		//Delete all persistent caches (start with ctf_!)
		global $wpdb;
		$table_name = $wpdb->prefix . "options";
		$result = $wpdb->query("
        DELETE
        FROM $table_name
        WHERE `option_name` LIKE ('%ctf\_\!%')
        ");
		delete_option( 'ctf_cache_list' );
		return $result;
	} else {
		return false;
	}

	die();
}
add_action( 'wp_ajax_ctf_clear_persistent_cache', 'ctf_clear_persistent_cache' );

function ctf_retrieve_lists_by_owner() {
    if ( current_user_can( 'edit_posts' ) ) {

        $options = get_option( 'ctf_options' );
        $consumer_key = ! empty( $options['consumer_key'] ) && $options['have_own_tokens'] ? $options['consumer_key'] : 'FPYSYWIdyUIQ76Yz5hdYo5r7y';
        $consumer_secret = ! empty( $options['consumer_secret'] ) && $options['have_own_tokens'] ? $options['consumer_secret'] : 'GqPj9BPgJXjRKIGXCULJljocGPC62wN2eeMSnmZpVelWreFk9z';
        $request_settings = array(
            'consumer_key' => $consumer_key,
            'consumer_secret' => $consumer_secret,
            'access_token' => $options['access_token'],
            'access_token_secret' => $options['access_token_secret']
        );

        $request_method = 'auto';

        include_once( CTF_URL . '/inc/CtfOauthConnect.php' );
        include_once( CTF_URL . '/inc/CtfOauthConnectPro.php' );
        $twitter_api = new CtfOauthConnectPro( $request_settings, 'listsmeta' );
        $twitter_api->setUrlBase();
        $get_fields = array( 'screen_name' => sanitize_text_field( $_POST['screen_name'] ) );
        $twitter_api->setGetFields( $get_fields );
        $twitter_api->setRequestMethod( $request_method );

        $twitter_api->performRequest();
        $response = json_decode( $twitter_api->json , $assoc = true );
        if( isset( $response[0]['name'] ) ) {
            $lists = array();
            foreach( $response as $list ){
                $lists[] = array(
                    'name' => $list['name'],
                    'id' => $list['id_str']
                );
            }
            echo json_encode($lists);
        } else {
            echo '0';
        }
    }

    die();
}
add_action( 'wp_ajax_ctf_retrieve_lists_by_owner', 'ctf_retrieve_lists_by_owner' );

/**
* clear the cache and unschedule an cron jobs when deactivated
*/
function ctf_deactivate() {
    ctf_clear_cache();

    wp_clear_scheduled_hook( 'ctf_cron_job' );
}
register_deactivation_hook( __FILE__, 'ctf_deactivate' );

/**
* outputs the custom js from the "Customize" tab on the Settings page
*/
function ctf_custom_js() {
    $options = get_option( 'ctf_options' );
    $ctf_custom_js = isset( $options[ 'custom_js' ] ) ? $options[ 'custom_js' ] : '';

    if ( ! empty( $ctf_custom_js ) ) {
        ?>
        <!-- Custom Twitter Feeds JS -->
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                <?php echo 'window.ctf_custom_js = function(){'. "\r\n"; ?>
                <?php echo stripslashes( $ctf_custom_js ) . "\r\n"; ?>
                <?php echo '}'. "\r\n"; ?>
            });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'ctf_custom_js' );

/**
 * outputs the custom css from the "Customize" tab on the Settings page
 */
function ctf_custom_css() {
    $options = get_option( 'ctf_options' );
    $ctf_custom_css = isset( $options[ 'custom_css' ] ) ? $options[ 'custom_css' ] : '';

    //Show CSS if an admin (so can see Hide Tweet link), if including Custom CSS
    ( current_user_can( 'edit_posts' ) || !empty( $ctf_custom_css ) ) ? $ctf_show_css = true : $ctf_show_css = false;

    if ( $ctf_show_css ) {
        echo "<!-- Custom Twitter Feeds CSS -->" . "\r\n";
        echo "<style type='text/css'>" . "\r\n";
        if( !empty($ctf_custom_css) ) echo stripslashes( $ctf_custom_css ) . "\r\n";
        if( current_user_can( 'edit_posts' ) ) echo "#ctf_mod_link{ display: block; }" . "\r\n";
        echo "</style>" . "\r\n";
    }
}
add_action( 'wp_head', 'ctf_custom_css' );