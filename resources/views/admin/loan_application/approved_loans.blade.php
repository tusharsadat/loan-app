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
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-2xl font-semibold mb-4">All Approved Application</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4">S/N</th>
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Amount</th>
                            <th class="py-2 px-4">Bank</th>
                            <th class="py-2 px-4">AC Number</th>
                            <th class="py-2 px-4">Approve Loan</th>
                            <th class="py-2 px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($approvedLoans as $key => $approvedLoan)
                            <tr>
                                <td class="py-2 px-4">{{ $key + 1 }}</td>
                                <td class="py-2 px-4">{{ $approvedLoan->name }}</td>
                                <td class="py-2 px-4">{{ $approvedLoan->email }}</td>
                                <td class="py-2 px-4">{{ $approvedLoan->loan_amount }}</td>
                                <td class="py-2 px-4">{{ $approvedLoan->bank }}</td>
                                <td class="py-2 px-4">{{ $approvedLoan->account }}</td>
                                <td class="py-2 px-4">


                                    <label class="switch">
                                        <input type="checkbox" name="status"
                                            {{ $approvedLoan->status == 'approved' ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>


                                </td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('admin.application.detail', $approvedLoan->id) }}"
                                        class="bg-blue-500 text-white py-1.5 px-3 rounded-md hover:bg-blue-600 transition duration-200">View
                                        Details
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                {{ $approvedLoans->links() }}
            </div>
        </div>
    </div>
@endsection
