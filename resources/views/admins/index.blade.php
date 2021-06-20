@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="grid grid-cols-3 gap-4">

                        <div class="header">
                            <h5 class="user-name ml-10"><strong><a href="#">{{ Auth::user()->name }}</a></strong></h5>
                            <img class="user-name ml-7 rounded-circle" src="{{ auth()->user()->profile->profileImage() }}" alt="" width="200px" height="200px">
                        </div>

                        <div class="description">
                            <div class="mb-5">
                                <h5 class="mb-3"><strong>Description</strong></h5>
                                <p>{{ auth()->user()    ->profile->description }}</p>
                            </div>
                            @if(auth()->user()->isOwner())
                            @can('update', auth()->user() ->profile)
                            <p><strong>Posts: </strong>{{ auth()->user()->posts->count() }}</p>
                            @endcan
                            @endif
                        </div>

                        <div class="move-buttons ml-10">
                            <h5 class="mb-3"><strong>Contact Info</strong></h5>
                            <div class="contact-info">
                                <div class="d-flex">
                                    <p><strong>Email: </strong></p>{{ Auth::user()->email }}
                                </div>
                                <div class="d-flex">
                                    <p> <strong>Phone: +</strong></p>{{ auth()->user()->profile->phone }}
                                </div>
                                <div class="d-flex">
                                    <p> <strong>Office: </strong></p>{{ auth()->user()->profile->office }}
                                </div>


                            </div>
                        </div>
                    </div>

                   <div class="mt-5">
                   @include('layouts.adminNavbar')
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection