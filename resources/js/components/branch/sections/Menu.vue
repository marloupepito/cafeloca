<template>
	<div class="container" solo style="background-color:white;height:100vh">
		 <v-form
		 method="post"
		 enctype="multipart/form-data"
	    ref="form"
	    v-model="valid"
	    lazy-validation
	  >
     <v-select
            :items="items"
            small-chips
            label="Menu"
            color="brown"
            multiple
            outlined
            dense
            v-model="menu"
            :rules="menuRules"
          ></v-select>

		<v-file-input

	    v-model="image"
	    accept="image/jpeg"
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

<v-text-field
      v-model="productName"
      :rules="productNameRules"
      label="Product Name"
      required
      solo
    ></v-text-field>

    <v-text-field
    type="number"
      v-model="productPrice"
      :rules="productPriceRules"
      label="Product Price"
      required
      solo
    ></v-text-field>

  <v-textarea
  :rules="aboutRules"
  v-model="about"
          solo
          name="input-7-4"
          label="About"
        ></v-textarea>

<div class=" align-self-end">
  <v-btn block :loading="loading" color="brown" @click="validate">
    <b style="color:white">POST</b>
  </v-btn>
</div>
 </v-form>


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
      items: ['Coffee', 'Bread', 'Delicacy', 'Snack'],
    	notiError:'',
    	snackbar: false,
    	text: "",
    	loading:false,
    	photo:[],
      valid: true,
      image: [],
      imageRules: [
        v => !!v || 'Image is required',
        v => v.length <= 5 || 'Name must be less than 5 image'
      ],
      menu: [],
      menuRules: [
        v => !!v || 'Menu is required',
      ],
      productName: '',
      productNameRules: [
        v => !!v || 'Product name is required',
      ],
      productPrice: '',
      productPriceRules: [
        v => !!v || 'Product name is required',
      ],
      about: '',
      aboutRules: [
        v => !!v || 'About is required',
      ],
     
    }),

    methods: {
    	
      validate (e) {
      	e.preventDefault()
      	this.loading = true;
        this.$refs.form.validate()
        const fd =new FormData()
        fd.append("images",this.image[0])
        fd.append("productName",this.productName)
        fd.append("about",this.about)
        fd.append("price",this.productPrice)
        fd.append("storeName",localStorage.getItem("storeName"))
        fd.append("count",this.image.length)
        fd.append("menu",this.menu)
        for(var i=0; i < this.image.length; i++){
    			fd.append("images"+i,this.image[i])
    		}
   		axios.post('/post_product', fd)
        	.then(res=>{
        		this.loading=false
        		this.$refs.form.reset()
        		this.notiError ='success'
        		this.text="Post successfully!"
        		this.snackbar=true
        	})
        	.catch(err=>{
        		this.loading=false
        		this.text="Invalid post!"
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