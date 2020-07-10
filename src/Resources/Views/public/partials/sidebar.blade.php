<div class="sidebar">
    <ul class="sidebar-content clearfix">
        @isset($categoryMenu)
            @foreach ($categoryMenu->menus() as $menu)
                <li>
                    <a href="{{ $menu->url() }}">{{ $menu->name() }}</a>

                    @if ($menu->hasSubMenus())
                        @include('storefront::public.partials.nested_sidebar', ['subMenus' => $menu->subMenus()])
                    @endif
                </li>
            @endforeach
        @endisset
    </ul>
</div>
