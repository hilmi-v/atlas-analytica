<div>
    <div class=" flex items-center justify-center flex-col">
        <img src="{{ $user->avatar ? asset('storage/'.$user->avatar):'https://placehold.co/400' }}"
            class="w-40 h-40 rounded-full mb-3" />
        <h1 class="text-center font-bold dark:text-white text-2xl">{{ $user->username }}</h1>
        <p class="text-center text-gray-800 dark:text-gray-100">{{ $user->about_me }}</p>
    </div>
    <x-header title="{{ $user->username }}'s reviews" size="text-xl" separator></x-header>
    <div class="grid grid-cols-1 gap-3 px-3 mt-5 md:max-h-[89vh] md:overflow-auto md:grid-cols-2 ">
        @foreach ($user->reviews as $review)
        <div x-data="{ 'full': false, description: @js($review->review) }">
            <div class="flex flex-col mb-2 border rounded ">
                <div class="flex">
                    <a wire:wire:navigate href="{{ route('homepage.book.detail', $review->book->slug) }}"
                        class="p-1 md:p-2 min-w-fit">
                        <img src="{{ asset('storage/'. $review->book->cover) }}" alt=""
                            class="md:h-[6rem] rounded mr-2 md:min-h-[6rem] min-h-[14rem] h-[14rem]" />
                    </a>

                    <div class="flex items-center gap-3 p-1 md:p-1">
                        <div class="flex flex-row">
                            <p @class([ 'flex items-center justify-center my-1 font-bold text-white rounded-md w-12 h-12'
                                , 'bg-good'=> $review->rating > 75,
                                'bg-mid' => $review->rating > 50 && $review->rating <= 75, 'bg-bad'=> $review->rating >
                                    0 &&
                                    $review->rating <= 50, 'bg-transparent'=> is_null($review->rating)
                                        ])>
                                        {{ $review->rating }}
                            </p>
                            <div class="ml-3 ">
                                <a href="{{ route('homepage.book.detail', $review->book->slug) }}" wire:navigate
                                    class="text-lg font-bold md:text-xl hover:underline ">
                                    {{ $review->book->title }}
                                </a>
                                <span class="mt-1 text-sm font-normal text-gray-600 dark:text-gray-100">
                                    by
                                    <span class=""> {{ $review->book->author }} </span>
                                </span>
                                <div class="pb-2 text-base ">
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
                    </div>
                </div>

            </div>
        </div>

        @endforeach
    </div>
</div>