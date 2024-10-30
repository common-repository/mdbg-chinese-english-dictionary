function voiceTextPopup(baseUrl, pinyin, display) {
	var popup=window.open('', 'voice_text', 'resizable=yes,scrollbars=yes,width=350,height=450');

	if (window.focus) {
		popup.focus();
	}

	var popupHtml='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n';
	popupHtml+='<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh"><head><title>'+display+'</title><link rel="stylesheet" href="'+baseUrl+'rsc/css/style.css" type="text/css" /></head><body>';
	popupHtml+='<!-- 統一碼 统一码 -->';
	popupHtml+='<div align="center">';
	popupHtml+='<h3>MDBG Chinese-English dictionary</h3>';
	popupHtml+='<p class="hinttext"><a target="_blank" href="'+baseUrl+'chindict.php">go to the MDBG dictionary website</p>';
	popupHtml+='<table class="panel"><tr><td>';
	popupHtml+='<object type="application/x-shockwave-flash" data="'+baseUrl+'rsc/swf/xspf_player/xspf_player.swf?autoplay=1&amp;playlist_url='+baseUrl+'chindict_xspf.php?pinyin='+encodeURIComponent(pinyin)+'%26base_url='+baseUrl+'" width="300" height="220">';
	popupHtml+='<param name="movie" value="'+baseUrl+'rsc/swf/xspf_player/xspf_player.swf?autoplay=1&amp;playlist_url='+baseUrl+'chindict_xspf.php?pinyin='+encodeURIComponent(pinyin)+'%26base_url='+baseUrl+'" />';
	popupHtml+='</object>';
	popupHtml+='</td></tr></table>';
	popupHtml+='</div>';
	popupHtml+='<div align="center">';
	popupHtml+='<p><a href="#" onclick="javascript:window.close();">Close window</a></p>';
	popupHtml+='</div>';
	popupHtml+='<p class="hinttext">';
	popupHtml+='Please note that context and 一 / 不 related tone changes are <strong>not</strong> represented in this automated pronunciation. ';
	popupHtml+='For more information see: <a href="http://en.wikipedia.org/wiki/Standard_Mandarin#Tone_sandhi" target="_blank">\'Standard Mandarin\' on Wikipedia</a>.';
	popupHtml+='</p>';
	popupHtml+='</body></html>';

	popup.document.write(popupHtml);
	popup.document.close();
	return false;
}
