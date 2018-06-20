<?php
/**
 * 设计模式 - 备忘录模式
 *  1 - 在不破坏封闭的前提下。捕获一个对象的内部状态，并在该对象之外保存这个状态。这样以后就可将该对象恢复到原先保存的状态。
 *  2 - 发起人（GameRole）：负责创建一个备忘录，用以记录当前时刻自身的内部状态，并可使用备忘录恢复内部状态。发起人能够依据须要决定备忘录存储自己的哪些内部状态。
 *  3 - 备忘录（RoleStateSaveBox)：负责存储发起人对象的内部状态，并能够防止发起人以外的其它对象訪问备忘录。备忘录有两个接口：管理者仅仅能看到备忘录的窄接口，他仅仅能将备忘录传递给其它对象。发起人却可看到备忘录的宽接口。同意它訪问返回到先前状态所须要的全部数据。
 *  4 - 管理者(GameRoleStateManager):负责存取备忘录，不能对的内容进行訪问或者操作。
 *
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-06-20
 * Time: 20:17
 */

//游戏角色
class GameRole
{
    #region 游戏角色状态属性（生命力、攻击力、防御力）
    public $liveLevel, $attackLevel, $defenseLevel;

    //保存状态
    public function SaveState()
    {
        return (new RoleStateMemento($this->liveLevel, $this->attackLevel, $this->defenseLevel));
    }

    //恢复状态
    public function RecoveryState(RoleStateMemento $_memento)
    {
        $this->liveLevel = $_memento->liveLevel;
        $this->attackLevel = $_memento->attackLevel;
        $this->defenseLevel = $_memento->defenseLevel;
    }

    //------------其它属性及操作--------------
    //获得初始状态
    public function GetInitState()
    {
        $this->defenseLevel = 100;
        $this->attackLevel = 100;
        $this->liveLevel = 100;
    }

    //状态显示
    public function StateDisplay()
    {
        echo "角色状态：\n";
        echo "生命力：{$this->liveLevel}\n";
        echo "攻击力：{$this->attackLevel}\n";
        echo "防御力：{$this->defenseLevel}\n";
    }

    //被攻击
    public function BeenAttack()
    {
        $this->liveLevel -= 9.5;
        if ($this->liveLevel <= 0) {
            $this->liveLevel = 0;
            echo "呃，该角色阵亡了！\n";
            echo "Game Over!\n";
            return;
        }

        $this->attackLevel -= 1.1;
        if ($this->attackLevel <= 0) {
            $this->attackLevel = 0;
        }

        $this->defenseLevel -= 0.5;
        if ($this->defenseLevel <= 0) {
            $this->defenseLevel = 0;
        }
    }
}

//角色状态存储箱类
class RoleStateMemento
{
    public $liveLevel;
    public $attackLevel;
    public $defenseLevel;

    public function __construct($_ll, $_al, $_dl)
    {
        $this->liveLevel = $_ll;
        $this->attackLevel = $_al;
        $this->defenseLevel = $_dl;
    }
}

//游戏角色状态管理者类
class RoleStateManager
{
    public $memento;
}


//开战前
$ufo = new GameRole();
$ufo->GetInitState();
echo "\n----------------开战前-----------------\n";
$ufo->StateDisplay();

//保存进度
$roleMan = new RoleStateManager();
$roleMan->memento = $ufo->SaveState();

echo "\n----------------战斗中-----------------\n";
$num = 1;
//大战Boss5个回合
for ($i = 0; $i < 13; $i++) {
    echo "-------------第{$num}回合-------------\n";
    $ufo->BeenAttack();
    $ufo->StateDisplay();
    $num++;
    //角色阵亡
    if ($ufo->liveLevel <= 0) {
        break;
    }
}

echo "\n----------------恢复状态-----------------\n";
//恢复之前状态
$ufo->RecoveryState($roleMan->memento);
$ufo->StateDisplay();


