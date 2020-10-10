<div class="footer-wrapper">
		      <div id="footer" class="footer-1">
		         <div class="footer-main">
		            <div class="container">
		               <div class="row">
               				{{--  --}}
		                  	<div class="col-lg-4">
		                     	<aside id="shop_contact_info" class="widget contact-info">
			                        <h3 class="widget-title">Liên Hệ</h3>
			                        <div class="contact-info contact-info-block">
			                           <ul class="contact-details">
			                              <li><i class="far fa-dot-circle"></i> <strong>Địa Chỉ:</strong> <span>{{ $options['com_address']['content'] }}</span></li>
			                              <li><i class="fab fa-whatsapp"></i> <strong>Số Điện Thoại:</strong> <span>{{ $options['com_phone']['content'] }}</span></li>
			                              <li><i class="far fa-envelope"></i> <strong>Email:</strong> <span><a href="mailto:{{ $options['com_email']['content'] }}">{{ $options['com_email']['content'] }}</a></span></li>
			                              <li><i class="far fa-clock"></i> <strong>Thời Giang Hoạt Động :</strong> <span>{{ $options['open_time']['content'] }}</span></li>
			                           </ul>
			                        </div>
	                     		</aside>
		                     	<aside id="follow-us-widget-2" class="widget follow-us">
			                        <div class="share-links">
			                        	<a href="{{ $options['fb']['content'] }}" rel="nofollow" target="_blank" title="Facebook" class="share-facebook">Facebook</a>
			                        	<a href="{{ $options['twt']['content'] }}" rel="nofollow" target="_blank" title="Twitter" class="share-twitter">Twitter</a>
			                        	<a href="{{ $options['ins']['content'] }}" rel="nofollow" target="_blank" title="Instagram" class="share-instagram">Instagram</a>
			                        </div>
			                    </aside>
		                  	</div>
		                  	<div class="col-lg-4">
		                     <aside id="woocommerce_product_tag_cloud-2" class="widget woocommerce widget_product_tag_cloud">
		                        <h3 class="widget-title">Phổ Biến</h3>
		                        <div class="tagcloud">
		                        	@forelse($tags as $item)
	                        		<a href="#" class="tag-cloud-link tag-link-33 tag-link-position-1" style="font-size: 8pt;">{{ $item->pretty_name }}</a>
		                        	@empty

		                        	@endforelse
		                        </div>
		                     </aside>
		                  	</div>
		                  	<div class="col-lg-4">
		                     <aside id="text-7" class="widget widget_text">
		                        <h3 class="widget-title">Subscribe Newsletter</h3>
		                        <div class="textwidget">
		                           <p>Get all the latest information on events, sales and offers. Sign up for newsletter:</p>
		                           <div role="form" class="wpcf7" id="wpcf7-f1512-o1" lang="en-US" dir="ltr">
		                              <div class="screen-reader-response"></div>
		                              <form action="/wordpress/porto/gutenberg-shop4/#wpcf7-f1512-o1" method="post" class="wpcf7-form" novalidate="novalidate">
		                                 <div style="display: none;"> <input type="hidden" name="_wpcf7" value="1512"> <input type="hidden" name="_wpcf7_version" value="5.1.1"> <input type="hidden" name="_wpcf7_locale" value="en_US"> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1512-o1"> <input type="hidden" name="_wpcf7_container_post" value="0"> <input type="hidden" name="g-recaptcha-response" value=""></div>
		                                 <div class="widget_wysija_cont widget_wysija">
		                                    <div class="wysija-paragraph"> <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control wysija-input" aria-required="true" aria-invalid="false" placeholder="Email address"></span></div>
		                                    <div> <input type="submit" value="SUBSCRIBE" class="wpcf7-form-control wpcf7-submit btn btn-primary wysija-submit"><span class="ajax-loader"></span></div>
		                                 </div>
		                                 <div class="wpcf7-response-output wpcf7-display-none"></div>
		                              </form>
		                           </div>
		                        </div>
		                     </aside>
		                  	</div>
		               </div>
		            </div>
		         </div>
		         <div class="footer-bottom">
		            <div class="container">
		               <div class="footer-left"> <span class="footer-copyright">© eCommerce. 2020. All Rights Reserved</span></div>
		               <div class="footer-right"> <img class="img-responsive footer-payment-img" src="{{asset('homepage/images/shop2_payment_logo.png')}}"></div>
		            </div>
		         </div>
		      </div>
		   	</div>