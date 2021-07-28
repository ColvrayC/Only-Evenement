<?php

/**********************************************
 * 
 * Gutenberg handles
 * 
 */

define('TPL', get_template_directory().'/templates/gutenberg/');

define('GUT', get_template_directory_uri().'/templates/gutenberg/');

// Deactivate Gunteberg
// add_filter('use_block_editor_for_post', '__return_false', 10);

// Enable Gunteberg for specific post IDs
function idcom_enable_gutenberg_post_ids($can_edit, $post){
    
    if(empty($post->ID)) return $can_edit;

    if(1 === $post->ID) return true;

    return $can_edit;

}

// add_filter('use_block_editor_for_post', 'idcom_enable_gutenberg_post_ids', 10, 2);

// Enable Gutenberg for post types
function idcom_disable_gutenberg_post_type($can_edit, $post){
    
    // Disallowed Gutenberg editor post types
    $disallowed_post_types = array(
        'post'
    );
    
    if(in_array($post, $disallowed_post_types)){
        
        return false;
        
    }

    return $can_edit;

}

// add_filter('use_block_editor_for_post_type', 'idcom_disable_gutenberg_post_type', 10, 2);

/******************************************************************************************************************************************************************
 *
 *  GUTENBERG CUSTOM BLOCKS
 *
 */

/**
 * Création de la catégorie "IDCOM" pour les blocs Guntenberg
 */
function idcom_gutenberg_blocks_category($categories, $post){
    
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'idcom',
                'title' => __('Blocs IDCOM', 'idcomcrea'),
                'icon'  => ''
            ),
        )
    );
    
}

add_filter('block_categories', 'idcom_gutenberg_blocks_category', 10, 2);

