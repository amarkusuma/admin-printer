<template>
  <!-- partial:index.partial.html -->
    <div class="row">
      <div class="wrapper">
        <div class="container">
          
            <div class="left ">
                <div class="top">
                    <input type="text" placeholder="Search" />
                    <a href="javascript:;" class="search"></a>
                </div>
                <div class="scroll">
                  <ul class="people " 
                  @click.prevent="openChat(friend)"
                  :key="friend.id"
                  v-for="friend in friends">
                      <li class="person" v-on:click="Formchat()">
                          <img v-if="friend.online" style="border: 0.25em solid #7CFC00;" :src="'assets/images/profile/'+ friend.image"  />

                          <img v-else :src="'assets/images/profile/'+ friend.image"  />

                          <span class="name">{{friend.name}}</span>
                          <span
                                class="time text-danger"
                                v-if="friend.session && (friend.session.unreadCount > 0)"
                              >{{friend.session.unreadCount}}
                          </span>
                          <span v-if="friend.online" class="preview text-success"> Online </span>
                          <span v-else class="preview "> Offline </span>
                      </li>
                      
 
              
                  </ul>
                </div>
            </div>
            
            <div v-if="component == 'message-grub'">
              <component v-bind:is="component" :messages="messages"></component>
            </div>
<<<<<<< HEAD
=======

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
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4

            <div>
              <span v-for="friend in friends" :key="friend.id" v-if="friend.session">
                <component
                  v-bind:is="component"
                  v-if="friend.session.open"
                  @close="close(friend)"
                  :friend="friend"
                 
                ></component>
              </span>
            </div>
<<<<<<< HEAD
            
        </div>
      
    </div>
    <!-- partial -->
=======
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

<<<<<<< HEAD
               
              </div>
            
=======
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
                <a href v-on:click="coba()">
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
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
          </div>
        </div>
      </div>
      <!-- <span v-for="friend in friends" :key="friend.id" v-if="friend.session">
        <component
          v-bind:is="component"
          v-if="friend.session.open"
          @close="close(friend)"
<<<<<<< HEAD
          :friend="friend"amar12345

=======
          :friend="friend"
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
          :messages="messages"
        ></component>
      </span>-->
>>>>>>> 14019f05d6ab53588dd7fbf976718bce3070c0df
    </div>
</template>

