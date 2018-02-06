@extends('layouts.app2')

@section('content')
 <div class="top_panel_title top_panel_style_8 breadcrumbs_present scheme_original">
  <div class="top_panel_title_inner top_panel_inner_style_8 breadcrumbs_present_inner">
    <div class="content_wrap">
      <div class="breadcrumbs"><a class="breadcrumbs_item home" href="/">Home</a><span class="breadcrumbs_delimiter"></span><span class="breadcrumbs_item current">{{$promotion->title}}</span>
      </div>
    </div>
  </div>
</div>
			<div class="page_content_wrap page_paddings_no">

				<div class="content_wrap">
					<div class="content">
						<article class="promotion_item promotion_item_single page">
							<div class="promotion_content">

								<section class="">
									<div class="container">
										<article class="promotion_item promotion_item_single promotion">			
											<h3 class="promotion_title entry-title">{{$promotion->title}}</h3>
											<div class="promotion_info">
												<span class="promotion_info_item promotion_info_promotioned">
													<a href="#" class="promotion_info_date date updated">{{$promotion->creation_date}}</a>
												</span>
											</div>			
											<section class="promotion_featured">
												
														<img alt="Image promotion" src="/images/promotions/{{$promotion->picture}}">

											</section>
											<section class="promotion_content">
												{!! $promotion->body !!}
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
