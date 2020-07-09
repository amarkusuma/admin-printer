<template>
    <div class="comment_block">


		 <!-- used by #{user} to create a new comment -->
	


		 <!-- new comment -->
		 <div class="new_comment">

			<!-- build comment -->
		 	<ul class="user_comment" v-for="(postingan , index  ) in postingans" :key="postingan.id" >

		 		
            <!-- current #{user} avatar -->
            <div class="user_avatar">
              <img :src="'assets/images/profile/'+ postingan.user.image">
            </div><!-- the comment body --><div class="comment_body">
              <p>{{ postingan.content }}</p>
            </div>

            <!-- comments toolbar -->
            <div class="comment_toolbar">

              <!-- inc. date and time -->
              <div class="comment_details">
                <ul>
                  <li><i class="fa fa-clock-o"></i> {{ postingan.created_at }} </li>
                  <li><i class="fa fa-calendar"></i> 04/01/2015</li>
                  <li v-on:click.prevent="FormComentar(index , postingan.id)"><i class="fa fa-comments"></i> 
                    <span class="user"> 
                    {{postingan.countComent}} komentar
                    </span>
                  </li>
                </ul>
              </div><!-- inc. share/reply and love --><div class="comment_tools">
                <ul>
                  <li><i class="fa fa-trash" 
                      v-show="user.id == postingan.user.id"
											v-on:click="deletePost(index , postingan.id )"
                  ></i></li>
                  <li><i class="fa fa-heart love"></i></li>
                </ul>
              </div>

            </div>
        
          <div v-show="indexcomponent == index ">
			     <comentar v-show="component == false " 
           :postinganid="postingan.id" 
           :indexcomment="postinganid" 
           :user ="user"
          
           ></comentar>
          </div>
		 	</ul>
      
		 </div>

<!-- new comment -->
		

		</div>
</template>

 <script>
 import Comentar from "./Comentar";
//  import CountComment from "./CountComment";

   export default {
     props:["countComments"],
			components: {
						"comentar":Comentar,
         
					},

            data(){
               return {
                    postingans:[],
					          component:"comentar",
                    indexcomponent:[],
                    postinganid:[],
                    countKommentar:0,
                    user:"",
                    
               };
            },
			
              created() {
                this.fectPostingan();
                this.getUser();
                Echo.channel('posting').listen('PostinganEvent',  e => {
                
                // console.log(e.postingan);
                this.postingans.push({
                    content: e.postingan.content,
                    created_at:e.postingan.created_at,
                    user:e.user ,
                    id:e.postingan.id ,
                    countComent:e.countComent   
                });
              });

              Echo.private('deletePostingan').listen('DeletePostinganEvent',  e => {
				
                let idpost = Number(e.id);
                let i = this.postingans.map(item => item.id).indexOf(idpost);
                // console.log(i);
                this.postingans.splice(i, 1);
              });
              
              //Event Komentar on Postingan

                Echo.channel('comentar').listen('CommentEvent',  e => {
          
                 let object = this.postingans.findIndex((obj => obj.id == e.comentar.postingan_id));
				
                 this.postingans[object].countComent +=1 ;
                    
                  });

                Echo.private('deleteComment').listen('DeletecommentEvent',  e => {

                 let object = this.postingans.findIndex((obj => obj.id == e.postingan.id ));
				        //  console.log(e.postingan.id);
                 this.postingans[object].countComent -=1 ;

                });

                Echo.channel('subcomentar').listen('SubcommentEvent',  e => {
            
                 let object = this.postingans.findIndex((obj => obj.id == e.comentar[0].postingan_id));
				         
                 this.postingans[object].countComent +=1 ;
                
                });

                Echo.private('deleteSubcomment').listen('DeleteSubcommentEvent',  e => {

                let object = this.postingans.findIndex((obj => obj.id == e.subcoment.postingan_id));
				        //  console.log(object)
                this.postingans[object].countComent -=1 ;
                
                 });

              
             },
            methods: {


                fectPostingan(){
                    axios.get("/getPostingan")
                    .then(response => {
                      //SETIAP DATA YANG DITERIMA AKAN DITAMBAHKAN KE VARIABLE posting
                     // console.log(response);
                      this.postingans = response.data.data;
                    }).catch(e => {
                      this.errors.push(e);
                    });
                },

                FormComentar(comentar , postinganid){
                this.indexcomponent = comentar ;
                this.postinganid = postinganid;
                (this.component == true) ? this.component = false : this.component = true ;
                  
                },

              countComment(id){
                    axios.get("/countComment/" + id )
                    .then(response => {
                      this.countKommentar = response.data;
                    }).catch(e => {
                      this.errors.push(e);
                    });
                    console.log(id)
                },


				      getUser(){
                    axios.get("/userOn")
                    .then(response => {
                      this.user = response.data;
                    }).catch(e => {
                      this.errors.push(e);
                    });
              },

              deletePost( index , id) {
                axios.delete('/deletePostingan/' + id)
                .then(response => {
                  // let i = list.map(item => item.id).indexOf(result)
                  // this.getcomments.splice(index, 1);
                  // console.log(index);
                    // this.indexdeletecomment = index;
                }).catch(error => {
                    console.log(error);
                });
               },

              //  addcountComent(idDelete){
              //    this.iddeleteComent  = idDelete ;
              //   //  console.log(this.iddeleteComent);
              //  }
            },      

        };
    </script>

