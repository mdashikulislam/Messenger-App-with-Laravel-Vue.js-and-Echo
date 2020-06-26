<template>
    <div class="conversation">
        <h2>{{contact? contact.name : 'Select a Contact'}}</h2>
        <MessageFeed :messages="messages" :contact="contact"></MessageFeed>
        <MessageComposer @send="sendMessage" ></MessageComposer>
    </div>
</template>

<script>
    import MessageFeed from "./MessageFeed";
    import MessageComposer from "./MessageComposer";
    export default {
        props:{
              contact:{
                  type:Object,
                  default:null
              },
            messages: {
                  type:Array,
                default:[]
            }
        },
        methods:{
           sendMessage(text){
               console.log(text);
           }
        },
        components:{MessageComposer,MessageFeed}
    }
</script>

<style scoped>

</style>
