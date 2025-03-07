@props(['book'])
<a x-data="{title : @js($book->title)}" wire:wire:navigate href="{{ route('homepage.book.detail', $book->slug) }}"
    class="flex flex-col justify-center p-2 mb-3 overflow-hidden transition-all duration-100 hover hover:scale-105 w-52">
    <img src="{{ asset('storage/'. $book->cover) }}" class="h-64 rounded-md" />
    <div class="mx-1">
        <p class="font-medium hover:underline" x-text="title.substr(0,40)"></p>
        <div class="flex items-center text-xs">
            <div @class([ 'flex p-1 font-medium text-white rounded h-5 w-5 items-center justify-center mt-0.5 mr-1'
                , 'bg-good'=>
                $book->total_rating > 75,
                'bg-mid' => $book->total_rating > 50 && $book->total_rating <= 75, 'bg-bad'=> $book->total_rating > 0 &&
                    $book->total_rating <= 50, 'bg-gray-700'=> is_null($book->total_rating)
                        ])>
                        <span>
                            {{ $book->total_rating ? round($book->total_rating) : '-'}}
                        </span>
            </div>
            @if ($book->total_rating > 75)
            must read
            @elseif ($book->total_rating > 50 && $book->total_rating <= 75) its Ok @elseif ($book->total_rating > 0 &&
                $book->total_rating <= 50) meh @else no review @endif </div>
        </div>

</a>