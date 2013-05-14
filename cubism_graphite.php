<html>
<?php header('Access-Control-Allow-Origin: *'); ?>
<meta charset="utf-8" />
Aircloak/Cubism.js Dashboard</pre>

<link href="style.css" rel="stylesheet" type="text/css">
<style>
@import url(//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700);
@import url(//square.github.com/cubism/style.css);
</style>
<div id="body">
<h2>Metrics for Cloak@tpm-dell2</h2>
<div id="graphs"></div>
<script type="text/javascript" src="http://d3js.org/d3.v2.js"></script>
<script type="text/javascript" src="http://square.github.com/cubism/cubism.v1.js"></script>
<script type="text/javascript" src="http://square.github.com/cubism/highlight.min.js"></script>
<script type="text/javascript">
</script>
 
<script type="text/javascript">
var context = cubism.context()
    .step( 1 * 60* 1000 )   // 1 minute
    .size(960);  // 1 * 960 = 4 hours
 
var graphite = context.graphite("http://graphite.mpi-sws.org:5000/");
var horizon = context.horizon().metric(graphite.metric).height(40);
 
var metrics1 = [
   'org.mpi-sws.cloak@tpm-dell2.cloak_cloak_metrics_heap_size',
   'org.mpi-sws.cloak@tpm-dell2.cloak_cloak_metrics_message_queue_len', 
   'org.mpi-sws.cloak@tpm-dell2.cloak_cloak_metrics_reductions',
   'org.mpi-sws.cloak@tpm-dell2.cloak_cloak_metrics_report_arithmetic_mean',
   'org.mpi-sws.cloak@tpm-dell2.cloak_cloak_metrics_report_geometric_mean',
   'org.mpi-sws.cloak@tpm-dell2.cloak_cloak_metrics_report_harmonic_mean',
   'org.mpi-sws.cloak@tpm-dell2.cloak_cloak_metrics_report_kurtosis',
   'org.mpi-sws.cloak@tpm-dell2.cloak_cloak_metrics_report_max',
   'org.mpi-sws.cloak@tpm-dell2.cloak_cloak_metrics_report_median',
   'org.mpi-sws.cloak@tpm-dell3.cloak_cloak_metrics_heap_size',
]
 
d3.select("#graphs").append("div")
    .attr("class", "axis")
    .call(context.axis().orient("top"));
 
d3.select("#graphs").append("div")
    .attr("class", "rule")
    .call(context.rule());
 
d3.select("#graphs").selectAll(".horizon")
    .data(metrics1)
  .enter().append("div")
    .attr("class", "horizon")
	.call(horizon)
	.colors(["#08519c","#3182bd","#6baed6","#bdd7e7","#bae4b3","#74c476","#31a354","#006d2c"]);
</script>

