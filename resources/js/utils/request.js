/**
 *  axios 请求封装
 */
import axios from 'axios'
import { message } from 'element-ui'
import store from '../store/store'


/**
 * 创建一个axios请求实例
 * @type {AxiosInstance}
 */
const service = axios.create({
    baseURL: process.env.BASE_API,
    timeout: 30000,
    headers: {

    }
})


/**
 * 创建请求拦截器
 */
service.interceptors.request.use(
    config => {
        // config.headers['X-Token'] = store.getters.token?? false ;
        return config;
    },

    error => {
        console.log(error) // for debug
        Promise.reject(error)
    }
)


/**
 * 创建响应拦截器
 */
service.interceptors.response.use(
    response => response,

    // response => {
    //   const res = response.data
    //   if (res.code !== 20000) {
    //     Message({
    //       message: res.message,
    //       type: 'error',
    //       duration: 5 * 1000
    //     })
    //     // 50008:非法的token; 50012:其他客户端登录了;  50014:Token 过期了;
    //     if (res.code === 50008 || res.code === 50012 || res.code === 50014) {
    //       // 请自行在引入 MessageBox
    //       // import { Message, MessageBox } from 'element-ui'
    //       MessageBox.confirm('你已被登出，可以取消继续留在该页面，或者重新登录', '确定登出', {
    //         confirmButtonText: '重新登录',
    //         cancelButtonText: '取消',
    //         type: 'warning'
    //       }).then(() => {
    //         store.dispatch('FedLogOut').then(() => {
    //           location.reload() // 为了重新实例化vue-router对象 避免bug
    //         })
    //       })
    //     }
    //     return Promise.reject('error')
    //   } else {
    //     return response.data
    //   }
    // },
    error => {
        console.log('err' + error) // for debug
        Message({
            message: error.message,
            type: 'error',
            duration: 5 * 1000
        })
        return Promise.reject(error)
    }
)


export default service




