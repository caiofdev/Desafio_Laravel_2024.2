<title>Vertex Financial</title>

<body class="bg-slate-900">
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 fade-up">
                <!-- Dashboard Container -->
                <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Dashboard Overview -->
                    <div class="p-6 text-white">
                        <h3 class="text-lg font-semibold mb-4">Transfer Dashboard</h3>
                        
                        <!-- User Info Card -->
                        <div class="bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                            <h4 class="text-xl font-semibold mb-2">Account Summary</h4>
                            <p><span class="font-semibold">Account Holder:</span> {{$user->name}}</p>
                            <p><span class="font-semibold">Account Balance: $</span> {{$user->account()->first()->account_balance}}</p>
                            <p><span class="font-semibold">Account Number:</span> {{$user->account()->first()->account_number}}</p>
                            @if(session('Error'))
                                <p class="text-red-600">{{ session('Error')}}</p>
                            @elseif(session('Sucess'))
                            <p class="text-green-600">{{ session('Sucess')}}</p>
                            @endif
                        </div>

                        <!-- Transfer Form -->
                        <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                            <h4 class="text-xl font-semibold mb-2">Transfer</h4>
                            @if(Auth::guard('manager')->check())
                            <form action="{{route('manager.transfer')}}" method="POST">
                            @elseif(Auth::guard('web')->check())
                            <form action="{{route('user.transfer')}}" method="POST">
                            @endif
                                @csrf
                                <div class="mb-4">
                                    <label for="deposit_amount" class="block mb-2 text-sm font-medium text-gray-300">Amount</label>
                                    <input type="number" name="amount" id="deposit_amount" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />

                                    <label for="deposit_amount" class="mt-4 block mb-2 text-sm font-medium text-gray-300">Agency number</label>
                                    <input type="number" name="agency_number" id="agency_number" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />

                                    <label for="deposit_amount" class="mt-4 block mb-2 text-sm font-medium text-gray-300">Account number</label>
                                    <input type="text" name="account_number" id="account_number" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />
                                    
                                    <input hidden name="sender_id" value="{{ $user->account()->first()->id }}">
                                    <input hidden name="balance" value="{{ $user->account()->first()->account_balance }}">
                                    <input hidden name="title" value="transfer">
                                </div>
                                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                    Transfer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>