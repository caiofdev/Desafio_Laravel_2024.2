<title>Vertex Financial</title>

<x-app-layout>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 fade-up">
            <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white text-xl font-bold flex justify-center">
                    {{ __("Pendencies") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->

    <div class="container mx-auto fade-up">
        <div class="bg-slate-900 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-slate-950">

                <thead class="bg-slate-900">
                    <tr>
                        <th class="pl-32 px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Title</th>
                        <th class="px-10 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Value</th>
                        <th class="px-10 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Sender</th>
                        <th class="px-16 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Receiver</th>
                        <th class="pl-24 px-8 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                
                <tbody class="bg-slate-900 divide-y divide-slate-950">

                    @foreach($pendencies as $pendency)

                    @php
                        $userSender = App\Models\User::where('account_id', $pendency->sender_id)->first();

                        $userReceiver = App\Models\User::where('account_id', $pendency->receiver_id)->first();

                        if(!$userReceiver){
                            $userReceiver = App\Models\Manager::where('account_id', $pendency->receiver_id)->first();
                        }
                    @endphp

                    <tr class="w-full">
                        <td class=" pl-32 px-6 py-4 whitespace-nowrap text-sm text-white">{{$pendency->title}}</td>
                        <td class=" px-10 py-4 whitespace-nowrap text-sm text-white">{{$pendency->value}}</td>
                        <td class=" px-10 py-4 whitespace-nowrap text-sm text-white">{{$userSender->name}}</td>
                        <td class=" px-16 py-4 whitespace-nowrap text-sm text-white">{{$userReceiver->name}}</td>

                        <td class="flex items-center justify-start px-8 pt-2">
                            <form action="{{route('manager.accept', $pendency->id)}}" method="POST">
                                @csrf

                                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Approve</button>

                            </form>

                            <form action="{{route('manager.deny', $pendency->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-blue-800">Reject</button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->

    <div class="flex justify-center pt-8">
        {{$pendencies->onEachSide(5)->links('vendor.pagination.tailwind')}}
    </div>
    
</x-app-layout>