<?php 
require_once('Models/Model.php');

if (isset($_POST['mode']) && $_POST['mode'] === 'store'){ //★2
  $model = new Model();
  $model->createProducts($_POST['name'], $_POST['price']); 
}

if (isset($_GET['mode']) && $_GET['mode'] === 'search'){
  $model = new Model();
  $drinks = $model->searchProducts($_GET['keywords']); //★3
} else {
  $model = new Model();
  $drinks = $model->searchProducts(); 
}

require_once('common_header.php'); // ★4
?>

<body>
  <main class="mx-8">
    <h1 class="text-2xl text-center mb-8">商品登録・検索ページ</h1>
    <section class="max-w-2xl mx-auto pb-8 border border-blue-200">
      <h2 class="text-xl text-center my-4">商品登録</h2>
        <form method="post" action="index.php">
          <div class="flex justify-around items-center">
            <div>
              <label for="name" class="mr-2">商品名</label>
              <input type="text" name="name" id="name" class="border border-2" required>
            </div>
            <div>
              <label for="price" class="mr-2">価格</label>
              <input type="number" name="price" id="price" class="border border-2" required>
            </div>
            <div>
              <button class="bg-blue-400 px-4 py-2 rounded-md text-white">保存する</button>
              <input type="hidden" name="mode" value="store">
            </div>
          </div>
        </form>
    </section>
    <section class="max-w-2xl mx-auto mt-4 pb-8 border border-green-200">
      <h2 class="text-2xl text-center my-4">商品検索</h2>
        <form method="get" action="index.php">
          <div class="flex justify-around items-center">
            <div>
              <label for="search" class="mr-2">商品名</label>
              <input type="text" name="keywords" id="search" class="border border-2" >
              <input type="hidden" name="mode" value="search">
            </div>
            <button class="bg-green-400 px-4 py-2 rounded-md text-white">検索する</button>
          </div>
        </form>
    </section>
    <section class="max-w-2xl mx-auto mt-4 pb-8 border border-red-200">
      <h3 class="text-xl text-center my-4">商品一覧</h3>
      <table class="table-auto">
        <thead>
          <tr>
            <th class="px-20">ID</th>
            <th class="px-20">商品名</th>
            <th class="px-20">金額</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach($drinks as $drink){
              echo '<tr>';
              echo '<td class="px-20">' . $drink["id"] . '</td>';
              echo '<td class="px-20">' . $drink["name"] . '</td>';
              echo '<td class="px-20">' . $drink["price"] . '</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>