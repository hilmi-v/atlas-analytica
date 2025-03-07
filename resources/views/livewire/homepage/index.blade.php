<div>
    <x-home-hero></x-home-hero>
    <x-header title="New Books" subtitle="check out our latest books" separator size="text-xl"></x-header>
    <div class="flex flex-row pb-3 mb-6 space-x-4 overflow-x-auto ">
        @foreach ($books as $book)
        <x-book-card-1 wire:key="{{ $book->id }}" :book="$book" />
        @endforeach
    </div>
    <x-home-banner />
    <x-header title="Popular Books" subtitle="check out our popular books" separator size="text-xl"></x-header>
    <div class="grid grid-cols-2 gap-3 mb-5">
        @foreach ($books->take(6) as $book)
        <x-book-card-2 wire:key="{{ $book->id }}" :book="$book" />
        @endforeach
    </div>
    <x-header title="latest review" subtitle="check out our latest review" separator size="text-xl"></x-header>
    <div class="grid grid-cols-2 gap-3">
        @foreach ($reviews as $review)
        <x-review-card wire:key="{{ $review->id }}" :review="$review" />
        @endforeach
    </div>
</div>
</div>