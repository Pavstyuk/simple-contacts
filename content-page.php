<div class="wrap">
    <h1><?php echo esc_attr__('Contacts and information', "simple-contacts") ?></h1>
    <p><?php echo esc_attr__('Contact details of the company', "simple-contacts") ?></p>

    <form action="options.php" method="post">
        <?php
        settings_fields("simple_contacts_group");
        do_settings_sections("simple-contacts");
        submit_button();
        ?>
    </form>
</div>