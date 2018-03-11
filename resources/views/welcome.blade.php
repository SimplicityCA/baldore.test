@extends('layouts.app')

@section('content')
  <section id="mainslider_1" class="slider_wrap slider_fullwide slider_engine_revo slider_alias_oldstorybar_slider1 mainslider_1">
                  
    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" data-version="5.1">
            <ul>    <!-- SLIDE  -->
                @foreach($pictures as $k => $picture)
                  <li data-index="rs-{{$k}}" data-transition="fade" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="images/{{$picture->path}}"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-description="">
                      <!-- MAIN IMAGE -->
                      <img src="images/{{$picture->path}}"  alt=""  width="1920" height="920" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                      <div class="tp-caption BigWhite   tp-resizeme"
                          id="slide-1-layer-3"
                          data-x="center" data-hoffset=""
                          data-y="center" data-voffset="35"
                          data-width="['auto']"
                          data-height="['auto']"
                          data-transform_idle="o:1;"
                          data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;s:700;e:Power2.easeOut;"
                          data-transform_out="rZ:0deg;sX:0.7;sY:0.7;opacity:0;s:300;e:Back.easeIn;s:300;e:Back.easeIn;"
                          data-mask_in="x:0px;y:0px;"
                          data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                          data-start="3010"
                          data-splitin="none"
                          data-splitout="none"
                          data-responsive_offset="on"
                          style="z-index: 7; white-space: nowrap;">
                          {{$picture->message1}}
                      </div>
                      <!-- LAYER NR. 4 -->
                      <div class="tp-caption MediumWhite   tp-resizeme"
                          id="slide-1-layer-4"
                          data-x="center" data-hoffset=""
                          data-y="center" data-voffset="109"
                          data-width="['auto']"
                          data-height="['auto']"
                          data-transform_idle="o:1;"
                          data-transform_in="y:50px;opacity:0;s:300;e:Power3.easeInOut;"
                          data-transform_out="opacity:0;s:300;s:300;"
                          data-start="3460"
                          data-splitin="none"
                          data-splitout="none"
                          data-responsive_offset="on"
                          style="z-index: 8; white-space: nowrap;">
                          {{$picture->message2}}
                      </div>
                      <!-- LAYER NR. 5 -->
                      @if($picture->link)
                        <div class="tp-caption ButtonFont   tp-resizeme"
                            id="slide-1-layer-5"
                            data-x="center" data-hoffset=""
                            data-y="bottom" data-voffset="105"
                            data-width="['auto']"
                            data-height="['auto']"
                            data-transform_idle="o:1;"
                            data-transform_in="y:-50px;opacity:0;s:300;e:Power2.easeInOut;"
                            data-transform_out="opacity:0;s:300;s:300;"
                            data-start="3990"
                            data-splitin="none"
                            data-splitout="none"
                            data-responsive_offset="on"
                            style="z-index: 9; white-space: nowrap;">
                            <a href="{{$picture->link}}" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">Descubre Más</a>
                        </div>
                      @endif
                  </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
  </section>
  <div class="top_panel_title top_panel_style_8  breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_8  breadcrumbs_present_inner">
      <div class="content_wrap">
        <div class="breadcrumbs"></div>
      </div>
    </div>
  </div>
  <div class="page_content_wrap page_paddings_no">

    <div class="content">
      <article class="post_item post_item_single page">
        <div class="post_content">

          <section class="spb75rem">
            <div class="container">
              <div class="columns_wrap sc_columns">
                <div class="column-1_2 sc_column_item odd first">
                  <h5 class="sc_title sc_align_left margin_top_small margin_bottom_tiny">Acerca de Nosotros</h5>
                  <h1 class="sc_title sc_align_left margin_top_null margin_bottom_small">Baldore</h1>
                  <h3 class="sc_title sc_title_style_1">
                    "Satisfacción total de los clientes internos y externos de Baldoré, con productos y servicios innovadores y competitivos, con un compromiso personal para el mejoramiento de los procesos, manteniendo márgenes de rentabilidad consistentes, que nos permitan reinvertir en ingeniería y tecnología de punta"
                  </h3>
                  <div class="mbn_ne">
                    <p>
                      Hemos implementado su Sistema de Gestión de Calidad o SGC Baldoré, el cual incluye los sistemas de Mejoramiento Continuo de la Producción y Buenas Prácticas de Manufactura. El SGC Baldoré permite entregarle productos y servicios acorde a nuestra política de calidad, Valores y Políticas.
                    </p>
                  </div>
                  <a href="/about" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_medium">Quiero conocer más</a>
                </div><div class="column-1_2 sc_column_item even">
                  <figure class="sc_image  sc_image_shape_square margin_top_huge margin_left_small">
                    <img src="images/nosotros.jpg" alt="" />
                  </figure>
                </div>
              </div>
            </div>
          </section>

          <section class="bg_image_11 spt72rem spb6rem">
            <div class="container">
              <div class="sc_services_wrap">
                <div class="sc_services sc_services_style_services-3 sc_services_type_images">
                  <h6 class="sc_services_subtitle sc_item_subtitle">Siempre Lo mejor</h6>
                  <h1 class="sc_services_title sc_item_title">Nuestros Productos</h1>
                  <div class="products-home sc_columns columns_wrap">
                    @foreach($products as $product)
                    <div class="column-1_3 column_padding_bottom">
                      <div class="sc_services_item sc_services_item_3 odd">
                        <div class="sc_services_item_featured post_featured">
                          <div class="post_thumb" data-image="images/products/containers/{{$product->container}}" data-title="{{$product->title}}">
                            <a class="hover_icon hover_icon_link" href="products/{{$product->slug}}">
                              <img alt="Cozy Interior" src="images/products/containers/{{$product->container}}">
                            </a>
                          </div>
                        </div>
                        <h2 class="sc_services_item_title">{{$product->title}}</h2>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="spt52rem">
            <div class="container">
              <div class="sc_section">
                <div class="sc_section_inner">
                  <h5 class="sc_title sc_align_left margin_top_small margin_bottom_tiny">Últimas</h5>
                  <h2 class="sc_title sc_align_left margin_top_null margin_bottom_null">Recetas</h2><br>
                  <div class="sc_tabs sc_tabs_style_1 margin_top_large- title_position_right" data-active="0">
                    <ul class="sc_tabs_titles">
                      @foreach($products as $k => $product)
                      <li class="sc_tabs_title">
                        <a href="#sc_tab_1_{{$k+1}}" class="theme_button" id="sc_tab_1_{{$k+1}}_tab">{{$product->title}}</a>
                      </li>
                      @endforeach
                    </ul>
                    @foreach($products as $k => $product)
                    <div id="sc_tab_1_{{$k+1}}" class="sc_tabs_content odd">
                      <div class="sc_section column-1_2">
                        <div class="sc_section_inner">
                          <ul class="sc_list sc_list_style_menu">
                            @foreach($product->recipes as $k => $recipe)
                              @if($k<4)
                              <li class="sc_list_item odd">
                                <div class="columns_wrap sc_columns">
                                  <div class="column-4_7 sc_column_item odd">
                                    <h3 class="sc_title">{{$recipe->title}}</h3>
                                    <div class="text_column mbn_ne">
                                      <p>{{substr($recipe->description, 0, 50)}} ...</p>
                                    </div>
                                  </div><div class="column-3_7 sc_column_item odd sc_ar">
                                    <h2 class="sc_title"><a href="recipe/{{$recipe->id}}">Leer Receta</a></h2>
                                  </div>
                                </div>
                              </li>
                              @endif
                            @endforeach
                          </ul>
                        </div>
                      </div><div class="sc_section column-1_2">
                        <div class="sc_section_inner">
                          <ul class="sc_list sc_list_style_menu">
                            @foreach($product->recipes as $k => $recipe)
                              @if($k>4 && $k<7)
                              <li class="sc_list_item odd">
                                <div class="columns_wrap sc_columns">
                                  <div class="column-4_7 sc_column_item odd">
                                    <h3 class="sc_title">{{$recipe->title}}</h3>
                                    <div class="text_column mbn_ne">
                                      <p>{{substr($recipe->description, 0, 50)}} ...</p>
                                    </div>
                                  </div><div class="column-3_7 sc_column_item odd sc_ar">
                                    <h2 class="sc_title"><a href="recipe/{{$recipe->id}}">Leer Receta</h2>
                                  </div>
                                </div>
                              </li>
                              @endif
                            @endforeach

                          </ul>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="bg_image_14">
            <div class="container">
              <div class="sc_section">
                <div class="sc_section_inner">
                  <div class="sc_section_overlay">
                    <div class="sc_section_content padding_on phn">
                      <div class="sc_content content_wrap">
                        <h6 class="sc_title sc_align_center margin_top_larges margin_bottom_tiny">Participa !</h6>
                        <h1 class="sc_title sc_align_center margin_top_null margin_bottom_large white">Últimas Promociones</h1>
                        <div class="sc_events_wrap">
                          <div class="sc_events sc_events_style_events-2  margin_bottom_larges">
                            <div class="sc_columns columns_wrap">
                              @foreach($promotions as $promotion)
                                <?php  ?>
                                <div class="sc_events_item sc_events_item_1 odd first">
                                  <span class="sc_events_item_date">
                                    <span class="sc_events_item_day">{{date('d',strtotime(str_replace('-','/', $promotion->valid_to)))}}</span>
                                    <span class="sc_events_item_month">{{date('F',strtotime(str_replace('-','/', $promotion->valid_to)))}}</span>
                                  </span><h3 class="sc_events_item_title">
                                    <a href="#">{{$promotion->title}}</a>
                                  </h3><span class="sc_events_item_time">{{date('H:i:s',strtotime(str_replace('-','/', $promotion->valid_to)))}}</span><span class="sc_events_item_details">
                                    <a class="sc_button sc_button_square sc_button_style_filled style_color_light" href="/promotions/show/{{$promotion->id}}">Ver Más</a>
                                  </span>
                                </div>
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

        </div>
      </article>
    </div>

  </div>
@endsection
@section('scripts')

@endsection
