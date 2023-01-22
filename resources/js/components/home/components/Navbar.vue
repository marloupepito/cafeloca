<template>
    <CurvedBottomNavigation
    foreground-color='#F7F7F8'
     badge-color='#FBC02D'
     background-color='#802b00'
     icon-color='#0000008A'
      :options="options" 
      v-model="selected" />
   </template>
   
   <script>
   
     export default {
       data: () => ({
         selected: 1,
         options: [
           {
             id: 1,
             icon: "text-white fas fa-home",
             title: "Timeline",
             path:"/visit/timeline"
           },
           { 
             id: 2, 
             icon: "text-white fas fa-search", 
             title: "Search",
             path:"/visit/search",
           },
           {
             id: 3,
             icon: "text-white fas fa-map-marker",
             title: "Location",
             path:"/visit/search_map"
           },
           {
             id: 4,
             icon: "text-white fas fa-user-circle",
             title: "Login",
             path:"/visit/auth"
           },
          
          
         ],
         path:''
       }),
       mounted(){
         const path = this.$route.path.split('/')[2]
         const path2 = this.$route.path.split('/')[3]
         
         if(path === undefined){
           this.selected =1
         }else if(path === "events"){
           this.selected =2
         }else if(path === "teachers"){
           this.selected =3
         }else if(path === "grade" && path2 === '11'){
           this.selected =4
         }else if(path === "grade" && path2 === '12'){
           this.selected =5
         }
       }
     };
   </script>
   