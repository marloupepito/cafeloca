<template lang="">
    <div class="container col-md-9" style="background-color:white;height:110vh">
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
                </center><br />
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
                              label="Username"
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

                              <a @click="gotoForget" class="float-right">
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
                             <b class="text-white" style="color:white"> Sign In</b>
                            </v-btn>
                            <br />
                            <center class=" text-brown">
                              Not registered?   <router-link to="/visit/register">
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
        v => !!v || 'Username is required',
      ],
    }),

    methods: {
      gotoForget(){
        this.$router.push({path:'/visit/forget'})
        },
      validate (e) {
        e.preventDefault()
        this.incorrect = 'load'
        this.$refs.form.validate()
        if(this.$refs.form.validate() === true){
            axios.post('/user_login',{
                username:this.email,
                password:this.password
            })
            .then(res=>{    
                if(res.data.status.usertype === 'cafe'){
                  
                  if(res.data.status.status === 'Pending'){
                      this.incorrect = 'Your application is already pending!'
                    }else{
                 window.location ='/my_account/profile'
                     localStorage.setItem("active", 3)
                     localStorage.setItem("storeName", res.data.status.store_name)
                     localStorage.setItem("usertype", res.data.status.usertype)
                    }
                
                }else if(res.data.status.usertype === 'admin'){
                     window.location ='/administrator/dashboard'
                      localStorage.setItem("usertype", res.data.status.usertype)
                }else{
                  this.incorrect =  res.data.status2
                }
            })
            .catch(err=>{
            //    this.$refs.form.reset()
            })
        }else{
          this.incorrect = null
             this.$refs.form.reset()
        }
      },
    },
  }
</script>
<style lang=""></style>
