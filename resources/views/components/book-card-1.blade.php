@props(['book'])
@php
$test = 100;
@endphp
<a wire:wire:navigate href="{{ route('homepage.book.detail', $book->slug) }}"
    class="dark:border-gray-600 border group relative flex flex-col lg:h-[24rem] h-[22rem] w-full lg:min-w-[18rem] min-w-[15rem] lg:max-w-[18rem] max-w-[15rem] p-4 overflow-hidden transition-all rounded-lg shadow-lg">
    <div @class([ 'absolute top-0 left-0 w-full h-[40%]' , 'bg-good'=> $book->total_rating > 75,
        'bg-mid' => $book->total_rating > 50 && $book->total_rating <= 75, 'bg-bad'=> $book->total_rating > 0 &&
            $book->total_rating <= 50, 'bg-transparent'=> is_null($book->total_rating)
                ])></div>
    <div class="absolute bottom-0 left-0 w-full h-[60%] bg-gray-100 dark:bg-gray-800"></div>
    <div class="flex items-center justify-center mx-auto">
        <img src="{{ asset('storage/'.$book->cover) }}" alt="Book Cover"
            class="relative object-cover w-32 rounded-md min-w-32 lg:w-40 lg:min-w-40 group-hover:scale-105" />
    </div>
    <div class="relative flex justify-between flex-grow w-full gap-3 px-1 pr-5 mx-auto mt-6 ">
        <div class="w-[85%] dark:text-white">
            <h2 class="text-lg font-bold lg:text-xl">
                {{ $book->title }}
            </h2>
            <p class="text-sm">{{ $book->author }}</p>
        </div>
        <div class="w-[15%]">
            <p @class([ 'flex items-center justify-center w-10 h-10 text-xl font-bold text-white rounded-md md:w-12 md:h-12 md:text-2xl'
                , 'bg-good'=> $book->total_rating > 75,
                'bg-mid' => $book->total_rating > 50 && $book->total_rating <= 75, 'bg-bad'=> $book->total_rating > 0 &&
                    $book->total_rating <= 50, 'bg-gray-700'=> is_null($book->total_rating)
                        ])>
                        {{ $book->total_rating ? round($book->total_rating) : '-'}}
            </p>
        </div>
    </div>
</a>