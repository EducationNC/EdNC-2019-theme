<?php

add_action( 'ctf_admin_endpoints', 'ctf_add_mentionstimeline_options', 10, 1 );
function ctf_add_mentionstimeline_options( $admin ) {
    $admin->create_settings_field( array(
        'name' => 'mentionstimeline',
        'title' => '<label></label>', // label for the input field
        'callback'  => 'feed_settings_radio', // name of the function that outputs the html
        'page' => 'ctf_options_feed_settings', // matches the section name
        'section' => 'ctf_options_feed_settings', // matches the section name
        'option' => 'ctf_options', // matches the options name
        'class' => 'ctf-radio', // class for the wrapper and input field
        'whatis' => 'Select this option to display tweets that @mention your twitter handle', // what is this? text
        'label' => "Mentions Timeline",
        'has_input' => false,
        'has_replies' => false
    ));
}

add_filter( 'ctf_admin_search_label', 'ctf_pro_admin_search_label' );
function ctf_pro_admin_search_label() {
    return 'Search:';
}

add_filter( 'ctf_admin_search_whatis', 'ctf_pro_admin_search_whatis' );
function ctf_pro_admin_search_whatis() {
    return 'You can create search feeds which contain a large variety of different terms and operators, such as a combination of #hashtags, @mentions, words, or "phrases".  See some examples below which demonstrate how to create a search feed:

<span class="ctf_tooltip_table">
    <span class="ctf_col_1 ctf_table_header">Search Terms</span><span class="ctf_col_2 ctf_table_header">Result</span>
    <span class="ctf_col_1">-filter:retweets</span><span class="ctf_col_2">Exclude retweets</span>
    <span class="ctf_col_1">-filter:replies</span><span class="ctf_col_2">Exclude replies</span>
    <span class="ctf_col_1">#awesome</span><span class="ctf_col_2">Tweets tagged with #awesome</span>
    <span class="ctf_col_1">@smashballoon</span><span class="ctf_col_2">Tweets which mention "@smashballoon"</span>
    <span class="ctf_col_1">purple wristwatches</span><span class="ctf_col_2">Tweets which contain both the words "purple" and "wristwatches"</span>
    <span class="ctf_col_1">"cool beans"</span><span class="ctf_col_2">Tweets which contain the exact phrase "cool beans"</span>
    <span class="ctf_col_1">@smashballoon #awesome</span><span class="ctf_col_2">Tweets which mention "@smashballoon" and are also tagged with "#awesome"</span>
    <span class="ctf_col_1">"I love puppies" #fact</span><span class="ctf_col_2">Tweets which contain both the exact phrase "I love puppies" and the hashtag "#fact"</span>
    <span style="display: block; padding: 10px 1% 0 1%;"><i class="fa fa-life-ring" aria-hidden="true"></i> For more examples of ways to create search feeds see the table <a href="https://smashballoon.com/how-to-build-a-search-feed/" target="_blank">here</a></span>
</span>

<b>Please note</b> that only Tweets from the last 7 days can be shown. This is a limit set by Twitter';
}

add_action( 'ctf_admin_feed_settings_search_extra', 'ctf_pro_search_guide' );
function ctf_pro_search_guide() {

}

add_filter( 'ctf_admin_show_hide_list', 'ctf_show_hide_list', 10, 1 );
function ctf_show_hide_list( $show_hide_list ) {
    $show_hide_list[] = array( 'include_replied_to', 'In reply to text' );
    $show_hide_list[] = array( 'include_media', 'Media (images, videos, gifs)' );
    $show_hide_list[] = array( 'include_twittercards', 'Twitter Cards' );
    return $show_hide_list;
}

