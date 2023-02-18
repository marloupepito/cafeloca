<template>
  <div>
    <CurvedBottomNavigation
    foreground-color='#F7F7F8'
     badge-color='#FBC02D'
     background-color='#802b00'
     icon-color='#0000008A'
      :options="options" 
      v-model="selected" />
   </div>
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
             path:"/my_account/timeline"
           },
           { 
             id: 2, 
             icon: "text-white fas fa-mug-hot", 
             title: "Menu",
             path:"/my_account/menu",
           },
           {
             id: 3,
             icon: "text-white fas fa-map-marker",
             title: "Location",
             path:"/my_account/my_location"
           },
           {
             id: 4,
             icon: "text-white fas fa-user-circle",
             title: "Login",
             path:"/my_account/profile"
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
   