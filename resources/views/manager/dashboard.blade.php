<title>Vertex Financial</title>

<x-app-layout>

    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl text-gray-800 leading-tight fade-up">
            {{ __('Welcome, manager.')  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 fade-up">

            <!-- Dashboard Container -->

            <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Overview Section -->

                <div class="p-6 text-white">
                    <h3 class="text-lg font-semibold mb-4">Dashboard Overview</h3>
                    
                    <!-- User Info Card -->

                    <div class="bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                        <h4 class="text-xl font-semibold mb-2">Account Summary</h4>
                        <p><span class="font-semibold">Account Holder:</span> {{$user->name}} </p>
                        <p><span class="font-semibold">Account Balance: $</span> {{$user->account()->first()->account_balance}}</p>
                        <p><span class="font-semibold">Account Number:</span> {{$user->account()->first()->account_number}} </p>
                    </div>
                    
                    <!-- Balance and Transactions Section -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                        <!-- Balance Widget -->

                        <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                            <h4 class="text-xl font-semibold mb-2">Current Balance</h4>
                            <p class="text-3xl font-bold">$ {{$user->account()->first()->account_balance}}</p>
                        </div>

                        <!-- Recent Transactions Widget -->

                        <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                            <h4 class="text-xl font-semibold mb-2">Recent Transactions</h4>
                            <ul class="list-disc list-inside">

                                <!-- Example transactions -->

                                <li>Deposit: $500 - 01/09/2024</li>
                                <li>Withdrawal: $200 - 30/08/2024</li>
                                <li>Transfer: $150 - 28/08/2024</li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
