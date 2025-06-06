<div>
    <div class="content-header"></div>
    <div class="content-body">

        <div class="flex gap-2 mb-4 items-center">
            <div class="w-[50px] text-right mr-1"> ปี</div>
                <div class="w-[100px]">
                    <select class="form-control" wire:model="selectedYear">
                        @foreach($yearList as $year)
                            <option value="{{ $year }}"> {{ $year }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="w-[50px] text-right mr-1">เดือน</div>
                <div class="w-[200px]">
                    <select class="form-control" wire:model="selectedMonth">
                        @foreach($monthList as $index => $month)
                            <option value="{{ $index + 1 }}"> {{ $month }} </option>
                        @endforeach
                    </select>
            </div>
            <div class="w-[200px]">
                <button class="btn-info ml-2" wire:click="loadNewData">
                    <i class="fa-solid fa-magnifying-glass mr-2"></i>
                        แสดงรายการ
                </button>
            </div>
        </div>

        <div class="flex gap-4 text-right">
            <div class="box-income">
                <div class="font-bold text-xl"><i class="fa-solid fa-coins mr-2"></i>รายได้</div>
                <div class="text-4xl">{{ number_format($income) }}</div>
            </div>
            <div class="box-room-fee">
                <div class="font-bold text-xl"><i class="fa-solid fa-bed mr-2"></i>ห้องว่าง</div>
                <div class="text-4xl">{{ $roomFee }}</div>
            </div>
            <div class="box-debt">
                <div class="font-bold text-xl"><i class="fa-solid fa-handshake mr-2"></i>ค้างจ่าย</div>
                <div>{{ number_format($debt) }}</div>
            </div>
            <div class="box-pay">
                <div class="font-bold text-xl"><i class="fa-solid fa-dollar-sign mr-2"></i>รายจ่าย</div>
                <div class="text-xl">{{ number_format($pay) }}</div>
            </div>
            <div class="{{ $income - $pay > 0 ? 'box-balance-positive' : 'box-balance-negative'}}">
                <div class="font-bold text-xl"><i class="fa-solid fa-chart-bar mr-2"></i>ผลประกอบการ</div>
                <div class="text-xl">{{ number_format($income - $pay) }}</div>
            </div>
        </div>

        <div class="flex gap-4">
            <div id="incomeChart" class="mt-4 bg-white p-4 rounded-lg w-2/3"></div>
            <div id="pieChart" class="mt-4 bg-white p-4 rounded-lg w-1/3"></div>
        </div>

    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('livewire:init', function() {
            var incomeChart = null;
            var pieChart = null;

        function initIncomeChart() {
            const options = {
                chart : {
                    type : 'bar',
                    height: 350
                },
                series : [{
                    name : 'รายได้',
                    data : @json(array_values($incomeInMonths))
                }],
                xaxis : {
                    categories : [
                        'ม.ก.','ก.พ.','มี.ค.','เม.ย',
                        'พ.ค.','มิ.ย.','ก.ค.','ส.ค.',
                        'ก.ย.','ต.ค.','พ.ย.','ธ.ค.'
                    ]
                },
                title : {
                    text: 'รายได้รายเดือน',
                    align: 'center'
                }
            };

            incomeChart = new ApexCharts(document.querySelector("#incomeChart"), options);
            incomeChart.render();
        }

        //piechart รายวัน รายเดือน
        function initPieChart() {
            const pieOptions = {
                series : @json(array_values($incomePie)),
                chart: {
                    type : 'pie',
                    height : 350
                },
                labels : ['รายวัน', 'รายเดือน'],
                title : {
                    text : 'รายได้รายประเภท',
                    align : 'center'
                }
            };
            pieChart = new ApexCharts(document.querySelector("#pieChart"), pieOptions);
            pieChart.render();
        }
        initIncomeChart();
        initPieChart();
    });
    </script>
@endpush

