<template>
  <v-card
    class="mx-auto"
    height="90vh"
  >
    <v-navigation-drawer
      class="bg-white"
      permanent
    width="w-100"
    >
          <v-card max-width="450px" class="mx-auto bg" elevation="2">
            <v-carousel
            :continuous="false"
            :cycle="cycle"
            :show-arrows="true"
            hide-delimiter-background
            delimiter-icon="mdi-minus"
            height="150"
            >
            <center v-if="loading2 === true">
              <v-progress-circular
                indeterminate
                color="red"
              ></v-progress-circular>
            </center>
                <v-carousel-item
                v-if="loading2 === false"
                    v-for="(covers, i) in cover"
                    :key="i"
                    :src="'/images/post/'+covers.cover"
                  >
                  
                  </v-carousel-item>
                </v-carousel>
            <v-row justify="center">
              <v-col align-self="start" class="d-flex justify-center align-center pa-0" cols="12">
                <v-avatar  v-if="loading === false" class="profile avatar-center-heigth avatar-shadow" color="brown" size="164">
                 
                  <input ref="uploader" class="d-none" type="file" accept="image/*" @change="onFileChanged">
                  <v-img :src="Profile === null?'https://cdn.vuetifyjs.com/images/profiles/marcus.jpg':'/images/post/'+Profile"></v-img>

                </v-avatar>

                 <v-progress-circular
                    indeterminate
                    color="red"
                    v-if="loading === true"
                  ></v-progress-circular>
              </v-col>
            </v-row>
                <v-list-item color="#0000" class="profile-text-name ma-4 pt-16">
                  <v-list-item-content>
                    <v-list-item-title class="text-h6">
                     {{branchName}}
                    </v-list-item-title>
                    <v-list-item-subtitle>{{userData.store_location}}</v-list-item-subtitle>
                  </v-list-item-content>
                  <v-list-item-action>
                  
 <input ref="uploader2" class="d-none" type="file" multiple accept="image/*" @change="onFileChangedCover">
<v-speed-dial
      v-model="fab"
      :top="false"
      :bottom="true"
      :right="false"
      :left="false"
      :open-on-hover="false"
      :transition="'slide-y-reverse-transition'"
    >
      <template v-slot:activator>
        <v-btn
          v-model="fab"
          color="brown"
          dark
          fab
        >
          <v-icon v-if="fab">
            mdi-close
          </v-icon>
          <v-icon v-else>
            mdi-account-cog
          </v-icon>
        </v-btn>
      </template>
      <v-btn
        fab
        dark
        small
        color="blue"
        v-on:click="saveBio" 
      >

        <v-icon>mdi-pencil</v-icon>
      </v-btn>
     
      <v-btn
        fab
        dark
        small
        color="red"
        @click="onButtonClick" 
      >
        <v-icon>mdi-camera</v-icon>
      </v-btn>

       <v-btn
        fab
        dark
        small
        color="green"
        @click="changeCoverPhoto" 
      >
        <v-icon>mdi-plus-box-multiple</v-icon>
      </v-btn>
    </v-speed-dial>

                  </v-list-item-action>
                </v-list-item>
        

           <v-row>
              <v-col cols="12" class="text-center">
                <v-list-item-content class="sutitles" style="padding-top:0px">
                   <v-rating
                    v-model="rating"
                    background-color="orange lighten-3"
                    color="orange"
                    large
                  ></v-rating>
                </v-list-item-content>
              </v-col>
            </v-row>


                <v-card-subtitle v-if="editBio">
                  <v-btn v-on:click="saveBio" 
                  fab
                  dark
                  small
                  color="success">
                    <v-icon small>{{ bioIcon }}</v-icon>
                  </v-btn>
                </v-card-subtitle>

                <p v-if="!editBio" class="pl-6 pr-6 pt-0">
                  {{ Bio }}
                </p>
          <v-spacer></v-spacer>
                <v-text-field class="pa-6" style="padding-top:0px !important;padding-bottom: 0px !important;" v-model="Email" prepend-icon="mdi-email" label="Email" :disabled="true"></v-text-field>

               

                <v-textarea v-model="Bio" rows="2" v-if="editBio" label="Bio" class="pa-6" style="padding-top:0px !important;padding-bottom: 0px !important;" :disabled="!editBio"></v-textarea>
                <v-spacer></v-spacer>

              <v-text-field class="pa-6" style="padding-top:0px !important;padding-bottom: 0px !important;" v-model="branchName" prepend-icon="mdi-storefront" label="Coffee Shop" :disabled="!editBio"></v-text-field>
                <v-spacer></v-spacer>

                <v-text-field class="pa-6" style="padding-top:0px !important;padding-bottom: 0px !important;" v-model="Mobile" prepend-icon="mdi-cellphone-wireless" label="Mobile" :disabled="!editBio"></v-text-field>
                <v-spacer></v-spacer>


                
                <v-text-field class="pa-6" style="padding-top:0px !important;padding-bottom: 0px !important;" v-model="Phone" prepend-icon="mdi-whatsapp" label="Phone" :disabled="!editBio"></v-text-field>
                <v-spacer></v-spacer>


      
         
          
          </v-card>


      <template v-slot:append>
        <div class="pa-2 bg-brown">
          <v-btn block color="brown" @click="logout">
           <b style="color:white">Logout</b>
          </v-btn>
        </div>
      </template>
    </v-navigation-drawer>


    
  </v-card>
