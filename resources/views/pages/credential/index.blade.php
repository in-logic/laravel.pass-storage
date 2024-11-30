@extends('layouts.app')

@section('title', 'Credential')

@section('content')

    <div>
        <p>{{ $credential->credential_user }}</p>
        <p>{{ $credential->credential_token }}</p>
    </div>

    <div x-data="{open: false}" x-cloak>

        <div class="flex gap-2">
            <x-ui.button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">
                Edit Credential
            </x-ui.button>

            <x-layout.form action="{{ route('credential.delete', $credential->credential_id)  }}">
                <x-ui.button>
                    <span><i class="fa fa-trash"></i></span>
                    Delete
                </x-ui.button>
            </x-layout.form>
        </div>

        <div x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-5 rounded-lg shadow-lg lg:w-1/3 w-full mx-9">

                <header id="modal-header">
                    <x-ui.button @click="open = false" class="float-right text-gray-500">
                        <i class="fa fa-times"></i>
                    </x-ui.button>
                    <h2 class="text-xl font-bold mb-4">Edit your credential</h2>
                </header>

                <x-layout.form action="{{ route('credential.edit', $credential->credential_id) }}">

                    <div id="modal-body">
                        <x-ui.input type="text" placeholder="Username" label="Username" name="credential_user" value="{{ $credential->credential_user }}" />
                        <x-ui.input type="text" placeholder="Token" label="Token" name="credential_token" value="{{ $credential->credential_token }}" />
                    </div>

                    <div id="modal-buttons" class="flex justify-end gap-5">

                        <x-ui.button
                            type="submit"
                            @click="open = false"
                            class="bg-blue-500 text-white px-4 py-2 rounded">
                            Edit
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
