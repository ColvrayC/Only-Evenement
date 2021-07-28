<?php

/*******************************************************************************
 * 
 * Woocommerce cart preview
 * 
 */

/**
 * Enqueue javascript file in front
 */
function idcom_cart_preview_scripts($hook){
    
    $path   = get_template_directory_uri();
            
    wp_register_script('idcom_cart_preview_js',$path.'/js/woo_cart_preview.js',array('jquery'),IDCOMv,true);
    wp_enqueue_script('idcom_cart_preview_js');
    wp_localize_script('idcom_cart_preview_js','idcomwooajax', array('ajax_url' => admin_url('admin-ajax.php')));
    
}

add_action('wp_enqueue_scripts','idcom_cart_preview_scripts');

/**
 * Update cart counter (icon in top menu)
 */
function idcom_update_cart_counter(){
    
    global $wp;
    
    global $woocommerce;
    
    global $site_data;
    
    $count = $woocommerce->cart->cart_contents_count;
    
    if($count > 0){
        
        $result = array(
            'label'     => __('ok','idcomcrea'),
            'count'     => $count
        );
        
    }else{
        
        $result = array(
            'label'     => __('ko','idcomcrea'),
            'count'     => $count
        );
        
    }    
        
    echo wp_send_json(json_encode($result));
    
    wp_die();
    
}

add_action('wp_ajax_nopriv_idcom_update_cart_counter', 'idcom_update_cart_counter');

add_action('wp_ajax_idcom_update_cart_counter','idcom_update_cart_counter');

/**
 * Update quantity and price for a product (preview cart)
 */
function idcom_update_cart_item(){
    
    global $wp;
    
    global $woocommerce;
    
    global $site_data;
    
    $id = $_POST['id'];
    
    $q  = $_POST['q'];
    
    foreach(WC()->cart->get_cart() as $cart_item_key => $cart_item){
        
        $product_id = $cart_item['data']->get_id();
        
        if($product_id == $id && $cart_item['quantity'] != $q){
            
            WC()->cart->set_quantity($cart_item_key, $q);
            
        }
        
    }
    
    $result = array(
        'label'     => __('ok','idcomcrea'),
        'total'     => number_format(($woocommerce->cart->total), 2, ',', ' ').'€',
        'amount'    => $woocommerce->cart->total
    );
    
    echo wp_send_json(json_encode($result));
    
    wp_die();
    
}

add_action('wp_ajax_nopriv_idcom_update_cart_item', 'idcom_update_cart_item');

add_action('wp_ajax_idcom_update_cart_item','idcom_update_cart_item');

/**
 * Remove a product from cart (preview cart)
 */
function idcom_delete_cart_item(){
    
    global $wp;
    
    global $woocommerce;
    
    global $site_data;
    
    $id = $_POST['id'];
        
    foreach(WC()->cart->get_cart() as $cart_item_key => $cart_item){
        
        if($cart_item['product_id'] == $id){
            
            WC()->cart->remove_cart_item($cart_item_key);
            
        }else if($cart_item['variation_id'] == $id){
            
            WC()->cart->remove_cart_item($cart_item_key);
            
        }
        
    }
    
    $result = array(
        'label'     => __('ok','idcomcrea'),
        'total'     => number_format(($woocommerce->cart->total), 2, ',', ' ').'€',
        'amount'    => $woocommerce->cart->total
    );
    
    echo wp_send_json(json_encode($result));
    
    wp_die();
    
}

add_action('wp_ajax_nopriv_idcom_delete_cart_item', 'idcom_delete_cart_item');

add_action('wp_ajax_idcom_delete_cart_item','idcom_delete_cart_item');

/**
 * Update cart preview
 */
