<?php
/*
Plugin Name: Simple Contacts
Plugin URI: https://github.com/Pavstyuk/simple-contacts
Description: Simple Contacts plugin to store contact information of company in one place. And easy to display in any place on your site with shortcode. Also with php method get_option("name-of-option")
Version: 0.0.3
Requires at least: 5.8
Requires PHP: 5.6.20
Author: Mikhail Pavstyuk
Author URI: https://pavstyuk.ru/
License: GPLv2 or later
Text Domain: simple-contacts
Domain Path: /languages
*/

if (!function_exists('add_action')) {
    die('Nothing to do. Bye.');
}

define('VWS_VER', '0.0.3');
define('VWS_DIR', plugin_dir_path(__FILE__));


add_action("admin_init", "simple_contacts_add_settings");
add_action("admin_menu", "simple_contacts_plugin_pages");

register_activation_hook(__FILE__, "simple_contacts_activation");
register_deactivation_hook(__FILE__, "simple_contacts_deactivation");

function simple_contacts_activation() {}
function simple_contacts_deactivation() {}


function simple_contacts_plugin_pages()
{
    add_menu_page(__("Contact info", "simple-contacts"), esc_attr__("Contacts", "simple-contacts"), 'manage_options', "simple-contacts", 'simple_contacts_main_page', 'dashicons-nametag', 55);
}

function simple_contacts_main_page()
{
    require_once VWS_DIR . "content-page.php";
}


