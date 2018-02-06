@extends('layouts.app2')

@section('content')
  <div class="top_panel_title top_panel_style_8 breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_8 breadcrumbs_present_inner">
      <div class="content_wrap">
        <div class="breadcrumbs"><a class="breadcrumbs_item home" href="/">Home</a><span class="breadcrumbs_delimiter"></span><span class="breadcrumbs_item current">{{$product->title}}</span>
        </div>
      </div>
    </div>
  </div>
      <div class="page_content_wrap page_paddings_no">

        <div class="content">
          <article class="post_item post_item_single page">
            <div class="post_content">

              <section class="">
                <div class="container">
                  <div class="columns_wrap sc_columns no_margins margin_bottom_huge">
                    <div class="column-2_5 sc_column_item odd first span_2">
                      <figure class="sc_image  sc_image_shape_square">
                        <img src="/images/products/containers/{{$product->container}}" alt="" />
                      </figure>
                    </div><div class="column-3_5 sc_column_item sc_column_item_3 odd after_span_2">
                      <div class="sc_section margin_left_large">
                        <div class="sc_section_inner">
                          <h3 class="sc_title margin_bottom_null mtn035em">{{$product->title}}</h3>
                          <div class="mbn_ne">
                            <p>{{$product->type->description}}</p>
                            <p>{{$product->description}}</p>
                          </div>
                          <div class="sc_skills sc_skills_bar sc_skills_horizontal mw480 mt16rem" data-type="bar" data-caption="Skills" data-dir="horizontal">
                            <div class="sc_skills_info">
                              <div class="sc_skills_label">Grado Alchólico</div>
                            </div>
                            <div class="sc_skills_item sc_skills_style_1 odd">
                              <div class="margin_class">
                                <div class="sc_skills_count sc_skills_count_style_1"></div>
                                <div class="sc_skills_total" data-start="0" data-stop="{{$product->grade}}" data-step="1" data-max="100" data-speed="34" data-duration="2040" data-ed="%">{{$product->grade}}%</div>
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
<div class="page_content_wrap page_paddings_no">

        <div class="content">
          <article class="post_item post_item_single page">
            <div class="post_content">

              <section  class="bg_image_11 spt72rem spb6rem">
                <div class="container">
                  <div class="sc_section margin_bottom_huge aligncenter">
                    <div class="sc_section_inner">
                      <h5 style="color:white;" class="sc_title mtn16em mb03rem">Galería De</h5>
                      <h1 style="color:white;" class="sc_title margin_top_null margin_bottom_large">Imágenes</h1>
                      <article class="myportfolio-container minimal-light" id="esg-grid-2-1-wrap">
                        <div id="esg-grid-2-1" class="esg-grid">
                          <article class="esg-filters esg-singlefilters">
                            <div class="esg-filter-wrapper  esg-fgc-2">
                              <div class="esg-filterbutton selected esg-allfilter" data-filter="filterall" data-fid="-1">
                                <span>Todas</span>
                              </div>
                              <div class="eg-clearfix"></div>
                            </div>
                          </article>
                          <div class="esg-clear-no-height"></div>
                          <ul>
                            @foreach($product->pictures as $picture)
                              <li class="filterall eg-washington-wrapper eg-post-id-821" data-date="1455200294">
                                <div class="esg-media-cover-wrapper">
                                  <div class="esg-entry-media">
                                    <img style="background: black;" src="/images/products/{{$picture->name}}" alt="">
                                  </div>
                                  <div class="esg-entry-cover esg-fade" data-delay="0">
                                    <div class="esg-overlay esg-fade eg-washington-container" data-delay="0">
                                    </div>
                                    <div class="esg-center eg-post-821 eg-washington-element-0-a esg-falldown" data-delay="0.1">
                                      <a class="eg-washington-element-0 eg-post-821 esgbox" href="/images/products/{{$picture->name}}" lgtitle="{{$picture->description}}">
                                        <i class="eg-icon-search"></i>
                                      </a>
                                    </div>
                                    <div class="esg-center eg-washington-element-8 esg-none esg-clear"></div>
                                    <div class="esg-center eg-washington-element-9 esg-none esg-clear"></div>
                                  </div>
                                </div>
                              </li>
                            @endforeach
                          </ul>
                        </div>
                      </article>
                      <div class="clear"></div>
                    </div>
                  </div>
                </div>
              </section>

            </div>
          </article>
        </div>

      </div>  
          <section style="background-image: url(../images/dark_animal.jpg)" class="spt52rem">
            <div class="container">
              <div class="sc_section">
                <div style="color:white;" class="sc_section_inner">
                  <h5 style="color:white;" class="sc_title sc_align_left margin_top_small margin_bottom_tiny">Últimas</h5>
                  <h1 class="sc_title sc_align_left margin_top_null margin_bottom_null">Recetas</h1>
                  <div class="sc_tabs sc_tabs_style_1 margin_top_large- title_position_right" data-active="0">
                    <ul class="sc_tabs_titles">
                      <li class="sc_tabs_title">
                        <a href="#sc_tab_1_1" class="theme_button" id="sc_tab_1_1_tab">{{$product->type->description}}</a>
                      </li>
                    </ul>
                    <div id="sc_tab_1_1" class="sc_tabs_content odd">
                      <div class="sc_section column-1_2">
                        <div class="sc_section_inner">
                          <ul class="sc_list sc_list_style_menu">
                            @foreach($product->recipes as $k => $recipe)
                              @if($k<4)
                              <li class="sc_list_item odd">
                                <div class="columns_wrap sc_columns">
                                  <div style="color:white;" class="column-4_7 sc_column_item odd">
                                    <h3 style="color:white;" class="sc_title">{{$recipe->title}}</h3>
                                    <div class="text_column mbn_ne">
                                      <p>{{substr($recipe->description, 0, 50)}} ...</p>
                                    </div>
                                  </div><div class="column-3_7 sc_column_item odd sc_ar">
                                    <h2 class="sc_title"><a href="product/{{$product->slug}}">Leer Receta</a></h2>
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
                                  <div style="color:white;" class="column-4_7 sc_column_item odd">
                                    <h3 style="color:white;" class="sc_title">{{$recipe->title}}</h3>
                                    <div class="text_column mbn_ne">
                                      <p>{{substr($recipe->description, 0, 50)}} ...</p>
                                    </div>
                                  </div><div class="column-3_7 sc_column_item odd sc_ar">
                                    <h2 class="sc_title"><a href="product/{{$product->slug}}">Leer Receta</h2>
                                  </div>
                                </div>
                              </li>
                              @endif
                            @endforeach

                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
@endsection
