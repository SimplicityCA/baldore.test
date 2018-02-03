<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Baldore') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" media="all" href="js/vendor/essential-grid/public/assets/css/settings.css">
    <link rel="stylesheet" type="text/css" media="all" href="js/vendor/essential-grid/public/assets/css/lightbox.css">
    <link rel="stylesheet" type="text/css" media="all" href="js/vendor/revslider/public/assets/css/settings.css">
    <style id="rs-plugin-settings-inline-css" type="text/css"></style>


    
    
    
    <link rel="stylesheet" type="text/css" media="all" href="css/fontello/css/fontello.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/core.animation.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/theme.shortcodes.css" />
    
    <link rel="stylesheet" type="text/css" media="all" href="css/skin.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/responsive.css" />
</head>
<body class="page body_filled article_style_stretch scheme_original top_panel_above sidebar_hide">
    <div id="app" class="body_wrap header_style_8">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <header class="top_panel_wrap top_panel_style_8 scheme_original header_posts">
                <div class="top_panel_wrap_inner top_panel_inner_style_8 top_panel_position_over">
                    <div class="top_panel_middle" >
                        <div class="content_wrap">
                            <div class="contact_info">
                                <address class="contact_address icon-location">
                                    Patate, Tunguragua<br>Ecuador
                                </address>
                            </div>
                            <div class="contact_logo">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="images/logo.png" class="logo_main" alt="" >
                                    <img src="images/logo.png" class="logo_fixed" alt="" ></a>
                                </div>
                            </div>
                            <div class="menu_pushy_wrap clearfix">
                                <a href="#" class="menu_pushy_button">
                                    MENU
                                    <span class=" icon-menu"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <nav class="menu_pushy_nav_area pushy pushy-left scheme_dark">
              <div class="pushy_inner">
                <a href="#" class="close-pushy"></a>
                <div class="logo">
                  <a href="index.html">
                    <img src="images/logo.png" class="logo_side" alt="" width="132" height="54">
                  </a>
                </div>
                <ul id="menu_pushy" class="menu_pushy_nav">
                  <li class="menu-item">
                    <a href="#">Home</a>
                  </li>
                  <li class="menu-item">
                    <a href="#">Empresa</a>
                  </li>
                  <li class="menu-item menu-item-has-children ">
                    <a href="#">Productos</a>
                    <ul class="sub-menu">
                      <li class="menu-item menu-item-object-page ">
                        <a href="about-us-about-us.html">About us</a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item">
                    <a href="#">Noticias</a>
                  </li>
                  <li class="menu-item menu-item-object-page ">
                    <a href="menu.html">Promociones</a>
                  </li>
                  <li class="menu-item menu-item-object-page ">
                    <a href="contacts.html">Contáctenos</a>
                  </li>
                </ul>
              </div>
            </nav>
            <div class="site-overlay"></div>
            <div class="header_mobile">
              <div class="content_wrap">
                <div class="menu_button icon-menu"></div>
                <div class="logo">
                  <a href="index.html">
                    <img src="images/logo.png" class="logo_main" alt="" width="132" height="54">
                  </a>
                </div>
              </div>
              <div class="side_wrap">
                <div class="close">Close</div>
                <div class="panel_top">
                  <nav class="menu_main_nav_area">
                    <ul id="menu_main" class="menu_main_nav">
                      <li class="menu-item">
                        <a href="#">Home</a>
                      </li>
                      <li class="menu-item">
                        <a href="#">Empresa</a>
                      </li>
                      <li class="menu-item menu-item-has-children ">
                        <a href="#">Productos</a>
                        <ul class="sub-menu">
                          <li class="menu-item menu-item-object-page ">
                            <a href="about-us-about-us.html">About us</a>
                          </li>
                        </ul>
                      </li>
                      <li class="menu-item">
                        <a href="#">Noticias</a>
                      </li>
                      <li class="menu-item menu-item-object-page ">
                        <a href="menu.html">Promociones</a>
                      </li>
                      <li class="menu-item menu-item-object-page ">
                        <a href="contacts.html">Contáctenos</a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <div class="panel_bottom"></div>
              </div>
              <div class="mask"></div>
            </div>
            @yield('content')
            <footer class="footer_wrap widget_area scheme_original show-footer-border-no">
              <div class="footer_wrap_inner widget_area_inner">
                <div class="content_wrap">
                  <div class="columns_wrap">
                    <aside class="widget_number_1 column-1_3 widget widget_text">
                      <h2 class="widget_title">Email</h2>
                      <div class="textwidget">
                        <a href="info@baldore.com">info@baldore.com</a><br>
                      </div>
                    </aside><aside class="widget_number_2 column-1_3 widget widget_text">
                      <h2 class="widget_title">Teléfonos</h2>
                      <div class="textwidget">
                        +1(800)123-4567
                      </div>
                    </aside><aside class="widget_number_3 column-1_3 widget widget_text">
                      <h2 class="widget_title">Ubicación</h2>
                      <div class="textwidget">
                        Patate, Tunguragua<br>
                        Ecuador
                      </div>
                    </aside>
                  </div>
                </div>
              </div>
            </footer>


            <footer class="contacts_wrap scheme_original show-footer-border-no">
              <div class="contacts_wrap_inner">
                <div class="content_wrap">
                  <div class="logo">
                    <a href="index.html">
                      <img src="images/logo.png" class="logo_footer" alt="" width="132" height="54">
                    </a>
                  </div>
                </div>
              </div>
            </footer> 
        
            <div class="copyright_wrap copyright_style_socials scheme_original">
              <div class="copyright_wrap_inner">
                <div class="content_wrap">
                  <div class="copyright_text">
                    <a href="http://ancorathemes.com/">Baldore</a> © 2018 Todos los Derechos Reservados <a href="http://ancorathemes.com/">Términos</a> y <a href="#">Condiciones de uso</a>
                  </div>
                  <div class="copyright_text">
                    Desarrollado Por
                    <a href="http://simplicityuniverse.com">Simplicity</a>
                  </div>
                  <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
                    <div class="sc_socials_item">
                      <a href="#" target="_blank" class="social_icons social_facebook">
                        <span class="icon-facebook"></span>
                      </a>
                    </div>
                    <div class="sc_socials_item">
                      <a href="#" target="_blank" class="social_icons social_instagramm">
                        <span class="icon-instagramm"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type='text/javascript' src='js/vendor/jquery-1.12.3.min.js'></script>
    <script type='text/javascript' src='js/vendor/jquery-migrate.min.js'></script>
    <script type="text/javascript" src="js/vendor/essential-grid/public/assets/js/lightbox.js"></script>
    <script type="text/javascript" src="js/vendor/essential-grid/public/assets/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="js/vendor/essential-grid/public/assets/js/jquery.themepunch.essential.min.js"></script>
    <script type="text/javascript" src="js/vendor/revslider/public/assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js/vendor/photostack/modernizr.min.js"></script>
    <script type='text/javascript' src='js/custom/__main.js'></script>
    <script type='text/javascript' src='js/vendor/jquery.cookie.min.js'></script>
    <script type='text/javascript' src='js/vendor/superfish.min.js'></script>
    <script type='text/javascript' src='js/custom/jquery.slidemenu.min.js'></script>
    <script type='text/javascript' src='js/custom/core.utils.min.js'></script>
    <script type='text/javascript' src='js/custom/core.init.js'></script>
    <script type='text/javascript' src='js/custom/theme.init.min.js'></script>
    <script type='text/javascript' src='js/custom/theme.shortcodes.js'></script>
    <script type='text/javascript' src='js/vendor/core.min.js'></script>
    <script type='text/javascript' src='js/vendor/widget.min.js'></script>
    <script type='text/javascript' src='js/vendor/tabs.min.js'></script>
    <script type='text/javascript' src='js/vendor/effect.min.js'></script>
    <script type='text/javascript' src='js/vendor/effect-fade.min.js'></script>
        <script type="text/javascript" src="js/vendor/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="js/vendor/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="js/vendor/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js"></script>
      <script type="text/javascript" src="js/vendor/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="js/vendor/prettyphoto/jquery.prettyPhoto.min.js"></script>
</body>
</html>