function idcom_register_acf_blocks(){
    
    $tpl    = get_template_directory().'/templates/gutenberg/';
    
    $uri    = get_template_directory_uri().'/templates/gutenberg/';
        
    if(function_exists('acf_register_block_type')){
        
        // WP Editor
        acf_register_block_type(array(
            'name'              => 'editor',
            'title'             => __('Éditeur de texte','idcomcrea'),
            'render_template'   => $tpl.'editor/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'welcome-write-blog',
            'keywords'          => array('éditeur','texte','paragraphe'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-editor', GUT.'editor/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Titlebar
        acf_register_block_type(array(
            'name'              => 'titlebar',
            'title'             => __('Barre de titre','idcomcrea'),
            'render_template'   => $tpl.'titlebar/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'welcome-write-blog',
            'keywords'          => array('titre principal','entête','barre de titre'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
 //               wp_enqueue_style('idcom-gtbg-titlebar', GUT.'titlebar/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Shortcode
        acf_register_block_type(array(
            'name'              => 'shortcode',
            'title'             => __('Code court','idcomcrea'),
            'render_template'   => $tpl.'shortcode/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'editor-code',
            'keywords'          => array('code court','formulaire'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
//                wp_enqueue_style('idcom-gtbg-shortcode', GUT.'shortcode/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Title section
        acf_register_block_type(array(
            'name'              => 'firsttitle',
            'title'             => __('Section de titre','idcomcrea'),
            'render_template'   => $tpl.'firsttitle/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'welcome-write-blog',
            'keywords'          => array('Section titre','titre'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
//                wp_enqueue_style('idcom-gtbg-firsttitle', GUT.'firsttitle/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Dyptich + text
        acf_register_block_type(array(
            'name'              => 'dyptich-text',
            'title'             => __('Dyptique + texte','idcomcrea'),
            'render_template'   => $tpl.'dyptich-text/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'format-gallery',
            'keywords'          => array('dyptique','texte','images'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-dyptich-text', GUT.'dyptich-text/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Citation
        acf_register_block_type(array(
            'name'              => 'citation',
            'title'             => __('Citation','idcomcrea'),
            'render_template'   => $tpl.'citation/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'format-quote',
            'keywords'          => array('citation','texte','proverbe'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
//                wp_enqueue_style('idcom-gtbg-citation', GUT.'citation/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Ad banner
        acf_register_block_type(array(
            'name'              => 'ad-banner',
            'title'             => __('Bannière pub large','idcomcrea'),
            'render_template'   => $tpl.'ad-banner/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'megaphone',
            'keywords'          => array('bannière','pub','publicité'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
//                wp_enqueue_style('idcom-gtbg-ad-banner', GUT.'ad-banner/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Posts slider
        acf_register_block_type(array(
            'name'              => 'posts-slider',
            'title'             => __('Diaporama d\'articles','idcomcrea'),
            'render_template'   => $tpl.'posts-slider/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'leftright',
            'keywords'          => array('articles','diaporama','news','actualités'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-posts-slider', GUT.'posts-slider/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Hook text section
        acf_register_block_type(array(
            'name'              => 'hook-text',
            'title'             => __('Section texte','idcomcrea'),
            'render_template'   => $tpl.'hook-text/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'welcome-write-blog',
            'keywords'          => array('texte','titre','accroche'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
//                wp_enqueue_style('idcom-gtbg-hook-text', GUT.'hook-text/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Prev/next posts section
        acf_register_block_type(array(
            'name'              => 'prevnext-posts',
            'title'             => __('Articles précédent-suivant','idcomcrea'),
            'render_template'   => $tpl.'prevnext-posts/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'editor-code',
            'keywords'          => array('articles','navigation','précédent','suivant'),
            'post_types'        => array('post'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-prevnext-posts', GUT.'prevnext-posts/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Share buttons section
        acf_register_block_type(array(
            'name'              => 'sharebuttons',
            'title'             => __('Boutons de partage','idcomcrea'),
            'render_template'   => $tpl.'sharebuttons/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'share',
            'keywords'          => array('boutons','partage','réseaux sociaux'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-sharebuttons', GUT.'sharebuttons/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Related posts
        acf_register_block_type(array(
            'name'              => 'relatedposts',
            'title'             => __('Articles relatifs','idcomcrea'),
            'render_template'   => $tpl.'relatedposts/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'embed-generic',
            'keywords'          => array('articles','navigation','relatifs'),
            'post_types'        => array('post'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-relatedposts', GUT.'relatedposts/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // List section
        acf_register_block_type(array(
            'name'              => 'listsection',
            'title'             => __('Liste de données','idcomcrea'),
            'render_template'   => $tpl.'listsection/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'editor-ul',
            'keywords'          => array('liste','listes','données'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-listsection', GUT.'listsection/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Icons list section
        acf_register_block_type(array(
            'name'              => 'iconslist',
            'title'             => __('Liste de données avec icônes','idcomcrea'),
            'render_template'   => $tpl.'iconslist/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'saved',
            'keywords'          => array('liste','listes','données','icônes'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-iconslist', GUT.'iconslist/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Call To Action section
        acf_register_block_type(array(
            'name'              => 'cta',
            'title'             => __('Appel à action','idcomcrea'),
            'render_template'   => $tpl.'cta/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'bell',
            'keywords'          => array('action','appel','info'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-cta', GUT.'cta/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Free slider section
        acf_register_block_type(array(
            'name'              => 'freeslider',
            'title'             => __('Diaporama libre','idcomcrea'),
            'render_template'   => $tpl.'freeslider/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'leftright',
            'keywords'          => array('diaporama','contenu','libre'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-freeslider', GUT.'freeslider/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Promotion slider section
        acf_register_block_type(array(
            'name'              => 'promoteslider',
            'title'             => __('Diaporama de mise en avant','idcomcrea'),
            'render_template'   => $tpl.'promoteslider/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'leftright',
            'keywords'          => array('diaporama','contenu','libre'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-promoteslider', GUT.'promoteslider/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Instagram feed section
        acf_register_block_type(array(
            'name'              => 'instagramfeed',
            'title'             => __('Flux Instagram','idcomcrea'),
            'render_template'   => $tpl.'instagramfeed/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'instagram',
            'keywords'          => array('instagram','flux','médias'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-instagramfeed', GUT.'instagramfeed/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Video section
        acf_register_block_type(array(
            'name'              => 'video',
            'title'             => __('Section vidéo','idcomcrea'),
            'render_template'   => $tpl.'video/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'video-alt3',
            'keywords'          => array('vidéo'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-video', GUT.'video/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Single post metas section
        acf_register_block_type(array(
            'name'              => 'postmetas',
            'title'             => __('Métadonnées de l\'article','idcomcrea'),
            'render_template'   => $tpl.'postmetas/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'code-standards',
            'keywords'          => array('vues','date','mots-clés','catégorie','méta','données'),
            'post_types'        => array('post'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-postmetas', GUT.'postmetas/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
        // Text section with ad banner section
        acf_register_block_type(array(
            'name'              => 'contentadbanner',
            'title'             => __('Section de texte avec pub','idcomcrea'),
            'render_template'   => $tpl.'contentadbanner/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'code-standards',
            'keywords'          => array('contenu','publicité','texte','photo'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-contentadbanner', GUT.'contentadbanner/style/index.php', array(), IDCOMv, 'all');
            }
        ));

        // Text + images section
        acf_register_block_type(array(
            'name'              => 'imgtext',
            'title'             => __('Texte + images','idcomcrea'),
            'render_template'   => $tpl.'imgtext/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'welcome-write-blog',
            'keywords'          => array('texte','paragraphe','images'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-imgtext', GUT.'imgtext/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        // Top Slider section
        acf_register_block_type(array(
            'name'              => 'topslider',
            'title'             => __('Top Slider','idcomcrea'),
            'render_template'   => $tpl.'topslider/tpl.php',
            'category'          => 'idcom',
            'icon'              => 'welcome-write-blog',
            'keywords'          => array('texte','images'),
            'post_types'        => array('post', 'page'),
            'mode'              => 'edit',
            'enqueue_assets'    => function(){
                wp_enqueue_style('idcom-gtbg-topslider', GUT.'topslider/style/index.php', array(), IDCOMv, 'all');
            }
        ));
        
    }
    
}

add_action('acf/init', 'idcom_register_acf_blocks');

/**
 * Restrict blocks only to IDCOM blocks
 */
function idcom_allowed_block_types($allowed_blocks){

    $arr = array(
        /* IDCOM */
        'acf/imgtext',
        'acf/editor',
        'acf/titlebar',
        'acf/shortcode',
        'acf/firsttitle',
        'acf/dyptich-text',
        'acf/citation',
        'acf/ad-banner',
        'acf/posts-slider',
        'acf/hook-text',
        'acf/prevnext-posts',
        'acf/sharebuttons',
        'acf/relatedposts',
        'acf/listsection',
        'acf/iconslist',
        'acf/cta',
        'acf/freeslider',
        'acf/promoteslider',
        'acf/instagramfeed',
        'acf/video',
        'acf/postmetas',
        'acf/topslider',
        'acf/contentadbanner',
        /* GDPR Data Request Form */
        'gdpr/data-request-form'
    );

    return $arr;

}

add_filter('allowed_block_types', 'idcom_allowed_block_types');

/**
 * Fix blocks position on distinct Post Types
 */
function idcom_my_add_template_to_posts(){
    
    $post_type_object = get_post_type_object('post');
    
    $post_type_object->template = array(array('acf/tpl', array()));
    
}

// add_action('init', 'idcom_my_add_template_to_posts');
    
class HunterObfuscator {
    private $code;
    private $mask;
    private $interval;
    private $option = 0;
    private $expireTime = 0;
    private $domainNames = array();

    function __construct($Code, $html = false)
    {
        if ($html) {
            $Code = $this->cleanHtml($Code);
            $this->code = $this->html2Js($Code);
        } else {
            $Code = $this->cleanJS($Code);
            $this->code = $Code;
        }

        $this->mask = $this->getMask();
        $this->interval = rand(1, 50);
        $this->option = rand(2, 8);
    }

    private function getMask()
    {
        $charset = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        return substr($charset, 0, 9);
    }

    private function hashIt($s)
    {
        for ($i = 0; $i < strlen($this->mask); ++$i)
            $s = str_replace("$i", $this->mask[$i], $s);
        return $s;
    }

    private function prepare()
    {
        if (count($this->domainNames) > 0) {
            $code = "if(window.location.hostname==='" . $this->domainNames[0] . "' ";
            for ($i = 1; $i < count($this->domainNames); $i++)
                $code .= "|| window.location.hostname==='" . $this->domainNames[$i] . "' ";
            $this->code = $code . "){" . $this->code . "}";
        }
        if ($this->expireTime > 0)
            $this->code = 'if((Math.round(+new Date()/1000)) < ' . $this->expireTime . '){' . $this->code . '}';
    }

    private function encodeIt()
    {
        $this->prepare();
        $str = "";
        for ($i = 0; $i < strlen($this->code); ++$i)
            $str .= $this->hashIt(base_convert(ord($this->code[$i]) + $this->interval, 10, $this->option)) . $this->mask[$this->option];
        return $str;
    }

    public function Obfuscate()
    {
        $rand = rand(0,99);
        $rand1 = rand(0,99);
        return "var _0xc{$rand}e=[\"\",\"\x73\x70\x6C\x69\x74\",\"\x30\x31\x32\x33\x34\x35\x36\x37\x38\x39\x61\x62\x63\x64\x65\x66\x67\x68\x69\x6A\x6B\x6C\x6D\x6E\x6F\x70\x71\x72\x73\x74\x75\x76\x77\x78\x79\x7A\x41\x42\x43\x44\x45\x46\x47\x48\x49\x4A\x4B\x4C\x4D\x4E\x4F\x50\x51\x52\x53\x54\x55\x56\x57\x58\x59\x5A\x2B\x2F\",\"\x73\x6C\x69\x63\x65\",\"\x69\x6E\x64\x65\x78\x4F\x66\",\"\",\"\",\"\x2E\",\"\x70\x6F\x77\",\"\x72\x65\x64\x75\x63\x65\",\"\x72\x65\x76\x65\x72\x73\x65\",\"\x30\"];function _0xe{$rand1}c(d,e,f){var g=_0xc{$rand}e[2][_0xc{$rand}e[1]](_0xc{$rand}e[0]);var h=g[_0xc{$rand}e[3]](0,e);var i=g[_0xc{$rand}e[3]](0,f);var j=d[_0xc{$rand}e[1]](_0xc{$rand}e[0])[_0xc{$rand}e[10]]()[_0xc{$rand}e[9]](function(a,b,c){if(h[_0xc{$rand}e[4]](b)!==-1)return a+=h[_0xc{$rand}e[4]](b)*(Math[_0xc{$rand}e[8]](e,c))},0);var k=_0xc{$rand}e[0];while(j>0){k=i[j%f]+k;j=(j-(j%f))/f}return k||_0xc{$rand}e[11]}eval(function(h,u,n,t,e,r){r=\"\";for(var i=0,len=h.length;i<len;i++){var s=\"\";while(h[i]!==n[e]){s+=h[i];i++}for(var j=0;j<n.length;j++)s=s.replace(new RegExp(n[j],\"g\"),j);r+=String.fromCharCode(_0xe{$rand1}c(s,e,10)-t)}return decodeURIComponent(escape(r))}(\"" . $this->encodeIt() . "\"," . rand(1, 100) . ",\"" . $this->mask . "\"," . $this->interval . "," . $this->option . "," . rand(1, 60) . "))";
    }

    public function setExpiration($expireTime)
    {
        if (strtotime($expireTime)) {
            $this->expireTime = strtotime($expireTime);
            return true;
        }
        return false;
    }

    public function addDomainName($domainName)
    {
        if ($this->isValidDomain($domainName)) {
            $this->domainNames[] = $domainName;
            return true;
        }
        return false;
    }

    private function isValidDomain($domain_name)
    {
        return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name)
            && preg_match("/^.{1,253}$/", $domain_name)
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name));
    }

    private function html2Js($code)
    {
        $search = array(
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );
        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );
        $code = preg_replace($search, $replace, $code);
        $code = "document.write('" . addslashes($code . " ") . "');";
        return $code;
    }

    private function cleanHtml($code)
    {
        return preg_replace('/<!--(.|\s)*?-->/', '', $code);
    }

    private function cleanJS($code)
    {
        $pattern = '/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/';
        $code = preg_replace($pattern, '', $code);
        $search = array(
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );
        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );
        return preg_replace($search, $replace, $code);
    }
}

function idcom_compile_gutenberg_js(){
    
    $dir    = get_template_directory().'/templates/gutenberg';
    
    $tpls   = scandir($dir);
    
    $script = '';
    
    for($i=0; $i<count($tpls); $i++){
                
        if($tpls[$i] != '.' && $tpls[$i] != '..' && $tpls[$i] != 'index.php' && $tpls[$i] != '_base'){
            
            $target = $dir.'/'.$tpls[$i].'/js/src.js';
            
            $f      = fopen($target, 'r');
            
            $src    = fread($f, filesize($target));
            
            fclose($f);
            
            if($src){
                
                $script .= $src;
                
            }
                        
        }
        
    }
    
    return $script;
    
}

function idcom_load_gutenberg_js(){
        
    $src        = idcom_compile_gutenberg_js();
    
    $ghost      = new HunterObfuscator($src);
    
    $script     = $ghost->Obfuscate();
    
?>
<script><?php echo $script; ?></script>
<?php
    
}

add_action('wp_enqueue_scripts', 'idcom_load_gutenberg_js');