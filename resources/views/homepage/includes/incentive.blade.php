<section class="vc_section porto-section porto-inner-container p-t-md pb-0">
    @if($ict_count > 0)
        <div class="container">
            <div class="porto-carousel owl-carousel has-ccols ccols-xl-3 ccols-lg-3 ccols-md-2 ccols-sm-2 ccols-1 m-b-md home-bar owl-loaded owl-drag" data-plugin-options="{&quot;stagePadding&quot;:0,&quot;margin&quot;:2,&quot;autoplay&quot;:true,&quot;autoplayTimeout&quot;:3000,&quot;autoplayHoverPause&quot;:false,&quot;items&quot;:{{ $ict_count }},&quot;lg&quot;:{{ $ict_count }},&quot;md&quot;:{{ $ict_count >= 3 ? 2 : $ict_count }},&quot;sm&quot;:1,&quot;xs&quot;:1,&quot;nav&quot;:false,&quot;dots&quot;:false,&quot;animateIn&quot;:&quot;&quot;,&quot;animateOut&quot;:&quot;&quot;,&quot;loop&quot;:true,&quot;center&quot;:false,&quot;video&quot;:false,&quot;lazyLoad&quot;:false,&quot;fullscreen&quot;:false}">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        {{-- free ship --}}
                        @if($use_free_ship['key'] == 1)
                            <div class="owl-item active" style="">
                                <div class="porto-sicon-box style_1 default-icon">
                                    <div class="porto-sicon-default">
                                        <div {{-- id="porto-icon-20075240475e96bf4361bb5" --}} class="porto-just-icon-wrapper" style="text-align:center;">
                                            <div class="porto-icon none" style="color:#222529;font-size:37px;display:inline-block;"><i class="fas fa-shipping-fast"></i></div>
                                        </div>
                                    </div>
                                    <div class="porto-sicon-header">
                                        <h3 class="porto-sicon-title" style="font-weight:700;font-size:14px;line-height:1;">FREE SHIP</h3>
                                        <p style="font-size:13px;line-height:17px;">cho đơn hàng trên {{ $use_free_ship['value'] / 1000 }}k .</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- sinh nhật --}}
                        @if($use_birth_discount['key'] == 1)
                            <div class="owl-item active" style="">
                                <div class="porto-sicon-box style_1 default-icon">
                                    <div class="porto-sicon-default">
                                        <div id="porto-icon-15879685035e96bf4361d2e" class="porto-just-icon-wrapper" style="text-align:center;">
                                        <div class="porto-icon none" style="color:#222529;font-size:37px;display:inline-block;"><i class="fas fa-birthday-cake"></i></div>
                                        </div>
                                    </div>
                                    <div class="porto-sicon-header">
                                        <h3 class="porto-sicon-title" style="font-weight:700;font-size:14px;line-height:1;">SINH NHẬT GIẢM {{ $use_birth_discount['value'] }}%</h3>
                                        <p style="font-size:13px;line-height:17px;">trong tháng sinh nhật khách hàng .</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- chuyển khoản --}}
                        @if($use_transfer_discount['key'] == 1)
                            <div class="owl-item active" style="">
                                <div class="porto-sicon-box style_1 default-icon">
                                    <div class="porto-sicon-default">
                                        <div id="porto-icon-15879685035e96bf4361d2e" class="porto-just-icon-wrapper" style="text-align:center;">
                                            <div class="porto-icon none" style="color:#222529;font-size:37px;display:inline-block;"><i class="fas fa-hand-holding-usd"></i></div>
                                            </div>
                                        </div>
                                        <div class="porto-sicon-header">
                                            <h3 class="porto-sicon-title" style="font-weight:700;font-size:14px;line-height:1;">CHUYỂN KHOẢN GIẢM {{ $use_transfer_discount['value'] }}%</h3>
                                        <p style="font-size:13px;line-height:17px;">áp dụng cho mọi đơn hàng .</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="owl-nav disabled">
                    <button type="button" role="presentation" class="owl-prev"></button><button type="button" role="presentation" class="owl-next"></button></div>
                <div class="owl-dots disabled"></div>
            </div>
        </div>
    @endif
</section>