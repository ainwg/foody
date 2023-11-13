$(document).ready(function(){
    $.ajax({
      url: "http://localhost/project/data.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var Menu = [];
        var Menucategory = [];
  
        for(var i in data) {
          Menu.push(data[i].menuid);
          Menucategory.push(data[i].menuprice);
        }
  
        var chartdata = {
          labels: Menu,
          datasets : [
            {
              label: 'Menu',
              backgroundColor: 'rgba(200, 200, 200, 0.75)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
              hoverBorderColor: 'rgba(200, 200, 200, 1)',
              data: Menucategory
            }
          ]
        };
  
        var ctx = $("#mycanvas");
  
        var dashboard = new Chart(ctx, {
          type: 'bar',
          data: chartdata
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });