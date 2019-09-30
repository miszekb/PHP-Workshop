<?php
/**
 * Plugin Name: Idea Pro Example
 * Description: This is just an example plugin
 * Version: 1.0.0
 */

    function ideapro_example_function() {
        $info = 'This is a very basic plugin';
        $info .= '<div>This is a div</div>';

        return $info;
    }

    add_shortcode('example', 'ideapro_example_function');


    function ideapro_admin_menu_option() {
        // TODO: Check parameters meaning
        add_menu_page(
            'Header & Footer Scripts', 
            'Site Scripts', 
            'manage_options', 
            'ideapro_admin_menu', 
            'ideapro_scripts_page', 
            '', 
            200
        );
    }

    add_action('admin_menu', 'ideapro_admin_menu_option');

    function ideapro_scripts_page() {

            if(array_key_exists('submit_scripts_update', $_POST)) {
                update_option('ideapro_header_scripts', $_POST['header_scripts']);
                update_option('ideapro_footer_scripts', $_POST['footer_scripts']);
                ?>
                    <div id="setting-error-setting-updated" class="updated_settings_error_notice is-dismissible">
                        <strong>Settings have been saved</strong>
                    </div>
                <?php
            }

            $header_scripts = get_option('ideapro_header_scripts', 'none');
            $footer_scripts = get_option('ideapro_header_scripts', 'none');
            ?>
            <div class="wrap">
                <h2>Update Scripts</h2>
                <form method="post" action="">
                    <label for="header_scripts">Header Scripts</label>
                    <textarea name="header_scripts" class="large-text">
                        <?php print $header_scripts; ?>
                    </textarea>
                    <label for="footer_scripts">Footer Scripts</label>
                    <textarea name="footer_scripts" class="large-text">
                        <?php print $footer_scripts; ?>
                    </textarea>
                    <input type="submit" name="submit_scripts_update" class="button button-primary" value="Update Scripts">
                </form>

            </div>
        <?php
    }

    // Adding put text to a header in every WP site
    function ideapro_display_header_scripts() {
        $header_scripts = get_option('ideapro_header_scripts', 'none');
        print $header_scripts;
    }

    add_action('wp_head', 'ideapro_display_header_scripts');

    // Adding put text to footer in every WP site
    function ideapro_display_footer_scripts() {
        $footer_scripts = get_option('ideapro_footer_scripts', 'none');
        print $footer_scripts;
    }

    add_action('wp_footer', 'ideapro_display_footer_scripts');


function ideapro_form() {
    //return 'This is were the form will be!';

    $content = '';

    $content .= '<form method="post" action="http://localhost/CustomPlugin/thank-you/">';
        $content .= '<input type="text" name="full_name" placeholder="Your Full Name" />';
        $content .= '<br/>';
        $content .= '<input type="text" name="email_name" placeholder="Email Address" />';
        $content .= '<br/>';
        $content .= '<input type="text" name="phone_number" placeholder="Phone Number" />';
        $content .= '<br/>';
        $content .= '<textarea name="comments" placeholder="Give us you comments"></textarea>';
        $content .= '<br/>';
        $content .= '<input type="submit" name="ideapro_submit_form" value="Submit your information"/>';
    $content .= '</form>';

    return $content;
}
add_shortcode('ideaproform', 'ideapro_form');

function set_html_content_type() {
    return 'text/html';
}


function ideapro_form_capture() {

    global $post, $wpdb;

    if(array_key_exists('ideapro_submit_form', $_POST)) {
        $to ="miszekb@gmail.com";
        $subject = "Idea Pro Example Submission!";
        $body = '';
        $body .= 'Name: '.$_POST['full_name'].'<br/>';
        $body .= 'Email: '.$_POST['email_address'].'<br/>';
        $body .= 'Phone: '.$_POST['phone_number'].'<br/>';
        $body .= 'Email: '.$_POST['email_address'].'<br/>';
        $body .= 'Comments: '.$_POST['comments'].'<br/>';

        add_filter('wp_mail_content_type', 'set_html_content_type');
        wp_mail($to, $subject,$body); // For some reason this doesn't work (security?)
        remove_filter('wp_mail_content_type', 'set_html_content_type');

        // Insert the information into a comment
        $time = current_time('mysql');
        $data = array(
            'comment_post_ID' => $post->ID,
            'comment_content' => $body,
            'comment_author_IP' => $_SERVER['REMOTE_ADDR'],
            'comment_date' => $time,
            'comment_approved' => 1,
        );
        wp_insert_comment($data);

        //Submission saved in DB (no the most proper way to do it :/)
        $insertData = $wpdb->get_results(" INSERT INTO ".$wpdb->prefix."form_submissions (data) VALUES ('".$body."')");

    }
}

add_action('wp_head', 'ideapro_form_capture');

