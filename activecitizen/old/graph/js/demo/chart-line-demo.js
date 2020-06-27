// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Line Chart Example
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"],
    datasets: [{ 
        data: [86,114,1000,106,107,111,133,221,783,2478,248,1478],
        label: "Petrol",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,900,502,635,809,947,1402,3700,5267,3267,1267],
        label: "Diesel",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,600,190,203,276,408,547,675,734,1675,1734],
        label: "Kerosene",
        borderColor: "#3cba9f",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Company Fuel Usage (in Litre)'
    }
  }
});
