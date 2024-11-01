jQuery(document).ready(function ($) {
    var selectFileFrame;
    
    // Run media uploader for thumbnail upload
    $('#upload_thumbnail_button').click(function (e) {
        e.preventDefault();
        selectFileFrame = wp.media({
            title: $('#upload_thumbnail_button').attr('value'),
            button: {
                text: 'insert',
            },
            multiple: false,
            library: {type: 'image'},
        });
        selectFileFrame.open();
        selectFileFrame.on('select', function () {
            var attachment = selectFileFrame.state().get('selection').first().toJSON();

            $('#studl_thumbnail_image').attr('src',attachment.url);
            $('#studl_thumbnail_image').attr('style',"max-width:200px;display:block;");
            
            $('#studl_thumbnail').val(attachment.url);
        });
        return false;
    });

    $('#studl_thumbnail').change(function () { 
        if ($('#studl_thumbnail').val()!='') {
            $('#studl_thumbnail_image').attr('src', $('#studl_thumbnail').val());
            $('#studl_thumbnail_image').attr('style',"max-width:200px;display:block;"); 
        } else {$('#studl_thumbnail_image').attr('style',"max-width:200px;display:none;"); }
    });
});