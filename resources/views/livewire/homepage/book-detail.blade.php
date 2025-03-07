<div x-data="{ 'full': false, description: @js($book->description) }">
    {{-- Book detail --}}
    <div class="relative pt-9">
        <div class="absolute top-0 left-0 w-full h-40 bg-green-400"></div>
        <div class="relative flex max-w-screen-xl p-4 mx-auto bg-white rounded-md shadow dark:bg-gray-800">
            <div class="relative ml-4">
                <img src="{{ asset('storage/'. $book->cover) }}" class="w-full rounded-md max-w-72 min-w-72" alt="" />
            </div>
            <div class="ml-10 pe-3">
                <div class="flex items-center gap-5 mb-2">
                    <p @class([ 'flex items-center justify-center w-10 h-10 text-xl font-bold text-white rounded-md md:w-16 md:h-16 md:text-3xl '
                        , 'bg-good'=> $book->total_rating > 75,
                        'bg-mid' => $book->total_rating > 50 && $book->total_rating <= 75, 'bg-bad'=>
                            $book->total_rating > 0 &&
                            $book->total_rating <= 50, 'bg-gray-700'=> is_null($book->total_rating)
                                ])>
                                {{ $book->total_rating ? round($book->total_rating) :'-'}}
                    </p>
                    <div class="">
                        <h1 class="mb-2 text-4xl font-bold">{{ $book->title }}</h1>
                        <h2 class="mb-1 text-lg">
                            created at
                            <span class="font-medium">{{ $book->created_at }}</span>
                            write by
                            <span class="font-medium">{{ $book->author }}</span>
                        </h2>
                    </div>
                </div>

                <p class="text-lg font-bold">Sinopsis</p>
                <p class="">
                <p x-text="full ? description : description.substr(0, 150) +  '...'"></p>
                <button class="text-sm text-blue-600 hover:underline" @click="full = !full">
                    <p x-text="full ? 'read less' : 'read more'">
                    </p>
                </button>
                </p>
                <div class="mt-2">
                    <p class="text-lg font-bold">Detail buku</p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="py-1 pr-4">Jumlah halaman</td>
                                <td class="">: {{ $book->pages }} halaman</td>
                                <td class="py-1 pl-4">Penerbit</td>
                                <td class="pr-8">: {{ $book->published_by }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 pr-4">Bahasa</td>
                                <td>: {{ $book->language }}</td>
                                <td class="py-1 pl-4">Kategori</td>
                                <td class="pr-8">:
                                    @foreach ($book->categories as $category)
                                    <span
                                        class="inline-block px-2 py-1 mr-1 text-xs font-semibold text-gray-700 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-white">
                                        {{ $category->name }}
                                    </span>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="my-12"></div>
    <x-header title="Your Review" size='xl'></x-header>
    @auth
    @if ($userReview)
    <x-review-card :review="$userReview" isDetail />
    <x-button class="btn-warning" label="edit review" @click="$wire.createModal = true"></x-button>
    @else
    <x-button class="btn-success" label="add review" @click="$wire.createModal = true"></x-button>
    @endif
    @endauth
    @guest
    <x-button class="btn-outline" label="login to review" link="/login"></x-button>

    @endguest

    {{-- modal --}}
    <x-modal wire:model="createModal" persistent class=" backdrop-blur">
        <x-header title="Write" size='lg' separator></x-header>
        <div class="flex flex-col space-y-2">
            <x-input min="1" max="100" type="number" label="rating" wire:model="rating" x-mask="999"
                hint="rating 1 - 100" required />
            <x-textarea label="Review :" wire:model="review" required rows="3" hint="optional" />
        </div>
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.createModal = false" />
            <x-button label="{{ $userReview ? 'Update' : 'Create' }}"
                class=" {{ $userReview ? 'btn-warning' : 'btn-success' }}" wire:click='createReview'
                spinner="createReview" />

        </x-slot:actions>
    </x-modal>


    {{-- review List --}}
    <div class="my-12"></div>

    <x-header title="All Reviews & Ratings" size='xl'></x-header>
    <div class="grid grid-cols-2 gap-4 mx-auto mt-10">
        @foreach ($reviews as $review)
        <x-review-card isDetail="true" :review="$review" />
        @endforeach
    </div>
    {{ $reviews->links() }}
</div>
