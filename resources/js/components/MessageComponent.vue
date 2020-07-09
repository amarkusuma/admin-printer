<template>
<<<<<<< HEAD

  <div class="table stylish-table">
  
      <div class="card-header">
        <b :class="{'text-danger':session.block}">
          {{friend.name}}
          <span v-if="isTyping">is Typing . . .</span>
          <span v-if="session.block">(Blocked)</span>
        </b>

=======
  <div class="card">
    <div class="card-block">
      <div class="card-header">
        <b :class="{'text-danger':session.block}">
          {{friend.name}}
          <span v-if="isTyping">is Typing . . .</span>
          <span v-if="session.block">(Blocked)</span>
        </b>

>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
        <!-- Close Button -->
        <a href @click.prevent="close">
          <i class="fa fa-times float-right" aria-hidden="true"></i>
        </a>
        <!-- Close Button Ends -->
<<<<<<< HEAD

        <!-- Options -->
        <div class="dropdown float-right mr-4">
          <a href data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a
              class="dropdown-item"
              href="#"
              v-if="session.block && can"
              @click.prevent="unblock"
            >UnBlock</a>
            <a class="dropdown-item" href="#" @click.prevent="block" v-if="!session.block">Block</a>

=======

        <!-- Options -->
        <div class="dropdown float-right mr-4">
          <a href data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a
              class="dropdown-item"
              href="#"
              v-if="session.block && can"
              @click.prevent="unblock"
            >UnBlock</a>
            <a class="dropdown-item" href="#" @click.prevent="block" v-if="!session.block">Block</a>

>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
            <a class="dropdown-item" href="#" @click.prevent="clear">Clear Chat</a>
          </div>
        </div>
        <!-- Options Ends -->
      </div>
<<<<<<< HEAD
       <!--v-chat-scroll -->
    

     <div class="scroll">
      <div class="bubbleWrapper "  v-for="chat in chats"
          :key="chat.id">
        <div  v-if="chat.type == 0" class="inlineContainer">
          <img class="inlineIcon" src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png">
        
            <div class="otherBubble other" :class="{'text-dark':chat.type == 0}">
                {{chat.message}}
            </div>
        </div>
         <div  v-else class="inlineContainer own">
            <img class="inlineIcon" src="https://www.pinclipart.com/picdir/middle/205-2059398_blinkk-en-mac-app-store-ninja-icon-transparent.png">
            <div class="ownBubble own" :class="{'text-dark':chat.type == 0}">
                {{chat.message}}
            </div>
        </div>
        <span v-if="chat.type == 0" class="other" :class="{'text-success':chat.read_at!=null}"><div v-if="chat.read_at">{{'read at'}} {{chat.read_at}} </div></span>
        <span v-else class="own" :class="{'text-success':chat.read_at!=null}">{{chat.read_at}}</span>
    </div>
     </div>

     <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pilih  emoji…" />
     
      <form  @submit.prevent="send">
        <div class="input-group">

         <span class="input-group-btn">
            <!-- button Icon-->
            <v-btn @click="toggleEmo" class="btn btn-default btn-sm">
            <i class="fa fa-smile-o" style="font-size:20px"></i>
            </v-btn>
        </span> 

          <input
            type="text"
            class="form-control input-sm"
<<<<<<< HEAD
            placeholder="Tulis Pesan kamu disini"
=======
=======

      <div class="card-body" v-chat-scroll>
        <p
          class="card-text"
          :class="{'text-right':chat.type == 0,'text-success':chat.read_at!=null}"
          v-for="chat in chats"
          :key="chat.id"
        >
          {{chat.message}}
          <br />
          <span style="font-size:8px">{{chat.read_at}}</span>
        </p>
      </div>
      <form class="card-footer" @submit.prevent="send">
        <div class="form-group">
          <input
            type="text"
            class="form-control"
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
            placeholder="Write your message here"
>>>>>>> 14019f05d6ab53588dd7fbf976718bce3070c0df
            v-model="message"
          />
        </div>
      </form>
<<<<<<< HEAD
 
    </div>
=======
    </div>
  </div>
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
</template>

