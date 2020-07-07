<div class="category-menu-wrapper pull-left hidden-sm {{ $shouldExpandCategoryMenu ? 'visible' : '' }}">
    <div class="category-menu-dropdown dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bars" aria-hidden="true"></i>
        {{ stg::get('storefront_category_menu_title') }}
    </div>

{{--    @dd($categoryMenu->menus()[0]->url())--}}
    <ul class="dropdown-menu vertical-mega-menu">
        @each('storefront::public.partials.mega_menu.menu', $categoryMenu->menus(), 'menu')
    </ul>
</div>
