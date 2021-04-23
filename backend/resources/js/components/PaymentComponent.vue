<template>
  <div>
    <p class="ml-2">今日</p>
    <div class="card mb-1" v-for="payment in payments" :key="payment.id">
      <div class="card-body pt-1 pb-1">
        <button
          type="submit"
          class="btn btn-outline-dark pt-0 pb-0"
          style="position: absolute; right: 20px; top: 0"
          @click="deleteEvent(payment.id)"
        >
          <i class="fas fa-times"></i>
        </button>
        <div class="event-name">
          {{ payment.event.name }}
        </div>
        <div class="row">
          <div class="col">¥{{ payment.price.toLocaleString() }}</div>
          <div class="col right">
            <span class="badge bg-light text-dark p-2">
              {{ payment.payer.name }}
            </span>
          </div>
        </div>
      </div>
    </div>
    <p class="total-price mb-0" v-for="member in members" :key="member.id">
      {{ member.name }}：{{ member.totalPayment }}円
    </p>
    <p class="total-price mb-0">合計：{{ totalPrice.toLocaleString() }}円</p>
    <p class="total-price mb-0">平均：{{ avaragePrice.toLocaleString() }}円</p>
    <div class="card">
      <div class="card-body">
        <h5
          class="card-title center"
          v-for="member in members"
          :key="member.id"
        >
          {{ judgement(member) }}
        </h5>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    initialPayments: {
      type: Array,
      default: () => {},
    },
    initialMembers: {
      type: Array,
      default: () => {},
    },
    endpoint: {
      type: String,
    },
  },
  data: function () {
    return {
      payments: this.initialPayments,
      members: this.initialMembers,
      //   totalPrice: 0,
      //   avaragePrice: 0,
    };
  },
  computed: {
    totalPrice() {
      let price = 0;
      this.payments.forEach((element) => {
        price += element.price;
      });
      return price;
    },
    avaragePrice() {
      return this.totalPrice / this.members.length;
    },
    memberTotalPayment() {
      let total = 0;
      this.members.forEach((member) => {
        member.payments.forEach((payment) => {
          total += payment.price;
        });
        member.totalPayment = total;
        total = 0;
      });
    },
    memberShortage() {
      this.members.forEach((member) => {
        member.shortage = this.avaragePrice - member.totalPayment;
      });
    },
  },
  methods: {
    judgement: function (member) {
      if (member.shortage < 0) {
        return;
      } else if (member.shortage > 0) {
        return (
          member.name +
          "が" +
          member.shortage.toLocaleString() +
          "円はらってね！！"
        );
      } else {
        return "ピッタリ！！";
      }
    },
    async deleteEvent(id) {
      const response = await axios.delete(
        "http://127.0.0.1:10070/payments/" + id
      );

      this.payments = response.data.payments;
    },
  },
};
</script>

<style scoped>
.bg-color {
  background-color: #f4f2908a;
}
.btn-color {
  background-color: #f11e766e;
}
.total-price {
  text-align: right;
}
.right {
  text-align: right;
}
.card {
  background-color: #f11e766e;
}

.event-name {
  /* font-weight: bold; */
  font-size: 17px;
}

.center {
  text-align: center;
}
</style>
