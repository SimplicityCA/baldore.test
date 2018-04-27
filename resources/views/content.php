@extends('layouts.app2')

@section('content')
<div class="top_panel_title top_panel_style_8 breadcrumbs_present scheme_original">
	<div class="top_panel_title_inner top_panel_inner_style_8 breadcrumbs_present_inner">
		<div class="content_wrap">
			<div class="breadcrumbs"><a class="breadcrumbs_item home" href="/">Home</a><span class="breadcrumbs_delimiter"></span><span class="breadcrumbs_item current">Acerca De Nosotros</span>
			</div>
		</div>
	</div>
</div>
<div class="page_content_wrap page_paddings_no">

				<div class="content">
					<article class="post_item post_item_single page">
						<div class="post_content">


							<section style="padding-bottom: 50px;" class="bg_image_14 bgsc spt72rem spb01rem">
								<div class="container">
									<div class="sc_call_to_action sc_call_to_action_style_1 sc_call_to_action_align_center">
										<div class="sc_call_to_action_info">
											<h1 class="sc_call_to_action_title sc_item_title">{{$content->title}}</h1>
											<div class="sc_call_to_action_descr sc_item_descr lighter">
												{{$content->body}}
											</div>
										</div>
									</div>
								</div>
							</section>


							<section class="bg_image_15 spt4rem spb365rem">
								<div class="container">
									<div class="sc_content content_wrap">
										<div class="sc_section aligncenter">
											<div class="sc_section_inner">
												<h2 class="sc_title sc_title_style_4 margin_top_no margin_bottom_small white">Quieres recibir Boletines?</h2>
												<div class="sc_emailer sc_emailer_opened">
													<form class="sc_emailer_form">
														<input type="text" class="sc_emailer_input" name="email" value="" placeholder="Email">
														<a href="#" class="sc_emailer_button sc_button sc_button_style_filled style_color_light" title="Submit" data-group="Updates">Enviar</a>
													</form>
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