<div>
    <x-header title="{{ $category->name }} ({{ $category->books_count }})" separator></x-header>
    <div class="flex flex-wrap items-center justify-center w-full max-w-screen-xl gap-3 mx-auto">
        @if ($books->count() > 0)
        @foreach ($books as $book)
        <x-book-card-3 wire:key="{{ $book->id }}" :book="$book" />
        @endforeach
        @else
        <p class="text-3xl font-bold text-center">No books found</p>
        @endif
    </div>
</div>