@extends('layouts.app2')

@section('content')
          <section class="bg_image_14">
            <div class="container">
              <div class="sc_section">
                <div class="sc_section_inner">
                  <div class="sc_section_overlay">
                    <div class="sc_section_content padding_on phn">
                      <div class="sc_content content_wrap">
                        <h6 class="sc_title sc_align_center margin_top_larges margin_bottom_tiny">Participa !</h6>
                        <h1 class="sc_title sc_align_center margin_top_null margin_bottom_large white">Todas Las Promociones</h1>
                        <div class="sc_events_wrap">
                          <div class="sc_events sc_events_style_events-2  margin_bottom_larges">
                            <div class="sc_columns columns_wrap">
                              @foreach($promotions as $promotion)
                                <div class="sc_events_item sc_events_item_1 odd first">
                                  <span class="sc_events_item_date">
                                    <span class="sc_events_item_day">{{date('d',$promotion->creation_date)}}</span>
                                    <span class="sc_events_item_month">{{date('F',$promotion->creation_date)}}</span>
                                  </span><h3 class="sc_events_item_title">
                                    <a href="#">{{$promotion->title}}</a>
                                  </h3><span class="sc_events_item_time">{{date('H:i:s',$promotion->creation_date)}}</span><span class="sc_events_item_details">
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
@endsection
