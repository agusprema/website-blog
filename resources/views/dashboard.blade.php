@push('meta')
    <title>{{ config('app.name', 'Laravel') }}</title>
@endpush

@push('script')
    <script>
        var pieChartContainer = document.getElementById('pie-chart');
        var percentage = 40;
        var piepercentage = document.querySelector('#pie-chart~#percentage').innerHTML = percentage + '%'
        var pieChart = new Chart(pieChartContainer, {
            type: 'doughnut',
            data: {
                labels: ['Goal', 'In Progress'],
                datasets: [{
                    label: '# of Votes',
                    data: [percentage, 100 - percentage],
                    fill: false,
                    backgroundColor: [
                        'rgba(52, 211, 153, 1)',
                        'rgba(156, 163, 175, 1)',
                    ],
                    borderColor: [
                        'rgba(52, 211, 153, 1)',
                        'rgba(156, 163, 175, 1)',
                    ],
                    borderWidth: 2,
                }]
            },
            options: {
                rotation: 2.35,
                circumference: 1.5 * Math.PI,
                maintainAspectRatio: false,
                responsive: true,
                layout: {

                },
                legend: {
                    display: false
                },
                cutoutPercentage: 90,
            }
        })

        var lineChartContainer = document.getElementById('line-chart');
        var lineChart = new Chart(lineChartContainer, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: '# Goal',
                    data: [2, 4, 76, 756, 12, 5, 1231, 034, 220, 25, 123, 203],
                    fill: false,
                    backgroundColor: [
                        'rgba(52, 211, 153, 1)',
                    ],
                    borderColor: [
                        'rgba(52, 211, 153, 1)',
                    ],
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(52, 211, 153, 1)',
                    pointBorderColor: 'rgba(52, 211, 153, 1)'
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Grid Line Settings',
                    fontColor: 'red'
                },
                legend: {
                    display: false,
                    labels: {
                        fontColor: "blue",
                        fontSize: 18
                    }
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: 'rgba(52, 11, 153, 1)',
                        },
                        ticks: {
                            fontColor: '#ffff'
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: 'rgba(52, 111, 153, 1)',
                        },
                        ticks: {
                            fontColor: '#ffff'
                        }
                    }],
                }
            }
        })


        var barChartContainer = document.getElementById('bar-chart');
        var barChart = new Chart(barChartContainer, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: '# Goal',
                    data: [100, 40, 76, 756, 12, 5, 11, 34, 220, 25, 123, 203],
                    fill: false,
                    backgroundColor: 'rgba(52, 211, 153, 1)',
                    borderColor: 'rgba(52, 211, 153, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(52, 211, 153, 1)',
                    pointBorderColor: 'rgba(52, 211, 153, 1)'
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Grid Line Settings',
                    fontColor: 'red'
                },
                legend: {
                    display: false,
                    labels: {
                        fontColor: "blue",
                        fontSize: 18
                    }
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: 'rgba(52, 11, 153, 1)',
                        },
                        ticks: {
                            fontColor: '#ffff'
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: 'rgba(52, 111, 153, 1)',
                        },
                        ticks: {
                            fontColor: '#ffff'
                        }
                    }],
                }
            }
        })

    </script>
@endpush

