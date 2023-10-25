<x-app-layout>
  
  <form class="w-10/12 p-4 mx-auto bg-white rounded">
    {{ Breadcrumbs::render('create') }}
    <div class="grid grid-cols-2 rounded border border-gray-500 mt-4">
      <div class="col-span-1">
        <img class="object-cover w-full aspect-video" src="/images/recipe-dummy.png" alt="recipe-image">
      </div>
      <div class="col-span-1 p-4">
        <input type="text" name="title" placeholder="レシピ名" class="border border-gray-300 p-2 mb-4 w-full rounded">
        <textarea name="description" placeholder="レシピの説明" class="border border-gray-300 p-2 mb-4 w-full roundedl"></textarea>
      </div>
  </form>
</x-app-layout>