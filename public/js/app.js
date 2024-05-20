import  {toggleChart,updateChart}  from './barChart.js';
window.onload = function() {
    updateChart();
  const toggleButton = document.getElementById('toggleButton');
  if (toggleButton) {
    toggleButton.addEventListener('click', toggleChart);
  } else {
    console.error('Toggle button not found. Please ensure the button has the ID "toggleButton".');
  }
};

