<title>Vertex Financial</title>
    
<body class="bg-slate-900">
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 fade-up">
                <!-- Dashboard Container -->
                <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Dashboard Overview -->
                    <div class="p-6 text-white">
                        <h3 class="text-lg font-semibold mb-4">Transactions Dashboard</h3>
                        
                        <!-- User Info Card -->
                        <div class="bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                            <h4 class="text-xl font-semibold mb-2">Account Summary</h4>
                            <p><span class="font-semibold">Account Holder:</span> {{$user->name}}</p>
                            <p><span class="font-semibold">Account Balance: $</span> {{$user->account()->first()->account_balance}}</p>
                            <p><span class="font-semibold">Account Number:</span> {{$user->account()->first()->account_number}}</p>
                            @if(session('Error'))
                                <p class="text-red-600">{{ session('Error')}}</p>
                            @endif
                        </div>

                        <!-- Deposit and Withdrawal Forms -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- Deposit Form -->
                            <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                                <h4 class="text-xl font-semibold mb-2">Deposit Funds</h4>
                                @if(Auth::guard('manager')->check())
                                <form action="{{route('manager.deposit')}}" method="POST">
                                @elseif(Auth::guard('web')->check())
                                <form action="{{route('user.deposit')}}" method="POST">
                                @endif
                                    @csrf
                                    <div class="mb-4">
                                        <label for="deposit_amount" class="block mb-2 text-sm font-medium text-gray-300">Amount</label>
                                        <input type="number" name="amount" id="deposit_amount" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />
                                        
                                        <input hidden name="sender_id" value="{{ $user->id }}">
                                        <input hidden name="account_id" value="{{ $user->account_id }}">
                                        <input hidden name="title" value="deposit">

                                    </div>
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                        Deposit
                                    </button>
                                </form>
                            </div>

                            <!-- Withdrawal Form -->
                            <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                                <h4 class="text-xl font-semibold mb-2">Withdraw Funds</h4>
                                @if(Auth::guard('manager')->check())
                                <form action="{{route('manager.deposit')}}" method="POST">
                                @elseif(Auth::guard('web')->check())
                                <form action="{{route('user.deposit')}}" method="POST">
                                @endif
                                    @csrf
                                    <div class="mb-4">
                                        <label for="withdraw_amount" class="block mb-2 text-sm font-medium text-gray-300">Amount</label>
                                        <input type="number" name="amount" id="withdraw_amount" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />
    
                                        <input hidden name="sender_id" value="{{ $user->id }}">
                                        <input hidden name="account_id" value="{{ $user->account_id }}">
                                        <input hidden name="title" value="withdraw">
                                        <input hidden name="balance" value="{{ $user->account()->first()->account_balance }}">
                                        
                                    </div>
                                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                        Withdraw
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Transfer Form -->
                        <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                                <h4 class="text-xl font-semibold mb-2">Transfer</h4>
                                    <div class="mb-4">
                                        @if(Auth::guard('manager')->check())
                                            <a href="{{route('manager.view-transfer')}}">
                                        @elseif(Auth::guard('web')->check())
                                            <a href="{{route('user.view-transfer')}}">
                                        @endif
                                            <button" type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                                Transfer
                                            </button>
                                        </a>
                                    </div>
                                </form>
                            </div>

                        <!-- Recent Transactions Section -->
                        <div class="mt-7 bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                            <h4 class="text-xl font-semibold mb-2">Recent Transactions</h4>
                            <ul class="list-disc list-inside mb-4">
                                @foreach($latestTransaction as $transaction)
                                    <li>
                                        <strong> 
                                            {{ $transaction->title }} - $ {{ $transaction->value }} at {{ $transaction->created_at->format('d/m/Y H:i') }} 
                                        </strong>
                                    </li>
                                @endforeach
                                <!-- Add more transaction examples as needed -->
                            </ul>
                            @if(Auth::guard('web')->check())
                            <a href="{{route('user.pdf')}}">
                            @elseif(Auth::guard('manager')->check())
                            <a href="{{route('manager.pdf')}}">
                            @endif
                                <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Generate PDF
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
