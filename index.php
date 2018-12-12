<?php
/**
 * Created by PhpStorm.
 * User: poli
 * Date: 2018/12/12
 * Time: 17:55
 */
require_once ("dice.php");

$list = array();
$f = fopen("./sugoroku.csv", "r");
while (($data = fgetcsv($f,100,",")) !== FALSE) {
    $list[] = $data[0];
}
fclose($f);

$current_pos = 1;
$goal_pos = $list[0];

while ($current_pos < $goal_pos) {
    echo $list[$current_pos]. "\n";
    echo "現在は{$current_pos}マス目にいます \n";
    echo "エンターキーを入力 \n";
    fgets(STDIN);
    $move = dice(6);
    echo "{$move}進みます\n";
    $current_pos += $move;
    if(preg_match("/戻る/", $list[$current_pos])) {
        $back = preg_replace("/[^0-9]/", "", $list[$current_pos]);
        echo $list[$current_pos]. "\n";
        $current_pos -= $back;
    }
}

echo "ゴール!\n";
