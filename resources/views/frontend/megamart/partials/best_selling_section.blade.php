@php
    $best_selling_products = get_best_selling_products(20);
    $lang = get_system_language()->code;
    $homeBanner3Images = get_setting('home_banner3_images', null, $lang);
    $xxl_items = 3;
    $xl_items = 2.5;
    if ($homeBanner3Images != null){
        $xxl_items = 2;
        $xl_items = 1.8;
    }
@endphp
@if (get_setting('best_selling') == 1 && count($best_selling_products) > 0)
    <section class="border">
        <div class="px-3">
            <!-- Top Section -->
            <div class="d-flex mb-2 mb-md-3 mt-2 mt-md-3 align-items-baseline justify-content-between">
                <!-- Title -->
                <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                    <span class="">{{ translate('Best Selling') }}</span>
                </h3>
                <!-- Links -->
                <div class="d-flex">
                    <a type="button" class="arrow-prev slide-arrow link-disable text-secondary mr-2" onclick="clickToSlide('slick-prev','section_best_selling')"><i class="las la-angle-left fs-20 fw-600"></i></a>
                    <a type="button" class="arrow-next slide-arrow text-secondary ml-2" onclick="clickToSlide('slick-next','section_best_selling')"><i class="las la-angle-right fs-20 fw-600"></i></a>
                </div>
            </div>
            <!-- Product Section -->
            <div class="px-sm-3">
                <div class="aiz-carousel sm-gutters-16 arrow-none" data-rows="2" data-items="{{ $xxl_items }}" data-xl-items="{{ $xl_items }}" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='false'>
                    @foreach ($best_selling_products as $key => $product)
                        <div class="carousel-box px-3 position-relative has-transition hov-animate-outline">
                            @include('frontend.'.get_setting('homepage_select').'.partials.product_box_1',['product' => $product])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
