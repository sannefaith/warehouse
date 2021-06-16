@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="grid grid-cols-3 gap-4">

                <div class="header">
                    <h5 class="user-name ml-10"><strong><a href="#">{{ Auth::user()->name }}</a></strong></h5>
                    <img class="user-name ml-7" src="https://bit.ly/3pDqitq" alt="" width="200px" height="200px">
                </div>

                <div class="description">
                    <div class="mb-5">
                        <h5 class="mb-3"><strong>Description</strong></h5>
                        <p>{{ $user->profile->description }}</p>
                    </div>
                    <p><strong>Posts: </strong>{{ $user->posts->count() }}</p>
                    <p><strong>Bookmarks: </strong>2</p>
                </div>

                <div class="move-buttons ml-10">
                    <h5 class="mb-3"><strong>Contact Info</strong></h5>
                    <div class="contact-info">
                        <div class="d-flex">
                            <p><strong>Email: </strong></p>{{ Auth::user()->email }}
                        </div>
                        <div class="d-flex">
                            <p> <strong>Phone: +</strong></p>{{ $user->profile->phone }}
                        </div>
                        <div class="d-flex">
                            <p> <strong>Office: </strong></p>{{ $user->profile->office }}
                        </div>


                    </div>
                    <div class="mt-6 move-buttons">
                        @can('update', $user->profile)
                        <a href="/p/create"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Post</button></a>
                        <a href="/profile/{{ $user->id }}/edit"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Profile</button></a>
                        @endcan
                    </div>
                </div>
            </div>

            <hr class="mt-10 mb-10">

            <div class="flex items-center justify-center w-full mb-10">
                <label for="toggleB" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" id="toggleB" class="sr-only">
                        <div class="block bg-gray-400 w-14 h-8 rounded-full"></div>
                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                    </div>
                    <div class="ml-3 text-gray-700 font-medium">
                        Bookmarks
                    </div>
                </label>
            </div>

            <div class="grid grid-cols-3 gap-4">

                @foreach( Auth::user()->posts as $post)
                <div class="image">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" alt="">
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection