<template>
    <div class="conversation">
        <h2></h2>
        <MessageFeed></MessageFeed>
        <MessageComposer></MessageComposer>
    </div>
</template>

<script>
    import MessageFeed from "./MessageFeed";
    import MessageComposer from "./MessageComposer";
    export default {
        components:{MessageComposer,MessageFeed}
    }
</script>

<style scoped>

</style>
