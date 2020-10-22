<div id="additional-information" class="specification tab-pane fade in">
    <div class="table-responsive">
        <table class="table">
            <tbody>
                @foreach ($product->attributes as $attribute)
                    <tr>
                            <td><h4></h4></td>

                        <td>
                            <div class="information-data clearfix">
                                <label class="pull-left">{{ $attribute->name }}</label>
                                <span>
                                    {{ $attribute->values->implode('value', ', ') }}
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