function simple_contacts_add_settings()
{
    register_setting("simple_contacts_group", "simple_contacts_phone_a");
    register_setting("simple_contacts_group", "simple_contacts_phone_b");
    register_setting("simple_contacts_group", "simple_contacts_email");
    register_setting("simple_contacts_group", "simple_contacts_vk");
    register_setting("simple_contacts_group", "simple_contacts_tg");
    register_setting("simple_contacts_group", "simple_contacts_wa");
    register_setting("simple_contacts_group", "simple_contacts_address_a");
    register_setting("simple_contacts_group", "simple_contacts_address_b");
    register_setting("simple_contacts_group", "simple_contacts_info_a");
    register_setting("simple_contacts_group", "simple_contacts_info_b");

    add_settings_section(
        "simple_contacts-main-section",
        esc_attr__("Organization info", "simple-contacts"),
        function () {
            echo "<p>" . esc_attr__("Enter the contacts, address and additional information about the organization", "simple-contacts") . "</p>";
        },
        "simple-contacts"
    );

    add_settings_field(
        "simple_contacts_phone_a",
        esc_attr__("Phone A", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_phone_a' class='regular-text code' name='simple_contacts_phone_a' type='tel' value='" . esc_attr(get_option('simple_contacts_phone_a')) . "' /></div>";
            echo "<p class='tagline-description'>" . esc_attr__("ShortCode:", "simple-contacts") . " <code>[simple_contacts_phone_a]</code></p>";
            echo "<p class='tagline-description'>" . esc_attr__("PHP code:", "simple-contacts") . " <code>" . esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_phone_a')) " . esc_attr('?>')
                . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" => "simple_contacts_phone_a",
        ),
    );

    add_settings_field(
        "simple_contacts_phone_b",
        esc_attr__("Phone B", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_phone_b' class='regular-text code' name='simple_contacts_phone_b' type='tel'
        value='" . esc_attr(get_option('simple_contacts_phone_b')) . "' /></div>";
            echo "<p class='tagline-description'>" .
                esc_attr__("ShortCode:", "simple-contacts") . " <code>[simple_contacts_phone_b]</code></p>";
            echo "<p class='tagline-description'>"
                . esc_attr__("PHP code:", "simple-contacts") . " <code>" .
                esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_phone_b')) " . esc_attr('?>') . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" => "simple_contacts_phone_b",
        ),
    );

    add_settings_field(
        "simple_contacts_email",
        esc_attr__("Email", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_email' class='regular-text code' name='simple_contacts_email' type='email'
            value='" . esc_attr(get_option('simple_contacts_email')) . "' /></div>";
            echo "<p class='tagline-description'>"
                . esc_attr__("ShortCode:", "simple-contacts") . " <code>[simple_contacts_email]</code></p>";
            echo "<p class='tagline-description'>" . esc_attr__("PHP code:", "simple-contacts") . " <code>" .
                esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_email')) " . esc_attr('?>') . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" => "simple_contacts_email",
        ),
    );

    add_settings_field(
        "simple_contacts_vk",
        esc_attr__("Vk", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_vk' class='regular-text code' name='simple_contacts_vk' type='text'
                value='" . esc_attr(get_option('simple_contacts_vk')) . "' /></div>";
            echo "<p class='tagline-description'>" . esc_attr__("ShortCode:", "simple-contacts")
                . " <code>[simple_contacts_vk]</code></p>";
            echo "<p class='tagline-description'>" . esc_attr__("PHP code:", "simple-contacts")
                . " <code>" . esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_vk')) " . esc_attr('?>')
                . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" =>
            "simple_contacts_vk",
        ),
    );

    add_settings_field(
        "simple_contacts_tg",
        esc_attr__("Telegram", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_tg' class='regular-text code' name='simple_contacts_tg' type='text'
                    value='" . esc_attr(get_option('simple_contacts_tg')) . "' /></div>";
            echo "<p class='tagline-description'>" . esc_attr__("ShortCode:", "simple-contacts")
                . " <code>[simple_contacts_tg]</code></p>";
            echo "<p class='tagline-description'>" . esc_attr__("PHP code:", "simple-contacts") . " <code>" .
                esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_tg')) " . esc_attr('?>') . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" => "simple_contacts_tg",
        ),
    );

    add_settings_field(
        "simple_contacts_wa",
        esc_attr__("WhatsApp", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_wa' class='regular-text code' name='simple_contacts_wa' type='text'
                        value='" . esc_attr(get_option('simple_contacts_wa')) . "' /></div>";
            echo "<p class='tagline-description'>" . esc_attr__("ShortCode:", "simple-contacts")
                . " <code>[simple_contacts_wa]</code></p>";
            echo "<p class='tagline-description'>" . esc_attr__("PHP code:", "simple-contacts") . " <code>" .
                esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_wa')) " . esc_attr('?>')
                . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" =>
            "simple_contacts_wa",
        ),
    );

    add_settings_field(
        "simple_contacts_address_a",
        esc_attr__("Company address A", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_address_a' class='regular-text code' name='simple_contacts_address_a'
                            type='text' value='" . esc_attr(get_option('simple_contacts_address_a')) . "' /></div>";
            echo "<p class='tagline-description'>" . esc_attr__("ShortCode:", "simple-contacts")
                . " <code>[simple_contacts_address_a]</code></p>";
            echo "<p class='tagline-description'>" .
                esc_attr__("PHP code:", "simple-contacts") . " <code>" .
                esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_address_a')) " . esc_attr('?>')
                . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" =>
            "simple_contacts_address_a",
        ),
    );

    add_settings_field(
        "simple_contacts_address_b",
        esc_attr__("Company address B", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_address_b' class='regular-text code'
                                name='simple_contacts_address_b' type='text' value='" . esc_attr(get_option('
                                simple_contacts_address_b')) . "' /></div>";
            echo "<p class='tagline-description'>" .
                esc_attr__("ShortCode:", "simple-contacts") . " <code>[simple_contacts_address_b]</code></p>";
            echo "<p class='tagline-description'>" . esc_attr__("PHP code:", "simple-contacts") . " <code>" .
                esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_address_b')) " . esc_attr('?>')
                . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" =>
            "simple_contacts_address_b"
        ),
    );

    add_settings_field(
        "simple_contacts_info_a",
        esc_attr__("Information A", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_info_a' class='regular-text code' name='simple_contacts_info_a'
                                    type='text' value='" . esc_attr(get_option('simple_contacts_info_a')) . "' /></div>";
            echo "<p class='tagline-description'>" . esc_attr__("ShortCode:", "simple-contacts")
                . " <code>[simple_contacts_info_a]</code></p>";
            echo "<p class='tagline-description'>" .
                esc_attr__("PHP code:", "simple-contacts") . " <code>" .
                esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_info_a')) " . esc_attr('?>')
                . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" =>
            "simple_contacts_info_a",
        ),
    );

    add_settings_field(
        "simple_contacts_info_b",
        esc_attr__("Information B", "simple-contacts"),
        function () {
            echo "<div><input id='simple_contacts_info_b' class='regular-text code'
                                        name='simple_contacts_info_b' type='text' value='" . esc_attr(get_option('
                                        simple_contacts_info_b')) . "' /></div>";
            echo "<p class='tagline-description'>" .
                esc_attr__("ShortCode:", "simple-contacts") . " <code>[simple_contacts_info_b]</code></p>";
            echo "<p class='tagline-description'>" . esc_attr__("PHP code:", "simple-contacts") . " <code>" .
                esc_attr('<?php echo') . " esc_html(get_option('simple_contacts_info_b')) " . esc_attr('?>')
                . "</code></p>";
        },
        "simple-contacts",
        "simple_contacts-main-section",
        array(
            "label_for" =>
            "simple_contacts_info_b"
        ),
    );
}


add_shortcode('simple_contacts_phone_a', function () {
    return esc_html(get_option('simple_contacts_phone_a'));
});

add_shortcode('simple_contacts_phone_b', function () {
    return esc_html(get_option('simple_contacts_phone_b'));
});

add_shortcode('simple_contacts_email', function () {
    return esc_html(get_option('simple_contacts_email'));
});

add_shortcode('simple_contacts_vk', function () {
    return esc_html(get_option('simple_contacts_vk'));
});

add_shortcode('simple_contacts_tg', function () {
    return esc_html(get_option('simple_contacts_tg'));
});

add_shortcode('simple_contacts_wa', function () {
    return esc_html(get_option('simple_contacts_wa'));
});

add_shortcode('simple_contacts_address_a', function () {
    return esc_html(get_option('simple_contacts_address_a'));
});

add_shortcode('simple_contacts_address_b', function () {
    return esc_html(get_option('simple_contacts_address_b'));
});

add_shortcode('simple_contacts_info_a', function () {
    return esc_html(get_option('simple_contacts_info_a'));
});

add_shortcode('simple_contacts_info_b', function () {
    return esc_html(get_option('simple_contacts_info_b'));
});
