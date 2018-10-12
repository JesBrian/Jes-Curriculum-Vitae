/**
 * DOM 事件级别
 */
// DOM 0
element.onclick= function () {}
// DOM 2
element.addEventListener('click', function () {})
// DOM 3
element.addEventListener('click', function () {}, boolean)


/**
 * DOM 事件模型
 *  1 - 事件捕获
 *  2 - 事件冒泡
 */


/**
 * DOM 事件流
 *  1、事件捕获 - 从模糊到具体 vue.capture (先触发当前元素)
 *  2、事件冒泡 - 从具体到模糊 vue.stop (只触发当前元素)
 *
 *  顺序：
 *    window -> document -> html -> body -> ...
 */


/**
 * Event 事件对象常见 API
 */
event.preventDefault(); // 阻止默认事件 - 表单提交/a标签跳转
event.stopPropagation(); // 阻止事件冒泡
event.currentTarget // 事件代理 - 获取具体点击的元素
event.target // 获取当前事件标签 - 输入框/单复选值 event.target.value


/**
 * 自定义事件
 */
var event = new Event('eventName');
element.addEventListener('eventName', function () {
  // ...
});
element.dispatchEvent(event);

