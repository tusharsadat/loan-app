@extends('admin.dashboard')
@section('content')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 17px;
            /* Make the slider rounded */
            transition: 0.4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 50%;
            /* Make the circle rounded */
            transition: 0.4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
    </style>
    <div class="p-6">
        <div class="mx-auto max-w-xl">
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">

                        <div>
                            <h2 class="text-2xl font-semibold">{{ $application->name }}</h2>
                            <p class="text-gray-500">{{ $application->email }}</p>
                        </div>
                    </div>
                    <div>
                        <b>Change status</b>
                        <form action="{{ route('admin.application.updateStatus', $application->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <label class="switch">
                                <input type="checkbox" name="status" onchange="this.form.submit()"
                                    {{ $application->status == 'approved' ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </form>
                    </div>
                </div>
                <hr class="my-4 mt-2 border-t border-gray-300">
                <div>
                    <h3 class="text-xl font-semibold mb-2">Application Details</h3>
                    <ul class="text-gray-600">
                        <li><b>Bank Name:</b> {{ $application->bank }}</li>
                        <li><b>Account No:</b> {{ $application->account }}</li>
                        <li><b>Loan Type:</b> {{ $application->loan_type }}</li>
                        <li><b>Loan Ammount:</b> {{ $application->loan_amount }}</li>
                        <li><b>Installment Count:</b> {{ $application->installment_count }}</li>
                        <li><b>Total Amount Payable(10% Interest):</b> {{ $application->amount_payable }}</li>
                        <li><b>Installment Amount:</b> {{ $application->installment_amount }}</li>
                        <li><b>Applied Date:</b> {{ $application->date_applied }}</li>
                        <li><b>Status:</b> {{ ucfirst($application->status) }}</li>
                        <li>
                            <b>Status:</b>
                            <button
                                class="
                                    text-white py-1 px-3 rounded-md transition duration-200 ml-2
                                    {{ $application->status === 'approved' ? 'bg-green-500 hover:bg-green-600' : '' }}
                                    {{ $application->status === 'pending' ? 'bg-red-500 hover:bg-red-600' : '' }}
                                ">
                                {{ ucfirst($application->status) }}
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
