<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Image Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>">
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
        <script src="<?php echo $assets_url . '/jquery/main/jquery.min.js'; ?>"></script>
        <script src="<?php echo $assets_url . '/jquery/ui/jquery-ui.min.js'; ?>"></script>
        <script src="<?php echo $assets_url . '/elfinder/js/elfinder.min.js'; ?>"></script>

        <script>
            function getUrlParam(paramName) {
                var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i');
                var match = window.location.search.match(reParam);
                return (match && match.length > 1) ? match[1] : '';
            }

            function is_ie()
            {
                var ms_ie = false;
                var ua = window.navigator.userAgent;
                var old_ie = ua.indexOf('MSIE ');
                var new_ie = ua.indexOf('Trident/');

                if ((old_ie > -1) || (new_ie > -1)) {
                    ms_ie = true;
                }
                return ms_ie;
            }

            var is_gallery = sessionStorage.getItem('gallery');
            var check_gallery = is_gallery != 'undefined' && is_gallery == 1 ? true : false;

            var finder = $('#image-manager').elfinder({
                url: '<?php echo $connector_url; ?>',
                height: 'auto',
                onlyMimes: <?php echo $allowed_mimes; ?>,
                resizeable: false,
                rememberLastDir: false,
                commandsOptions: {
                    getfile: {
                        multiple: check_gallery
                    }
                },
                getFileCallback: function (file, fm) {
                    var CKEditorFuncNum = getUrlParam('CKEditorFuncNum'),
                            callback = getUrlParam('callback');

                    var count_item = file.length;
                    console.log(count_item);
                    path_all = '';
                    if (CKEditorFuncNum) {
                        var file_path_all = file.path // get original path
                        file_name_path = file_path_all.replace(/\\/g, '/');
                        file_name_path = file_name_path.replace('assets/upload/', '');
                        path_all = '<?php echo $assets_url; ?>/' + file_name_path;
                        //path_all = path_all.replace('\\', '/');
                    }

                    try {
                        // callback for CKEditor mode
                        if (CKEditorFuncNum)
                        {
                            window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, path_all);
                        } else if (window.target_object) {
                            if (check_gallery === false || count_item == 1)
                            {
                                window.opener.jQuery(window.target_object).trigger('getFileCallback', file);
                            } else {
                                $(file).each(function (ele_index, ele_val) {
                                    window.opener.jQuery(window.target_object).trigger('getFileCallback', ele_val);
                                });
                            }
                        } else {
                            //fix for IE
                            current_tabs = window.opener.jQuery('.tab-pane.active.cont').attr('id') != 'undefined' ? window.opener.jQuery('.tab-pane.active.cont').attr('id') : null;
                            if (current_tabs != null) {
                                lang_config_code = current_tabs != null ? current_tabs.split('_') : null;
                                if (lang_config_code != null)
                                {
                                    lang_code = lang_config_code[lang_config_code.length - 1];
                                    window.opener.jQuery('.upload_img_' + lang_code).trigger('getFileCallback', file);
                                }
                            }
                            window.opener.jQuery('.upload_img').trigger('getFileCallback', file);
                            if (check_gallery === false || count_item == 1)
                            {
                                window.opener.jQuery('.upload_img_gallery').trigger('getFileCallback', file);
                            } else {
                                $(file).each(function (ele_index, ele_val) {
                                    window.opener.jQuery('.upload_img_gallery').trigger('getFileCallback', ele_val);
                                });
                            }
                        }
                    } catch (e) {
                        alert(e);
                    } finally {
                        // close windows when its done
                        window.close();
                    }
                },
                handlers: {
                    'load': function (e, instance) {
                        // make elfinder allways fit windows
                        setTimeout(function () {
                            instance.ui.workzone.find('[style]').css('height', '');
                        }, 1000);
                    }
                }
            });
        </script>

    </body>
</html>