@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <section class="nftmax-adashboard nftmax-show">


      <div class=" nftmax-adashboard-left ">
        <div class="row">
            Welcome to the Dashboard
        </div>

        
      </div>

      


    </section>


@endsection
@section('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    function totalEarn() {
      const ctx = document.getElementById("totalEarn");
      if (!ctx) return;

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
          datasets: [{
            label: "Earnings",
            data: [12, 19, 3, 5, 2, 3, 9],
            backgroundColor: "#3F84F8",
            borderRadius: 6,
            barThickness: 18,
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                callback: function (value) {
                  return "$" + value;
                }
              },
              grid: {
                drawTicks: false
              }
            },
            x: {
              grid: {
                drawTicks: false,
                display: false
              }
            }
          },
          plugins: {
            legend: { display: false }
          }
        }
      });
    }

    totalEarn();
  });
</script>
@endsection
