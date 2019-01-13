<?php

//validate email adress
function is_valid_email($email)
{
    return (eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $email));
}                        
//clean up text
function clean($text)
{
    return stripslashes($text);
}                        
//encode special chars (in name and subject)
function encodeMailHeader ($string, $charset = 'UTF-8')
{
    return sprintf ('=?%s?B?%s?=', strtoupper ($charset),base64_encode ($string));
}
                        
$bx_name    = (!empty($_POST['bx_name']))    ? $_POST['bx_name']    : "";
$bx_email   = (!empty($_POST['bx_email']))   ? $_POST['bx_email']   : "";
$bx_message = (!empty($_POST['bx_message'])) ? $_POST['bx_message'] : "";
$bx_honey   = (!empty($_POST['bx_honey'])) ? $_POST['bx_honey'] : "";                        
$bx_message = clean($bx_message);
$error_msg = "";
$send = 0;
                        
if (!empty($_POST['submit'])) {
    $send = 1;
    if (empty($bx_name) || empty($bx_email) || empty($bx_message)) {
        $error_msg = "<p class=\"error\"><strong>Whoops! You skipped a few important fields.</strong>  Make sure you fill out everything before submitting.</p>\n";
        $send = 0;
    }
    if ((!is_valid_email($bx_email))&&($send)) {
        $error_msg = "<p class=\"error\"><strong>You call that an email address?</strong>  Try that again please.</p>\n";
        $send = 0;
    }
	if (($bx_honey!=="I love EXBC")&&($send)){
		$error_msg = "<p class=\"error\"><strong>Ahem!  Who do you love?</strong>  Please type our anti-spam message in the appropriate box before submitting.  It's case-sensitive so get yo' uppers and lowers in line.</p>\n";
        $send = 0;
	}
}        
if (!$send) { ?>
    <form method="post" action="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>#contact-form" id="contact-form">
    	<?php echo $error_msg;?>
        <fieldset>
        	<legend><span>Contact Us (We don&rsquo;t bite)</span></legend>
            <div><label for="bx_name">Name:</label> <input type="text" name="bx_name" id="bx_name" value="<?php echo $bx_name; ?>" /></div>
            <div><label for="bx_email">Email:</label> <input type="text" name="bx_email" id="bx_email" value="<?php echo $bx_email; ?>" /></div>
            <div><label for="bx_message">Message:</label> <textarea name="bx_message" id="bx_message" cols="45" rows="15" ><?php echo $bx_message; ?></textarea></div>
            <div><label for="bx_honey">Type &ldquo;I love EXBC&rdquo;</label> <input type="text" name="bx_honey" id="bx_honey" value='<?php echo $bx_honey; ?>' /> <em>(Used to avoid spam. Case sensitive)</em></div>
            <div class="buttonContainer"><input type="submit" name="submit" value="Submit" id="submit" class="button" /></div>
        </fieldset>
    </form>
                        
<?php
} else {
    $displayName_array	= explode(" ",$bx_name);
    $displayName = htmlentities(utf8_decode($displayName_array[0]));
    $header  = "MIME-Version: 1.0\n";
    $header .= "Content-Type: text/plain; charset=\"utf-8\"\n";
    $header .= "From:" . encodeMailHeader($bx_name) . "<" . $bx_email . ">\n";
    $email_subject	= "[" . get_settings('blogname') . "] " . encodeMailHeader("Message from Contact Form");
    $email_text		= "From......: " . $bx_name . "\n" .
                      "Email.....: " . $bx_email . "\n" .                      
                      "..........................................................\n\n" .
                      $bx_message;
                        
    if (@mail(get_settings('admin_email'), $email_subject, $email_text, $header)) {
        ?>
        <div id="contact-form" class="success">
        	<h3>Hey <?php echo $displayName; ?>&hellip;</h3>
        	<p>Thanks for your message!  If you sent us a question we promise we&rsquo;ll get back to you lickity split!</p>
        </div>
        <?php 
    }
}
?>