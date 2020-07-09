
<template>
   
   <div>
        <div v-for="(subcomment , index  ) in getSubcomments" :key="subcomment.id">
          <div class="subcomment" v-show="commentsid == subcomment.comments_id" v-on:mouseover="hovered(index)" v-on:mouseleave="unhovered(index)" >
            <p>
            <span class="nameUser">{{subcomment.user.name}}: </span> 
            {{subcomment.komentar}}
            <span class="deletesubComment" >
            <i class="fa fa-times" 
               v-if="hover" 
               v-show="index == indexid && user.id == subcomment.user.id"
               v-on:click="deleteSubcomment(index , subcomment.id , subcomment.comments_id )"
            >
            </i></span>
            </p>
          </div>
        </div> 
        <div v-show="indexsubcomment == index">
        <div class="input_comment" v-show="clicksubcomment">
        <input
        type="text" placeholder="comentar.." 
        v-model="subcomments"
        @keyup.enter="addSubComment"
        style="width:100%">
        </div>
        </div>
   </div>

</template>


<script>
export default {


   props: ["clicksubcomment", "indexsubcomment" , "index", "commentsid","user"] ,

   data(){
        return {
            subcomments:"",
            getSubcomments:[],
            hover:false ,
            indexid:"",
            
        };
    },

    created(){
        this.fectSubcomment();
       Echo.channel('subcomentar').listen('SubcommentEvent',  e => {
                
        // console.log(e.user);
        this.getSubcomments.push({
            komentar: e.subcomentar.komentar,
            // created_at:e.postingan.created_at,
            comments_id: e.subcomentar.comments_id,
            user:e.user,
            id:e.subcomentar.id
            
        });
        
        });

         Echo.private('deleteSubcomment').listen('DeleteSubcommentEvent',  e => {
				
            let idSub = Number(e.id);
            let i = this.getSubcomments.map(item => item.id).indexOf(idSub);
            // console.log(i);
            this.getSubcomments.splice(i, 1);

            });
    },

    methods: {

            addSubComment(){
                axios.post("/subkomentar" ,{
                    subcomment : this.subcomments,
                        comentarid: this.commentsid
                    })
                .then(response => {
                    // console.log(response.data);
                        this.subcomments = "" ;
                })
                .catch(error => {
                    console.log(error);
                });
                
            },

            fectSubcomment(){
                axios.get("/getSubcomment")
                .then(response => {
                    this.getSubcomments = response.data.data;
                }).catch(e => {
                    this.errors.push(e);
                });
            },

            // Formcomment(index){
            // 	this.indexsubcomment = index ;
            // 	(this.clickcomment == false) ? this.clickcomment = true :this.clickcomment = false ;
            // 	(this.clicksubcomment == false) ? this.clicksubcomment = true :this.clicksubcomment = false ;
            // }

            hovered(index ){
                    this.hover = true ;
                    this.indexid = index;
            },
            unhovered(){
                this.hover = false ;
            },

            deleteSubcomment( index , id , idcomment) {
            axios.delete('/deleteSubcomment/' + id + '/' + idcomment)
            .then(response => {
                // let i = list.map(item => item.id).indexOf(result)
                // this.getcomments.splice(index, 1);
                // console.log(index);

            }).catch(error => {
                    console.log(error);
                });
            
            
            },

            },
}
</script>


<style>

.comment_block .new_comment .comment_body .subcomment p {
  font-size:14px;
  font-family: "Lato", sans-serif;
  font-weight: 500;
}

.comment_block .new_comment .comment_body .subcomment  {
   padding-left:10px;
    border: 3px solid #CCC;
    margin: 8px;
    border-width: 0 0 1px 1px;
    border-style: solid;
    border-color: #e5e5e5;
    background: #fff;

}

.fa.fa-times{
    padding-right:2%;
    float:right;
    padding-top:7px;
}

</style>
