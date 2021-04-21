<template>
    <div class="container">
        <p class="ml-2">今日</p>
        <div class="card mb-1" v-for="payment in payments">
            <div class="card-body pt-1 pb-1">
                <p class="card-text">
                    {{ payment.event.name }}<br>
                    {{ payment.payer.name }}<br>
                    ¥{{ payment.price.toLocaleString() }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        initialPayments: {
            type: Array,
            required: true,
        },
    },
    data: function() {
        return {
            payments: this.initialPayments,
        }
    }
};
</script>
