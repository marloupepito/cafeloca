<template>
	<div>
		Please Wait...
	</div>
</template>

<script>

  export default {
  mounted(){
  	axios.post('/logout')
					.then(res=>{
						window.location='/visit/auth'
					//	sessionStorage.clear()
					})
		  }
  	}
	
</script>