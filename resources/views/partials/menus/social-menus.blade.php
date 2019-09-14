
@foreach($items as $menu_item)

    <div class="top_bar_contact_item">
        <div class="top_bar_icon">
            @if ($menu_item->title === 'Facebook')
                <a href="{{ $menu_item->link() }}" target="_blank">
                    <i class="fab fa-facebook fa-lg"></i>
                </a>
            @elseif($menu_item->title === 'Twitter')
                <a href="{{ $menu_item->link() }}">
                    <i class="fab fa-twitter fa-lg"></i>
                </a>
            @endif
        </div>
    </div>

@endforeach