<script>
import { Picker } from 'emoji-mart-vue';
export default {
  props: ["friend", "user"],
  // props: ["user"],
  data() {
    return {
      chats: [],
      message: null,
      isTyping: false,
      emoStatus:false,
    };
  },

  components:{
       Picker,
  },
  computed: {
    session() {
      return this.friend.session;
    },
    can() {
      return this.session.blocked_by == auth.id;
    }
  },
  watch: {
    message(value) {
      if (value) {
        Echo.private(`chat.${this.friend.session.id}`).whisper("typing", {
          // name: auth.name
        });
      }
    }
  },
  methods: {
    send() {
      if (this.message) {
        this.pushToChats(this.message);
        axios
          .post(`/send/${this.friend.session.id}`, {
            message: this.message,
            to_user: this.friend.id
          })
          .then(res => (this.chats[this.chats.length - 1].id = res.data));
         this.message = null;
      }
    },
    pushToChats(message) {
      this.chats.push({
        message: message,
        type: 0,
        read_at: null,
        sent_at: "Just Now"
      });
    },
    close() {
      this.$emit("close");
    },
    clear() {
      axios
        .post(`/session/${this.friend.session.id}/clear`)
        .then(res => (this.chats = []));
    },
    block() {
      this.session.block = true;
      axios
        .post(`/session/${this.friend.session.id}/block`)
        .then(res => (this.session.blocked_by = auth.id));
    },
    unblock() {
      this.session.block = false;
      axios
        .post(`/session/${this.friend.session.id}/unblock`)
        .then(res => (this.session.blocked_by = null));
    },
    getAllMessages() {
      axios
        .post(`/session/${this.friend.session.id}/chats`)
        .then(res => (this.chats = res.data.data));
    },
    read() {
      axios.post(`/session/${this.friend.session.id}/read`);
    },
     toggleEmo(){
                    this.emoStatus =! this.emoStatus ;
                },  

        onInput(e){
            if(!e){
            return false;
            }
            if(!this.message){
            this.message=e.native;
            }else{
            this.message=this.message + e.native;
            }
            this.emoStatus=false;
        },
  },
  created() {
    this.read();
    this.getAllMessages();
    Echo.private(`chat.${this.friend.session.id}`).listen(
      "PrivateChatEvent",
      e => {
        this.friend.session.open ? this.read() : "";
        this.chats.push({ message: e.message, type: 1, sent_at: "Just Now" });
      }
    );
    Echo.private(`chat.${this.friend.session.id}`).listen("MsgReadEvent", e =>
      this.chats.forEach(chat =>
        chat.id == e.chat.id ? (chat.read_at = e.chat.read_at) : ""
      )
    );
    Echo.private(`chat.${this.friend.session.id}`).listen(
      "BlockEvent",
      e => (this.session.block = e.blocked)
    );
    Echo.private(`chat.${this.friend.session.id}`).listenForWhisper(
      "typing",
      e => {
        this.isTyping = true;
        setTimeout(() => {
          this.isTyping = false;
        }, 2000);
      }
    );
  }
};
</script>

<style>
.chat-box {
  height: 400px;
}
.card-body {
  overflow-y: scroll;
}

.card-text.private-chat{
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}
.bubbleWrapper {
	padding: 10px 10px;
	display: flex;
	justify-content: flex-end;
	flex-direction: column;
	align-self: flex-end;
  color: #fff;
}
.inlineContainer {
  display: inline-flex;
}
.inlineContainer.own {
  flex-direction: row-reverse;
}
.inlineIcon {
  width:20px;
  object-fit: contain;
}
.ownBubble {
	min-width: 60px;
	max-width: 700px;
	padding: 14px 18px;
  margin: 6px 8px;
	background-color: #5b5377;
	border-radius: 16px 16px 0 16px;
	border: 1px solid #443f56;
 
}
.otherBubble {
	min-width: 60px;
	max-width: 700px;
	padding: 14px 18px;
  margin: 6px 8px;
	background-color: #ddddd2;
	border-radius: 16px 16px 16px 0;
	border: 1px solid #54788e;
  
}
.own {
	align-self: flex-end;
  font-size: 12px;
}
.other {
	align-self: flex-start;
  font-size: 12px;
}
span.own,
span.other{
  font-size: 10px;
  color: grey;
}
.scroll {
  max-height: 370px;
  overflow-y: auto;
}
</style>