<?php 
function santa_alert_text($atts){
    $a = shortcode_atts(array(
        'alert_type'    => 'success',
        'alert_message' => 'Successfully Completed'
    ), $atts);

    return "
    <div class='alert alert-".$a['alert_type']."'>
       ".$a['alert_message']."
    </div>";
}
add_shortcode('santa_alert', 'santa_alert_text');


function santa_vc_alert_list_addons(){   
      vc_map( array(
      "name" => __( "Santa Alert Shortcode", "santa" ),
      "base" => "santa_alert",
      "class" => "",
      "category" => __( "Santa", "santa"),     
      "params" => array(
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Alert Type", "santa" ),
            "param_name" => "alert_type",
            "value" =>array(
                "Success"  => "success",
                "Danger"  => "danger",
                "Warning"  => "warning"
            ),
            "description" => __( "success, danger, warning", "santa" )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Alert Message", "santa" ),
            "param_name" => "alert_message",
            "value" => __( "Type your notice!", "santa" ),
            "description" => __( "Enter your message", "santa" )
         )
      ),
        "icon"  => "https://cdn4.iconfinder.com/data/icons/free-colorful-icons/360/google_play.png"
   ) );

}
add_action('vc_before_init','santa_vc_alert_list_addons');