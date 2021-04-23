<template>
  <div class="container">
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary"
      data-mdb-toggle="modal"
      data-mdb-target="#exampleModal"
    >
      登録
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">イベント作成</h5>
            <button
              type="button"
              class="btn-close"
              data-mdb-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control"
                placeholder="タイトル"
              />
            </div>
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control"
                placeholder="金額"
              />
            </div>
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example">
                <option selected>はらったひと</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-mdb-dismiss="modal"
            >
            閉じる
            </button>
            <button type="button" class="btn btn-primary">登録</button>
          </div>
        </div>
      </div>
    </div>

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
      {{ member.name }}：{{ member.totalPayment.toLocaleString() }}円
    </p>
    <p class="total-price mb-0">合計：{{ totalPrice.toLocaleString() }}円</p>
    <p class="total-price mb-0">平均：{{ avaragePrice.toLocaleString() }}円</p>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title center" v-for="member in members">
          {{ judgement(member) }}
        </h5>
      </div>
    </div>
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
    },
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

.center {
  text-align: center;
}
</style>
