<x-layout>
    <div class="max-w-2xl mx-auto py-6">
        <h1 class="text-3xl font-bold mb-4">{{ $recipe->title }}</h1>

        <div class="prose">
            {!! $content !!}
        </div>
    </div>
</x-layout>
