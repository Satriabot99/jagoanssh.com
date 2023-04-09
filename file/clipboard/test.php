<input type="text" value="ss://YWVzLTI1Ni1jZmI6WXpGa01AY2ExLXNzLnNzaG9jZWFuLm5ldDo4Mzg4" id="ssClipboard" class="ssClipboard" style="opacity: 0;">
<button class="btn btn-success" onclick="if (!window.__cfRLUnblockHandlers) return false; copyClipboard()" data-cf-modified-b7498ae83725a55a363698fa-="">Copy Shadowsocks Clipboard</button>

<script type="b7498ae83725a55a363698fa-text/javascript">
	var origstr = 'aes-256-cfb' + ':' + 'YzFkM' + '@' + 'ca1-ss.sshocean.net' + ':' + '8388';
    var b64str = 'ss://' + utf8_to_b64(origstr);

	jQuery('#qrcodeCanvas').qrcode({
		text	: b64str
	});	

function utf8_to_b64(str) {
    return window.btoa(unescape(encodeURIComponent(str)));
}
function copyClipboard() {
    var copyText = document.getElementById("ssClipboard");
    copyText.select();
    document.execCommand("copy");
    alert("Copied the clipboard");
}
</script>