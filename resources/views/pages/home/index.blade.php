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

            <div>
                @if (count($credentials) > 0)

                    @foreach ($credentials as $credential)
                        <div>
                            <h3>{{ $credential->credential_user }}</h3>
                            <p>{{ $credential->credential_token }}</p>

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
