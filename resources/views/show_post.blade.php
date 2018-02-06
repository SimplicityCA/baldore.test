@extends('layouts.app2')

@section('content')
 <div class="top_panel_title top_panel_style_8 breadcrumbs_present scheme_original">
  <div class="top_panel_title_inner top_panel_inner_style_8 breadcrumbs_present_inner">
    <div class="content_wrap">
      <div class="breadcrumbs"><a class="breadcrumbs_item home" href="/">Home</a><span class="breadcrumbs_delimiter"></span><span class="breadcrumbs_item current">{{$post->title}}</span>
      </div>
    </div>
  </div>
</div>
			<div class="page_content_wrap page_paddings_no">

				<div class="content_wrap">
					<div class="content">
						<article class="post_item post_item_single page">
							<div class="post_content">

								<section class="">
									<div class="container">
										<article class="post_item post_item_single post">			
											<h3 class="post_title entry-title">{{$post->title}}</h3>
											<div class="post_info">
												<span class="post_info_item post_info_posted">
													<a href="#" class="post_info_date date updated">{{$post->creation_date}}</a>
												</span>
											</div>			
											<section class="post_featured">
												<div class="post_thumb" data-image="/images/posts/{{$post->picture}}" data-title="{{$post->title}}">
													<a class="hover_icon hover_icon_view" href="/images/posts/{{$post->picture}}" title="{{$post->title}}">
														<img alt="Image Post" src="/images/posts/{{$post->picture}}">
													</a>
												</div>
											</section>
											<section class="post_content">
												{!! $post->body !!}
											</section>
											<section class="related_wrap related_wrap_empty"></section>
										</article>
									</div>
								</section>

							</div>
						</article>
					</div>
				</div>
			</div>
@endsection
