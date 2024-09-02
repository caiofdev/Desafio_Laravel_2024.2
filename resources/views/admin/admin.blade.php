<title>Vertex Financial</title>

<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 fade-up">
            <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white text-xl font-bold flex justify-center">
                    {{ __("Administrators") }}
                </div>
            </div>
        </div>
    </div>

    <a class="flex justify-end mr-32" href="{{route('admin.create')}}">
        <button data-modal-target="create-modal" data-modal-toggle="create-modal" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create</button>
    </a>

    <!-- Table -->
    <div class="container mx-auto fade-up">
        <div class="bg-slate-900 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-slate-950">
                <thead class="bg-slate-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">E-mail</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider flex justify-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-slate-900 divide-y divide-slate-950">

                    @foreach($admins as $admin)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{$admin->id}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{$admin->name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{$admin->email}}</td>
                        <td class="flex justify-center pt-2">
                            <a href="#">
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View</button>
                            </a>
                            <a href="#">
                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Update</button>
                            </a>
                            <a href="#">
                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center pt-8">
        {{ $admins->onEachSide(5)->links('vendor.pagination.tailwind')}}
    </div>
</x-app-layout>