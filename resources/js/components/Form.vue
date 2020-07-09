<template>

    <div class="floating-div">

            <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pilih  emoji…" />
       
    <div class="input-group ">
        <!-- INPUTAN INI AKAN KETRIGGER JIKA TOMBOL ENTER DITEKAN -->
        
        <span class="input-group-btn">
            <!-- ATAU JIKA TOMBOL SEND DI KLIK -->
            <v-btn @click="toggleEmo" class="btn btn-default btn-sm">
            
            <i class="fa fa-smile-o" style="font-size:20px"></i>
            </v-btn>
        </span> 
              
        <input
            type="text"
            name="message"
            class="form-control input-sm"
            placeholder="Kirim Pesan..."
            v-model="message"
            @keyup.enter="submit"
        />
        <span class="input-group-btn">
            <!-- ATAU JIKA TOMBOL SEND DI KLIK -->
            <button
                class="btn btn-primary btn-sm"
                id="btn-chat"
                @click="submit"
            >
                Send
            </button>
        </span>
         
    </div>
     </div>
</template>

<script>
import { Picker } from 'emoji-mart-vue';

export default {
    //COMPONENT INI JUGA MEMINTA DATA USER YANG AKAN MENGIRIMKAN PESAN
    //DARI CODE SEBELUMNYA KITA JUGA MENGIRIMKAN PROPS BERUPA DATA USER YANG SEDANG LOGIN
    props: ["user"],
    data() {
        return {
            //VALUE DEFAULT DARI INPUTAN KOSONG
            message: "",
            emoStatus: false ,
        };
    },

    components:{
          Picker ,
    },

    methods: {
        //JIKA ENTER ATAU TOMBOL DIKLIK MAKA FUNGSI INI AKAN DIJALANKAN
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
    }
};
</script>
