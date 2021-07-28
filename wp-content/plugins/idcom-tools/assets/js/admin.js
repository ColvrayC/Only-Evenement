jQuery.noConflict();
jQuery(document).ready(function($){
        
    /**
     * Sortable items
     */
    
    // Sort images gallery
    $('.g-sortable').sortable({
        revert: true,
        update: function(e, ui){
                        
            updateGalleryValues($(this).attr('id'));
            
        }
    });
    
    // Sort audio playlist
    $('.a-sortable').sortable({
        revert: true,
        update: function(e, ui){
            
            updateAudioPlaylistValues($(this).attr('id'));
            
        }
    });
    
    // Sort videos playlist
    $('.video-playlist .videos').sortable({
        revert: true,
        update: function(e, ui){
            
            var $id = $(this).parent().attr('id');
            
            videoPlaylistValues($id,$('#'+$id).attr('data-name'));
            
        }
    });
    
    // $('.g-sortable, .a-sortable, .video-playlist .videos').disableSelection();
    
    /**
     * Get images IDs in gallery
     */
    function galleryValues($g){
                
        var $n = 0, $values = '';
                
        $('#'+$g+' .wpm-gallery-img').each(function(){
            
            var $v = $(this).val();
                                    
            if($v != ''){
                
                if($n == 0){
                    
                    $values += $v;
                    
                }else{
                    
                    $values += ','+$v;
                    
                }
                
                $n++;
                
            }
            
        });
        
        $('#'+$g+'_counter > span.count').html($n+' / '+$('#'+$g).attr('data-max'));
        
        return $values;
        
    }
    
    /**
     * Update images gallery values
     */
    function updateGalleryValues($g){
        
        var $values = galleryValues($g);
        
        $('#'+$g).attr('data-values',$values);
        
    }
    
    /**
     * Get sounds IDs in audio playlist
     */
    function audioPlaylistValues($p){
        
        var $n = 0, $values = '', $current;
        
        $('#'+$p+' .wpm-audio-track').each(function(){
            
            var $v = $(this).val();
                        
            if($v != ''){
                
                if($n == 0){
                    
                    $values += $v;
                    
                    $current = $v;
                    
                }else{
                    
                    $values += ','+$v;
                    
                }
                
                $n++;
                
            }
            
        });
                        
        $('#'+$p+'_counter > span.count').html($n+' / '+$('#'+$p).attr('data-max'));
        
        audioPlaylistSetTrack($p);
                
        return $values;
        
    }
    
    /**
     * Update audio playlist values
     */
    function updateAudioPlaylistValues($p){
        
        var $values = audioPlaylistValues($p);
        
        $('#'+$p).attr('data-values',$values);
        
    }
    
    /**
     * Setup first track on audio playlist
     */
    function audioPlaylistSetTrack($p){
        
        var $t      = $('#'+$p+' .audio-track-name').first().attr('data-src');
        
        var $active = $('#'+$p+' .audio-track-name').first().parent().attr('id');
                
        $('#'+$p+' > .audio-player > audio').attr('src',$t);
        
        $('#'+$active+' > .audio-track-name').addClass('active');
                
    }
    
    /**
     * Get videos in videos playlist and add/remove items
     */
    function videoPlaylistValues($p,$x){
        
        var $n = 0, $values = '';
                
        $('#'+$p+' .wpm-video').each(function(){
            
            var $v = $(this).val();
                        
            if($v != ''){
                
                if($n == 0){
                    
                    $values += $v;
                    
                }else{
                    
                    $values += ','+$v;
                    
                }
                
                $n++;
                
            }
            
        });
        
        $('#'+$x+'_counter > span.count').html($n+' / '+$('#'+$x+'_counter').attr('data-max'));
        
        $('#'+$x).val($values);
        
        var $len = $('#'+$p+' .wpm-video').length, $n = 1, $min = $('#'+$x+'_counter').attr('data-min'), $max = $('#'+$x+'_counter').attr('data-max');
                
        $('#'+$p+' .video-item').each(function(){
            
            var $xid = wpmUniqid(32);
            
            $(this).attr('id',$xid);
            
            if($('#'+$xid+' > .wpm-video-playlist-uploader-data > .wpm-video').val() == ''){
                
                if($min == 1){
                    
                    if($len >= $min){
                    
                        $len--;

                        $('#'+$xid).remove();

                    }
                    
                }else{
                    
                    if($len > $min){
                    
                        $len--;

                        $('#'+$xid).remove();

                    }
                    
                }
                                
            }
            
        });
        
        var $newlen = $('#'+$x).val().split(',');
                
        if($newlen.length >= parseInt($min) && $newlen.length < parseInt($max)){
            
            var $next = $('#'+$x).attr('data-id')+'_'+wpmUniqid(5);

            var $html = $('#'+$x).attr('data-html');

            $html     = $html.replace(/uniqid/g,$next);
            
            $('#'+$p+' > .videos').append($html);
                        
        }
        
        $('#'+$next).parent().addVideoToPlaylist();
        
        $('#'+$next).parent().manageVideo();
        
    }
    
    /**
     * Plugin methods
     */
    jQuery.extend(jQuery.fn, {
    
        /*
        * Add image to gallery
        */
        picToGallery: function(){

            this.each(function(){

                $(this).click(function(e){

                    e.preventDefault();

                    var $container   = $(this).parent().attr('id'),
                    $custom_uploader = wp.media({
                        title:      $(this).attr('data-insert'),
                        library: {
                            type:   'image'
                        },
                        button: {
                            text:   $(this).attr('data-use')
                        },
                        multiple:   false
                    }).on('select', function(){

                        var $id        = $container.split('_');
                        
                        var $gallery   = $('*[data-id="'+$id[0]+'"]').attr('id');

                        var $min       = $('#'+$gallery).attr('data-min');

                        var $max       = $('#'+$gallery).attr('data-max');
                        
                        var attachment = $custom_uploader.state().get('selection').first().toJSON();
                        
                        $('#'+$container).append('<img class="" src="'+attachment.url+'"/>');

                        $('#'+$container+' input[name="wpmtbox-img_'+$id[1]+'"]').val(attachment.id);

                        $('#'+$container+' .add').fadeOut(10);
                        
                        var $images    = galleryValues($gallery);
                        
                        $('#'+$gallery).attr('data-values',$images);
                        
                        var $count     = $images.split(',').length;
                        
                        if($count >= parseInt($min) && $count < parseInt($max)){
                            
                            var $next = wpmUniqid(5);

                            var $html = $('#'+$gallery).attr('data-html').replace('uniqid',$id[0]+'_'+$next);
                            
                            $html     = $html.replace(/xxx/g,$next);

                            $('#'+$gallery).append($html);
                            
                            $('#'+$id[0]+'_'+$next+' > .add').picToGallery();
                            
                            $('#'+$id[0]+'_'+$next).hoverGallery();
                            
                            $('#'+$id[0]+'_'+$next+' > .remove').removeFromGallery();
                            
                        }else if($count == parseInt($max)){
                            
                            // Max images
                            // alert($('#'+$id[0]).attr('data-max-alert'));

                        }else if($count < parseInt($min)){
                            
                            // Under min images

                        }

                    }).open();

                });

            });

            return this;

        },
        
        /*
        * Remove image from gallery
        */
        removeFromGallery: function(){
           
            this.each(function(){
               
                $(this).click(function(){

                    var $container  = $(this).parent().attr('id');

                    var $id         = $container.split('_');
                    
                    var $gallery    = $('*[data-id="'+$id[0]+'"]').attr('id');
                                                            
                    var $count      = $('#'+$gallery).attr('data-values').split(',').length;
                                                                                
                    if($count >= parseInt($('#'+$gallery).attr('data-min')) && $count < parseInt($('#'+$gallery).attr('data-max'))){
                        
                        $('#'+$container).fadeOut(250, function(){
                            
                            $('#'+$container).remove();
                            
                            $('#'+$gallery).attr('data-values',galleryValues($gallery));
                            
                        });
                        
                    }else{
                        
                        $('#'+$container+' img').fadeOut(250, function(){

                            $('#'+$container+' img').remove();

                            $('#'+$container+' input[name="wpmtbox-img_'+$id[1]+'"]').val('');

                            $('#'+$container+' .add').fadeIn(250);
                            
                            $('#'+$gallery).attr('data-values',galleryValues($gallery));

                        });
                        
                    }
                    
                });
               
            });
           
            return this;
           
        },
        
        /*
        * Display remove image (from gallery) button
        */
        hoverGallery: function(){
            
            this.each(function(){
                
                $(this).hover(function(){

                    var $id = $(this).attr('id');

                    if($('#'+$id+' img').length){

                        $('#'+$id+' .remove').fadeIn(250);

                    }

                }, function(){

                    var $id = $(this).attr('id');

                    $('#'+$id+' .remove').fadeOut(250);

                });
                
            });
            
            return this;
            
        },
        
        /*
        * Add audio to playlist
        */
        audioToPlaylist: function(){
            
            this.each(function(){
                
                $(this).click(function(e){
                    
                    e.preventDefault();
                    
                    var $container   = $(this).parent().attr('id'),
                    $custom_uploader = wp.media({
                        title:      $(this).attr('data-insert'),
                        library: {
                            type:   'audio'
                        },
                        button: {
                            text:   $(this).attr('data-use')
                        },
                        multiple:   false
                    }).on('select', function(){
                        
                        var $id        = $container.split('_');
                        
                        var $playlist  = $('*[data-id="'+$id[0]+'"]').attr('id');
                        
                        var $min       = $('#'+$playlist).attr('data-min');

                        var $max       = $('#'+$playlist).attr('data-max');
                                                
                        var attachment = $custom_uploader.state().get('selection').first().toJSON();
                        
                        $('#'+$container+' > .audio-track-name').attr('data-src',attachment.url);
                        
                        $('#'+$container+' > .audio-track-name').html(attachment.filename);

                        $('#'+$container+' > input[name="wpmtbox-audio_'+$id[1]+'"]').val(attachment.id);
                        
                        $('#'+$container+' > .wpm-upload-audio-track-button').fadeOut(10);
                        
                        $('#'+$container+' > .audio-track-name').fadeIn(150);
                        
                        $('#'+$container+' > .wpm-remove-audio-track-button').fadeIn(150);
                        
                        var $sounds    = audioPlaylistValues($playlist);
                        
                        $('#'+$playlist).attr('data-values',$sounds);
                        
                        var $count     = $sounds.split(',').length;
                        
                        if($count >= parseInt($min) && $count < parseInt($max)){
                            
                            var $next = wpmUniqid(5);
                            
                            var $html = $('#'+$playlist).attr('data-html').replace('uniqid',$id[0]+'_'+$next);
                            
                            $html     = $html.replace(/xxx/g,$next);
                            
                            $('#'+$playlist).append($html);
                            
                            $('#'+$id[0]+'_'+$next+' > .wpm-upload-audio-track-button').audioToPlaylist();
                            
                            $('#'+$id[0]+'_'+$next+' > .wpm-remove-audio-track-button').removeAudioFromPlaylist();
                            
                            $('#'+$id[0]+'_'+$next+' > .audio-track-name').playAudioFromPlaylist();
                            
                        }else if($count == parseInt($max)){
                            
                            // Max sounds
                            // alert($('#'+$id[0]).attr('data-max-alert'));

                        }else if($count < parseInt($min)){
                            
                            // Under min sounds

                        }
                        
                    }).open();
                    
                });
                
            });
            
            return this;
            
        },
        
        /*
        * Remove audio from playlist
        */
        removeAudioFromPlaylist: function(){
            
            this.each(function(){
                
                $(this).click(function(){
                    
                    var $container  = $(this).parent().attr('id');

                    var $id         = $container.split('_');

                    var $playlist   = $('*[data-id="'+$id[0]+'"]').attr('id');
                    
                    var $count      = $('#'+$playlist).attr('data-values').split(',').length;
                    
                    var $div        = $('#'+$playlist+' .wpm-audio-playlist-uploader').length;
                    
                    if($div >= parseInt($('#'+$playlist).attr('data-min'))+1 && $count < parseInt($('#'+$playlist).attr('data-max'))){
                    // if($count >= parseInt($('#'+$playlist).attr('data-min')) && $count < parseInt($('#'+$playlist).attr('data-max'))){
                         
                         $('#'+$container).fadeOut(250, function(){

                            $('#'+$container).remove();

                            $('#'+$playlist).attr('data-values', audioPlaylistValues($playlist));

                         });
                        
                    }else{
                                                
                         $('#'+$container+' .wpm-audio-track').val('');
                         
                         $('#'+$container+' .audio-track-name').attr('data-src','');
                         
                         $('#'+$container+' .audio-track-name').html('').fadeOut(10);
                         
                         $('#'+$container+' .wpm-remove-audio-track-button').fadeOut(10);
                         
                         $('#'+$container+' .wpm-upload-audio-track-button').fadeIn(150);
                         
                         $('#'+$playlist).attr('data-values',audioPlaylistValues($playlist));
                        
                    }
                    
                });
                
            });
            
            return this;
            
        },
        
        /*
        * Play audio track from playlist
        */
        playAudioFromPlaylist: function(){
            
            this.each(function(){
                
                $(this).click(function(){
                    
                    var $container  = $(this).parent().attr('id');

                    var $id         = $container.split('_');

                    var $playlist   = $('*[data-id="'+$id[0]+'"]').attr('id');
                    
                    $('#'+$playlist+' .audio-track-name').removeClass('active');
                    
                    $('#'+$playlist+' > .audio-player > audio').attr('src',$('#'+$container+' > .audio-track-name').attr('data-src'));
                    
                    $(this).addClass('active');
                    
                    var $audio = $('#'+$playlist+' > .audio-player > audio');
                    
                    $audio[0].play();
                    
                });
                
            });
            
            return this;
            
        },
        
        /*
        * Get remote video
        */
        getRemoteVideo: function(){
            
            this.each(function(){
                
                $(this).blur(function(){
                    
                    var $container  = $(this).attr('data-id');
                    
                    var $value      = $(this).val();
                    
                    var wpmVideoData = {
                        action:     'wpm_embed_remote_video',
                        video:      $value
                    }
                    
                    $.post(ajaxurl, wpmVideoData, function(response){
                        
                        var $response = $.parseJSON(response);
                                    
                        if($response.status == 0){

                            alert($response.alert);

                        }else{

                            $('#'+$container).append($response.video);
                            
                            $('#'+$container+'_back input.wpm-video').val($value).trigger('change');

                            $('#'+$container+' .wpm-upload-video-button').fadeOut(10);

                            $('#'+$container+'_back .cancel').click();

                        }

                    });
                    
                });
                
            });
            
            return this;
            
        },
        
        /*
        * Add video to playlist
        */
        addVideoToPlaylist: function(){
            
            this.each(function(){
                
                var $id = $(this).parent().parent().attr('id');
                                
                $('#'+$id+' > .videos > .video-item > .wpm-video-playlist-uploader-data > .wpm-video').change(function(){
                    
                    videoPlaylistValues($id,$(this).attr('data-name'));
                    
                });
                
            });
            
            return this;
            
        },
       
        /*
        * Remove video from playlist
        */
        manageVideo: function(){
            
            this.each(function(){
                
                var $el = this, $type = $($el).hasClass('video') ? 'single' : 'playlist';
                
                $('.wpm-upload-video-button', this).click(function(){

                    var $id = $(this).parent().attr('id');

                    $('#'+$id).fadeOut(100);

                    $('#'+$id+'_back').fadeIn(250);

                });

                $('.cancel', this).click(function(){

                    var $id = $(this).parent().attr('id').replace('_back','');

                    $('#'+$id+'_back').fadeOut(100);

                    $('#'+$id).fadeIn(250);

                });

                $('.wpm-upload-video-library', this).click(function(e){

                    e.preventDefault();

                    var $container   = $(this).attr('data-id'),
                    $custom_uploader = wp.media({
                        title:      $('#'+$container+'_back').attr('data-insert'),
                        library: {
                            type:   'video'
                        },
                        button: {
                            text:   $('#'+$container+'_back').attr('data-use')
                        },
                        multiple:   false
                    }).on('select', function(){

                        var attachment = $custom_uploader.state().get('selection').first().toJSON();

                        $('#'+$container).append('<video class="local-video video" width="100%" height="100%" controls><source src="'+attachment.url+'" type="'+attachment.mime+'"></video>');

                        $('#'+$container+'_back input.wpm-video').val(attachment.id).trigger('change');

                        $('#'+$container+' .wpm-upload-video-button').fadeOut(10);

                        $('#'+$container+'_back .cancel').click();

                    }).open();

                });

                $('.wpm-video-uploader, .wpm-video-playlist-uploader', this).hover(function(){

                    var $id = $(this).attr('id');

                    if($('#'+$id+' .video').length){

                        $('#'+$id+' .wpm-remove-video-button').fadeIn(250);

                    }

                }, function(){

                    var $id = $(this).attr('id');

                    $('#'+$id+' .wpm-remove-video-button').fadeOut(250);

                });

                $('.wpm-remove-video-button', this).click(function(){

                    var $container = $(this).attr('data-id');

                    $('#'+$container+' .video').fadeOut(250, function(){

                        $('#'+$container+' .video').remove();

                        $('#'+$container+'_back input.remote-video').val('');

                        $('#'+$container+'_back input.wpm-video').val('').trigger('change');

                        $('#'+$container+' .wpm-upload-video-button').fadeIn(250);

                    });

                });

                $('.remote-video', this).getRemoteVideo();
                
            });
            
            return this;
            
        },

    });
            
    /************************************************************************************************************************
     * Image uploader / WP media library
     */
    
    /**
     * Single image
     */
    if($('.wpm-upload-img-button').length){
        
        $('.wpm-upload-img-button').click(function(e){
        
            e.preventDefault();

            var $container   = $(this).attr('data-id'),
            $custom_uploader = wp.media({
                title:      $(this).attr('data-insert'),
                library: {
                    type:   'image'
                },
                button: {
                    text:   $(this).attr('data-use')
                },
                multiple:   false
            }).on('select', function(){

                var attachment = $custom_uploader.state().get('selection').first().toJSON();

                $('#'+$container).append('<img class="wpm-img-uploaded" src="'+attachment.url+'"/>');

                $('#'+$container+' input.wpm-img').val(attachment.id);

                $('#'+$container+' .wpm-upload-img-button').fadeOut(10);

            }).open();
            
        });
        
    }
    
    /*
     * Remove single added image
     */
    if($('.wpm-remove-image-button').length){
        
        $('.wpm-remove-image-button').click(function(){
        
            var $container = $(this).attr('data-id');

            $('#'+$container+' .wpm-img-uploaded').fadeOut(250, function(){

                $('#'+$container+' .wpm-img-uploaded').remove();

                $('#'+$container+' input.wpm-img').val('');

                $('#'+$container+' .wpm-upload-img-button').fadeIn(250);

            });

        });
        
    }
    
    /**
     * Display remove single image button
     */
    if($('.wpm-uploader').length){
        
        $('.wpm-uploader').hover(function(){
        
            var $id = $(this).attr('id');

            if($('#'+$id+' .wpm-img-uploaded').length){

                $('#'+$id+' .wpm-remove-image-button').fadeIn(250);

            }

        }, function(){

            var $id = $(this).attr('id');

            $('#'+$id+' .wpm-remove-image-button').fadeOut(250);

        });
        
    }
    
    /**
     * Images gallery
     */
    if($('.wpm-gallery').length){
        
        $('.wpm-gallery > .pic > .add').picToGallery();
    
        $('.wpm-gallery > .pic > .remove').removeFromGallery();

        $('.wpm-gallery > .pic').hoverGallery();
        
    }    
    
    /**
     * END image upload & handle
     *************************************************************************************************************************/
    
    /************************************************************************************************************************
     * Audio uploader / WP media library
     */
    
    /**
     * Single audio
     */
    if($('.wpm-upload-audio-button').length){
        
        $('.wpm-upload-audio-button').click(function(e){
        
            e.preventDefault();

            var $container   = $(this).attr('data-id'),
            $custom_uploader = wp.media({
                title:      $('#'+$container).attr('data-insert'),
                library: {
                    type:   'audio'
                },
                button: {
                    text:   $('#'+$container).attr('data-use')
                },
                multiple:   false
            }).on('select', function(){

                var attachment = $custom_uploader.state().get('selection').first().toJSON();

                $('#'+$container+' > input').val(attachment.id);

                $('#'+$container+' > .audio-name').html(attachment.filename);

                $('#'+$container+' > .wpm-upload-audio-button').fadeOut(100);

                $('#'+$container+' > .wpm-remove-audio-button').fadeIn(250);

                $('#'+$container+' > .audio').html('<audio controls class="audio" src="'+attachment.url+'"></audio>');

                $('#'+$container+' > .audio').fadeIn(250);

            }).open();
            
        });
        
    }
    
    /**
     * Remove single audio
     */
    if($('.wpm-remove-audio-button').length){
        
        $('.wpm-remove-audio-button').click(function(){
        
            var $container = $(this).attr('data-id');

            $('#'+$container+' > input').val('');

            $('#'+$container+' > .audio-name').html('');

            $('#'+$container+' > .wpm-upload-audio-button').fadeIn(250);

            $('#'+$container+' > .audio > audio').remove();

            $('#'+$container+' > .audio').fadeOut(10);

            $('#'+$container+' > .wpm-remove-audio-button').fadeOut(100);

        });
        
    }
    
    /**
     * Audio playlist
     */
    if($('.wpm-audio-playlist').length){
        
        $('.wpm-audio-playlist > .wpm-audio-playlist-uploader > .wpm-upload-audio-track-button').audioToPlaylist();
        
        $('.wpm-audio-playlist > .wpm-audio-playlist-uploader > .wpm-remove-audio-track-button').removeAudioFromPlaylist();
        
        $('.wpm-audio-playlist > .wpm-audio-playlist-uploader > .audio-track-name').playAudioFromPlaylist();
        
    }
    
    /**
     * END audio upload & handle
     *************************************************************************************************************************/
    
    /************************************************************************************************************************
     * Video uploader / WP media library
     */
    
    /**
    * Single video
    */
    if($('.input.video').length){
        
        $('.input.video').manageVideo();
        
    }
    
    /**
    * Videos playlist
    */
    function addIdToPlaylists(){
        
        $('.video-playlist').each(function(){
            
            var $id     = 'video-playlist_'+wpmUniqid(32);
            
            $(this).attr('id',$id);
            
            var $name   = $('#'+$id+' > .videos > .video-item > .wpm-video-playlist-uploader-data > .wpm-video').attr('data-name');
                                    
            $(this).attr('data-name',$name);
                        
        });
        
    }
    
    if($('.video-playlist').length){
        
        addIdToPlaylists();
        
        $('.video-playlist .video-item').addVideoToPlaylist();
        
        $('.video-playlist .video-item').manageVideo();
                
    }
    
    /**
     * END video upload & handle
     *************************************************************************************************************************/
    
    /**
     * Plugin pages loader
     */
    if($('#wpm-loader').length){

        $('.wpm').fadeIn(50, function(){
            $('.wpm, #wpadminbar, #adminmenuback, #adminmenuwrap').css({'visibility':'visible'});
        });
        
        setTimeout(function(){
                        
            $('#wpm-loader').fadeOut(1000);

        }, 1000);
        
    }
    
    /**
     * Notices wrapper
     */
    if($('#wpm-notice').length){
        
        $('#wpm-notice > .wpm-notice > .button').click(function(){
            
            $('#wpm-notice').fadeOut(500);
            
        });
        
    }
    
    /**
     * instanciate data & fields
     */
    if($('.wrap.wpm').length){
        
        /* Google fonts */
        if($('.gfonts').length){
            
            $('.gfonts').each(function(){
                
                var $id     = $(this).attr('id');
                
                var $font   = $('#'+$id).parent().find('.preview-font').attr('data-font');
                
                if($font != ''){
                    
                    $('#'+$id).parent().find('.preview-font').attr('style','font-family: '+$font+';');
                
                    $('head').append("<link href='https://fonts.googleapis.com/css2?family="+$font+"' rel='stylesheet' type='text/css'>");
                    
                }
                
            });
            
            $('.gfonts').change(function(){
                
                var $id     = $(this).attr('id');
                
                var $font   = $('#'+$id+' option:selected').text();
                
                $('#'+$id).parent().find('.preview-font').attr('style','font-family: '+$font+';');
                
                $('#'+$id).parent().find('.preview-font').attr('data-font',$font);
                
                $('head').append("<link href='https://fonts.googleapis.com/css2?family="+$font+"' rel='stylesheet' type='text/css'>");
                
            });
            
        }
        
        /* Panel selection */
        $('.wpm .settings .sidebar .setting').click(function(){
            
            var $tab = $(this).attr('data-tab');
            
            $('.wpm .settings .sidebar .setting').removeClass('active');
            
            $('.wpm .settings .content .panel').removeClass('active');
            
            $(this).addClass('active');
            
            $('#'+$tab).addClass('active');
            
        });
        
        /* Input tags */
        if($('.input.tags').length){ $('.input.tags input').tagsInput(); }
        
        /* FR phone mask input */
        if($('.input .fr-phone').length){ $('.input .fr-phone').inputmask("99.99.99.99.99"); }
        
        /* FR & US dates mask input */
        if($('.input .fr-date').length){ $('.input .fr-date').inputmask("99-99-9999"); }
        if($('.input .us-date').length){ $('.input .us-date').inputmask("9999-99-99"); }
        
        /* SIRET & SIREN mask input */
        if($('.input .siret').length){ $('.input .siret').inputmask("999 999 999 99999"); }
        if($('.input .siren').length){ $('.input .siren').inputmask("999 999 999"); }
        
        /* FR & US datepicker */
        if($('.input .fr-date-picker').length){ $('.input .fr-date-picker').datepicker({ dateFormat: 'dd-mm-yy' }); }
        if($('.input .us-date-picker').length){ $('.input .us-date-picker').datepicker({ dateFormat: 'yy-mm-dd' }); }
        
        /* SELECT2 */
        if($('.input .select2').length){ $('.input .select2').select2({ width: '100%' }); }
        
        /* Color picker */
        var myColorOptions = {
            defaultColor:   false,
            change:         function(event, ui){},
            clear:          function() {},
            hide:           true,
            palettes:       true
        };
        
        if($('.input.hexacolor input').length){ $('.input.hexacolor input').wpColorPicker(myColorOptions); }
        
        /* Ion Range Sliders */
        if($('.input.ionrs input')){ $('.input.ionrs input').ionRangeSlider(); }
        
        /* Count chars from input */
        $('input[type="text"], input[type="email"], input[type="password"], textarea').keyup(function(){
            
            var $len = $(this).val().length;
                        
            $('*[data-counter="'+$(this).attr('id')+'"]').html($len);
            
        });
        
        /**
         * Save panel data
         */
        $('.wrap.wpm .header #save_settings').click(function(){
            
            $('.wrap.wpm > .row.header > .saving-notice').fadeIn(250);
            
            var $panel      = $('.wrap.wpm .settings .sidebar .setting.active').attr('data-tab');
            
            var $option     = $('#'+$panel).attr('data-option');
            
            var $sub_option = $('#'+$panel).attr('data-id');
            
            var $fields     = $('#'+$panel).attr('data-fields').split(',');
            
            var $data       = {
                action:         'wpm_save_panel_settings',
                option:         $option,
                sub_option:     $sub_option,
                data:           []
            };
            
            for(var $i=0; $i<$fields.length; $i++){
                
                var $field = $fields[$i].split('|');
                
                // Checkbox
                if($field[1] == 'checkbox'){
                                        
                    $data[$field[0]] = [$('#'+$field[0]).is(':checked'), 'checkbox'];
                                        
                // Radio buttons
                }else if($field[1] == 'radio'){
                                                            
                    $data[$field[0]] = [$('#'+$('input[name="'+$field[0]+'"]:checked').attr('id')).parent().find('span').html(), 'radio'];
                    
                // Range slider
                }else if($field[1] == 'range'){
                                                            
                    $data[$field[0]] = [$('#'+$field[0]).val(), 'range'];
                    
                // input text
                }else if($field[1] == 'text'){
                    
                    if($('#'+$field[0]).attr('type') == 'email'){
                        
                        $data[$field[0]] = [$('#'+$field[0]).val(), 'email'];
                        
                    }else if($('#'+$field[0]).attr('type') == 'tel'){
                        
                        $data[$field[0]] = [$('#'+$field[0]).val(), 'tel'];
                                                
                    }else if($('#'+$field[0]).attr('type') == 'password'){
                        
                        $data[$field[0]] = [$('#'+$field[0]).val(), 'password', $('#'+$field[0]).attr('minlength'), $('#'+$field[0]).attr('maxlength')];
                        
                    }else if($('#'+$field[0]).attr('type') == 'number'){
                        
                        $data[$field[0]] = [$('#'+$field[0]).val(), 'number', $('#'+$field[0]).attr('min'), $('#'+$field[0]).attr('max')];
                        
                    }else if($('#'+$field[0]).attr('type') == 'text'){
                        
                        var $date = '';
                                                
                        if($('#'+$field[0]).hasClass('fr-date') || $('#'+$field[0]).hasClass('fr-date-picker')){
                            
                            $date = 'fr-date';
                                                    
                        }else if($('#'+$field[0]).hasClass('us-date') || $('#'+$field[0]).hasClass('us-date-picker')){
                            
                            $date = 'us-date';
                        
                        }
                        
                        $data[$field[0]] = [$('#'+$field[0]).val(), 'text', $('#'+$field[0]).attr('minlength'), $('#'+$field[0]).attr('maxlength'), $date];
                        
                    }
                
                // textarea input
                }else if($field[1] == 'textarea'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).val(), 'textarea', $('#'+$field[0]).attr('minlength'), $('#'+$field[0]).attr('maxlength')];
                    
                // tags input
                }else if($field[1] == 'tags'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).val(), 'tags', $('#'+$field[0]).attr('min'), $('#'+$field[0]).attr('max')];
                
                // WP editor
                }else if($field[1] == 'wp-editor'){
                    
                    $data[$field[0]] = [tinymce.get($field[0]).getContent(), 'wpeditor'];
                
                // Select
                }else if($field[1] == 'select'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).val(), 'select'];
                
                // Image
                }else if($field[1] == 'img'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).val(), 'img'];
                    
                // Images gallery
                }else if($field[1] == 'img_gallery'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).attr('data-values'), 'img_gallery', $('#'+$field[0]).attr('data-min'), $('#'+$field[0]).attr('data-max')];
                    
                // Colors
                }else if($field[1] == 'color'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).val(), 'color'];
                    
                // Audio
                }else if($field[1] == 'audio'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).val(), 'audio'];
                    
                // Audio playlist
                }else if($field[1] == 'audio_playlist'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).attr('data-values'), 'audio_playlist', $('#'+$field[0]).attr('data-min'), $('#'+$field[0]).attr('data-max')];
                    
                // Video
                }else if($field[1] == 'video'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).val(), 'video'];
                    
                // Video playlist
                }else if($field[1] == 'video_playlist'){
                    
                    $data[$field[0]] = [$('#'+$field[0]).val(), 'video_playlist', $('#'+$field[0]+'_counter').attr('data-min'), $('#'+$field[0]+'_counter').attr('data-max')];
                    
                }
                
            }
                        
            $.post(ajaxurl, $data, function(response){
            
                var $response = $.parseJSON(response);
                
                setTimeout(function(){
                                    
                    if($response.status == 0){

                        $('#wpm-notice > .wpm-notice > .wpm-message').html($response.notice);
                        
                        $('#wpm-notice').fadeIn(500);

                    }else{

                        //

                    }
                    
                    $('.wrap.wpm > .row.header > .saving-notice').fadeOut(500);

                }, 1500);
                
            });
            
        });
                
    }
                
});