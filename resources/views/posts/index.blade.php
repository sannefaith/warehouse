@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <div class="grid grid-cols-3 gap-4">
                    @foreach( Auth::user()->posts as $post)
                    <div class="p-10">
                        <div class="max-w-md rounded overflow-hidden shadow-lg">
                            <div class="image">
                                <a href="/p/{{ $post->id }}">
                                    <img src="/storage/{{ $post->image }}" alt="" class="w-full" class="lazy">
                                </a>
                            </div>
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                                <p class="text-gray-700 text-base">
                                $ {{ $post->price }}
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12">
                    {{ $posts->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection