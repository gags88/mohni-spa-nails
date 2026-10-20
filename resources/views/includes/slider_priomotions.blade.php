<div id="mh-homeslider3" class="mh-homeslider owl-carousel owl-theme mh-haslayout">
    @if (count($banners) > 0)
        @foreach ($banners as $banner)
        <div class="item">
            <div class="containers">
                <div class="row">
                    <div class="col-xs-12">
                        <img src="/image/{{ $banner->image }}" alt="image description" class="moh_banner">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>