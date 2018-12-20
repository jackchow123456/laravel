<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <ul>
                            <li v-for="name in names" :key="name">{{ name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                names: []
            }
        },
        mounted() {
            let that = this
            console.log('Component mounted.')
            // 12. 创建 Echo 监听
            Echo.join('login')
            .here((users) => {
                console.log('当前房间人数'+users.length + '人')
            })
            .joining((user) => {
                console.log('用户'+user.name + '加入了房间')
            })
            .leaving((user) => {
                console.log('用户'+user.name + '离开了房间')
            })
            .listen('Login', (e) => {
                that.names.push(e.name+'登录了')
            });
        }
    }
</script>
