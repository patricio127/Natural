<template>
    <div>
        <sushi-form @guardar="guardar" :producto="producto" 
                    :modoEdicion="true"></sushi-form>
    </div>
</template>

<script>
import SushiForm from './SushiForm.vue';
  export default {
  components: { SushiForm },
    props:['producto'],
    methods:{
        guardar:function(){
            this.$emit('terminarEdicion');
        },
    },
  }
</script>