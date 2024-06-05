<?php

function get_user_input($prompt) {
    echo $prompt;
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    return trim($line);
}

echo "数字推測ゲーム\n";

// ユーザーから最小数と最大数を取得
while (true) {
    $n = intval(get_user_input("最小数を入力してください: "));
    $m = intval(get_user_input("最大数を入力してください: "));

    // 最小数が最大数以下であることを確認
    if ($n <= $m) {
        break;
    } else {
        echo "最小数は最大数以下でなければなりません。再度入力してください。\n";
    }
}

// 乱数を生成
$target = rand($n, $m);
echo "{$n} から {$m} の範囲で乱数が生成されました。\n";

// ユーザーが正しい数字を当てるまで推測を続ける
$max_attempts = 10;
for ($attempt = 1; $attempt <= $max_attempts; $attempt++) {
    $guess = intval(get_user_input("{$attempt} 回目の推測: "));

    if ($guess < $target) {
        echo "もっと大きな数字です。\n";
    } elseif ($guess > $target) {
        echo "もっと小さな数字です。\n";
    } else {
        echo "正解です！ {$attempt} 回目の推測で当たりました。\n";
        exit;
    }
}

echo "残念。正解は {$target} でした。\n";

?>
