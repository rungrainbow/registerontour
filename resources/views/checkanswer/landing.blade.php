@extends('layouts.app')

@section('content')
<h5 class="red-text text-accent-1 center-align">สรุปข้อมูล</h5>
<div class="row">
    {{-- <div class="col m10 offset-m1 s12">
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <a class="collapsible-header black-text" href="/home/questions/">
                    <span class="badge green-text">ตอบแล้ว</span>
                    <i class="material-icons green-text">done</i>
                </a>
                <a class="collapsible-header black-text" href="/home/questions/">
                    <span class="badge red-text">ยังไม่ตอบ</span>
                    <i class="material-icons red-text">info_outline</i>
                </a>
            </li>
        </ul>
    </div> --}}
    <div class="col m6 offset-m3 s12">
      <canvas id="summary"></canvas>
    </div>
</div>
@endsection

@section('extendScript')
<script>
var ctx = document.getElementById("summary").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["สมัครเรียบร้อย", "ข้อมูลไม่ครบ"],
        datasets: [{
            label: 'จำนวนนักเรียนสมัครทั้งหมด',
            data: [22, 19],
            backgroundColor: [
                '#00c853',
                '#ff5252'
            ],
            borderColor: [
                '#2e7d32',
                '#d32f2f'
            ],
            borderWidth: 1
        }]
    }
});
</script>
@endsection

