<div class="ads">
    @foreach($banner as $item)
    <div class="ads_1">
        <div class="ads_1_banner">
            <a href="{{$item->ban_link}}" target="_blank">
                <img src="{{$item->getImgBanner()}}" alt="{{$item->ban_name}}">
            </a>
        </div>
    </div>
    @endforeach
</div>
