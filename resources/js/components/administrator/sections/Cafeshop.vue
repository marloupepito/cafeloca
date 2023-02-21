<template>
	<div>
		<div class="w-100">
		      <v-breadcrumbs :items="itemss">
		          <template v-slot:divider>
		            <v-icon>mdi-chevron-right</v-icon>
		          </template>
		        </v-breadcrumbs>
		   </div>

		     <div class="row">
			        <div class="col-md-6 col-12">
						  <v-card max-width="450px" class="mx-auto bg" elevation="2">
            <v-img class="" height="150px" src="http://unblast.com/wp-content/uploads/2021/09/Real-Estate-Agent-Illustration.jpg" gradient="150deg, rgb(185 224 255 / 58%) 0%, rgb(243 220 246 / 52%) 35%, rgb(223 255 242 / 74%) 74%">
            </v-img>
            <v-row justify="center">
              <v-col align-self="start" class="d-flex justify-center align-center pa-0" cols="12">
                <v-avatar class="profile avatar-center-heigth avatar-shadow" color="brown" size="164">
                 
                  <input ref="uploader" class="d-none" type="file" accept="image/*" :change="onFileChanged">
                  <v-img src="https://cdn.vuetifyjs.com/images/profiles/marcus.jpg"></v-img>

                </v-avatar>
              </v-col>
            </v-row>
                <v-list-item color="#0000" class="profile-text-name ma-4 pt-16">
                  <v-list-item-content>
                    <v-list-item-title class="text-h6">
                     {{userData.store_name}} -  {{userData.status}}

                    </v-list-item-title>
                    <v-list-item-subtitle>{{userData.store_location}}</v-list-item-subtitle>
                  </v-list-item-content>
                  <v-list-item-action>
                  

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
          :loading="loading"
        >
          <v-icon v-if="fab">
            mdi-close
          </v-icon>
          <v-icon v-else>
            mdi-account-cog
          </v-icon>
        </v-btn>
      </template>
     <!-- <v-btn
        fab
        dark
        small
        color="primary"
        v-on:click="saveBio" 
      >

        <v-icon>mdi-pencil</v-icon>
      </v-btn>-->
     <!--  <v-btn
        fab
        dark
        small
        color="indigo"
      >
        <v-icon>mdi-plus</v-icon>
      </v-btn> -->
      <!-- <v-btn
        fab
        dark
        small
        color="yellow"
        @click="onButtonClick" 
      >
        <v-icon>mdi-camera</v-icon>
      </v-btn> -->

     
      <v-btn
        fab
        dark
        small
        color="success"
        @click="onApproved" 
        v-if="userData.status === 'Unapproved' || userData.status === 'Pending' || userData.status === 'Block'"
      >
        <v-icon>mdi-account-check</v-icon>
      </v-btn>
 <v-btn
        fab
        dark
        small
        color="warning"
        @click="unApproved" 
        v-if="userData.status === 'Pending' || userData.status === 'Block'"
      >
        <v-icon>mdi-account-cancel</v-icon>
      </v-btn>


       <v-btn
        fab
        dark
        small
        color="red"
        @click="onBlock" 
        v-if="userData.status === 'Approved'"
      >
        <v-icon>mdi-account-cancel</v-icon>
      </v-btn>
    </v-speed-dial>

                  </v-list-item-action>
                </v-list-item>
        

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




					
			        </div>
			        <div class="col-md-6 col-12">
          <v-card max-width="450px" class="mx-auto bg" elevation="2">
              <v-simple-table>
                <template v-slot:default>
                  <thead>
                    <tr>
                      <th class="text-left">
                        Filename
                      </th>
                      <th class="text-left">
                       
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="item in documents"
                      :key="item.name"
                    >
                      <td>{{ item.documents }}</td>
                      <td><v-btn color="brown" @click="showDocuments(item.documents)" small style="color:white">SHOW</v-btn></td>
                    </tr>
                  </tbody>
                </template>
              </v-simple-table>
          </v-card>
			       
			        </div>


              <div class="col-md-12">
                <GmapMap
                   style="height:80vh"
                    :center="{ lat: parseFloat(userData.lat), lng: parseFloat(userData.lng) }"
                    :zoom="16"
                >
                    <GmapMarker
                        :position="{ lat: parseFloat(userData.lat), lng: parseFloat(userData.lng) }"
                       
                    />

                  <!--   <GmapInfoWindow
                        :key="index"
                        v-for="(m, index) in markers"
                        :position="{ lat: parseFloat(m.lat), lng: parseFloat(m.lng) }"
                    >
                      <a @click="visit(m.store_name,m.id)">
                                {{ m.store_name }}
                                </a>
                    </GmapInfoWindow> -->
                </GmapMap>
              </div>



		        </div>
	</div>
</template>

<script>

import { gmapApi } from "vue2-google-maps";
import axios from 'axios'
export default {
	   computed: {
        google: gmapApi,
    },
	mounted(){
			const id =window.location.search.substring(1)
		axios.post('/get_user_id',{
			id:id
			})
		.then(res=>{
			this.id=id
     
      this.documents = res.data.documents
			this.userData =res.data.status
          this.Bio =this.userData.about
          this.branchName =this.userData.store_name      
          this.Mobile =this.userData.mobile  
          this.Phone =this.userData.phone
          this.Email =this.userData.email
          this.itemss=[
							{
		          text: 'administrator',
		          disabled: true,
		        },
		        {
		          text: 'Accounts',
		          disabled: true,
		          href: '#',
		        },
		         {
		          text: this.branchName,
		          disabled: false,
		          href: '#',
		        },
          ]  
			})
		},
data () {
      return {
        loading:false,
         documents: [],
      		id:'',
      	  itemss: [],
      	   rating:3,
        userData:[],
        bottom:'',
        fab:'',
        branchName:'',
         Phone: '00 00000-0000',
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
      }
  },
  methods:{
    showDocuments(filname){
      window.open('/images/file/'+filname, '_blank')
      },
      onBlock(){
        const id =this.id
            axios.post('/approve_user',{
              id:id,
              status:'Block'
              })

              axios.post('/get_user_id',{
                id:id
                })
              .then(res=>{
                this.userData =res.data.status
              })
        },

        unApproved(){
          this.loading = true
            const id =this.id
              axios.post('/approve_user',{
                id:id,
                status:'Unapproved'
                })

                axios.post('/notapproved',{
                  email:this.userData.email
                  })
                .then(res=>{
                  this.$swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Unapproved',
                    showConfirmButton: false,
                    timer: 1500
                  })
                   this.loading = false
                  })
                axios.post('/get_user_id',{
                    id:id
                    })
                  .then(res=>{
                    this.userData =res.data.status
                  })
          },
  	onApproved(){
  				const id =this.id
  				axios.post('/approve_user',{
  					id:id,
  					status:'Approved'
  					})
            .then(res=>{

               axios.post('/approved',{
                  email:this.userData.email
                  })
                .then(res=>{
                   this.loading = false
                  })
               this.$swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Approved',
                    showConfirmButton: false,
                    timer: 1500
                  })
              })
            axios.post('/get_user_id',{
                id:id
                })
              .then(res=>{
                this.userData =res.data.status
              })
  		},
  	  saveBio() {
      this.editBio = !this.editBio;
      this.bioIcon = 'mdi-content-save'
      if (!this.editBio) {
        this.bioIcon = 'mdi-pencil'
        
        alert("Save Successfully");
      }
    },
    onButtonClick() {
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
    onFileChanged(e) {
      this.selectedFile = e.target.files[0];

      // do something
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