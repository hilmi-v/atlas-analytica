<div>
    <!-- HEADER -->
    <x-header title="Hello" separator progress-indicator>

    </x-header>

    <!-- TABLE  -->
    <div class="grid grid-cols-4 gap-3">
        <x-button class="p-4 text-white bg-good h-fit">
            <div class="flex-col space-y-4">
                <div class="text-3xl font-bold">
                    User
                </div>
                <div class="text-3xl font-bold">
                    {{ $totalUser }}
                </div>
            </div>
        </x-button>
        <x-button class="p-4 text-white bg-primary h-fit">
            <div class="flex-col space-y-4">
                <div class="text-3xl font-bold">
                    Book
                </div>
                <div class="text-3xl font-bold">
                    {{ $totalBook }}
                </div>
            </div>
        </x-button>
        <x-button class="p-4 text-white bg-mid h-fit">
            <div class="flex-col space-y-4">
                <div class="text-3xl font-bold">
                    Category
                </div>
                <div class="text-3xl font-bold">
                    {{ $totalCategory }}
                </div>
            </div>
        </x-button>
        <x-button class="p-4 text-white bg-bad h-fit">
            <div class="flex-col space-y-4">
                <div class="text-3xl font-bold">
                    Review
                </div>
                <div class="text-3xl font-bold">
                    {{ $totalReview }}
                </div>
            </div>
        </x-button>
    </div>

    <!-- FILTER DRAWER -->

</div>