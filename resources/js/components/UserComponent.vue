<template>
  <div class="col-md-3">
    <div class="card-header">
      <h5 class="card-title">Users online</h5>
    </div>
    <div class="card-body user-online">
      <div class="card">
        <div class="card-block">
          <div v-for="(user, index) in users" :key="user + '-' + index">
            <div class="icon">
              <!-- <span class="round small">S</span> -->
              <button
                type="button"
                class="btn btn-success btn-circle btn-sm"
                v-if="user.isOnline == true"
              >
                <i class="fa fa-headphones"></i>
              </button>

              <button type="button" class="btn btn-default btn-circle btn-sm" v-else>
                <i class="fa fa-power-off"></i>
              </button>

              <a class="text-muted" href="#">
                <small>{{ user.name }}</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import Event from "../event.js";

// export default {
//   data() {
//     return {
//       users: []
//     };
//   },

//   mounted() {
//     Event.$on("users.here", users => {
//       this.users = users;
//     })
//       .$on("users.joined", user => {
//         this.users.unshift(user);
//       })
//       .$on("users.left", user => {
//         this.users = this.users.filter(u => {
//           return u.id != user.id;
//         });
//       });
//   }
// };
// import axios from "axios";
export default {
  data() {
    return {
      users: []
    };
  },
  mounted() {
    axios
      .get("/online")
      .then(res => {
        this.users = res.data;
      })
      .catch(e => {
        this.errors.push(e);
      });
  }
};
</script>

<style>
.users {
  background-color: #fff;
  border-radius: 3px;
}
.btn.btn-success.btn-circle.btn-sm {
  width: 17px;
  height: 17px;
  text-align: center;
  padding: 0px 0;
}
.btn.btn-default.btn-circle.btn-sm {
  width: 17px;
  height: 17px;
  text-align: center;
  padding: 0px 0;
}
.icon {
  padding-bottom: 5px;
}
.card-body.user-online {
  background-color: rgb(203, 230, 240);
  max-height: 230px;
  overflow: auto;
}
</style>
