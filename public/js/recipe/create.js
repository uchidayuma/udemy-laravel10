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
};