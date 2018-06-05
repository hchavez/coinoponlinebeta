/*
 * Financial Reports Script
 */
  // Example C3 Stacked Bar
  // ----------------------
  $(document).ready(function(){   
    
    var coin28 = Math.round($('#coin28').val());
    var coin28B = $('#coin28B').val();
    var coin28S = $('#coin28S').val();
    
    var coin29 = Math.round($('#coin29').val());
    var coin29B = Math.round($('#coin29B').val());
    var coin29S = Math.round($('#coin29S').val());
    
    var coin30 = Math.round($('#coin30').val());
    var coin30B = Math.round($('#coin30B').val());
    var coin30S = Math.round($('#coin30S').val());
    
    var coin31 =  Math.round($('#coin31').val()); 
    var coin31B = Math.round($('#coin31B').val());
    var coin31S = Math.round($('#coin31S').val());
    
    var coin35 = Math.round($('#coin35').val());
    var coin35B = Math.round($('#coin35B').val());
    var coin35S = Math.round($('#coin35S').val());
    
    var coin36 = Math.round($('#coin36').val());
    var coin36B = Math.round($('#coin36B').val());
    var coin36S = Math.round($('#coin36S').val());
    
    var coin37 = Math.round($('#coin37').val());
    var coin37B = Math.round($('#coin37B').val());
    var coin37S = Math.round($('#coin37S').val());
    
    var coin38 = Math.round($('#coin38').val());
    var coin38B = Math.round($('#coin38B').val());
    var coin38S = Math.round($('#coin38S').val());
    
    var coin39 = Math.round($('#coin39').val());
    var coin39B = Math.round($('#coin39B').val());
    var coin39S = Math.round($('#coin39S').val());
    
    var coin40 = Math.round($('#coin40').val());
    var coin40B = Math.round($('#coin40B').val());
    var coin40S = Math.round($('#coin40S').val());
    
    var coin41 = Math.round($('#coin41').val());
    var coin41B = Math.round($('#coin41B').val());
    var coin41S = Math.round($('#coin41S').val());
     
    var coin42 = Math.round($('#coin42').val());
    var coin42B = Math.round($('#coin42B').val());
    var coin42S = Math.round($('#coin42S').val());    
    
    var coin43 = Math.round($('#coin43').val());
    var coin43B = Math.round($('#coin43B').val());
    var coin43S = Math.round($('#coin43S').val());  
    
    (function () {    
        var stacked_bar_chart = c3.generate({
          bindto: '#exampleC3StackedBar',
          data: {
            columns: [  ['Coin', coin38, coin39, coin40,  coin42, coin43],
                        ['Bill', coin38B, coin39B, coin40B,  coin42B, coin43B],
                        ['Card', coin38S, coin39S, coin40S,  coin42S, coin43S] ],
            type: 'bar',
            groups: [['data1', 'data2']]
          },
          color: {
            pattern: [Config.colors("primary", 500), Config.colors("light-green", 300), Config.colors("purple", 300)]
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
            stacked_bar_chart.groups([['Coin', 'Bill', 'Card']]);
          }, 1000);             

          setTimeout(function () {
            stacked_bar_chart.groups([['Coin', 'Bill', 'Card']]);
          }, 2000);
      })();
      
      
      (function () {    
        var stacked_bar_chart_coin = c3.generate({
            bindto: '#coinbillin',
            data: {
              columns: [['Coin', coin28, coin29, coin30, coin31, coin35, coin36, coin37, coin41],
                        ['Bill', coin28B, coin29B, coin30B, coin31B, coin35B, coin36B, coin37B, coin41B],
                        ['Card', coin28S, coin29S, coin35S, coin31S, coin35S, coin36S, coin37S, coin41S]],
              type: 'bar',
              groups: [['data1', 'data2']]
            },
            color: {
                pattern: [Config.colors("primary", 500), Config.colors("light-green", 300), Config.colors("purple", 300)]
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
            stacked_bar_chart_coin.groups([['Coin', 'Bill', 'Card']]);
          }, 1000);             

          setTimeout(function () {
            stacked_bar_chart_coin.groups([['Coin', 'Bill', 'Card']]);
          }, 2000);
        })();
      
      
        (function () {
            var stacked_bar_chart_total = c3.generate({
              bindto: '#bothShow',
              data: {
                columns: [ ['Coin', coin28, coin29, coin30, coin31, coin35, coin36, coin37, coin38, coin39, coin40, coin41, coin42, coin43],
                           ['Bill', coin28B, coin29B, coin30B, coin31B, coin35B, coin36B, coin37B, coin38B, coin39B, coin40B, coin41B, coin42B,coin43B],
                           ['Card', coin28S, coin29S, coin30S, coin31S, coin35S, coin36S, coin37S, coin38S, coin39S, coin40S, coin41S, coin42S,coin43S] ],
                type: 'bar',
                groups: [['data1', 'data2']]
              },
              color: {
                pattern: [Config.colors("primary", 500), Config.colors("light-green", 300), Config.colors("purple", 300)]
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
                        categories: ['Andy', 'Jack','Robert','Brian','George','James','Barry',
                            'Philippines Advam Test Unit','raspberrypi for Advam-16','raspberrypi for Advam-08',
                            'Philippines Single Chip Board - under development',
                            'raspberrypi for Advam-18','raspberrypi for Advam-12']
                    }
                }
            });

            setTimeout(function () {
                stacked_bar_chart_total.groups([['Coin', 'Bill', 'Card']]);
              }, 1000);             

              setTimeout(function () {
                stacked_bar_chart_total.groups([['Coin', 'Bill', 'Card']]);
              }, 2000);
        })();
      
  });
  
 