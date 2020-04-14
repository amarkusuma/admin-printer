<template>
  <div class="col-md-3">
    <div class="card-header">
      <h5 class="card-title">Users online</h5>
    </div>
    <div class="card-body user-online">
      <div class="card">
        <div class="card-block">
          <!-- <div v-for="(user, index) in users" :key="user + '-' + index">
             <div class="icon">
        
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
          </div>-->
          <ul class="list-group">
            <li
              class="list-group-item"
              @click.prevent="openChat(friend)"
              :key="friend.id"
              v-for="friend in friends"
            >
              <a href>
                {{friend.name}}
                <span
                  class="text-danger"
                  v-if="friend.session && (friend.session.unreadCount > 0)"
                >{{friend.session.unreadCount}}</span>
              </a>
              <i
                class="fa fa-circle float-right text-success"
                v-if="friend.online"
                aria-hidden="true"
              ></i>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <span v-for="friend in friends" :key="friend.id" v-if="friend.session">
      <message-component v-if="friend.session.open" @close="close(friend)" :friend="friend"></message-component>
    </span>
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
// export default {
//   data() {
//     return {
//       users: []
//     };
//   },
//   mounted() {
//     axios
//       .get("/online")
//       .then(res => {
//         this.users = res.data;
//       })
//       .catch(e => {
//         this.errors.push(e);
//       });
//   }
// };
import MessageComponent from "./MessageComponent";
export default {
  data() {
    return {
      friends: []
    };
  },
  methods: {
    close(friend) {
      friend.session.open = false;
    },
    getFriends() {
      axios.post("/getFriends").then(res => {
        this.friends = res.data.data;
        this.friends.forEach(friend =>
          friend.session ? this.listenForEverySession(friend) : ""
        );
      });
    },
    openChat(friend) {
      if (friend.session) {
        this.friends.forEach(friend =>
          friend.session ? (friend.session.open = false) : ""
        );
        friend.session.open = true;
        friend.session.unreadCount = 0;
      } else {
        this.createSession(friend);
      }
    },
    createSession(friend) {
      axios.post("/session/create", { friend_id: friend.id }).then(res => {
        (friend.session = res.data.data), (friend.session.open = true);
      });
    },
    listenForEverySession(friend) {
      Echo.private(`Chats.${friend.session.id}`).listen("PrivateChatEvent", e =>
        friend.session.open ? "" : friend.session.unreadCount++
      );
    }
  },
  created() {
    this.getFriends();

    Echo.channel("Chats").listen("SessionEvent", e => {
      let friend = this.friends.find(friend => friend.id == e.session_by);
      friend.session = e.session;
      this.listenForEverySession(friend);
    });

    Echo.join(`Chats`)
      .here(users => {
        this.friends.forEach(friend => {
          users.forEach(user => {
            if (user.id == friend.id) {
              friend.online = true;
            }
          });
        });
      })
      .joining(user => {
        this.friends.forEach(friend =>
          user.id == friend.id ? (friend.online = true) : ""
        );
      })
      .leaving(user => {
        this.friends.forEach(friend =>
          user.id == friend.id ? (friend.online = false) : ""
        );
      });
  },
  components: { MessageComponent }
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
