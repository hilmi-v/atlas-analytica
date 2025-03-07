@props(
["border" => false, "isDetail"=> false, 'review']
)


<div x-data="{ 'full': false, description: @js($review->review) }">
    <div class="flex flex-col mb-2 rounded {{ $border ? 'border' : '' }}">
        <div class="flex">
            @if (!$isDetail)
            <a wire:wire:navigate href="{{ route('homepage.book.detail', $review->book->slug) }}"
                class="p-1 md:p-2 min-w-fit">
                <img src="{{ asset('storage/'. $review->book->cover) }}" alt=""
                    class="md:h-[6rem] rounded mr-2 md:min-h-[6rem] min-h-[14rem] h-[14rem]" />
            </a>
            @else
            <p @class([ 'flex items-center justify-center m-2 font-bold text-white rounded-md w-12 h-12' , 'bg-good'=>
                $review->rating > 75,
                'bg-mid' => $review->rating > 50 && $review->rating <= 75, 'bg-bad'=> $review->rating > 0 &&
                    $review->rating <= 50, 'bg-transparent'=> is_null($review->rating)
                        ])>
                        {{ $review->rating }}
            </p>
            @endif
            <div class="flex items-center gap-3 p-1 md:p-1">
                <div class="flex flex-col">
                    <div class="flex gap-2 mb-1">
                        @if ($review->user->avatar)
                        <img src="{{ asset('storage/'. $review->user->avatar) }}" class="w-8 h-8 rounded-full" alt="" />
                        @else
                        <x-icon name="o-user" class="w-8 h-8 p-1 border rounded-full" />
                        @endif
                        <h1 class="font-medium">{{ $review->user->username }}</h1>
                    </div>
                    @if (!$isDetail)

                    <div class="">
                        <a href="{{ route('homepage.book.detail', $review->book->slug) }}" wire:navigate
                            class="text-lg font-bold md:text-xl hover:underline ">
                            {{ $review->book->title }}
                        </a>
                        <span class="mt-1 text-sm font-normal text-gray-600 dark:text-gray-100">
                            by
                            <span class=""> {{ $review->book->author }} </span>
                        </span>
                    </div>
                    <p @class([ 'flex items-center justify-center my-1 font-bold text-white rounded-md w-9 h-9'
                        , 'bg-good'=> $review->rating > 75,
                        'bg-mid' => $review->rating > 50 && $review->rating <= 75, 'bg-bad'=> $review->rating > 0 &&
                            $review->rating <= 50, 'bg-transparent'=> is_null($review->rating)
                                ])>
                                {{ $review->rating }}
                    </p>
                    @endif

                </div>
            </div>
        </div>
        <div class="px-2 pb-2 text-base">
            <div x-show="description.length > 100">
                <p x-text=" full ? description : description.substr(0, 100)">
                </p>
                <button class="text-sm text-blue-600 hover:underline" @click="full = !full">
                    <p x-text="full ? 'read less' : 'read more'">
                    </p>
                </button>
            </div>
            <div x-show="description.length < 100">
                <p x-text="description">
                </p>
            </div>

        </div>
    </div>


</div>
