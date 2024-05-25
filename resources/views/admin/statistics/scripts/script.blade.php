<script>
    let width, height, gradient;

    function getGradient(ctx, chartArea) {
        const chartWidth = chartArea.right - chartArea.left;
        const chartHeight = chartArea.bottom - chartArea.top;
        if (!gradient || width !== chartWidth || height !== chartHeight) {
            // Create the gradient because this is either the first render
            // or the size of the chart has changed
            width = chartWidth;
            height = chartHeight;
            gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
            gradient.addColorStop(0, '#6600871f');
            gradient.addColorStop(0.25, '#66008761');
            gradient.addColorStop(0.5, '#6600879c');
            gradient.addColorStop(0.75, '#660087cf');
            gradient.addColorStop(1, '#660087');
        }

        return gradient;
    }

    function setConfig(chartData, xAxisKey, yAxisKey) {
        return {
            type: 'bar',
            data: {
                datasets: [{
                    data: JSON.parse(chartData),
                    borderWidth: 1,
                    borderColor: '#007bff',
                    backgroundColor: function(context) {
                        const chart = context.chart;
                        const {
                            ctx,
                            chartArea
                        } = chart;

                        if (!chartArea) {
                            // This case happens on initial chart load
                            return;
                        }
                        return getGradient(ctx, chartArea);
                    },
                }]
            },
            options: {
                responsive: true,
                parsing: {
                    xAxisKey: xAxisKey,
                    yAxisKey: yAxisKey
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                devicePixelRatio: window.devicePixelRatio
            }
        };
    }
</script>
