<section class="bg-white shadow">
  <div class="container mx-auto flex justify-between items-center">
    <div class="flex items-center">
      <img src="/images/logo.png" alt="logo" class="w-16 h-16">
      <h1 class="text-2xl font-bold text-gray-800">Cook Laravel</h1>
    </div>
    <form>
      <input type="text" name="keyword" class="border border-gray-300 rounded-lg px-3 py-2.5 ml-2 focus:outline-none focus:ring-4 focus:ring-green-300" placeholder="レシピを探す">
      <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded text-sm px-5 py-2.5 ml-2">検索</button>
    </form>
    <a href="{{ route('recipe.create') }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded text-sm px-5 py-2.5">レシピを投稿</a>
  </div>
</section>