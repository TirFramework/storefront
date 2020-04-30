@if ($features->isNotEmpty())
    <section class="features-wrapper clearfix">
        @each('storefront::public.home.sections.partials.feature', $features, 'feature')
    </section>
@endif
