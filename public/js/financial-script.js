/*
 * Financial Reports Script
 */

  // Example Chartist Stacked Bar Chart
  // ----------------------------------
  (function () {
    var stacked_bar = new Chartist.Bar('#chartBarStacked .ct-chart', {
      labels: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'K', 'L', 'M'],
      series: [[11, 19, 17, 13, 2, 11, 26, 20, 27, 5, 22, 4], [6, 18, 7, 9, 26, 24, 3, 18, 28, 21, 19, 12], [9, 10, 22, 14, 23, 19, 15, 25, 28, 21, 17, 17]]
    }, {
      stackBars: true,
      fullWidth: true,
      seriesBarDistance: 0,
      chartPadding: {
        top: -10,
        right: 0,
        bottom: 0,
        left: 0
      },
      axisX: {
        showLabel: true,
        showGrid: false,
        offset: 30
      },
      axisY: {
        showLabel: true,
        showGrid: true,
        offset: 30
      }
    });
  })();