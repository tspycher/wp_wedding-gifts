<div class="wrap">
    <h2>Your Plugin Name</h2>

    <form method="post" action="options.php">
        <?php settings_fields( 'gifts-settings-group' ); ?>
        <?php do_settings_sections( 'gifts-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Email Subject</th>
                <td><input type="text" name="gift_email_subject" value="<?php echo esc_attr( get_option('gift_email_subject') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row">Bcc Addresses for mails (separate with ,)</th>
                <td><input type="text" name="gift_email_bcc" value="<?php echo esc_attr( get_option('gift_email_bcc') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row">Bank Account</th>
                <td><input type="text" name="gift_bank_account" value="<?php echo esc_attr( get_option('gift_bank_account') ); ?>" /></td>
            </tr>

        </table>

        <?php submit_button(); ?>

    </form>
</div>