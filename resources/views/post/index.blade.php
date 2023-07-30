@extends('layouts.index')

@section('main')
    <section>
        <h1 class="text-4xl text-center"><span class="underline">Amirul</span> 🚀</h1>
        <div class="mt-8 text-center">
            <h2>Time travel:</h2>
            @if ($timeTravelPosts->isEmpty())
                @auth
                    <div class="mt-2">
                        <a href="{{ route('posts.create') }}"
                            class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm">Create milestone</a>
                    </div>
                @endauth
            @else
                <div class="mt-2 flex gap-2 flex-wrap justify-center">
                    @foreach ($timeTravelPosts as $timeTravelPost)
                        <a href="{{ route('posts.index', ['time-travel' => $timeTravelPost->id]) }}"
                            class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm @if ($selectedTimeTravelPost->id !== $timeTravelPost->id) opacity-50 @endif">{{ $timeTravelPost->title }}</a>
                    @endforeach
                </div>
                <div class="text-xl text-center mt-8">
                    {{-- solution to split end of line https://stackoverflow.com/a/3997367/15254140 --}}
                    @php
                        $paragraphs = preg_split('/\r\n|\r|\n/', $selectedTimeTravelPost->text);
                    @endphp
                    @foreach ($paragraphs as $paragraph)
                        <p class="text-xl mt-8">{{ $paragraph }}</p>
                    @endforeach
                    <a href="{{ route('posts.edit', ['post' => $selectedTimeTravelPost]) }}"
                        class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm inline-block mt-2">Edit</a>
                </div>
            @endif
        </div>
        <div class="mt-8 text-center">
            @include('partials.social')
        </div>
    </section>
    <section class="mt-16">
        <nav class="text-xl gap-6 flex justify-center">
            <a href="{{ route('posts.index', ['category' => '1']) }}" class="text-center"><span
                    class="@if ($states['category'] === '1') underline text-blue-300 @endif">Daily Update</span> ✨</a>
            <a href="{{ route('posts.index', ['category' => '2']) }}" class="text-center"><span
                    class="@if ($states['category'] === '2') underline text-blue-300 @endif">Long
                    Essays</span> 🌟</a>
            <a href="{{ route('posts.index', ['category' => '3']) }}" class="text-center"><span
                    class="@if ($states['category'] === '3') underline text-blue-300 @endif">Apps</span>
                🚀</a>
        </nav>
        <div class="mt-8 flex gap-2 flex-wrap justify-center">
            <a href="{{ route('posts.index', ['sort' => 'desc']) }}"
                class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm @if ($states['sort'] !== 'desc') opacity-50 @endif">Newest
                To Oldest</a>
            <a href="{{ route('posts.index', ['sort' => 'asc']) }}"
                class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm @if ($states['sort'] !== 'asc') opacity-50 @endif">Oldest
                To
                Newest</a>
            @auth
                <a href="{{ route('posts.create') }}"
                    class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm flex items-center justify-center">New
                    Post</a>
            @endauth
        </div>
    </section>
    <section class="mt-8 flex flex-col gap-6">
        @foreach ($posts as $post)
            <a href="{{ route('posts.show', ['post' => $post]) }}">
                <div class="p-4 bg-[#171717] rounded-md text-center">
                    <h2 class="text-2xl">🗓️ {{ $post->created_at }} | {{ $post->title }}</h2>
                    <p class="mt-4">{{ substr($post->text, 0, 164) }}...</p>
                </div>
            </a>
        @endforeach
    </section>
@endsection
