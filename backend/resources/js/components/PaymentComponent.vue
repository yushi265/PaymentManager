<template>
  <div class="container">



    <p class="ml-2">今日</p>
    <div class="card mb-1" v-for="payment in payments" :key="payment.id">
      <div class="card-body pt-1 pb-1">
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
      {{ member.name }}：{{ member.totalPayment.toLocaleString() }}円
    </p>
    <p class="total-price mb-0">合計：{{ totalPrice.toLocaleString() }}円</p>
    <p class="total-price mb-0">平均：{{ avaragePrice.toLocaleString() }}円</p>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title center" v-for="member in members" :key="member.id">
          {{ judgement(member) }}
        </h5>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

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
        required: true,
    }
  },
  data: function () {
    return {
      payments: this.initialPayments,
      members: this.initialMembers,
      totalPrice: 0,
      avaragePrice: 0,
    };
  },
  created: function () {
    // 支払総額を計算
    let total = 0;
    this.payments.forEach((element) => {
      total += element.price;
    });
    this.totalPrice = total;

    // メンバーの支払総額を計算
    let memberTotalPayment = 0;
    this.members.forEach((member) => {
      member.payments.forEach((payment) => {
        memberTotalPayment += payment.price;
      });
      member.totalPayment = memberTotalPayment;
      memberTotalPayment = 0;
    });

    // 支払い平均を計算
    this.avaragePrice = this.totalPrice / this.members.length;

    // メンバーの不足額を計算
    this.members.forEach((member) => {
      member.shortage = this.avaragePrice - member.totalPayment;
    });
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
