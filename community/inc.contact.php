<?php
   function ShowAndTransmitMail() {
      if ((!defined('_CONTACT_NAME'))    || (!defined('_CONTACT_MAIL'))     ||
          (!defined('_CONTACT_DETAILS')) || (!defined('_MAIL'))             ||
          (!defined('_SEND_MAIL'))       || (!defined('_BAD_MAIL'))         ||
          (!defined('_SUBJECT'))         || (!defined('_MAIL_TRANSMITTED')) ||
          (!defined('_CONTENT'))) {
         echo "Error while building mail form.<br />";
      } elseif (!isset($_POST['mail'])) {
         ShowFormular();
      } else {
         $mail = explode("@",$_POST['mail']);
         if (count($mail)!=2) {
            echo _BAD_MAIL."<br />";
            ShowFormular();
         } else {
            $mail = explode(".",$mail[1]);
            if (count($mail)<2) {
               echo _BAD_MAIL."<br />";
               ShowFormular();
            } else {
               if (strlen($_POST['content'])<20) {
                  echo _BAD_CONTENT."<br />";
                  ShowFormular();
               } else {
                  $mail_target = _CONTACT_MAIL;
                  if (mail($mail_target,"[Illarion] ".$_POST['subject'],$_POST['content'],
                      "From: ".$_POST['mail']." \r\n".
                      "Reply-To: ".$_POST['mail']." \r\n".
                      "X-Mailer: ".phpversion())) {
                     echo _MAIL_TRANSMITTED;
                     $short_filename =  basename( $_SERVER['REQUEST_URI'] );
					 $filename = explode("?",$short_filename);
                     echo "<script type='text/javascript'>function forward() { window.location.href='$filename[0]'; } window.setTimeout ('forward()',3000); </script>";
                  } else {
                     echo _MAIL_TRANSMITTED_FAILED;
                     ShowFormular();
                  }
               }
            }
         }
      }
   }

   function ShowFormular() { ?>
<h1><?php echo _CONTACT_NAME; ?></h1>
<form name="mail" id="mail" method="post" action="?contact=<?php echo $_GET['contact']; ?>">
	<table class="center" style="width:90%;">
		<tr>
			<td style="width:15%;"><?php echo _MAIL; ?></td>
			<td style="width:85%;"><input style="width:100%;" type="text" name="mail" id="mail" value="<?php echo (isset($_POST['mail']) ? $_POST['mail'] : "" ); ?>" /></td>
		</tr>
		<tr>
			<td><?php echo _SUBJECT; ?></td>
			<td><input style="width:100%;" type="text" name="subject" id="subject" value="<?php echo (isset($_POST['subject']) ? $_POST['subject'] : "" ); ?>" /></td>
		</tr>
		<tr>
			<td><?php echo _CONTENT; ?></td>
			<td><textarea rows="6" style="width:100%;" name="content" id="content"><?php echo (isset($_POST['content']) ? $_POST['content'] : "" ); ?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" class="center"><input type="submit" name="sendmail" value="<?php echo _SEND_MAIL; ?>" /></td>
		</tr>
	</table>
</form><?php
   }
