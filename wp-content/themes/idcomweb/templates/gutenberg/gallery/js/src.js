function idcomPicturesGallery(){
    
    /**
     * Pictures gallery
     */
    
    var $ = jQuery.noConflict();
    
    $('.img-gallery').each(function(){
        
        var $id = $(this).attr('id');
                
        $('#'+$id+' > .picture').click(function(){
            
            var $target = parseInt($('#'+$(this).attr('id')).attr('data-id'));
                                    
            initPhotoswipeGallery($target, $id);

        });
        
    });
    
}