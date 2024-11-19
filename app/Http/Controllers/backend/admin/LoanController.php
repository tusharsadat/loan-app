<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function allLoanApplication()
    {
        $loan_applications = LoanApplication::paginate(5);
        return view('admin.loan_application.all_loan_Application', compact('loan_applications'));
    }
}
