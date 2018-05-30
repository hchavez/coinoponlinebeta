/*
 * Financial Reports Script
 */
  // Example C3 Stacked Bar
  // ----------------------
  $(document).ready(function(){
    var swipe38 = $('#swipe38').val();
    var swipe39 = $('#swipe39').val();
    var swipe40 = $('#swipe40').val();
    var swipe42 = $('#swipe42').val();
    var swipe43 = $('#swipe43').val();
    (function () {    
    var stacked_bar_chart = c3.generate({
      bindto: '#exampleC3StackedBar',
      data: {
        columns: [['cardreader', swipe38, swipe39, swipe40, swipe42, swipe43]],
        type: 'bar',
        groups: [['cardreader']]
      },
     
      bar: {
        width: {
          max: 45
        }
      },
      grid: {
        y: {
          show: true,
          lines: [{
            value: 0
          }]
        }
      }
    });

    setTimeout(function () {
      stacked_bar_chart.groups([['cardreader']]);
    }, 1000);

   /* setTimeout(function () {
      stacked_bar_chart.load({
        columns: [['data4', 100, 250, 150, 200, 300]]
      });
    }, 1500);*/

    setTimeout(function () {
      stacked_bar_chart.groups([['cardreader']]);
    }, 2000);
  })();
  });
  
 