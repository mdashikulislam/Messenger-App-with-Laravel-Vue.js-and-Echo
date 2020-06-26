<template>
    <div class="composer">
        <textarea v-model="text" @keydown.enter="sendMessage"></textarea>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                text: '',
            }
        },
        methods:{
            sendMessage(e){
                e.preventDefault();
                if (this.text === ''){
                    return;
                }
                this.$emit('send',this.text);
                this.text = '';
            }
        }
    }
</script>

<style scoped>

</style>
