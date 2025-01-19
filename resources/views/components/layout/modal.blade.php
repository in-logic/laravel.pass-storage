@props(['header', 'body'])

<div x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white p-5 rounded-lg shadow-lg lg:w-1/3 w-full mx-9">

      @isset($header)
        <header id="modal-header">
          <x-ui.button @click="open = false" class="float-right text-gray-500">
              <i class="fa fa-times"></i>
          </x-ui.button>
          {{ $header }}
        </header>  

        <hr class="my-2">
      @endisset

     @isset($body)
        {{ $body }}
     @endisset
  </div>
</div>