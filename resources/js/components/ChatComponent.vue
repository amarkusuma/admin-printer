<template>
  <div class="row">
    <div class="col-sm-9">
      <div class="card">
        <div class="card-block">
          <div class="table-responsive m-t-40">
            <div v-if="component == 'message-grub'">
              <component v-bind:is="component" :messages="messages"></component>
            </div>

            <div>
              <span v-for="friend in friends" :key="friend.id" v-if="friend.session">
                <component
                  v-bind:is="component"
                  v-if="friend.session.open"
                  @close="close(friend)"
                  :friend="friend"
                  :messages="messages"
                ></component>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card-header">
        <h5 class="card-title">Users  <i class="fa fa-users"></i></h5>
      </div>
      <div class="card-body user-online">
        <div class="card">
          <div class="card-block">
       
          
              <div
                class="icon"
                @click.prevent="openChat(friend)"
                :key="friend.id"
                v-for="friend in friends"
              >
              <a class="text-muted" href v-on:click="Formchat()">
                <button type="button"  v-if="friend.online" v-bind:class="{'btn btn-success btn-circle':buttonIcons}" >
                <i class="fa fa-user"></i>
                </button>
                <button type="button"  v-else class="btn btn-default btn-circle offline-circle" >
                <i class="fa fa-user"></i>
                </button>
                 <small> {{friend.name}}</small>
                  <span
                    class="text-danger"
                    v-if="friend.session && (friend.session.unreadCount > 0)"
                  >{{friend.session.unreadCount}}</span>
              </a>
                <i
                  class="float-right text-success fa fa-circle "
                  v-if="friend.online"
                  aria-hidden="true"
                ></i>

               
              </div>
            
          </div>
        </div>
      </div>
      <!-- <span v-for="friend in friends" :key="friend.id" v-if="friend.session">
        <component
          v-bind:is="component"
          v-if="friend.session.open"
          @close="close(friend)"
          :friend="friend"amar12345

          :messages="messages"
        ></component>
      </span>-->
    </div>
  </div>
</template>

<script>
import MessageComponent from "./MessageComponent";
import Message from "./Messages";
export default {
  components: {
    "message-private": MessageComponent,
    "message-grub": Message
  },
  props: ["messages"],
  data() {
    return {
      buttonIcons:true,
      component: "message-grub",
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
      Echo.private(`chat.${friend.session.id}`).listen("PrivateChatEvent", e =>
        friend.session.open ? "" : friend.session.unreadCount++
      );
    },
    Formchat() {
      if (this.component == "message-grub") {
        this.component = "message-private";
      } else {
        this.component == "message-grub";
      }
    }
  },
  created() {
    this.getFriends();
    Echo.channel("chat").listen("SessionEvent", e => {
      let friend = this.friends.find(friend => friend.id == e.session_by);
      friend.session = e.session;
      this.listenForEverySession(friend);
    });
    Echo.join(`chat`)
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
.float-right.text-success.fa.fa-circle{
  padding-top:7px ;
 
}
.icon {
  padding-bottom: 5px;
}
.card-body.user-online {
  background-color: rgb(203, 230, 240);
  max-height: 230px;
  overflow: auto;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
  background-color:green
}
.offline-circle{
  background-color:#272c33
}
</style>