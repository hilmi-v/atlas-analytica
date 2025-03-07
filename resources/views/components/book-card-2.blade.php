@props(['book'])
<div>
    <div class="flex mx-3 lg:max-h-[19rem] max-h-[15rem] rounded">
        <a class="flex items-center justify-center min-h-full p-1 lg:p-2 min-w-fit"
            href="{{ route('homepage.book.detail', $book->slug) }}" wire:navigate>
            <img src="{{ asset('storage/'. $book->cover) }}" alt=""
                class="lg:h-[18rem] rounded mr-2 lg:min-h-[18rem] min-h-[12rem] h-[12rem]" />
        </a>
        <div class="flex flex-col p-1 mt-1 lg:p-4 lg:mt-3">
            <a wire:wire:navigate href="{{ route('homepage.book.detail', $book->slug) }}" wire:navigate
                class="text-lg font-bold lg:text-3xl hover:underline">
                {{ $book->title }}
            </a>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-100 lg:text-lg">
                by
                <span class="font-semibold">{{ $book->author }}</span>
            </p>
            <div class="flex flex-row gap-1 my-3">
                @foreach ($book->categories->take(3) as $category)
                <a href="{{ route('homepage.category.detail', $category->slug) }}" wire:navigate
                    class="p-0.5 text-xs border border-black rounded-lg w-fit dark:border-white  hover:dark:border-blue-500 hover:border-blue-500 lg:p-1 hover:scale-95">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>
            <p class="text-gray-600 dark:text-gray-100 max-h-[12rem] lg:text-base text-xs">
                {{ Str::limit($book->description, 100) }}
            </p>
            <p @class([ 'flex items-center justify-center mt-3 text-lg font-bold text-white rounded-lg lg:text-2xl lg:w-14 lg:h-14 w-9 h-9'
                , 'bg-good'=> $book->total_rating > 75,
                'bg-mid' => $book->total_rating > 50 && $book->total_rating <= 75, 'bg-bad'=> $book->total_rating > 0 &&
                    $book->total_rating <= 50, 'bg-gray-700'=> is_null($book->total_rating)
                        ])>
                        {{ $book->total_rating ? round($book->total_rating) : '-'}}
            </p>
        </div>
    </div>
</div>