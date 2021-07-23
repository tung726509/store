<section class="vc_section porto-section section-parallax porto-inner-container parallax-disabled mbi-1" data-image-src="" style="">
  	<div class="container">
    	<div class="wp-block-columns mb-0 align-items-center">
	        @if($dataImageOption['med_b_i']['text'][1] != '')
		        <div class="wp-block-column">
		          <h3 class="porto-heading mb-0 py-2 text-center mbi-text-1" style="">{{ $dataImageOption['med_b_i']['text'][1] }}</h3>
		        </div>
	        @endif
	        @if($dataImageOption['med_b_i']['text'][2] != '')
		        <div class="wp-block-column col-xl-3">
		          	<div class="porto-button text-center">
		            	<a class="btn btn-lg btn-quaternary btn-modern my-3 mbi-text-2" href="#" style="border-radius: 5px">
		              		<span>{{ $dataImageOption['med_b_i']['text'][2] }}</span>
		            	</a>
		          	</div>
		        </div>
	        @endif
	        @if($dataImageOption['med_b_i']['text'][3] != '')
		        <div class="wp-block-column text-center py-2">
		          	<h5 class="porto-heading coupon-sale-text coupon-sale-light-bg m-b-sm mbi-text-3" style=""><b>{{ $dataImageOption['med_b_i']['text'][3] }}</b></h5>
		        </div>
	        @endif
    	</div>
  	</div>
</section>