<meta charset="utf-8" />
Aircloak/ Cubism.js Dashboard</pre>
 
<?php header('Access-Control-Allow-Origin: *'); ?>
<link href="style.css" rel="stylesheet" type="text/css">
<style>
@import url(//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700);
@import url(http://square.github.com/cubism/style.css);
</style>
<div id="body">
<h2>Metrics for Cloak@TPM-Dell3</h2>
<div id="graphs"></div>
<script type="text/javascript" src="http://d3js.org/d3.v2.js"></script>
<script type="text/javascript" src="http://square.github.com/cubism/cubism.v1.js"></script>
<script type="text/javascript" src="http://square.github.com/cubism/highlight.min.js"></script>
<script type="text/javascript">
</script>
 
<script type="text/javascript">
var context = cubism.context()
    .step( 1*60  * 1000 )   // 1 minute
    .size(960);  // 1 * 960 = 4 hours
 
var graphite = context.graphite("http://graphite.mpi-sws.org:5000/");
//////// Example: 'stats.host*.cpu.load.load'
graphFind = 'org.mpi-sws.cloak@tpm-dell3.cloak*'
 
// Set The Time Row on Top
d3.select("#graphs").append("div")
    .attr("class", "axis")
    .call(context.axis().orient("top"));
 
// Set the Vertical Line Bar
d3.select("#graphs").append("div")
    .attr("class", "rule")
    .call(context.rule());
graphite.find(graphFind, function(error, results) {
 
   // Map find results to array and set to graphite.metric object type
    var metrics = results.sort().map(function(i) {
		return graphite.metric(i);
      //// return it as a nonNegativeDerivative
      // return graphite.metric('nonNegativeDerivative('+i+')');
    });
 
   // loop through array and print stuff to "graphs" div and apply .height and .colors to object
   for (var i=0;i<metrics.length;i++){
    d3.select("#graphs").call(function(div) {
        div.append("div").selectAll(".horizon")
             .data([metrics[i]])
             .enter().append("div")
             .attr("class", "horizon")
            .call(context.horizon()
              .height(40)
              .colors(["#08519c","#3182bd","#6baed6","#bdd7e7","#bae4b3","#74c476","#31a354","#006d2c"])
            );
    });
   }
   // Set The Time Row on Bottom
   d3.select("#graphs").append("div")
       .attr("class", "axis")
       .call(context.axis().orient("bottom"));
});
</script>
