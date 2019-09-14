<ul class="standard_dropdown main_nav_dropdown">
    @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }} <i class="fas fa-chevron-down"></i> </a></li>
    @endforeach
</ul>
