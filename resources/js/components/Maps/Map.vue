<template>
    <div class="position-absolute w-100 h-100 top-0 start-0 bottom-0 end-0">
        <GmapMap
            class="w-100 h-100"
            :center="{ lat: 10.4833584, lng: 123.3998655 }"
            :zoom="14"
        >
            <GmapMarker
                :position="{ lat: parseFloat(MyLocation.lat), lng: parseFloat(MyLocation.lng) }"
               
            />

            <GmapInfoWindow
                :key="index"
                v-for="(m, index) in markers"
                :position="{ lat: parseFloat(m.lat), lng: parseFloat(m.lng) }"
            >
				  <v-dialog
				      v-model="dialog"
				      fullscreen
				      hide-overlay
				      transition="dialog-bottom-transition"
				    >
				      <template v-slot:activator="{ on, attrs }">
				        <a
				          v-bind="attrs"
				          v-on="on" @click="visit">
				        {{ m.store_name }}
				        </a>
				      </template>
				      <v-card>
				      	<router-view></router-view> 
				      </v-card>
				    </v-dialog>
            </GmapInfoWindow>
        </GmapMap>
    </div>
</template>

<script>
//  :clickable="true"
//  :draggable="true"

import Swal from 'sweetalert2'
import { gmapApi } from "vue2-google-maps";
export default {
    computed: {
        google: gmapApi,
    },

    data() {
        return {
        	 items: [
        {
          color: '#952175',
          src: 'https://cdn.vuetifyjs.com/images/cards/cooking.png',
          title: 'Supermodel',
          artist: 'Foster the People',
        },
        {
          color: '#952175',
          src: 'https://cdn.vuetifyjs.com/images/cards/cooking.png',
          title: 'Halcyon Days',
          artist: 'Ellie Goulding',
        },{
          color: '#952175',
          src: 'https://cdn.vuetifyjs.com/images/cards/cooking.png',
          title: 'Halcyon Days',
          artist: 'Ellie Goulding',
        },
      ],
            MyLocation: {
                lat: 0,
                lng: 0,
            },
            markers: [],
            dialog: false,
	        notifications: false,
	        sound: true,
	        widgets: false,
	        timerCount: 1
	        };

    },
    methods: {


    	visit(){
    			
                    if (this.timerCount > 0) {
                        setTimeout(() => {
                            this.timerCount--;
                            this.$router.push({path:'/visit'})
                        }, 1000);
                    }

                
    		},
        visitStore(name, id, ll) {
           
              if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition((position) => {
                      var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(position.coords.latitude, position.coords.longitude), new google.maps.LatLng(parseFloat(ll[0]), parseFloat(ll[1])));
                        Swal.fire({
                        //   imageUrl: 'https://unsplash.it/400/200',
                        footer: '<a>'+parseInt(distance)+'m</a>',
                          html:` <div>
        <div id="slider" class="section-container p-0 bg-dark">
			<!-- BEGIN carousel -->
			<div id="main-carousel" class="carousel slide" data-ride="carousel">
				<!-- BEGIN carousel-inner -->
				<div class="carousel-inner">
					<!-- BEGIN item -->
					<div class="carousel-item active" data-paroller="true" data-paroller-factor="0.3" data-paroller-factor-sm="0.01" data-paroller-factor-xs="0.01" style="background: url(../assets/img/slider/slider-1-cover.jpg) center 0 / cover no-repeat;">
						<div class="container">
							<img src="assets/img/slider/slider-1-product.png" class="product-img right bottom fadeInRight animated" alt="" />
						</div>
						<div class="carousel-caption carousel-caption-left">
							<div class="container">
								<h3 class="title mb-5px fadeInLeftBig animated">iMac</h3>
								<p class="mb-15px fadeInLeftBig animated">The vision is brighter than ever.</p>
								<div class="price mb-30px fadeInLeftBig animated"><small>from</small> <span>$2299.00</span></div>
								<a href="product_detail.html" class="btn btn-outline btn-lg fadeInLeftBig animated">Buy Now</a>
							</div>
						</div>
					</div>
					<!-- END item -->
					<!-- BEGIN item -->
					<div class="carousel-item" data-paroller="true" data-paroller-factor="-0.3" data-paroller-factor-sm="0.01" data-paroller-factor-xs="0.01" style="background: url(../assets/img/slider/slider-2-cover.jpg) center 0 / cover no-repeat;">
						<div class="container">
							<img src="assets/img/slider/slider-2-product.png" class="product-img left bottom fadeInLeft animated" alt="" />
						</div>
						<div class="carousel-caption carousel-caption-right">
							<div class="container">
								<h3 class="title mb-5px fadeInRightBig animated">iPhone X</h3>
								<p class="mb-15px fadeInRightBig animated">Say hello to the future.</p>
								<div class="price mb-30px fadeInRightBig animated"><small>from</small> <span>$1,149.00</span></div>
								<a href="product_detail.html" class="btn btn-outline btn-lg fadeInRightBig animated">Buy Now</a>
							</div>
						</div>
					</div>
					<!-- END item -->
					<!-- BEGIN item -->
					<div class="carousel-item" data-paroller="true" data-paroller-factor="-0.3" data-paroller-factor-sm="0.01" data-paroller-factor-xs="0.01" style="background: url(../assets/img/slider/slider-3-cover.jpg) center 0 / cover no-repeat;">
						<div class="carousel-caption">
							<div class="container">
								<h3 class="title mb-5px fadeInDownBig animated">Macbook Air</h3>
								<p class="mb-15px fadeInDownBig animated">Thin.Light.Powerful.<br />And ready for anything</p>
								<div class="price fadeInDownBig animated"><small>from</small> <span>$999.00</span></div>
								<a href="product_detail.html" class="btn btn-outline btn-lg fadeInUpBig animated">Buy Now</a>
							</div>
						</div>
					</div>
					<!-- END item -->
				</div>
				<!-- END carousel-inner -->
				<a class="carousel-control-prev" href="#main-carousel" data-bs-slide="prev"> 
					<i class="fa fa-angle-left"></i> 
				</a>
				<a class="carousel-control-next" href="#main-carousel" data-bs-slide="next"> 
					<i class="fa fa-angle-right"></i> 
				</a>
			</div>
			<!-- END carousel -->
		</div>
		<!-- END #slider -->
		
		
    </div>`,
                          imageWidth: 400,
                          imageHeight: 200,
                          imageAlt: 'Custom image',
                          title: name,
                          confirmButtonText:'CLOSE',
                          text: 'Meters:'+' '+parseInt(distance),
                        //   preConfirm: (e) => {
                        //        this.$router.push({ path: "/store/" + name.replace(/ /g, "-") });
                        //   }
                        }) 
                  });
              }
        },
    },
    mounted: function () {
      
        if (navigator.geolocation) {
            const meter = navigator.geolocation.getCurrentPosition((position) => {
                this.MyLocation.lat = position.coords.latitude;
                this.MyLocation.lng = position.coords.longitude;
           }); 
         }
             axios.post("/get_all_users")
            .then((res) => {
                this.markers = res.data.status;
            })
            .catch((err) => {});
        }
};
</script>

<style>
button.gm-ui-hover-effect {
    display: none !important;
}
div.swal2-container.swal2-center.swal2-backdrop-show{
    padding:0px !important;
}
</style>
