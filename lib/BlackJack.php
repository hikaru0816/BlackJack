<?php

namespace BlackJackGameStep1;

require_once('CreateDeck.php');
require_once('DrawCard.php');
require_once('AfterFirstDrawing.php');
require_once('PlayerTurn.php');
require_once('ComTurn.php');
require_once('DealerTurn.php');
require_once('Judge.php');
require_once('Welcome.php');
require_once('NumberOfPlayer.php');
require_once('PlayerNames.php');

const FIRST_DRAW = 2;

// カードを生成
$CreateDeck = new CreateDeck();
$deck = $CreateDeck->createDeck();
// カードを引くインスタンス
$drawCard = new DrawCard($deck);
// ウェルカムメッセージ
$welcome = new Welcome();
$welcome->display();
// プレイヤー数の入力
$input = new NumberOfPlayer();
$numberOfPlayer = $input->inputNumberOfPlayer();
// 人数に応じたプレイヤー名の取得
$players = new PlayerNames($numberOfPlayer);
$playerNames = $players->getPlayerNames();
// 各プレイヤーが最初の2枚を引く
$playerCards = [];
foreach ($playerNames as $playerName) {
    for ($i = 0; $i <= (FIRST_DRAW - 1); $i++) {
        $playerCards[$playerName][] = $drawCard->drawCard();
    }
}
// ディーラーが最初の2枚を引く
$dealerCards = [];
for ($i = 0; $i <= (FIRST_DRAW - 1); $i++) {
    $dealerCards[] = $drawCard->drawCard();
}
// 初めの2枚を引いた結果を表示
$afterFirstDrawing = new AfterFirstDrawing($playerCards, $dealerCards, FIRST_DRAW, $playerNames);
$afterFirstDrawing->display();
// プレイヤーのターンがスタート
$playerTurn = new PlayerTurn($playerCards[$playerNames[0]], $drawCard, $playerNames[0]);
$playerPoints = [];
$playerPoints[$playerNames[0]] = $playerTurn->turn();
// COMの数
$numberOfCom = $numberOfPlayer - 1;
// COMのターン
if ($numberOfCom >= 1) {
    $comNames = [];
    for ($i = 1; $i <= $numberOfCom; $i++) {
        $comNames[] = $playerNames[$i];
    }
    foreach ($comNames as $comName) {
        $$comName = new ComTurn($playerCards[$comName], $drawCard, $comName);
        $playerPoints[$comName] = $$comName->turn();
    }
}
$dealerTurn = new DealerTurn($dealerCards, $drawCard);
$dealerPoint = $dealerTurn->turn();
$judge = new Judge($playerPoints, $dealerPoint);
$judge->judge();
