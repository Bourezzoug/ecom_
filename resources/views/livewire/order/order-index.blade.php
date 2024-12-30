<div wire:init="loadItems" class="w-full flex flex-col ">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="m-5">
      <button class="cursor-pointer bg-main text-white px-4 py-2 flex items-center space-x-2 text-sm rounded" wire:click="exportCSV"
        class="px-2 mt-1">
          <svg height="18px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x31_19-excel"><g><g><path d="M476.624,97.457H289.746v57.656h43.131c7.934,0,14.371,6.458,14.371,14.413     c0.001,7.957-6.438,14.415-14.371,14.415h-43.131v28.831h43.131c7.934,0,14.371,6.458,14.371,14.408     c0.001,7.96-6.438,14.417-14.371,14.417h-43.131v28.828h43.131c7.934,0,14.371,6.457,14.371,14.415     c0.001,7.951-6.438,14.409-14.371,14.409h-43.131v28.832h43.131c7.934,0,14.371,6.458,14.371,14.417     c0,7.956-6.438,14.412-14.371,14.412h-43.131v57.653h186.878c7.938,0,14.376-6.455,14.375-14.416V111.87     C490.999,103.913,484.562,97.457,476.624,97.457z M419.125,356.909h-28.75c-7.934,0-14.377-6.456-14.377-14.412     c0-7.959,6.443-14.417,14.377-14.417h28.75c7.933,0,14.373,6.458,14.373,14.417C433.498,350.453,427.058,356.909,419.125,356.909     z M419.125,299.248h-28.75c-7.934,0-14.377-6.458-14.377-14.409c0-7.958,6.443-14.415,14.377-14.415h28.75     c7.933,0,14.373,6.457,14.373,14.415C433.498,292.79,427.058,299.248,419.125,299.248z M419.125,241.596h-28.75     c-7.934,0-14.377-6.457-14.377-14.417c0-7.95,6.443-14.408,14.377-14.408h28.75c7.933,0,14.373,6.458,14.373,14.408     C433.498,235.139,427.058,241.596,419.125,241.596z M419.125,183.939h-28.75c-7.934,0-14.377-6.458-14.377-14.415     c0-7.955,6.443-14.413,14.377-14.413h28.75c7.933,0,14.373,6.458,14.373,14.413C433.498,177.482,427.058,183.939,419.125,183.939     z" style="fill:#FFF;"/><path d="M274.548,43.115c-3.282-2.738-7.681-3.922-11.819-3.053L32.731,83.3     c-6.814,1.275-11.73,7.211-11.73,14.157v317.106c0,6.919,4.916,12.883,11.73,14.157l229.997,43.24     c0.862,0.17,1.754,0.259,2.646,0.259c3.334,0,6.582-1.152,9.172-3.318c3.309-2.734,5.199-6.828,5.199-11.099v-43.239v-57.653     V328.08v-28.832v-28.824v-28.828v-28.826v-28.831v-28.827V97.457V54.219C279.745,49.921,277.854,45.855,274.548,43.115z      M217.338,324.504c-2.732,2.395-6.1,3.578-9.466,3.578c-3.992,0-7.96-1.675-10.809-4.954l-41.799-47.891l-36.659,47.277     c-2.843,3.665-7.071,5.565-11.354,5.565c-3.073,0-6.21-0.98-8.857-3.025c-6.236-4.898-7.388-13.953-2.499-20.241l40.078-51.657     l-39.532-45.317c-5.232-5.97-4.627-15.078,1.351-20.32c5.923-5.25,15.01-4.703,20.269,1.357l35.88,41.102l42.583-54.889     c4.909-6.253,13.938-7.407,20.176-2.504c6.238,4.896,7.395,13.95,2.507,20.238l-45.978,59.271l45.46,52.088     C223.918,310.152,223.316,319.262,217.338,324.504z" style="fill:#FFF;"/></g></g></g><g id="Layer_1"/></svg>
          <span>EXPORT CSV</span>
      </button>
    </div>

