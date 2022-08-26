<?php
require_once('DBConnection.php');

class Model extends DBConnection // 継承 親のクラスのメソッドやプロパティを使える
{

  public function __construct(){
    parent::__construct(); // parentで親のクラスのメソッドを指定している
  }

  public function createProducts($name, $price){
      $query = 'INSERT INTO ia_drinks (name, price) VALUES (:name, :price)';
      $stmt = $this->pdo->prepare($query);

      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->execute();
      $this->pdo = null;

  }

  public function searchProducts($strings = null){ //デフォルト値

    if($strings !== null){
      
      $strings = mb_convert_kana($strings, 's', 'utf-8');
      
      // 配列
      $keywords = explode(' ', $strings);

      // 空の変数
      $where = '';

      // この段階では0
      $i = 0;
      
      最初に空の 変数とか配列とか用意しておいて
      // 配列か連想配列 100個
      foreach($複数形 as $単数系)
      {
        1個ずつ繰り返す 100個全部繰り返す
        中に入ってる情報次第・・ if()で条件判定

        foreachの中で追加していく
        .= // ただの文字なら追加できる
        array_push() 配列をついかしていく

      }

      foreach($複数形 as $key => $value)
      {
        1個ずつ繰り返す 100個全部繰り返す
        中に入ってる情報次第・・ if()で条件判定

      }

      // 多次元配列、 [ [], [], ]
      foreach($複数形 as $key => $value)
      {
        foreach($key as $i)
        {

        }
      }


      // 全部繰り返す //100個なら100個 を 1個ずつ繰り返す
      foreach($keywords as $keyword){
        if ($i === 0){ // ★5
          // 最初だけ where という文字を入れる 
          $where .= 'where name LIKE \'%' . $keyword . '%\''; 
        } else {
          // 2回目以降は or でつなげている
          $where .= 'OR name LIKE \'%' . $keyword . '%\''; 
        } 
        $i++; // 1足す
      }

      $query = 'select id, name, price from ia_drinks ' . $where;

    } else {
      $query = 'select id, name, price from ia_drinks';
    }
    $stmt = $this->pdo->prepare($query);
    $response = $stmt->execute();

    if($response){
      $drinks = $stmt->fetchAll();
      
      return $drinks; // ★6
    }

    $this->pdo = null;

  }

}