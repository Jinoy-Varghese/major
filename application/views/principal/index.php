<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    var chart = am4core.create("chartdiv", am4charts.XYChart);
    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

    chart.data = [{
            country: "USA",
            visits: 725
        },
        {
            country: "China",
            visits: 882
        },
        {
            country: "Japan",
            visits: 809
        },
        {
            country: "Germany",
            visits: 322
        },
        {
            country: "UK",
            visits: 122
        },
        {
            country: "France",
            visits: 114
        },
        {
            country: "India",
            visits: 984
        },
        {
            country: "Spain",
            visits: 711
        },
        {
            country: "Netherlands",
            visits: 465
        },

    ];

    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.dataFields.category = "country";
    categoryAxis.renderer.minGridDistance = 40;
    categoryAxis.fontSize = 9;


    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.min = 0;
    valueAxis.max = 1000;
    valueAxis.strictMinMax = true;
    valueAxis.renderer.minGridDistance = 30;
    valueAxis.renderer.labels.template.fontSize = 9;
    // axis break
    var axisBreak = valueAxis.axisBreaks.create();
    axisBreak.startValue = 400;
    axisBreak.endValue = 700;
    //axisBreak.breakSize = 0.005;

    // fixed axis break
    var d = (axisBreak.endValue - axisBreak.startValue) / (valueAxis.max - valueAxis.min);
    axisBreak.breakSize = 0.05 * (1 - d) /
    d; // 0.05 means that the break will take 5% of the total value axis height

    // make break expand on hover
    var hoverState = axisBreak.states.create("hover");
    hoverState.properties.breakSize = 1;
    hoverState.properties.opacity = 0.1;
    hoverState.transitionDuration = 1500;

    axisBreak.defaultState.transitionDuration = 1000;
    /*
    // this is exactly the same, but with events
    axisBreak.events.on("over", function() {
    axisBreak.animate(
        [{ property: "breakSize", to: 1 }, { property: "opacity", to: 0.1 }],
        1500,
        am4core.ease.sinOut
    );
    });
    axisBreak.events.on("out", function() {
    axisBreak.animate(
        [{ property: "breakSize", to: 0.005 }, { property: "opacity", to: 1 }],
        1000,
        am4core.ease.quadOut
    );
    });*/

    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.categoryX = "country";
    series.dataFields.valueY = "visits";
    series.columns.template.tooltipText = "{valueY.value}";
    series.columns.template.tooltipY = 0;
    series.columns.template.strokeOpacity = 0;

    // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
    series.columns.template.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
    });

}); // end am4core.ready()
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("piechart", am4charts.PieChart);

    // Add data
    chart.data = [{
        "country": "Lithuania",
        "litres": 501.9
    }, {
        "country": "Czech Republic",
        "litres": 301.9
    }, {
        "country": "Ireland",
        "litres": 201.1
    }, {
        "country": "Germany",
        "litres": 165.8
    }, {
        "country": "Australia",
        "litres": 139.9
    }, {
        "country": "Austria",
        "litres": 128.3
    }, {
        "country": "UK",
        "litres": 99
    }, {
        "country": "Belgium",
        "litres": 60
    }, {
        "country": "Netherlands",
        "litres": 50
    }];

    // Set inner radius
    chart.innerRadius = am4core.percent(50);

    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "litres";
    pieSeries.dataFields.category = "country";
    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;
    pieSeries.labels.template.paddingTop = 0;
    pieSeries.labels.template.paddingBottom = 0;

    pieSeries.labels.template.fontSize = 6;
    pieSeries.ticks.template.disabled = false;


    // This creates initial animation
    pieSeries.hiddenState.properties.opacity = 1;
    pieSeries.hiddenState.properties.endAngle = -90;
    pieSeries.hiddenState.properties.startAngle = -90;
    categoryAxis.fontSize = 9;
}); // end am4core.ready()
</script>

<!-- HTML -->