<script>
import PrivateMessage from "./RightChatPrivate";
import GrubMessage from "./RightChatGrub";
export default {
  components: {
    "message-private": PrivateMessage,
    "message-grub": GrubMessage
  },
  props: ["messages"],
  data() {
    return {
<<<<<<< HEAD
      buttonIcons:true,
=======
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
      component: "message-grub",
      friends: []
    };
  },
  methods: {
    close(friend) {
      friend.session.open = false;
      this.component = "message-grub";
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
<<<<<<< HEAD
    Formchat() {
=======
    coba() {
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
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
*, *:before, *:after {
  box-sizing: border-box;
}

:root {
  --white: #fff;
  --black: #000;
  --bg: #f8f8f8;
  --grey: #999;
  --dark: #1a1a1a;
  --light: #e6e6e6;
  --wrapper: 1000px;
  --blue: #00b0ff;
}


.wrapper {
  position: relative;
  left: 50%;
  width: var(--wrapper);
  height: 800px;
  -webkit-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
}

.container {
  position: relative;
  top: 41%;
  left: 50%;
  width: 100%;
  height: 75%;
  background-color: var(--white);
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}
.container .left {
  float: left;
  width: 37.6%;
  height: 100%;
  border: 1px solid var(--light);
  background-color: var(--white);
}
.container .left .top {
  position: relative;
  width: 100%;
  height: 96px;
  padding: 29px;
}
.container .left .top:after {
  position: absolute;
  bottom: 0;
  left: 50%;
  display: block;
  width: 80%;
  height: 1px;
  content: '';
  background-color: var(--light);
  -webkit-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
}
.container .left input {
  float: left;
  width: 188px;
  height: 42px;
  padding: 0 15px;
  border: 1px solid var(--light);
  background-color: #eceff1;
  border-radius: 21px;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 400;
}
.container .left input:focus {
  outline: none;
}
.container .left a.search {
  display: block;
  float: left;
  width: 42px;
  height: 42px;
  margin-left: 10px;
  border: 1px solid var(--light);
  background-color: var(--blue);
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/name-type.png");
  background-repeat: no-repeat;
  background-position: top 12px left 14px;
  border-radius: 50%;
}
.container .left .people {
  margin-left: -1px;
  border-right: 1px solid var(--light);
  border-left: 1px solid var(--light);
  width: calc(100% + 2px);
}
.container .left .people .person {
  position: relative;
  width: 100%;
  padding: 12px 10% 16px;
  cursor: pointer;
  background-color: var(--white);
}
.container .left .people .person:after {
  position: absolute;
  bottom: 0;
  left: 50%;
  display: block;
  width: 80%;
  height: 1px;
  content: '';
  background-color: var(--light);
  -webkit-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
}
.container .left .people .person img {
  float: left;
  width: 40px;
  height: 40px;
  margin-right: 12px;
  border-radius: 50%;
}
.container .left .people .person .name {
  font-size: 14px;
  line-height: 22px;
  color: var(--dark);
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 600;
}
.container .left .people .person .time {
  font-size: 14px;
  position: absolute;
  top: 16px;
  right: 10%;
  padding: 0 0 5px 5px;
  color: var(--grey);
  background-color: var(--white);
}
.container .left .people .person .preview {
  font-size: 14px;
  display: inline-block;
  overflow: hidden !important;
  width: 70%;
  white-space: nowrap;
  text-overflow: ellipsis;
  color: var(--grey);
}
.container .left .people .person.active, .container .left .people .person:hover {
  margin-top: -1px;
  margin-left: -1px;
  padding-top: 13px;
  border: 0;
  background-color: var(--blue);
  width: calc(100% + 2px);
  padding-left: calc(10% + 1px);
}
.container .left .people .person.active span, .container .left .people .person:hover span {
  color: var(--white);
  background: transparent;
}
.container .left .people .person.active:after, .container .left .people .person:hover:after {
  display: none;
}
.container .right {
  position: relative;
  float: left;
  width: 62.4%;
  height: 100%;
}
.container .right .top {
  width: 100%;
  height: 47px;
  padding: 15px 29px;
  background-color: #eceff1;
}
.container .right .top span {
  font-size: 15px;
  color: var(--grey);
}
.container .right .top span .name {
  color: var(--dark);
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 600;
}
.container .right .chat {
  position: relative;
  
  
  padding: 0 35px 92px;
  border-width: 1px 1px 1px 0;
  border-style: solid;
  border-color: var(--light);
  height: calc(100% - 48px);
  -webkit-box-pack: end;
          justify-content: flex-end;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
          flex-direction: column;
}
.container .right .chat.active-chat {
  display: block;
  display: -webkit-box;
  display: flex;
}
.container .right .chat.active-chat .bubble {
  -webkit-transition-timing-function: cubic-bezier(0.4, -0.04, 1, 1);
          transition-timing-function: cubic-bezier(0.4, -0.04, 1, 1);
}
.container .right .chat.active-chat .bubble:nth-of-type(1) {
  -webkit-animation-duration: 0.15s;
          animation-duration: 0.15s;
}
.container .right .chat.active-chat .bubble:nth-of-type(2) {
  -webkit-animation-duration: 0.3s;
          animation-duration: 0.3s;
}
.container .right .chat.active-chat .bubble:nth-of-type(3) {
  -webkit-animation-duration: 0.45s;
          animation-duration: 0.45s;
}
.container .right .chat.active-chat .bubble:nth-of-type(4) {
  -webkit-animation-duration: 0.6s;
          animation-duration: 0.6s;
}
.container .right .chat.active-chat .bubble:nth-of-type(5) {
  -webkit-animation-duration: 0.75s;
          animation-duration: 0.75s;
}
.container .right .chat.active-chat .bubble:nth-of-type(6) {
  -webkit-animation-duration: 0.9s;
          animation-duration: 0.9s;
}
.container .right .chat.active-chat .bubble:nth-of-type(7) {
  -webkit-animation-duration: 1.05s;
          animation-duration: 1.05s;
}
.container .right .chat.active-chat .bubble:nth-of-type(8) {
  -webkit-animation-duration: 1.2s;
          animation-duration: 1.2s;
}
.container .right .chat.active-chat .bubble:nth-of-type(9) {
  -webkit-animation-duration: 1.35s;
          animation-duration: 1.35s;
}
.container .right .chat.active-chat .bubble:nth-of-type(10) {
  -webkit-animation-duration: 1.5s;
          animation-duration: 1.5s;
}
.container .right .write {
  position: absolute;
  bottom: 29px;
  left: 30px;
  height: 42px;
  padding-left: 8px;
  border: 1px solid var(--light);
  background-color: #eceff1;
  width: calc(100% - 58px);
  border-radius: 5px;
}
.container .right .write input {
  font-size: 16px;
  float: left;
  width: 450px;
  height: 40px;
  padding: 0 10px;
  color: var(--dark);
  border: 0;
  outline: none;
  background-color: #eceff1;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 400;
}
.container .right .write .write-link.attach:before {
  display: inline-block;
  float: left;
  width: 20px;
  height: 42px;
  content: '';
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/attachment.png");
  background-repeat: no-repeat;
  background-position: center;
}
.container .right .write .write-link.smiley:before {
  display: inline-block;
  float: left;
  width: 20px;
  height: 42px;
  content: '';
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/smiley.png");
  background-repeat: no-repeat;
  background-position: center;
}
.container .right .write .write-link.send:before {
  display: inline-block;
  float: left;
  width: 20px;
  height: 42px;
  margin-left: 11px;
  content: '';
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/send.png");
  background-repeat: no-repeat;
  background-position: center;
}
.container .right .bubble {
  font-size: 16px;
  position: relative;
  display: inline-block;
  clear: both;
  margin-bottom: 8px;
  padding: 13px 14px;
  vertical-align: top;
  border-radius: 5px;
}
.container .right .bubble:before {
  position: absolute;
  top: 19px;
  display: block;
  width: 8px;
  height: 6px;
  content: '\00a0';
  -webkit-transform: rotate(29deg) skew(-35deg);
          transform: rotate(29deg) skew(-35deg);
}
.container .right .bubble.you {
  float: left;
  color: var(--white);
  background-color: var(--blue);
  align-self: flex-start;
  -webkit-animation-name: slideFromLeft;
          animation-name: slideFromLeft;

}
.container .right .bubble.you:before {
  left: -3px;
  background-color: var(--blue);
}
.container .right .bubble.me {
  float: right;
  color: var(--dark);
  background-color: #eceff1;
  align-self: flex-end;
  -webkit-animation-name: slideFromRight;
          animation-name: slideFromRight;
}
.container .right .bubble.me:before {
  right: -3px;
  background-color: #eceff1;
}
.container .right .conversation-start {
  position: relative;
  width: 100%;
  margin-bottom: 27px;
  text-align: center;
}
.container .right .conversation-start span {
  font-size: 14px;
  display: inline-block;
  color: var(--grey);
}
.container .right .conversation-start span:before, .container .right .conversation-start span:after {
  position: absolute;
  top: 10px;
  display: inline-block;
  width: 30%;
  height: 1px;
  content: '';
  background-color: var(--light);
}
.container .right .conversation-start span:before {
  left: 0;
}
.container .right .conversation-start span:after {
  right: 0;
}

@keyframes slideFromLeft {
  0% {
    margin-left: -200px;
    opacity: 0;
  }
  100% {
    margin-left: 0;
    opacity: 1;
  }
}
@-webkit-keyframes slideFromLeft {
  0% {
    margin-left: -200px;
    opacity: 0;
  }
  100% {
    margin-left: 0;
    opacity: 1;
  }
}
@keyframes slideFromRight {
  0% {
    margin-right: -200px;
    opacity: 0;
  }
  100% {
    margin-right: 0;
    opacity: 1;
  }
}
@-webkit-keyframes slideFromRight {
  0% {
    margin-right: -200px;
    opacity: 0;
  }
  100% {
    margin-right: 0;
    opacity: 1;
  }
}

.scroll {
  max-height: 537px;
  overflow-y : scroll;
  overflow-x : hidden;
}
.scroll {
  max-height:440px
}
</style>