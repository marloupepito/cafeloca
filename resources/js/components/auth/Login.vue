<template lang="">
    <div class="container">
        <div id="app" class="app col-md-5 offset-md-4">
        <br /> <br /> <br />
            
            <div class="row">
              <div class="col-md-5 col-5">
              <h2>Login</h2>
              </div>
              <div class="col-md-7 col-7">
              <b class="text-danger">{{incorrect}}</b>
              </div>
            </div>
            <div class="login login-v2 fw-bold"  style="height:65vh">
             
                <div class="login-container">
                    <div class="login-content">
                        <v-form
    ref="form"
    v-model="valid"
    lazy-validation
  >
    <v-text-field
      v-model="email"
      :rules="emailRules"
      label="Email"
      required
      v-on:keyup.enter="validate"
    ></v-text-field>

    <v-text-field
      type="password"
      v-model="password"
      :rules="passwordRules"
      label="Password"
      required
      v-on:keyup.enter="validate"
    ></v-text-field>


    <v-btn
      :disabled="!valid"
      color="black"
      class="mt-4 text-white"
      block
      @click="validate"
    >
      Sign In
    </v-btn>
  </v-form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
  export default {
    data: () => ({
      incorrect:null,
      valid: true,
      password: '',
      passwordRules: [
        v => !!v || 'password is required',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
    }),

    methods: {
      validate () {
        this.incorrect = null
        this.$refs.form.validate()
        if(this.$refs.form.validate() === true){
            axios.post('/user_login',{
                email:this.email,
                password:this.password
            })
            .then(res=>{        
                if(res.data.status === 'success'){
                    window.location ='/admin'
                }else{
                  this.incorrect = res.data.status
                }
            })
            .catch(err=>{
                console.log(err)
            //    this.$refs.form.reset()
            })
        }else{
             this.$refs.form.reset()
        }
      },
    },
  }
</script>
<style lang=""></style>