<div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
    <div class="flex items-center px-2 py-4">

        <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-5">
        <x-label class="text-xs" for="select" value="{{ __('SortBy Page') }}"/>
        <x-select wire:model.live="perPage" class="mt-1 bg-white text-black">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </x-select>
        </div>
    
        <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-5">
        <x-label class="text-xs" for="select" value="{{ __('SortBy') }}"/>
        <x-select wire:model.live="sortBy" class="mt-1 bg-white text-black">
            <option value="asc">{{ __('ASC') }}</option>
            <option value="desc">{{ __('DESC') }}</option>
        </x-select>
        </div>

        <div class="col-span-3 md:col-span-2 lg:col-span-2 mr-3">
          <x-label class="text-xs" for="startDate" value="{{ __('Start Date') }}"/>
          <x-input wire:model.live="startDate" type="date" id="startDate" class="block w-full mt-1"
                      autocomplete="off"/>
        </div>
        
        <div class="col-span-3 md:col-span-2 lg:col-span-2 mr-3">
          <x-label class="text-xs" for="endDate" value="{{ __('End Date') }}"/>
          <x-input wire:model.live="endDate" type="date" id="endDate" class="block w-full mt-1"
                      autocomplete="off"/>
        </div>

        <div class="col-span-3 md:col-span-2 lg:col-span-2">
          <x-label class="text-xs" for="search" value="{{ __('Search') }}"/>
          <x-input wire:model.live="term" id="search" type="text" class="block w-full mt-1"
                      autocomplete="off"/>
      </div>



    </div>
    <div class="overflow-x-auto w-full">
      <table class="w-full border-collapse border-[#cecece]  text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
        <tr>

            <th scope="col" class="px-6 py-4 font-medium">
              
                Full Name
            </th>
            <th scope="col" class="px-6 py-4 font-medium">Email</th>
            <th scope="col" class="px-6 py-4 font-medium">Total Price</th>
            <th scope="col" class="px-6 py-4 font-medium">Status</th>
            <th scope="col" class="px-6 py-4 font-medium">Created At</th>
            <th scope="col" class="px-6 py-4 font-medium">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">


        @forelse ($orders as $order)

        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-md font-semibold " 
          >
            {{ $order->first_name }} {{ $order->family_name }} 
          </span>
          </td>
          <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-md font-semibold " 
          >

            {{ $order->email }}
          </span>
          </td>
          <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-md font-semibold " 
          >

            {{ $order->total_price }}
          </span>
          </td>
          <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-{{ $order->status == 'unpaid' ? 'red' : 'green' }}-50 px-2 py-1 text-md font-semibold text-{{ $order->status == 'unpaid' ? 'red' : 'green' }}-600"
          >
            <span class="h-1.5 w-1.5 rounded-full bg-{{ $order->status == 'unpaid' ? 'red-600' : 'main' }}"></span>
            {{ $order->status }}
          </span>
          </td>


          <td class="px-6 py-4">
            <div class="flex gap-2">
              <span
                class="inline-flex items-center gap-1 rounded-full px-2 py-1 w-32  text-xs font-semibold"
              >
              {{ date('D jS M Y',strtotime($order->created_at)) }} 
              </span>
            </div>
          </td>
          <td class="px-6 py-4">

            <div class="flex gap-4">

                <div class="cursor-pointer" wire:click="selectedItem('export',{{ $order->id }})"
                    class="px-2 mt-1">
                      <svg height="18px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x31_19-excel"><g><g><path d="M476.624,97.457H289.746v57.656h43.131c7.934,0,14.371,6.458,14.371,14.413     c0.001,7.957-6.438,14.415-14.371,14.415h-43.131v28.831h43.131c7.934,0,14.371,6.458,14.371,14.408     c0.001,7.96-6.438,14.417-14.371,14.417h-43.131v28.828h43.131c7.934,0,14.371,6.457,14.371,14.415     c0.001,7.951-6.438,14.409-14.371,14.409h-43.131v28.832h43.131c7.934,0,14.371,6.458,14.371,14.417     c0,7.956-6.438,14.412-14.371,14.412h-43.131v57.653h186.878c7.938,0,14.376-6.455,14.375-14.416V111.87     C490.999,103.913,484.562,97.457,476.624,97.457z M419.125,356.909h-28.75c-7.934,0-14.377-6.456-14.377-14.412     c0-7.959,6.443-14.417,14.377-14.417h28.75c7.933,0,14.373,6.458,14.373,14.417C433.498,350.453,427.058,356.909,419.125,356.909     z M419.125,299.248h-28.75c-7.934,0-14.377-6.458-14.377-14.409c0-7.958,6.443-14.415,14.377-14.415h28.75     c7.933,0,14.373,6.457,14.373,14.415C433.498,292.79,427.058,299.248,419.125,299.248z M419.125,241.596h-28.75     c-7.934,0-14.377-6.457-14.377-14.417c0-7.95,6.443-14.408,14.377-14.408h28.75c7.933,0,14.373,6.458,14.373,14.408     C433.498,235.139,427.058,241.596,419.125,241.596z M419.125,183.939h-28.75c-7.934,0-14.377-6.458-14.377-14.415     c0-7.955,6.443-14.413,14.377-14.413h28.75c7.933,0,14.373,6.458,14.373,14.413C433.498,177.482,427.058,183.939,419.125,183.939     z" style="fill:#207245;"/><path d="M274.548,43.115c-3.282-2.738-7.681-3.922-11.819-3.053L32.731,83.3     c-6.814,1.275-11.73,7.211-11.73,14.157v317.106c0,6.919,4.916,12.883,11.73,14.157l229.997,43.24     c0.862,0.17,1.754,0.259,2.646,0.259c3.334,0,6.582-1.152,9.172-3.318c3.309-2.734,5.199-6.828,5.199-11.099v-43.239v-57.653     V328.08v-28.832v-28.824v-28.828v-28.826v-28.831v-28.827V97.457V54.219C279.745,49.921,277.854,45.855,274.548,43.115z      M217.338,324.504c-2.732,2.395-6.1,3.578-9.466,3.578c-3.992,0-7.96-1.675-10.809-4.954l-41.799-47.891l-36.659,47.277     c-2.843,3.665-7.071,5.565-11.354,5.565c-3.073,0-6.21-0.98-8.857-3.025c-6.236-4.898-7.388-13.953-2.499-20.241l40.078-51.657     l-39.532-45.317c-5.232-5.97-4.627-15.078,1.351-20.32c5.923-5.25,15.01-4.703,20.269,1.357l35.88,41.102l42.583-54.889     c4.909-6.253,13.938-7.407,20.176-2.504c6.238,4.896,7.395,13.95,2.507,20.238l-45.978,59.271l45.46,52.088     C223.918,310.152,223.316,319.262,217.338,324.504z" style="fill:#207245;"/></g></g></g><g id="Layer_1"/></svg>
                </div>


                <div class="cursor-pointer" wire:click="selectedItem('show',{{ $order->id }})"
                    class="px-2">
                    <x-svg.svg-show class="w-5 h-5  transform hover:text-purple-500 hover:scale-110"/>
                </div>

                <div class="cursor-pointer" wire:click="selectedItem('update',{{ $order->id }})"
                              class="px-2">
                    <x-svg.svg-update class="w-5 h-5  transform hover:scale-110"/>
                </div>





                <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $order->id }})"
                              class="px-2">
                    <x-svg.svg-delete class="w-5 h-5 transform hover:scale-110"/>
                </div>


            </div>
          </td>
        </tr>
        @empty
            
        @endforelse

    </tbody>

    </table>
    </div>
    @if(!empty($orders))
    <div class="px-4 py-3 border-t bg-gray-50">
        {{ $orders->links() }}
    </div>
    @endif

    <livewire:order.order-show />
    <livewire:order.order-update />
    <livewire:order.order-delete />

    </div>

</div>
