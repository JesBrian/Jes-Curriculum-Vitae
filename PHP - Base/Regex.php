<?php
/**
 * PHP 基础 - 正则表达式
 * Created by PhpStorm.
 * User: JesBrian
 * Date: 2018-04-20
 * Time: 17:18
 */

// 正则表达式测试工具
// RegexBuddy - [ http://www.regexbuddy.com/ ]
// Javascript正则表达式在线测试工具 - [ https://www.regexpal.com/ ]
// 在线验证正则表达式 - [ http://www.atool.org/regex.php ]

/**
 * 正则表达式基础知识 - 元字符
        .	匹配除换行符以外的任意字符
        \w	匹配字母或数字或下划线或汉字
        \s	匹配任意的空白符
        \d	匹配数字
        \b	匹配单词的开始或结束
        ^	匹配字符串的开始
        $	匹配字符串的结束
 */


/**
 * 正则表达式基础知识 - 字符转义
        \   加特殊符号，如 * 、 . 之类
 */


/**
 * 正则表达式基础知识 - 重复次数
        *	重复零次或更多次
        +	重复一次或更多次
        ?	重复零次或一次
        {n}	重复n次
        {n,}	重复n次或更多次
        {n,m}	重复n到m次
 */


/**
 * 正则表达式基础知识 - 选项
        ...|...	  指明两项之间的一个选择
 */


/**
 * 正则表达式基础知识 - 反义
        \W	匹配任意不是字母，数字，下划线，汉字的字符
        \S	匹配任意不是空白符的字符
        \D	匹配任意非数字的字符
        \B	匹配不是单词开头或结束的位置
        [^x]	匹配除了x以外的任意字符
        [^aeiou]	匹配除了aeiou这几个字母以外的任意字符
 */


/**
 * 正则表达式基础知识 - 贪婪与懒惰
        *?	重复任意次，但尽可能少重复
        +?	重复1次或更多次，但尽可能少重复
        ??	重复0次或1次，但尽可能少重复
        {n,m}?	重复n到m次，但尽可能少重复
        {n,}?	重复n次以上，但尽可能少重复
 */


/**
 * 正则表达式基础知识 - 处理选项
        IgnoreCase(忽略大小写)	匹配时不区分大小写。
        Multiline(多行模式)	更改^和$的含义，使它们分别在任意一行的行首和行尾匹配，而不仅仅在整个字符串的开头和结尾匹配。(在此模式下,$的精确含意是:匹配\n之前的位置以及字符串结束前的位置.)
        Singleline(单行模式)	更改.的含义，使它与每一个字符匹配（包括换行符\n）。
        IgnorePatternWhitespace(忽略空白)	忽略表达式中的非转义空白并启用由#标记的注释。
        ExplicitCapture(显式捕获)	仅捕获已被显式命名的组。
 */


$str = 'Hello World, HELLO WORLD';

/**
 * Notes: 正则表达式匹配查找操作
 * User: JesBrian
 * Date: 2018-05-06
 * Time: 19:55
 * @param $str
 */
function pregSearchOper($str)
{
    // preg_match($reg, $str, $matches) $str中匹配 $reg 正则表达式，之匹配一次就跳出，返回 0 OR 1，$matches 返回匹配的文本数组
    echo preg_match('/e/', $str,$matches) . PHP_EOL;
    var_dump($matches);

    // preg_match_all($reg, $str, $matches) $str中匹配 $reg 所有正则表达式次数
    echo preg_match_all('/[o|O]/', $str, $matches) . PHP_EOL;
    var_dump($matches);

    // preg_grep($reg, $array) 匹配数组中 $reg 的元素，并返回这些元素组成的新数组
    var_dump(preg_grep('/o/', ['Hello', 'HELLO', 'hello']));
}
//pregSearchOper($str);


/**
 * Notes: 正则表达式匹配修改操作
 * User: JesBrian
 * Date: 2018-05-06
 * Time: 19:55
 * @param $str
 */
function pregModifyOper($str)
{
    // preg_replace($reg, $replaceStr, $str) 将 $replaceStr 替换 $str 里匹配到的字符串
    $temp = preg_replace('/o/','O',$str);
    var_dump($temp);
    $temp = preg_replace('/o/','O',['Hello','World','HELLO','WORLD']);
    var_dump($temp);

    echo PHP_EOL;

    // preg_replace_callback($reg, $callBackFun, $str) 这个百度一下，使用什么回调函数

    // preg_filter($reg, $replaceStr, $str) 与 preg_replace() 类似，只是传数组的时候只返回替换了的元素
    $temp = preg_filter('/o/','O', $str);
    var_dump($temp);
    $temp = preg_filter('/o/','O', ['Hello','World','HELLO','WORLD']);
    var_dump($temp);

    // preg_split($reg, $str) 以 $reg 作为分隔符切分 $str 并返回数组
    var_dump(preg_split('/o/', $str));

    // preg_quote() 这个不知道是什么鬼，有时间百度
}
//pregModifyOper($str);


/**
 * 常用正则表达式
 *
 */
