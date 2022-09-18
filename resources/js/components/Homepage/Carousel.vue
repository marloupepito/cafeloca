<template>
  <div
    max-width="444"
   
  >
    <v-carousel
      :continuous="false"
      :cycle="cycle"
      :show-arrows="true"
      hide-delimiter-background
      delimiter-icon="mdi-minus"
      height="150"
    >
      <v-carousel-item
        v-for="(slide, i) in slides"
        :key="i"
      >
        <v-sheet
          :color="colors[i]"
          height="100%"
          tile
        >
          <v-row
            class="fill-height"
            align="center"
            justify="center"
          >
            <div class="text-h2">
              {{ slide }} Slide
            </div>
          </v-row>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
    <v-list two-line>
      <v-list-item>
        <v-list-item-avatar>
          <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title>John Leider</v-list-item-title>
          <v-list-item-subtitle>Author</v-list-item-subtitle>
        </v-list-item-content>
        <v-list-item-action>
          <v-switch
            v-model="cycle"
            label="Cycle Slides"
            inset
          ></v-switch>
        </v-list-item-action>
      </v-list-item>
    </v-list>
  </div>
</template>
<script>
export default {
    data(){
    	return{
    		 colors: [
          'green',
          'secondary',
          'yellow darken-4',
          'red lighten-2',
          'orange darken-1',
        ],
        cycle: false,
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
        ],
    	}
    }
}
</script>
<style lang="">
    
</style>