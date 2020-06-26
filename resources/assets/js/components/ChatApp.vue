<template>
    <div class="chat-app">
        <Conversation></Conversation>
        <ContactList></ContactList>
    </div>
</template>

<script>
    import ContactList from "./ContactList";
    import Conversation from "./Conversation";
    export default {
        components:{Conversation,ContactList}
    }
</script>

<style scoped>

</style>
