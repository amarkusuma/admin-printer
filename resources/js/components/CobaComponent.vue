
<template>

<div>
      <div class="item" v-for="posting in postings" :key="posting.id">
          <div class="image">
            <div>
              <img src="http://lorempixel.com/400/400/people/1/" />
            
            </div>
          </div>
          <div class="details">
            <div>
              <h5></h5>
              <span>
              {{ posting.created_at }}
              </span>
              <p> {{ posting.content }}</p>
            </div>
          </div>
        </div>
      
 <v-flex>
    <div class="editor">
        
        <div class="floating-div">
            <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pick your emoji…" />

        </div>

        <div class="input-group ">

                <span class="input-group-btn">
                    <!-- ATAU JIKA TOMBOL SEND DI KLIK -->
                    <v-btn @click="toggleEmo" class="btn btn-default btn-sm">
                    
                    <i class="fa fa-smile-o" style="font-size:20px"></i>
                    </v-btn>
                </span> 

                <div style="display:flex; flex:2">
                   
                    
                     <input
                        type="text"
                        name="postingan"
                        class="form-control input-sm"
                        placeholder="Tulis Pesan ..."
                        v-model="postingan"
                        @keyup.enter="addPostingan"
                      />
                     
                </div>    

               
        </div>        
       <!-- 


                  <ckeditor
                        editor="classic"
                        tag-name="textarea"
                        v-model="postingan"
                        :editor="editor"
                        :config="editorConfig"
                        @ready="onEditorReady"
                        @focus="onEditorFocus"

                    ></ckeditor>  


                     <span class="input-group-btn">
                    <button
                        class="btn btn-primary btn-sm"
                        id="btn-chat"
                        @click="addPostingan"
                    >
                        Submit 
                    </button>
                </span>  
      -->
    </div>

  </v-flex>

</div>


</template>

    <script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import { Picker } from 'emoji-mart-vue';
    
        export default {

            data(){
               return {
                    editor: ClassicEditor,
                    postingan: "",
                    editorConfig: {
                        toolbar: false,
                        
                     },
                    content:[],
                    emoStatus:false ,
                    postings:[],
               };
            },
             components: {
                           Picker,
                          
                        },

            created() {
                this.fectPostingan();
                Echo.channel('posting').listen('PostinganEvent',  e => {
                
                console.log(e.postingan);
                 this.postings.push({
                    postingan: e.postingan.postingan,
                    user: e.user
                });
             
              });
             },
                        
            methods: {
                onEditorReady( editor ) {
                    console.log( 'Editor is ready.', { editor } );
                },
                onEditorFocus( event, editor ) {
                    console.log( 'Editor focused.', { event, editor } );
                },

                toggleEmo(){
                    this.emoStatus =! this.emoStatus ;
                },  

                onInput(e){
                    if(!e){
                    return false;
                    }
                    if(!this.postingan){
                    this.postingan=e.native;
                    }else{
                    this.postingan=this.postingan + e.native;
                    }
                    this.emoStatus=false;
                },

                addPostingan(){
                   axios.post("/postingan" ,{
                       postingan : this.postingan
                       })
                   .then(response => {
                        console.log(response.data);
                         this.postingan = "" ;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                   
                },

                fectPostingan(){
                    axios.get("/getPostingan")
                    .then(response => {
                      //SETIAP DATA YANG DITERIMA AKAN DITAMBAHKAN KE VARIABLE posting
                     // console.log(response);
                      this.postings = response.data;
                    }).catch(e => {
                      this.errors.push(e);
                    });
                }

            },

           

        };
    </script>

    <style>
      
        textarea {
            width: 100%;
            height: 100px;
            font-family: monospace;
        }

         .ck-editor__editable {
          min-height: 20px; 
    
          
          }
          .ck.ck-editor__main {
           
          }
          .ck.ck-reset.ck-editor.ck-rounded-corners {
          
          }
          .editor{
              position:fixed;
              width:inherit;
              max-width:inherit;
              bottom: 0;
              min-width: 80%;
              margin: 0 auto;
          }
          body {

            font-family: arial, sans-serif;
          }

    </style>