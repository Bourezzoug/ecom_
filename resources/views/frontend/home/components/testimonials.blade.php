<section id="testimonials" class="bg-cover bg-center mt-16 py-28" style="background-image: url('{{ asset('images/testimonials-bg.jpg') }}')">
    <div class="container mx-auto p-6 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse ($feedback as $item)
        <div class="card bg-white w-full px-6 py-14 rounded-xl shadow-xl">
            <div class="flex items-center space-x-1">
                <svg aria-hidden="true" focusable="false" role="presentation" width="15" class="icon icon-star" viewBox="0 0 20 19">
                    <path fill="#ffc107" d="M10 15.258l-6.197 3.756 1.643-7.042L0 7.23l7.183-.61L10 0l2.817 6.62L20 7.23l-5.446 4.742 1.643 7.042z" fill-rule="evenodd"></path>
                </svg>
                <svg aria-hidden="true" focusable="false" role="presentation" width="15" class="icon icon-star" viewBox="0 0 20 19">
                    <path fill="#ffc107" d="M10 15.258l-6.197 3.756 1.643-7.042L0 7.23l7.183-.61L10 0l2.817 6.62L20 7.23l-5.446 4.742 1.643 7.042z" fill-rule="evenodd"></path>
                </svg>
                <svg aria-hidden="true" focusable="false" role="presentation" width="15" class="icon icon-star" viewBox="0 0 20 19">
                    <path fill="#ffc107" d="M10 15.258l-6.197 3.756 1.643-7.042L0 7.23l7.183-.61L10 0l2.817 6.62L20 7.23l-5.446 4.742 1.643 7.042z" fill-rule="evenodd"></path>
                </svg>
                <svg aria-hidden="true" focusable="false" role="presentation" width="15" class="icon icon-star" viewBox="0 0 20 19">
                    <path fill="#ffc107" d="M10 15.258l-6.197 3.756 1.643-7.042L0 7.23l7.183-.61L10 0l2.817 6.62L20 7.23l-5.446 4.742 1.643 7.042z" fill-rule="evenodd"></path>
                </svg>
                <svg aria-hidden="true" focusable="false" role="presentation" width="15" class="icon icon-star" viewBox="0 0 20 19">
                    <path fill="#ffc107" d="M10 15.258l-6.197 3.756 1.643-7.042L0 7.23l7.183-.61L10 0l2.817 6.62L20 7.23l-5.446 4.742 1.643 7.042z" fill-rule="evenodd"></path>
                </svg>
            </div>
            <p class="text-gray-400 font-medium mt-3">
                {{ $item->feedback }}
            </p>
            <div class="flex items-center space-x-4 mt-5">
                <div>
                    <p class="text-sm font-semibold">
                        {{ $item->full_name }}                  
                    </p>
                    <p class="mt-1 text-sm">
                        {{ $item->profession }}                 
                    </p>
                </div>
            </div>
        </div>
        @empty
            
        @endforelse

    </div>
</section>