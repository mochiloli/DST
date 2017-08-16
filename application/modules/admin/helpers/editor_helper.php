<?php

function ckeditor_render($element_name = 'detail', $lang = '', $width = 650, $height = 300, $type = 'custom') {
    switch ($type) {
        case 'custom':
            $style_content = "[
                                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
                                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
                                    '/',
                                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
                                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                                    { name: 'netclub', items: [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
                                    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                                    { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
                                    '/',
                                    { name: 'styles', items: [ 'Styles', 'Format' ,'Font','FontSize','TextColor','BGColor'] },
                                    { name: 'others', items: [ '-' ] },
                                    { name: 'insertfile', items: [ 'Insertfile' ] },
                                    { name: 'others', items: [ '-' ] },
                                    { name: 'youtube', items: [ 'Youtube' ] },
                                    { name: 'others', items: [ '-' ] },
                                    { name: 'tools', items: [ 'Maximize' ] },
                                    { name: 'others', items: [ '-' ] },
                                    { name: 'about', items: [ 'About' ] }
                                ]";
            break;
        case 'full':
            $style_content = "[
                                        { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                                        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                                        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                                        { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
                                        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                                        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                                        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                                        { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
                                        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                                        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                                        { name: 'others', items: [ '-' ] },
                                        { name: 'youtube', items: [ 'Youtube' ] },
                                        { name: 'others', items: [ '-' ] },
                                        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                                        { name: 'others', items: [ '-' ] },
                                        { name: 'about', items: [ 'About' ] }
                                ]";
            break;
        case 'front':
            $style_content = "[
                                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
                                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] ,items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
                                    '/',
                                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ]  },
                                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                                    { name: 'netclub', items: [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
                                    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                                    { name: 'insert', items: [ 'Table', 'HorizontalRule', 'SpecialChar' ] },
                                    '/',
                                    { name: 'styles', items: [ 'Styles', 'Format' ,'Font','FontSize','TextColor','BGColor'] },
                                    { name: 'others', items: [ '-' ] },
                                    { name: 'youtube', items: [ 'Youtube' ] },
                                    { name: 'others', items: [ '-' ] },
                                    { name: 'tools', items: [ 'Maximize' ] },
                                    { name: 'others', items: [ '-' ] },
                                    { name: 'about', items: [ 'About' ] }
                              ]";
            break;
    }


    $content = "CKEDITOR.replace('{$element_name}_{$lang}', {
								filebrowserImageBrowseUrl : '" . site_url('filemanager/image') . "',
								resize_maxWidth: " . $width . ",  
								height:" . $height . ",                                                 
								enterMode: 2,
								allowedContent: true, 
								toolbar : " . $style_content . "
								
					});";

    return $content;
}