add_action( 'ctf_admin_style_option', 'ctf_add_masonry_autoscroll_options', 5, 1 );
function ctf_add_masonry_autoscroll_options( $admin )
{
    // custom in reply to text
    $admin->create_settings_field( array(
        'name' => 'inreplytotext',
        'title' => '<label for="ctf_inreplytotext">Translation for "In reply to"</label><code class="ctf_shortcode">inreplytotext
            Eg: inreplytotext="Als Antwort an"</code>', // label for the input field
        'callback'  => 'default_text', // name of the function that outputs the html
        'page' => 'ctf_options_text', // matches the section name
        'section' => 'ctf_options_text', // matches the section name
        'option' => 'ctf_options', // matches the options name
        'class' => 'default-text', // class for the wrapper and input field
        'whatis' => 'This will replace the default text displayed for "In reply to"',
        'default' => 'In reply to'// "what is this?" text
    ));

    add_settings_section(
        'ctf_options_autoscroll', // matches the section name
        'Autoscroll Load More',
        array( $admin, 'general_section_text' ), // callback function to explain the section
        'ctf_options_autoscroll' // matches the section name
    );

    // autoscroll default
    $admin->create_settings_field( array(
        'name' => 'autoscroll',
        'title' => '<label for="ctf_autoscroll">Set Load More on Scroll as Default</label><code class="ctf_shortcode">autoscroll
            Eg: autoscroll=true</code>', // label for the input field
        'callback'  => 'default_checkbox', // name of the function that outputs the html
        'page' => 'ctf_options_autoscroll', // matches the section name
        'section' => 'ctf_options_autoscroll', // matches the section name
        'option' => 'ctf_options', // matches the options name
        'class' => '',
        'whatis' => "This will make every Twitter feed load more Tweets as the user gets to the bottom of the feed"
    ));

    // autoscroll distance
    $admin->create_settings_field( array(
        'name' => 'autoscrolldistance',
        'title' => '<label for="ctf_autoscrolldistance">Auto Scroll Trigger Distance</label><code class="ctf_shortcode">autoscrolldistance
            Eg: autoscrolldistance=2</code>', // label for the input field
        'callback'  => 'default_text', // name of the function that outputs the html
        'page' => 'ctf_options_autoscroll', // matches the section name
        'section' => 'ctf_options_autoscroll', // matches the section name
        'option' => 'ctf_options', // matches the options name
        'class' => 'default-text', // class for the wrapper and input field
        'whatis' => 'This is the distance in pixels from the bottom of the page the user must scroll to to trigger the loading of more tweets',
        'default' => '200',// "what is this?" text
    ) );
}

add_action( 'ctf_admin_customize_option', 'ctf_add_customize_general_options', 20, 1 );
function ctf_add_customize_general_options( $admin ) {

    // masonry mobile columns
    $admin->create_settings_field( array(
        'name' => 'disablelightbox',
        'title' => '<label for="ctf_disablelightbox">Disable the lightbox</label><code class="ctf_shortcode">disablelightbox
            Eg: disablelightbox=true</code>', // label for the input field
        'callback'  => 'default_checkbox', // name of the function that outputs the html
        'page' => 'ctf_options_general', // matches the section name
        'section' => 'ctf_options_general', // matches the section name
        'option' => 'ctf_options', // matches the options name
        'class' => 'default-text', // class for the wrapper and input field
        'whatis' => 'Disable the lightbox for media in the feed'
    ) );
}


add_action( 'ctf_admin_customize_option', 'ctf_add_filter_options', 10, 1 );
function ctf_add_filter_options( $admin ) {
    
    add_settings_section(
        'ctf_options_filter', // matches the section name
        'Moderation',
        array( $admin, 'general_section_text' ), // callback function to explain the section
        'ctf_options_filter' // matches the section name
    );

    // includewords
    $admin->create_settings_field( array(
        'name' => 'includewords',
        'title' => '<label for="ctf_includewords">Show Tweets containing these words or hashtags</label><code class="ctf_shortcode">includewords
            Eg: includewords="#puppy,#cute"</code>', // label for the input field
        'callback'  => 'default_text', // name of the function that outputs the html
        'page' => 'ctf_options_filter', // matches the section name
        'section' => 'ctf_options_filter', // matches the section name
        'option' => 'ctf_options', // matches the options name
        'class' => 'large-text', // class for the wrapper and input field
        'default' => '',
        'example' => '"includewords" separate words by comma'
    ));

    // excludewords
    $admin->create_settings_field( array(
        'name' => 'excludewords',
        'title' => '<label for="ctf_excludewords">Remove Tweets containing these words or hashtags</label><code class="ctf_shortcode">excludewords
            Eg: excludewords="#ugly,#bad"</code>', // label for the input field
        'callback'  => 'default_text', // name of the function that outputs the html
        'page' => 'ctf_options_filter', // matches the section name
        'section' => 'ctf_options_filter', // matches the section name
        'option' => 'ctf_options', // matches the options name
        'class' => 'large-text', // class for the wrapper and input field
        'default' => '',
        'example' => '"excludewords" separate words by comma'
    ));

    // operator
    $admin->create_settings_field( array(
        'name' => 'filteroperator',
        'title' => '', // label for the input field
        'callback'  => 'ctf_filter_operator', // name of the function that outputs the html
        'page' => 'ctf_options_filter', // matches the section name
        'section' => 'ctf_options_filter', // matches the section name
        'option' => 'ctf_options', // matches the options name
        'class' => '', // class for the wrapper and input field
    ));

    add_settings_field(
        'filteroperator',
        '',
        'ctf_filter_operator',
        'ctf_options_filter',
        'ctf_options_filter',
        array( 'option' => 'ctf_options' )
    );

    add_settings_field(
        'remove_by_id',
        '<label for="ctf_remove_by_id">Hide Specific Tweets</label>',
        'ctf_remove_by_id',
        'ctf_options_filter',
        'ctf_options_filter',
        array(
            'option' => 'ctf_options',
            'extra' => 'separate IDs by comma',
            'name' => 'remove_by_id',
            'whatis' => 'These are the specific ID numbers associated with a tweet. You can find the ID of a Tweet by viewing the Tweet on Twitter and copy/pasting the ID number from the end of the URL'
        )
    );

    add_settings_field(
        'clear_tc_cache_button',
        '<label for="ctf_clear_tc_cache_button">Clear Twitter Card Cache</label>',
        'ctf_clear_tc_cache_button',
        'ctf_options_advanced',
        'ctf_options_advanced'
    );
}

