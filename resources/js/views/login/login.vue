<template>
    <div class="login_container">
        <div class="login_form">
            <div class="login_title">
                 <span>项目名称</span>
            </div>

            <el-form :model="loginForm" :rules="rules" ref="loginForm">
                <div class="login_input_item" prop="username">
                    <el-form-item prop="username">
                        <el-input v-model="loginForm.username" type="text" placeholder="请输入账号"></el-input>
                    </el-form-item>
                </div>

                <div class="login_input_item mt25">
                    <el-form-item prop="password">
                        <el-input v-model="loginForm.password" type="password" placeholder="请输入密码"></el-input>
                    </el-form-item>
                </div>

                <div class="login_input_item login_checked">
                    <el-checkbox v-model="loginForm.remember">记住登录</el-checkbox>
                </div>

                <div class="login_input_item mt15">
                    <el-button @click="login('loginForm')" type="primary" size="small" class="login_button">登  录</el-button>
                </div>
            </el-form>
        </div>
    </div>
</template>

<script>
    import { Message } from 'element-ui';
    export default {
        name: "login",
        data() {
            return {
                loginForm: {
                    username: '',
                    password: '',
                    remember: false,
                },
                rules: {
                    username: [
                        { required: true, message: '请输登录账号', trigger: 'blur' },
                        { min: 3, max: 50, message: '账号长度为 3 到 50 个字符', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: '请输登录密码', trigger: 'blur' },
                        { min: 6, max: 18, message: '密码长度为 6 到 18 个字符', trigger: 'blur' }
                    ]
                }
            }
        },
        methods: {
            login: function (loginForm) {
                this.$refs[loginForm].validate((valid) => {
                    if (!valid) return false;
                    this.$store.dispatch('LoginByUsername', this.loginForm).then((res) => {
                        console.log(res)
                        // cothis.loading = false
                        // this.$router.push({ path: this.redirect || '/' })

                    }).catch((err) => {
                        console.log(err)
                        // this.loading = false
                    })
                    // if (valid) {
                    //     alert('submit!');
                    // } else {
                    //     return false;
                    //     Message({
                    //         message: 123123,
                    //         type: 'error',
                    //         duration: 5 * 1000
                    //     })
                    // }

                })
            }
        }
    }
</script>

<style scoped>
    .login_checked{
        margin: 5px auto !important;
        padding-left: 5px;
    }

    .login_button{
        width: 100%;
        text-align: center;
    }

    .login_input_item{
        width: 90%;
        height: 45px;
        margin: 15px auto;
    }

    .login_title{
        height: 45px;
        margin: 15px auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        line-height: 45px;
    }

    .login_title{
        font-size: 22px;
        display: flex;
        align-items: center;
    }

    .login_container{
        background: #485b6e;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        flex: 1;
        position: fixed;
        width: 100%;
        height: 100%;
    }

    .login_form{
        display: flex;
        width: 450px;
        height: 340px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        background: white;
        margin: calc(100% / 8 ) auto;
        flex-direction: column;
    }
</style>