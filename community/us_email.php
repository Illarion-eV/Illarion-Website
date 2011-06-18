<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - E-Mails",
                  "Here is a listing of Email addresses relevant to Illarion.",
                  "Contact, E-Mail, email, Email" );
   include_header();
?>

   <h1>E-Mails</h1>

   <h2>Contents</h2>

   <ul>
      <li><a class="hidden" href="#1">General information</a></li>

      <li><a class="hidden" href="#2">Addresses</a></li>
   </ul>

   <?php insert_go_to_top_link(); ?>

   <p><a name="1"></a></p>

   <h2>General information</h2>

   <p>Questions may arise when you play Illarion, so we have created a list of relevant email addresses to which you can send your inquiries, bug reports, wishes and such. As there are quite a few people working on Illarion though, we have divided the addresses into different categories, so that each mail is sent to the appropriate people. Therefore, you should make sure you send you e-mails to the right address, as they will otherwise probably just be ignored.</p>
   
   <p>Make sure you have already read the <a href="../general/us_faq_graphic.php">Graphic-FAQ</a>, <a href="../general/us_faq_concept.php">Conepts-FAQ</a>, <a href= "../general/us_faq_technic.php">Technical-FAQ</a> or even checked out the <a href= "<?php echo "$url/community/forums/" ?>">Forum</a> before you write us your mails, as the answer to your problem may well be there, and it is an annoyance for us to answer the same questions again and again.</p>

   <?php insert_go_to_top_link(); ?>

   <p><a name="2"></a></p>

   <h2>Addresses</h2>

   <p><a href="mailto:general@illarion.org">general@illarion.org</a><br /> = General information (Anything that does not fit into any of the other categories)</p>

   <p><a href="mailto:accounts@illarion.org">accounts@illarion.org</a><br /> = General account question, questions concerning your account</p>

   <p><a href="mailto:webmaster@illarion.org">webmaster@illarion.org</a><br /> = Any questions regarding the web site (broken links, adding of fan/guild pages, contents, and
   possible spelling mistakes here and there)</p>

   <p><a href="mailto:violations@illarion.org">violations@illarion.org</a><br /> = Reporting rule breakers in and out of the game (PK, powergamers, spamming,...)</p>

   <p><a href="mailto:RPG_requests@illarion.org">RPG_requests@illarion.org</a><br /> = Ask GM&#39;s for quest support and the like</p>

   <p><a href="mailto:character_requests@illarion.org">character_requests@illarion.org</a><br /> = Name/password changes and everything else concerning your character; ATTENTION: send your character password within the email or your email will be ignored!! NO account requests!</p>

   <p><a href="mailto:bugs@illarion.org">bugs@illarion.org</a><br /> = Report bugs and errors</p>

   <p><a href="mailto:gm_abuse@illarion.org">gm_abuse@illarion.org</a><br /> = Complaints about gamemasters. Emails to this address will be handled by an impartial person!</p>

   <?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>