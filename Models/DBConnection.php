<?php

class DBConnection
{
  protected $pdo;

  // 本来はphpファイルに直接書くのはNG
  // dotenvなどインストールして隠しファイルで扱うべし

  private const DB_HOST = 'mysql:host=localhost; dbname=booksample; charset=utf8';
  private const DB_USER = 'testuser';
  private const DB_PASSWORD = 'testpass';

  public function __construct(){
    try{
      $this->pdo = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASSWORD);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //★1
      if ($this->pdo == null){
        }else{
          // echo '接続成功';
      }
    }catch (PDOException $e){
      echo "接続失敗…<br>";
      echo "エラー内容：".$e->getMessage();
      die();
    }
  }
}