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

<style scoped>

</style>
