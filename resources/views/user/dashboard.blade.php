<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col h-screen bg-gray-100">

        @include('user.sections.header')

        <!-- Main Content -->
        <div class="flex-1">
            <div class="flex h-full">
                <!-- Sidebar -->
                @include('user.sections.sideber')

                <!-- Page content -->
                <div class="flex-1 p-10">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('user.sections.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <script>
        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');

        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', (event) => {
            if (!profileDropdown.contains(event.target) && !profileButton.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loanAmountInput = document.getElementById('loan_amount');
            const installmentCountInput = document.getElementById('installment_count');
            const installmentAmountField = document.getElementById('installment_amount');
            const amountPayableField = document.getElementById('amount_payable');

            function calculateInstallments() {
                const loanAmount = loanAmountInput.value;
                const installmentCount = installmentCountInput.value;

                if (loanAmount && installmentCount) {
                    fetch("{{ route('loan.calculate') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                loan_amount: loanAmount,
                                installment_count: installmentCount
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            installmentAmountField.value = data.installment_amount;
                            amountPayableField.value = data.amount_payable;
                        })
                        .catch(error => console.error('Error:', error));
                }
            }

            loanAmountInput.addEventListener('input', calculateInstallments);
            installmentCountInput.addEventListener('input', calculateInstallments);
        });
    </script>


</body>

</html>
