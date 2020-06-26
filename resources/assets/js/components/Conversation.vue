<template>
    <div class="conversation">
        <h1>{{contact? contact.name : 'Select a Contact'}}</h1>
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
               if (!this.contact){
                   return;
               }
               axios.post('/conversation/send',{
                   contact_id:this.contact.id,
                   text: text
               }).then((response)=>{
                   this.$emit('New',response.data);
               });
           }
        },
        components:{MessageComposer,MessageFeed}
    }
</script>

<style lang="scss" scoped>
    .conversation{
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        h1{
            font-size: 20px;
            padding: 5px 10px;
            margin: 0;
            font-weight: normal;
            border-bottom: 1px dashed;
            border-color: lightgray;
        }
    }
</style>
