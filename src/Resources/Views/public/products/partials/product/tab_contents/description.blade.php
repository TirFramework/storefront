<div id="description" class="description tab-pane fade in {{ request()->has('reviews') || Rviw::form_has_error($errors) ? '' : 'active' }}">
    {!! $product->description !!}
</div>
