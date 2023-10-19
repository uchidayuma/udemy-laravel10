<x-app-layout>
  <div class="grid grid-cols-3 gap-4">
    <div class="col-span-2 bg-white rounded p-4">
  @foreach($recipes as $recipe)
      <a href="" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
        <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{$recipe->image}}" alt="{{$recipe->title}}">
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{$recipe->title}}</h5>
          <p class="mb-3 font-normal">{{ $recipe->description }}</p>
          <div class="flex">
            <p class="font-bold mr-2">{{$recipe->name}}</p>
            <p class="text-gray-500">{{$recipe->created_at->format('Y年m月d日')}}</p>
          </div>
        </div>
      </a>
  @endforeach
    </div>
    <div class="col-span-1 bg-white">FORM</div>
    
  </div>
</x-app-layout>