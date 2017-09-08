
<?php echo $javascript->link("tiny_mce/tiny_mce.js"); ?> 

<?php 
    echo $javascript->codeBlock( 
        "
        function openKCFinder(field_name, url, type, win) {
    tinyMCE.activeEditor.windowManager.open({
        file: 'http://localhost/trinity.am/app/webroot/js/kcfinder/browse.php?opener=tinymce&type=' + type,
        title: 'KCFinder',
        width: 700,
        height: 500,
        resizable: 'yes',
        inline: true,
        close_previous: 'no',
        popup_css: false
    }, {
        window: win,
        input: field_name
    });
    return false;
		}
        " 
    ); 
?> 

<?php 
    echo $javascript->codeBlock( 
        "tinyMCE.init({ 
            mode : 'textareas', 
            theme : 'advanced', 
            theme_advanced_buttons1 : 'forecolor, bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,undo,redo,|,link,unlink,|,image,emotions,code',
            theme_advanced_buttons2 : '', 
            theme_advanced_buttons3 : '', 
            theme_advanced_toolbar_location : 'top', 
            theme_advanced_toolbar_align : 'left', 
            theme_advanced_path_location : 'bottom', 
            extended_valid_elements : 'a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]',
            file_browser_callback: 'openKCFinder', 
            width: '620', 
            height: '480', 
            relative_urls : false 
        });" 
    ); 
?> 