<x-layouts.admin-layout>
    <h1 class="text-3xl text-black pb-6">Dashboard</h1>

    <div class="grid grid-cols-4 grid-rows-3 auto-cols-auto gap-4">

        <div class="row-span-3 bg-light dark:bg-dark text-dark dark:text-light rounded font-semibold relative">
            <div class="relative p-4">
                <div class="leading-none text-xl">Goal overview</div>
                <div class="absolute top-0 right-0 mt-3 mr-3 rounded-full bg-blue-300 bg-opacity-30 w-8 h-8">
                    <div class="flex items-center justify-center p-2"><i class="fas fa-user-shield text-md text-blue-300"></i></div>
                </div>
            </div>

            <div class="h-4/6 py-6 p-4 relative">
                <canvas id="pie-chart" width="100%"></canvas>
                <div id="percentage" class="absolute z-10 text-6xl" style="top: 50%; left: calc(50% - 4rem);">0%</div>
            </div>

            <div class="grid grid-cols-2 divide-x divide-green-500 border-t absolute inset-x-0 bottom-0">
                <div class="p-4 leading-none">
                    <span>Complate</span>
                    <h1 class="text-3xl">202501</h1>
                </div>
                <div class="p-4 leading-none">
                    <span>in Progres</span>
                    <h1 class="text-3xl">202501</h1>
                </div>
            </div>
        </div>

        <div class="row-span-3 col-span-2 bg-light dark:bg-dark text-dark dark:text-light rounded font-semibold relative">
            <div class="relative p-4">
                <div class="leading-none text-xl">Goal overview</div>
                <div class="absolute top-0 right-0 mt-3 mr-3 rounded-full bg-blue-300 bg-opacity-30 w-8 h-8">
                    <div class="flex items-center justify-center p-2"><i class="fas fa-user-shield text-md text-blue-300"></i></div>
                </div>
            </div>

            <div class="flex gap-4 px-4">
                <div class="leading-none text-gray-500">
                    This Month
                    <div class="text-3xl text-primary">200220</div>
                </div>
                <div class="leading-none text-gray-400">
                    Last month
                    <div class="text-3xl">102200</div>
                </div>
            </div>

            <div class="p-4">
                <canvas id="line-chart" width="100%"></canvas>
            </div>
        </div>

        <div class="bg-light dark:bg-dark text-dark dark:text-light rounded p-4">
            <div class="relative">
                <div class="leading-none text-xl">New User</div>
                <div class="absolute top-0 right-0 mr-2 rounded-full bg-blue-300 bg-opacity-30 w-8 h-8">
                    <div class="flex items-center justify-center p-2"><i class="fas fa-user-shield text-md text-blue-300"></i></div>
                </div>
            </div>

            <div class="font-semibold leading-loose text-3xl">30%</div>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-primary bg-opacity-25">
                    <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-primary"></div>
                </div>
            </div>
            <div class="font-semibold leading-loose text-lg font-normal">
                <span class="text-green-400">7.34% <i class="fas fa-long-arrow-alt-up transform rotate-45 mx-1"></i></span> more than last month
                {{-- ['more than last month', 'going down', 'looks pretty good'] --}}
            </div>
        </div>

        @for ($i = 0; $i < 5; $i++)
            <div class="bg-light dark:bg-dark text-dark dark:text-light rounded p-4">
                <div class="relative">
                    <div class="leading-none text-xl">New User</div>
                    <div class="absolute top-0 right-0 mr-2 rounded-full bg-blue-300 bg-opacity-30 w-8 h-8">
                        <div class="flex items-center justify-center p-2"><i class="fas fa-user-shield text-md text-blue-300"></i></div>
                    </div>
                </div>

                <div class="font-semibold leading-loose text-3xl">{{ 20000 + $i }}</div>
                <div class="font-semibold leading-loose text-lg font-normal">
                    <span class="text-green-400">7.34% <i class="fas fa-long-arrow-alt-up transform rotate-45 mx-1"></i></span> more than last month
                    {{-- ['more than last month', 'going down', 'looks pretty good'] --}}
                </div>
            </div>
        @endfor

        <div class="row-span-3 col-span-2 bg-light dark:bg-dark text-dark dark:text-light rounded font-semibold relative">
            <div class="relative p-4">
                <div class="leading-none text-xl">Goal overview</div>
                <div class="absolute top-0 right-0 mt-3 mr-3 rounded-full bg-blue-300 bg-opacity-30 w-8 h-8">
                    <div class="flex items-center justify-center p-2"><i class="fas fa-user-shield text-md text-blue-300"></i></div>
                </div>
            </div>

            <div class="flex gap-4 px-4">
                <div class="leading-none text-gray-500">
                    This Month
                    <div class="text-3xl text-primary">200220</div>
                </div>
                <div class="leading-none text-gray-400">
                    Last month
                    <div class="text-3xl">102200</div>
                </div>
            </div>

            <div class="p-4">
                <canvas id="bar-chart" width="100%"></canvas>
            </div>
        </div>

    </div>
</x-layouts.admin-layout>
