<template>
  <div class="container">
    <p class="ml-2">今日</p>
    <p class="total-price">合計：3000</p>

    <div class="card mb-1" v-for="payment in payments">
      <div class="card-body pt-1 pb-1">
        <div class="event-name">
          {{ payment.event.name }}
        </div>
        <div class="row">
          <div class="col">¥{{ payment.price.toLocaleString() }}</div>
          <div class="col">
            <span class="badge bg-light text-dark p-2">
              {{ payment.payer.name }}
            </span>
          </div>
        </div>
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
  data: function () {
    return {
      payments: this.initialPayments,
    };
  },
};
</script>

<style scoped>
.total-price{
    text-align: right;
}
.card {
  background-color: #f11e766e;
}

.event-name{
    /* font-weight: bold; */
    font-size: 17px;
}
</style>
