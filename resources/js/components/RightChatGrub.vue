
<template>

<div class="right">

    <div class="top"><span>Group  <span class="name">Chat</span></span>
       </div>
                <div class="chat scroll">
                    <div class="conversation-start">
                        <span>Today, 6:48 AM</span>
                    </div>
                
                   <!--<div  class="message" v-for="(message, index) in messages" :key="message + '-' + index">
                      <img class="imageM" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/thomas.jpg">
                         
                         <div class="bubble you">
                         <span>{{message.user.name}}</span>
                         
                        {{message.message}} 
                        </div>
                    </div> 
                    
                    
                     <div  class="message2 own" >
                      <img class="imageM" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/dog.png" alt="" />
                         
                         <div class="bubble me">
                         I was wondering...
                        </div>
                    </div>-->

                    <div v-for="(message, index) in messages" :key="message + '-' + index">

                     <div  class="message" v-if="message.user.id % 2 ==0">
                      <img class="imageM" :src="'assets/images/profile/'+ message.user.image">
                         
                         <div class="bubble you">
                        {{message.message}} 

                        </div>
                    </div>

                    
                      <div class="inlineContainer own" v-else >
                         <img class="imageOwn" :src="'assets/images/profile/'+ message.user.image" />
                        <div class="bubble me">
                        {{message.message}} 
                        </div>
                    </div>
                    

                    </div>
                    
                </div>
                <div class="floating-div">
                  <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pilih  emoji…" />
                  <form  @submit.prevent="send">
                    <div class="write">
                        <a href="javascript:;" class="write-link attach"></a>
                        <input type="text"  v-model="message" @keyup.enter="submit" />
                        <a href="javascript:;" class="write-link smiley" @click="toggleEmo"></a>
                        <a href="javascript:;" class="write-link send"></a>
                    </div>
                  </form>
                </div>
 </div>
</template>


<script>
import FormInput from "./Form";
import { Picker } from 'emoji-mart-vue';
export default {
  //INGAT TAG :message="" DI CODE SEBELUMNYA? CODE TERSEBUT DISEBUT SEBAGIA PROPS
  //GUNANYA UNTUK MENGIRIMKAN DATA KE COMPONENT YANG DITUJU
  //DALAM HAL INI KITA MENGIRIMKAN DATA DENGAN PROPS MESSAGE KE COMPONENT MESSAGES.VUE
  components: {
    "form-input": FormInput,
     Picker ,
  },
  // props: ["messages"],
  data() {
    return {
      messages: [],
      user: [],
      message: "",
      emoStatus: false ,
    };
  },
  //KETIKA FILE INI DI-LOAD ATAU AKAN DI-RENDER OLEH BROWSER
  created() {
    //MAKA AKAN MENJALANKAN FUNGSI fetchMessage()
    this.fetchMessages();
    //DAN MENGGUNAKAN LARAVEL ECHO, KITA AKSES PRIVATE CHANNEL BERNAMA CHAT YANG NNTINYA AKAN DIBUAT
    //KEMUDIAN EVENTNYA KITA LISTEN ATAU PANTAU JIKA ADA DATA YANG DIKIRIM
    Echo.private("chat").listen("MessageSent", e => {
      //DATA YANG DITERIMA AKAN DITAMBAHKAN KE DALAM VARIABLE MESSAGES SEBELUMNYA
      console.log(e);
      this.messages.push({
        message: e.message.message,
        user: e.user
      });
    });
    axios
      .get("/user-chat")
      .then(res => {
        this.user = res.data;
      })
      .catch(e => {
        this.errors.push(e);
      });
  },
  methods: {
    //FUNGSI FETCH MESSAGE UNTUK MEMINTA DATA DARI DATABASE TERKAIT PESAN YANG SUDAH LAMPAU
    fetchMessages() {
      //MENGGUNAKAN AXIOS UNTUK MELAKUKAN AJAX REQUEST
      axios.get("/messages").then(response => {
        //SETIAP DATA YANG DITERIMA AKAN DITAMBAHKAN KE VARIABLE MESSAGES
        this.messages = response.data;
      });
    },

    submit() {
        //MENGIRIMKAN EMIT KE PENGGUNA COMPONENT INI UNTUK KEMUDIAN DATANYA DIPROSES PADA FILE LAINNYA
        //EMITNYA BERNAMA SENT, DAN DATA YANG DIKIRIM ADALAH PESAN DAN USER PEMILIKNYA
        this.$emit("sent", {
            user: this.user,
            message: this.message
        });

        //INPUTAN UNTUK MENGIRIM PESAN DIKOSONGKAN LAGI
        this.message = "";
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

    send(){
       this.messages.push({
            user: this.user,
            message: this.message});
      //KEMUDIAN AKAN DISIMPAN KE DATABASE SEBAGAI LOG
      axios.post("/messages", {
            user: this.user,
            message: this.message}).then(response => {
        console.log(response.data);
      });
    }
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

.message2{
  
   float: right;
   min-width:300px;
   flex-direction: row-reverse;
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