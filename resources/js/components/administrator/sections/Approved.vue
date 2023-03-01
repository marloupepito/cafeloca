<template>
    <div width="100%">
      <div class="w-100">
        <v-breadcrumbs :items="itemss">
            <template v-slot:divider>
              <v-icon>mdi-chevron-right</v-icon>
            </template>
          </v-breadcrumbs>
      </div>
  
       <v-sheet
        id="scrolling-techniques-7"
        class="overflow-y-auto"
        max-height="83vh"
         width="100%"
      >
      <v-card-title>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
       <!-- @click:row="handleRowClick" -->
      <v-data-table
    
      :items-per-page="7"
        :headers="headers"
        :items="rows"
        :search="search"
      >
          <template v-slot:item.store_name="{ item }">
         <a href="#" @click="handleRowClick(item.store_name,item.id)">
         {{item.store_name}}
         </a>
         </template>
         <template v-slot:item.status="{ item }">
       
            <v-chip
              :color="item.status === 'Pending'?'warning':item.status ==='Approved'?'success':'error'"
              dark
            >
              {{ item.status }}
            </v-chip>
          </template>

          <template v-slot:item.id="{ item }">
       
            <v-chip
              color="error"
              dark
            >
              <a @click="deleteData(item.id)">Delete</a>
            </v-chip>
          </template>
      </v-data-table>
      </v-sheet>
    </div>
  </template>
  
  
  <script>
  import axios from 'axios'
    export default {
      methods:{
        deleteData(id){
          if(window.confirm('Do you really want to delete?')){
              axios.post('/delete_branch',{
                id:id
                })
                .then(res=>{
                  this.mount()
                  })
                .catch(err=>{

                  })
            }
          },
          handleRowClick(e,id){
            this.$router.push({ path:'/administrator/accounts/'+e.replace(/ /g,'-')+'?'+id })
          },
          mount(){
              axios.post('/get_all_users',{
          status:'Approved'
          })
        .then(res=>{
          this.rows = res.data.status
          })
          }
        },
      mounted(e){
      this.mount()
        },
      data () {
        return {
          search: '',
           itemss: [
          {
            text: 'administrator',
            disabled: true,
          },
          {
            text: 'Accounts',
            disabled: false,
            href: '#',
          },
        ],
          headers: [
            {
              text: 'Stores',
              align: 'start',
              filterable: false,
              value: 'store_name',
            },
            { text: 'Email', value: 'email' },
            { text: 'Mobile', value: 'mobile' },
            { text: 'Phone', value: 'phone' },
            { text: 'Address', value: 'store_location' },
            { text: 'Status', value: 'status' },
            { text: 'delete', value: 'id' },
          ],
          rows: [],
        }
      },
    }
  </script>