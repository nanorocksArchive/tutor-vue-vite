<template>
    <div>
        <b-button variant="danger">{text}</b-button>
    </div>
</template>

<script>
    export default {
        props: {
          color: String,
          text: String      
        }
    }
</script>

<style scoped>

</style>