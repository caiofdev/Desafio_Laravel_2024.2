<title>Vertex Financial</title>

<body class="bg-slate-900">

    <x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 fade-up">

                @if(!App\Models\Loan::where('account_id', $user->account_id)->get()->last() || App\Models\Loan::where('account_id', $user->account_id)->get()->last()->isApproved)

                <!-- Loan Request Container -->

                <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">

                    <!-- Loan Request Overview -->

                    <div class="p-6 text-white">
                        <h3 class="text-lg font-semibold mb-4">Loan Request</h3>
                        <p class="text-lg font-semibold mb-4">Balance: $ {{ $user->account->account_balance }}</p>

                        @if(session('Error'))
                            <p class="text-red-600">{{ session('Error') }}</p>
                        @elseif(session('Success'))
                            <p class="text-green-600">{{ session('Success') }}</p>
                        @endif

                        <!-- Loan Request Form -->

                        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                            <h4 class="text-xl font-semibold mb-4">Request a Loan</h4>

                            @if(Auth::guard('manager')->check())
                                <form action="{{ route('manager.loan-store') }}" method="POST">
                            @elseif(Auth::guard('web')->check())
                                <form action="{{ route('user.loan-store') }}" method="POST">
                            @endif

                                @csrf

                                <!-- Loan Amount -->

                                <div class="mb-4">
                                    <label for="loan_amount" class="block mb-2 text-sm font-medium text-gray-300">Loan Amount</label>
                                    <input type="number" name="loan_amount" id="loan_amount" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />

                                    <input type="hidden" name="sender_id" value="{{ $user->account_id }}">
                                    
                                </div>

                                <!-- Submit Button -->

                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                    Submit Request
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
                @else 

                    <!-- Loan Request Container -->

                    <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">

                        <!-- Loan Request Overview -->

                        <div class="p-6 text-white">
                            <h3 class="text-lg font-semibold mb-4">Loan Request</h3>
                            <p class="text-lg font-semibold mb-4">Balance: $ {{ $user->account->account_balance }}</p>
                            <p class="text-lg font-semibold mb-4">Amount to pay: $ {{App\Models\Loan::where('account_id', $user->account_id)->get()->last()->amount_to_pay}}</p>

                            <form action="{{route('manager.loan-pay')}}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="loan_amount" class="block mb-2 text-sm font-medium text-white">Pay</label>
                                    <input type="number" name="pay" id="pay" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />

                                    <input type="hidden" name="sender_id" value="{{ $user->account_id }}">

                                </div>

                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                    Pay
                                </button>

                            </form>

                            @if(session('Error'))
                                <p class="text-red-600">{{ session('Error') }}</p>
                            @elseif(session('Success'))
                                <p class="text-green-600">{{ session('Success') }}</p>
                            @endif

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </x-app-layout>
</body>
