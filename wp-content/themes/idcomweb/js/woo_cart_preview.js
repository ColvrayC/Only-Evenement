String.prototype.replaceArray = function(find, replace){
    var replaceString = this;
    for(var i = 0; i < find.length; i++){
        replaceString = replaceString.replace(find[i], replace[i]);
    }
    return replaceString;
};

function idcom_woo_cart_preview(){
    
    /**
     * IDCOM Woocommerce preview cart
     */
    
    var $ = jQuery.noConflict();
    
    /**
     * Plugins
     */
    $.extend($.fn, {
        
        /**
         * Gestion Ajax de l'ajout au panier de produits (aperçu du panier, boîte modale)
         */
        previeWooCart: function(){
            
            this.each(function(){
                
                $(this).click(function(){
                    
                    var updateCart = {
                        action:     'idcom_update_preview_cart',
                        count:      $('#gotocheckout .badge').html(),
                        total:      $('#idcom-cart .total-price').attr('data-amount'),
                        id:         $(this).attr('data-product_id'),
                        quantity:   $(this).attr('data-quantity')
                    };
                    
                    $.ajax({
                        type:       'POST',
                        url:        idcomwooajax.ajax_url,
                        dataType:   'json',
                        data:       updateCart,
                        success:    function(data){

                            var dataResult = $.parseJSON(data);

                            if(dataResult.label == 'ok'){

                                $('#gotocheckout .badge, .woo-cart-count').html(dataResult.count);

                                $('#idcom-cart .total-price').html(dataResult.total);

                                $('#idcom-cart .total-price').attr('data-amount', dataResult.amount);

                                $('#idcom-cart > .basket > .data').html(dataResult.items);

                                $('.q_product_preview_preview').each(function(){

                                    $(this).updateWooCart();

                                });

                                $('.del_product_preview_preview').each(function(){

                                    $(this).deleteWooCart();

                                });

                            }else{

                                //

                            }

                        }

                    });
                    
                });
                
            });
            
            return this;
            
        },
        
        /**
         * Suppression d'un article du panier (mise à jour aperçu du panier, boîte modale, et mise à jour Woocommerce)
         */
        deleteWooCart: function(){
            
            this.each(function(){
                
                $(this).click(function(){
                    
                    var $id     = $(this).attr('id');
                
                    $id         = $id.split('_');

                    $id         = $id[1];

                    var $q      = parseInt($('#qproduct_'+$id).val());

                    var $count  = parseInt($('#gotocheckout .badge').html());

                    var $diff   = $count - $q;

                    var deleteCartItem = {
                        action:     'idcom_delete_cart_item',
                        id:         $id
                    };
                    
                    $.ajax({
                        type:       'POST',
                        url:        idcomwooajax.ajax_url,
                        dataType:   'json',
                        data:       deleteCartItem,
                        success:    function(data) {

                            var dataResult = $.parseJSON(data);

                            if(dataResult.label == 'ok'){

                                $('#gotocheckout .badge, .woo-cart-count').html($diff);

                                $('#idcom-cart .total-price').html(dataResult.total);

                                $('#idcom-cart .total-price').attr('data-amount', dataResult.amount);

                                $('#product_'+$id).slideUp(150, function(){

                                    $('#product_'+$id).remove();

                                });

                            }else{

                                //

                            }
                        }

                    });
                    
                });
                
            });
            
            return this;
            
        },
        
        /**
         * Mise à jour des quantités d'un produit, et du montant associé (mise à jour aperçu du panier, boîte modale, et mise à jour Woocommerce)
         */
        updateWooCart: function(){
            
            this.each(function(){
                
                $(this).change(function(){
                    
                    var $id     = $(this).attr('id');
                
                    $id         = $id.split('_');

                    $id         = $id[1];

                    var $q      = parseInt($('#qproduct_'+$id).val()) > 0 ? parseInt($('#qproduct_'+$id).val()) : 1;

                    $('#qproduct_'+$id).val($q);

                    var $count  = 0;

                    $('.q_product_preview').each(function(){

                        var $v = parseInt($(this).val());

                        $count += $v;

                    });

                    var updateCartItem = {
                        action:     'idcom_update_cart_item',
                        id:         $id,
                        q:          $q
                    };
                    
                    $.ajax({
                        type:   'POST',
                        url:    idcomwooajax.ajax_url,
                        dataType: "json",
                        data: updateCartItem,
                        success: function(data){

                            var dataResult = $.parseJSON(data);

                            if(dataResult.label == 'ok'){

                                $('#gotocheckout .badge, .woo-cart-count').html($count);

                                $('#idcom-cart .total-price').html(dataResult.total);

                                $('#idcom-cart .total-price').attr('data-amount', dataResult.amount);

                            }else{

                                //

                            }
                        }

                    });
                    
                });
                
            });
            
            return this;
            
        }
        
    });
    
    if($('.add_to_cart_button').length){
        
        $('.add_to_cart_button').previeWooCart();
        
    }
    
    if($('.del_product_preview_display').length){
        
        $('.del_product_preview_display').deleteWooCart();
        
    }
    
    if($('.q_product_preview_display').length){
        
        $('.q_product_preview_display').updateWooCart();
        
    }
        
    /**
     * 
     * Update cart counter (top menu icon)
     * 
     * Target: icon ID -> "gotocheckout", counter container class -> "badge"
     * 
     */
    $('.add_to_cart_button, .woocommerce-cart-form__cart-item > .product-remove > .remove').click(function(){
            
        setTimeout(function(){

            var updateCart = {
                action:     'idcom_update_cart_counter'
            };

            $.ajax({
                type:           'POST',
                url:            idcomwooajax.ajax_url,
                dataType:       'json',
                data:           updateCart,
                success: function(data){

                    var dataResult = $.parseJSON(data);

                    $('#gotocheckout > .badge').html(dataResult.count);

                    if(dataResult.label == 'ok'){

                        $('#gotocheckout > .badge').removeClass('hidden');

                    }else{

                        $('#gotocheckout > .badge').addClass('hidden');

                    }

                }

            });

        }, 2000);

    });
        
    function hideIdcomCartPreview(){
        
        $('#idcom-cart').removeClass('visible');
        
        $('#idcom-overlay').fadeOut(1000);
        
    }
    
    $('#gotocheckout').click(function(){
        
        $('#idcom-cart').addClass('visible');
        
        $('#idcom-overlay').fadeIn(500);
        
    });
    
    $('#idcom-overlay, #idcom-cart #close-preview-cart').click(function(){
        
        hideIdcomCartPreview();
        
    });
    
}