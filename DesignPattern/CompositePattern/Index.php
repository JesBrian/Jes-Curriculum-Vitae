<?php
/**
 * 设计模式 - 组合模式
 *  1 - 依据树形结构来组合对象，用来表示部分以及整体层次
 *  2 - 使得用户对单个对象和组合对象的使用具有一致性
 *  3 - Component 是组合中的对象声明接口，在适当的情况下，实现所有类共有接口的默认行为。声明一个接口用于访问和管理Component子部件
 *  4 - Leaf 在组合中表示叶子结点对象，叶子结点没有子结点
 *  5 - Composite 定义有枝节点行为，用来存储子部件，在Component接口中实现与子部件有关操作，如增加(add)和删除(remove)等
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-19
 * Time: 17:13
 */

abstract class MenuComponent
{
    public $name;
    public abstract function getName();
    public abstract function add(MenuComponent $menu);
    public abstract function remove(MenuComponent $menu);
    public abstract function getChild($i);
    public abstract function show();
}

class MenuItem extends MenuComponent
{
    public function __construct($name) {
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function add(MenuComponent $menu){
        return false;
    }
    public function remove(MenuComponent $menu){
        return false;
    }
    public function getChild($i){
        return null;
    }
    public function show(){
        echo " |-".$this->getName()."\n";
    }
}

class Menu extends MenuComponent
{
    public $menuComponents = array();
    public function __construct($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function add(MenuComponent $menu) {
        $this->menuComponents[] = $menu;
    }
    public function remove(MenuComponent $menu) {
        $key = array_search($menu, $this->menuComponents);
        if($key !== false) unset($this->menuComponents[$key]);
    }
    public function getChild($i) {
        if(isset($this->menuComponents[$i])) return $this->menuComponents[$i];
        return null;
    }
    public function show() {
        echo ":" . $this->getName() . "\n";
        foreach($this->menuComponents as $v){
            $v->show();
        }
    }
}

class Index
{
    public static function run()
    {
        $menu1 = new Menu('文学1');
        $menu2 = new Menu('文学2');

        $menuitem1 = new MenuItem('绘画');
        $menuitem2 = new MenuItem('书法');
        $menuitem3 = new MenuItem('小说');
        $menuitem4 = new MenuItem('雕刻');

        $menu1->add($menuitem1);
        $menu1->add($menuitem2);
        $menu1->add($menuitem3);
        $menu1->add($menuitem4);

        $menu2->add($menuitem1);
        $menu2->add($menuitem4);

        $menu1->show();
        $menu2->show();
    }
}


Index::run();
