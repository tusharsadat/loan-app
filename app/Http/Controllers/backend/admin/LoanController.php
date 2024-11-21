<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use App\Models\LoanType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function allLoanApplication()
    {
        $loan_applications = LoanApplication::paginate(5);
        return view('admin.loan_application.all_loan_Application', compact('loan_applications'));
    }

    public function LoanApplication()
    {
        $loan_types = LoanType::get();
        return view('user.loan_application.application', compact('loan_types'));
    }


    public function calculateInstallments(Request $request)
    {
        $request->validate([
            'loan_amount' => 'required|numeric|min:0',
            'installment_count' => 'required|integer|min:1',
        ]);

        $loanAmount = $request->loan_amount;
        $installmentCount = $request->installment_count;
        $interestRate = 0.10; // 10% interest

        $totalPayable = $loanAmount + ($loanAmount * $interestRate); // Calculate total amount payable
        $installmentAmount = $totalPayable / $installmentCount; // Calculate per installment amount

        return response()->json([
            'installment_amount' => number_format($installmentAmount, 2),
            'amount_payable' => number_format($totalPayable, 2),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'account' => 'required',
            'loan_type' => 'required',
            'loan_amount' => 'required|numeric|min:0',
            'installment_count' => 'required|integer|min:1',
        ]);

        $today = Carbon::now();
        $formatedDate = $today->format('Y-m-d');

        $loanAmount = $request->loan_amount;
        $installmentCount = $request->installment_count;
        $interestRate = 0.10;

        $totalPayable = $loanAmount + ($loanAmount * $interestRate);
        $installmentAmount = $totalPayable / $installmentCount;

        LoanApplication::create([
            'bank' => $request->bank,
            'account' => $request->account,
            'loan_type' => $request->loan_type,
            'name' => Auth::user()->name, // Get the authenticated user's name
            'email' => Auth::user()->email, // Get the authenticated user's email
            'loan_amount' => $loanAmount,
            'installment_count' => $installmentCount,
            'interest_rate' => $interestRate,
            'installment_amount' => $installmentAmount,
            'amount_payable' => $totalPayable,
            'date_applied' => $formatedDate,
            'status' => 'Approval Pending',
        ]);
        toastr()->success('Loan application submitted successfully.');
        return redirect()->back();
    }
}
