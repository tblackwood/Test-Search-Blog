<div class="sidebar-box pt-md-4">
    <form method="GET" action="{{ route('filter') }}" class="search-form">
        @if(isset($categories))
        <h3 class="sidebar-heading"> Filter by Category</h3>
            @foreach($categories as $item)
                <div class="form-group">
                    <input name="categoriesFilter[]" type="checkbox"  id="{{ $item->id }}" value="{{ $item->id }}"
                           onchange="javascript:this.form.submit();"

                           @if(in_array($item->id, session('categoriesFilter'))) checked="" @endif

                        ><span> {{ $item->title }}</span>
                </div>
            @endforeach
        @endif
        @if( isset($tags))
            <h3 class="sidebar-heading"> Filter by Tags</h3>
            @foreach($tags as $item)
                <div class="form-group">
                    <input name="tagsFilter[]" type="checkbox" id="{{ $item->id }}" value="{{ $item->id }}"
                           onchange="javascript:this.form.submit();"
                           @if(in_array($item->id, session('tagsFilter'))) checked="" @endif><span> {{ $item->title }}</span>
                </div>
            @endforeach
        @endif
    </form>
</div>