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
      <v-data-table
      @click:row="handleRowClick"
      :items-per-page="7"
        :headers="headers"
        :items="rows"
        :search="search"
      >
         <template v-slot:item.status="{ item }">
            <v-chip
              :color="item.status === 'Pending'?'warning':item.status ==='Approved'?'success':'error'"
              dark
            >
              {{ item.status }}
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
          handleRowClick(e){
            this.$router.push({ path:'/administrator/accounts/'+e.store_name.replace(/ /g,'-')+'?'+e.id })
          }
        },
      mounted(e){
        axios.post('/get_all_users',{
          status:'Pending'
          })
        .then(res=>{
          this.rows = res.data.status
          })
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
          ],
          rows: [],
        }
      },
    }
  </script>