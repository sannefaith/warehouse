@extends('layouts.app')

@section('content')
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <main>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Property Info</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        This is information about the property and will be displayed publicly.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="/p" method="POST" enctype="multipart/form-data">
                                @csrf

                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                                        Name
                                                    </label>
                                                    <div class="mt-1 flex rounded-md shadow-sm  border border-r-0">
                                                        <!-- <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                            Property
                                                        </span> -->
                                                        <input value="{{ old('caption') }}" type="text" name="title" id="title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Property name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <label for="description" class="block text-sm font-medium text-gray-700">
                                                    Description
                                                </label>
                                                <div class="mt-1">
                                                    <textarea value="{{ old('caption') }}" id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="This property has ..."></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Brief description of the property. URLs are hyperlinked.
                                                </p>
                                            </div>

                                            <div>
                                                <label for="location" class="block text-sm font-medium text-gray-700">
                                                    Location
                                                </label>
                                                <div class="mt-1">
                                                    <textarea value="{{ old('caption') }}" id="location" name="location" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder=""></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Where is the warehouse located. Please be as precise as possible.
                                                </p>
                                            </div>

                                            <div>
                                                <label for="size" class="block text-sm font-medium text-gray-700">
                                                    Size
                                                </label>
                                                <div class="mt-1">
                                                    <textarea value="{{ old('caption') }}" id="size" name="size" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder=""></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Size of the property in sq. feet
                                                </p>
                                            </div>

                                            <div>
                                                <label for="price" class="block text-sm font-medium text-gray-700">
                                                    Price
                                                </label>
                                                <div class="mt-1">
                                                    <textarea value="{{ old('caption') }}" id="price" name="price" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder=""></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Price of the property in Dollars. Express in digits.
                                                </p>
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Property photo
                                                </label>
                                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                    <div class="space-y-1 text-center">
                                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <div class="flex text-sm text-gray-600">
                                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                                <span>Upload a file</span>
                                                                <input id="image" name="image" type="file" class="sr-only">
                                                            </label>
                                                            <p class="pl-1">or drag and drop</p>
                                                        </div>
                                                        <p class="text-xs text-gray-500">
                                                            PNG, JPG, GIF up to 10MB
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </div>
@endsection