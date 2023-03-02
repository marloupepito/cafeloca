<template>
	<div class="container" solo style="background-color:white;height:50vh">
    Uploaded Documents
		 <v-form
		 method="post"
		 enctype="multipart/form-data"
	    ref="form"
	    v-model="valid"
	    lazy-validation
	  >
 

		<v-file-input

	    v-model="image"
	    class="card"
	    color="brown"
	    :rules="imageRules"
	    counter
	    label="Select images"
	    multiple
	    placeholder="Select your files"
	    prepend-icon="mdi-image"
	    outlined
	    :show-size="1000"
	    dense
	    solo
	  >
  

    <template v-slot:selection="{ index, text }">
      <v-chip
        v-if="index < 2"
        color="brown"
        dark
        label
        small
      >
        {{ text }}
      </v-chip>

     
    </template>
  </v-file-input>



 



<div class=" align-self-end">
  <v-btn  :disabled="image.length === 0?true:false" block :loading="loading" color="brown" @click="validate">
    <b style="color:white">UPLOAD</b>
  </v-btn>
</div>
 </v-form>

 <table class="table">
  <thead>
    <tr >
      <th scope="col">Documents</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="i in documents">
      <th scope="row"><a  @click="showDocuments(i.documents)" >{{i.documents}}</a></th>
      <th scope="row"><a  @click="deleteDocuments(i.id)" >Delete</a></th>
    </tr>
  </tbody>
</table>


 <v-snackbar
      v-model="snackbar"
      absolute
      center
      shaped
      top
    >
      {{ text }}

      <template v-slot:action="{ attrs }">
        <v-btn

          :color="notiError"
          text
          v-bind="attrs"
          @click="snackbar = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>

	</div>
</template>



<script>
import axios from 'axios'
  export default {
    data: () => ({
    	notiError:'',
    	snackbar: false,
    	text: "",
    	loading:false,
    	photo:[],
      valid: true,
      image: [],
      documents:[],
      imageRules: [
        v => !!v || 'Image is required',
        v => v.length <= 5 || 'Name must be less than 5 image'
      ],

    }),

    mounted(){
      this.mount()
      },
    methods: {
      mount(){
          axios.post('/get_every_documents',{
          id:localStorage.getItem("idsss")
          })
        .then(res=>{
          this.mount()
          this.documents = res.data.status
          })
        },
      deleteDocuments(id){
        if(window.confirm('You want to delete this file?')){
          axios.post('/delete_documents',{
          id:id
          })
        .then(res=>{
          })
        }else{

        }
        
        },
    	showDocuments(filname){
      window.open('/images/file/'+filname, '_blank')
      },
      validate (e) {
      	e.preventDefault()
      	this.loading = true;
        this.$refs.form.validate()
        const fd =new FormData()
        
        fd.append("id",localStorage.getItem("idsss"))
        fd.append("count",this.image.length)
        for(var i=0; i < this.image.length; i++){
    			fd.append("documents"+i,this.image[i])
    		}
   		axios.post('/upload_documents', fd)
        	.then(res=>{
        		this.loading=false
        		this.$refs.form.reset()
        		this.notiError ='success'
        		this.text="Documents Uploaded!"
        		this.snackbar=true
        	})
        	.catch(err=>{
        		this.loading=false
        		this.text="Invalid Uploaded!"
        		this.notiError ='red accent-2'
        		this.snackbar=true
        	})
      },
      reset () {
        this.$refs.form.reset()
      },
      resetValidation () {
        this.$refs.form.resetValidation()
      },
    },
  }
</script>