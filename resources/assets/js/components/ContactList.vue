<template>
    <div class="list">
        <ul>
            <li v-for="(contact,index) in contacts" :key="contact.id" @click="selectContact(index,contact)"
                :class="{'selected' : index === selected}">
                <div class="avater">
                    <img :src="contact.profile_image" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="name">{{contact.name}}</p>
                    <p class="email">{{contact.email}}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:{
            contacts:{
                type:Array,
                default:[]
            }
        },
        data(){
          return{
              selected:null
          }
        },
        methods:{
            selectContact(index,contact){
                this.selected = index;
                this.$emit('selected',contact);
            }
        }
    }
</script>

<style lang="scss" scoped>
    .list{
        flex: 2;
        max-height: 500px;
        overflow-y: scroll;
        border-left: 1px solid #cccccc;

        ul{
            padding-left: 0;
            list-style-type: none;

            li{
                display: flex;
                padding: 2px;
                border-bottom: 1px solid #ededed;
                height: 80px;
                position: relative;
                cursor: pointer;
                .avater {
                    flex: 1;
                    display: flex;
                    align-items: center;
                    img{
                        width: 40px;
                        margin: 0 auto;
                        border-radius: 50%;
                    }
                }
                .contact {
                    font-size: 12px;
                    flex: 3;
                    flex-direction: column;
                    justify-content: center;
                    display: flex;
                    p{
                        margin: 0;

                    }
                    p.name{
                        font-weight: bold;
                    }
                }
            }
            li.selected{
                background: #dfdfdf;
            }
        }
    }
</style>
