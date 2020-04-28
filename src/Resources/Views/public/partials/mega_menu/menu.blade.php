<li class="{{ $menu->hasSubMenus() ? 'dropdown' : '' }} {{ $menu->isFluid() ? 'fluid-menu' : '' }}">
    <a href="{{ $menu->url() }}" class="{{ $menu->hasSubMenus() ? 'dropdown-toggle' : '' }}" target="{{ $menu->target() }}">
        {{ $menu->name() }}
    </a>

    @if ($menu->isFluid())
        @include('storefront::public.partials.mega_menu.fluid')
    @else
        @include('storefront::public.partials.mega_menu.dropdown', ['subMenus' => $menu->subMenus(), 'class' => 'multi-level'])
    @endif
</li>
