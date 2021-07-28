jQuery.noConflict();
jQuery(document).ready(function($){
    
    var $winwidth   = $(window).width();
    
    var $winheight  = $(window).height();
    
    $(window).resize(function(){
        
        adjustImgOverflow();
        
    });
    
    function adjustImgOverflow(){
        
        if($('.img-overflow').length){
            
            $('.img-overflow').each(function(){
            
                var $wi = $(this).width();
            
                var $hi = $(this).height();
                
                var $w  = $(this).parent().width();
            
                var $h  = $(this).parent().height();
                
                var $r  = $w/$h;
            
                var $ri  = $wi/$hi;
                
                if($ri <= $r){
                
                    $(this).css({'width':$w+'px','height':'auto','margin-top':-((($w/$ri)-$h)/2)+'px','margin-left':0});

                }else{

                    $(this).css({'width':'auto','height':$h+'px','margin-left':-((($h*$ri)-$w)/2)+'px','margin-top':0});

                }
                            
            });
            
        }
        
    }
    
    adjustImgOverflow();
    
    setTimeout(adjustImgOverflow, 100);
    
    setTimeout(adjustImgOverflow, 500);
    
    setTimeout(adjustImgOverflow, 1000);
    
    setTimeout(adjustImgOverflow, 1500);
    
});