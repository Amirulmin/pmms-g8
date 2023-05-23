<x-app-layout>
    <x-slot:title>Admin Announcement List</x-slot>

    <div class="p-6 w-full max-w-4xl mx-auto" x-data="{ openPopMesg: true }">
        <!-- success message -->
        @if ($message = Session::get('success'))
        <div class="px-4 py-2 mb-4 flex justify-between items-center w-full bg-green-400 text-gray-50 font-bold" x-show="openPopMesg" x-transition>
            <p>{{ $message  }}</p>
            <button class="flex items-center" x-on:click="openPopMesg = false">
                <span class="material-symbols-outlined font-medium">close</span>
            </button>
        </div>
        @endif

        <div class="grid grid-cols-12 items-center w-full">
            <h1 class="col-span-6 text-3xl font-semibold text-gray-800">Announcement List</h1>
            <div class="col-span-6 justify-self-end">
                <a class="py-2 px-4 rounded bg-amber-500 hover:bg-amber-700 font-medium text-white cursor" href="{{url('create-announcement')}}"> Create New Announcement</a>
            </div>
        </div>

        <div class="p-6 w-full max-w-4xl mx-auto bg-white text-gray-700 rounded-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ( $announcements as $ann )
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$ann->title}}</td>
                        <td>{{$ann->description}}</td>
                        <td><a href="{{url('edit-announcement/'.$ann->id)}}" class="btn btn-primary">Edit</a> |
                            <a href="{{url('delete-announcement/'.$ann->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
