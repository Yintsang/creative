@php
    use Illuminate\Support\Arr;

    $title = $title ?? ucwords(str_replace('_', ' ', ($field ?? '')));
    $sort_directions = collect(['asc', 'desc']);

    $sorted = false;
    $class = '';

    foreach ($sort_directions as $sort_direction) {
        if(request()->get('sort') == ($field . '_' . $sort_direction)){
            $sorted = true;
            $class = 'sorted-' . $sort_direction;

            if($sort_direction == 'asc'){
                $query = ['sort' => $field . '_desc'];
            }else{
                $query = [];
            }
        }
    }
    if(!$sorted){
        $query = ['sort' => $field . '_asc'];
    }

    $question = request()->getBaseUrl().request()->getPathInfo() === '/' ? '/?' : '?';

    $link = request()->url().$question.Arr::query(array_merge(collect(request()->query())->forget(['page', 'sort'])->all(), $query));
@endphp

<a href="{{ $link }}" class="sorted-col {{ $class }}">
    {{ $title }}
</a>