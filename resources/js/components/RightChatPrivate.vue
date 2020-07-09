

<template>
<div class="right">

    <div class="top">
          <span>to :
               <span class="name">
                <b :class="{'text-danger':session.block}">
                  {{friend.name}}
                  <span v-if="isTyping">is Typing . . .</span>
                  <span v-if="session.block">(Blocked)</span>
                </b>
                </span>
            </span>
              <a href @click.prevent="close">
                <i class="fa fa-times float-right" aria-hidden="true"></i>
              </a>

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

                  <a class="dropdown-item" href="#" @click.prevent="clear">Clear Chat</a>
              </div>
          </div>
       </div>
                <div class="chat scroll">
                      <div class="conversation-start">
                          <span>Today, 6:48 AM</span>
                      </div>

                    <div  v-for="chat in chats"  :key="chat.id">

                     <div  class="message" v-if="chat.type == 0">
                        <img class="imageM" :src="'assets/images/profile/'+ chat.user.image" />
                         
                         <div class="bubble you">
                        {{chat.message}} 

                        </div>
                      </div>

                    
                      <div class="inlineContainer own" v-else >
                         <img class="imageOwn" :src="'assets/images/profile/'+ chat.user.image" />
                        <div class="bubble me">
                        {{chat.message}} 
                        </div>
                      </div>
                    
                  <span v-if="chat.type == 0" class="message read" :class="{'text-success':chat.read_at!=null}">
                  <div v-if="chat.read_at">{{'read at'}} {{chat.read_at}} </div></span>
                  <span v-else class="own" :class="{'text-success':chat.read_at!=null}">{{chat.read_at}}</span>

                    </div>
                    
                </div>
               <div class="floating-div">
                <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pilih  emoji…" />
            
                  <form  @submit.prevent="send">
                      <div class="write">
                          <a href="javascript:;" class="write-link attach"></a>
                          <input type="text"  v-model="message" />
                          <a href="javascript:;" class="write-link smiley" @click="toggleEmo"></a>
                          <a href="javascript:;" class="write-link send"></a>
                      </div>
                    </form>
                </div>
</div>
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

.imageM {
  -webkit-border-radius:28px;
    -moz-border-radius:28px;
    border-radius:28px;
    border:1px solid #ccc;
    width:28px;
    height:28px;
    margin-top:10px;
    margin-right:10px;
}
.message{
   display: inline-flex;
   float: left;
   min-width:300px;
}

.message.read{
   display: inline-flex;
   float: left;
   min-width:300px;
   font-size:9px;
   padding-bottom:8px;
   margin-top:-5px;
}


.message .bubble.you span{
  font-size:10px;
  position:absolute;
  float: left;
  margin-top:-14px;
  color:black;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 600;
 
}
.message .bubble.you{
 
}

.inlineContainer.own {
  float: right;
  min-width:300px;
  flex-direction: row-reverse;
  
}

.imageOwn {
  -webkit-border-radius:28px;
    -moz-border-radius:28px;
    border-radius:28px;
    border:1px solid #ccc;
    width:28px;
    height:28px;
    margin-top:10px;
    margin-left:10px;
}

.chat.scroll {
  max-height: 490px;
  overflow-y: auto;
}

</style>