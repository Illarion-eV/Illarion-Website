@ECHO OFF

SET compressor=yuicompressor-2.4.7.jar

echo css/charprofil.css
java -jar %compressor% --type css --charset utf-8 -o css/charprofil.css css/charprofil_uncompressed.css

echo css/debug.css
java -jar %compressor% --type css --charset utf-8 -o css/debug.css css/debug_uncompressed.css

echo css/donate.css
java -jar %compressor% --type css --charset utf-8 -o css/donate.css css/donate_uncompressed.css

echo css/ffonly.css
java -jar %compressor% --type css --charset utf-8 -o css/ffonly.css css/ffonly_uncompressed.css

echo css/gmtool.css
java -jar %compressor% --type css --charset utf-8 -o css/gmtool.css css/gmtool_uncompressed.css

echo css/ieonly.css
java -jar %compressor% --type css --charset utf-8 -o css/ieonly.css css/ieonly_uncompressed.css

echo css/lightwindow.css
java -jar %compressor% --type css --charset utf-8 -o css/lightwindow.css css/lightwindow_uncompressed.css

echo css/lightwindow_de.css
java -jar %compressor% --type css --charset utf-8 -o css/lightwindow_de.css css/lightwindow_de_uncompressed.css

echo css/lightwindow_us.css
java -jar %compressor% --type css --charset utf-8 -o css/lightwindow_us.css css/lightwindow_us_uncompressed.css

echo css/main.css
java -jar %compressor% --type css --charset utf-8 -o css/main.css css/main_uncompressed.css

echo css/main_de.css
java -jar %compressor% --type css --charset utf-8 -o css/main_de.css css/main_de_uncompressed.css

echo css/main_us.css
java -jar %compressor% --type css --charset utf-8 -o css/main_us.css css/main_us_uncompressed.css

echo css/menu.css
java -jar %compressor% --type css --charset utf-8 -o css/menu.css css/menu_uncompressed.css

echo css/messages.css
java -jar %compressor% --type css --charset utf-8 -o css/messages.css css/messages_uncompressed.css

echo css/quest_details.css
java -jar %compressor% --type css --charset utf-8 -o css/quest_details.css css/quest_details_uncompressed.css

echo css/onlineplayer.css
java -jar %compressor% --type css --charset utf-8 -o css/onlineplayer.css css/onlineplayer_uncompressed.css

echo css/slider.css
java -jar %compressor% --type css --charset utf-8 -o css/slider.css css/slider_uncompressed.css

echo css/statistics.css
java -jar %compressor% --type css --charset utf-8 -o css/statistics.css css/statistics_uncompressed.css