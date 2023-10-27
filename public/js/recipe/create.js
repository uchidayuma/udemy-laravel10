window.onload = function() {
  var steps = document.getElementById('steps');

  Sortable.create(steps, {
    animation: 150,
    handle: '.handle',
    onEnd: function(evt) {
      var items = steps.querySelectorAll('.step');
      items.forEach(function(item, index) {
        item.querySelector('.step-number').innerHTML = '手順' + (index + 1);
      });
    }
  });
  
  steps.addEventListener('click', function(evt) {
    if (evt.target.classList.contains('step-delete') || evt.target.closest('.step-delete') ) {
      evt.target.closest('.step').remove();
      var items = steps.querySelectorAll('.step');
      items.forEach(function(item, index) {
        item.querySelector('.step-number').innerHTML = '手順' + (index + 1);
      });
    }
  })

  var addStep = document.getElementById('step-add');
  addStep.addEventListener('click', function() {
    var stepCount = steps.querySelectorAll('.step').length;
    var step = document.createElement('div');
    step.classList.add('step');
    step.classList.add('flex');
    step.classList.add('justify-between');
    step.classList.add('items-center');
    step.classList.add('mb-4');
    step.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="handle w-10 h-10 text-gray-600">
        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
      </svg>
      <p class="step-number w-16">手順${stepCount + 1}</p>
      <input type="text" name="steps[]" placeholder="手順を入力" class="border border-gray-300 p-2 w-full rounded">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 step-delete ml-4 text-gray-600">
        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
      </svg>
    `;
    steps.appendChild(step);
  });
  // 材料の追加
  var ingredients = document.getElementById('ingredients');
  Sortable.create(ingredients, {
    animation: 150,
    handle: '.handle',
    onEnd: function(evt) {
      var items = ingredients.querySelectorAll('.ingredient');
      items.forEach(function(item, index) {
          item.querySelector('.ingredient-name').name = `ingredients[${index}][name]`;
          item.querySelector('.ingredient-quantity').name = `ingredients[${index}][quantity]`;
      });
    }
  });
  // 削除
  ingredients.addEventListener('click', function(evt) {
    if (evt.target.classList.contains('ingredient-delete') || evt.target.closest('.ingredient-delete') ) {
      evt.target.closest('.ingredient').remove();
      var items = ingredients.querySelectorAll('.ingredient');
      items.forEach(function(item, index) {
          item.querySelector('.ingredient-name').name = `ingredients[${index}][name]`;
          item.querySelector('.ingredient-quantity').name = `ingredients[${index}][quantity]`;
      });
    }
  })

};// window.onload = function() {
