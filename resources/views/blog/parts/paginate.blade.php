@if(isset($posts))
    @if(count($posts) > 0)
        @if( $posts->total() > $posts->count() )
        <div class="row">
            <div class="col">
                <div class="block-27">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        @endif
    @endif
@endif