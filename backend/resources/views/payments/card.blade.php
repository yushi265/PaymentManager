<div class="card mb-2">
    <div class="card-body p-2">
        <p class="card-text">
            いったところ -> {{ $payment->event->name }}<br>
            はらったひと -> {{ $payment->payer->name }}<br>
            　きんがく　 -> {{ $payment->price_yen }}
        </p>
    </div>
</div>
