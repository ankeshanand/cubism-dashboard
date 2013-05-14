cubism-dashboard
================

A cubism.js dashboard for visualizing TPM metrics from Aircloak's Graphite server.

To run the dashboard:

1. Launch google-chrome from the terminal with a command-line argument "disable-web-security" with the file metric_find.html(or metric_find.php if you have a local server running).
    
  "google-chrome --disable-web-security metric_find.html"


Since there are lots of metrics to display for one TPM, the pages take a lot of resource, and so the browser may end up crashing.For the time being, you can see a few metrics in cubism_graphite.html too.

Tested only on Google Chrome.
