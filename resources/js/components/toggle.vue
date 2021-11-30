<template>
    <div>
        <div class="form-group">
            <ul>
                <li v-for="todo in todos" :key="todo.id">
                <section>
                {{todo.text}} <span >
                         <label class="switch" >
                        <input type="checkbox" v-on:click="toggle(todo)" >
                        <span class="slider round"></span>
                        <br>  
                        </label>  
                    </span>
                    <div v-if="todo.show">
                    <hr />
                        <p>
                            <input type="url" class="form-control" placeholder="URL de usuario" value=""  style="height: 32px;" required/>
                        </p>
                    <hr />
                    </div>
                </section>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default{
        data() {
            return {
                todos: [    {
                                text: "Facebook"
                            },
                            {
                                text: "Twitter"
                            },
                            {
                                text: "Instagram"
                            },
                            {
                                text: "Youtube"
                            },
                            {
                                text: "Snapchat"
                            },
                            {
                                text: "Tik tok"
                            },

 {
                                text: "Kwai"
                            },
                            {
                                text: "Pinterest"
                            },
                            {
                                text: "Twitch"
                            },
                            {
                                text: "Reddit"
                            },
                            {
                                text: "Weibo"
                            },
                            {
                                text: "Bilibili"
                            }
                            ].map(o=>({...o,show:false}))
                        }
            },
        methods:{
            toggle: function(todo) {
                 todo.show = !todo.show
    }
        }
    }
</script>
