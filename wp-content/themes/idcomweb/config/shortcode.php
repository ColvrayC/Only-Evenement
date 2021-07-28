<?php

/* Shortcodes */
global $site_data;

/**
 * Mentions légales
 */
add_shortcode("mentions_legales",function(){
    
    global $wp;
    
    $proprietaire       = get_option('proprietaire');
    $siret              = get_option('siret');
    $adresse            = get_option('adresse');
    $codepostal         = get_option('cp');
    $ville              = stripslashes(get_option('ville'));
    $responsable        = get_option('nom_prenom_responsable_publi');
    $email_responsable  = get_option('email_responsable_publi');
    
    $before = array(
        'XXXXPROPXXXX',
        'XXXXSIRETXXXX',
        'XXXXADRESSE_POSTALEXXXX',
        'XXXXNOM_RESPON_PUBLIXXXX',
        'XXXXEMAIL_RESPON_PUBLIXXXX',
        '<p>',
        '(',
        ')'
    );
    
    $after  = array(
        $proprietaire,
        $siret,
        $adresse.', '.$codepostal.' '.$ville,
        $responsable,
        '<a href="mailto:"'.$email_responsable.'">'.$email_responsable.'</a>',
        '<p class="text-justify">',
        '<em>(',
        ')</em>'
    );
    
    $legal = '<h2>Informations légales</h2>
<h3>1. Présentation du site.</h3>
<p>En vertu de l\'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l\'économie numérique, il est précisé aux utilisateurs du site <a href="'.site_url().'">'.site_url().'</a> l\'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :</p> <p><strong>Propriétaire</strong> : XXXXPROPXXXX – SIRET N°XXXXSIRETXXXX – XXXXADRESSE_POSTALEXXXX<br /> <strong>Créateur</strong>  : <a href="https://www.groupe-idcom.fr/" target="_blank" rel="noopener">IDCOMCREA</a><br /> <strong>Responsable publication</strong> : XXXXNOM_RESPON_PUBLIXXXX – XXXXEMAIL_RESPON_PUBLIXXXX<br /> Le responsable publication est une personne physique ou une personne morale.<br /> <strong>Webmaster</strong> : IDCOMCREA – <a href="mailto:web@idcomcrea.fr">web@idcomcrea.fr</a><br /> <strong>Hébergeur</strong> : OVH SAS – 2 rue Kellermann 59100 Roubaix, France<br /> Crédits : ©Fotolia<br /> Le modèle de mentions légales est offert par Subdelirium.com : <a target="_blank" href="https://www.subdelirium.com/generateur-de-mentions-legales" alt="Générateur de mentions légales" rel="noopener">Générateur de mentions légales</a>.</p>

<h3>2. Conditions générales d\'utilisation du site et des services proposés.</h3> <p>L\'utilisation du site <a href="'.site_url().'">"'.site_url().'"</a> implique l\'acceptation pleine et entière des conditions générales d\'utilisation ci-après décrites. Ces conditions d\'utilisation sont susceptibles d\'être modifiées ou complétées à tout moment, les utilisateurs du site <a href="'.site_url().'">'.site_url().'</a> sont donc invités à les consulter de manière régulière.</p> <p>Ce site est normalement accessible à tout moment aux utilisateurs. Une interruption pour raison de maintenance technique peut être toutefois décidée par XXXXPROPXXXX, qui s\'efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l\'intervention.</p> <p>Le site <a href="'.site_url().'">'.site_url().'</a> est mis à jour régulièrement par XXXXNOM_RESPON_PUBLIXXXX. De la même façon, les mentions légales peuvent être modifiées à tout moment : elles s\'imposent néanmoins à l\'utilisateur qui est invité à s\'y référer le plus souvent possible afin d\'en prendre connaissance.</p> <h3>3. Description des services fournis.</h3> <p>Le site <a href="'.site_url().'">'.site_url().'</a> a pour objet de fournir une information concernant l\'ensemble des activités de la société.</p> <p>XXXXPROPXXXX s\'efforce de fournir sur le site <a href="'.site_url().'">'.site_url().'</a> des informations aussi précises que possible. Toutefois, il ne pourra être tenue responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu\'elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.</p> <p>Tous les informations indiquées sur le site <a href="'.site_url().'">'.site_url().'</a> sont données à titre indicatif, et sont susceptibles d\'évoluer. Par ailleurs, les renseignements figurant sur le site <a href="'.site_url().'">'.site_url().'</a> ne sont pas exhaustifs. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne.</p> <h3>4. Limitations contractuelles sur les données techniques.</h3> <p>Le site utilise la technologie JavaScript.</p> <p>Le site Internet ne pourra être tenu responsable de dommages matériels liés à l\'utilisation du site. De plus, l\'utilisateur du site s\'engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour</p> <h3>5. Propriété intellectuelle et contrefaçons.</h3> <p>XXXXPROPXXXX est propriétaire des droits de propriété intellectuelle ou détient les droits d\'usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels.</p> <p>Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de : XXXXPROPXXXX.</p> <p>Toute exploitation non autorisée du site ou de l\'un quelconque des éléments qu\'il contient sera considérée comme constitutive d\'une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p> <h3>6. Limitations de responsabilité.</h3> <p>XXXXPROPXXXX ne pourra être tenue responsable des dommages directs et indirects causés au matériel de l\'utilisateur, lors de l\'accès au site "'.site_url().'", et résultant soit de l\'utilisation d\'un matériel ne répondant pas aux spécifications indiquées au point 4, soit de l\'apparition d\'un bug ou d\'une incompatibilité.</p> <p>XXXXPROPXXXX ne pourra également être tenue responsable des dommages indirects (tels par exemple qu\'une perte de marché ou perte d\'une chance) consécutifs à l\'utilisation du site <a href="'.site_url().'">'.site_url().'</a>.</p>
<p>Des espaces interactifs (possibilité de poser des questions dans l\'espace contact) sont à la disposition des utilisateurs. XXXXPROPXXXX se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le cas échéant, XXXXPROPXXXX se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l\'utilisateur, notamment en cas de message à caractère raciste, injurieux, diffamant, ou pornographique, quel que soit le support utilisé (texte, photographie…).</p> <h3>7. Gestion des données personnelles.</h3> <p>En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l\'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.</p> <p>A l\'occasion de l\'utilisation du site <a href="'.site_url().'">'.site_url().'</a>, peuvent êtres recueillies : l\'URL des liens par l\'intermédiaire desquels l\'utilisateur a accédé au site <a href="'.site_url().'">'.site_url().'</a>, le fournisseur d\'accès de l\'utilisateur, l\'adresse de protocole Internet (IP) de l\'utilisateur.</p> <p> En tout état de cause XXXXPROPXXXX ne collecte des informations personnelles relatives à l\'utilisateur que pour le besoin de certains services proposés par le site <a href="'.site_url().'">'.site_url().'</a>. L\'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu\'il procède par lui-même à leur saisie. Il est alors précisé à l\'utilisateur du site <a href="'.site_url().'">'.site_url().'</a> l\'obligation ou non de fournir ces informations.</p> <p>Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l\'informatique, aux fichiers et aux libertés, tout utilisateur dispose d\'un droit d\'accès, de rectification et d\'opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, accompagnée d\'une copie du titre d\'identité avec signature du titulaire de la pièce, en précisant l\'adresse à laquelle la réponse doit être envoyée.</p> <p>Aucune information personnelle de l\'utilisateur du site <a href="'.site_url().'">'.site_url().'</a> n\'est publiée à l\'insu de l\'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l\'hypothèse du rachat de XXXXPROPXXXX et de ses droits permettrait la transmission des dites informations à l\'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et de modification des données vis-à-vis de l\'utilisateur du site <a href="'.site_url().'">'.site_url().'</a>.</p>
<p>Le site n\'est pas déclaré à la CNIL car il ne recueille pas d\'informations personnelles. .</p> <p>Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p> <h3>8. Liens hypertextes et cookies.</h3> <p>Le site <a href="'.site_url().'">'.site_url().'</a> contient un certain nombre de liens hypertextes vers d\'autres sites, mis en place avec l\'autorisation de XXXXPROPXXXX. Cependant, XXXXPROPXXXX n\'a pas la possibilité de vérifier le contenu des sites ainsi visités, et n\'assumera en conséquence aucune responsabilité de ce fait.</p> <p>La navigation sur le site <a href="'.site_url().'">'.site_url().'</a> est susceptible de provoquer l\'installation de cookie(s) sur l\'ordinateur de l\'utilisateur. Un cookie est un fichier de petite taille, qui ne permet pas l\'identification de l\'utilisateur, mais qui enregistre des informations relatives à la navigation d\'un ordinateur sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.</p> <p>Le refus d\'installation d\'un cookie peut entraîner l\'impossibilité d\'accéder à certains services. L\'utilisateur peut toutefois configurer son ordinateur de la manière suivante, pour refuser l\'installation des cookies :</p> <p>Sous Internet Explorer : onglet outil (pictogramme en forme de rouage en haut à droite) / options internet. Cliquez sur Confidentialité et choisissez Bloquer tous les cookies. Validez sur Ok.</p> <p>Sous Firefox : en haut de la fenêtre du navigateur, cliquez sur le bouton Firefox, puis aller dans l\'onglet Options. Cliquer sur l\'onglet Vie privée.
Paramétrez les Règles de conservation sur :  utiliser les paramètres personnalisés pour l\'historique. Enfin décochez-la pour  désactiver les cookies.</p> <p>Sous Safari : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par un rouage). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur Paramètres de contenu. Dans la section "Cookies", vous pouvez bloquer les cookies.</p> <p>Sous Chrome : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par trois lignes horizontales). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur préférences.  Dans l\'onglet "Confidentialité", vous pouvez bloquer les cookies.</p>

<h3>9. Droit applicable et attribution de juridiction.</h3> <p>Tout litige en relation avec l\'utilisation du site <a href="'.site_url().'">'.site_url().'</a> est soumis au droit français. Il est fait attribution exclusive de juridiction aux tribunaux compétents de Paris.</p> <h3>10. Les principales lois concernées.</h3> <p>Loi n° 78-17 du 6 janvier 1978, notamment modifiée par la loi n° 2004-801 du 6 août 2004 relative à l\'informatique, aux fichiers et aux libertés.</p> <p> Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l\'économie numérique.</p> <h3>11. Lexique.</h3> <p>Utilisateur : Internaute se connectant, utilisant le site susnommé.</p> <p>Informations personnelles : « les informations qui permettent, sous quelque forme que ce soit, directement ou non, l\'identification des personnes physiques auxquelles elles s\'appliquent » (article 4 de la loi n° 78-17 du 6 janvier 1978).</p>';
    
    $content = str_replace($before,$after,$legal);
    
    ob_start();
    echo $content;
    return ob_get_clean();
    
});

add_shortcode("infos_client","infos_client");

function infos_client(){
    
    return str_replace("\\","",'<div id="infos_client">
        <ul class="fa-ul">
            <li><a href="tel:'.str_replace(array(" ","(0)"),"",get_option("tel")).'"><i class="fa-li fa fa-phone"></i> '.get_option("tel").'</a></li>
            <li><i class="fa-li fa fa-map-marker"></i> '.get_option("adresse").'</li>
            <li>'.get_option("cp").'&nbsp;'.get_option("ville").'</li>
        </ul>
    </div>');

}

/**
 * Shortcode page Confidentialité
 */
function idcom_privacy_policy($atts){
    
    global $wp;
    
    global $wpdb;
    
    $privacy = '<h2>Qui sommes-nous ?</h2>
<p class="text-justify">L\'adresse de notre site Web est : <a href="'.home_url('/').'">'.site_url().'</a>.</p>
<h2>Utilisation des données personnelles collectées</h2>
<h3>Commentaires</h3>
<p class="text-justify">Quand vous laissez un commentaire sur notre site web, les données inscrites dans le formulaire de commentaire, mais aussi votre adresse IP et l\'agent utilisateur de votre navigateur sont collectés pour nous aider à la détection des commentaires indésirables.</p>
<p class="text-justify">Une chaîne anonymisée créée à partir de votre adresse de messagerie <em>(également appelée hash)</em> peut être envoyée au service Gravatar pour vérifier si vous utilisez ce dernier. Les clauses de confidentialité du service Gravatar sont disponibles ici : <a href="https://automattic.com/privacy/" target="_blank" rel="noopener">https://automattic.com/privacy/</a>. Après validation de votre commentaire, votre photo de profil sera visible publiquement à coté de votre commentaire.</p>
<h3>Médias</h3>
<p class="text-justify">Si vous êtes un utilisateur ou une utilisatrice enregistré·e et que vous téléversez des images sur le site web, nous vous conseillons d\'éviter de téléverser des images contenant des données EXIF de coordonnées GPS. Les visiteurs de votre site web peuvent télécharger et extraire des données de localisation depuis ces images.</p>
<h3>Formulaires de contact</h3>
<p class="text-justify">Le formulaire de contact, ainsi que tous les autres formulaires ou téléservices limitent la collecte des données personnelles au strict nécessaire et indiquent clairement :</p>
<ul>
    <li>l\'objectif du recueil de ces données <em>(finalité)</em> ;</li>
    <li>si ces données sont obligatoires ou facultatives pour la gestion de votre demande ;</li>
    <li>qui pourra en prendre connaissance <em>(uniquement notre société en principe, sauf précision contraire dans le formulaire de saisie lorsqu\'une transmission à un tiers est strictement nécessaire pour la gestion de votre demande)</em> ;</li>
    <li>vos droits « Informatique et Libertés » <em>(droits d\'accès, d\'opposition et de rectification)</em> et la façon de les exercer auprès de notre société.</li>
    <li>par courrier signé accompagné de la copie d\'un titre d\'identité à l\'adresse de la société.</li>
</ul>
<p class="text-justify">Les données personnelles recueillies dans le cadre des services proposés sur le site Web <a href="'.home_url('/').'">'.get_bloginfo('name').'</a> sont transmises et conservées selon des protocoles sécurisés ; elles ne sont pas conservées au-delà de la durée nécessaire.</p>
<p class="text-justify">Pour toute information à ce sujet ou exercice de vos droits Informatique et Libertés, vous pouvez contacter son Délégué à la Protection des Données <em>(DPO)</em>.</p>
<h3>Cookies</h3>
<p class="text-justify">Si vous déposez un commentaire sur notre site, il vous sera proposé d\'enregistrer votre nom, adresse de messagerie et site web dans des cookies. C\'est uniquement pour votre confort afin de ne pas avoir à saisir ces informations si vous déposez un autre commentaire plus tard. Ces cookies expirent au bout d\'un an.</p>
<p class="text-justify">Si vous vous rendez sur la page de connexion, un cookie temporaire sera créé afin de déterminer si votre navigateur accepte les cookies. Il ne contient pas de données personnelles et sera supprimé automatiquement à la fermeture de votre navigateur.</p>
<p class="text-justify">Lorsque vous vous connecterez, nous mettrons en place un certain nombre de cookies pour enregistrer vos informations de connexion et vos préférences d\'écran. La durée de vie d\'un cookie de connexion est de deux jours, celle d\'un cookie d\'option d\'écran est d\'un an. Si vous cochez « Se souvenir de moi », votre cookie de connexion sera conservé pendant deux semaines. Si vous vous déconnectez de votre compte, le cookie de connexion sera effacé.</p>
<p class="text-justify">En modifiant ou en publiant une publication, un cookie supplémentaire sera enregistré dans votre navigateur. Ce cookie ne comprend aucune donnée personnelle. Il indique simplement l\'ID de la publication que vous venez de modifier. Il expire au bout d\'un jour.</p>
<h3>Contenu embarqué depuis d\'autres sites</h3>
<p class="text-justify">Les articles de ce site peuvent inclure des contenus intégrés <em>(par exemple des vidéos, images, articles…)</em>. Le contenu intégré depuis d\'autres sites se comporte de la même manière que si le visiteur se rendait sur cet autre site.</p>
<p class="text-justify">Ces sites web pourraient collecter des données sur vous, utiliser des cookies, embarquer des outils de suivis tiers, suivre vos interactions avec ces contenus embarqués si vous disposez d\'un compte connecté sur leur site web.</p>
<h3>Statistiques et mesures d\'audience</h3>
<p class="text-justify">En vue d\'adapter le site aux demandes de ses visiteurs, nous mesurons le nombre de visites, le nombre de pages vues ainsi que l\'activité des visiteurs sur le site et leur fréquence de retour.</p>
<p class="text-justify">Nous collectons également votre adresse IP, afin de déterminer la ville depuis laquelle vous vous connectez. Celle-ci est immédiatement anonymisée après utilisation. Notre société ne peut donc en aucun cas remonter par ce biais à une personne physique.</p>
<p class="text-justify">Les données personnelles recueillies par le biais du cookie sont conservées par notre société pour une durée de 13 mois maximum. Elles ne sont pas cédées à des tiers ni utilisées à d\'autres fins.</p>
<h2>Utilisation et transmission de vos données personnelles</h2>
<h2>Durées de stockage de vos données</h2>
<p class="text-justify">Si vous laissez un commentaire, le commentaire et ses métadonnées sont conservés indéfiniment. Cela permet de reconnaître et approuver automatiquement les commentaires suivants au lieu de les laisser dans la file de modération.</p>
<p class="text-justify">Pour les utilisateurs et utilisatrices qui s\'enregistrent sur notre site <em>(si cela est possible)</em>, nous stockons également les données personnelles indiquées dans leur profil. Tous les utilisateurs et utilisatrices peuvent voir, modifier ou supprimer leurs informations personnelles à tout moment <em>(à l\'exception de leur nom d\'utilisateur·ice)</em>. Les gestionnaires du site peuvent aussi voir et modifier ces informations.</p>
<h2>Les droits que vous avez sur vos données</h2>
<p class="text-justify">Si vous avez un compte ou si vous avez laissé des commentaires sur le site, vous pouvez demander à recevoir un fichier contenant toutes les données personnelles que nous possédons à votre sujet, incluant celles que vous nous avez fournies. Vous pouvez également demander la suppression des données personnelles vous concernant. Cela ne prend pas en compte les données stockées à des fins administratives, légales ou pour des raisons de sécurité.</p>
<h2>Transmission de vos données personnelles</h2>
<p class="text-justify">Les commentaires des visiteurs peuvent être vérifiés à l\'aide d\'un service automatisé de détection des commentaires indésirables.</p>
<h2>Informations de contact</h2>
<p class="text-justify">
<strong>'.get_bloginfo('name').'</strong><br/>
'.get_option('adresse').',<br/>
'.get_option('cp').' '.get_option('ville').'<br/>
<a href="mailto:'.get_option('email').'">'.get_option('email').'</a>
</p>
';
    
    ob_start();
    echo $privacy;
    return ob_get_clean();
    
}

add_shortcode('idcom_confidentialite', 'idcom_privacy_policy');

/**
 * Shortcode obtention de l'adresse (pour la page des CGUV)
 */
function idcom_get_client_address($atts){
    
    $adresse            = get_option('adresse');
    $codepostal         = get_option('cp');
    $ville              = stripslashes(get_option('ville'));
    
    $result             = $adresse.', '.$ville.', '.$codepostal;
    
    ob_start();
    echo $result;
    return ob_get_clean();
    
}

add_shortcode('idcom_client_adresse', 'idcom_get_client_address');

/**
 * Shortcode obtention de l'adresse email (pour la page des CGUV)
 */
function idcom_get_client_email($atts){
    
    $email  = get_option('email_responsable_publi');
    
    $result = '<a href="mailto:'.$email.'">'.$email.'</a>';
    
    ob_start();
    echo $result;
    return ob_get_clean();
    
}

add_shortcode('idcom_client_email', 'idcom_get_client_email');

/**
 * Shortcode obtention du nom de l'entreprise (pour la page des CGUV)
 */
function idcom_get_client_enterprise($atts){
    
    $result  = get_option('entreprise');
        
    ob_start();
    echo $result;
    return ob_get_clean();
    
}

add_shortcode('idcom_entreprise', 'idcom_get_client_enterprise');