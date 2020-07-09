
<template>

<div>
      <post></post>
      
<v-flex>

   <div class="create_new_comment">

        <div class="floating-div">
            <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pick your emoji…" />

        </div>

		 	<div class="user_avatar">
		 		<span >
                    <div @click="toggleEmo" class="imoticon">
                    
                    <i class="fa fa-smile-o"></i>
                    </div>
                </span> 
		 	</div><div class="input_comment">
		 		<input 
                 type="text" placeholder="Tulis sesuatu disini . . . ."
                 v-model="postingan"
                @keyup.enter="addPostingan"
                >
		 	</div>

	</div>


   <!-- <div class="editor">
        
        <div class="floating-div">
            <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pick your emoji…" />

        </div>

        <div class="input-group ">

                <span class="input-group-btn">
                    <v-btn @click="toggleEmo" class="btn btn-default btn-sm">
                    
                    <i class="fa fa-smile-o" style="font-size:20px"></i>
                    </v-btn>
                </span> 

                <div class="input_comment" style="display:flex; flex:2">
                   
                    
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
    <!--</div>-->

</v-flex>

</div>


</template>

    <script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import { Picker } from 'emoji-mart-vue';
    import Post from './Post';
    
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
                    
               };
            },
             components: {
                           Picker,
                           "post":Post,
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

            },

            created() {
              
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

          .editor{
              position:fixed;
              width:inherit;
              max-width:inherit;
              bottom: 0;
              width: 100%;
              margin: 0 auto;
          }
          body {

            font-family: arial, sans-serif;
          }

.create_new_comment {
  width: 100%;
  padding: 20px 0;
  position:fixed;
    width:inherit;
    max-width:inherit;
    bottom: 0;
    width: 75%;
    margin: 0 auto;
    padding-left:30px;
}
 .create_new_comment .input_comment {
  display: inline-block;
  vertical-align: middle;
  margin-left: 10px;
  width: calc(100% - 75px);
}
 .create_new_comment .input_comment input[type="text"] {
  width: 100%;
  font-family: "Lato", sans-serif;
  font-weight: 300;
  font-size: 20px;
  padding: 10px;
  border: none;
  border-bottom: 2px solid #f2f2f2;
}
 .create_new_comment .input_comment input[type="text"]:focus {
  outline: none;
  border-bottom: 2px solid #e6e6e6;
}

.imoticon{
  border-radius: 50%;
  height: 45px;
  width :45px;
  border: 0.25em solid #000;
  box-shadow: 0 1px 1px #5ed3bf, inset 0 1px 1px #5ed3bf;
}
.fa.fa-smile-o{
  font-size:43px; 
  padding:-2px
}
    </style>