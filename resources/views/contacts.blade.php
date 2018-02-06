@extends('layouts.app2')

@section('content')
<div class="top_panel_title top_panel_style_8 breadcrumbs_present scheme_original">
	<div class="top_panel_title_inner top_panel_inner_style_8 breadcrumbs_present_inner">
		<div class="content_wrap">
			<div class="breadcrumbs"><a class="breadcrumbs_item home" href="/">Home</a><span class="breadcrumbs_delimiter"></span><span class="breadcrumbs_item current">Contáctenos</span>
			</div>
		</div>
	</div>
</div>
<div class="page_content_wrap page_paddings_no">

				<div class="content">
					<article class="post_item post_item_single page">
						<div class="post_content">



							<section class="spt36rem">
								<div class="container">
									<div class="columns_wrap sc_columns">
										<div class="column-1_2 sc_column_item even">
											<div class="sc_section section_style_colored aligncenter bg_color_1">
												<div class="sc_section_inner">
													<div class="sc_section_overlay">
														<div class="sc_section_content padding_on">
															<h2 class="sc_title sc_align_center white mb01em">Dirección</h2>
															<div class="mbn_ne">
																<p class="white">Patate,<br />
																Ecuador</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div><div class="column-1_2 sc_column_item odd">
											<div class="sc_section section_style_colored aligncenter bg_color_1">
												<div class="sc_section_inner">
													<div class="sc_section_overlay">
														<div class="sc_section_content padding_on">
															<h2 class="sc_title sc_align_center white mb01em">Teléfonos</h2>
															<div class="mbn_ne">
																<p class="white">+1(800)123-4567<br />
																+1(800)123-4566</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>

							<section class="spv5rem">
								<div class="container">
									<div class="sc_form_wrap">
										<div class="sc_form sc_form_style_form_1 contact_form_main aligncenter mw470">
												<h5 class="sc_form_subtitle sc_item_subtitle">Tiene alguna Pregunta?</h5>
												<h1 class="sc_form_title">Contáctanos</h1>
										    <form method="post" action="include/contact-form.php">
										        <div class="sc_form_info">
													<div class="sc_form_item sc_form_field label_over">
														<label class="required" for="sc_form_username">Nombre</label>
										                <input type="text" name="name" id="sc_form_username" placeholder="Nombre *">
										            </div>
										            <div class="sc_form_item sc_form_field label_over">
														<label class="required" for="sc_form_email">E-mail</label>
										                <input type="text" name="email" id="sc_form_email" placeholder="Email *">
										            </div>
										            <div class="sc_form_item sc_form_field label_over">
														<label class="required" for="sc_form_subj">Asunto</label>
										                <input type="text" name="subject" id="sc_form_subj" placeholder="Asunto *">
										            </div>
										        </div>
												<div class="sc_form_item sc_form_message label_over">
													<label class="required" for="sc_form_message">Mensaje</label>
									                <textarea  id="sc_form_message" class="textAreaSize" name="message" placeholder="Mensaje *"></textarea>
									            </div>
												<div class="sc_contact_form_button">
													<div class="sc_form_item sc_form_button">
														<button type="submit" name="contact_submit" class="sc_form_button">Enviar</button>
													</div>
												</div>
										        <div class="result sc_infobox"></div>
										    </form>
										</div>
									</div>
								</div>
							</section>

						</div>
					</article>
				</div>

</div>
@endsection