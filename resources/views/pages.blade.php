<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @foreach ($posts as $post)
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-light font-bold text-gray-900">{{ $post['title'] }}</h2>
        </a>
        <div class="text-base text-gray-500">
            By <a href="{{ $post->author->username }}" class="hover:underline">{{ $post->author->name }}</a> | 
            @if($post->created_at)
                {{ $post->created_at->format('j F Y') }}
            @endif
        </div>
        <p class="my-4 font-light">{{ Str::limit($post['body'], 200) }}
        </p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
    </article>
    @endforeach
</x-layout>