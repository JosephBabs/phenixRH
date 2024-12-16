<div class="container">
    <h2>Paiements de Salaire</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Numéro de Référence</th>
                <th>Employé</th>
                <th>Salaire Brut</th>
                <th>Salaire Net</th>
                <th>Date de Paiement</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->reference_number }}</td>
                    <td>{{ $payment->employee->name }}</td>
                    <td>${{ number_format($payment->gross_salary, 2) }}</td>
                    <td>${{ number_format($payment->net_salary, 2) }}</td>
                    <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