<style>
@import url(https://fonts.googleapis.com/css?family=Lato:300,400);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
*,
*:before,
*:after {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  transition: all 0.2s ease;
}

body, html {
  height: 100%;
  width: 100%;
}

body {
  font-family: "Lato", sans-serif;
  font-size: 1rem;
  color: #333;
  background-color: #f4f4f4;
}

.user_avatar {
  width: 65px;
  height: 65px;
  display: inline-block;
  vertical-align: middle;
}
.user_avatar img {
  border-radius: 50%;
  height: 4em;
  border: 0.29em solid #5ed3bf;
  box-shadow: 0 1px 1px #5ed3bf, inset 0 1px 1px #5ed3bf;
}

.comment_block {
  width: 65%;
  height: 100%;
  margin: 0 auto;
  padding: 10px;
}
.comment_block .create_new_comment {
  width: 100%;
  padding: 20px 0;
}
.comment_block .create_new_comment .input_comment {
  display: inline-block;
  vertical-align: middle;
  margin-left: 10px;
  width: calc(100% - 75px);
}
.comment_block .create_new_comment .input_comment input[type="text"] {
  width: 100%;
  font-family: "Lato", sans-serif;
  font-weight: 300;
  font-size: 1.3rem;
  padding: 10px;
  border: none;
  border-bottom: 2px solid #f2f2f2;
}
.comment_block .create_new_comment .input_comment input[type="text"]:focus {
  outline: none;
  border-bottom: 2px solid #e6e6e6;
}
.comment_block .new_comment {
  width: 100%;
  height: auto;
  padding: 20px 0;
 /* border-top: 1px solid #e6e6e6;*/
}
.comment_block .new_comment .user_comment {
  list-style-type: none;
}
.comment_block .new_comment .comment_body {
  display: inline-block;
  vertical-align: middle;
  width: calc(100% - 75px);
  min-height: 65px;
  margin-left: 10px;
  padding: 5px 10px;
  font-size: .9rem;
  color: #555;
  background-color: #FFF;
  border-bottom: 2px solid #f2f2f2;
  box-shadow: 0 1px 1px rgba(0,0,0,0.2), inset 0 1px 1px rgba(0,0,0,0.1);
}
.comment_block .new_comment .comment_body .replied_to {
  margin: 5px 0px;
  background-color: #fafafa;
  border-bottom: 2px solid #f2f2f2;
  border-radius: 5px;
}
.comment_block .new_comment .comment_body .replied_to p {
  padding: 5px;
}
.comment_block .new_comment .comment_body .replied_to span {
  margin-right: 2px;
}
.comment_block .new_comment .comment_toolbar {
  width: 100%;
}
.comment_block .new_comment .comment_toolbar ul {
  list-style-type: none;
  padding-left: 75px;
  font-size: 0;
}
.comment_block .new_comment .comment_toolbar ul li {
  display: inline-block;
  padding: 5px;
  font-size: .7rem;
  color: #d9d9d9;
}
.comment_block .new_comment .comment_toolbar ul li:hover {
  cursor: pointer;
}
.comment_block .new_comment .comment_toolbar .comment_details {
  display: inline-block;
  vertical-align: middle;
  width: 70%;
  text-align: left;
}
.comment_block .new_comment .comment_toolbar .comment_tools {
  display: inline-block;
  vertical-align: middle;
  width: 30%;
  text-align: right;
}
.comment_block .new_comment .comment_toolbar .comment_tools li:hover {
  color: #CCC;
}
.comment_block .new_comment .user:hover {
  color: #6495ED;
  text-decoration: underline;
}
.comment_block .new_comment .love:hover {
  color: #FF6347;
}

</style>