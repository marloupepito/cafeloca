<template lang="">
    <div class="container">
        <div id="app" style="padding-top:40px;">
            <div class="row">
              <div class="col-md-8 col-8">
              <img src="/images/logins.png" width="100%">
              </div>
              <div class="col-md-4 col-4">
               <img src="/images/logo.png" width="100px">
              </div>
              <div class="col-md-12 col-12">
                <center>
                  <b class="text-danger" v-if="incorrect === null"></b>
                    <div v-if="incorrect === 'load'">
                     <v-progress-linear
                      indeterminate
                      color="brown"
                    ></v-progress-linear>
                      </div>
                    <div v-else class="text-danger">{{incorrect}}</div>
                </center>
              </div>
            </div>
            <div class="login login-v2 fw-bold" >
             
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

                              <a class="float-right">
                                    <u class="text-dark">Forget Password?</u>
                                  </a>
                                   <br /> <br />
                            <v-btn
                              :disabled="!valid"
                              color="brown"
                              class="mt-4 text-white"
                              block
                              @click="validate"
                            >
                              Sign In
                            </v-btn>
                            <br />
                            <center class=" text-brown">
                              Not registered?   <router-link to="/register">
                                    <u>Create an account!?</u>
                                  </router-link>
                            </center>
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
        this.incorrect = 'load'
        this.$refs.form.validate()
        if(this.$refs.form.validate() === true){
            axios.post('/user_login',{
                email:this.email,
                password:this.password
            })
            .then(res=>{        
                if(res.data.status === 'success'){
                    window.location ='/administrator/dashboard'
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
