// HIDE LOADING SCREEN
$(document).ready(function () {
  $(".loading-screen").hide();
  $(document.body).css("overflow", "visible");
});

// BODY PADDING TOP
window.onload = function () {
  setTimeout(() => {
    getPaddinglocalStorage();
    window.ondeviceorientation = function () {
      getPaddinglocalStorage();
    };
    window.onresize = function () {
      getPaddinglocalStorage();
    };
  }, 100);
};
function getPaddinglocalStorage() {
  if (localStorage.getItem("body-padding-top") == "true") {
    document.body.classList.add("body-padding-top");
  } else {
    document.body.classList.remove("body-padding-top");
  }
}

// CHART.JS
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = "#1c79d5";
var canvas = document.querySelector("#myChart");
var ctx = canvas.getContext("2d");
var gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, "#1c79d5");
gradient.addColorStop(1, "transparent");

// make canvas width always parent's full width
window.addEventListener("resize", function () {
  canvas.style.width = "100%";
});

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [
      {
        backgroundColor: gradient,
        data: yValues,
        barPercentage: 0.5,
      },
    ],
  },
  options: {
    responsive: true,
    legend: { display: false },
    title: {
      display: true,
      text: "نسب الزبائن والبيع وعدد الانابيب",
    },
  },
});

// INCREASE INFO COUNT SPANS
$(document).ready(function () {
  $(".info-count").each((i, e) => {
    let goal = $(e).attr("data-goal");
    let increase = Math.floor(goal / 100);
    let interval = setInterval(() => {
      $(e).text(+$(e).text() + increase);
      if (+$(e).text() >= +goal) {
        let arr = Array.from(goal);
        let result = arr
          .reverse()
          .map((e, i) => {
            i++;
            if (i != 0 && i % 3 == 0 && arr.length > 3) {
              return "," + e;
            } else {
              return e;
            }
          })
          .reverse()
          .join("");
        $(e).text(result);
        clearInterval(interval);
      }
    }, 0);
  });
});

// CIRCULAR PROGRESS BAR
let progressBar = document.querySelectorAll(".circular-progress");
progressBar.forEach((e)=>{
  let valueContainer = e.querySelector(".value-container");

  let progressValue = 0;
  let progressEndValue = valueContainer.getAttribute("data-goal");
  let speed = 10;

  let progress = setInterval(() => {
    progressValue++;
    valueContainer.textContent = `${progressValue}%`;
    e.style.background = `conic-gradient(
        #1c79d5 ${progressValue * 3.6}deg,
        #cadcff ${progressValue * 3.6}deg
    )`;
    if (progressValue == progressEndValue) {
      clearInterval(progress);
    }
  }, speed);
});
