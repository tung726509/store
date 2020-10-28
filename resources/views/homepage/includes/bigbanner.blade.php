<style type="text/css">
  div.porto-ibanner-container{
    height: 65% !important;
  }
  .banner-height-image{
      height: 330px;
    }

  @media only screen and (max-width: 1700px) {
    div.porto-ibanner-container{  
      height: 73% !important;
    }
  }

  @media only screen and (max-width: 1500px) {
    div.porto-ibanner-container{  
      height: 80% !important;
    }
  }

  @media only screen and (max-width: 1400px) {
    div.porto-ibanner-container{  
      height: 80% !important;
    }

    .banner-height-image{
      height:310px;
    }
  }

  @media only screen and (max-width: 1300px) {
    div.porto-ibanner-container{  
      height: 83% !important;
    }

    .banner-height-image{
      height:290px;
    }
  }

  @media only screen and (max-width: 1200px) {
    div.porto-ibanner-container{  
      height: 100% !important;
    }

    .banner-height-image{
      height: auto;
    }
  }

  @media only screen and (min-width: 576px) and (max-width: 870px) {
    div.porto-ibanner-container{  
      height: 100% !important;
    }
 
    .bbi-text-1{
      margin-bottom: 5px !important;
    }

    .bbi-text-2{
      margin-bottom: 5px !important;
    }

    .bbi-text-3{
      margin-bottom: 5px !important;
    }

    .banner-height-image{
      height: auto;
    }
  }
</style>
{{-- Big Banner --}}
<div class="banner-height-image porto-carousel owl-carousel has-ccols ccols-1 mb-0 home-slider nav-style-4 owl-drag" data-plugin-options="" style="">
  <div class="owl-stage-outer">
    <div class="owl-stage">
      @forelse(collect($dataImageOption['big_b_i']['name']) as $item)
        <div class="owl-item">
            <div class="porto-ibanner mb-0" style="background:#f4f4f4;min-height:200px;">
               <img width="80%" height="auto" src="{{asset('homepage/images/'.$item)}}" class="porto-ibanner-img">
               <div class="porto-ibanner-desc no-padding d-flex">
                  <div class="container">
                    <div class="porto-ibanner-container">
                      <div class="porto-ibanner-layer pr-xl-5 bbi-text-0" style="">
                        @if($dataImageOption['big_b_i']['text'][1] != '')
                          <h3 class="porto-heading mb-2 bbi-text-1" style="">{{ $dataImageOption['big_b_i']['text'][1] }}</h3>
                        @endif
                        @if($dataImageOption['big_b_i']['text'][2] != '')
                          <h4 class="porto-heading mb-3 text-divider bbi-text-2" style="">{{ $dataImageOption['big_b_i']['text'][2] }}</h4>
                        @endif
                        @if($dataImageOption['big_b_i']['text'][3] != '')
                          <h3 class="porto-heading custom-font4 mb-4 bbi-text-3" style="">{{ $dataImageOption['big_b_i']['text'][3] }}</h3>
                        @endif
                        @if($dataImageOption['big_b_i']['text'][4] != '')
                          <a class="btn btn-xl btn-danger btn-modern btn-block bbi-text-4" href="#"><span>{{ $dataImageOption['big_b_i']['text'][4] }}</span></a>
                        @endif
                      </div>
                    </div>
                  </div>
               </div>
            </div>
        </div>
      @empty
        <div class="owl-item">
            <div class="porto-ibanner mb-0" style="background:#f4f4f4;min-height:500px;">
               <img width="1920" height="500" src="{{asset('homepage/images/big-banner-demo.jpg')}}" class="porto-ibanner-img">
               <div class="porto-ibanner-desc no-padding d-flex">
                  <div class="container">
                     <div class="porto-ibanner-container">
                        <div class="porto-ibanner-layer pr-xl-5" style="right:5%;top: 50%;transform: translateY(-50%);">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
      @endforelse
    </div>
  </div>
  <div class="owl-dots"></div>
</div>