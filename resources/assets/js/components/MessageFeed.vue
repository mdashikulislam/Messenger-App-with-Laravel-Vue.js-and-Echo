<template>
    <div class="feed" ref="feed">
        <ul v-if="contact">
            <li v-for="message in messages" :key="message.id" :class="`message${message.to === contact.id ? ' sent': ' received'}`">
                <div class="text">
                    {{message.text}}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:{
            contact:{
                type:Object
            },
            messages:{
                type: Array,
                required:true
            }
        },
        methods:{
            scrollToTop(){
                setTimeout(()=>{
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                },50);
            }
        },
        watch:{
            messages(message){
                this.scrollToTop();
            },
            contact(contact){
                this.scrollToTop();
            }
        }
    }
</script>

<style lang="scss" scoped>
    .feed{
        background: #eaeaea;
        max-height: 378px;
        height: 100%;
        overflow-y: scroll;
        overflow-x: hidden;
        ul{
            list-style-type: none;
            padding: 5px!important;
        }
        ul li.message{
            width: 100%;
            margin: 10px 0;
        }
        .message .text {
            max-width: 300px;
            display: inline-block;
            padding: 12px 6px;
            border-radius: 5px;
        }
        ul li.message.received {
            text-align: right;
        }
        ul li.message.received .text{
            background: #a8a8a8;
        }
        ul li.message.sent .text{
            text-align: left;
            background: #9fdcf1;
        }
    }
</style>
