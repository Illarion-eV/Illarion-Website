@ECHO OFF

SET compressor=yuicompressor-2.4.7.jar

echo js/acc_settings.js
java -jar %compressor% --type js --charset utf-8 -o js/acc_settings.js js/acc_settings_uncompressed.js

echo js/bookmarks.js
java -jar %compressor% --type js --charset utf-8 -o js/bookmarks.js js/bookmarks_uncompressed.js

echo js/builder.js
java -jar %compressor% --type js --charset utf-8 -o js/builder.js js/builder_uncompressed.js

echo js/controls.js
java -jar %compressor% --type js --charset utf-8 -o js/controls.js js/controls_uncompressed.js

echo js/chronik.js
java -jar %compressor% --type js --charset utf-8 -o js/chronik.js js/chronik_uncompressed.js

echo js/dragdrop.js
java -jar %compressor% --type js --charset utf-8 -o js/dragdrop.js js/dragdrop_uncompressed.js

echo js/effects.js
java -jar %compressor% --type js --charset utf-8 -o js/effects.js js/effects_uncompressed.js

echo js/gmtool_search_account.js
java -jar %compressor% --type js --charset utf-8 -o js/gmtool_search_account.js js/gmtool_search_account_uncompressed.js

echo js/gmtool_search_chars.js
java -jar %compressor% --type js --charset utf-8 -o js/gmtool_search_chars.js js/gmtool_search_chars_uncompressed.js

echo js/lightwindow.js
java -jar %compressor% --type js --charset utf-8 -o js/lightwindow.js js/lightwindow_uncompressed.js

echo js/lightwindow_ie.js
java -jar %compressor% --type js --charset utf-8 -o js/lightwindow_ie.js js/lightwindow_ie_uncompressed.js

echo js/newchar_1.js
java -jar %compressor% --type js --charset utf-8 -o js/newchar_1.js js/newchar_1_uncompressed.js

echo js/newchar_3.js
java -jar %compressor% --type js --charset utf-8 -o js/newchar_3.js js/newchar_3_uncompressed.js

echo js/newpass.js
java -jar %compressor% --type js --charset utf-8 -o js/newpass.js js/newpass_uncompressed.js

echo js/iepngfix.js
java -jar %compressor% --type js --charset utf-8 -o js/iepngfix.js js/iepngfix_uncompressed.js

echo js/ieposfix.js
java -jar %compressor% --type js --charset utf-8 -o js/ieposfix.js js/ieposfix_uncompressed.js

echo js/jquery.js
java -jar %compressor% --type js --charset utf-8 -o js/jquery.js js/jquery_uncompressed.js

echo js/prototype.js
java -jar %compressor% --type js --charset utf-8 -o js/prototype.js js/prototype_uncompressed.js

echo js/proxy_killer.js
java -jar %compressor% --type js --charset utf-8 -o js/proxy_killer.js js/proxy_killer_uncompressed.js

echo js/racerequest.js
java -jar %compressor% --type js --charset utf-8 -o js/racerequest.js js/racerequest_uncompressed.js

echo js/scriptaculous.js
java -jar %compressor% --type js --charset utf-8 -o js/scriptaculous.js js/scriptaculous_uncompressed.js

echo js/slider.js
java -jar %compressor% --type js --charset utf-8 -o js/slider.js js/slider_uncompressed.js

echo js/tip_centerwindow.js
java -jar %compressor% --type js --charset utf-8 -o js/tip_centerwindow.js js/tip_centerwindow_uncompressed.js

echo js/tip_followscroll.js
java -jar %compressor% --type js --charset utf-8 -o js/tip_followscroll.js js/tip_followscroll_uncompressed.js

echo js/quests_edit.js
java -jar %compressor% --type js --charset utf-8 -o js/quests_edit.js js/quests_edit_uncompressed.js

echo js/wz_tooltip.js
java -jar %compressor% --type js --charset utf-8 -o js/wz_tooltip.js js/wz_tooltip_uncompressed.js

echo js/register.js
java -jar %compressor% --type js --charset utf-8 -o js/register.js js/register_uncompressed.js

echo js/google.js
java -jar %compressor% --type js --charset utf-8 -o js/google.js js/google_uncompressed.js

echo js/hyphenator.js
java -jar %compressor% --type js --charset utf-8 -o js/hyphenator.js js/hyphenator_uncompressed.js

echo js/hyphenator-de.js
java -jar %compressor% --type js --charset utf-8 -o js/hyphenator-de.js js/hyphenator-de_uncompressed.js

echo js/hyphenator-en-gb.js
java -jar %compressor% --type js --charset utf-8 -o js/hyphenator-en-gb.js js/hyphenator-en-gb_uncompressed.js