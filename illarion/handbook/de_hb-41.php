<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbuch - Client",
                  "Charakter schaffen",
                  "Illarion, RPG, online, MPORPG, graphisch, frei, freies, kostenlos, kostenloses, grafisch, Rollenspiel,Handbuch, Anleitung, " );
   include_header();
?>

   <?php navBarTop( "de_hb-34.php", "de_hb-02.php", "de_hb-42.php" ); ?>

   <h1>4. Einen Charakter erschaffen</h1>

   <h2>4.1 &quot;Create new&quot;</h2>

   <p>Um einen neuen Charakter zu generieren, w&auml;hlst Du &quot;Create new&quot; im Login Dialog.
   Dann siehst Du diesen Bildschirm:</p>

   <div class="center">
      <img src="create_character_dialog.png" alt="Charakter-Erstellen-Dialog" width="702" height="534" border="0" />
   </div>

   <p>Hier w&auml;hlst Du alle Attribute Deines Helden aus. Manche davon kannst Du als freien Text
   eingeben. Hier eine Beschreibung der einzelnen Felder:</p>

   <ul>
      <li><strong>Name:</strong> Der Name Deines Charakters. Bitte benutze Namen aus dem Bereich
      &quot;Fantasy&quot;. Namen wie &quot;Karl50&quot; oder &quot;ein Zauberer&quot; werden nicht
      geduldet.</li>
   </ul>

   <ul>
      <li><strong>Title:</strong> Ein Titel oder Namenszusatz wie &quot;Sir&quot;, &quot;Lord&quot;
      oder &quot;The mysterious&quot;.</li>
   </ul>

   <ul>
      <li><strong>Sex:</strong> Das Geschlecht Deines Charakters.</li>
   </ul>

   <ul>
      <li><strong>Race:</strong> Die Rasse Deines Charakters. Beeinflusst die Anzahl Deiner
      Eigenschaftspunkte und generelle F&auml;higkeiten.</li>
   </ul>

   <ul>
      <li><strong>Agility:</strong> Beeinflusst die Geschwindigkeit Deines Helden und die F&auml;higkeit
      sich zu verteidigen.</li>
   </ul>

   <ul>
      <li><strong>Constitution:</strong> Je h&ouml;her Deine Konstitution, desto weniger Schaden
      erh&auml;ltst Du durch gegnerische Treffer.</li>
   </ul>

   <ul>
      <li><strong>Dexterity:</strong> Deine Grundchance Ziele zu treffen und Schl&auml;ge zu
      parieren.</li>
   </ul>

   <ul>
      <li><strong>Essence:</strong> Je h&ouml;her Deine magische Begabung, desto weniger Schaden
      erleidest Du durch Zauberspr&uuml;che.</li>
   </ul>

   <ul>
      <li><strong>Intelligence:</strong> Je intelligenter Dein Held ist, desto weniger Mana braucht
      er zum Zaubern.</li>
   </ul>

   <ul>
      <li><strong>Perception:</strong> Derzeit ungenutzt.</li>
   </ul>

   <ul>
      <li><strong>Strength:</strong> Zeigt, wie viel Schaden Du beim Gegner durch Schl&auml;ge
      verursachen kannst und Deine Trage-Kraft.</li>
   </ul>

   <ul>
      <li><strong>Willpower:</strong> Derzeit ungenutzt.</li>
   </ul>

   <ul>
      <li><strong>Age:</strong> Derzeit ungenutzt.</li>
   </ul>

   <ul>
      <li><strong>Weight:</strong> Derzeit ungenutzt.</li>
   </ul>

   <ul>
      <li><strong>Height:</strong> Derzeit ungenutzt.</li>
   </ul>

   <ul>
      <li><strong>Real name*):</strong> Dein richtiger Name (steht z.B. in Deinem
      Personalausweis).</li>
   </ul>

   <ul>
      <li><strong>Location*):</strong> Dein Wohnort und das Land in dem Du wirklich lebst.</li>
   </ul>

   <ul>
      <li><strong>Language:</strong> Die Sprache, in der Status Nachrichten und Namen von
      Gegenst&auml;nden angezeigt werden.</li>
   </ul>

   <ul>
      <li><strong>E-Mail*):</strong> Deine Email-Adresse. Wir senden das Passwort an diese Adresse,
      falls Du es mal vergessen hast.</li>
   </ul>

   <ul>
      <li><strong>Password</strong>: Ein Passwort um Deinen Charakter vor fremden Missbrauch zu
      sch&uuml;tzen. Um Tippfehler zu vermeiden, musst Du das gleiche Passwort noch einmal unter
      &quot;Retype password&quot; eingeben.</li>
   </ul>

   <ul>
      <li><strong>Description:</strong> Eine Beschreibung des allgemeinen Verhaltens Deines
      Charakters und seines Aussehens.</li>
   </ul>

   <p>*) Diese Information ist nur Spiel-Administratoren zug&auml;nglich.</p>

   <?php navBarBottom( "de_hb-34.php", "de_hb-42.php" ); ?>

<?php include_footer(); ?>