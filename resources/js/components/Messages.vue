<template>
  <div>
    <table class="table stylish-table">
      <thead>
        <tr>
          <th class="th" colspan="2">Percakapan Antar Pengguna</th>
        </tr>
      </thead>
      <tbody>
        <div class="scroll">
          <tr v-for="(message, index) in messages" :key="message + '-' + index">
            <td style="width:50px;">
              <span class="round">S</span>
            </td>
<<<<<<< HEAD
            <td style="width:680px">
=======
            <td style="width:580px">
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
              <h6 class="name-user">{{ message.user.name }}</h6>
              <div>
                <small class="text-muted" id="message">
                  <a href="#">{{ message.message }}</a>
                </small>
              </div>
            </td>
          </tr>
        </div>
      </tbody>
    </table>

    <form-input v-on:sent="addMessage" :user="user"></form-input>
  </div>
</template>

<script>
import FormInput from "./Form";
export default {
  //INGAT TAG :message="" DI CODE SEBELUMNYA? CODE TERSEBUT DISEBUT SEBAGIA PROPS
  //GUNANYA UNTUK MENGIRIMKAN DATA KE COMPONENT YANG DITUJU
  //DALAM HAL INI KITA MENGIRIMKAN DATA DENGAN PROPS MESSAGE KE COMPONENT MESSAGES.VUE
<<<<<<< HEAD
=======

>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
  components: {
    "form-input": FormInput
  },
  // props: ["messages"],
  data() {
    return {
      messages: [],
      user: []
    };
  },
  //KETIKA FILE INI DI-LOAD ATAU AKAN DI-RENDER OLEH BROWSER
  created() {
    //MAKA AKAN MENJALANKAN FUNGSI fetchMessage()
    this.fetchMessages();
<<<<<<< HEAD
=======

>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
    //DAN MENGGUNAKAN LARAVEL ECHO, KITA AKSES PRIVATE CHANNEL BERNAMA CHAT YANG NNTINYA AKAN DIBUAT
    //KEMUDIAN EVENTNYA KITA LISTEN ATAU PANTAU JIKA ADA DATA YANG DIKIRIM
    Echo.private("chat").listen("MessageSent", e => {
      //DATA YANG DITERIMA AKAN DITAMBAHKAN KE DALAM VARIABLE MESSAGES SEBELUMNYA
      this.messages.push({
        message: e.message.message,
        user: e.user
      });
    });
<<<<<<< HEAD
=======

>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
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
<<<<<<< HEAD
=======

>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
    //INGAT EMIT YANG DIKIRIM? AKAN DI-HANDLE DISINI
    //CARA TRACE-NYA GIMANA? PERHATIKAN FILE CHAT.BLADE.PHP, TERDAPAT ATTRIBUTE v-on:sent="addMessage" DI DALAM TAG DW-FORM
    //YANG BERARTI KETIKA EMIT BERNAMA SENT DITERIMA, MAKA AKAN MEMICU FUNGIS addMessage
    addMessage(message) {
      //PESAN YANG DITERIMA AKAN DITAMBAHKAN KE VARIABLE MESSAGE
      this.messages.push(message);
<<<<<<< HEAD
=======

>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
      //KEMUDIAN AKAN DISIMPAN KE DATABASE SEBAGAI LOG
      axios.post("/messages", message).then(response => {
        console.log(response.data);
      });
    }
  }
};
</script>

<style>
.name-user {
  padding-bottom: 10px;
}
.scroll {
  max-height: 350px;
  overflow-y: auto;
}
thead .th {
  padding-bottom: 2em;
}
.round {
}
</style>