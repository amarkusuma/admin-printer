<template>
    <div>
       	<!-- start user replies -->
		 	<li>
		 		
		 		<!-- current #{user} avatar -->
			 	<div class="user_avatar">
			 		
			 	</div><!-- the comment body --><div class="comment_body">
			 		<p>
					 
					<div  v-for="(comment , index  ) in getcomments" :key="comment.id">
					  <div v-show="indexcomment == comment.postingan_id">
							<div class="replied_to" >
								<p><span class="nameUser">{{comment.user.name}}: </span>
								{{comment.komentar}}
								</p>


							<!-- comments toolbar -->
								<div class="toolbar">

									<!-- inc. date and time -->
									<div class="sub comment">
										<ul>
											<li><i class="fa fa-clock-o"></i> 14:52</li>
											<li><i class="fa fa-calendar"></i> 04/01/2015</li>
											<li v-on:click.prevent="Formcomment(index )"><i class="fa fa-comments"></i>
												{{comment.count}} komentar
											</li>
											<li v-show="user.id == comment.user.id"
											v-on:click="deleteComment(index , comment.id , comment.postingan_id)"
											><i class="fa fa-trash">
											</i> hapus </li>
										</ul>
									</div>

								</div>
								
								
							</div>
							    
							<div>
								 <subcomentar 
								 :clicksubcomment="clicksubcomment" 
								 :indexsubcomment="indexsubcomment" 
								 :index="index"
								 :commentsid="comment.id"
								 :user="user">
								 </subcomentar>
							</div>

					   </div>
					 </div>
					 <br>
					<div class="input_comment" v-show="clickcomment">
		 		     <input
					  type="text" placeholder="Tulis Comentar.." 
					  name="comment"
					  v-model="comments"
                      @keyup.enter="addComment"
					  style="width:100%">
		    	    </div>
			        </p>
			 	</div>

			 	


		 	</li>
 
    </div>
</template>


<script>
 import Subcomentar from "./SubComment";
   export default {

		components: {
				"subcomentar":Subcomentar,
			},

            props: ["postinganid", "indexcomment", "user"],
            data(){
               return {
                    comments:"",
					getcomments:[],
					clicksubcomment: false ,
					clickcomment:true ,
					indexsubcomment :[],
					idDelete:"",

					
               };
            },

			created(){
              this.fectComment();
			    Echo.channel('comentar').listen('CommentEvent',  e => {
                
                // console.log(this.getcomments);
                this.getcomments.push({
                    komentar: e.comentar.komentar,
                    // created_at:e.postingan.created_at,
					id: e.comentar.id,
					postingan_id: e.comentar.postingan_id,
                    user:e.user,
					count: e.count
                    
                });
             
              });

			   Echo.private('deleteComment').listen('DeletecommentEvent',  e => {
				
				let b = Number(e.id);
				let i = this.getcomments.findIndex((obj => obj.id == b));
				// console.log(i);
				this.getcomments.splice(i, 1);

              });

			  //COUNTSUBCOMMENTT

				Echo.channel('subcomentar').listen('SubcommentEvent',  e => {

				let object = this.getcomments.findIndex((obj => obj.id == e.subcomentar.comments_id));
				// let i = this.getcomments.map(item => item.id).indexOf(e.subcomentar.comments_id);
				// let a = this.getcomments[i].count + 1 ;
                this.getcomments[object].count +=1 ;
			
			});

				Echo.private('deleteSubcomment').listen('DeleteSubcommentEvent',  e => {
				
				let object = this.getcomments.findIndex((obj => obj.id == e.subcoment.id));
				// let i = this.getcomments.map(item => item.id).indexOf(idSub);
				// let a = this.getcomments[i].count - 1 ;
				this.getcomments[object].count -=1 ;
				});
			},
	
            methods: {
                addComment(){
                   axios.post("/komentar" ,{
                       comment : this.comments,
					   postinganid: this.postinganid
                       })
                   .then(response => {
                        // console.log(response.data);
                         this.comments = "" ;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                   
                },

				deleteComment( index , id , postinganid) {
				axios.delete('/deleteComment/' + id + '/' + postinganid )
				.then(response => {
					
				}).catch(error => {
                        console.log(error);
                    });

				// this.$emit("iddeleteComent", {
				// 		idDelete: postinganid,
				
				// 	});
				
				},

				fectComment(){
                    axios.get("/getComment")
                    .then(response => {
                      this.getcomments = response.data.data;
                    }).catch(e => {
                      this.errors.push(e);
                    });
                },

				Formcomment(index){
					this.indexsubcomment = index ;
					(this.clickcomment == false) ? this.clickcomment = true :this.clickcomment = false ;
					(this.clicksubcomment == false) ? this.clicksubcomment = true :this.clicksubcomment = false ;
				},

				
            },
  

        };
    </script>


<style>
.comment_block .new_comment .toolbar {
  width: 100%;
}
.comment_block .new_comment .toolbar ul {
  list-style-type: none;
  padding-left: 5px;
  font-size: 0;
}
.comment_block .new_comment .toolbar ul li {
  display: inline-block;
  padding: 5px;
  font-size: .7rem;
  color: #d9d9d9;
}
.comment_block .new_comment .toolbar ul li:hover {
  cursor: pointer;
}
.comment_block .new_comment .toolbar .sub .comment {
  display: inline-block;
  vertical-align: middle;
  width: 70%;
  text-align: left;
}
.nameUser{
	color: #6495ED;
	font-size:15px;
	font-family: "Lato", sans-serif;
    font-weight: 500;
}

.comment_block .new_comment .comment_body .replied_to p {
  font-size:14px;
  font-family: "Lato", sans-serif;
  font-weight: 500;
}

</style>