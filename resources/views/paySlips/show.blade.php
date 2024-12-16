
<div class="container">
    <h2>Détails du Paiement</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Référence de Paiement : {{ $payment->reference_number }}</h5>
            <p><strong>Employé :</strong> {{ $payment->employee->name }}</p>
            <p><strong>Salaire Brut :</strong> ${{ number_format($payment->gross_salary, 2) }}</p>
            <p><strong>Taxes :</strong> ${{ number_format($payment->taxes, 2) }}</p>
            <p><strong>Salaire Net :</strong> ${{ number_format($payment->net_salary, 2) }}</p>
            <p><strong>Date de Paiement :</strong> {{ $payment->payment_date->format('Y-m-d') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Retour aux Paiements</a>
        <a href="{{ route('payments.print', $payment->id) }}" class="btn btn-primary">Imprimer le Bulletin de Paiement</a>
    </div>
</div>
