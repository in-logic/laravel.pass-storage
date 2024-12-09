@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>
        Welcome, {{ $user->username }}!
    </h1>

    <div>
        <x-layout.form action="{{ route('credential.export.all') }}">
            <x-ui.button>
                Export
            </x-ui.button>
        </x-layout.form>

        <section>
            <h2>Credentials</h2>
            <x-ui.input type="text" placeholder="Search" label="Search" name="search" />

            <div class="flex flex-col gap-2 px-2">
                @if (count($credentials) > 0)

                    @foreach ($credentials as $credential)

                        <div class="flex flex-col w-full justify-center  shadow-lg bg-white p-4 rounded-md">
                            <div class="flex gap-2 items-center">
                                <i class="fa {{ $credential->application_icon }} text-3xl"></i>
                                <h1 class="text-3xl">
                                    {{$credential->application_name}}
                                </h1>
                            </div>

                            <hr class="my-2">

                            <div class="flex justify-between w-full p-2">
                                <div>
                                    <article class="">
                                        <span class="text-sm text-gray-600 font-medium">user</span>
                                        <p class="flex text-3xl font-bold cursor-pointer hover:bg-gray-100 px-2 rounded-md">{{ $credential->credential_user }}</p>
                                    </article>

                                    <article class="">
                                        <span class="text-sm text-gray-600 font-medium">credential</span>
                                        <p class="text-2xl font-bold items-center cursor-pointer hover:bg-gray-100 px-2 rounded-md">
                                            {{ str_repeat('*', strlen($credential->credential_token)) }}
                                            <i class="fa fa-eye text-sm text-gray-400 cursor-pointer"></i>
                                        </p>
                                    </article>
                                </div>
    
                                <div>
                                    <x-layout.form action="{{ route('credential.delete', $credential->credential_id)  }}">
                                        <x-ui.button>
                                            <span><i class="fa fa-trash"></i></span>
                                            Delete
                                        </x-ui.button>
                                    </x-layout.form>
    
                                    <a href="{{ route('credential', $credential->credential_id) }}">
                                        <x-slot name="icon">
                                            <i class="fa fa-pencil"></i>
                                        </x-slot>
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <p>No credentials found.</p>
                @endif
            </div>
        </section>
    </div>

    <div x-data="{ open: false }" x-cloak>

        <x-ui.button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">
            Add Credential
        </x-ui.button>

        <div x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-5 rounded-lg shadow-lg lg:w-1/3 w-full mx-9">

                <header id="modal-header">
                    <x-ui.button @click="open = false" class="float-right text-gray-500">
                        <i class="fa fa-times"></i>
                    </x-ui.button>
                    <h2 class="text-xl font-bold mb-4">Add your credential</h2>
                </header>

                <x-layout.form action="{{ route('credential.add') }}">

                    <div id="modal-body">
                        <x-ui.input type="text" placeholder="Username" label="Username" name="credential_user" />
                        <x-ui.input type="text" placeholder="Token" label="Token" name="credential_token" />

                        <x-ui.select name="application" :options="$applications"/>
                    </div>

                    <div id="modal-buttons" class="flex justify-end gap-5">

                        <x-ui.button
                            type="submit"
                            @click="open = false"
                            class="bg-blue-500 text-white px-4 py-2 rounded">
                            Add
                        </x-ui.button>

                        <x-ui.button
                            type="button"
                            @click="open = false"
                            class="text-black px-4 py-2 rounded">
                            Cancel
                        </x-ui.button>

                    </div>
                </x-layout.form>
            </div>
        </div>
    </div>
@endsection
