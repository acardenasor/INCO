<template>
    <div>
        {{message}} <br>
        {{newMessage}}
    </div>
</template>
<script>
    export default{
        data() {
            return {
                message: 'Hello Vue!',
                newMessage :'Hola mundo en español'
            }
  },
    }
</script>
