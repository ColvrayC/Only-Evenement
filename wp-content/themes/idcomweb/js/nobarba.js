/**
 * Load Gutenberg's blocks js functions
 */
function getGutenberJS(){
    
    var $idcomfunc = document.querySelectorAll('[data-idcom-js]');
            
    $idcomfunc.forEach(function(element, index){

        if(element.dataset.idcomJs != ''){
                        
            if(typeof element.dataset.idcomJs != 'undefined'){
                                
                window[element.dataset.idcomJs]();
                
            }

        }

    });
            
}

idcomInit();

getGutenberJS();