/**
 * Generate timestamp
 */
function wpmTimestamp(){
    
    var tmp = window.performance && window.performance.now && window.performance.timing && window.performance.timing.navigationStart ? window.performance.now() + window.performance.timing.navigationStart : Date.now();
    
    return tmp;
    
}

/**
 * Generate uniqid
 */
function wpmUniqid($l){
        
    var $n = Math.ceil($l/9), $id = '';

    for(var $i=0; $i<$n; $i++){

        $id += Math.random().toString(36).substr(2, 9);

    }

    return $id.substr(0,$l);

}

/**
 * Array replace
 */
String.prototype.replaceArray = function(find, replace){
    var replaceString = this;
    for(var i = 0; i < find.length; i++){
        replaceString = replaceString.replace(find[i], replace[i]);
    }
    return replaceString;
};

/**
 * in_array function
 */
function inArray(needle, haystack){
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}