<template>
    <div class="composer">
        <textarea v-model="text" @keydown.enter="sendMessage" placeholder="Type message here...!!!"></textarea>
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

<style lang="scss" scoped>
    .composer{
        textarea{
            width: 96%;
            margin: 10px;
            resize: none;
            padding: 6px;
            border: 1px solid;
            border-color: lightgray;
            border-radius: 3px;
        }
    }
</style>