function ctf_remove_by_id( $args ) {
    $options = get_option( $args['option'] );
    $option_string = ( isset( $options[ $args['name'] ] ) ) ? esc_attr( $options[ $args['name'] ] ) : '';
    ?>
    <textarea name="<?php echo $args['option'].'['.$args['name'].']'; ?>" id="ctf_<?php echo $args['name']; ?>" style="width: 70%;" rows="3"><?php esc_attr_e( stripslashes( $option_string ) ); ?></textarea>
    <?php if ( isset( $args['extra'] ) ) : ?><p><?php _e( $args['extra'], 'custom-twitter-feeds' ); ?>
        <a class="ctf-tooltip-link" href="JavaScript:void(0);"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
        <span class="ctf-tooltip ctf-more-info"><?php _e( $args['whatis'], 'custom-twitter-feeds' ); ?>.</span>
        </p> <?php endif; ?>
    <?php
}

function ctf_clear_tc_cache_button() {
    ?>
    <input id="ctf-clear-tc-cache" class="button-secondary" style="margin-top: 1px;" type="submit" value="<?php esc_attr_e( 'Clear Twitter Cards' ); ?>" />
    <a class="ctf-tooltip-link" href="JavaScript:void(0);"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
    <p class="ctf-tooltip ctf-more-info"><?php _e( 'Clicking this button will clear all cached data for your links that have Twitter Cards', 'custom-twitter-feeds' ); ?>.</p>
    <?php
}

function ctf_filter_operator( $args ) {
    $options = get_option( $args['option'] );
    $include_any_all = ( isset( $options['includeanyall'] ) ) ? esc_attr( $options['includeanyall'] ) : 'any';
    $filter_and_or = ( isset( $options['filterandor'] ) ) ? esc_attr( $options['filterandor'] ) : 'and';
    $exclude_any_all = ( isset( $options['excludeanyall'] ) ) ? esc_attr( $options['excludeanyall'] ) : 'any';

    ?>
    <p>Show Tweets that contain
        <select name="<?php echo $args['option'].'[includeanyall]'; ?>" id="ctf_includeanyall">
            <option value="any" <?php if ( $include_any_all == "any" ) echo 'selected="selected"'; ?> ><?php _e('any'); ?></option>
            <option value="all" <?php if ( $include_any_all == "all" ) echo 'selected="selected"'; ?> ><?php _e('all'); ?></option>
        </select>
        of the "includewords"
        <select name="<?php echo $args['option'].'[filterandor]'; ?>" id="ctf_filterandor">
            <option value="and" <?php if ( $filter_and_or == "and" ) echo 'selected="selected"'; ?> ><?php _e('and'); ?></option>
            <option value="or" <?php if ( $filter_and_or == "or" ) echo 'selected="selected"'; ?> ><?php _e('or'); ?></option>
        </select>
        do not contain
        <select name="<?php echo $args['option'].'[excludeanyall]'; ?>" id="ctf_excludeanyall">
            <option value="any" <?php if ( $exclude_any_all == "any" ) echo 'selected="selected"'; ?> ><?php _e('any'); ?></option>
            <option value="all" <?php if ( $exclude_any_all == "all" ) echo 'selected="selected"'; ?> ><?php _e('all'); ?></option>
        </select>
        of the "excludewords"
    </p>
    <?php if ( isset( $args['whatis'] ) ) : ?>
        <a class="ctf-tooltip-link" href="JavaScript:void(0);"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
        <p class="ctf-tooltip ctf-more-info"><?php _e( $args['whatis'], 'custom-twitter-feeds' ); ?>.</p>
    <?php endif; ?>
    <?php
}

add_action( 'ctf_admin_add_settings_sections_to_customize', 'ctf_add_masonry_autoload_section_to_customize' );
function ctf_add_masonry_autoload_section_to_customize() {
    ?>
    <a id="autoscroll"></a>
    <?php do_settings_sections( 'ctf_options_autoscroll' ); ?>
    <p class="submit"><input class="button-primary" type="submit" name="save" value="<?php esc_attr_e( 'Save Changes' ); ?>" /></p>
    <hr>
    <?php
}

