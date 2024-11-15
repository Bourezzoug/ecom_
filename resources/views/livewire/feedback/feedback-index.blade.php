<div wire:init="loadItems">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedback') }}
        </h2>
    </x-slot>
    <!-- component -->

<div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
    <div class="flex items-center px-2 py-4">

      <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-3">
        <x-label class="text-xs" for="select" value="{{ __('Afficher par page') }}"/>
        <x-select wire:model.live="perPage" class="mt-1 bg-white text-black">
          <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </x-select>
      </div>



      <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-3">
        <x-label class="text-xs" for="select" value="{{ __('SortBy') }}"/>
        <x-select wire:model.live="sortBy" class="mt-1 bg-white text-black">
            <option value="asc">{{ __('ASC') }}</option>
            <option value="desc">{{ __('DESC') }}</option>
        </x-select>
      </div>

      <div class="col-span-3 md:col-span-2 lg:col-span-2">
        <x-label class="text-xs" for="search" value="{{ __('Chercher') }}"/>
        <x-input wire:model.live="term" id="search" type="text" class="block w-full mt-1 bg-white text-black"
                    autocomplete="off"/>
    </div>

    </div>
    <div class="overflow-x-auto w-full">
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Full Name</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Feedback</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Created At</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">


        @forelse ($feedbacks as $feedback)
        {{-- @unless(Auth::user()->id === $user->id) --}}

        <tr class="hover:bg-gray-50">
          
          <td class="px-6 py-4">
            <span
              class="inline-flex items-center gap-1 rounded-full bg-neutral-50 px-2 py-1 text-md font-semibold text-indigo-600"
            >
              <span class="h-1.5 w-1.5 rounded-full bg-indigo-600"></span>
              {{ $feedback->full_name }}
            </span>
          </td>

          <td class="px-6 py-4">
            <span
              class="inline-flex items-center gap-1 rounded-full bg-neutral-50 px-2 py-1 text-md font-semibold text-indigo-600"
            >
              <span class="h-1.5 w-1.5 rounded-full bg-indigo-600"></span>
              {{ $feedback->feedback }}
            </span>
          </td>
          
          <td class="px-6 py-4">
            <div class="flex gap-2">
              <span
                class="inline-flex items-center gap-1 rounded-full bg-indigo-50 w-32 px-6 py-1 text-xs font-semibold text-indigo-600"
              >
              {{ date('jS M Y',strtotime($feedback->created_at)) }} 
              </span>
            </div>
          </td>
        </tr>

        @empty
            
        @endforelse

    </tbody>
  
    </table>
    </div>
    @if(!empty($feedbacks))
    <div class="px-4 py-3 border-t bg-gray-50">
        {{ $feedbacks->links() }}
    </div>
    @endif
    </div>

</div>