</template>


<script>
  export default {
    mounted(){
        axios.get('/user')
        .then(res=>{
          this.userData =res.data
          this.Bio =this.userData.about
          this.branchName =this.userData.store_name      
          this.Mobile =this.userData.mobile  
          this.Phone =this.userData.phone
          this.Email =this.userData.email  
          this.Profile =this.userData.profile
          })

          axios.post('/get_coffee_cover')
          .then(res=>{
            this.cover = res.data.status
            })
      },
    data () {
      return {
         colors: [
          'green',
          'secondary',
          'yellow darken-4',
          'red lighten-2',
          'orange darken-1',
        ],
        cycle: false,
        loading:false,
        loading2:false,
        Profile:'',
        rating:3,
        userData:[],
        bottom:'',
        fab:'',
        branchName:'',
         Phone: '',
         Mobile: '',
         Email: '',
      editBio: false,
      Bio: '',
      bioIcon: "mdi-pencil",
      focus: "",
      type: "month",
      typeToLabel: {
        month: "Month",
        week: "Week",
        day: "Day",
        "4day": "4 Days"
      },
      selectedEvent: {},
      selectedFile:[],
      selectedElement: null,
      selectedOpen: false,
      events: [],
      cover:[],
      colors: [
        "blue",
        "indigo",
        "deep-purple",
        "cyan",
        "green",
        "orange",
        "grey darken-1"
      ],
      names: [
        "Meeting",
        "Holiday",
        "PTO",
        "Travel",
        "Event",
        "Birthday",
        "Conference",
        "Party"
      ],
      tab: null,
      items: ["Minha agenda", "Sobre Mim"],
      text:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        items: [
          { title: 'Account', icon: 'mdi-account-box', color:'primary'  },
          { title: 'Dashboard', icon: 'mdi-view-dashboard', color:'red' },
          { title: 'Admin', icon: 'mdi-gavel', color:'success'  },
        ],
         messages: [
        {
          icon: 'mdi-account-multiple',
          color: 'teal',
          icon: 'mdi-tag',
          title: 'Personal Information',
        },
        {
          color: 'red',
          icon: 'mdi-account-multiple',
          title: 'My Location',
        },
        {
          color: 'teal',
          icon: 'mdi-tag',
          title: 'Contacts',
        },
      ],
      lorem: 'Lorem ipsum dolor sit amet, at aliquam vivendum vel, everti delicatissimi cu eos. Dico iuvaret debitis mel an, et cum zril menandri. Eum in consul legimus accusam. Ea dico abhorreant duo, quo illum minimum incorrupte no, nostro voluptaria sea eu. Suas eligendi ius at, at nemore equidem est. Sed in error hendrerit, in consul constituam cum.',
    
      }
    },
    methods:{
    	logout(){
    		this.$router.push({path:'/my_account/logout'})
    	},

      saveBio() {
      this.editBio = !this.editBio;
      this.bioIcon = 'mdi-content-save'

      if (!this.editBio ) {
        
        axios.post('/edit_profile',{
           branchName:this.branchName,
           Phone: this.Phone,
           Mobile: this.Mobile,
           Bio: this.Bio,
          })
        .then(res=>{
          this.bioIcon = 'mdi-pencil'
          this.Bio =res.data.status.about
          this.branchName =res.data.status.store_name      
          this.Mobile =res.data.status.mobile  
          this.Phone =res.data.status.phone

        alert("Save Successfully");
          })
        .catch(err=>{
          this.bioIcon = 'mdi-content-save'
           alert("Saving Error!");
          })
      }
    },
    onButtonClick(e) {
      this.isSelecting = true;
      window.addEventListener(
        "focus",
        () => {
          this.isSelecting = false;
        },
        { once: true }
      );

      this.$refs.uploader.click();

    },

     changeCoverPhoto(e) {
      this.isSelecting = true;
      window.addEventListener(
        "focus",
        () => {
          this.isSelecting = false;
        },
        { once: true }
      );

      this.$refs.uploader2.click();

    },
    
    onFileChanged(e) {
        this.loading = true
      const fd =new FormData()
        fd.append("profile",e.target.files[0])
      axios.post('/upload_profile',fd)
      .then(res=>{
        this.Profile = res.data.status.profile
          this.loading = false
        })
      .catch(err=>{

        })
    },

     onFileChangedCover(e) {
      this.loading2=true
        const fd =new FormData()
        fd.append("count",parseInt(e.target.files.length))
        for(var i=0; i < (e.target.files.length); i++){
          fd.append("cover"+i,e.target.files[i])
        }
         axios.post('/add_cover_photo', fd)
          .then(res=>{
            this.loading2=false
            this.cover = res.data.status
          })
          .catch(err=>{

          })
    },

    viewDay({ date }) {
      this.focus = date;
      this.type = "day";
    },
    getEventColor(event) {
      return event.color;
    },
    setToday() {
      this.focus = "";
    },
    prev() {
      this.$refs.calendar.prev();
    },
    next() {
      this.$refs.calendar.next();
    },
    showEvent({ nativeEvent, event }) {
      const open = () => {
        this.selectedEvent = event;
        this.selectedElement = nativeEvent.target;
        requestAnimationFrame(() =>
          requestAnimationFrame(() => (this.selectedOpen = true))
        );
      };

      if (this.selectedOpen) {
        this.selectedOpen = false;
        requestAnimationFrame(() => requestAnimationFrame(() => open()));
      } else {
        open();
      }

      nativeEvent.stopPropagation();
    },
    updateRange({ start, end }) {
      const events = [];

      const min = new Date(`${start.date}T00:00:00`);
      const max = new Date(`${end.date}T23:59:59`);
      const days = (max.getTime() - min.getTime()) / 86400000;
      const eventCount = this.rnd(days, days + 20);

      for (let i = 0; i < eventCount; i++) {
        const allDay = this.rnd(0, 3) === 0;
        const firstTimestamp = this.rnd(min.getTime(), max.getTime());
        const first = new Date(firstTimestamp - (firstTimestamp % 900000));
        const secondTimestamp = this.rnd(2, allDay ? 288 : 8) * 900000;
        const second = new Date(first.getTime() + secondTimestamp);

        events.push({
          name: this.names[this.rnd(0, this.names.length - 1)],
          start: first,
          end: second,
          color: this.colors[this.rnd(0, this.colors.length - 1)],
          timed: !allDay
        });
      }

      this.events = events;
    },
    }
  }
</script>


<style>

.bg{
background: rgb(255,197,185);
background: linear-gradient(0deg, rgba(255,197,185,0.711922268907563) 0%, rgba(220,246,223,0.6671043417366946) 35%, rgba(255,255,255,0.7539390756302521) 74%), url(http://unblast.com/wp-content/uploads/2021/09/Real-Estate-Agent-Illustration.jpg);
}

.avatar-shadow{
box-shadow: 0px 0px 10px 0px rgba(50,12,112,0.75);
-webkit-box-shadow: 0px 0px 10px 0px rgba(50,12,112,0.75);
-moz-box-shadow: 0px 0px 10px 0px rgba(50,12,112,0.75);
}
  .avatar-center-heigth {
      position: absolute;
    }

    .profile-text-name {
      margin-top: 70px;
    }

    .sutitles {
      margin: 5px;
      padding: 16px;
    }
</style>