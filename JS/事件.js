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
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="origin">
<title>【前端】</title>
</head>
<body>
<ul id="list">
    <li id="li-1">Li 2</li>
    <li id="li-2">Li 3</li>
    <li id="li-3">Li 4</li>
    <li id="li-4">Li 5</li>
    <li id="li-5">Li 6</li>
    <li id="li-6">Li 7</li>
</ul>


	<script>
		document.getElementById('list').addEventListener('click', function(e) {
			console.log(e.currentTarget); // ul
			console.log(e.target); // li
		})
	</script>

</body>
</html>


/**
 * 自定义事件
 */
var event = new Event('eventName');
element.addEventListener('eventName', function () {
  // ...
});
element.dispatchEvent(event);

