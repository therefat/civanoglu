<x-app-layout>
    <x-slot name="header">
{{--        <h2 class="font-semibold text-xl text-gray-500 leading-light">--}}
{{--            {{__('Properties')}}--}}
{{--        </h2>--}}
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Properties</h2>

            <div class="min-w-max">
                <a href="{{route('add-property')}}" class="fullwidth-btn">Add New</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto">
                       <thead>
                       <tr>
                           <th class="border px-4 py-2">Name:</th>
                           <th class="border px-4 py-2">Location</th>
                           <th class="border px-4 py-2">Price</th>
                           <th class="border px-4 py-2">Action</th>
                       </tr>
                       </thead>
                        <tbody>
                            @foreach($properties as $propertiy)
                                <tr>
                                    <th class="border px-4 py-2">{{$propertiy->name}}</th>
                                    <th class="border px-4 py-2">{{$propertiy->location->name}}</th>
                                    <th class="border px-4 py-2">{{$propertiy->price}}</th>
                                    <th class="border px-4 py-2">

                                        <a class="bg-blue-500 text-white px-4 py-2 text-xs rounded" href="">Edit</a>
                                        <a class="bg-green-500 text-white px-4 py-2 text-xs rounded" href="{{route('edit-property', $propertiy->id)}}" target="_blank">Delete</a>
                                        <form onsubmit="return confirm('Mülkü gerçekten silmek istiyor musunuz?');" action="" method="post" class="inline-block"> @csrf @method('delete')
                                            <button style="height: 27px;top:1.5px" type="submit" class="bg-red-500 text-white px-4 py-2 text-xs rounded relative">Update</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$properties->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
