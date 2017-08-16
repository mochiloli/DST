<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Document Manager</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
<!--<link rel="stylesheet" href="<?php echo $assets_url; ?>/jquery-ui-1.8.23/css/themes/smoothness/jquery-ui.css"/>-->
<link type="text/css" rel="stylesheet" href="<?php echo $assets_url; ?>/elfinder/css/elfinder.min.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo $assets_url; ?>/elfinder/css/theme.css"/>
<style>
html, body {
	margin: 0;
	overflow: hidden;
}
/* make elfinder allways fit windows */
html, body, #image-manager, .elfinder-workzone > .ui-resizable, .elfinder-workzone .elfinder-cwd-wrapper {
	height: 100%;
}
</style>
</head>
<body>
    
    <div id="image-manager"></div>
	
	<script src="<?php echo base_url('public/themes/admin/assets/jquery/main/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/themes/admin/assets/jquery/ui/jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo $assets_url; ?>/elfinder/js/elfinder.min.js"></script>
	<script>
	function getUrlParam(paramName) {
		var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
		var match = window.location.search.match(reParam) ;
		return (match && match.length > 1) ? match[1] : '' ;
	}
	
	
	var finder = $('#image-manager').elfinder({
		url             : '<?php echo $connector_url; ?>',
		height          : 'auto',
		onlyMimes       : <?php echo $allowed_mimes; ?>,
		resizeable      : false,
		rememberLastDir : false,
		getFileCallback : function(file) {
			
			//$('#image-manager').dialog('close');
			
			//CKEDITOR.replace('detail_th');
			
			
			var CKEditorFuncNum = getUrlParam('CKEditorFuncNum'),
					callback = getUrlParam('callback');
			
			try {
				// callback for CKEditor mode
				if (CKEditorFuncNum) 
				{
    				window.top.CKEDITOR.tools.callFunction(CKEditorFuncNum, file.url);
				}
				else if (window.top.ckeditorTarget)
				{
					console.log(window.top.ckeditorTarget);
				}
				else if (window.top.target_object)
				{
					window.top.jQuery(window.top.target_object).trigger('getFileCallback', file);
				}
			} catch(e) {
				alert(e);
			} finally {
				
				//alert('finally');
				//window.top.CKEDITOR.instances['detail_th'].insertHtml( '<a target="_blank" href="http://">netclub</a>' );
				// close windows when its done
				window.top.dialog.hide();
				//window.close();
			}
		},
		handlers        : {
			'load' : function(e, instance){
				// make elfinder allways fit windows
				setTimeout(function(){
					instance.ui.workzone.find('[style]').css('height', '');
				}, 1000);
			}
		}
	});
	</script>
	
</body>
</html>