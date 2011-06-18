<?
$content=$content."<form name='form1' method='post' action='index.php?mod=accountview&accountid=$_GET[accountid]&update=sendmail'>
  <table width='100%'>
    <tr>
	  <td>
        from:
	  </td>
	  <td>
	    <input type='text' name='mailfrom' value='accounts@illarion.org'>
	  </td>
	</tr>
	<tr>
	  <td>
	    to:
	  </td>
	  <td>
	    ".$account[0][acc_email]."<input type='hidden' value='".$account[0][acc_email]."' name='mailto'>
	  </td>
	</tr>
	<tr>
	  <td>
	    subject:
	  </td>
	  <td>
	    <input type='text' name='subject'>
	  </td>
	</tr>
	<tr>
	  <td colspan='2'>
	    content:
	  </td>
	</tr>
	<tr>
	  <td colspan='2'>
	    <textarea name='textarea' cols='60' rows='15'></textarea>
	  </td>
	</tr>
	<tr>
	  <td align='right' width='50%'>
	    <input type='submit' name='submit' value='send mail'>
	  </td>
	  <td align='left' width='50%'>
	    <input type='reset' name='reset' value='clear values'>
	  </td>
	</tr>
  </table>
</form>";
