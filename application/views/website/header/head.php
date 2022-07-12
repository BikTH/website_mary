<?php
    
    $currentLang = ( array_key_exists("lang", $_SESSION) && $_SESSION['lang'] ) ? $_SESSION['lang'] : $self->defaultLanguage;
        
    $title = isset($meta) && is_array($meta) ? $meta["title"] : "";
    $description = isset($meta) && is_array($meta) ? $meta["description"] : "";
    $imageSEO = isset($meta) && is_array($meta) ? $meta["image"] : false;
?>
<!DOCTYPE html>
<html translate="no" lang="<?=$currentLang;?>">
<head>
    <meta name="google" content="notranslate">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content= "width=device-width, initial-scale=1.0" />
    
    <link rel="icon" type="image/png" href="/public/favicon.png" />

    <title><?=$title;?> — OXT template</title>
    <meta name="title" content="<?=$title;?>">
    <meta name="description" content="<?=$description;?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?=base_url();?>" />
    <meta property="og:title" content="<?=$title;?>">
    <meta property="og:description" content="<?=$description;?>" />
    
    <?php if( $imageSEO ): ?>
    <meta property="og:image" content="<?=assets("img/seo/" . $imageSEO);?>" />
    <meta property="twitter:image" content="<?=assets("img/seo/" . $imageSEO);?>" />
    <?php endif; ?>
    
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?=base_url();?>">
    <meta property="twitter:title" content="<?=$title;?>">
    <meta property="twitter:description" content="<?=$description;?>">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
    
    <meta name="theme-color" content="#ce2835" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#ce2835" media="(prefers-color-scheme: dark)">
    <meta name="color-scheme" content="light dark">

    <meta name="google-site-verification" content="1Krzxf5iAyxuP85Cg-UsyxSnniM3a_Z8mRKYMrZ8LWY" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <link rel="stylesheet" href="<?=assets("css/app/core.css")."?".time();?>" />
    <link rel="stylesheet" href="<?=assets("css/app/website.css")."?".time();?>" />
    
    <link rel="stylesheet" href="/public/assets/css/confirm.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <meta name="keywords" content="OPENXTECH, Oxt, Open x tech, Open and extensible techonologies, tech company, software company, openxtech sarl, openxtech ltd, company in cameroon" />
    <meta name="author" content="Openxtech Ltd" />
    <script type='application/ld+json'>
    {
      "@context": "http://www.schema.org",
      "@type": "ProfessionalService",
      "name": "OPENXTECH",
      "url": "https://www.openxtech.com",
      "sameAs": [
        "https://www.facebook.com/openxtech",
        "https://www.instagram.com/openxtech",
        "https://www.twitter.com/openxtech",
        "https://www.linkedin.com/company/openxtech"
      ],
      "logo": "https://www.openxtech.com/public/logo.png",
      "image": "https://www.openxtech.com/public/assets/img/seo/seo-main.jpg",
      "priceRange": "$$$$",
      "description": "We are a technology and marketing company based in Cameroon. Our main mission is to bring intelligent, flexible and innovative solutions to the needs of our customers and the general public, to bring Africa and technology closer.",
      "address": {
         "@type": "PostalAddress",
         "streetAddress": "Montée Madison, Essos",
         "addressLocality": "Yaounde",
         "addressRegion": "CENTRE",
         "postalCode": "00000",
         "addressCountry": "CAMEROON"
      },
      "geo": {
         "@type": "GeoCoordinates",
         "latitude": "3.8682570946242163",
         "longitude": "11.547789531957653"
      },
      "hasMap": "https://goo.gl/maps/uoiLQoTMW9pT4FAo6",
       "openingHours": "Mo 08:00-17:00 Tu 08:00-17:00 We 08:00-17:00 Th 08:00-17:00 Fr 08:00-17:00 Sa 08:00-15:00",
      "telephone": "+237 672915393"
    }
    </script>
</head>
<body>
    <div class="preloader_"><span class="isloading-wrapper" style="top: 223.5px;"><div class="centered">   <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>    </div></span></div>
    <script type="text/javascript">
        $(window).on("load resize", function(){ var w__ = parseInt( $(this).outerWidth(), 10);if( w__ < 768){ window.isMobile = true; } else { window.isMobile = false; }});
        $(document).ready(function(){setTimeout(function () {$(".preloader_").fadeOut(100); $("body").css("overflow", "auto");}, 1000);});
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RW85KJH1SJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date()); gtag('config', 'G-RW85KJH1SJ');
    </script>