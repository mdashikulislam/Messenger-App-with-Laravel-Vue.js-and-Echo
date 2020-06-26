<template>
    <div class="chat-app">
        <Conversation :contact="selectedContact" :messages="Messages"></Conversation>
        <ContactList :contacts="contacts" @selected="selectWith"></ContactList>
    </div>
</template>

<script>
    import ContactList from "./ContactList";
    import Conversation from "./Conversation";
    export default {
        data(){
          return{
              contacts:[],
              selectedContact:null,
              Messages:[]
          }
        },
        mounted(){
            axios.get('/contacts')
            .then((response)=>{
                this.contacts = response.data;
            });

        },
        methods:{
            selectWith(object){
                axios.get(`/conversation/${object.id}`).then((response)=>{
                   this.Messages = response.data;
                   this.selectedContact = object;
                });
            }
        },
        components:{Conversation,ContactList}
    }
</script>

<style scoped>

</style>
