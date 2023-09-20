<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper full">
    <div class="swiper-wrapper">
        @foreach ($product->images as $item)
            <div class="swiper-slide">
                <img src="{{ $item }}" class="img-fluid" />
            </div>
        @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<div thumbsSlider="" class="swiper mt-3 thumbs">
    <div class="swiper-wrapper">
        @foreach ($product->images as $item)
            <div class="swiper-slide">
                <img src="{{ $item }}" class="img-fluid" />
            </div>
        @endforeach
    </div>
</div>
