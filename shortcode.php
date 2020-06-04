<?php

function bluCB1609_register_shortcode($atts = []) {
    ob_start();

    $atts = array_change_key_case((array)$atts, CASE_LOWER);
 
    $display_atts = shortcode_atts(
        ['show_info' => false,], $atts);
    
    ?>
       <div class="validator-wrapper">
           
    <?php
        if ( isset($_POST['sa-id-number']) && isset($_POST['submit-id']) ) {
            
            if ( bluCB1609_verify_id_number( sanitize_text_field( $_POST['sa-id-number']) )  && is_numeric(sanitize_text_field( $_POST['sa-id-number'])) ) { ?>
            
                <div class=" validation-msg validated">
                    <i class="fas fa-check-circle"></i><span><?php echo esc_html($_POST['sa-id-number']); ?> is a valid South African ID number.</span>
                </div> 
                
        <?php
                
                if (!empty($display_atts['show_info'])) {
                    
                     bluCB1609_verify_id_number( sanitize_text_field( $_POST['sa-id-number']), '', '', true );
                }
            }
            
            else { ?>
                <div class="validation-msg not-validated"><i class="fas fa-times-circle"></i><?php echo esc_html($_POST['sa-id-number']); ?> is not a valid South African ID number.</span>
                </div>
                
            <?php }
        }
    
    ?>
    
 
        <form class="validator-form" action="" method="POST">
            <input id="sa-id-number" name="sa-id-number" type="number" placeholder="eg. 8001015009087" min="1"  maxlength="13" required />
            <input name="submit-id" type="submit" value="Validate">
        </form>
        
    </div>
    
    <?
    return ob_get_clean();
}

add_shortcode( 'sa_id_validator', 'bluCB1609_register_shortcode' );



