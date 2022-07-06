<div>
    @if($records->total())
        <div class="paginate-row">
            <form action="{{ url()->current() }}" ref="rows_per_page_form" class="show-rows-form">
                @foreach(request()->except(['rows_per_page']) as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <div>Show rows:</div>
                <select name="rows_per_page" class="form-control" @change="$refs.rows_per_page_form.submit()">
                    @foreach($config['rows_per_page_options'] as $rows_per_page_option)
                    <option value="{{ $rows_per_page_option }}" {{ $rows_per_page_option == $config['rows_per_page'] ? 'selected' : '' }}>{{ $rows_per_page_option }}</option>
                    @endforeach
                    <option value="all" {{ $config['rows_per_page'] == 'all' ? 'selected' : '' }}>All</option>
                </select>
            </form>
            <div>
                {{ $records->appends(request()->query())->links() }}
            </div>
        </div>
        <div>Showing {{ $records->firstItem() }} to  {{ $records->lastItem() }} of {{ $records->total() }} result(s)</div>
    @else
        No Record Found
    @endif
</div>
