<template>
    <div class="chat-app">
        <Conversation :contact="selectedContact" :messages="messages" @New="incomingMessage"></Conversation>
        <ContactList :contacts="contacts" @selected="selectWith"></ContactList>
    </div>
</template>

<script>
    import ContactList from "./ContactList";
    import Conversation from "./Conversation";
    export default {
        props:{
          user:{
              type:Object,
              required:true
          }
        },
        data(){
          return{
              contacts:[],
              selectedContact:null,
              messages:[]
          }
        },
        mounted(){
            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage',(e)=>{
                    this.handleIncomingMessage(e.message);
                });
            axios.get('/contacts')
            .then((response)=>{
                this.contacts = response.data;
            });
        },
        methods:{
            selectWith(object){
                axios.get(`/conversation/${object.id}`).then((response)=>{
                   this.messages = response.data;
                   this.selectedContact = object;
                });
            },
            incomingMessage(message){
                this.messages.push(message);
            },
            handleIncomingMessage(message){

                if (this.selectedContact && message.from === this.selectedContact.id){
                    this.messages.push(message);
                    return;
                }
                alert(message.text);
            }
        },
        components:{Conversation,ContactList}
    }
</script>

<style lang="scss" scoped>
    .chat-app{
        display: flex;
    }
</style>
