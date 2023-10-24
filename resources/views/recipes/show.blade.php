<x-app-layout>
  <div class="w-10/12 p-4 mx-auto bg-white rounded">
    {{ Breadcrumbs::render('show', $recipe) }}
    <!-- レシピ詳細 -->
    <div class="grid grid-cols-2 rounded border border-black">
      <div class="col-span-1">
        <img class="object-cover rounded-t-lg h-40 w-full mrounded-none rounded-l-lg" src="{{$recipe['image']}}" alt="{{$recipe['title']}}">
      </div>
      <div class="col-span-1">
        <p>{{$recipe['description']}}</p>
        <p>{{$recipe['user']['name']}}</p>
        <h4 class="text-2xl font-bold mb-2">材料</h4>
        <ul>
      @foreach($recipe['ingredients'] as $i)
          <li>{{$i['name']}}：{{$i['quantity']}}</li>
      @endforeach
        </ul>
      </div>
    </div>
    <br>
    <!-- steps -->
    <div class="">
      <h4 class="text-2xl font-bold mb-2">作り方</h4>
    @foreach($recipe['steps'] as $s)
        <div class="flex items-center mb-2">
          <div class="w-10 h-10 flex items-center justify-center bg-gray-200 rounded-full mr-4">
            {{ $s['step_number'] }}
          </div>
          <p>{{ $s['description'] }}</p>
        </div>
    @endforeach
    </div>
  </div>
</x-app-layout>