<?php
/**
 * 
 * URL: www.freecontactform.com
 * 
 * Version: FreeContactForm Free V2.3
 * 
 * Copyright (c) 2019 freecontactform.com
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * 
 * Notice: The free version is free to use, but all credit and references 
 * to freecontactform.com must be kept intact.
 * 
 *  If you want to remove the author link, 
 *  please purchase an unbranded version from: https://www.freecontactform.com/unbranded_form.php 
 *  Or upgrade to the more professional version at: https://www.freecontactform.com/responsive_form.php
 */

if(isset($_POST['Email_Address'])) {
	
	include 'freecontactformsettings.php';
	
	function died($error) {
		echo "<white>Sorry, but there were error(s) found with the form you submitted. ";
		echo "<white>These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "<white>Please go back and fix these errors.<br /><br />";
		die();
	}
	
	if(!isset($_POST['Full_Name']) ||
		!isset($_POST['Email_Address']) ||
		!isset($_POST['Telephone_Number']) ||
		!isset($_POST['Your_Message']) || 
		!isset($_POST['AntiSpam'])		
		) {
		died('<white>Sorry, there appears to be a problem with your form submission.');		
	}
	
	$full_name = $_POST['Full_Name']; // required
	$email_from = $_POST['Email_Address']; // required
	$telephone = $_POST['Telephone_Number']; // not required
	$comments = $_POST['Your_Message']; // required
	$antispam = $_POST['AntiSpam']; // required
	
	$error_message = "";
	
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(preg_match($email_exp,$email_from)==0) {
  	$error_message .= '<white>The Email Address you entered does not appear to be valid.<br />';
  }
  if(strlen($full_name) < 2) {
  	$error_message .= '<white>Your Name does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
  	$error_message .= '<white>The Comments you entered do not appear to be valid.<br />';
  }
  
  if($antispam <> $antispam_answer) {
	$error_message .= '<white>The Anti-Spam answer you entered is not correct.<br />';
  }
  
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Email received from the weather station dashboard below.\r\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "Full Name: ".clean_string($full_name)."\r\n";
	$email_message .= "Email: ".clean_string($email_from)."\r\n";
	$email_message .= "Website Url: ".clean_string($telephone)."\r\n";
	$email_message .= "Message: ".clean_string($comments)."\r\n\r\n".base64_decode($base)."\r\n";
	
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);
header("Location: $thankyou");
echo "<script>location.replace('$thankyou')</script>";
}
die();