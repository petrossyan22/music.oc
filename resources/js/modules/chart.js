new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["HTML", "CSS", "JS", "OOP", "Bootstrap4", "jQuery", "React", "PHP", "MYSQL", "REST. API", "MVC", "laravel"],
      datasets: [
        {
          label: "Population (%)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#f4e111", "darkblue", "#a444c1", "#152535", "#55FF4f", "#f5f411", "#f400f4"],
          data: [60,20,60,70,50,50,30,70,50,70,50,50]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (%) in 100'
      }
    }
});
