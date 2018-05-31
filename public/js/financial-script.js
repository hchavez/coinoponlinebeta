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
    
    var coin28 = $('#coin28').val();
    var coin29 = $('#coin29').val();
    var coin30 = $('#coin30').val();
    var coin31 = $('#coin31').val();    
    var coin35 = $('#coin35').val();
    var coin36 = $('#coin36').val();
    var coin37 = $('#coin37').val();
    var coin41 = $('#coin41').val();
    (function () {    
        var stacked_bar_chart = c3.generate({
          bindto: '#exampleC3StackedBar',
          data: {
            columns: [['Card', swipe38, swipe39, swipe40, swipe42, swipe43]],
            type: 'bar',
            groups: [['Card']]
          },
          color: {
            pattern: [Config.colors("light-green", 300)]
          },
          bar: {
            width: {
              max: 80
            }
          },
          grid: {
            y: {
              show: true,
              lines: [{
                value: 0
              }]
            }
          },
          axis: {
                x: {
                    type: 'category',
                    categories: ['Philippines Advam Test Unit', 'raspberrypi for Advam-16','raspberrypi for Advam-08','raspberrypi for Advam-18','raspberrypi for Advam-12']
                }
            }
        });

        setTimeout(function () {
          stacked_bar_chart.groups([['Card']]);
        }, 1000);

       /* setTimeout(function () {
          stacked_bar_chart.load({
            columns: [['data4', 100, 250, 150, 200, 300]]
          });
        }, 1500);*/

        setTimeout(function () {
          stacked_bar_chart.groups([['Card']]);
        }, 2000);
      })();
      
      
      (function () {    
        var stacked_bar_chart_coin = c3.generate({
            bindto: '#coinbillin',
            data: {
              columns: [['Coin', coin28, coin29, coin30, coin31, coin35, coin36, coin37, coin41]],
              type: 'bar',
              groups: [['Coin']]
            },
            color: {
                pattern: [Config.colors("primary", 300)]
            },
            bar: {
              width: {
                max: 80
              }
            },
            grid: {
              y: {
                show: true,
                lines: [{
                  value: 0
                }]
              }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Andy', 'Jack','Robert','Brian','George','James','Barry','Philippines Single Chip Board - under development']
                }
            }
          });

          setTimeout(function () {
            stacked_bar_chart_coin.groups([['Coin']]);
          }, 1000);

         /* setTimeout(function () {
            stacked_bar_chart_coin.load({
              columns: [['data4', 100, 250, 150, 200, 300]]
            });
          }, 1500);*/

          setTimeout(function () {
            stacked_bar_chart_coin.groups([['Coin']]);
          }, 2000);
        })();
      
      
        (function () {
            var stacked_bar_chart = c3.generate({
              bindto: '#bothShow',
              data: {
                columns: [['Coin', coin28, coin29, coin30, coin31, coin35, coin36, coin37, '', '', coin41, '', ''],
                           ['Card', '', '', '', '', '', '', '', swipe38, swipe40, '', swipe42, swipe43]],
                type: 'bar',
                groups: [['data1', 'data2']]
              },
              color: {
                pattern: [Config.colors("primary", 500), Config.colors("light-green", 300)]
              },
              bar: {
                width: {
                  max: 80
                }
              },
              grid: {
                y: {
                  show: true,
                  lines: [{
                    value: 0
                  }]
                }
              },
                axis: {
                    x: {
                        type: 'category',
                        categories: ['Andy', 'Jack','Robert','Brian','George','James','Barry','Philippines Advam Test Unit','raspberrypi for Advam-08','Philippines Single Chip Board - under development','raspberrypi for Advam-18','raspberrypi for Advam-12']
                    }
                }
            });

            setTimeout(function () {
              stacked_bar_chart.groups([['Coin','Card']]);
            }, 1000);

            setTimeout(function () {
              stacked_bar_chart.load({
                columns: [['data4']]
              });
            }, 1500);

            setTimeout(function () {
              stacked_bar_chart.groups([['Coin','Card']]);
            }, 2000);
        })();
      
  });
  
 