function idcom_update_preview_cart(){
    
    global $wp;
    
    global $woocommerce;
    
    global $site_data;
    
    $count      = str_replace(array('(',')'),array('',''),$_POST['count']);
        
    $total      = $_POST['total'];
    
    $id         = $_POST['id'];
    
    $q          = $_POST['quantity'];
    
    $product    = wc_get_product($id);
    
    $_thumbnail_id = get_post_meta($id,'_thumbnail_id',true);

    $prod_name  = $product->get_title();

    $price      = $product->get_price();

    $thumb      = wp_get_attachment_image_src($_thumbnail_id, 'medium');
                    
    $items      = $woocommerce->cart->get_cart();
    
    $check      = 0;
    
    $products   = array();
        
    foreach($items as $item => $values){
                
        $_product   = wc_get_product($values['data']->get_id());
        
        $check      = $product == $_product ? $_product : $check;
        
        $_price     = $_product->get_price();
        
        $_q         = $check > 0 ? ($values['quantity']+$q) : $values['quantity'];
                
        $_thumb     = wp_get_attachment_image_src(get_post_thumbnail_id($values['data']->get_id()), 'medium');
        
        $data       = array(
            'id'    => $values['data']->get_id(),
            'p'     => $_price,
            'q'     => $_q,
            't'     => $_thumb,
            'n'     => $product->get_title(),
            'h'     => get_permalink($values['data']->get_id())
        );
        
        array_push($products,$data);
        
    }
    
    if($check == 0){
        
        $data       = array(
            'id'    => $id,
            'p'     => $price,
            'q'     => $q,
            't'     => $thumb,
            'n'     => $prod_name,
            'h'     => get_permalink($id)
        );
        
        array_push($products,$data);
        
    }
    
    $update = idcom_create_preview_products($products,'preview');
    
    $result = array(
        'label'     => __('ok','idcomcrea'),
        'items'     => $update,
        'count'     => $count+$q,
        'total'     => number_format(($woocommerce->cart->total + $price), 2, ',', ' ').'&euro;',
        'amount'    => $woocommerce->cart->total + $price
    );
        
    echo wp_send_json(json_encode($result));
    
    wp_die();
    
}

add_action('wp_ajax_nopriv_idcom_update_preview_cart', 'idcom_update_preview_cart');

add_action('wp_ajax_idcom_update_preview_cart','idcom_update_preview_cart');

/**
 * Get preview cart data
 */
function idcom_get_preview_cart(){
    
    global $wp;
    
    global $woocommerce;
    
    global $site_data;
    
    $items      = $woocommerce->cart->get_cart();
    
    $products   = array();
        
    foreach($items as $item => $values){
                        
        $_product       = wc_get_product($values['data']->get_id());
                
        $_thumbnail_id  = get_post_meta($values['data']->get_id(),'_thumbnail_id',true);
                
        $_price         = $_product->get_price();
        
        $_q             = $values['quantity'];
                
        $_thumb         = wp_get_attachment_image_src($_thumbnail_id, 'medium');
                
        $data           = array(
            'id'    => $values['data']->get_id(),
            'p'     => $_price,
            'q'     => $_q,
            't'     => $_thumb,
            'n'     => $_product->get_name(),
            'h'     => get_permalink($values['data']->get_id())
        );
        
        array_push($products,$data);
        
    }
    
    $html = idcom_create_preview_products($products,'display');
    
    return $html;
    
}

/**
 * Build preview cart data
 */
function idcom_create_preview_products($d, $type){
    
    $items = '';
    
    for($i=0; $i<count($d); $i++){
        
        $item = '<div id="product_'.$d[$i]['id'].'" class="item">
    <a href="'.$d[$i]['h'].'" class="img"><img src="'.esc_url($d[$i]['t'][0]).'" alt="'.esc_html($d[$i]['n']).'" class="imgcrop"/></a>
    <div class="data">
        <div class="prod">
            <p class="product_title_preview">'.preg_replace("/[\n\r]/", "", $d[$i]['n']).'</p>
            <p id="ppp_'.$d[$i]['id'].'" class="product_price_preview" data-price="'.$d[$i]['p'].'" data-total="'.($d[$i]['p']*$d[$i]['q']).'">'.number_format(($d[$i]['p']*$d[$i]['q']), 2, ',', ' ').'€</p>
        </div>
        <div class="handle">
            <input id="qproduct_'.$d[$i]['id'].'" class="q_product_preview q_product_preview_'.$type.'" type="number" value="'.$d[$i]['q'].'"/>
            <a id="delproduct_'.$d[$i]['id'].'" class="del_product_preview del_product_preview_'.$type.'" href="javascript:void(0);">'.__('Supprimer','idcomcrea').'</a>
        </div>
    </div>
</div>';
                
        $items .= $item;
        
    }
    
    return $items;
    
}