add_action( 'ctf_admin_add_settings_sections_to_customize', 'ctf_add_filter_section_to_customize' );
function ctf_add_filter_section_to_customize() {
    echo '<a id="moderation"></a>';
    do_settings_sections( 'ctf_options_filter' ); // matches the section name
    echo '<hr>';
}

add_filter( 'ctf_admin_validate_search_text', 'ctf_validate_search_text', 10, 1 );
function ctf_validate_search_text( $val ) {
    $new_val = trim( $val );

    return $new_val;
}

add_filter( 'ctf_admin_validate_hashtag_text', 'ctf_validate_hashtag_text', 10, 1 );
function ctf_validate_hashtag_text( $val ) {

    $hashtags = preg_replace( "/#{2,}/", '', trim( $val ) );
    $hashtags = str_replace( "OR", ',', $hashtags );
    $hashtags = str_replace( ' ', '', $hashtags );

    $hashtags = explode( ',', $hashtags );

    $new_val = array();

    if ( ! empty( $hashtags ) ) {
        foreach ( $hashtags as $hashtag ) {
            if ( substr( $hashtag, 0, 1 ) != '#' && $hashtag != '' ) {
                $new_val[] .= '#' . $hashtag;
            } else {
                $new_val[] .= $hashtag;
            }
        }
    }

    $new_val = implode( ',', $new_val );

    return $new_val;
}

add_filter( 'ctf_admin_validate_usertimeline_text', 'ctf_validate_usertimeline_text', 10, 1 );
function ctf_validate_usertimeline_text( $val ) {
    $new_val = str_replace( array( '@', ' ' ), '', trim( $val ) );

    return $new_val;
}

add_filter( 'ctf_admin_feed_type_list', 'ctf_pro_admin_feed_type_list' );
function ctf_pro_admin_feed_type_list() {
    return array( 'hometimeline_includereplies', 'usertimeline_includereplies', 'mentionstimeline_includereplies' );
}

add_filter( 'ctf_admin_validate_include_replies', 'ctf_validate_include_replies', 10, 1 );
function ctf_validate_include_replies( $val, $type ) {
    if ( $val == 'on' ) {
        return true;
    } else {
        return false;
    }
}

add_filter( 'ctf_admin_set_include_replies', 'ctf_set_include_replies', 10, 1 );
function ctf_set_include_replies( $new_input ) {
	if ( isset( $new_input ) && isset( $new_input['type'] ) ) {
	    if ( isset( $new_input[$new_input['type'] . '_includereplies'] ) && $new_input[$new_input['type'] . '_includereplies'] == 'on' ) {
	        return true;
	    } else {
	        return false;
	    }
	}
}

add_filter( 'ctf_admin_set_include_retweets', 'ctf_set_include_retweets', 10, 1 );
function ctf_set_include_retweets( $new_input ) {
    if ( isset( $new_input ) && isset( $new_input['type'] ) ) {
        if ( isset( $new_input[$new_input['type'] . '_includeretweets'] ) && $new_input[$new_input['type'] . '_includeretweets'] == 'on' ) {
            return true;
        } else {
            return false;
        }
    }
}

add_filter( 'ctf_admin_customize_checkbox_settings', 'ctf_customize_checkbox_settings' );
function ctf_customize_checkbox_settings( $checkbox_settings ) {
    $new_settings = array( 'disablelightbox', 'include_media', 'include_twittercards', 'include_replied_to', 'masonry', 'carousel', 'carouselpag', 'carouselautoplay', 'autoscroll' );
    $merged = array_merge( $checkbox_settings, $new_settings );

    return $merged;
}

add_filter( 'ctf_admin_customize_quick_links', 'ctf_return_customize_quick_links' );
function ctf_return_customize_quick_links() {
    return array(
        array( 'general', 'General' ),
	    array( 'layout', 'Layout' ),
	    array( 'showhide', 'Show/Hide' ),
        array( 'autoscroll', 'Auto Scroll' ),
        array( 'media', 'Media Layout' ),
        array( 'moderation', 'Moderation' ),
        array( 'misc', 'Misc' ),
        array( 'advanced', 'Advanced' )
    );
}

add_filter( 'ctf_admin_style_quick_links', 'ctf_return_style_quick_links' );
function ctf_return_style_quick_links() {
    return array(
        0 => array( 'general', 'General' ),
        1 => array( 'header', 'Header' ),
        2 => array( 'date', 'Date' ),
        3 => array( 'author', 'Author' ),
        4 => array( 'text', 'Tweet Text' ),
        5 => array( 'links', 'Links' ),
        6 => array( 'quoted', 'Retweet Boxes' ),
        7 => array( 'actions', 'Tweet Actions' ),
        8 => array( 'load', 'Load More' )
    );
}


