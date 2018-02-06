@extends('layouts.app2')

@section('content')
    <div class="top_panel_title top_panel_style_8 breadcrumbs_present scheme_original">
      <div class="top_panel_title_inner top_panel_inner_style_8 breadcrumbs_present_inner">
        <div class="content_wrap">
          <div class="breadcrumbs"><a class="breadcrumbs_item home" href="/">Home</a><span class="breadcrumbs_delimiter"></span><span class="breadcrumbs_item current">Noticias</span>
          </div>
        </div>
      </div>
    </div>
      <div class="page_content_wrap page_paddings_no">

        <div class="content_wrap">
          <div class="content">

            <section class="">
              <div class="container">
                <div class="isotope_wrap" data-columns="3">
                  @foreach($posts as $post)
                    <div class="isotope_item isotope_item_masonry isotope_item_masonry_3 isotope_column_3">
                      <article class="post_item post_item_masonry post_item_masonry_3 post_format_standard odd">
                        <h3 class="post_title">
                        <a href="/posts/show/{{$post->slug}}">{{$post->title}}</a>
                        </h3>
                        <div class="post_info">
                          <span class="post_info_item post_info_posted">
                            <a href="#" class="post_info_date">{{$post->creation_date}}</a>
                          </span>
                          
                        </div>
                        <div class="post_featured">
                          <div class="post_thumb" data-image="images/image-1.jpg" data-title="Tough? Try Not Drinking for a Month">
                            <a class="hover_icon hover_icon_link" href="/posts/show/{{$post->slug}}">
                              <img alt="{{$post->creation_date}}" src="images/posts/{{$post->picture}}">
                            </a>
                          </div>
                        </div>
                        <div class="post_content isotope_item_content">
                          <div class="post_descr">
                            <p>{{$post->subtitle}}...</p>
                            <a href="/posts/show/{{$post->slug}}" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium">Leer Más</a>
                          </div>
                        </div>
                      </article>
                    </div>
                    @endforeach
                </div>
              </div>
            </section>

          </div>

        </div>

      </div> 
@endsection
