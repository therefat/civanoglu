<x-guest-layout>

    <div class="relative z-10 pt-48 pb-52 bg-cover bg-center" style="background-image: url(/img/hero-bg.jpg)">
        <div class="absolute h-full w-full bg-black opacity-70 top-0 left-0 z-10"></div>
        <div class="container relative z-20 text-white text-center text-xl md:text-2xl">
            <h2 class="font-bold text-3xl md:text-5xl mb-8">Find your best property,<br/> And live quality life.</h2>
            <p>We will try finding the best one for you. Please search using the form below.</p>
        </div>
    </div>
    <!-- Search From Area -->
    <div class="-mt-20 md:-mt-10">
        <div class="container">
            <div class="rounded-lg bg-white p-4 relative z-20 shadow-lg home-search">
                @include('components.property-search-form')
            </div>

        </div>
    </div>
    <!-- Last Added Objects -->
    <div class="container pt-14">
        <h2 class="section-heading">Best properties</h2>
        <div class="flex flex-wrap -mx-3 mt-10">

                @include('components.single-property-card', [ 'width' => 'md:w-1/4 w-full'])

        </div>
    </div>
    <div class="py-30 text-center">
        <div class="container">
            <h2 class="font-bold text-2xl text-4xl mb-6">Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit. Architecto ea laborum <span class="underline">modi nemo.</span></h2>
            <p class="text-gray-500 text-2xl mb-7 font-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, recusandae.</p>
            <a href="" class="border-2 border-gray-700 rounded-2xl text-xl px-8 py-3 inline-block">Start The Searching</a>
            <h2 class="font-bold text-2xl text-4xl mt-12 mb-6">Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit. Architecto ea laborum <span class="underline">modi nemo.</span></h2>

        </div>

    </div>
    </x-guest-layout>