<h1 class="mt-4">Dashboard</h1>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-3 col-md-6">
            <div class="col-md-12 shadow"
                style="background: linear-gradient(45deg, rgba(54,58,252,1) 0%, rgba(63,128,254,1) 100%);height:100px;margin-bottom:10px;">
                <div class="text-right" style="opacity:0.8;"><i class="fa fa-users text-white"></i></div>
                <div style=" font-size:30px;opacity:0.9;" class=" text-white font-weight-bold number-animation1">
                    <?php echo $this->db->count_all('course_list');?> </div>
                <div class="text-white">Course</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="col-md-12 shadow"
                style="background: linear-gradient(90deg, rgba(188,58,252,1) 0%, rgba(251,63,225,1) 100%);height:100px;margin-bottom:10px;">
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="col-md-12 shadow"
                style="background: linear-gradient(45deg, rgba(34,195,82,1) 0%, rgba(45,253,222,1) 100%);height:100px;margin-bottom:10px;">
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="col-md-12 shadow"
                style="background: linear-gradient(45deg, rgba(252,54,54,1) 0%, rgba(253,45,120,1) 100%);height:100px;margin-bottom:10px;">
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-8 col-md-8 mt-1 pr-lg-2 p-0">
            <div class="col-md-12 shadow pl-0" id="chartdiv" style="height:300px;"></div>
        </div>

        <div class="col-lg-4 col-md-4 mt-1 p-0">
            <div class="shadow col-md-12 p-0 justify-content-center align-items-center d-flex" style="height:100%;">
                <div id="piechart" class="col-md-12 p-0" style="height:230px;"></div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-3 col-md-6 shadow pt-3 mt-1">
            <div class="col-md-12" style="max-height:440px;overflow:hidden;">
                <h6 class="justify-content-center d-flex">Notice Board</h6>
                <div class="border border-primary bg-primary rounded"></div>
                <marquee direction='up' scrollamount='2' style="height:100%;">
                    <?php
            $this->db->select('*');
            $this->db->from('notifications');
             $sql=$this->db->get();
             foreach($sql->result() as $news_data)
           {
             
             echo "&#10146 $news_data->description"."<br>";
             
           }?>
                </marquee>
            </div>

        </div>
        <div class="col-lg-3 col-md-6  mt-1">
            <div class="col-md-12 shadow pt-3" style="height:100%;">
                <h6 class="justify-content-center d-flex">College News</h6>
                <div class="border border-primary bg-primary rounded"></div>
                <marquee direction='up' scrollamount='2' class='font-weight-bold text-center' style="height:90%;">
                    <?php
            $this->db->select('*');
            $this->db->from('news');
             $sql=$this->db->get();
             foreach($sql->result() as $news_data)
           {
            $image=$news_data->news_file;
            echo "<div class='row'><div class='col-12'>$news_data->news</div></div><br>";
            echo "<div class='row'><div class='col-12'><img src='".base_url($image)."' class='img-fluid img-thumbnail' style='height:150px;'></div></div><br>";
           }?></marquee>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 shadow pt-3 mt-1s ">
            <?php $this->load->view("calendar/calendar.php");?>
        </div>
    </div>
</div>

<style>
@media only screen and (max-width: 479px) {
    .fc-calender .fc-header-toolbar .fc-right .fc-button-group {
        width: 160px;
    }
}
</style>
<script>
let elm = document.querySelector('.number-animation1');

function animateValue(id, start, duration) {
    let end = parseInt(elm.innerText);
    let range = end - start;
    let current = start;
    let increment = end > start ? 1 : -1;
    let stepTime = Math.abs(Math.floor(duration / range));
    let obj = elm;
    let timer = setInterval(function() {
        current += increment;
        obj.innerHTML = current;
        if (current == end) {
            clearInterval(timer);
        }
    }, stepTime);
}

if (elm.innerHTML <= 0) {

} else {
    animateValue(elm, 0, 2000);
}
</script>
<script>
let elm2 = document.querySelector('.number-animation2');

function animateValue(id, start, duration) {
    let end = parseInt(elm2.innerText);
    let range = end - start;
    let current = start;
    let increment = end > start ? 1 : -1;
    let stepTime = Math.abs(Math.floor(duration / range));
    let obj = elm2;
    let timer = setInterval(function() {
        current += increment;
        obj.innerHTML = current;
        if (current == end) {
            clearInterval(timer);
        }
    }, stepTime);
}

if (elm2.innerHTML <= 0) {

} else {
    animateValue(elm2, 0, 2000);
}
</script>
<script>
let elm3 = document.querySelector('.number-animation3');

function animateValue(id, start, duration) {
    let end = parseInt(elm3.innerText);
    let range = end - start;
    let current = start;
    let increment = end > start ? 1 : -1;
    let stepTime = Math.abs(Math.floor(duration / range));
    let obj = elm3;
    let timer = setInterval(function() {
        current += increment;
        obj.innerHTML = current;
        if (current == end) {
            clearInterval(timer);
        }
    }, stepTime);
}

if (elm3.innerHTML <= 0) {

} else {
    animateValue(elm3, 0, 2000);
}
</script>
<script>
let elm4 = document.querySelector('.number-animation4');

function animateValue(id, start, duration) {
    let end = parseInt(elm4.innerText);
    let range = end - start;
    let current = start;
    let increment = end > start ? 1 : -1;
    let stepTime = Math.abs(Math.floor(duration / range));
    let obj = elm4;
    let timer = setInterval(function() {
        current += increment;

        obj.innerHTML = current;
        if (current == end) {
            clearInterval(timer);
        }
    }, stepTime);
}
if (elm4.innerHTML <= 0) {

} else {
    animateValue(elm4, 0, 2000);
}
</script>


<br>
<br><br><br><br><br><br><br>