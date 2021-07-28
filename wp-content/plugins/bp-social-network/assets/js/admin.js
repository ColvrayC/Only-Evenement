jQuery.noConflict();
jQuery(document).ready(function($){
    
    function adjustBozPanels(){
        
        var $sectionW = $('#settings').width();
        var $tabsW = $('section .tabs').width();
        
        $('section .panels').css({'width':($sectionW-($tabsW+20))+'px'});
                
    }
    
    function panel_ok(){
        
        $('.boznote').removeClass('bg-danger').addClass('bg-success');
        $('.boznote > span').html($('.boznote > span').attr('data-saved'));
        $('#bozspinner').removeClass('spinrotate');
        setTimeout(function(){ $('.boznote').fadeOut(1000); }, 3000);
        
    }
    
    function panel_nok($response){
        
        $('.boznote > span').html($response);
        $('#bozspinner').removeClass('spinrotate');
        setTimeout(function(){ $('.boznote').fadeOut(1000); }, 5000);
        
    }
    
    function bozprod_save_options(){
                            
        var boz_options = {
            action:                 'bpsn_save_options',
            facebook:               $('#boz-facebook').val(),
            twitter:                $('#boz-twitter').val(),
            linkedin:               $('#boz-linkedin').val(),
            tumblr:                 $('#boz-tumblr').val(),
            pinterest:              $('#boz-pinterest').val(),
            instagram:              $('#boz-instagram').val(),
            youtube:                $('#boz-youtube').val(),
            vimeo:                  $('#boz-vimeo').val(),
            rss:                    $('#boz-rss').val(),
            btn_facebook:           $('#boz-btn-facebook').is(':checked'),
            btn_twitter:            $('#boz-btn-twitter').is(':checked'),
            btn_linkedin:           $('#boz-btn-linkedin').is(':checked'),
            btn_tumblr:             $('#boz-btn-tumblr').is(':checked'),
            btn_pinterest:          $('#boz-btn-pinterest').is(':checked'),
            btn_mail:               $('#boz-btn-mail').is(':checked')
        };
                        
        $.post(ajaxurl, boz_options, function(response){
                                    
            if(response != "ok"){ panel_nok(response); }else{ panel_ok(); }
        
        });
        
    }
    
    if($('section .tabs').length){
        
        $('.boztags').tagsInput();
        
        $('.bozyear').inputmask("9999");
        
        $('.bozfrdate').inputmask("99-99-9999");
        
        $('.bozusdate').inputmask("9999-99-99");
        
        $('.bozphone').inputmask("99-99-99-99-99");
        
        $('.bozage').inputmask("99-99");
        
        $('.bozdelay').inputmask("99");
        
        $('.boz-select2').select2({
            width: '100%'
        });
        
        tinymce.init({
            selector:'.boztinymce',
            branding: false
        });
        
        tinymce.init({
            selector:'.boztinymceadvanced',
            toolbar: 'codesample | bold italic underline sizeselect fontselect fontsizeselect | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | insertfile undo redo | forecolor backcolor emoticons | code fullscreen',
            plugins: 'code, image, table, link, imagetools, media, fullscreen',
            branding: false
        });
        
        $('.bozcolor').each(function(){
                
            var $idcolor    = $(this).attr('id');

            var $color      = $('#'+$idcolor+' > div').attr('data-color') != '' ? $('#'+$idcolor+' > div').attr('data-color') : $('#'+$idcolor+' > div').attr('default-color');

            $('#'+$idcolor+' > div').css('backgroundColor', $color);

            $('#'+$idcolor).ColorPicker({
                color: $color,
                onShow: function (colpkr) {
                    $(colpkr).fadeIn(250);
                    return false;
                },
                onHide: function (colpkr) {
                    $(colpkr).fadeOut(150);
                    return false;
                },
                onChange: function (hsb, hex, rgb) {

                    $('#'+$idcolor+' > div').attr('data-color','#'+hex);

                    $('#'+$idcolor+' > div').css('backgroundColor', '#' + hex);

                }
            });
                
        });
        
        $('#boz-site-colors-init').click(function(){
            
            $('.bozcolor').each(function(){
                
                var $idcolor    = $(this).attr('id');

                var $color      = $('#'+$idcolor+' > div').attr('default-color');

                $('#'+$idcolor+' > div').css('backgroundColor', $color);
                
                $('#'+$idcolor+' > div').attr('data-color',$color);

            });
            
        });
                
        adjustBozPanels();
        
        $(window).resize(function(){ adjustBozPanels(); });
        
        $('.boz-menu li').click(function(){
        
            if(!$(this).hasClass('selected')){

                $('.boz-menu li.selected .chevron i').removeClass('fa-chevron-right').addClass('fa-chevron-down');

                $('.boz-menu li.selected').removeClass('selected');

                var $liID = $(this).attr('id');
                
                var $liINT = $liID.split("_");
                
                $liINT = $liINT[1];
                
                $('#boznetwork_save_settings').attr('data-panel','panel_'+$liINT);
                
                $('#'+$liID+' .chevron i').removeClass('fa-chevron-down').addClass('fa-chevron-right');

                $('#'+$liID).addClass('selected');
                
                var $panelToHide = $('.panel.selected').attr('id').split('_');
                
                $panelToHide = 'panel_'+$panelToHide[1];
                
                $('#'+$panelToHide).removeClass('selected').addClass('hidden');
                
                $('#panel_'+$liINT).removeClass('hidden').addClass('selected');

            }

        });
                
        // Save data
        $('#boznetwork_save_settings').click(function(){
            
            $('#bozspinner').addClass('spinrotate');
            
            var $panel = $(this).attr('data-panel');
            
            $('.boznote > span').html($('.boznote > span').attr('data-saving'));
            
            if($('.boznote').hasClass('bg-success')){ $('.boznote').removeClass('bg-success').addClass('bg-danger'); }
            
            $('.boznote').fadeIn(250);
            
            bozprod_save_options();
            
        });
        
    }
    
    // WP uploader
    $('body').on('click', '.boz_upload_image_button', function(e){
        e.preventDefault();

        var button = $(this),
        custom_uploader = wp.media({
            title: 'Insérer une image',
            library : {
                    // uncomment the next line if you want to attach image to the current post
                    // uploadedTo : wp.media.view.settings.post.id, 
                    type : 'image'
            },
            button: {
                    text: 'Utiliser cette image' // button label text
            },
            multiple: false
        }).on('select', function() { // it also has "open" and "close" events 
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:50%;display:block;" />').next().val(attachment.id).next().show();
            /* if you sen multiple to true, here is some code for getting the image IDs
            var attachments = frame.state().get('selection'),
            attachment_ids = new Array(),
            i = 0;
            attachments.each(function(attachment) {
                attachment_ids[i] = attachment['id'];
                console.log( attachment );
                i++;
            });
            */
        })
        .open();
    });

    /*
     * Remove image event
     */
    $('body').on('click', '.boz_remove_image_button', function(){
        $(this).hide().prev().val('').prev().addClass('button').html('Ajouter une image');
        return false;
    });
        
});