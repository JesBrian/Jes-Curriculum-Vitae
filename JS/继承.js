/**
 * 1、构造函数实现继承（部分继承 - prototype 另外定义的属性方法并没有继承）
 * 缺点：父类使用 prototype 添加属性和方法，子类并不能使用
 */
// var Father = function() {
//   this.name = 'father';
// };
// var Chil = function() {
//   Father.call(this);
//   this.nameChil = 'chil';
//   return this;
// };
// Father.prototype.say = function () {
//   console.log(this.name);
// };
// var chil = Chil();
// var father = new Father();
// console.log(chil.name);
// console.log(chil.nameChil);
// father.say();
// chil.say(); // 报错



/**
 * 2、原型链实现继承
 * 缺点：子类共同引用同一份父类属性，其中一个子类实例修改父类引用属性(Array, Object, Function)，其他也会被修改
 */
// var Father = function() {
//   this.name = 'father';
//   this.arr = [1, 2, 3];
// };
// var Chil = function() {
//   this.nameChil = 'chil';
// };
// Chil.prototype = new Father();
// var chil1 = new Chil();
// var chil2 = new Chil();
// chil1.arr.push(4)
// console.log(chil1.name);
// console.log(chil1.arr);
// console.log(chil2.arr); // 也会被修改
// console.log(chil2.nameChil);



/**
 * 3、组合方式 - 构造函数 + 原型链实现  --->  内含优化
 * 缺点：重复定义 & 属性冗余, instanceof & constructor
 */
// var Father = function() {
//   this.name = 'father';
// };
// var Chil = function() {
//   Father.call(this);
//   this.nameChil = 'chil';
//   return this;
// };
// Chil.prototype = new Father();

// 优化 - 重复定义 & 属性冗余
// Chil.prototype = Father.prototype;

// 优化 - instanceof & constructor
// Chil.prototype = Object.create(Father.prototype);
// Chil.prototype.constructor = Chil;


/**
 * 4、寄生方式 - 子类里面实例化父类，添加和修改属性和方法，返回该实例
 */
// var Father = function () {
//   this.name = 'father';
// };
// var Chil = function () {
//   let father = new Father();
//   father.say = function () {
//     console.log(father.name);
//   }
//   return father;
// };
// var chil = new Chil();
// chil.say();

