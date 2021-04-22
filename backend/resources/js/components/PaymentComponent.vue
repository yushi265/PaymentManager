<template>
  <div class="container">
    <p class="ml-2">今日</p>
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
    <p class="total-price mb-0" v-for="member in members">
        {{ member.name }}：{{ totalPayment(member.id).toLocaleString() }}円
    </p>
    <p class="total-price">合計：{{ totalPrice.toLocaleString() }}円</p>
  </div>
</template>

<script>
export default {
  props: {
    initialPayments: {
      type: Array,
      default: () => {},
    },
    initialMembers: {
        type: Array,
        default: () => {},
    }
  },
  data: function () {
    return {
      payments: this.initialPayments,
      members: this.initialMembers,
      message: '',
    };
  },
  computed: {
    totalPrice: function () {
      let total = 0;
      this.payments.forEach((element) => {
        total += element.price;
      });
      return total;
    },
  },
  methods: {
      totalPayment: function(id) {
          const member = this.members.find(member => member.id === id)
          console.log(member)
          let totalPayment = 0
          member.payments.forEach(payment => {
                totalPayment += payment.price
            })

            return totalPayment
      },
  }
};
</script>

<style scoped>
.total-price {
  text-align: right;
}
.card {
  background-color: #f11e766e;
}

.event-name {
  /* font-weight: bold; */
  font-size: 17px;
}
</style>
