@extends('layouts.index')

@section('main')
    <main class="mt-16 md:w-[768px]">
        <form class="flex flex-col gap-4" action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="title">Title</label>
                <input class="bg-[#212529]" type="text" name="title">
            </div>
            <div class="flex flex-col gap-2">
                <label for="text">Text</label>
                <textarea class="text-white bg-[#212529]" name="text" id="text"></textarea>
            </div>
            <div class="flex flex-col gap-2">
                <label for="text">Category</label>
                <select name="category_id" id="category" class="bg-[#212529]">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="mt-4 px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm">Create</button>
        </form>
    </main>
@endsection
