
/**
 * 前后端通信方式
 *  1、Ajax - 异步 js xml
 *  2、WebSocket - 长连接
 *  3、CORS - 跨域通信
 */


/**
 * 原生 js 实现 Ajax
 */
var Ajax = {
  get: function(url, fn) {
    // 实例化 XMLHttpRequest 对象用于在后台与服务器交换数据
    var xhr = new XMLHttpRequest();

    xhr.open('GET', url, true);

    xhr.onload = function() {
      // readyState == 4说明请求已完成
      if (xhr.status == 200 || xhr.status == 304) {
        // 从服务器获得数据
        fn.call(this, JSON.parse(xhr.responseText));
      } else {
        // 错误处理
      }
    };

    xhr.send();
  },
  // data 应为'a=a1&b=b1'这种字符串格式，在jq里如果data为对象会自动将对象转成这种字符串格式
  post: function (url, data, fn) {
    var xhr = new XMLHttpRequest();

    xhr.open("POST", url, true);

    // 添加http头，发送信息至服务器时内容编码类型
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
      if (xhr.status == 200 || xhr.status == 304) {
        fn.call(this, JSON.parse(xhr.responseText));
      } else {
        // 错误处理
      }
    };

    xhr.send(data);
  }
};


/**
 * 前端跨域处理方式
 *  1、JSONP
 *   原理：使用 js 的异步加载外部 js 脚本文件
 *
 *  2、Hash -- url 后面的 # 更改，页面不会跳转， frame/iframe
 *   原理：在 frame/iframe 页面里面使用 window.onhashchange 监听外部修改的 frame/iframe 的 src, 然后再发送请求获取后台数据
 *
 *  3、postMessage -- h5 新知识
 *   原理：
 *
 *  4、WebSocket -- 不受同源限制
 *   原理：
 *
 *  5、CORS -- 类似于支持跨域通信的 ajax --> 也就是简单的可以修改 ajax 的 Access-Control-Allow-Origin 属性来进行跨域
 *   原理：fetch('url', {method: 'get'}).then(response => {}).catch(err => {})
 *
 */


